<template>
  <div class="content-body">
    <card-table-khoa></card-table-khoa>
  </div>
</template>
<script>
import PullUpCard from './PullUpCard.vue';
import CardTableKhoa from '../khoas/CardTable.vue';

export default {
    name: 'dashboard',
    components: { PullUpCard, CardTableKhoa }
}
</script>
