<template>
  <Header menu="Réalisations"/>
   <Head>
    <title>{{ title }} • Odacesoft</title>
    <meta head-key="description" name="description" content="Découvrez nos produits et services pour faire décoller vos affaires grâce aux digital." />
  </Head>
  <cover-layout>
    <div class="bg-gray-800_ bg-soft-secondary_  bg-fade-light py-4 p-y-xl-14 textwhite_ shadow mb-1">
    <div class="container-lg max-w-screen-xl ">
      <div class="row">
        <div class="col-md-12  text-md-center">
        <ul class="breadcrumb  list-inline text-xs text-muted">
                        <li class="list-inline-item"> <a :href="route('accueil')" class="text-muted" title="Odacesoft"><i class="fas fa-home"></i> Accueil </a></li>
                    <li  class="list-inline-item"> <a :href="route('realisations')" class="text-muted" title="Actualités">Réalisation</a></li>
                </ul>
          <div class="py-6 py-md-12 py-xl-10">
            <h1 v-if="title" class="lh-tight text-white_ ls-tight display-4 mb-2">
             Nos réalisations
            </h1>
            <p class="lead">Découvrez nos réalisations pour les compte nos projets, nos clients et partanires</p>
            <inertia-link class="btn btn-danger btn-sm mt-4" :href="route('commander.service')"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Lancer une commande -></inertia-link>
          </div>
        </div>

      </div>
    </div>
    </div>
     <section>
          <div v-if="datas" class="pb-10 bgfa pt-5 pb-lg-16 pt-lg-12 bg-gray-100_">

            <div v-if="datas.data" class="container-xl max-w-screen-xl" >
              <div class="row align-items-center" id="autres-realisations" data-masonry='{"percentPosition": true }'>
                <div v-for="(p,i) in datas.data" :key="p" class="col-lg-3mt-5 col-sm-6 col-lg-4 col-xxl-3 " :class="(i==2 || i==7 || i==12 )?'col-lg-6 col-xxl-6':'col-lg-4col-xxl-3'">
                  
                <inertia-link :href="route('la-realisation',p.slug)">
                    <div class="col-sm-6col-lg-4">
                        <div class="card card-overlay-bottom card-img-scale overflow-hidden mb-5 mcard1 bg-dark shadow-md">
                        <!-- Card featured -->
                                    <!--span class="card-featured" title="Featured post"><i class="fas fa-star"></i></span-->
                        <!-- Card Image -->
                        <img :src="p.img" :alt="p.title">
                        <div class="card-img-overlay d-flex flex-column p-3 p-md-4">
                            <div v-if="p.service" >
                            <a href="#" class="badge bg-warning"><i class="fas fa-circle me-2 small fw-bold"></i>{{ p.service.title }}</a>
                            </div>
                            <div class="w-100 mt-auto">
                            <h4 class="text-white"><inertia-link :href="route('la-realisation',p.slug)" class="btn-link text-reset stretched-link">  {{ liveSubstr(p.title,0,70) }} </inertia-link></h4>

                            <ul class="nav nav-divider text-white-force align-items-center small">
                                <!--li class="nav-item position-relative">
                                <div v-if="p.user" class="nav-link"><i class="fa fa-user-circle" aria-hidden="true"></i> <a href="#" class="stretched-link text-reset btn-link">{{ p.user.name }}</a>
                                </div>
                                </li-->
                                <li class="nav-item text-sm text-white-50">•{{p.h_created_at}}</li>
                                <li class="nav-item text-sm text-white-50">&nbsp;&nbsp;</li>
                                <li class="nav-item text-sm text-white-50">•{{int|p.view_count}} vue{{p.view_count>1?'s':''}}</li>
                                <li class="nav-item text-sm text-white-50">&nbsp;&nbsp;</li>
                                <li class="nav-item text-sm text-white-50">•{{int|p.nb_image}} image{{p.nb_image>1?'s':''}}</li>
                            </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                </inertia-link>
                </div>
            </div>
              <div class="col-md-12 py-8 text-center">
                <simple-pagination class="mt-6 justify-content-center" :links="datas" />
              </div>
            </div>
          </div>
        </section>

  </cover-layout>
</template>

<script>
import Header from "@/Components/Header";
import Notification from "@/Components/Notification";
import Footer from "@/Components/Footer";
import CoverLayout from "@/Layouts/CoverLayout";

import Pagination from "@/Components/Pagination";
import SimplePagination from "@/Components/SimplePagination";

import "/storage/vendor/lightbox/css/lightbox.css";
import "/storage/vendor/lightbox/js/lightbox.js";


export default {
  components: {
    Header,
    Notification,
    SimplePagination,
    Pagination,
    Footer,
    CoverLayout,
  },
  data(){
      return {
          title:"Nos réalisations",
          nb:0,
      }
  } ,
  methods:{
    inc:function(i){
      if(i>=5){i=0}else{
        i=i+1;
      }
      return i;

    }
},
  props:['datas'],
  mounted() {
      //this.title=this.cat_service?this.data.title:'Nos réalisations'
      
  }
};
</script>
<style scope>


</style>
