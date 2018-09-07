<template>
  <div class="content-body">
    <pull-up-card></pull-up-card>
    <card-table-user></card-table-user>
  </div>
</template>
<script>
import PullUpCard from './PullUpCard.vue';
import CardTableUser from '../users/CardTable.vue';

export default {
    name: 'dashboard',
    components: { PullUpCard, CardTableUser }
}
</script>
