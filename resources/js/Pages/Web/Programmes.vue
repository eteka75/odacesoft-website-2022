<template>
  <Head>
    <title>Programmes • Odacesoft</title>
    <meta
      head-key="description"
      name="description"
      content="Découvrez ici quelques ressources utiles pour la communauté."
    />
  </Head>
  <Header menu="Programmes" />
  <!--PAGE-->
  <cover-layout>
    <section class="bg-dark msection py-5 py-lg-12">
      <img
        src="/storage/assets/web/image/bg-fill-particuliers0.jpg"
        alt="Image"
        class="bg-image opacity-50"
      />
      <div class="container height-lg-30">
        <div class="row w-full">
          <div class="col-md-12 col-lg-7col-xl-6">
            <div class="position-relative mt-4 text-center">
              <h1 class="display-4 text-white">
                Nos projets & programmes
                <div class="w-24 h-2 d-none mx-auto bg-success mb-2"></div>
              </h1>
              <p class="lead text-lg mb-0 text-white">
                Découvrez nos projets et nos programmes que nous proposons pour la communauté
              </p>
              </div>
          </div>
        </div>
      </div>
    </section>
        <div  class="container"  >

        <div class="row  mt-0 " >
            <div v-for="(r,i) in datas.data" :key="r"  class="col-md-9 clearfix flex rounded-1_ border-b border-top shadow-lg-hover   _shadow-2-hover mx-auto py-3 px-6 shadow-1_ card_ mb-5mt-5">
                <div class="row ">

                <div class="col-md-4 col-12  " v-if="i%2==0">
                <div  v-if="r.img" class="py-4" >
                        <inertia-link :href="route('get-projet',r.slug)" class="lead_ text-muted"><img  v-if="r.img"
                                    :src="'/' + r.img"
                                    class="img-responsive shadow-3_ rounded-3_ mx-center h-42 p-0"
                                /></inertia-link>
                    </div>
                </div>
                <div class="col-md-8 col-12 order-1 order-md-2">
                    <div class="py-8  px-5ps-lg-32 min-h-56_">

                        <h3 class="display-6 text-blue-800"><inertia-link class="text-gray-800 text-black-50-hover text-heading "  :href="route('get-projet',r.slug)">{{r.title}}</inertia-link></h3>
                        <p ><inertia-link :href="route('get-projet',r.slug)" class=" text-muted text-primary-hover">{{r.resume}}</inertia-link></p>
                        <p>
                            <inertia-link :href="route('get-projet',r.slug)" class="btn border-0 border-0-hover btn-default  text-primary">En savoir plus -></inertia-link>

                        </p>
                        <!--div>
                                <inertia-link :href="route('get-projet',r.slug)" class="btn border-1 mt-6 btn-primary border-2">En savoir plus -></inertia-link>
                            </div-->
                    </div>
                </div>
                <div class="col-md-4 col-12" v-if="i%2!=0">
                <div  v-if="r.img" class="py-4" >
                        <inertia-link :href="route('get-projet',r.slug)" class="lead text-muted"><img  v-if="r.img"
                                    :src="'/' + r.img"
                                    class="img-responsive shadow-3_ rounded-3_ mx-center h-42 p-0"
                                /></inertia-link>
                    </div>
                </div>
            </div>


            </div>

        </div>
         <div class="row">
            <div class="col-md-12 py-8 text-center">
               <simple-pagination class="mt-6 justify-content-center" :links="datas" />
            </div>
        </div>

    </div>
  </cover-layout>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import Header from "@/Components/Header";
import Notification from "@/Components/Notification";
import Footer from "@/Components/Footer";
import CoverLayout from "@/Layouts/CoverLayout";
import Pagination from "@/Components/Pagination";

import SimplePagination from "@/Components/SimplePagination";

import "/storage/vendor/masonry/masonry.min.js";

export default {
  components: {
    Header,
    Notification,
    Pagination,
    SimplePagination,
    Footer,
    CoverLayout,
  },
  props: ["datas"],
  mounted() {
    console.log(this.datas);
  },
};
</script>

<style scoped>
.r-img-cover {
  overflow: hidden;
  background-color: #fafafa;
  background-size: 80px auto;
  background-repeat: no-repeat;
  background-position: center center;
}

#services-particuliers {
  background: url("../../../../public/storage/assets/web/image/fondp1.jpg") #111
    no-repeat;
  background-position: 0% 0%;
  background-size: 100% auto;
  min-height: 350px;
}
.height-lg-30 {
  min-height: 22vh;
  width: 100%;
}
[class*="height-"] {
  display: flex;
}
.bg-image:not([class*="absolute"]) {
  position: absolute;
}
img.bg-image {
  object-fit: cover;
}
.bg-image {
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 0;
}
img {
  max-width: 100%;
}
img {
  vertical-align: middle;
  border-style: none;
}

section {
  position: relative;
}

.bg-image {
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 0;
}
.bg-image:not([class*="absolute"]) {
  position: absolute;
}
.bg-image + .card-body {
  position: relative;
  z-index: 1;
}

img.bg-image {
  object-fit: cover;
}

section {
  position: relative;
}
</style>
