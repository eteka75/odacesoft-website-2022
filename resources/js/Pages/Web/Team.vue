<template>
  <cover-layout>
    <Head>
      <title>Notre équipe • Odacesoft</title>
      <meta
        head-key="description"
        name="description"
        content="Découvrez l'équipe derrière Odacesoft"
      />
    </Head>
    <Header menu="Team" />
    <section class="bg-fade-light bg-fade-bottom">
    <div class="container-lg max-w-screen-xl">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 text-center">
          <div class="py-10 py-md-12 py-xl-10">
            <h1 class="lh-tight ls-tight display-4 mb-8">
              Notre équipe
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
              Derrière nos différentes activités se cachent une équipe dynamique
              qui oeuvre chaque jour pour faire avancer les idéaux que nous
              pronons au quotation.
            </p>
            <div class="py-5 py-xl-8">
              <inertia-link href="#" class="btn px-5 btn-primary">
                <i class="fa fa-user-plus" aria-hidden="true"></i> Rejoindre
                l'équipe
              </inertia-link>
            </div>
          </div>
        </div>
      </div>

    </div>
    </section>
    <section>
    <div class="bg-translucent-dark py-14">
      <div class="container-lg max-w-screen-xl">
        <div class="row">
          <div class="col-md-10 mx-auto">
            <div v-if="datas" class="row g-4">
              <!-- Team item-->
              <div v-for="d in datas.data" :key="d" class="col-sm-6 col-lg-4">
                <div class="text-center">
                  <!-- Avatar img -->
                  <div class="avatar avatar-4xl mb-3 ">
                    <inertia-link :href="route('membre-team',d.id)"><img
                      class="avatar-img rounded-circle shadow-2 shadow-4-hover p-1 bg-white "
                      :src="'/' + d.photo"
                      :alt="d.nom"
                    />
                    </inertia-link>
                  </div>
                  <h5 class="h4 font-bold">{{ d.nom + " " + d.prenom }}</h5>
                  <p class="m-0 font-light">{{ d.poste }}</p>
                  <ul class="nav justify-content-center">
                    <li v-if="d.website" class="nav-item">
                      <a
                        class="nav-link px-2 fs-5"
                        :href="d.website"
                        target="_blank"
                        ><i class="fas fa-globe-africa"></i
                      ></a>
                    </li>
                    <li v-if="d.facebook" class="nav-item">
                      <a
                        class="nav-link px-2 fs-5 text-primary"
                        :href="d.facebook"
                        target="_blank"
                        ><i class="fab fa-facebook-square"></i></a>
                    </li>
                    <li v-if="d.twitter" class="nav-item">
                      <a
                        class="nav-link px-2 text-info fs-5"
                        :href="d.twitter"
                        target="_blank"
                        ><i class="fab fa-twitter-square"></i
                      ></a>
                    </li>
                    <li v-if="d.linkedin" class="nav-item">

                      <a
                        class="nav-link px-2 fs-5 text-gray-900"
                        :href="d.linkedin"
                        target="_blank"
                        ><i class="fab fa-linkedin "></i></a>
                    </li>
                    <li v-if="d.other_link" class="nav-item">
                      <a
                        class="nav-link px-2 fs-5 text-gray-800"
                        :href="d.other_link"
                        target="_blank"
                        ><i class="fa fa-link text-muted text-xs" aria-hidden="true"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>
    <section class="wrapper bg-gray-900  wrapper  wrapper-border py-5 py-xl-8">
        <div class="container  pt-md-17 pb-md-19">
            <div class="row ">
                <div class="col-lg-12 text-uppercase_ text-center mb-4 py-6 mb-4">
                <h5 class=" text-gray-800 h1 text-white">Que faisons nous ?</h5>

                </div>
                <!-- /column -->
                <div class="col-lg-12">
                   <div  v-if="activites" class="owl-carousel owl-theme" id="owl-carousel-article">
                            <div  v-for="article in activites" id="article-top"
                                :key="article" class="card h-100 item shadow-2 shadow-hover rounded-3 ">
                                    <inertia-link class="text-dark" v-if="article" :href='route("activite",article.slug)'>
                                    <div class="img-article-cover">
                                    <img v-if="article.img"
                                    :src="'/'+article.img"
                                    class="card-img-top"
                                    :alt="article.img"
                                    />
                                    </div>
                                    </inertia-link>
                                    <div class="card-body">
                                    <div class="clearfix mb-3">
                                        <span  v-if="article.categories"  class="float-start badge rounded-pill bg-gray-300 text-muted " :class="article.categories.couleur"
                                        ><inertia-link class="text-white" :href='route("blog.cat.show",article.categories.id)'>{{ article.categories.nom }}</inertia-link></span
                                        >
                                    </div>

                                    <h4 class="mb-2 h6"><inertia-link class="text-dark" :href='route("activite",article.slug)'> {{ liveSubstr(article.title,0,55) }}</inertia-link></h4>
                                    <div v-if="article.lead" class="text-xs text-muted">{{ liveSubstr(article.lead,0,50) }}</div>
                                <div class="d-flex text-xs mt-4">
                                     <span class="float-end price-hp me-3 text-xs"><i class="fa fa-calendar-o" aria-hidden="true"></i> {{ article.h_created_at }}</span>
                                    <span v-if="article.user" class="me-3"> <i class="far fa-user-circle" aria-hidden="true"></i> {{article.user.name}}</span>
                                    <span v-if="article.view_count" class="me-3"> <i class="far fa-eye" aria-hidden="true"></i> {{ (article.view_count)}}</span>
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
import Header from "@/Components/Header";
import Notification from "@/Components/Notification";
import Footer from "@/Components/Footer";
import CoverLayout from "@/Layouts/CoverLayout";

import "/storage/vendor/owl.carousel/owl.carousel.min.js";
import "/storage/vendor/owl.carousel/assets/owl.carousel.min.css";
import "/storage/vendor/owl.carousel/assets/owl.theme.default.min.css";

export default {
  components: {
    Header,
    Notification,
    Footer,
    CoverLayout,
  },
  props: ["datas",'activites'],
  mounted(){
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
