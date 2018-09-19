<template>
   <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false"><i class="la la-language"></i><span class="selected-language"></span></a>
    <div class="dropdown-menu" aria-labelledby="dropdown-flag">
        <button :disabled="language==='en'" @click.prevent="handleSetLanguage('en')" class="dropdown-item"><i class="flag-icon flag-icon-gb"></i> English</button>
        <button :disabled="language==='vi'" @click.prevent="handleSetLanguage('vi')" class="dropdown-item"><i class="flag-icon flag-icon-vn"></i> Vietnamese</button>
    </div>
  </li>
</template>

<script>
export default {
  data() {
    return {
    }
  },
  computed: {
    language() {
      return this.$store.getters.language
    }
  },
  methods: {
    handleSetLanguage(lang) {
      this.$i18n.locale = lang
      this.$store.dispatch('setLanguage', lang)
      this.$message({
        message: 'Switch Language Success',
        type: 'success'
      })
    }
  }
}
</script>

<style scoped>
.international-icon {
  font-size: 20px;
  cursor: pointer;
  vertical-align: -5px!important;
}
</style>

