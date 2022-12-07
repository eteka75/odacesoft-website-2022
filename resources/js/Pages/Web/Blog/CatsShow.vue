<template>
  <Header menu="Blog" />

  <Head>
    <title >{{ title }} • Odacesoft</title>
    <meta
      head-key="description"
      name="description"
      content="Apprendre, Créer, Former et partager nos connaissances dans toute l'Afrique."
    />
  </Head>
  <cover-layout>
   <section class="bg-gray-800_ bg-fade-primary  py-4 p-y-xl-16 textwhite_">
    <div class="container max-w-screen-xl">
      <div class="row">
        <div class="col-md-12  text-md-center">
          <div class="py-6 py-md-12 py-xl-16">
            <h1 v-if="title" class="lh-tight text-white_ ls-tight display-4 mb-2">
            Les catégories
            </h1>
            <p class="lead">Parcourez les différentes categories </p>

          </div>

        </div>

      </div>
    </div>
    </section>
    <section>
        <div class="container max-w-screen-xl py-6">

            <div class="row">
                <div v-if="datas && datas.data" class="row">
                    <div v-for="cat in datas.data" :key="cat" class="col-md-3">
                        <inertia-link v-if="cat && cat.slug" class="text-primary_  font-bold"  :href="route('blog.cat.show',cat.slug)">
                        <div class="card mb-3 rounded-1 shadow-lg-hover" >
                            <div class="card-body">
                            <inertia-link v-if="cat && cat.slug" class="text-primary_  font-bold"  :href="route('blog.cat.show',cat.slug)">{{cat.nom}}  </inertia-link>
                            <p v-if="cat.articles.length" ><small class="text-sm text-muted" >{{cat.articles.length}} Article{{(cat.articles.length>1)?'s':''}}</small></p>
                            <p v-else><small class="text-sm text-muted" > Aucun article</small></p>
                            </div>
                        </div>
                        </inertia-link>
                    </div>
                    <div class="col-md-12 mb-8 py-4">
                    <pagination class="mt-4 float-end" :links="datas.links" />
                    </div>
                </div>
            </div>
        </div>
    </section>
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
      title: "Toutes les catgories du Blog",
      nb: 0,
    };
  },
  methods:{
      format(date){
        return  formatRelative(new Date(date),new Date(),{locale: fr});

      },

    resetData(){
        //this.commentaire=null;
    },
    initData(){
    },

  },
   mounted() {
    console.log(this.datas)
  },
  props: ["datas",'categories'],
};
</script>

<style>

</style>
