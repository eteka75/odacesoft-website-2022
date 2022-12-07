<template>
    <Header menu="Accueil" />
    <Head>
        <title>{{ title }} • Odacesoft</title>
        <meta
            head-key="description"
            name="description"
            content="Découvrez nos produits et services pour faire décoller vos affaires grâce aux digital."
        />
    </Head>
    <cover-layout>
        <div class="container-xxl">
            <div class="row">
                <div class="col-md-6 bg-gray-800 text-white text-md-center">
                    <div class="py-sm-40 p-sm-6">
                        <h1
                            v-if="title"
                            class="lh-tight text-white ls-tight display-4 mb-2"
                        >
                            Formuler une demande de stage
                        </h1>
                        <p class="lead text-white">
                            Vous êtes jeunes et souhaitez intégrer un
                            environnement afin d'accroitre et de développer vos
                            compétences
                        </p>
                        <br>
                        <inertia-link
                            :href="route('demande-stage')"
                            class="btn btn-white  d-block d-sm-inline rounded-1 mt-4"
                            >Soumettre ma candidature <i class="fa fa-arrow-right"></i>
                        </inertia-link>

                        <div  class="p-3 borderborder-white mt-n2 rounded-2">
                        <div class="row">
                          <div class="col-md-6 mx-auto py-2 mt-3 text-white">
                            <inertia-link :href="route('stage.statut')" title="Vérifier l'état de votre demande" class="text-white" >Vérifier</inertia-link>
                          </div>
                        </div>
                        <form class="row" v-show="showdialog" action="" method="get">
                          <div class="col-md-6 mx-auto pt-2 ">
                            <div
                                id="search-inner"
                                class="input-group rounded-1 input-group-inline shadow-none"
                            >
                                <input
                                    type="text"
                                    class="form-control form-control-flush bg-transparent border-0"
                                    id="search" title="Saisir votre code pour vérifier l'état de votre demande de stage"
                                    placeholder="Saisir votre code pour vérifier l'état de votre demande de stage"
                                    aria-label="Search"
                                    aria-describedby=""
                                    data-docs-version="1.0"
                                /><button type="submit"
                                    class="input-group-text bg-primary rounded-start-0 rounded-1 text-white border-0 shadow-none px-3"
                                    > Vérifier</button
                                >
                            </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                <div class="col-md-6 bg-gray-100 border text-md-center">
                    <div class="py-sm-40 p-sm-6">
                        <h1
                            v-if="title"
                            class="lh-tight text-cyan-800 ls-tight display-4 mb-2"
                        >
                            Devenir partenaire
                        </h1>
                        <p class="lead text-white_">
                            Vous adhérez à notre vision des choses et souhaitez
                            apporter votre part de contribution à l'édiffice,
                            rejoignez nous!
                        </p>

                        <inertia-link
                            :href="route('devenir-partenaire')"
                            class="btn bg-primary text-white rounded-1 mt-4"
                            >Devenir partenaire
                        </inertia-link>
                    </div>
                </div>
                <!--div class="col-md-6 bg-soft-primary  text-md-center">
                <div class="py-sm-40 p-sm-6">
                <h1 v-if="title" class="lh-tight text-primary ls-tight display-4 mb-2">
               Travailler chez nous 
                </h1>
                <p class="lead text-dark">Vous êtes jeunes et talentueux, vous soihaitez rejoindre une équipe créative et impactantes, c'est le moment de nous le prouver</p>
                <inertia-link :href="route('travailler-chez-nous')" class="btn btn-primary  rounded-0  mt-4">Soumettre mon dossier </inertia-link>
            </div>
        </div-->
                <div
                    class="col-md-12 bg-cyan-800 bg-gradient-to-b text-md-center"
                >
                    <div class="py-sm-40 p-sm-6">
                        <h1
                            v-if="title"
                            class="lh-tight text-white ls-tight display-4 mb-2"
                        >
                            Rejoindre la communauté
                        </h1>
                        <div class="row">
                            <div class="col-12 col-md-7 col-xl-6 mx-auto">
                                <p class="lead text-white">
                                    Rejoingnez notre communauté Odacesoft Tech
                                    sur :
                                </p>
                                <ul class="list-unstyled mt-2 text-white">
                                    <li>
                                        <a
                                            target="_blanck"
                                            href="https://chat.whatsapp.com/H2P0KD4wzEbGFzJMRLvajJ"
                                            class="btn btn-success border-2border-white w-100_ px-8 rounded-1 mt-4"
                                        >
                                            WhatsApp</a
                                        >
                                        &nbsp; &nbsp; &nbsp; &nbsp;<a
                                            target="_blanck"
                                            href="https://web.facebook.com/Odacesoft/"
                                            class="btn btn-primary w-100_ px-8 rounded-1 mt-4"
                                        >
                                            Facebook</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section>
            <div v-if="datas" class="pb-10 pb-lg-16 pt-lg-12 bg-gray-100_">
                <div v-if="datas.data" class="container-xl max-w-screen-xl">
                    <div
                        class="row align-items-center"
                        id="autres-realisations"
                        data-masonry='{"percentPosition": true }'
                    >
                        <div
                            v-for="p in datas.data"
                            :key="p"
                            class="col-lg-3mt-5 col-sm-6 col-lg-4 col-xxl-3"
                        >
                            <inertia-link
                                :href="route('la-realisation', p.slug)"
                            >
                                <div class="col-sm-6col-lg-4">
                                    <div
                                        class="card card-overlay-bottom card-img-scale overflow-hidden mb-4 mcard"
                                    >
                                        <!-- Card featured -->
                                        <!--span class="card-featured" title="Featured post"><i class="fas fa-star"></i></span-->
                                        <!-- Card Image -->
                                        <img :src="p.img" :alt="p.title" />
                                        <div
                                            class="card-img-overlay d-flex flex-column p-3 p-md-4"
                                        >
                                            <div v-if="p.service">
                                                <a
                                                    href="#"
                                                    class="badge bg-warning"
                                                    ><i
                                                        class="fas fa-circle me-2 small fw-bold"
                                                    ></i
                                                    >{{ p.service.title }}</a
                                                >
                                            </div>
                                            <div class="w-100 mt-auto">
                                                <h4 class="text-white">
                                                    <inertia-link
                                                        :href="
                                                            route(
                                                                'la-realisation',
                                                                p.slug
                                                            )
                                                        "
                                                        class="btn-link text-reset stretched-link"
                                                    >
                                                        {{
                                                            liveSubstr(
                                                                p.title,
                                                                0,
                                                                70
                                                            )
                                                        }}
                                                    </inertia-link>
                                                </h4>

                                                <ul
                                                    class="nav nav-divider text-white-force align-items-center small"
                                                >
                                                    <!--li class="nav-item position-relative">
                                <div v-if="p.user" class="nav-link"><i class="fa fa-user-circle" aria-hidden="true"></i> <a href="#" class="stretched-link text-reset btn-link">{{ p.user.name }}</a>
                                </div>
                                </li-->
                                                    <li
                                                        class="nav-item text-sm text-white-50"
                                                    >
                                                        • {{ p.h_created_at }}
                                                    </li>
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
                        <simple-pagination
                            class="mt-6 justify-content-center"
                            :links="datas"
                        />
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
    data() {
        return {
            title: "Nous rejoindre",
            showdialog:false,
        };
    },
    props: ["datas"],
    mounted() {
        //this.title=this.cat_service?this.data.title:'Nos réalisations'
    },
      methods: {
        AfficherDialog(){
          
        }
      }
};
</script>
<style scope></style>
