<template>
  <div>

      <Top-Header :titre="title">
        <template #btn>
          <div>
            <inertia-link
              :href="route('email.index')"
              class="
                btn
                d-inline-flex
                btn-sm btn-white
                border-1 border-dark-100
                mx-1
              "
            >
              <span class="pe-2">
                <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
              </span>
              <span>Retour</span>
            </inertia-link>
            <inertia-link v-if="article"
              :href="route('email.edit', article.id)"
              class="
                btn
                d-inline-flex
                btn-sm bg-gray-700 text-white
                mx-1
              "
            >
              <span class="pe-2">
                <i class="fas fa-edit" aria-hidden="true"></i>
              </span>
              <span>Modifier</span>
            </inertia-link>

          </div>
        </template>
      </Top-Header>
      <div class="main-content">
        <div class="row">
          <div class="col-lg-8 p ">
            <div v-if="article" class="card shadow-1">
                <div class="card-body" >
                <h3  class="h4">{{article.title}}</h3>
                <inertia-link
              :href="route('email.index')"
              class="
                btn
                d-inline-flex
                btn-sm btn-white float-end
                border-1 border-dark-100
                mx-1
              "
            >
              <span class="pe-2">
                <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
              </span>
              <span>Retour</span>
            </inertia-link>
                <h5>{{article.objet}}</h5>
                <ul class=" d-flex text-xs list-inline text-muted pt-2">
                    <li class="me-2"><i class="far fa-calendar-alt  me-1" aria-hidden="true"></i>Ajouté, {{ article.h_created_at }}</li>
                    <li v-if=' article.h_updated_at!= article.h_created_at' class="me-2"><i class="far fa-calendar-check me-1" aria-hidden="true"></i>Dernière mise à jour, {{ article.h_updated_at }}</li>
                 </ul>
                <ul  class=" d-flex list-inline text-muted text-xs " v-if='article.expediteur'>
                <li class="text-dark fw-bold font-bold">Expéditeur :</li>
                    <li class="mx-1 text-primary" >{{article.expediteur}}</li>
                </ul>

                <ul  class=" d-flex list-inline text-muted text-xs " v-if='article.slug'>
                <li class="text-dark fw-bold font-bold">Destinataire :</li>
                    <li class="mx-1 text-primary" >{{article.destinataire}}</li>
                </ul>
                <ul  class=" d-flex list-inline text-muted text-xs " v-if='article.cci'>
                <li class="text-dark fw-bold font-bold">Copie :</li>
                    <li class="mx-1 text-primary" >{{article.cci}}</li>
                </ul>



                <div v-if="article"  class=" text-dark font-serif text-lg" v-html="article.message">

                </div>
                </div>
            </div>
          </div>
        </div>
      </div>

  </div>
</template>

<script>
import TopHeader from "@/Components/TopHeader";
import AdminLayout from "@/Layouts/AdminLayout";
import AdminSidebar from "@/Components/AdminSidebar";
import JetButton from "@/Jetstream/Button";

import { Head } from "@inertiajs/inertia-vue3";
import '/storage/vendor/summernote/summernote.min.css'
import '/storage/vendor/tagsinput/tagsinput.js'
export default {
  components: {
    AdminLayout,
    AdminSidebar,
    TopHeader,
    JetButton,
  },
  layout: AdminLayout,
  data(){
      return {
          title:"Affichage de l'email",
          article:null,
      }
  },
props:['data'],
  mounted() {
      this.initData()
  },
  methods: {
      initData(){
          this.article=this.data;
          console.log(this.article);
      }
  }
}
</script>
