<template>
  <div class="content-body">
    <card-table-hoc-ky></card-table-hoc-ky>
  </div>
</template>
<script>
import CardTableHocKy from './hockys/CardTable.vue';

export default {
    name: 'dashboard',
    components: { CardTableHocKy }
}
</script>
