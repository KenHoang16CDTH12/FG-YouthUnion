<template>
<!-- ============================================ -->
<!-- Begin Paginator -->
<!-- ============================================ -->
<div class="row">
  <div class="col-md-12">
    <div class="text-center">
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center pagination-round">
          <template v-for="page in range(0, last_page + 1)">
            <template v-if="page === 0">
            <li class="page-item" @click="getDataWithEntries(first_link)">
              <a class="page-link" aria-label="First">
                <span aria-hidden="true">&laquo; First</span>
                <span class="sr-only">First</span>
              </a>
            </li>
            </template>
            <template v-else-if="page === (last_page + 1)">
            <li class="page-item" @click="getDataWithEntries(last_link)">
              <a class="page-link" aria-label="Last">
                <span aria-hidden="true">Last &raquo;</span>
                <span class="sr-only">Last</span>
              </a>
            </li>
            </template>
            <template v-else>
            <li v-bind:class="activeClassPaginate(page)" @click="getDataWithEntries(path + '?page=' + page)"><a class="page-link">{{ page }}</a></li>
            </template>
          </template>
        </ul>
      </nav>
    </div>
  </div>
</div>
<!-- ============================================ -->
<!-- End Paginator -->
<!-- ============================================ -->
</template>

<script>
export default {
    data() {
      return {
      }
    },
    props: {
      current_page: Number,
      last_page: Number,
      first_link: String,
      last_link: String,
      path: String,
      getDataWithEntries: Function
    },
    computed: {
    },
    created () {
    },
    methods: {
        range : function (start, end) {
          return Array(end - start + 1).fill().map((_, idx) => start + idx)
        },
        activeClassPaginate: function(numPage) {
          if (this.current_page == numPage) {
            return 'page-item active';
          } else {
            return 'page-item';
          }
        },
    }

};
</script>
