<template>
  <div></div>
  <div>
    <Top-Header :titre="titre">
      <template #btn>
        <div>
          <button
            class="btn btn-success btn-sm"

            @click="openModal('add', 'Nouvelle catégorie')"
          >
            <span class="pe-2">
              <i class="far fa-plus"></i>
            </span>
            <span>Créer</span>
          </button>
        </div>
      </template>
    </Top-Header>
    <div class="main-content">

      <div>
      <div class="" v-show="isOpen">
      <div class="col-md-8 max bg-white card ">
         <div class="card-body">
                          <div class="modal-header">
                            <h5 class="modal-title" id="CreateModalLabel">
                              {{ dialog.title }}
                            </h5>
                            <button   @click="closeModal()"
                              type="button"
                              class="btn-close"
                              data-bs-dismiss="modal"
                              aria-label="Close"
                            ></button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group d-flex gx-2 mb-4">
                            <div class="col me-3">
                              <div class="form-floating">
                                <input required
                                  type="text"
                                  id="categ"
                                  class="form-control form-control-sm"
                                   :class="[$page.props.errors.titre ? 'is-invalid':'']"
                                  placeholder="Le nom de la catégorie"
                                  v-model="form.titre"
                                />

                                <label for="categ"
                                  >Nom du mot clé (*)</label
                                >
                              </div>
                              <div
                                    v-if="$page.props.errors.titre"
                                    class="text-danger py-1 text-xs"
                                  >
                                    {{ $page.props.errors.titre }}
                                </div>
                            </div>
                            </div>
                            <div class="form-floating">
                            <textarea class="form-control" :class="[$page.props.errors.contenu ?'is-invalid_':'']" rows="12" v-model="form.contenu"></textarea>

                            <label for="floatingSelectGrid">Description</label>
                            </div>
                          </div>
                           <div
                                    v-if="$page.props.errors.contenu"
                                    class="text-danger py-1 text-xs"
                                  >
                                    {{ $page.props.errors.contenu }}
                                </div>

                          <div class="modal-footer d-flew">
                           <div class="form-check col form-switch">
                  <input
                     name="close"
                    class="form-check-input "

                    v-model="Close"
                    type="checkbox"
                    id="flexSwitchCheckDefault"
                  />

                  <label class="form-check-label text-xs" for="flexSwitchCheckDefault"
                    >Fermer après l'ajout</label
                  >
                </div>
                            <button
                              type="button"
                              class="btn btn-light"
                              data-bs-dismiss="modal"
                               @click="closeModal()"
                               id="closeModal"
                            >
                              Fermer
                            </button>
                             <button
                                  wire:click.prevent="store()"
                                  type="button"
                                  class="
                                    btn btn-primary
                                  "
                                  v-show="!editMode"
                                  @click="save(form)"
                                >
                                 <i class="fas fa-save"></i>
                                  Sauvegarder
                                </button>


                                <button
                                  wire:click.prevent="store()"
                                  type="button"
                                  class="
                                   btn btn-success
                                  "
                                  v-show="editMode"
                                  @click="update(form)"
                                >
                                <i class="fas fa-edit "></i>
                                  Mettre à jour
                                </button>
                          </div>
                        </div>
      </div>
      </div>


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
                    <th  class="W-4">#</th>
                    <th scope="col">Nom </th>
                    <th scope="col"> Object</th>
                    <th scope="col">Date de pubication</th>
                    <th class="text-end">Actions</th>
                  </tr>
                </thead>
                <tbody v-if='datas.data && datas.data.length > 0'>
                  <tr @click="ShowInfo(row)"  class="text-xs"  v-for="row in datas.data" v-bind:key="row"  >
                  <td>{{ row.id }}</td>
                    <td >

                      <div >{{ row.nom }}</div>
                      <small>{{ row.email }}</small>


                    </td>
                    <td data-label="Phone">
                      <span v-if="row.objet"
                        >{{ row.objet }}</span>

                    </td>
                    <td data-label="Lead Score">
                      {{
                        row.h_created_at
                      }}
                    </td>
                    <td data-label="" class="text-end">
                      <!--button title="Modifier"
                            @click="edit(row)"
                          class=" p-2 mx-1 border rounded-2"
                          >
                          <i class="fas fa-edit    "></i>
                          </button-->
                          <button title="Supprimer"
                          
                            @click="deleteRow(row)"
                           class=" p-2 mx-1 text-danger rounded-2 border-danger border"
                          >
                           <i class="fas fa-trash fa-edit" aria-hidden="true"></i>
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
                    <h5 class="card-header h4 mb-3 px-3 py-1">Message envoyé</h5>

                    <div class="col-md-4 text-mute font-bold text-end">Code :</div>
                    <div class="col-md-8">{{sdata.code}}</div>
                    <div class="col-md-4 text-mute font-bold text-end">Nom :</div>
                    <div class="col-md-8">{{sdata.nom}}</div>
                     <div class="col-md-4 text-mute font-bold text-end">Email :</div>
                    <div class="col-md-8">{{sdata.email}}</div>
                    
                    <div class="col-md-4 text-mute font-bold text-end">Tél :</div>
                    <div class="col-md-8">{{sdata.tel}}</div>
                    
                    <div class="col-md-4 text-mute font-bold text-end">Rester informé ? :</div>
                    <div class="col-md-8">{{sdata.abonne?'Oui':'Non'}}</div>

                    <div class="col-md-4 text-mute font-bold text-end">Création :</div>
                    <div class="col-md-8"><i class="fas fa-calendar" aria-hidden="true"></i> {{sdata.h_created_at}}</div>
                     <div v-if="sdata.user"  class="col-md-4 text-mute font-bold text-end">Auteur :</div>
                    <div v-if="sdata.user" class="col-md-8"><i class="fas fa-calendar" aria-hidden="true"></i> {{sdata.user.name}}</div>
                    <div v-if="sdata.h_created_at!=sdata.h_updated_at" class="col-md-4 text-mute font-bold text-end"> Dernière modification :</div>
                    <div v-if="sdata.h_created_at!=sdata.h_updated_at"  class="col-md-8"> <i class="fas fa-calendar-check" aria-hidden="true"></i> {{sdata.h_updated_at}}</div>

                     <div class="col-md-4 text-mute font-bold text-end">Message :</div>
                    <div class="col-md-8 text-xs">{{sdata.message}}</div>
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
      titre: "Ressources",
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
