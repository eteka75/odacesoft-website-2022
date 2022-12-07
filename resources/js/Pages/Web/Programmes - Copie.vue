<template>
<Head>
    <title>Ressources utiles • Odacesoft</title>
    <meta head-key="description" name="description" content="Découvrez ici quelques ressources utiles pour la communauté." />
  </Head>
  <Header menu="Ressources"/>
  <!--PAGE-->
  <cover-layout>
  <section class="bg-dark msection py-5 py-lg-12">
      <img src="/storage/assets/web/image/header-business.jpg" alt="Image" class="bg-image opacity-50">
      <div class="container height-lg-30">
        <div class="row w-full">
          <div class="col-md-12 col-lg-7col-xl-6">
            <div class="position-relative mt-4 text-center">
            <h1 class="display-4 text-white">
               Nos programmes
               <div class="w-24 h-2 d-none mx-auto bg-success mb-2">
               </div>
            </h1>
            <p class="lead text-lg mb-0 text-white">
              Découvrez nos programmes de formation, d'incubation, et de promotion du numérique
            </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="container-lg max-w-screen-xl mt-8">
      <div class="row">
        <div v-if="datas" class="col-md-8 mx-auto">
            <div  v-for='r in datas.data' :key="r" class="card shadow-sm mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <div class="r-img-cover" :style="'background-image:url(/storage/assets/web/image/file-icones/'+r.type+'.png)'">

                            <img v-if="r.img"
                                    :src="'/'+r.img"
                                    class="img-responsive rounded-4 p-2"

                                    />
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card-body ">
                        <div class="h-12">
                            <h4 v-if="r.title"> <inertia-link class="text-dark"  v-if="r.fichier" :href="route('get-programme',r.slug)" target="_blank"> {{liveSubstr(r.title,0,60,'')}}</inertia-link></h4>
                            </div>
                        <p v-if="r.resume" class="text-sm text-muted">{{liveSubstr(r.resume,0,255)}}</p>
                        <hr class="h-0  my-3 p-0">
                        <inertia-link class="btn text-primary  border border-primary btn-sm "  v-if="r.slug" :href="route('get-programme',r.slug)" target="_blank"> Plus d'infos -></inertia-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="col-md-12 py-8 mx-auto text-center">
        <pagination class="mt-6 justify-content-center" :links="datas.links" />
    </div>
     </div>
    </div>
  </cover-layout>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import Header from "@/Components/Header";
import Notification from "@/Components/Notification";
import Footer from "@/Components/Footer";
import CoverLayout from "@/Layouts/CoverLayout";

import Pagination from "@/Components/Pagination";

export default {
  components: {
    Header,
    Notification,
    Pagination,
    Footer,
    CoverLayout,
  },
  props: ['datas'],
  mounted() {
      console.log(this.datas)
  }
};
</script>

<style scoped>
    .r-img-cover{
        min-height: 180px;
        background-color: #fafafa;
        background-size: 80px auto;
        background-repeat: no-repeat;
        background-position: center center;
    }

















     #services-particuliers{
    background:url('../../../../public/storage/assets/web/image/fondp1.jpg') #111 no-repeat;
    background-position: 0% 0%;
  background-size: 100% auto;
  min-height: 350px;
  }
  .height-lg-30 {
    min-height: 22vh;
    width:100%;
}
[class*="height-"] {
    display: flex;
}.bg-image:not([class*="absolute"]) {
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
  position: relative; }

.bg-image {
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 0; }
  .bg-image:not([class*='absolute']) {
    position: absolute; }
  .bg-image + .card-body {
    position: relative;
    z-index: 1; }

img.bg-image {
  object-fit: cover; }



section {
    position: relative;
}
</style>
