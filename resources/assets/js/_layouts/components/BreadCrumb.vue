<template>
<div class="content-header row ">
  <div class="content-header-left col-md-12 col-12 breadcrumb-new">
    <h3 class="content-header-title mb-0 d-inline-block box-shadow-0">{{ generateTitle(lastLevelList) }}</h3>
    <div class="row breadcrumbs-top d-inline-block">
      <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" v-for="(item,index) in levelList" v-if="item.meta.title" :key="item.path">
               <span v-if="item.redirect==='noredirect'||index==levelList.length-1" class="no-redirect">{{ generateTitle(item.meta.title) }}</span>
               <router-link v-else :to="item.redirect||item.path">{{ generateTitle(item.meta.title) }}</router-link>
            </li>
          </ol>
      </div>
    </div>
    <div class="card box-shadow-0">
      <div class="card-content">
         <tags-view/>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import TagsView from './TagsView.vue'
import { generateTitle } from '../../_utils/index'

export default {
  name: 'bread-crumb',
  components: {
    TagsView
  },
  data() {
    return {
      levelList: null
    }
  },
  watch: {
    $route() {
      this.getBreadcrumb()
    }
  },
  computed: {
    lastLevelList() {
      return this.levelList[this.levelList.length - 1].meta.title;
    }
  },
  created() {
    this.getBreadcrumb()
  },
  methods: {
    generateTitle,
    getBreadcrumb() {
      let matched = this.$route.matched.filter(item => item.name)
      const first = matched[0]
      this.levelList = matched
    },
  }
}
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
  .app-breadcrumb.el-breadcrumb {
    display: inline-block;
    font-size: 14px;
    line-height: 50px;
    margin-left: 10px;
    .no-redirect {
      color: #97a8be;
      cursor: text;
    }
  }
</style>
