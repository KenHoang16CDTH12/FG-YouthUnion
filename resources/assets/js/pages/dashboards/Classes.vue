<template>
  <div class="content-body">
    <card-table-class></card-table-class>
  </div>
</template>
<script>
import PullUpCard from './PullUpCard.vue';
import CardTableClass from '../classes/CardTable.vue';

export default {
    name: 'dashboard',
    components: { PullUpCard, CardTableClass }
}
</script>
