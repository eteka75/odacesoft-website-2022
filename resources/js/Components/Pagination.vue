<template>
<nav  aria-label="Page navigation example">

   <ul :class="class" class="pagination" v-if="links.length > 3">
      <template v-for="(link, k) in links" :key="k">
         <li class="page-item" v-if="link.url === null" >
            <div  class="page-link text-sm leading-4 text-muted border rounded" v-html="link.label" />
         </li>
         <li class="page-item" v-else >
            <inertia-link class="page-link" :class="{ 'bg-blue-700 text-white': link.active }" :href="link.url" v-html="link.label" />
        </li>
      </template>
  </ul>
</nav>
</template>



<script>

export default {

  props: {

    links: Array,
    class:String,
  },

}

</script>
