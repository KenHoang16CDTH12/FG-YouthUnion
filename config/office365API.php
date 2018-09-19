<?php

return [
    /**
     * OFFICE 365 CONNECTION CREDENTIALS/ROUTES.
     */

    //#############DINAMIC FIELDS##########################
    /**
    * CLIENT ID
    */
    'CLIENT_ID' => '9573bf09-b17d-4f57-a40d-dd6551fd8ca5',
    /**
    * CLIENT SECRET
    */
    'CLIENT_SECRET' => 'dltgpYHQVJ22@%%eoXQ609*',
    /**
    * REDIRECT URI WHERE THE CONNECTION COMES FROM WHEN THE CONN IS FINISHED
    */
    'REDIRECT_URI' => 'http://127.0.0.1:8000/auth/office365/get',

    //#############STATIC FIELDS##########################
    /**
    * AUTHORITY URL
    */
    'AUTHORITY_URL' => 'https://login.microsoftonline.com/common',

    /**
    * AUTHORIZE_ENDPOINT
    */
    'AUTHORIZE_ENDPOINT' => '/oauth2/v2.0/authorize',

    /**
    * TOKEN_ENDPOINT
    */
    'TOKEN_ENDPOINT' => '/oauth2/v2.0/token',

    /**
    * RESOURCE_ID
    */
    'RESOURCE_ID' => 'https://graph.microsoft.com',

    /**
    * SENDMAIL_ENDPOINT
    */
    'SENDMAIL_ENDPOINT' => '/v1.0/me/sendmail',

    /**
    * SCOPES
    */
    'SCOPES' => 'openid profile mail.send',

];
