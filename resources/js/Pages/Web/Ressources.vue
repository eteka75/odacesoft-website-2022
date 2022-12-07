<template>
<Head>
    <title>Ressources utiles • Odacesoft</title>
    <meta head-key="description" name="description" content="Découvrez ici quelques ressources utiles pour la communauté." />
  </Head>
  <Header menu="Ressources"/>
  <!--PAGE-->
  <cover-layout>
    <div class="bg-fade-top bg-fade-danger shadow bg-gray-100_ bg-fade-light py-4">
    <div class="container-lg max-w-screen-xl">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 text-center">
          <nav>
          <ul class="breadcrumb  list-inline text-xs text-muted">
                        <li class="list-inline-item"> <a :href="route('accueil')" class="text-muted" title="Odacesoft"><i class="fas fa-home"></i> Accueil </a></li>
                    <li  class="list-inline-item"> <a :href="route('realisations')" class="text-muted" title="Actualités">Ressources utiles</a></li>
                </ul>
          </nav>
          <div class="py-10 py-md-1 py-xl-20">
            <h1 class="lh-tight ls-tight display-4 mb-0">
            Ressources utiles
            </h1>
            <p class="text-lg  text-muted">
            Explorez et téléchargez les resources dont vous avez besoins
            </p>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="container-lg max-w-screen-xl py-8">
      <div class="row">
        <div v-if="datas &&  datas.data &&  datas.data.length" class="col-md-8 mx-auto">
            <div  v-for='r in datas.data' :key="r" class="card shadow-sm mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="r-img-cover m-3 " :style="'background-image:url(/storage/assets/web/image/file-icones/'+r.type+'.png)'">

                           <inertia-link class=""  :href="route('get-ressource',r.slug)" > <img v-if="r.img"
                                    :src="'/'+r.img"
                                    class="card-img-top rounded-0"

                                    />
                                    </inertia-link>
                        </div>
                    </div>
                    <div class="col-md-8">
                    
                        <div class="card-body ">
                          <inertia-link class=""  :href="route('get-ressource',r.slug)" >
                            <h4 v-if="r.title">{{liveSubstr(r.title,0,60)}}</h4>
                        <p v-if="r.resume" class="text-sm text-muted">{{liveSubstr(r.resume,0,255)}}</p> </inertia-link>
                        <hr class="h-0  my-3 p-0">
                        <a class="btn btn-success btn-sm"  v-if="r.fichier" :href="r.fichier" target="_blank"><i class="fas fa-download    "></i> Télécharger</a>
                        <!--inertia-link class="btn text-primary border-primary border btn-sm ms-3"  v-if="r.fichier" :href="route('get-ressource',r.slug)" target="_blank"><i class="fas fa-plus-square" aria-hidden="true"></i> Plus d'infos</inertia-link-->
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="col-md-12">
            <div class="px-3 px-lg-8 mb-8 text-center rounded-sm shadow-hover py-5 py-lg-10 bg-gray-100">
              <h1 class="display-3"> <i class="fas fa-file-pdf    "></i></h1>
              <h3>Aucune ressource n'a été ajoutée pour ne moment</h3>
              <small class="text-muted">Les ressource (fichiers d'activités, colloques, séminiaures, etc.) apparaissent ici</small>
            </div>
          </div>

    <div class="col-md-12 py-8 mx-auto text-center">
        <pagination class="mt-6 justify-content-center" :links="datas.links" />
    </div>
     </div>
    </div>
  </cover-layout>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import Header from "@/Components/Header";
import Notification from "@/Components/Notification";
import Footer from "@/Components/Footer";
import CoverLayout from "@/Layouts/CoverLayout";

import Pagination from "@/Components/Pagination";

export default {
  components: {
    Header,
    Notification,
    Pagination,
    Footer,
    CoverLayout,
  },
  props: ['datas'],
  mounted() {
      console.log(this.datas)
  }
};
</script>

<style scoped>
    .r-img-cover{
        min-height: 180px;
        background-color: #fafafa;
        background-size: 80px auto;
        background-repeat: no-repeat;
        background-position: center center;
    }
</style>
