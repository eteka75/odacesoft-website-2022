<template>
  <Header menu="Produits" />
  <Head>
    <title>Nos produits et services • Odacesoft</title>
    <meta
      head-key="description"
      name="description"
      content="Découvrez nos produits et services pour faire décoller vos affaires grâce aux digital."
    />
  </Head>
  <cover-layout>
    <div class="shadow">
    <div class="container-lg max-w-screen-xl">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 text-md-center">
        <nav class="pt-4">
                <ul class="breadcrumb  list-inline text-xs text-muted">
                        <li class="list-inline-item"> <a :href="route('accueil')" class="text-muted" title="Odacesoft"><i class="fas fa-home"></i> Accueil </a></li>
                    <li  class="list-inline-item"> Services</li>
                </ul>
               </nav>
          <div class="py-8 py-md-12 py-xl-15">
            <h1 class="lh-tight ls-tight display-4 mb-0">
              Nos services
            </h1>
            <p class="text-lg px-lg-16 px-xl-24 lead text-muted mb-5">
              Découvrez nos différents offres de services et faites le choix qui
              vous convient
            </p>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="bg-translucent-dark_ bgfa py-8 mt-1">
      <div class="container-lg max-w-screen-xl">
        <div v-if="services" class="row" data-masonry='{"percentPosition": true }'>
          <div v-for="c in services.data" :key="c" class="col-md-4 ">
            <div class="card shadow mb-5 mt-2">

                <div class="card-body">
                    <inertia-link v-if="c.img!=null" :href="route('cat-service.show',c.slug)" >
                    <img :src="c.img" class="card-img-top" :alt="c.img">
                    </inertia-link>
                    <inertia-link  :href="route('cat-service.show',c.slug)">
                    <h4 class="mt-3">{{ c.title }}</h4>
                    <p v-if="c.lead" class="text-sm text-muted">
                     {{ liveSubstr(c.lead,0,120) }}
                    </p>
                     </inertia-link>
                    <hr>
                    <inertia-link v-if="c.categorie" class="text-gray-700" :href='route("cat-service",c.categorie.slug)'><b class=""><i class="fa fa-bookmark"></i>  {{ c.categorie.title }}</b></inertia-link>

                </div>
            </div>
          </div>
          <div v-if="services" class="col-md-12 col-lg-12 col-xl-12">
          <div class="py-5">
             <Pagination class="mt-6 justify-content-center" :links="services.links" />
          </div>
          </div>
          </div>
          </div>
          </div>
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
  </cover-layout>
</template>

<script>
import Header from "@/Components/Header";
import Notification from "@/Components/Notification";
import Footer from "@/Components/Footer";
import CoverLayout from "@/Layouts/CoverLayout";

import Pagination from "@/Components/Pagination";

import "/storage/vendor/masonry/masonry.min.js";

export default {
  components: {
    Header,
    Notification,
    Footer,
    Pagination,
    CoverLayout,
  },
  props:['services','categories']
};
</script>
