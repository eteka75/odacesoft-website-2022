<template>
  <div >
    <div v-if="$page.props.flash.success && show" class="alert alert-success  border-1 border-success mb-3 alert-dismissible fade show" role="alert">
        <strong> <i class="fa fa-check-circle" aria-hidden="true"></i> Bravo</strong><br>{{ $page.props.flash.success }}
        <button type="button" class="btn-close text-xs text-success" data-bs-dismiss="alert" @click="show = false" aria-label="Close"></button>
    </div>
     <div v-if="$page.props.flash.message && show" class="alert alert-primary border-1 border-primary___ mb-3 alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-info-circle" aria-hidden="true"></i> Information</strong><br>{{ $page.props.flash.message }}
        <button type="button" class="btn-close text-xs" data-bs-dismiss="alert" @click="show = false" aria-label="Close"></button>
    </div>
     <div v-if="$page.props.flash.danger && show" class="alert  bg-danger text-white border-1 border-danger mb-3 alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-allergies    "></i> Erreur </strong><br>{{ $page.props.flash.danger }}
        <button type="button" class="btn-close text-xs " data-bs-dismiss="alert" @click="show = false" aria-label="Close"></button>
    </div>
     <div v-if="$page.props.flash.warning  && show" class="alert  alert-warning border-1 border-warning mb-3 alert-dismissible fade show" role="alert">
        <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert </strong><br>{{ $page.props.flash.warning }}
        <button type="button" class="btn-close text-xs text-success" data-bs-dismiss="alert" @click="show = false" aria-label="Close"></button>
    </div>
     <div v-if="$page.props.flash.error && show" class="alert alert-danger border-1 border-danger mb-3 alert-dismissible fade show" role="alert">
        <strong> <i class="fa fa-bolt" aria-hidden="true"></i> Attention</strong><br>{{ $page.props.flash.error }}
        <button type="button" class="btn-close text-xs" data-bs-dismiss="alert" @click="show = false" aria-label="Close"></button>
    </div>
    <!--div v-if="($page.props.flash || Object.keys($page.props.errors).length > 0) && show" role="alert" class="alert alert-danger bg-danger alert-dismissible fade show flex items-center justify-between=max-w-3xl">
      <div class="flex items-center">
        <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="d-flex float-left text-white float-start w-4 h-4 bi bi-exclamation-square" viewBox="0 0 16 16">
        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
        </svg>
        <div v-if="$page.props.flash" class="py-4 text-white text-sm font-medium">
         {{ $page.props.flash.error }}</div>
        <div v-else class="py-4  text-white text-sm font-medium">
          <span v-if="Object.keys($page.props.errors).length === 1">Une erreur est survenue.</span>
          <span v-else>Il y a {{ Object.keys($page.props.errors).length }} erreurs à corriger.</span>
        </div>
      </div>
      <button type="button" class="btn-close text-xs text-success" data-bs-dismiss="alert" aria-label="Close"></button>
    </div-->
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
