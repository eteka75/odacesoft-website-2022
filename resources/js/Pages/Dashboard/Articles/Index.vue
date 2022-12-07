<template>
  <div>

  </div>
  <div>
    <Top-Header titre="Les articles">
        <template #btn>
            <div>
                 <inertia-link :href="route('article.create')" class="btn d-inline-flex btn-sm btn-success mx-1">
                    <span class="pe-2">
                    <i class="far fa-plus"></i>
                    </span>
                    <span>Créer</span>
                </inertia-link>
            </div>
        </template>
    </Top-Header>
    <div class="main-content row">
      <div class="col-md-12 col-xxl-12">
        <div class="group-headings group-page-headings component-heading-page-1"
          id="component-shot" ></div>
        <div class="pb-6 ">
          <div
            class="
              group-lists group-tables
              component-table-advanced-1
              overflow-hidden
              rounded-sm
            "
            id="component-shot"
          >
            <div class="table-responsive py-3 rounded-sm min-h">
              <table
                class="
                  table table-hover table-nowrap_
                  bg-white
                  border
                  rounded-sm
                "
              >
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Article</th>
                    <th scope="col">Etat</th>
                    <th class="col text-end">Actions</th>
                  </tr>
                </thead>
                <tbody v-if=' datas.data.length > 0'>
                  <tr v-for="row in datas.data" v-bind:key="row">
                    <td data-label="Job Title">
                        <div class="w-24  float-start  me-3 h-min-14">
                        <img v-if="row.image"
                        :src="'/'+row.image.url"
                        class="img-responsive   rounded-2 "
                        :alt="row.image.alt"
                        />
                        </div>
                          <div> <inertia-link  class="font-bold text-dark" :href="route('article.show',row.id)" :title="row.title" > {{ liveSubstr(row.title,0,50) }}</inertia-link></div>
                           <ul class=" d-flex list-inline text-muted pt-2">
                               <li class="me-2"><i class="far fa-calendar-alt  me-1" aria-hidden="true"></i>Ajouté, {{ row.h_created_at }}</li>
                               <li v-if="row.categories" class="me-2"><span class="badgebg-green-600text-whitesrounded-5"> <i class="fa fa-bookmark" aria-hidden="true"></i> {{ row.categories.nom }}</span></li>
                               <li v-if="row" class="me-2"><span class="badgebg-green-600text-whitesrounded-5"> <i class="far fa-eye" aria-hidden="true"></i> {{ row.view_count }} vue{{ (row.view_count)>1?'s':''}}</span></li>
                               <li v-if="row.commentaires" class="me-2"><span class="badgebg-green-600text-whitesrounded-5"> <i class="far fa-comments" aria-hidden="true"></i> {{ row.commentaires.length }} Commentaire{{ row.commentaires.length>1?'s':'' }}</span></li>
                               <li v-if="row.tags" class="me-2"><span class="badgebg-green-600text-whitesrounded-5"> <i class="far fa-tags" aria-hidden="true"></i> {{ row.tags.length }} Mot{{ row.tags.length>1?'s':'' }} Clé{{ row.tags.length>1?'s':'' }}</span></li>
                           </ul>
                    </td>
                <td data-label="">
                    <span v-if="row.actif" class="badge bg-success rounded-5 text-white">Actif</span>
                    <span v-if="!row.actif" class="badge bg-gray-500 rounded-5  text-white">Désactivé</span>
                </td>
                    <td data-label="" nowrap class="text-end">
                    <inertia-link :href="route('article.show',row.id)" class="mx-2 text-dark"> <i class="fas fa-eye    "></i>  </inertia-link>
                          <inertia-link :href="route('article.edit',row.id)" class="mx-2 text-dark "> <i class="fas fa-edit    "></i>  </inertia-link>
                        <button
                            @click="deleteRow(row)"
                           class=" btn-inline bg-none mx-2 text-danger"
                          >
                           <i class="fas fa-trash " aria-hidden="true"></i>

                          </button>

                    </td>
                  </tr>
                </tbody>
                <tbody v-else>
                    <tr>
                        <td colspan="5" class="text-center">Aucune donnée disponible pour le montent</td>
                    </tr>
                </tbody>

              </table>
            </div>
            <div class="col-12 text-center">
            <pagination class="mt-6 float-end" :links="datas.links" />
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
  props: ["datas", "errors"],
  data() {
    return {
      titre: "Articles du Blog",
      editMode: false,
      data: null,
      isOpen: false,
      form: {
        titre: null,
        contenu: null,
      },
    };
  },
   layout:AdminLayout,
   filters: {

  	subStr: function(t) {
    	return t.substring(0,15) + '...';
    }

  },
    mounted(){
        this.initData();
    },
    methods:{
        initData(){
            this.data=this.datas.data;
        },
         deleteRow: function (data) {
      if (!confirm("Voulez-vous supprimer cet élément ?")) return;

      data._method = "DELETE";

      this.$inertia.post(route('article.destroy', data.id), data);

    },
    }
};
</script>
<style scoped>
.h-min-14 {
    min-height: 3.5rem!important
}
</style>
