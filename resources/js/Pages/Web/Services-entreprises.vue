
<template>
 
  <Header menu="Produits"/>
   <Head>
    <title>Services offets aux entreprises • Odacesoft</title>
    <meta head-key="description" name="description" content="Odacesoft est une entreprise informatique spécialisée dans l'ingénierie Informatique et l'incubation d'idées innovantes." />
  </Head>
  <cover-layout>
  <div  id="services-entreprises">
      <div class="container max-w-screen-xl">
        <div class="row">
          <div class="col-md-12 text-center align-items-baseline col-xl-12">
            <div class="pt-6 pb-8  pt-xl-20 pb-xl-8">
              <h1 class="lh-tight text-white ls-tight tb-shadow display-5 mt-16 mb-1">
              Services offerts aux entreprises
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
  
    <div class="container-lg max-w-screen-xl">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 text-md-center">
          <div class="py-10 py-md-16 py-xl-20">
            <h1 class="lh-tight ls-tight display-4 mb-8">
             Services offerts aux entreprises
            </h1>
            <p class="text-lg  px-lg-16 px-xl-24 text-muted">
             Lodit alias fuga nobis. Inventore odio quos, voluptatem voluptas illo quod. 🔥
            </p>
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
  #services-entreprises{
    background:url('../../../../public/storage/assets/web/image/fond-services-entreprises2.jpg') #111 no-repeat;
    background-position: 0% 0%;
  background-size: 100% auto;
  min-height: 350px;
  }
  
</style>
