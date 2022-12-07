<template>
   <Header menu="Partenaires"/>
   <Head>
    <title>Post test • Odacesoft</title>
    <meta head-key="description" name="description" content="Odacesoft est une entreprise informatique spécialisée dans l'ingénierie Informatique et l'incubation d'idées innovantes." />
  </Head>
  <cover-layout>
  <div id="services-partenaires" class="transition transition-all duration-700  ease-linear delay-200  shadow-lg  ">
      <div class="container max-w-screen-xl">
         <div class="row">
          
          <div class="col-md-6 col-xl-6">
           
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

</style>