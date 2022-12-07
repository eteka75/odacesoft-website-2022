<template>
  <Header menu="Home"/>
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
                    <li  class="list-inline-item"> <a :href="route('galerie.images')" class="text-muted" title="Actualités">Galerie Images</a></li>
                </ul>
          <div class="py-6 py-md-12 py-xl-10">
            <h1 v-if="title" class="lh-tight text-white_ ls-tight display-4 mb-0">
             Galerie images
            </h1>
            <p class="lead">Découvrez les images marquantes de nos différentes activités</p>
           
          </div>

        </div>

      </div>
    </div>
    </div>
     <section>
          <div v-if="datas" class="pb-10 pt-5 pb-lg-16 pt-lg-12 bg-gray-100_ mt-1">

            <div v-if="datas.data" class="container-xxl max-w-screen-xxl" >

              <div class="row align-items-center" data-masonry='{"percentPosition": true }'>
                 
                <div v-for="p in datas.data" :key="p" class="col-lg-3mt-5 col-sm-12 col-lg-6 col-xxl-4 ">
                <div style="background: #afb7bc;margin:.4px 8%; height:1px"></div>
                            <div style="background: #afb7bc;margin:.4px 5%; height:1px"></div>
                            <div style="background: #afb7bc;margin:.2px 3%; height:1px"></div>
                            <inertia-link :href="route('galerie.image',p.slug)" >
                                <div class="">
                                    <div class="card shadow card-overlay-bottom card-img-scale card-img-overlay-transparant overflow-hidden mb-4 rounded-0 mcard3 bg-dark">
                                    <!-- Card featured -->
                                                <!--span class="card-featured" title="Featured post"><i class="fas fa-star"></i></span-->
                                    <!-- Card Image -->
                                    <img :src="p.img" :alt="p.title" class="rounded-0">
                                    <div class="card-img-overlay d-flex flex-column p-3 p-md-4">
                                        <div v-if="p.service" >
                                        <a :href="route('la-realisation',p.slug)" class="badge bg-warning"><i class="fas fa-camera me-2 small fw-bold"></i>{{ p.service.titre }}</a>
                                        </div>
                                        <div class="w-100 mt-auto">
                                        <h4 class="text-white text-sm"><inertia-link :href="route('galerie.image',p.slug)" class="btn-link text-reset stretched-link">  {{ liveSubstr(p.titre,0,70) }} </inertia-link></h4>

                                        <ul class="nav nav-divider text-white-force align-items-center small">
                                           
                                            <li class="nav-item text-sm text-white-50">•{{p.h_created_at}}</li>
                                            <li class="nav-item text-sm text-white-50">&nbsp;&nbsp;&nbsp;</li>
                                            <li class="nav-item text-sm text-white-50">•{{int|p.view_count}} vue{{p.view_count>1?'s':''}}</li>
                                            <li class="nav-item text-sm text-white-50">&nbsp;&nbsp;&nbsp;</li>
                                            <span>•{{int|p.nb_image}} image{{p.nb_image>1?'s':''}}</span>
                                        </ul>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </inertia-link>
                </div>
            </div>
                <!--div v-for="p in datas.data" :key="p" class="col-lg-3 mt-5 ">
                     <figure :title="p.titre" class=" bg-gray-100_ shadow-hover border_ rounded-2 mt-3 mb-4">
                        <inertia-link :href="route('galerie.image',p.slug)">
                            <img :src="'/'+p.img" :alt="p.titre" class="rounded-2 img-responsive mb-3" />
                        </inertia-link>

                    </figure>
                    <div class="">
                            <h3  class="text-xs h3 text-dark p-O m-0"> <i class="fa fa-bookmark" aria-hidden="true"></i> {{ liveSubstr(p.titre,0,50) }}</h3>
                            <div class="text-muted text-xs"><i class="fa fa-calendar-o" aria-hidden="true"></i> {{p.h_created_at}}</div>
                        </div>

                </div>
              </div-->
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
          title:"Galerie Images",
      }
  } ,
  props:['datas'],
  mounted() {
      //this.title=this.cat_service?this.data.title:'Nos réalisations'
  }
};
</script>
<style scope>


</style>
