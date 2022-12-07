<template>
  <Header menu="Blog" />
 <nav-cat v-if="categories" :datas='[categories,cat]'  />
  <Head>
    <title  v-if="cat">{{ cat.nom }} • Odacesoft</title>
    <meta  v-if="article"
      head-key="description"
      name="description"
      content="Apprendre, Créer, Former et partager nos connaissances dans toute l'Afrique."
    />
  </Head>
  <cover-layout>
    <div>
        <div class="container py-8 max-w-screen-xl_">

                <div  v-if="datas.data && datas.data.length" class="clearfix row">

                <div  v-for="article in datas.data" :key="article" class="col-md-3 px-1  ">
                   <div class="mb-2  card h-100 shadow-1 shadow-hover-4 rounded-3 mx-2 p-0">
                    <inertia-link class="text-dark" v-if="article" :href='route("blog.article.show",article.slug)'>

                    <img v-if="article.image"
                    :src="'/'+article.image.url"
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

                    <h4 class="mb-2 h6"><inertia-link class="text-dark" :href='route("blog.article.show",article.slug)'> {{ liveSubstr(article.title,0,65) }}</inertia-link></h4>
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
                <div class="row" v-else>
                    <div class="py-8 col-md-12 px-8 bg-gray-200 rounded-sm shadow-hover text-center">
                        <i class="fa fa-newspaper display-3" aria-hidden="true"></i>
                        <h4>Aucun article dans cette catégorie</h4>
                        <small>Les article de la catégorie <inertia-link :href="route('blog.cat.show',cat.slug)" class="font-bold">{{cat.nom}} </inertia-link> apparaissent ici dès qu'ils sont publiés</small>
                        <p class="mt-4" > <inertia-link :href="route('blog.cats.show',cat.slug)" class="btn btn-sm btn-primary rounded-8"> Parcourir les catégories d'article -></inertia-link></p>
                    </div>
                </div>



        </div>
        <div>
        <div class="col-md-12 mx-auto border-top_ mt-8 text-center">
                <pagination class="mt-4 float-end" :links="datas.links" />
            </div>
        </div>
    </div>
  </cover-layout>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";

import JetButton from "@/Jetstream/Button";
import {formatRelative} from 'date-fns';
import { fr } from 'date-fns/locale'
import Header from "@/Components/Header";
import NavCat from "@/Components/NavCat";
import Notification from "@/Components/Notification";
import Footer from "@/Components/Footer";
import CoverLayout from "@/Layouts/CoverLayout";

import Pagination from "@/Components/Pagination";

export default {
  components: {
    Header,
    JetButton,
    Notification,
    Footer,
    CoverLayout,
    Pagination,
    NavCat,
  },

  data() {
    return {
      titre: "Catégories d'article",
      nb: 0,
    };
  },
   methods:{
      liveSubstr(data, debut=0,fin=0){
        return  data.substr(debut,fin)+'...';
      },
      TextInt(value){
          if (/^(-|\+)?(\d+|Infinity)$/.test(value))
            return Number(value);
        return 0;
      },
    resetData(){
        //this.commentaire=null;
    },

  },
   mounted() {
  },
  props: ["datas",'categories','cat','url'],
};
</script>

<style>
    .cover_article_blog{
        background-position: 0% center;
        background-size:contain;
        background-repeat: no-repeat;
    }


.rating {
    display: flex;
    margin-top: -10px;
    flex-direction: row-reverse;
    margin-left: -4px;
    float: left
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 19px;
    font-size: 25px;
    color: #f7b900;
    cursor: pointer
}
.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}








@media (min-width: 0) {
    .g-mr-15 {
        margin-right: 1.07143rem !important;
    }
}
@media (min-width: 0){
    .g-mt-3 {
        margin-top: 0.21429rem !important;
    }
}

.g-height-50 {
    height: 50px;
}

.g-width-50 {
    width: 50px !important;
}

@media (min-width: 0){
    .g-pa-30 {
        padding: 2.14286rem !important;
    }
}

.g-bg-secondary {
    background-color: #fafafa !important;
}

.u-shadow-v18 {
    box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
}

.g-color-gray-dark-v4 {
    color: #777 !important;
}

.g-font-size-12 {
    font-size: 0.85714rem !important;
}

.media-comment {
    margin-top:20px
}
</style>
