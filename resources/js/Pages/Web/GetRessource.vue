<template>
  <Header menu="Ressources"/>
   <Head>
    <title>{{ title }} • Odacesoft</title>
    <meta head-key="description" name="description" content="Découvrez nos produits et services pour faire décoller vos affaires grâce aux digital." />
  </Head>
  <cover-layout>
    <div class="bg-gray-800_ bg-teal-800 shadow-3 text-white textwhite_">
    <div class="container max-w-screen-xl">
      <div class="row">
        <div class="col-md-6  text-md-center_">
          <div class="py-6 py-md-8py-xl-8">
            <h1 v-if="title" class="lh-tight text-white ls-tight display-4 mb-4">
             {{ title }}
            </h1>
            <h3 class="text-white" v-if="data.title"><i class="fa fa-file text-white" aria-hidden="true"></i> {{ data.title }}</h3>
            <p v-if="data" class="text-sm text-start pe-xl-3 text-white">
            {{ data.resume }}
            </p>
            <a class="btn btn-default bg-white  text-teal btn-sm mt-4" :href="data.fichier" target="_blanck"> <i class="fas fa-download"></i> Télécharger </a>

          </div>
          <div class="mb-8">
            <b>Détails:</b> <br>
            <div class="text-xs mb-6" v-html="data.description"></div>
          </div>
        </div>
        <div v-if="data.img" class="col-md-6 py-5">
            <a class="example-image-link" :href="'/'+data.img" data-lightbox="example-set" :data-title="'COMMANDE : '+data.title+' - DETAILS : '+data.content">
            <img v-if="data.img"
                      :src="'/'+data.img"
                      class="img-fluid rounded-4 mb-5 p-4 bg-whiteshadow-lg"

                    />
            </a>
            <!--small class="text-xs text-muted">* Cliquez sur l'image pour agrandir.</small-->

        </div>
      </div>
    </div>
    </div>
     <section>
          <div v-if="datas" class="pb-10 pb-lg-16 pt-lg-12 bg-gray-100_">

            <div class="container-xl max-w-screen-xl" >
              <div class="row align-items-center" id="autres-realisations">
                <div v-for="p in datas.data" :key="p" class="col-lg-3 mt-5 ">
                    <div class="r-img-cover card-body bg-gray-100" >

                        <inertia-link class=""  :href="route('get-ressource',p.slug)" >

                            <h3  class="text-xs h3 text-dark p-O m-0"> <i class="fa fa-file" aria-hidden="true"></i> {{ liveSubstr(p.title,0,50) }}</h3>
                                </inertia-link>
                            <div class="text-muted text-xs"><i class="fa fa-calendar-o" aria-hidden="true"></i> {{p.h_created_at}}</div>
                        </div>

                </div>
              </div>
              <div class="col-md-12 py-8 mx-auto text-center">
                <pagination class="mt-6 justify-content-center" :links="datas.links" />
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
          title:"Ressources",
      }
  } ,
  props:['data','datas'],
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
