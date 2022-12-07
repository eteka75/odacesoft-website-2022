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
            <p v-if="page" class="text-lg  px-lg-16 px-xl-24 text-muted">
            {{ page.lead }}
            </p>
            <inertia-link class="btn btn-danger btn-sm mt-4" :href="route('commander.service')+'?s='+page.slug"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Commander --></inertia-link>
          </div>
        </div>
      </div>
    </div>
    </div>
     <div class="container-lg max-w-screen-xl">
        <div class="row">
            <div v-if="page" class="col-md-9   mb-10 mx-auto ">
                <p class="p-3 p-md-8 pxl-12" v-html="page.content"></p>
            </div>
        </div>
     </div>
     <div v-if="autres_services" class="bg-gray-100 py-8 py-xl-12">
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
								<p class="text-sm">{{liveSubstr(s.lead,0,100)}}</p>
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
  props:['page'],
  mounted() {
      this.title=this.page?this.page.title:'Nos services'
  }
};
</script>
