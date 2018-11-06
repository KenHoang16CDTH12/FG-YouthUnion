<?php

namespace App\Console\Commands;

use DB;
use Exception;
use App\Models\User;
use App\Models\Role;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class FGDevComand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'FGDev:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command setup project make with by FGDev';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment('Attempting to install or upgrade FGDev.');
        $this->comment('Remember, you can always install/upgrade manually following the guide here:');
        $this->info('🎁 '.config('fg-dev.misc.docs_url').PHP_EOL);

        $this->info('Composer installing ⏳ ⏳ ⏳');
        system('composer install');

        if (!config('app.key')) {
            $this->info('Generating app key');
            Artisan::call('key:generate');
        } else {
            $this->comment('App key exists -- skipping');
        }

        $dbSetUp = false;
        while (!$dbSetUp) {
            try {
                // Make sure the config cache is cleared before another attempt.
                Artisan::call('config:clear');
                DB::reconnect()->getPdo();
                $dbSetUp = true;
            } catch (Exception $e) {
                $this->error($e->getMessage());
                $this->warn(PHP_EOL.'FGDev cannot connect to the database. Let\'s set it up.');
                $this->setUpDatabase();
            }
        }

        $this->info('Migrating database');
        Artisan::call('migrate', ['--force' => true]);

        if (!User::count()) {
            $this->setUpAdminAccount();
            //Seeding data
            $this->seedingData();
        } else {
            $this->comment('Data seeded -- skipping');
        }

        $this->info('👤 Generating key passport for oauth2');
        Artisan::call('passport:install', ['--force' => true]);

        $this->info('🖍 Compiling front-end vuejs');
        system('npm install');

        $this->info('🅰 Generating vue-i18n');
        Artisan::call('vue-i18n:generate');

        $this->comment(PHP_EOL.'🎉 🎉 🎉 Success! FGDev can now be run from localhost with `php artisan serve`.');
        $this->comment('Again, for more configuration guidance, refer to');
        $this->info('🎁  '.config('fg-dev.misc.docs_url'));
        $this->comment('or open the .env file in the root installation folder.');
        $this->comment('☘💚🍁 Make with by FGDev! 🍁💚☘');
    }

    /**
     * Prompt user for valid database credentials and set up the database.
     */
    private function setUpDatabase()
    {
        $config = [
            'DB_CONNECTION' => '',
            'DB_HOST' => '',
            'DB_PORT' => '',
            'DB_DATABASE' => '',
            'DB_USERNAME' => '',
            'DB_PASSWORD' => '',
        ];

        $config['DB_CONNECTION'] = $this->choice(
            'Your DB driver of choice',
            [
                'mysql' => 'MySQL/MariaDB',
                'pqsql' => 'PostgreSQL',
                'sqlsrv' => 'SQL Server',
                'sqlite-e2e' => 'SQLite',
            ],
            'mysql'
        );
        if ($config['DB_CONNECTION'] === 'sqlite-e2e') {
            $config['DB_DATABASE'] = $this->ask('Absolute path to the DB file');
        } else {
            $config['DB_HOST'] = $this->anticipate('DB host', ['127.0.0.1', 'localhost']);
            $config['DB_PORT'] = (string) $this->ask('DB port (leave empty for default)', false);
            $config['DB_DATABASE'] = $this->anticipate('DB name', ['FG_YouthUnion']);
            $config['DB_USERNAME'] = $this->anticipate('DB user', ['root']);
            $config['DB_PASSWORD'] = (string) $this->ask('DB password', false);
        }

        foreach ($config as $key => $value) {
            DotenvEditor::setKey($key, $value);
        }
        DotenvEditor::save();

        // Set the config so that the next DB attempt uses refreshed credentials
        config([
            'database.default' => $config['DB_CONNECTION'],
            "database.connections.{$config['DB_CONNECTION']}.host" => $config['DB_HOST'],
            "database.connections.{$config['DB_CONNECTION']}.port" => $config['DB_PORT'],
            "database.connections.{$config['DB_CONNECTION']}.database" => $config['DB_DATABASE'],
            "database.connections.{$config['DB_CONNECTION']}.username" => $config['DB_USERNAME'],
            "database.connections.{$config['DB_CONNECTION']}.password" => $config['DB_PASSWORD'],
        ]);
    }

    /**
     * Set up the admin account.
     */
    private function setUpAdminAccount()
    {

        if (!Role::count()) {
            $roles = [
              [
                  'id' => 1,
                  'type' => 'Admin'
              ],
              [
                  'id' => 2,
                  'type' => 'Editor'
              ]
            ];
            DB::table('roles')->insert($roles);
            $this->comment('Default role -- adding');
        } else {
            $this->comment('Default role -- skipping');
        }
        $this->info("Let's create the admin account.");

        $isName = false;
        while (!$isName) {
            $name = $this->ask('Your name');
            if (trim($name) != '') {
                $name = trim($name);
                $isName = true;
            } else {
                $this->error('Name isn\'t null. Let\'s try again.');
            }
        }

        $isEmail = false;
        while (!$isEmail) {
            $email = $this->ask('Your email address');
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error('Email isn\'t correct. Let\'s try again.');
            } else {
                $isEmail = true;
            }
        }

        $isPassword = false;
        while(!$isPassword) {
            $password = $this->secret('Your desired password');
            if (strlen($password) >= 6) {
                   $isPassword = true;
            } else {
                $this->error('Please input password length >= 6');
            }
        }

        $passwordConfirmed = false;
        while (!$passwordConfirmed) {
            $confirmation = $this->secret('Again, just to make sure');
            if ($confirmation !== $password) {
                $this->error('That doesn\'t match. Let\'s try again.');
            } else {
                $passwordConfirmed = true;
            }
        }

        User::create([
            'email' => $email,
            'username' => $name,
            'password' => Hash::make($password),
            'remember_token' => str_random(10),
            'active' => 1,
            'role_id' => 1,
            'class_id' => null
        ]);
    }

    /**
     * Seeding data
     */
    private function seedingData() {
        $isSeed = $this->ask('Do you want seeding fake data? (Y/N)');
        if ($isSeed == 'Y' || $isSeed == 'Yes' || $isSeed == 'y') {
            $this->info('Seeding initial data');
            Artisan::call('db:seed', ['--force' => true]);
        } else {
            $this->comment('Data seeded -- skipping');
        }
    }
}
