<template>
  <Header menu="Activites"/>
   <Head>
    <title>{{ title }} • Odacesoft</title>
    <meta head-key="description" name="description" content="Découvrez nos produits et services pour faire décoller vos affaires grâce aux digital." />

  </Head>
  <cover-layout>
    <div class="bg-translucent-dark bg-fade-light  py-4 p-y-xl-16 textwhite_">
    <div class="container-lg max-w-screen-xl">
      <div class="row">
        <div class="col-md-12  text-md-center">
        <nav>
                <ul class="breadcrumb  list-inline text-xs text-muted">
                        <li class="list-inline-item"> <a :href="route('accueil')" class="text-muted" title="Odacesoft"><i class="fas fa-home"></i> Accueil </a></li>
                    <li  class="list-inline-item"> <a :href="route('activites')" class="text-muted" title="Actualités">Actualités</a></li>
                </ul>
               </nav>
          <div class="py-6 py-md-4 py-xl-8">
            <h1 v-if="title" class="lh-tight text-white_ ls-tight display-4 mb-2">
             Nos activités
            </h1>
            <p class="lead">Découvrez nos différentes activites</p>

          </div>

        </div>

      </div>
    </div>
    </div>
     <section class="bg-translucent-dark_">
          <div v-if="datas" class="pb-10 pb-lg-16 py-5 pt-lg-8 bg-gray-100_">

            <div v-if="datas.data" class="container-lg max-w-screen-xl" >
              <div class="row align-items-center"   data-masonry='{"percentPosition": true, "columnWidth": 0}'>
               <div :title="article.title"  v-for="article in datas.data"
                                :key="article" class="col-md-3 col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                                 <inertia-link class="text-dark" v-if="article" :href='route("activite",article.slug)'>
                                <div class="card border-0 shadow-md shadow-4-hover">
                                    <inertia-link class="text-dark" v-if="article" :href='route("activite",article.slug)'>
                                    <div class="img-article-cover2 p-2 bg-white rouded-3">
                                    <img v-if="article.img"
                                    :src="'/'+article.img"
                                    class="card-img-top rounded-4"
                                    alt=""
                                    />
                                    </div>
                                    </inertia-link>
                                    <div class="card-body  pt-2 pb-4">
                                    <div class="clearfix mb-3">
                                        <span  v-if="article.categories"  class="float-start badge rounded-pill bg-gray-300 text-muted " :class="article.categories.couleur"
                                        ><inertia-link class="text-white" :href='route("blog.cat.show",article.categories.id)'>{{ article.categories.nom }}</inertia-link></span
                                        >
                                    </div>

                                    <h4 class="mb-2 h5"><inertia-link class="text-dark" :href='route("activite",article.slug)'> {{ liveSubstr(article.title,0,80) }}</inertia-link></h4>
                                    <div v-if="article.lead" class="text-xs text-muted">{{ liveSubstr(article.lead,0,120) }}</div>
                                <div class="d-flex_ text-xs mt-4 text-center_">
                                     <span title="Date de publication" class="float-end_ price-hp me-3 text-xs"><i class="fas fa-calendar-alt" aria-hidden="true"></i> {{ article.d_created_at }}</span>
                                    <span title="Auteur" v-if="article.user" class="me-3"> <i class="far fa-user-circle" aria-hidden="true"></i> {{article.user.name}}</span>
                                    <span title="Nombre de vues" v-if="article.view_count>0" class="me-3"> <i class="far fa-eye" aria-hidden="true"></i> {{ (article.view_count)}} vue{{ (article.view_count)>1?'s':'' }}</span>
                                    <span v-if="article.temps"  title="Temps de lecture"  class="me-3"><i class="fa fa-clock" aria-hidden="true"></i> {{article.temps}} min </span>
                                </div>
                                    <!--div class="text-center my-2">
                                        <a href="#" class="card-link">Lire la suite -></a>
                                    </div-->
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

import "/storage/vendor/masonry/masonry.min.js";


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
          title:"Nos Activités",
      }
  } ,
  props:['datas'],
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
