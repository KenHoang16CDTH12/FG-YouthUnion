<template>
  <div class="content-body">
    <card-table-lcdoan></card-table-lcdoan>
  </div>
</template>
<script>
import PullUpCard from './PullUpCard.vue';
import CardTableLcdoan from '../lcdoans/CardTable.vue';

export default {
    name: 'dashboard',
    components: { PullUpCard, CardTableLcdoan }
}
</script>
