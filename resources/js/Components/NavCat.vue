<template>
     <nav v-if="data" class="navbar navbar-expand-lg navbar-sm py-0 navbar-light bg-white shadow-1 justify-content-center">
  <div class="container-xxl">
    <div class="nav-bar-right row" id="navbarNav">
      <ul id="blogNav" class="mb-0 list-inline p-0 text-xs d-flex justify-content-md-center">
        <li  v-if="catActive" class="list-inline-item mx-0 font-bold active"  >

          <inertia-link v-if="catActive.slug"  class="nav-link text-nowrap px-3 text-center py-2 text-sm font-regular"  :href="route('blog.cat.show',catActive.slug)">{{catActive.nom}}</inertia-link>

        </li>
        <li v-for="cat in data" :key="cat" class="list-inline-item mx-0 " :class="(catActive.url==cat.slug)?'active': ''" >

          <inertia-link v-if="cat && cat.slug" class="nav-link text-nowrap px-3 text-sm text-center py-2 font-regular"  :href="route('blog.cat.show',cat.slug)">{{cat.nom}}</inertia-link>

        </li>
        <li class="list-inline-item mx-0 px-1">
        <inertia-link title="Toutes les catégories" class="nav-link text-sm text-muted py-2"  :href="route('blog.cats.show')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid" viewBox="0 0 16 16">
  <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
</svg> </inertia-link>
        </li>

      </ul>
    </div>
  </div>
  <slot></slot>
</nav>
</template>
<script>
export default {
    data() {
    return {
      data: null,
      catActive: null,

      }
    },
    props: ['datas'],
    mounted(){
        this.data= this.datas[0]?this.datas[0]:null;
        this.catActive= this.datas[1]?this.datas[1]:null;
        //alert(this.url)
       // console.log(this.data);
        console.log(this.datas);
    }
}
</script>
