<template>
  <div id="apsp">
  <input class="datepicker"  :type="type" :class="class"  data-provide="datepicker">
</div>
</template>

<script>
import '/storage/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'
import  '/storage/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css'
 /* import { VueDatePicker } from '@mathieustan/vue-datepicker';
import '@mathieustan/vue-datepicker/dist/vue-datepicker.min.css';
*/
  export default {
    props: {
      type: {
        type: String,
        default: 'submit',
      },
      class: {
        type: String,
        default: 'form-control',
      },
    }
  ,
  mounted(){
      $('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
        startDate: '-3d'
    });
  },
  }
</script>
<style >
.datepicker-dropdown {
background-color: #ffffff;
    font-size: .875rem;
    color: #525f7f;
    text-align: left;
    list-style: none;
    box-shadow: 0 3px 10px #e8e8e8;
    }

</style>
