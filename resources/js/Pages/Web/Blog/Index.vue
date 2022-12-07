<template>
  <Header menu="Blog" />
  <Head>
    <title>Bienvenue sur le Blog • Odacesoft</title>
    <meta
      head-key="description"
      name="description"
      content="Apprendre, Créer, Former et partager nos connaissances dans toute l'Afrique."
    />
  </Head>

  <nav-cat v-if="categories" :datas='[categories,cat]'  />
  <cover-layout>
    <section class="bg-fade-primary bg-fade-bottom">
    <div class="container-lg max-w-screen-xl">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 text-center">
          <div class="py-10 py-md-12 py-xl-10">
            <h1 class="lh-tight ls-tight display-4 mb-8">
              Le Blog
            </h1>
            <p
              class="
                text-lg
                px-lg-16 px-xl-24
                lead
                col-md-8 mx-auto font-light
                mx-center
                text-muted
              "
            >
              Découvrez de nouvels articles, astuces, dossiers et tutoriels dans divers domaines.
            </p>

          </div>
        </div>
      </div>

    </div>
    </section>
     <!--div v-if="article"   class="bg-gray-100 cover_article_blog  ">
      <div class="container-xxl px-xl-5 max-w-screen-xl">
          <div class="row">
          <div class="col-md-6">
            <div class="py-5 py-md-5 py-xl-10 text-md-center_">
                <span v-if="article.categories" class="badge px-4 rounded-5 bg-danger">{{article.categories.nom}}</span>
              <h1 v-if="article" class="lh-tight ls-tight display-5 mb-3 text-white text-shadow me-3"  ><inertia-link class="text-white" :href='route("blog.article.show",article.slug)'>{{ article.title }}</inertia-link></h1>

              <span v-if="article.categories" class="me-3 text-white text-sm"> <i class="far fa-calendar" aria-hidden="true"></i> {{article.h_created_at}}</span>
              <span v-if="article.categories" class="me-3 text-white text-sm"> <i class="far fa-eye" aria-hidden="true"></i> {{article.view_count }} vue{{article.view_count>1?'s':'' }}</span>
            </div>
          </div>
          <div class="col-md-6 rounded-5 cover_article_blog" >
            <div class=" py-lg-18 my-4 mb-8">
            <img v-if="article.image"
              :src="'/'+article.image.url"
              class="img-responsive rounded-5 shadow-4  border-8 border-white"
             :alt="article.image.alt"
            />
            </div>
          </div>
        </div>
      </div>
      </div-->

    <div class="container-lg mt-5 max-w-screen-xl">
        <div class="row">
            <div class="col-md-12">
            <div class="row">
                <div  v-if="article"
                class="col-md-12 card-columns"

                >

                <div  v-for="article in datas.data"
                :key="article" class="card h-100 shadow-1 shadow-hover-4 rounded-3 ">
                    <inertia-link class="text-dark" v-if="article" :href='route("blog.article.show",article.slug)'> <img v-if="article.image"
                    :src="article.image.url"
                    class="card-img-top"
                    :alt="article.image.alt"
                    /></inertia-link>


                    <div class="card-body">
                    <div class="clearfix mb-3">
                        <span  v-if="article.categories"  class="float-start badge rounded-pill bg-gray-300 text-muted " :class="article.categories.couleur"
                        ><inertia-link class="text-white" :href='route("blog.cat.show",article.categories.id)'>{{ article.categories.nom }}</inertia-link></span
                        >
                        <span class="float-end price-hp text-xs">{{ article.h_created_at }}</span>
                    </div>

                    <h4 class="mb-2 h6"><inertia-link class="text-dark" :href='route("blog.article.show",article.slug)'> {{ liveSubstr(article.title,0,55) }}</inertia-link></h4>
                  <!--p class="text-muted text-sm">{{ liveSubstr(article.lead,0,65) }}</p-->
                  <div class="d-flex text-xs mt-4">
                    <span v-if="article.user" class="me-3"> <i class="far fa-user-circle" aria-hidden="true"></i> {{article.user.name}}</span>
                    <span v-if="article" class="me-3"> <i class="far fa-comments" aria-hidden="true"></i> {{article.nb_commentaires}}</span>
                    <span v-if="article" class="me-3"> <i class="far fa-eye" aria-hidden="true"></i> {{ TextInt(article.view_count)}}</span>
                  </div>
                    <!--div class="text-center my-2">
                        <a href="#" class="card-link">Lire la suite -></a>
                    </div-->
                    </div>
                </div>
                </div>
            </div>

            </div>
            <div class="col-md-12 mx-auto border-top_ mt-8 text-center">
                <pagination class="mt-4 float-end" :links="datas.links" />
            </div>
            <div class="col-md-12 mb-8">
                <h3 class="h3 font-serif ">Découvrir plus d'articles par catégories</h3>
                <div class="row mt-4">
                    <div v-for="cat in categories" :key="cat" class="col-md-3 mb-3">
                        <div class=" py-3 px-4 border rounded-sm shadow-hover bg-gray-100-hover">
                        <inertia-link class="pt-2 mx-3 mb-0 text-muted_ font-bold"  :href="route('blog.cat.show',cat.slug)">  {{cat.nom}}  </inertia-link>
                        <p class="pb-2 mx-3 text-muted font-light"><small>{{cat.articles.length}} article{{cat.articles.length>1?'s':'' }}  </small></p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">

                         <div class=" py-3 px-4  rounded-sm">
                            <inertia-link href="#" class=""> Toutes les catégories -></inertia-link>
                        </div>

                    </div>
                </div>

                <h3 class="h3 mt-6 font-serif" >Explorez par mots clés</h3>
                <hr>
                <ul v-if="categories" class="list-inline d-inline d-inline p-0 mt-4">
                    <li v-for="cat in categories" :key="cat" class="list-inline-item ">
                    <inertia-link class="nav-link text-muted"  :href="route('blog.cat.show',cat.slug)">#{{cat.nom}}  </inertia-link>

                    </li>

                </ul>
            </div>
        </div>

    </div>
    <div class="col-12 mt-4 text-center">
            <!--pagination class="mt-6 float-end" :links="datas.links" /-->
    </div>
  </cover-layout>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import Header from "@/Components/Header";
import Notification from "@/Components/Notification";
import Footer from "@/Components/Footer";
import CoverLayout from "@/Layouts/CoverLayout";

import Pagination from "@/Components/Pagination";
import NavCat from "@/Components/NavCat";

export default {
  components: {
    Header,
    Notification,
    Footer,
    CoverLayout,
    Pagination,
    NavCat,
  },
  props: ["datas",'article','categories','cat'],
  methods:{
      liveSubstr(data, debut=0,fin=0){
          if(data.length<=fin){
              return  data.substr(debut,fin);
          }else{
              return  data.substr(debut,fin)+'...';
          }
      },
      TextInt(value){
          if (/^(-|\+)?(\d+|Infinity)$/.test(value))
            return Number(value);
        return 0;
      }
  },
    filters: {

     liveSubstrs: function(string) {
       return string.substring(0,1) + '...';
        }

  }
};
</script>
<style scoped>

.card-columns .card {
  margin-bottom: 0.75rem;
}

@media (min-width: 1000px) {
  .card-columns {
    -webkit-column-count: 3;
    -moz-column-count: 3;
    column-count: 3;
    -webkit-column-gap: 1.25rem;
    -moz-column-gap: 1.25rem;
    column-gap: 1.25rem;
    orphans: 1;
    widows: 1;
  }
  .card-columns .card {
    display: inline-block;
    width: 100%;
  }
}
@media (max-width: 575px) {
  .card-columns {
    -webkit-column-count: 1;
    -moz-column-count: 1;
    column-count: 1;
    -webkit-column-gap: 1.25rem;
    -moz-column-gap: 1.25rem;
    column-gap: 1.25rem;
    orphans: 1;
    widows: 1;
  }
  .card-columns .card {
    display: inline-block;
    width: 100%;
  }
}
@media  only screen and (max-width: 1000px) and (min-width: 600px){
  .card-columns {
    -webkit-column-count: 2;
    -moz-column-count: 2;
    column-count: 2;
    -webkit-column-gap: 1.25rem;
    -moz-column-gap: 1.25rem;
    column-gap: 1.25rem;
    orphans: 1;
    widows: 1;
  }
  .card-columns .card {
    display: inline-block;
    width: 100%;
  }
}

.card-columns {
  @include media-breakpoint-only(lg) {
    column-count: 4;
  }
  @include media-breakpoint-only(xl) {
    column-count: 5;
  }
}

</style>
