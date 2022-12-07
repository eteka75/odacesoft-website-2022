<template>
  <div >
    <div v-if="$page.props.flash.notification && show" class="alert alert-success bg-primary text-white rounded-0  border-1 border-primary mb-0 alert-dismissible fade show" role="alert">
       <div class="container">
        <div class="row">
            <div class="col-md-12">
            <strong> <i class="fa fa-check-circle" aria-hidden="true"></i> Bravo</strong>
                <p v-html="$page.props.flash.notification"></p>
            </div>
        </div>
       </div> 
        <button type="button" class="btn-close text-xs text-success" data-bs-dismiss="alert" @click="show = false" aria-label="Close"></button>
    </div>
  <div v-if="$page.props.flash.success && show" class="alert alert-success bg-success text-white rounded-0  border-1 border-success mb-0 alert-dismissible fade show" role="alert">
       <div class="container">
        <div class="row">
            <div class="col-md-12">
            <strong> <i class="fa fa-check-circle" aria-hidden="true"></i> Félicitations</strong>
                <p v-html="$page.props.flash.success"></p>
            </div>
        </div>
       </div> 
        <button type="button" class="btn-close text-xs text-success" data-bs-dismiss="alert" @click="show = false" aria-label="Close"></button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      show: true,
    }
  },
  watch: {
    '$page.props.flash': {
      handler() {
        this.show = true
      },
      deep: true,
    },
  },
}
</script>
