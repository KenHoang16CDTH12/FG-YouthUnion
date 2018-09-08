<template>
  <div class="content-body">
    <card-table-khoa></card-table-khoa>
  </div>
</template>
<script>
import CardTableKhoa from './khoas/CardTable.vue';

export default {
    name: 'dashboard',
    components: { CardTableKhoa }
}
</script>
