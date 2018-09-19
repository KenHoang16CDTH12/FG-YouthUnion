<template>
<!-- ============================================ -->
<!-- Begin Header -->
<!-- ============================================ -->
  <div class="card-header card-head-inverse bg-info">
    <h4 class="card-title text-white">{{ title }}</h4>
    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
    <div class="heading-elements">
      <ul class="list-inline mb-0">
        <back-button></back-button>
        <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
        <!-- <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li> -->
        <!-- <li><a data-action="expand"><i class="ft-maximize"></i></a></li> -->
        <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
      </ul>
    </div>
  </div>
<!-- ============================================ -->
<!-- End Header -->
<!-- ============================================ -->
</template>
<script>

export default {
    name: 'card-header',
    data() {
      return {
      }
    },
    props: {
      title: String,
    }
};
</script>
