<template>
  <Header menu="Activites"/>
  <Head>
    <title>{{ title }} • Odacesoft</title>
        <meta head-key="description" name="description" content="Découvrez qui nous sommes, nos rêves et nos ambitions pour contribuer à l'émergence de notre continent." />
  </Head>
  <cover-layout>   
    <section  v-if="activite" class="card_ bg-dark-overlay-5= overflow-hidden card-bg-scale h-100vh_ text-center rounded-0" :style="'background:url(s/'+activite.img+') #ffffff;'">
	 
  <div class="container-lg max-w-screen-xl">
		<div class="row">
      <div class="col-md-12 pt-4">
        <nav>
          <ul class="breadcrumb  list-inline text-xs text-muted">
                  <li class="list-inline-item"> <a :href="route('accueil')" class="text-muted" title="Odacesoft"><i class="fas fa-home"></i> Accueil </a></li>
              <li  class="list-inline-item"> <a :href="route('activites')" class="text-muted" title="Actualités">Actualités</a></li>
              <li  class="list-inline-item d-none d-sm-inline" :title="title">{{ liveSubstr(title,0,80) }}</li>
          </ul>
          </nav>
      </div>
      <div class="col-md-1 col-12 d-none d-sm-inline">
        <div>
            <i class="fa fa"></i>
        </div>
      </div>
      <div class="col-md-10  col-12">
        <div >
          <!-- Card Image overlay -->
          <div class="card-img-overlayd-flex align-items-center text-center py-8">
            <div class="w-100_ my-auto py-4 pt-xl-8">
              <!-- Card category
              <span  class="badge bg-danger text-xs mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>Activité</span>
               Card title -->
              


              <div class=" max-w-screen-xl">
                <h2 class=" display-5 ">{{ title }}</h2>
            </div>
              <!-- Card info -->
              <ul v-if='activite' class="nav nav-divider text-xs text-white-force_ mt-4 align-items-center justify-content-center">
                <li v-if='activite.user' class="nav-item">
                  <div class="nav-link  me-3">
                    <div class="d-flex align-items-center text-white_ position-relative">
                      <div class="avatar avatar-sm">
                            <img class="avatar-img rounded-circle" :src="activite.user.profile_photo_url" :alt="activite.user.nom">

                      </div>
                      <span title="Auteur" class="ms-3">par <a href="#" class="stretched-link text-reset btn-link">{{ activite.user.nom }}</a></span>
                    </div>
                  </div>
                </li>
                <li title="Date de publication" class="nav-item text-xs text-white_ me-3"><i class="fas fa-calendar-alt   "></i> {{ activite.d_created_at }} à {{ activite.t_created_at }} </li>
                <li title="Nombre de vues" class="nav-item text-xs text-white_ me-3"><i class="fa fa-eye" aria-hidden="true"></i> {{ activite.view_count }} vue{{ activite.view_count>1?'s':'' }}</li>
                <li v-if="activite.temps" title="Temps de lecture" class="nav-item text-xs text-white_  me-3" > <i  title="Temps de lecture" class="fa fa-clock" aria-hidden="true"></i> {{activite.temps}} min </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
       <div class="col-md-1 col-12 d-none d-sm-inline">
       </div>
    </div>
	</div>
</section>
<section>
    <div class="container-lg py-14pt-md-5_ pb-md-19">
        <div class="row">
            <div class="col-md-11 col-xl-9  col-sm-12 shadow-4_ rounded-4 mx-auto">
                 <div v-if="activite.img" class="text-center px-lg-10_ mb-5">
                    <a :href="'/'+activite.img" data-lightbox="image-1" :data-title="title">
                        <img
                        :src="'/'+activite.img"
                        class="img-responsive shadow-5 mt-5 w-100 rounded-5 mx-auto shadow-4_  border-8border-white"
                        :alt="activite.img"
                        />
                    </a>
                     </div>
                <blockquote v-if="activite.lead" class="font-bold text-dark lead py-4">
                {{ activite.lead }}
                </blockquote>

                <div id="main_article" class="p-4px-xl-10  font-serif text-xl mt-4 mb-12 text-justify_" v-html="activite.content">
                </div>
            </div>
        </div>
    </div>
</section>

<section  v-if="activites" class="wrapper wrapper bg-translucent-dark_ wrapper-border py-5 py-xl-16">
        <div class="container-lg  pt-md-17 pb-md-19">
            <div class="row ">
                <div class="col-lg-12  mb-4">
                <h5 class=" text-muted text-uppercase">à découvrir</h5>
                <inertia-link :href="route('activites')" class="btn btn-primary float-end mt-n8 btn-sm py-2 px-3"><i class="fa fa-plus" aria-hidden="true"></i>  Toutes les activités</inertia-link>

                </div>
                
                <!-- /column -->
                <div class="col-lg-12">
                   <div  v-if="activites" class="owl-carousel owl-theme" id="owl-carousel-article">
                            <div   v-for="article in activites" id="article-top"
                                :key="article" class="card h-100 item shadow-2 shadow-hover rounded-3 ">
                                    <inertia-link class="text-dark" v-if="article" :href='route("activite",article.slug)'>
                                    <div class="img-article-cover">
                                    <img :title="article.title" v-if="article.img"
                                    :src="'/'+article.img"
                                    class="card-img-top"
                                    :alt="article.img"
                                    />
                                    </div>
                                    </inertia-link>
                                    <div  class="card-body pt-0">
                                    <div :title="article.title" class="clearfix mb-3">
                                        <span  v-if="article.categories"  class="float-start badge rounded-pill bg-gray-300 text-muted " :class="article.categories.couleur"
                                        ><inertia-link class="text-white" :href='route("blog.cat.show",article.categories.id)'>{{ article.categories.nom }}</inertia-link></span
                                        >
                                    </div>

                                    <h4 class="mb-2 h6"><inertia-link class="text-dark" :href='route("activite",article.slug)'> {{ liveSubstr(article.title,0,55) }}</inertia-link></h4>
                                    <div v-if="article.lead" class="text-xs text-muted">{{ liveSubstr(article.lead,0,65) }}</div>
                                <div class="d-flex_ text-xs mt-4 text-center_">
                                     <span  title="Date d'ajout"  class="float-end_ price-hp me-3 text-xs"> <i class="fa fa-calendar-alt" aria-hidden="true"></i> {{ article.d_created_at }}</span>
                                    <span v-if="article.user" class="me-3"> <i class="far fa-user-circle" aria-hidden="true"></i> {{article.user.name}}</span>
                                    <span title="Nombre de vues" v-if="article.view_count!=''" class="me-3"> <i class="far fa-eye" aria-hidden="true"></i> {{ (article.view_count)}}</span>
                                    <span title="Temps de lecture" v-if="article.temps" class="me-3"> <i  class="fa fa-clock" aria-hidden="true"></i> {{article.temps}} min </span>
                                </div>
                                    <!--div class="text-center my-2">
                                        <a href="#" class="card-link">Lire la suite -></a>
                                    </div-->
                                    </div>
                                </div>
                        </div>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
			<!-- /.container -->
		</section>
  </cover-layout>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import Header from "@/Components/Header";
import Notification from "@/Components/Notification";
import Footer from "@/Components/Footer";
import CoverLayout from "@/Layouts/CoverLayout";

import "/storage/vendor/owl.carousel/owl.carousel.min.js";
import "/storage/vendor/owl.carousel/assets/owl.carousel.min.css";
import "/storage/vendor/owl.carousel/assets/owl.theme.default.min.css";


import "/storage/vendor/lightbox/css/lightbox.css";
import "/storage/vendor/lightbox/js/lightbox.js";

export default {
  components: {
    Header,
    Notification,
    Footer,
    CoverLayout,
  },
  props:['activite','activites'],
  data(){
      return{
          title:"Activité",
      }
  },
  mounted(){
      this.title = this.activite?this.activite.title:"Nos activités";
      this.initCarroussel();
  },
  methods:{
   initCarroussel:function(){
       $('#owl-carousel-article').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
            items: 1,
            nav: true
            },
            600: {
            items: 3,
            nav: false
            },
            1000: {
            items: 4,
            nav: true,
            loop: false,
            margin: 20
            }
        }
        });
   }
  },
};
</script>
<style scoped>
.h-100vh {
    min-height: 40vh !important;
}

.bg-dark-overlay-5:hover{
 background-position: left left;
 transition:all ease 1s ;
}
.bg-dark-overlay-5{
background-repeat: no-repeat;
 background-color:rgb(6, 40, 74);
 background-position: center left;
 background-size: cover;
transition:all ease 1s ;
}

    * img,img{
      max-width:100% !important;
    }
    
    #main_article{
      font-size:1.3 rem;
      font-family: var(--x-font-serif) !important;
      word-break: break-word;
    }
    div#main_article,div#main_article *{
      font-size: 1.5rem !important;
    }
</style>
