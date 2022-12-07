<template>
  <div></div>
  <div>
    <Top-Header :titre="titre">
      <template #btn>
        <div>
          <inertia-link :href="route('page.create')" class="btn btn-sm btn-success">
            <span class="pe-2">
              <i class="far fa-plus"></i>
            </span>
            <span>Créer</span>
          </inertia-link>
        </div>
      </template>
    </Top-Header>
    <div class="main-content">
    <div class="row">

      <div class="col-md-10 col-xxl-9">
        <div class="row">
        <div class="pb-6 col-md-12 col-xxl-12">
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
                  table-wrap
                  bg-white
                  border
                  rounded-sm
                "
              >
                <thead class="thead-light">
                  <tr>
                    <th  class="W-4">#</th>
                    <th scope="col">Page</th>
                    <th scope="col">Etat</th>
                    <th scope="col">Date de pubication</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody v-if=' datas.data.length > 0'>
                  <tr v-for="row in datas.data" v-bind:key="row">
                  <td>{{ row.id }}</td>
                    <td data-label="Job Title">

                      <inertia-link class="text-dark " :href="route('page.show',row.id)">{{ row.title }}</inertia-link>


                    </td>
                    <td data-label="Phone">
                   <span v-if="row.actif" class="badge bg-success rounded-5 text-white">Actif</span>
                        <span v-if="!row.actif" class="badge bg-gray-500 rounded-5  text-white">Désactivé</span>

                    </td>
                    <td data-label="Lead Score">
                      {{
                        row.h_created_at
                      }}
                    </td>
                    <td data-label="" class="text-center">
                           
                          <inertia-link :href="route('page.edit',row.id)"
                          class="d-inline text-dark bg-none"
                          >
                          <i class="fas fa-edit "></i>
                            
                          </inertia-link>
                           <button @click="deleteRow(row)"   class="d-inline bg-none mx-1 text-danger">
                            <i class="fas fa-trash"></i> 
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
      titre: "Gestion du contenu des pages",
      nb: 0,
      sdata:null,
      //data:this.datas.data[this.index],
      editMode: false,
      data: null,
      Close: true,
      isOpen: false,
      dialog: {
        title: "Nouvelle page",
        contenu: "null",
      },
      form: {
        id: null,
        titre: null,
        resume: null,
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
      if (!confirm("Voulez-vous supprimer cet élément ?")) return;

      data._method = "DELETE";

      this.$inertia.post(route('page.destroy', data.id), data);
      this.reset();
      this.closeModal();
    },
  },
};
</script>
