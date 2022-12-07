<template>
  <Header menu="Formations"/>
   <Head>
    <title>{{ title }} • Odacesoft</title>
    <meta head-key="description" name="description" content="Découvrez nos produits et services pour faire décoller vos affaires grâce aux digital." />
  </Head>
  <cover-layout>
    <div class="bg-gray-800_ bg-soft-secondary_ bg-fade-light py-4 p-y-xl-14 textwhite_">
    <div class="container max-w-screen-xl">
      <div class="row">
        <div class="col-md-12  text-md-center">
          <div class="py-6 py-md-12 py-xl-10">
            <h1 v-if="title" class="lh-tight text-white_ ls-tight display-4 mb-2">
             Nos formations
            </h1>
            <p class="lead">Découvrez nos offres de formations pour améliorer vos compétences</p>

          </div>

        </div>

      </div>
    </div>
    </div>
     <section>
     <div class="container">
          <div class="row">
              <div class="col-md-12">
                <div class="px-3 px-lg-8 mb-8 text-center rounded-sm shadow-hover py-5 py-lg-10 bg-gray-100">
                  <h1 class="display-3"> <i class="fa fa-graduation-cap" aria-hidden="true"></i></h1>
                  <h3>Aucune formation n'est disponible pour ne moment</h3>
                  <small class="text-muted">Les offres de formations apparaissent ici</small>
                </div>
              </div>
          </div>
     </div>
     </section>
     <section>
          <div v-if="datas" class="pb-10 pb-lg-16 pt-lg-12 bg-gray-100_">

            <div v-if="datas.data" class="container-xl max-w-screen-xl" >
              <div class="row align-items-center" id="autres-realisations" data-masonry='{"percentPosition": true }'>
                <div v-for="p in datas.data" :key="p" class="col-lg-3mt-5 col-sm-6 col-lg-4 col-xxl-3 ">
                <inertia-link :href="route('la-realisation',p.slug)">
                    <div class="col-sm-6col-lg-4">
                        <div class="card card-overlay-bottom card-img-scale overflow-hidden mb-4 mcard">
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
                                <li class="nav-item text-sm text-white-50">• {{p.h_created_at}}</li>
                            </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                </inertia-link>
                </div>
            </div>
                <!--div v-for="p in datas.data" :key="p" class="col-lg-3 mt-5 ">
                     <figure :title="p.title" class=" bg-gray-100_ shadow-hover border_ rounded-2 mt-3 mb-4">
                        <inertia-link :href="route('la-realisation',p.slug)">
                            <img :src="'/'+p.img" :alt="p.title" class="rounded-2 img-responsive mb-3" />
                        </inertia-link>

                    </figure>
                    <div class="">
                            <h3  class="text-xs h3 text-dark p-O m-0"> <i class="fa fa-bookmark" aria-hidden="true"></i> {{ liveSubstr(p.title,0,50) }}</h3>
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
          title:"Nos réalisations",
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
