<template>
  <Header menu="Produits"/>
   <Head>
    <title>{{ title }} • Odacesoft</title>
    <meta head-key="description" name="description" content="Découvrez nos produits et services pour faire décoller vos affaires grâce aux digital." />
  </Head>
  <cover-layout>
    <div class="bg-gray-800_ bg-fade-primary shadow-3 textwhite_">
    <div class="container max-w-screen-xl">
      <div class="row">
        <div class="col-md-12  text-md-center">
            <nav>
                <ul class="breadcrumb  list-inline text-xs text-muted">
                        <li class="list-inline-item"> <a :href="route('accueil')" class="text-muted" title="Odacesoft"><i class="fas fa-home"></i> Accueil </a></li>
                    <li  class="list-inline-item"> <a :href="route('services')" class="text-muted" title="Actualités">Services</a></li>
                    <li  class="list-inline-item d-none d-sm-inline" :title="title">{{ liveSubstr(data.title,0,80) }}</li>
                </ul>
            </nav>
          </div>
        <div class="col-md-6  text-md-center_">
       
          <div class="py-6 py-md-8 py-xl-10">
            <h1 v-if="title" class="lh-tight text-white_ ls-tight display-4 mb-4">
             {{ data.title }}
            </h1>
            <h3 class="text-white_" v-if="data.title"> {{ data.lead }}</h3>
            <p v-if="data" class="text-sm text-start pe-xl-3 text-muted">
            {{ data.lead }}
            </p>
            <inertia-link class="btn btn-danger btn-sm mt-4" :href="route('commander.service')"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Commander -></inertia-link>

          </div>
          <div class="mb-5">
            <b>Détails:</b> <br>
            <div class="text-xs" v-html="data.content"></div>
          </div>
        </div>
        <div v-if="data.img" class="col-md-6 py-5">

            <a class="example-image-link" :href="'/'+data.img" data-lightbox="example-set" :data-title="'COMMANDE : '+data.title+' - DETAILS : '+data.content">
            <img v-if="data.img"
                      :src="'/'+data.img"
                      class="img-fluid rounded-4 mb-5 p-4 bg-white shadow-lg"
                      :alt="data.img"
                    />
            </a>
            <div><small class="text-xs text-muted">* Cliquez sur l'image pour agrandir.</small></div>
                    <div class="
                       d-none d-sm-none d-sx-none
                       d-xxl-block
                      position-absolute
                      mt-50
                      top-48
                      start-0
                      w-48
                      h-48
                      mt-n14
                      ms-n14
                      text-muted

                    "
                  >
                    <svg
                      width="185"
                      height="186"
                      viewBox="0 0 185 186"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                      <circle cx="22" cy="2" r="2" fill="currentColor"></circle>
                      <circle cx="42" cy="2" r="2" fill="currentColor"></circle>
                      <circle cx="62" cy="2" r="2" fill="currentColor"></circle>
                      <circle cx="82" cy="2" r="2" fill="currentColor"></circle>
                      <circle
                        cx="102"
                        cy="2"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="2"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="2"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="2"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="2"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle cx="2" cy="22" r="2" fill="currentColor"></circle>
                      <circle
                        cx="22"
                        cy="22"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="42"
                        cy="22"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="62"
                        cy="22"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="82"
                        cy="22"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="102"
                        cy="22"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="22"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="22"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="22"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="22"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle cx="2" cy="42" r="2" fill="currentColor"></circle>
                      <circle
                        cx="22"
                        cy="42"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="42"
                        cy="42"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="62"
                        cy="42"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="82"
                        cy="42"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="102"
                        cy="42"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="42"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="42"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="42"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="42"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle cx="2" cy="62" r="2" fill="currentColor"></circle>
                      <circle
                        cx="22"
                        cy="62"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="42"
                        cy="62"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="62"
                        cy="62"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="82"
                        cy="62"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="102"
                        cy="62"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="62"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="62"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="62"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="62"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle cx="2" cy="82" r="2" fill="currentColor"></circle>
                      <circle
                        cx="22"
                        cy="82"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="42"
                        cy="82"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="62"
                        cy="82"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="82"
                        cy="82"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="102"
                        cy="82"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="82"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="82"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="82"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="82"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="2"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="22"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="42"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="62"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="82"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="102"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="2"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="22"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="42"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="62"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="82"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="102"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="2"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="22"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="42"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="62"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="82"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="102"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="2"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="22"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="42"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="62"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="82"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="102"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="2"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="22"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="42"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="62"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="82"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="102"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                    </svg>
        </div>
        </div>
      </div>
    </div>
    </div>
     <section class="  mt-3">

          <div v-if="datas" class="pb-10 pb-lg-16 pt-lg-12 bg-gray-100_">
            <div class="container-xl max-w-screen-xl" >
              <div class="row align-items-center" id="autres-realisations">
            <div class="text-muted text-sm py-2 ms-1 text-uppercase font-bold col-md-12">Autres services</div>
                <div v-for="p in datas" :key="p" class="col-lg-3 mt-2 ">
                     <inertia-link :href='route("cat-service.show",p.slug)'>
                    <div class="col-sm-6col-lg-4">
                        <div class="card card-overlay-bottom card-img-scale overflow-hidden bg-gray-800 mb-4 dcard">
                        <!-- Card featured -->
                                    <!--span class="card-featured" title="Featured post"><i class="fas fa-star"></i></span-->
                        <!-- Card Image -->
                        <img v-if="p.img"  class="text-dark" :src="'/'+p.img" :alt="p.title">
                        <div class="card-img-overlay d-flex flex-column p-3 p-md-4">
                            <div v-if="p.service" >
                            <a href="#" class="badge bg-warning"><i class="fas fa-circle me-2 small fw-bold"></i>{{ p.service.title }}</a>
                            </div>
                            <div class="w-100 mt-auto">
                            <h4 class="text-white"> <inertia-link :href='route("cat-service.show",p.slug)' class="btn-link text-reset stretched-link">  {{ liveSubstr(p.title,0,70) }} </inertia-link></h4>

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
                <div class="col-md-12 text-center_">
                    <inertia-link class="btn btn-primary btn-sm my-4" :href="route('services')"><i class="far fa-plus" aria-hidden="true"></i> Voir toutes les services</inertia-link>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section>
        <div class="bg-gray-900 py-8">
      <div class="container-lg max-w-screen-xl">
      <div class="row">

          <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card my-8">
              <div class="card-body">
                <h3 class="text-gray-500 pb-4 border-bottom"> <i class="fa fa-bookmark"></i> Nos catégories services</h3>

                <div v-if="categories" class="mb-6 row ">
                    <div v-for="d in categories" :key="d" class=" border-end border-bottom  col-md-3 bg-gray-100-hover"  >
                            <inertia-link :href='route("cat-service",d.slug)'>
                            <div class="card-body">
                                <img v-if="d.img" class="img-responsive rounded-3 border-1 shadow-sm w-14 mb-3" :src="'/'+d.img" :alt="d.title">
                                <br>
                                <h5> {{ d.title }}</h5>
                       </div>

                        {{ d.services }}
                        </inertia-link>
                    </div>
                </div>
              </div>
            </div>
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


export default {
  components: {
    Header,
    Notification,
    Footer,
    CoverLayout,
  },
  data(){
      return {
          title:"Nos réalisations",
      }
  } ,
  props:['data','datas','categories'],
  mounted() {
      //this.title=this.cat_service?this.data.title:'Nos réalisations'
  }
};
</script>
<style scope>
#autres-realisations figure{
    height:280px;
}
</style>
