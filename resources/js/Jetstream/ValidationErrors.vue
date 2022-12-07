<template>
    <div class="alert alert-danger text-sm p-2 px-6  mb-3 alert-dismissible fade show "    role="alert" v-if="hasErrors">
    
        <div class="font-weight-bold"><b>Oups! Quleque chose s'est mal passé.</b></div>

        <ul class="list-unstyled mb-0">
            <li v-for="(error, key) in errors" :key="key">- {{ error }}</li>
        </ul>
     <button type="button" class="btn-close text-xs " data-bs-dismiss="alert" @click="show = false" aria-label="Close"></button>
    </div>
</template>

<script>
    export default {
        computed: {
            errors() {
                return this.$page.props.errors
            },

            hasErrors() {
                return Object.keys(this.errors).length > 0;
            },
        }
    }
</script>
