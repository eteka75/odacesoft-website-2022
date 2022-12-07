<template>
  <div></div>
  <div>
    <Top-Header :titre="titre">
      <template #btn>
        <div>
         <inertia-link
              :href="route('categorie-article.index')"
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
            <inertia-link v-if="data"
              :href="route('categorie-article.edit', data.id)"
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
    <div class="px-10 col-md-6">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 text-mute font-bold text-end"></div>
                    <div class="col-md-9 text-end">
                        <inertia-link
                        :href="route('categorie-article.index')"
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
                        <inertia-link v-if="data"
                        :href="route('categorie-article.edit', data.id)"
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
                    <div class="col-md-3 text-mute font-bold text-end"></div>
                    <div class="col-md-9">
                <h3>{{data.nom}}</h3></div>
                    <div class="col-md-3 text-mute font-bold text-end">Cétgorie :</div>
                    <div class="col-md-9">{{data.nom}}</div>
                     <div class="col-md-3 text-mute font-bold text-end">Slug :</div>
                    <div class="col-md-9">{{data.slug}}</div>
                    <div class="col-md-3 text-mute font-bold text-end">Description :</div>
                    <div class="col-md-9">{{data.description}}</div>
                    <div class="col-md-3 text-mute font-bold text-end">Création :</div>
                    <div class="col-md-9"><i class="fas fa-calendar" aria-hidden="true"></i> {{data.h_created_at}}</div>
                     <div v-if="data.user"  class="col-md-3 text-mute font-bold text-end">Auteur :</div>
                    <div v-if="data.user" class="col-md-9"><i class="fas fa-calendar" aria-hidden="true"></i> {{data.user.name}}</div>
                    <div v-if="data.h_updated_at!=data.h_updated_at" class="col-md-3 text-mute font-bold text-end"> Dernière modification :</div>
                    <div v-if="data.h_updated_at!=data.h_updated_at"  class="col-md-9"> <i class="fas fa-calendar-check" aria-hidden="true"></i> {{data.h_updated_at}}</div>
                </div>
            </div>
        </div>
    </div>

    </div>
  </div>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";

import TopHeader from "@/Components/TopHeader";
import AdminLayout from "@/Layouts/AdminLayout";
import AdminSidebar from "@/Components/AdminSidebar";
import Pagination from "@/Components/Pagination";

export default {
  components: {
    AdminLayout,
    AdminSidebar,
    TopHeader,
    Pagination,
  },
  props: ["data"],
  data() {
    return {
      titre: "Affiche de catégorie d'article",

    };
  },
  layout: AdminLayout,

  mounted() {

  },
  watch: {

},
  methods: {

  },
};
</script>
