<template>
  <!-- ============================================ -->
  <!-- CardFooter -->
  <!-- ============================================ -->
  <div class="card-footer border-0 text-muted">
    <span class="danger"><i class="la la-th-large"></i>
    {{ cardFooterText() }}</span>
  </div>
  <!-- ============================================ -->
  <!-- CardFooter -->
  <!-- ============================================ -->
</template>
<script>
export default {
    props: {
      cardFooterText: Function
    },
}
</script>
