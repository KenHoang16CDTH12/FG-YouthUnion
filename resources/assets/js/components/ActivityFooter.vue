<template>
<!-- ============================================ -->
<!-- Begin Footer -->
<!-- ============================================ -->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; {{ year }} <a class="text-bold-800 grey darken-2" href="https://github.com/KenHoang16CDTH12/FG-YouthUnion"
        target="_blank">FG-YouthUnion </a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">FGDev - Made with <i class="ft-heart pink"></i></span>
    </p>
</footer>
<!-- ============================================ -->
<!-- End Footer -->
<!-- ============================================ -->
</template>

<script>
export default {
  data() {
    return {
      year: ''
    }
  },
  created() {
      this.year = new Date().getFullYear();
  }
}
</script>
