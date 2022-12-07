<template>
   <Header menu="Produits"/>
   <Head>
    <title>Services offets aux particuliers • Odacesoft</title>
    <meta head-key="description" name="description" content="Odacesoft est une entreprise informatique spécialisée dans l'ingénierie Informatique et l'incubation d'idées innovantes." />
  </Head>
  <cover-layout>
    <!--div class="bg-soft-success_ " id="services-particuliers">
      <div class="container max-w-screen-xl">
        <div class="row">
          <div class="col-md-12 text-center align-items-baseline col-xl-12">
            <div class="pt-6 pb-8  pt-xl-20 pb-xl-8">
              <h1 class="lh-tight text-white ls-tight tb-shadow display-5 mt-16 mb-1">
              Services offerts aux particuliers
              </h1>
              <p class="text-lg  text-white px-lg-56 px-md-30 tb-shadow">
                Pour mieux réussir dans votre prochain projet, notre coup de main pourra changer positivement vos résultats.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div -->
    <section class="bg-dark msection py-5 py-lg-12">
      <img src="/storage/assets/web/image/header-business.jpg" alt="Image" class="bg-image opacity-50">
      <div class="container height-lg-30">
        <div class="row w-full">
          <div class="col-md-8 col-lg-7 col-xl-6">
            <div class="position-relative mt-4">
            <h1 class="display-4 text-white">
               Services aux particuliers
               <div class="w-24 h-2 bg-warning">
               </div>
            </h1>
            <p class="lead text-lg mb-0 text-white">
              Donnez une nouvelle vision à votre personnage pour accroitre votre notoriété.
            </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
        <div class="p-10">

        </div>
    </section>


    <div class="bg-surface-secondary ">


     <div id="bloc_pub" >
     <div  class="container-lg  h-96  py-20 max-w-screen-xl">
      <div class="row">
        <div class="col-md-12 mx-auto end-blue-800 ">

          <div class="row">
            <div class="col-md-6">
            <h4 class="h3 font-serifs text-dark py-3">Prenons contact et voyons comment nous pouvons vous aider ou aider votre entreprise</h4>
        <p class="text-white"><inertia-link class="btn btn-sm rounded-5  btn-danger my-2 me-3" :href="route('commander.service')"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Commander un service</inertia-link> / <a class="text-white btn-sm btn btn-success rounded-5 text-sm mx-3" href="https://wa.me/+22964844212"><i class="fas transform rotate-45 fa-phone-square rotate-90 ms-3"></i> +22964844212</a></p>

            </div>
            <div class="col-md-4">
            </div>
          </div>
        </div>
      </div>
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

export default {
  components: {
    Header,
    Notification,
    Footer,
    CoverLayout,
  }
};
</script>
<style scoped>
  #services-particuliers{
    background:url('../../../../public/storage/assets/web/image/fondp1.jpg') #111 no-repeat;
    background-position: 0% 0%;
  background-size: 100% auto;
  min-height: 350px;
  }
  .height-lg-30 {
    min-height: 30vh;
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
