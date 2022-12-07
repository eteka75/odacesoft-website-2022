<template>
  <div>

      <Top-Header :titre="title">
        <template #btn>
          <div>
            <inertia-link
              :href="route('evenement.index')"
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
              :href="route('evenement.edit', article.id)"
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
            <div v-if="article" class="card shadow-2">
                <div class="card-body" >
                <h3  class="h4">{{article.title}}</h3>
                <ul class=" d-flex text-xs list-inline text-muted pt-2">
                    <li class="me-2"><i class="far fa-calendar-alt  me-1" aria-hidden="true"></i>Ajouté, {{ article.h_created_at }}</li>
                    <li v-if=' article.h_updated_at!= article.h_created_at' class="me-2"><i class="far fa-calendar-check me-1" aria-hidden="true"></i>Dernière mise à jour, {{ article.h_updated_at }}</li>
                    <li class="me-2" v-if="article.h_created_at"><i class="far fa-calendar-alt  me-1" aria-hidden="true"></i>Ajouté, {{ article.h_created_at }}</li>
                    <li class="me-2" title="Lieu de l'évènement"  v-if="article.lieu"> <i class="fas fa-map-marker" aria-hidden="true"></i> {{ article.lieu }}</li>
                    <li class="me-2" title="Participants"  v-if="article.nb_participants"><i class="fas fa-users"></i> {{ article.nb_participants }} participant{{ article.nb_participants>1?'s':'' }}</li>
                    <li class="me-2" title="Priorité"  v-if="article.priorite"><span class="badgebg-dangertext-white py-0 px-1"><i class="fa fa-heartbeat" aria-hidden="true"></i> {{ article.priorite }}</span> </li>
                </ul>
                <ul  class=" d-flex list-inline text-muted text-xs pt-2" v-if='article.tags'>
                <li class="text-dark fw-bold font-bold">Mots clés :</li>
                    <li class="me-3" v-for='tag in article.tags' :key='tag'>#{{tag.nom}}</li>
                </ul>
                <p v-if="article.lead" class="lead border text-xs bg-gray-100 rounded-2 mb-4 py-3 px-6">
                    {{ article.lead }}
                </p>
                <div>
                    <img v-if="article.img"
                    :src="'/'+article.img"
                    class="img-responsive rounded-5 w-100 shadow-4_ mb-8"
                    :alt="article.img"
                    />
                </div>
                <div v-if="article"  class=" text-dark font-serif text-lg" v-html="article.content">

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
          title:"Affichage d'évènement",
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
      }
  }
}
</script>
