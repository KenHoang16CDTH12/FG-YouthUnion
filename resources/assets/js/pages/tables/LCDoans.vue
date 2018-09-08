<template>
  <div class="content-body">
    <card-table-lcdoan></card-table-lcdoan>
  </div>
</template>
<script>
import CardTableLcdoan from './lcdoans/CardTable.vue';

export default {
    name: 'dashboard',
    components: { CardTableLcdoan }
}
</script>
