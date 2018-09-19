<template>
<div class="card-footer bg-transparent">
  <div class="row">
    <p class="text-muted text-center col-12 py-1">© {{ year }} <a href="#">FG-YouthUnion </a>Crafted with <i class="ft-heart pink"> </i> by <a href="#"
      target="_blank">FGDev</a></p>
    <div class="col-12 text-center">
      <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook">
        <span class="la la-facebook"></span>
      </a>
      <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter">
        <span class="la la-twitter"></span>
      </a>
      <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-linkedin">
        <span class="la la-linkedin font-medium-4"></span>
      </a>
      <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-github">
        <span class="la la-github font-medium-4"></span>
      </a>
    </div>
  </div>
</div>
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
