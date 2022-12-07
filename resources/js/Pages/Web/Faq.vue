<template>
  <Header menu="Activites"/>
  <Head>
    <title>Forum aux questions • Odacesoft</title>
        <meta head-key="description" name="description" content="Découvrez qui nous sommes, nos rêves et nos ambitions pour contribuer à l'émergence de notre continent." />
  </Head>
  <cover-layout>
    <div class="shadow bg-fade-light">
    <div class="container-lg max-w-screen-xl ">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 text-md-center py-4">
        <ul class="breadcrumb  list-inline text-xs text-muted">
                  <li class="list-inline-item"> <a :href="route('accueil')" class="text-muted" title="Odacesoft"><i class="fas fa-home"></i> Accueil </a></li>
              <li  class="list-inline-item"> Forum aux questions</li>
          </ul>
          <div class="py-10 py-md-16 py-xl-20">
            <h1 class="lh-tight ls-tight display-4 mb-0">
            Forum aux questions
            </h1>
            <p class="text-lg  px-lg-16 px-xl-24 text-muted">
             Réponses aux questions que vous vous êtes toujours posées à propos de nous
            </p>
          </div>
        </div>
      </div>
    </div>
    </div>
  </cover-layout>
</template>
  
<script>
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
