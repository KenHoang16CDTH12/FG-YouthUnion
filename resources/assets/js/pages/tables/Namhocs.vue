<template>
  <div class="content-body">
    <card-table-nam-hoc></card-table-nam-hoc>
  </div>
</template>
<script>
import CardTableNamHoc from './namhocs/CardTable.vue';

export default {
    name: 'dashboard',
    components: { CardTableNamHoc }
}
</script>
