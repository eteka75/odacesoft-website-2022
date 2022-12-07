<template>
  <button :type="type" :class="class">
  <!--svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg-->
        <img v-if="loading"  src="../../../public/storage/assets/web/svg/loading-puff.svg" width="25" class="mx-2" alt="...">
   <slot></slot>
  </button>
</template>

<script>
  export default {
    props: {
      type: {
        type: String,
        default: 'submit',
      },
      class: {
        type: String,
        default: 'btn btn-danger',
      },
      loading: {
        type: Boolean,
        default: false,
      },
    }
  }
</script>
<style >
.animate-spin {
    animation: spin 1s linear infinite;
}

@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}


</style>
