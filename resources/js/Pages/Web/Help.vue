<template>
   <Header menu="Produits"/>
   <Head>
    <title>Aide et Assistance • Odacesoft</title>
    <meta head-key="description" name="description" content="Odacesoft est une entreprise informatique spécialisée dans l'ingénierie Informatique et l'incubation d'idées innovantes." />
  </Head>
  <cover-layout>
  <div id="services-help">
      <div class="container max-w-screen-xl">
         <div class="row">
          <div class="col-md-12 text-center align-items-baseline col-xl-12">
            <div class="pt-6 pb-8  pt-xl-20 pb-xl-8">
              <h1 class="lh-tight text-white ls-tight tb-shadow display-5 mt-16 mb-1">
              Aide et Assistance
              </h1>
              <p class="text-lg  text-white px-lg-56 px-md-30 tb-shadow">
                Pour mieux réussir dans votre prochain projet, notre coup de main pourra changer positivement vos résultats. 
              </p>
            </div>
          </div>
          <div class="col-md-6 col-xl-6">
            <!--img src="../../../../public/storage/assets/web/image/s-particuliers.png" alt="Services aux particuliers"-->
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
  },
};
</script>
<style scoped>
  #services-help{
    background:url('../../../../public/storage/assets/web/image/fond-help.jpg') #111 no-repeat;
    background-position: 0% 0%;
  background-size: 100% auto;
  min-height: 350px;
  }
  
</style>