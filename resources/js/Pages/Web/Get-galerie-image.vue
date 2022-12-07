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
                    <li  class="list-inline-item"> <a :href="route('galerie.images')" class="text-muted" title="Actualités">Galerie images</a></li>
                    <li  class="list-inline-item d-none d-sm-inline" :title="title">{{ liveSubstr(data.titre,0,80) }}</li>
                </ul>
               </nav>
          <div class="py-6 py-md-12 py-xl-10 text-center">
            <span class="badgebg-danger text-danger text-sm  font-bold text-muted text-uppercase expax1">Galerie images</span>
            <h1 v-if="title" class="lh-tight text-white_ my-0 ls-tight display-4 mb-1">
            {{ data.titre }}
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
    <div class="bg-gray-800_bg-yellow-50 bg17 py-8 shadow textwhite_">
    <div class="container-xxl max-w-screen-xxl">
      <div class="card-columns" >
        <div class="card border-0 border-0 p-0 m-0 ">
            
        <a class="example-image-link" :href="'/'+data.img" data-lightbox="example-set" :data-title="'COMMANDE : '+data.title+' - DETAILS : '+data.content">
            <img v-if="data.img"
                      :src="'/'+data.img"
                      class="img-responsive _img_galerie "
                      :alt="data.img"
                    />
            </a>
            </div>
            <div class="card border-0  my-4" v-for='img in images.data' :key='img.id'>
            <a   class="example-image-link" :href="'/'+img.url" data-lightbox="example-set" :data-title="img.nom">
              <img  class="img-responsive _img_galerie grid-itemgrid-item--height2" :src="'/'+img.url" :alt="img.nom" />
            </a>
                </div>
        </div>
        <div class="row">
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
                <div style="background: #afb7bc;margin:.4px 8%; height:1px"></div>
                            <div style="background: #afb7bc;margin:.4px 5%; height:1px"></div>
                            <div style="background: #afb7bc;margin:.2px 3%; height:1px"></div>
                            <inertia-link :href="route('galerie.image',p.slug)" >
                                <div class="">
                                    <div class="card shadow card-overlay-bottom card-img-scale card-img-overlay-transparant overflow-hidden mb-4 rounded-0 mcard1">
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

                                        <ul class="nav nav-divider my-2 text-white-force align-items-center small">
                                           
                                            <li class="nav-item text-xs text-white-50">•{{p.h_created_at}}</li>
                                            <li class="nav-item text-xs text-white-50">&nbsp;&nbsp;&nbsp;</li>
                                            <li class="nav-item text-xs text-white-50">•{{int|p.view_count}} vue{{p.view_count>1?'s':''}}</li>
                                            <li class="nav-item text-xs text-white-50">&nbsp;&nbsp;&nbsp;</li>
                                            <li class="nav-item text-xs text-white-50">•{{int|p.nb_image}} image{{p.nb_image>1?'s':''}}</li>
                                        </ul>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </inertia-link>

                </div>
                <div class="col-md-12 text-center">
                    <inertia-link class="btn btn-primary btn-sm my-4" :href="route('galerie.images')"><i class="far fa-plus" aria-hidden="true"></i> Voir plus d'images</inertia-link>
                </div>
              
              </div>
            </div>
          </div>

          <div class="grid">
  <div class="grid-item"></div>
  <div class="grid-item grid-item--width2"></div>
  <div class="grid-item grid-item--height2"></div>
  ...
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

//import "/storage/vendor/masonry/masonry.min.js";


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
          title:"Galerie Images",
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
  
  margin:4px;
  width:49%;
  float:left;
}
.img-top{
  max-height:100%;
  max-width:100%;
  float:left;
  margin:4px;
}
.bg17{background:#171717}
.expax1{
  letter-spacing:12px;
}
.masonry-column {
  padding: 0 1px;
}

.masonry-grid >img {
  margin: 5px 1px;
}


@media (min-width:360px){
    .card-columns{
        column-count:1;
    }
}
@media (min-width:576px){
    .card-columns{
        column-count:1;
    }
}
    @media (min-width:768px){
        .card-columns{
            column-count:2;
        }
    }
    @media (min-width:992px){
    .card-columns{
        column-count:3;
    }
}
@media (min-width:1200px){
    .card-columns{
        column-count:3;
    }
}


</style>
