<template>
  <div>

  </div>
  <div>
    <Top-Header titre="Activités">
        <template #btn>
            <div>
                 <inertia-link :href="route('evenement.create')" class="btn d-inline-flex btn-sm btn-success mx-1">
                    <span class="pe-2">
                    <i class="far fa-plus"></i>
                    </span>
                    <span>Créer</span>
                </inertia-link>
            </div>
        </template>
    </Top-Header>
    <div class="main-content row">
      <div class="col-md-10 col-xl-9  col-xxl-8">
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
                    <th scope="col">Evènement</th>
                    <th class="col-md-1 text-center">Début</th>
                    <th class="col-md-1 text-center">Fin</th>
                    <th class="col-md-1 text-center">Etat</th>
                    <th class="col-1 text-end">Actions</th>
                  </tr>
                </thead>
                <tbody v-if=' datas.data.length > 0'>
                  <tr  v-for="row in datas.data" v-bind:key="row">
                    <td data-label="Job Title">
                        <div class="w-24  float-start  me-3 h-min-14">
                        <img v-if="row.img"
                        :src="'/'+row.img"
                        class="img-responsive   rounded-2 "
                        :alt="row.img"
                        />
                        </div>
                          <div><i v-if="row.top>0" class="fas fa-star text-warning" aria-hidden="true"></i> <inertia-link  class="font-bold text-dark" :href="route('evenement.show',row.id)" :title="row.lead"  > {{ liveSubstr(row.title,0,80)}}</inertia-link></div>
                          <div v-if="row.lead" class="text-xs text-muted">{{liveSubstr(row.lead,0,1000)}}</div>
                           <ul class="d-flex justify-content-start list-inline text-muted pt-2">
                               <li class="me-2" v-if="row.h_created_at"><i class="far fa-calendar-alt  me-1" aria-hidden="true"></i>Ajouté, {{ row.h_created_at }}</li>
                               <li class="me-2" title="Lieu de l'évènement"  v-if="row.lieu"> <i class="fas fa-map-marker" aria-hidden="true"></i> {{ row.lieu }}</li>
                               <li class="me-2" title="Participants"  v-if="row.nb_participants"><i class="fas fa-users"></i> {{ row.nb_participants }} participant{{ row.nb_participants>1?'s':'' }}</li>
                               <li class="me-2" title="Priorité"  v-if="row.priorite"><span class="badgebg-dangertext-white py-0 px-1"><i class="fa fa-heartbeat" aria-hidden="true"></i> {{ row.priorite }}</span> </li>
                           </ul>
                    </td>
                    <td class="col-md-1 text-center">
                       {{ row.h_date_debut }}

                    </td>
                    <td data-label="">
                      {{ row.h_date_fin }}
                    </td>
                    <td class="col-md-1 text-center">
                      <span v-if="row.actif" class="badge bg-success rounded-5 text-white"  :class="(sdata && row && row.id==sdata.id)?'bg-white text-dark':''" >Actif</span>
                      <span v-if="!row.actif" class="badge bg-gray-500 rounded-5  text-white">Désactivé</span>
                    </td>
                    <td class="col-md-1 text-center text-end">
                         <inertia-link :href="route('evenement.show',row.id)" class="mx-1 " :class="(sdata && row && row.id==sdata.id)?'text-white':'text-dark'"> <i class="fas fa-eye    "></i>  </inertia-link>
                         <inertia-link :href="route('evenement.edit',row.id)" class="mx-1 " :class="(sdata && row && row.id==sdata.id)?'text-white':'text-dark'"> <i class="fas fa-edit    "></i>  </inertia-link>

                      <button
                            @click="deleteRow(row)"
                           class=" text-danger bg-none mx-1"
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
      titre: "Activités",
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
            if(this.datas.data)
            this.data=this.datas.data;
        },
         deleteRow: function (data) {
      if (!confirm("Voulez-vous supprimer cet élément ?")) return;
      data._method = "DELETE";

      this.$inertia.post(route('evenement.destroy', data.id), data);

    },
    }
};
</script>
<style scoped>
.h-min-14 {
    min-height: 3.5rem!important
}
</style>
