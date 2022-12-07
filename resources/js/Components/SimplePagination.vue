<template>
  <div  v-if="links && (links.next_page_url !=null || links.prev_page_url !=null)">
    <nav aria-label="Page navigation example">
        <ul v-if="links" :class="class" class="pagination">
            <li v-if="links.prev_page_url" class="page-item" ><inertia-link :disabled="links.prev_page_url" class="page-link" :href="links.prev_page_url"><i class="fa fa-chevron-left" aria-hidden="true"></i> Précédent</inertia-link></li>
            <li v-else class="page-item" ><span disabled="disabled" class="page-link text-muted"><i class="fa fa-chevron-left" aria-hidden="true"></i> Précédent</span></li>

            <li  v-if="links.next_page_url" class="page-item"><inertia-link :disabled="links.current_page==links.to" :href="links.next_page_url" class="page-link">Suivant  <i class="fa fa-chevron-right" aria-hidden="true"></i> </inertia-link></li>
            <li  v-else class="page-item "><span disabled="disabled" class="page-link text-muted">Suivant <i class="fa fa-chevron-right" aria-hidden="true"></i> </span></li>
        </ul>
    </nav>
  </div>
</template>

<script>
export default {
  props: {
    links: Array,
    class:String,
  },
  mounted: function () {
      //alert(this.links.toString());
  }
}
</script>
