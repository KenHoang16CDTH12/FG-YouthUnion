<template>
    <!-- ============================================ -->
    <!-- Flexbox-container -->
    <!-- ============================================ -->
    <div class="login-container">
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
                        <img src="../../_assets/images/logo/logo-dark.png" alt="logo">
                    </div>
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Login With Email Office365</span>
                    </h6>
                </div>
                <div class="card-content">
                    <div class="card-body pt-0 text-center">
                    <a href="auth/login365" class="btn btn-social mb-1 mr-1 btn-outline-google">
                        <span class="la la-envelope"></span>
                        <span class="px-1">Office365</span>
                    </a>
                    </div>
                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2">
                    <span>OR</span>
                    </p>
                    <div class="card-body pt-0">
                    <form :model="loginForm" @submit.prevent="handleLogin" class="form-horizontal">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">{{ $t('login.email') }}</label>
                          <input type="email" class="form-control" :placeholder="$t('login.yourEmail')" v-model="loginForm.email">
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group mb-1">
                          <label for="password">{{ $t('login.password') }}</label>
                          <input type="password" class="form-control" :placeholder="$t('login.yourPassword')" v-model="loginForm.password" >
                        </fieldset>
                        <div class="form-group row">
                          <div class="col-md-6 col-12 text-center text-sm-left">
                            <fieldset>
                            <input type="checkbox" id="remember-me" class="chk-remember" v-model="loginForm.remember_me">
                            <label for="remember-me"> Remember Me</label>
                            </fieldset>
                          </div>
                          <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><router-link to="/forgot-password" class="card-link">Forgot Password?</router-link>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
    </div>
    <!-- ============================================ -->
    <!-- Flexbox-container -->
    <!-- ============================================ -->
</template>
<script>
export default {
    data () {
        return {
            loginForm: {
                username: '',
                password: '',
                remember_me: false,
            },
            passwordType: 'password',
            loading: false,
            showDialog: false,
            redirect: undefined
        }
    },
    watch: {
       $route: {
          handler: function(route) {
            this.redirect = route.query && route.query.redirect
          },
          immediate: true
        }
    },
    created () {
        // window.addEventListener('hashchange', this.afterQRScan)
    },
    destroyed() {
        // window.removeEventListener('hashchange', this.afterQRScan)
    },
    methods: {
        showPwd() {
          if (this.passwordType === 'password') {
            this.passwordType = ''
          } else {
            this.passwordType = 'password'
          }
        },
        handleLogin() {
          this.loading = true
          this.$store.dispatch('login', this.loginForm)
            .then(() => {
              this.loading = false
              //this.$router.push({ path: this.redirect || '/' })
              location.reload()
          })
            .catch(() => {
            this.loading = false
          })
        },
        afterQRScan() {
          // const hash = window.location.hash.slice(1)
          // const hashObj = getQueryObject(hash)
          // const originUrl = window.location.origin
          // history.replaceState({}, '', originUrl)
          // const codeMap = {
          //   wechat: 'code',
          //   tencent: 'code'
          // }
          // const codeName = hashObj[codeMap[this.auth_type]]
          // if (!codeName) {
          //   alert('第三方登录失败')
          // } else {
          //   this.$store.dispatch('LoginByThirdparty', codeName).then(() => {
          //     this.$router.push({ path: '/' })
          //   })
          // }
        }
    }
};
</script>
