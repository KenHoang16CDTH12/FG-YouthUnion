<template>
  <li class="dropdown dropdown-user nav-item">
  <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
      <span class="mr-1">{{ $t('message.hello') }}
      <span class="user-name text-bold-700">FGDev Member</span>
      </span>
      <span class="avatar avatar-online">
      <img src="../../../_assets/images//portrait/small/avatar-s-19.png" alt="avatar"><i></i></span>
  </a>
  <div class="dropdown-menu dropdown-menu-right">
      <a class="dropdown-item" href="#"><i class="ft-user"></i> Profile</a>
      <div class="dropdown-divider"></div><a @click="handleLogout()" class="dropdown-item"><i class="ft-power"></i> Logout</a>
  </div>
  </li>
</template>
<script>
export default {
  methods: {
    handleLogout() {
      this.$store.dispatch('logout').then(() => {
        location.reload()// In order to re-instantiate the vue-router object to avoid bugs
      })
    },
  }
}
</script>
