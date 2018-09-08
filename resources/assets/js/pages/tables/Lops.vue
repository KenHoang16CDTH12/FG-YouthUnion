<template>
  <div class="content-body">
    <card-table-lop></card-table-lop>
  </div>
</template>
<script>
import CardTableLop from './lops/CardTable.vue';

export default {
    name: 'dashboard',
    components: { CardTableLop }
}
</script>
