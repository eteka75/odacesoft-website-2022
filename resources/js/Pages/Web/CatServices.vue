<template>
  <Header menu="Produits"/>
   <Head>
    <title>{{ title }} • Odacesoft</title>
    <meta head-key="description" name="description" content="Découvrez nos produits et services pour faire décoller vos affaires grâce aux digital." />
  </Head>
  <cover-layout>
    <div class="bg-fade-light">
    <div class="container-lg max-w-screen-xl">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 text-md-center">
          <div class="py-10 py-md-16 py-xl-20">
            <h1 v-if="title" class="lh-tight ls-tight display-4 mb-4">
             {{ title }}
            </h1>
            <p v-if="cat_service" class="text-lg  px-lg-16 px-xl-24 text-muted">
            {{ cat_service.lead }}
            </p>
            <inertia-link class="btn btn-danger btn-sm mt-4" :href="route('commander.service')+'?s='+cat_service.slug"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Commander --></inertia-link>
          </div>
        </div>
      </div>
    </div>
    </div>
     <div class="container-lg max-w-screen-xl">
        <div class="row">
            <div v-if="cat_service" class="col-md-9   mb-10 mx-auto ">
                <p class="p-3 p-md-8 pxl-12" v-html="cat_service.content"></p>
            </div>
        </div>
     </div>
     <div  v-if="services" class="bg-translucent-dark py-8">
      <div class="container-lg max-w-screen-xl">
        <div v-if="services.length > 0" class="row" data-masonry='{"percentPosition": true }'>
        <h4 class="text-uppercase text-muted mb-4">Services en {{title}}</h4>
          <div v-for="c in services" :key="c" class="col-md-4 ">
            <div class="card shadow mb-5 mt-2">

                <div class="card-body">
                    <inertia-link v-if="c.img!=null" :href="route('cat-service.show',c.slug)" >
                    <img :src="'/'+c.img" class="card-img-top" :alt="c.img">
                    </inertia-link>
                    <inertia-link  :href="route('cat-service.show',c.slug)">
                    <h4 class="mt-3">{{ c.title }}</h4>
                    <p v-if="c.lead" class="text-sm text-muted">
                     {{ liveSubstr(c.lead,0,120) }}
                    </p>
                     </inertia-link>
                </div>
            </div>
          </div>
          </div>
          <div v-else>
           <div class="card shadow col-md-8 mx-auto mb-5 mt-2 text-center">
                <div class="card-body">
                    <h4>Aucun service disponible dans cette catégories</h4>
                </div>
           </div>

          </div>
          </div>
          </div>
     <div v-if="autres_services" class="bg-gray-900 py-8 py-xl-12">
        <div class="container-lg max-w-screen-xl">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-muted dispay-6 mb-3 text-sm text-uppercase">Autres services</h4>
                </div>
                <div v-for='s in autres_services' :key='s' class="col-md-6">
                   <inertia-link :href="route('cat-service',s.slug)" >
                        <div class="card bg-soft-leaf mb-5 shadow-sm-hover border-1-hover border-primary-hover">
							<div class="card-body px-4 px-xl-10 py-4 py-xl-6 ">
                                 <img v-if="s.img"
                                    :src="'/'+s.img"
                                    class="img-responsive w-10   rounded-2 "
                                    :alt="s.img"
                                    />
								<h4 class="post-category mb-1 font-bold text-leaf">{{s.title}}</h4>
								<p class="text-sm">{{liveSubstr(s.lead,0,120)}}</p>
							</div>
						</div>
                    </inertia-link>
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

export default {
  components: {
    Header,
    Notification,
    Footer,
    CoverLayout,
  },
  data(){
      return {
          title:"Services",
      }
  } ,
  props:['cat_service','autres_services','services'],
  mounted() {
      this.title=this.cat_service?this.cat_service.title:'Nos services'
  }
};
</script>
