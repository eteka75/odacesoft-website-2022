<template>
  <div></div>
  <div>
    <Top-Header :titre="titre">
      <template #btn>
        <div>

        </div>
      </template>
    </Top-Header>
    <div class="main-content">

      <div>
        <div class="row">
        <div class="pb-6 col-md-8 ">
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
                  table table-hover
                  table-nowrap_
                  bg-white
                  border
                  rounded-sm
                "
              >
                <thead class="thead-light">
                  <tr>
                    <th class="w-1">#</th>
                    <th class="w-1">Nom et prénom</th>
                    <th scope="col">Durée</th>
                    <th scope="col">Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody v-if=' datas.data.length > 0'>
                  <tr  @click="ShowInfo(row)" :class="(sdata && row && row.id==sdata.id)?'bg-primary text-white':''"  v-for="row in datas.data" v-bind:key="row">
                  <td  class="w-1">{{ row.id }}</td>
                  <td  class="w-1">
                    <div class="font-bold bold  " :class="(sdata && row && row.id==sdata.id)?'text-white':'text-dark'" :title='row.sexe=="M"?"Homme":"Femme"'>{{ row.nom+" "+row.prenom }} {{ (row.tel!="")? "("+row.tel+")":""}}</div>
                    <ul class="d-flex text-uppercase text-xs flex-row list-unstyled p-0 " :class="(sdata && row && row.id==sdata.id)?'text-white':'text-muted'">
                      <li class="pe-1"> {{ row.lieu }}</li>
                      <li class="pe-1"> | </li>
                      <li class="ps-1"> {{ row.domaine }}</li>
                    </ul>
                    
                    </td>
                  <td  class="w-1">{{ row.duree_stage }} mois</td>
                    
                    <td data-label="Lead Score">
                      {{
                        row.h_created_at
                      }}
                    </td>
                    <td data-label="" class="text-center">
                      <button :class="(sdata && row && row.id==sdata.id)?'text-white':'text-dark'"
                            @click="edit(row)"
                          class="btn btn-sm  p-1 mx-1 btn-soft-primary_ rounded-2xl"
                          >
                          <i class="fas fa-edit    "></i>
                          </button>

                          <button

                            @click="deleteRow(row)"
                           class="btn btn-sm  p-1 mx-1 btn-soft-danger_ text-danger"
                          >
                           <i class="fas fa-trash" aria-hidden="true"></i>
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
            <div class="col-12 text-center"></div>

            <pagination class="mt-6 float-end" :links="datas.links" />
          </div>
        </div>
        <div class="col-md-4">

        <div v-if="sdata" class="card shadow-1 mt-2">

            <div  class="card-body">
                <div class="row text-xs">
                    <h5 class="card-header h4 mb-3 px-3 py-1 border-b-1 text-center border-bottom">DEMANDE DE STAGE</h5>

                    
                    <div v-if="sdata.code"  class="col-md-4 text-mute font-bold text-md-end">CODE :</div>
                    <div v-if="sdata.code" class="col-md-8 text-danger font-bold ">{{sdata.code}}</div>
                    
                     <div  v-if="sdata.domaine" class="col-md-4 text-mute font-bold text-md-end">Domaine :</div>
                    <div  v-if="sdata.domaine" class="col-md-8">{{sdata.domaine}}</div>
                    <div v-if="sdata.nom"  class="col-md-4 text-mute font-bold text-md-end">Nom :</div>
                    <div v-if="sdata.nom" class="col-md-8  ">{{sdata.nom}}</div>
                    <div v-if="sdata.prenom"  class="col-md-4 text-mute font-bold text-md-end">Prénom :</div>
                    <div v-if="sdata.prenom"  class="col-md-8">{{sdata.prenom}}</div>
                    <div v-if="sdata.duree_stage"  class="col-md-4 text-mute font-bold text-md-end">Durée :</div>
                    <div v-if="sdata.duree_stage"  class="col-md-8">{{sdata.duree_stage}}mois</div>
                    
                    <div v-if="sdata.lieu"  class="col-md-4 text-mute font-bold text-md-end">Lieu :</div>
                    <div v-if="sdata.lieu" class="col-md-8">{{sdata.lieu}}</div>

                    <div class="col-md-4 text-mute font-bold text-md-end">Sexe :</div>
                    <div class="col-md-8">{{sdata.sexe=="M"?'Masculin':'Féminin'}}</div>
                     <div class="col-md-4 text-mute font-bold text-md-end">Email :</div>
                    <div class="col-md-8">{{sdata.email}}</div>
                    
                     <div  v-if="sdata.tel" class="col-md-4 text-mute font-bold text-md-end">Tél :</div>
                    <div  v-if="sdata.tel" class="col-md-8">{{sdata.tel}}</div>

                    <div v-if="sdata.cv" class="col-md-4 text-mute font-bold text-md-end">CV :</div>
                    <div v-if="sdata.cv" class="col-md-8"><a :href="'/'+sdata.cv" target="_blanck">Télécharger le CV</a></div>
                    

                    <div v-if="sdata.lettre_motivation" class="col-md-4 text-mute font-bold text-md-end">CV :</div>
                    <div v-if="sdata.lettre_motivation" class="col-md-8"><a :href="'/'+sdata.lettre_motivation" target="_blanck">Télécharger lettre de motivation</a></div>
                    
                    <div v-if="sdata.references_stage" class="col-md-4 text-mute font-bold text-md-end">Deux références :</div>
                    <div v-if="sdata.references_stage" class="col-md-8"><span v-html="sdata.references_stage"></span></div>

                    <div v-if="sdata.raisons_stage" class="col-md-4 text-mute font-bold text-md-end">Raisons du choix :</div>
                    <div v-if="sdata.raisons_stage" class="col-md-8"> <span v-html="sdata.raisons_stage"></span></div>

                    <div v-if="sdata.competences_stage" class="col-md-4 text-mute font-bold text-md-end">Compétences :</div>
                    <div v-if="sdata.competences_stage" class="col-md-8"> <span v-html="sdata.competences_stage"></span></div>
                    <div v-if="sdata.etat!=null" class="col-md-4 text-mute font-bold text-md-end">Etat :</div>
                    <div v-if="sdata.etat!=null" class="col-md-8">
                    <span class=" text-success py-2 font-bold" v-if="sdata.actif">Activé</span>
                    <span class="text-danger font-bold" v-if="!sdata.actif">Désactivé</span>
                    </div>
                     <div v-if="sdata.user"  class="col-md-4 text-mute font-bold text-md-end">Auteur :</div>
                    <div v-if="sdata.user" class="col-md-8"><i class="fas fa-calendar" aria-hidden="true"></i> {{sdata.user.name}}</div>
                    <div class="col-md-4 text-mute font-bold text-md-end">Date d'envoie :</div>
                    <div class="col-md-8"><i class="fas fa-calendar" aria-hidden="true"></i> {{sdata.h_created_at}}</div>
                    <div v-if="sdata.h_created_at!=sdata.h_updated_at" class="col-md-4 text-mute font-bold text-md-end"> Dernière modification :</div>
                    <div v-if="sdata.h_created_at!=sdata.h_updated_at"  class="col-md-8"> <i class="fas fa-calendar-check" aria-hidden="true"></i> {{sdata.h_updated_at}}</div>
                     <div  v-if="sdata.fichier" class="col-md-4 text-mute font-bold text-md-end  mt-1">Fichier</div>
                    <div  v-if="sdata.fichier" class="col-md-8"><a :href="'/'+sdata.fichier" class="btn btn-sm py-1 px-2 btn-primary mb-1 mt-1" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Télécharger </a></div>
                    
                </div>
            </div>
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
      titre: "Demandes de stages",
      nb: 0,
      sdata:null,
      //data:this.datas.data[this.index],
      editMode: false,
      data: null,
      Close: true,
      isOpen: false,
      dialog: {
        title: "Nouvelle article",
        contenu: "null",
      },
      form: {
        id: null,
        titre: null,
        couleur: 'bg-primarys',
        contenu: null,
        fermer: true,
      },
    };
  },
  layout: AdminLayout,

  mounted() {
    this.initData();
    this.sdata=this.datas.data.length?this.datas.data[0]:null;
    console.log(this.sdata)
    //console.log(this.datas.data[O])
  },
  watch: {

},
  methods: {
    CloseAction() {
        return 1;
    },
    ShowInfo(data) {
        this.sdata=data;
    },
    initData() {
      this.data = this.datas.data;
      this.closeModal();
      if(this.$page.props.Fermer && this.$page.props.Fermer==true){
          this.closeModal();
      }
    },
    ShowDialog: function (action, title) {
      var options = {};
      if (title != "") {
        this.dialog.title = title;
      }
     /*  var myModal = new bootstrap.Modal(
        document.getElementById("CreateModal"),
        options
      );
      var myModal = document.getElementById('CreateModal')
    var myInput = document.getElementById('nom')

    myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
    })
    */
    },
    openModal: function (a="",t="") {
      this.isOpen = true;
    },
    closeModal: function () {
      this.isOpen = false;
      this.reset();
      this.editMode = false;
    },
    reset: function () {
      this.form = {
        titre: null,
        contenu: null,
      };
    },
    resetData: function () {
      this.reset();
      if(this.Close)
      this.closeModal();
    },

    save: function (data) {
        this.form.close=this.Close;
      //this.$inertia.post(route('tags.store'), data);
      this.$inertia.post(route('tags.store'),data, {
        preserveScroll: false,
            resetOnSuccess: true,
        onSuccess: () => this.resetData(),
        })

      this.editMode = false;
    },
    edit: function (data) {
      //this.form = Object.assign({}, data);
        this.form.id =data.id;
        this.form.titre =data.nom;
        this.form.couleur =data.couleur;
        this.form.contenu =data.description;
        this.editMode = true;

      this.openModal();
    },

    update: function (data) {
    data._method = "PUT";
    var url=route('tags.update', data.id);
    this.$inertia.post(url,data, {
    preserveScroll: false,
        resetOnSuccess: true,
    onSuccess: () => this.resetData(),
    })
    },
    deleteRow: function (data) {
      if (!confirm("Are you sure want to remove?")) return;

      data._method = "DELETE";

      this.$inertia.post(route('tags.destroy', data.id), data);
      this.reset();
      this.closeModal();
    },
  },
};
</script>
