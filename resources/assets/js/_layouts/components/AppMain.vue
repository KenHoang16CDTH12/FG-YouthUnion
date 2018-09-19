<template>
  <div class="app-content content">
    <div class="content-wrapper">
      <!-- ============================================ -->
      <!-- Content Header-->
      <!-- ============================================ -->
      <tags-view/>
      <bread-crumb/>
      <!-- ============================================ -->
      <!-- Content Body-->
      <!-- ============================================ -->
      <transition name="fade-transform" mode="out-in">
        <keep-alive :include="cachedViews">
          <router-view :key="key"/>
        </keep-alive>
      </transition>
    </div>
  </div>
</template>

<script>
import BreadCrumb from './BreadCrumb.vue'
import TagsView from './TagsView.vue'

export default {
  name: 'AppMain',
  components: {
    BreadCrumb,
    TagsView
  },
  computed: {
    cachedViews() {
      return this.$store.state.tagsView.cachedViews
    },
    key() {
      return this.$route.fullPath
    }
  }
}
</script>

<style scoped>
.app-main {
  /*84 = navbar + tags-view = 50 +34 */
  min-height: calc(100vh - 84px);
  width: 100%;
  position: relative;
  overflow: hidden;
}
</style>

