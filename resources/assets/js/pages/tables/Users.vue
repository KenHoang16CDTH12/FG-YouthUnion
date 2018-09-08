<template>
  <div class="content-body">
    <form-example/>
    <card-table-user></card-table-user>
  </div>
</template>
<script>
import CardTableUser from './users/CardTable.vue';
import FormExample from '../../components/form-element/FormExample.vue';

export default {
    name: 'dashboard',
    components: { CardTableUser, FormExample }
}
</script>
