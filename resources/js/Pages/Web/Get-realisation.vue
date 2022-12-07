<template>
  <Header menu="Réalisations"/>
   <Head>
    <title>{{ title }} • Odacesoft</title>
    <meta head-key="description" name="description" content="Découvrez nos produits et services pour faire décoller vos affaires grâce aux digital." />
  </Head>
  <cover-layout>
    <div class="bg-gray-800_ bg-soft-secondary_ bg-fade-light py-4 p-y-xl-14 textwhite_">
    <div class="container-lg max-w-screen-xl">
      <div class="row">
        <div class="col-md-12  text-md-center">
        <nav>
                <ul class="breadcrumb  list-inline text-xs text-muted">
                        <li class="list-inline-item"> <a :href="route('accueil')" class="text-muted" title="Odacesoft"><i class="fas fa-home"></i> Accueil </a></li>
                    <li  class="list-inline-item"> <a :href="route('realisations')" class="text-muted" title="Actualités">Réalisation</a></li>
                    <li  class="list-inline-item d-none d-sm-inline" :title="title">{{ liveSubstr(data.title,0,80) }}</li>
                </ul>
               </nav>
          <div class="py-6 py-md-12 py-xl-10 text-center">
            <span class="badgebg-danger text-danger text-sm  font-bold text-muted text-uppercase expax1">Nos réalisations</span>
            <h1 v-if="title" class="lh-tight text-white_ my-0 ls-tight display-4 mb-1">
            {{ data.title }}
            </h1>
            <p class="lead text-dark px-md-10 px-xxl-20">{{ data.lead }}</p>
            <div class="pt-4 text-muted">
           <span><i class="fa fa-calendar"></i>  {{data.h_created_at}} </span>&nbsp;&nbsp;&nbsp;&nbsp;
           <span><i class="fa fa-eye"></i> {{int|data.view_count}} vue{{data.view_count>1?'s':''}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
           <span><i class="fa fa-camera"></i>  {{int|data.nb_image}} image{{data.nb_image>1?'s':''}}</span>
            
            </div>
          
          </div>

        </div>

      </div>
    </div>
    </div>
    <div class="bg-gray-800_bg-yellow-50 shadow-3 textwhite_">
    <div class="container-xxl max-w-screen-xxl">
      <div class="row">
        <div class="col-md-12">
        <a class="example-image-link" :href="'/'+data.img" data-lightbox="example-set" :data-title="'COMMANDE : '+data.title+' - DETAILS : '+data.content">
            <img v-if="data.img"
                      :src="'/'+data.img"
                      class="img-top bg-white "
                      :alt="data.img"
                    />
            </a>
            <a v-for='img in images.data' :key='img.id'  class="example-image-link" :href="'/'+img.url" data-lightbox="example-set" :data-title="img.nom">
              <img  class="img-responsive img_galerie " :src="'/'+img.url" :alt="img.nom" />
            </a>
        </div>
        
        <div class="col-md-6  mb-4">
           
            <small class="text-xs text-muted">* Cliquez sur l'image pour agrandir.</small>
               
        </div>
        <div class="col-md-6 mb-4  text-end">
            <simple-pagination class="mt-6 justify-content-end" :links="images" />
          </div>
      </div>
    </div>
    </div>
     <section>

          <div v-if="datas " class="pb-10 pb-lg-16 pt-lg-12 bg-gray-100_ bgfa mt-2">
            <div class="container-xl max-w-screen-xl" >
              <div class="row align-items-center" id="autres-realisations">
            <div v-if="datas && datas.length" class="text-muted py-2 ms-1 text-uppercase font-bold col-md-12">Autres réalisations</div>
                <div v-for="p in datas" :key="p" class="col-lg-3 mt-2 ">
                    <inertia-link :href="route('la-realisation',p.slug)">
                    <div class="col-sm-6col-lg-4">
                        <div class="card card-overlay-bottom card-img-scale overflow-hidden mb-4  mcard1 bg-dark">
                        <!-- Card featured -->
                                    <!--span class="card-featured" title="Featured post"><i class="fas fa-star"></i></span-->
                        <!-- Card Image -->
                        <img :src="'/'+p.img" :alt="p.title">
                        <div class="card-img-overlay d-flex flex-column p-3 p-md-4">
                            <div v-if="p.service" >
                            <a href="#" class="badge bg-warning"><i class="fas fa-circle me-2 small fw-bold"></i>{{ p.service.title }}</a>
                            </div>
                            <div class="w-100 mt-auto">
                            <h4 class="text-white"><inertia-link :href="route('la-realisation',p.slug)" class="btn-link text-reset stretched-link">  {{ liveSubstr(p.title,0,70) }} </inertia-link></h4>

                            <ul class="nav nav-divider my-2 text-white-force align-items-center small">
                               
                                <li class="nav-item text-xs text-white-50">•{{p.h_created_at}}</li>
                                <li class="nav-item text-xs text-white-50">&nbsp;&nbsp;</li>
                                <li class="nav-item text-xs text-white-50">•{{int|p.view_count}} vue{{p.view_count>1?'s':''}}</li>
                                <li class="nav-item text-xs text-white-50">&nbsp;&nbsp;</li>
                                <li class="nav-item text-xs text-white-50">•{{int|p.nb_image}} image{{p.nb_image>1?'s':''}}</li>
                            </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                </inertia-link>

                </div>
                <div class="col-md-12 text-center">
                    <inertia-link class="btn btn-secondary btn-sm my-4" :href="route('realisations')"><i class="far fa-plus" aria-hidden="true"></i> Voir les réalisations</inertia-link>
                </div>
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

import "/storage/vendor/lightbox/css/lightbox.css";
import "/storage/vendor/lightbox/js/lightbox.js";

import SimplePagination from "@/Components/SimplePagination";


export default {
  components: {
    Header,
    Notification,
    Footer,
    CoverLayout,
    SimplePagination,
  },
  data(){
      return {
          title:"Nos réalisations",
      }
  } ,
  props:['data','datas','images'],
  mounted() {
      //this.title=this.cat_service?this.data.title:'Nos réalisations'
  }
};
</script>
<style scope>
#autres-realisations figure{
    height:280px;
}
.img_galerie{
  max-height:220px;
  margin:4px;
  max-width:100%;
}
.img-top{
  max-height:446px<;
  max-width:100%;
  float:left;
  margin:4px;
}
.expax1{
  letter-spacing:12px;
}
</style>
