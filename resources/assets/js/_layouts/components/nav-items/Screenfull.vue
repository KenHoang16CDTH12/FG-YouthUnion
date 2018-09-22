<template>
  <!-- =================================== -->
  <!-- Screenfull -->
  <!-- =================================== -->
  <li class="nav-item d-none d-md-block">
    <a class="nav-link nav-link-expand" @click="screenFull"><i class="ficon ft-maximize"></i>
    </a>
  </li>
</template>
<script>
import screenfull from 'screenfull';
export default {
  methods: {
    screenFull() {
      if (!screenfull.enabled) {
        this.$message({
          message: 'you browser can not work',
          type: 'warning'
        })
        return false
      }
      screenfull.toggle()
    }
  }
}
</script>
