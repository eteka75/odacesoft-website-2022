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
                Nos programmes
                <div class="w-24 h-2 d-none mx-auto bg-success mb-2"></div>
              </h1>
              <p class="lead text-lg mb-0 text-white">
                Découvrez nos programmes de formation, d'incubation, et de
                promotion du numérique
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
        <div  v-for="(r,i) in datas.data" :key="r"  >

        <div v-if="(i%2)==0" class="row p-0 m-0" >
            <div  class="col-md-6 hi-min bg-blue-700">
                <div class="container py-14 px-5 ps-lg-32">
                    <h3 class="display-5 text-white">{{r.title}}</h3>
                <p class="  text-white">{{r.title}}</p>
                <div>
                    <inertia-link href="" class="btn bg-none rounded-0 mt-6 text-white border-white border-2">En savoir plus -></inertia-link>
                </div>
                </div>
            </div>
            <div  v-if="r.img" class="col-md-6 p-0 bg-gray-100 hi-min overflow-hidden">
                <img  v-if="r.img"
                            :src="'/' + r.img"
                            class="img-responsive mx-center h-42 p-0"
                          />
            </div>
        </div>
        <div v-else class="row p-0 m-0 ">
            <div  v-if="r.img" class="col-md-6  p-0 hi-min bg-gray-100 overflow-hidden">
            <img
                            v-if="r.img"
                            :src="'/' + r.img"
                            class="img-responsive_ mx-center h-42 p-0"
                          />
            </div>
            <div  class="col-md-6 hi-min bg-danger ">
                <div class="container py-14 px-5 ps-lg-32">
                    <h3 class="display-5 text-white light">{{r.title}}</h3>
                <p class="  text-white">{{r.title}}</p>
                <div>
                    <inertia-link href="" class="btn bg-none rounded-0 mt-6 text-white border-white border-2">En savoir plus -></inertia-link>
                </div>
                </div>
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

import "/storage/vendor/masonry/masonry.min.js";

export default {
  components: {
    Header,
    Notification,
    Pagination,
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
