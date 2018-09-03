<template>
<div>
    <!-- ============================================ -->
    <!-- Flexbox-container -->
    <!-- ============================================ -->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <!-- ============================================ -->
        <!-- Content-body -->
        <!-- ============================================ -->
        <section class="flexbox-container">
            <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                    <div class="p-1">
                        <img src="app-assets/images/logo/logo-dark.png" alt="logo">
                    </div>
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Login With Email Office365</span>
                    </h6>
                </div>
                <div class="card-content">
                    <div class="card-body pt-0 text-center">
                    <a href="#" class="btn btn-social mb-1 mr-1 btn-outline-google">
                        <span class="la la-envelope"></span>
                        <span class="px-1">Office365</span>
                    </a>
                    </div>
                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2">
                    <span>OR</span>
                    </p>
                    <div class="card-body pt-0">
                    <form @submit.prevent="handleSubmit" class="form-horizontal">
                        <fieldset class="form-group floating-label-form-group">
                        <label for="email">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email Address" v-model="email" :class="{ 'is-invalid': submitted && !email }">
                        <div v-show="submitted && !email" class="invalid-feedback">Email is required</div>
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group mb-1">
                        <label for="password">Enter Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" v-model="password" :class="{ 'is-invalid': submitted && !password }">
                        <div v-show="submitted && !password" class="invalid-feedback">Password is required</div>
                        </fieldset>
                        <div class="form-group row">
                        <div class="col-md-6 col-12 text-center text-sm-left">
                            <fieldset>
                            <input type="checkbox" id="remember-me" class="chk-remember" v-model="remember_me">
                            <label for="remember-me"> Remember Me</label>
                            </fieldset>
                        </div>
                        <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><router-link to="/forgot-password" class="card-link">Forgot Password?</router-link></div>
                        </div>
                        <button type="submit" class="btn btn-outline-info btn-block"  :disabled="status.loggingIn"><i class="ft-unlock"></i> Login</button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
      </div>
    </div>
    <!-- ============================================ -->
    <!-- Flexbox-container -->
    <!-- ============================================ -->
</div>
</template>
<script>
import { mapState, mapActions } from 'vuex'

export default {
    data () {
        return {
            email: '',
            password: '',
            remember_me: false,
            submitted: false
        }
    },
    computed: {
        ...mapState('account', ['status'])
    },
    created () {
        // reset login status
        this.logout();
    },
    methods: {
        ...mapActions('account', ['login', 'logout']),
        handleSubmit(e) {
            this.submitted = true;
            const { email, password, remember_me } = this;
            if (email && password) {
                this.login({ email, password, remember_me })
            }
        }
    }
};
</script>
