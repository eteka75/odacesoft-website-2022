<template>
  <Header menu="Programmes"/>
   <Head>
    <title>{{ title }} • Odacesoft</title>
    <meta head-key="description" name="description" content="Découvrez nos produits et services pour faire décoller vos affaires grâce aux digital." />
  </Head>
  <cover-layout>
    <div class="bg-gray-100">
    <div class="container-lg max-w-screen-xl">
      <div class="row">
        <div class="col-md-8 col-lg-8 col-xl-8 col-12 order-2 order-md-1">
          <div class="py-10 py-md-16 py-xl-20">
            <h1 v-if="title" class="lh-tight   ls-tight display-4 mb-4">
             {{ title }}
            </h1>
             <p v-if="data" class=" font-boldbold lead ">
                    {{ data.resume }}
                </p>

           </div>
        </div>
        <div class="col-md-4 py-6 col-12 order-1 order-md-2">
            <div class="mt-8 mx-auto text-center">
                 <img v-if="data.img"
                    :src="'/'+data.img"
                    class="img-responsive mx-auto max-h-72 "
                    :alt="data.img"
                    />
                </div>
        </div>
      </div>
    </div>
    </div>
     <div class="container-lg max-w-screen-xl">
        <div class="row">
        <div class="col-md-12">

        </div>
            <div v-if="data" class="col-md-8   mb-10 mx-auto ">


                <p class="py-3 font-serif text-lg py-md-8 py-xl-12" v-html="data.description"></p>
            </div>
            <div class="col-md-4">
                 <div v-if="datas" class=" py-8 py-xl-12">


                    <h4 class="text-muted dispay-6 mb-3 text-sm text-uppercase">Autres programmes</h4>

            <div class="row">

                <div v-for='s in datas' :key='s' class="col-md-12">
                <inertia-link   v-if="s.slug" :href="route('get-projet',s.slug)" >
                        <div class="card bg-soft-leaf_  shadow-2-hover mb-n1 rounded-0 shadow-smborder-1-hoverborder-primary-hover min-h-32">
                            <div class="card-body">
                                <div class="row">
                                <div v-if="s.img" class="col-md-3 ng-gray-100">
                                <img v-if="s.img"
                                    :src="'/'+s.img"
                                    class="img-responsive   rounded-2 "
                                    :alt="s.img"
                                    />
                                </div>
                                <div class="col-md-9" :class="s.img==''?'col-md-12':''">
                                    <div class="">
                                        <h5 class="post-category mb-1 font-bold text-leaf">{{s.title}}</h5>
                                        <p class="text-sm text-muted">{{liveSubstr(s.resume,0,80)}}</p>
                                    </div>
                                </div>
                                </div>

                                    </div>
                                </div>
                            </inertia-link>
                        </div>
                    </div>
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

import "/storage/vendor/masonry/masonry.min.js";

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
  props:['data','datas'],
  mounted() {
      this.title=this.data?this.data.title:'Programme';
     // console.log(this.datas)
  }
};
</script>
