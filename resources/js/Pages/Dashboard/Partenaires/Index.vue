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
    <div class="main-content min-h">
    <div class='col-md-12'>
                <ValidationErrors/>
            </div>
      <div>
        <div class="row" v-show="isOpen">
          <div class="col-lg-7 col-xl-8">
            <div class="max bg-white card mb-5">
              <div class="card-body">
                <div class="modal-header border-0">
                  <h5 class="modal-title text-uppercase" id="CreateModalLabel">
                    {{ dialog.title }}
                  </h5>

                  <button
                    @click="closeModal()"
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="modal-body">
                  <div class="form-group d-flex gx-2 mb-4">
                    <div class="col ">
                      <div class="form-floating">
                        <input
                          required
                          type="text"
                          id="categ"
                          class="form-control form-control-sm"
                          :class="[
                            $page.props.errors.nom ? 'is-invalid' : '',
                          ]"
                          placeholder="Le nom du partenaire"
                          v-model="form.nom"
                        />

                        <label for="categ">Nom du partenaire (*)</label>
                      </div>
                      <div
                        v-if="$page.props.errors.nom"
                        class="text-danger py-1 text-xs"
                      >
                        {{ $page.props.errors.nom }}
                      </div>
                    </div>
                  </div>
                  <div class="form-group mb-3">
                      <div class="form-floating">
                        <textarea rows="5"
                          required
                          type="text"
                          id="part"
                          class="form-control form-control-sm"
                          :class="[
                            $page.props.errors.resume ? 'is-invalid' : '',
                          ]"
                          v-model="form.resume"
                        ></textarea>

                        <label for="part">Description du partenaire (*)</label>
                      </div>
                      <div
                        v-if="$page.props.errors.resume"
                        class="text-danger py-1 text-xs"
                      >
                        {{ $page.props.errors.resume }}
                      </div>
                    </div>

                  <textarea
                    class="form-control"
                    id="summernote"
                    :class="[$page.props.errors.contenu ? 'is-invalid_' : '']"
                    rows="12"
                    v-model="form.contenu"
                  ></textarea>
                </div>
                <div
                  v-if="$page.props.errors.contenu"
                  class="text-danger py-1 text-xs"
                >
                  {{ $page.props.errors.contenu }}
                </div>

              </div>
            </div>
          </div>
          <div class="col-lg-5 col-xl-4">
            <div class="card rounded-2 mb-4 shadow-1">
              <div class="card-body p-4">
                <div class="mb-1 d-flex py-3">
                <div class="form-check col mt-3 form-switch">
                        <input
                        name="close"
                        class="form-check-input"
                        v-model="form.fermer"
                        type="checkbox"
                        id="fermer"
                        />

                        <label
                        class="form-check-label text-xs"
                        for="fermer"
                        >Fermer après l'ajout</label
                        >
                    </div>
                </div>
                <div class="mb-3 d-flex py-3">

                    <button
                        type="button"
                        class="btn btn-light mx-2"
                        data-bs-dismiss="modal"
                        @click="closeModal()"
                        id="closeModal"
                    >
                        Fermer
                    </button>
                    <button
                        type="button"
                        class="btn btn-primary"
                        v-show="!editMode"
                        @click="save(form)"
                        :disabled="form.processing || form.nom==null"
                    >
                        <i class="fas fa-save"></i>
                        Sauvegarder
                    </button>

                    <button

                        type="button"
                        class="btn btn-success"
                        v-show="editMode"
                        @click="update(form)"
                    >
                        <i class="fas fa-edit"></i>
                        Mettre à jour
                    </button>
                </div>
              </div>
            </div>

            <div class="card rounded-2 mb-4 shadow-1">
              <div class="card-body p-4">
                <label for="formFileSm" class="form-label">Site Web</label>
                <div class="">
                  <input type="text"  :class="[ $page.props.errors.url ? 'is-invalid' : '',  ]" v-model="form.url" class="form-control text-xs forn-control-sm" placeholder="https://example.com">
                </div>
                <div
                        v-if="$page.props.errors.url"
                        class="text-danger py-1 text-xs"
                      >
                        {{ $page.props.errors.url }}
                      </div>
              </div>
            </div>
            <div class="card rounded-2 mb-4 shadow-1">
              <div class="card-body p-4">
                <label for="formFileSm" class="form-label">Publication</label>
                <div class="">
                  <div class="form-check form-switch mb-3">
                    <input
                      value="1"
                      class="form-check-input"
                      v-model="form.active"
                      type="checkbox"
                      id="flexSwitchCheckDefault"
                    />
                    <label class="form-check-label" for="flexSwitchCheckDefault"
                      >Activer
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="card rounded-2 mb-4 shadow-1">
              <div class="card-body p-4">
                <div class="mb-3">
                   <label for="formFileSm" class="form-label"
                    >Ajouter le logo du partenaire </label
                  >
                  <div class="mb-2 text-xs text-muted"><b>Format autorisés:</b> jpeg,png,jpg,webp</div>

                  <input id="fichier"
                    class="form-control form-control-sm hidden"
                    ref="fileInput"
                    type="file"
                    @input="pickFile"
                  />
                </div>
                <div
                        v-if="$page.props.errors.image"
                        class="text-danger py-1 text-xs"
                      >
                        {{ $page.props.errors.image }}
                      </div>
                <div>
                  <div
                    v-if="previewImage != null"
                    class="
                      imagePreviewWrapper
                      my-5
                      rounded-2
                      border-1
                      shadow-sm
                      bg-gray-100
                      border
                    "
                    :style="{ 'background-image': `url(${previewImage})` }"
                    @click="selectImage"
                  ></div>

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="pb-6 col-md-8">
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
                      <th class="W-4">#</th>
                      <th scope="col">Partenaire</th>
                      <th scope="col">Etat</th>
                      <th scope="col">Date de pubication</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody v-if="datas.data.length > 0">
                    <tr  @click="ShowInfo(row)" v-for="row in datas.data"   :class="(sdata && row && row.id==sdata.id)?'bg-primary text-white':''"  v-bind:key="row">
                      <td>
                        <img  @click="ShowInfo(row)" v-if="row.url_logo"
                        :src="'/'+row.url_logo"
                        class="img-responsive w-14  rounded-2 "
                        :alt="row.nom"
                        />
                      </td>
                      <td data-label="Job Title">
                        <div
                          class=" d-block px-0"
                          @click="ShowInfo(row)"
                        >{{ row.nom }}
                        </div>
                      </td>
                      <td >
                        <span v-if="row.actif" class="badge bg-success rounded-5 text-white">Actif</span>
                        <span v-if="!row.actif" class="badge  rounded-5  text-white"  :class="(sdata && row && row.id==sdata.id)?'bg-white text-dark':''" >Désactivé</span>
                      </td>
                      <td data-label="Lead Score" class="text-xs">
                        {{ row.h_created_at }}
                      </td>
                      <td data-label="" class="text-center">
                              <button @click="edit(row)" class="d-inline bg-none mx-1" :class="(sdata && row && row.id==sdata.id)?' text-white':'text-dark'"> 
                                <i class="fas fa-edit"></i>
                              </button>

                              <button

                                @click="deleteRow(row)"
                                class="d-inline bg-none text-danger"
                              >
                                <i class="fas fa-trash" aria-hidden="true"></i>
                              </button>
                      </td>
                    </tr>
                  </tbody>
                  <tbody v-else>
                    <tr>
                      <td colspan="5" class="text-center">
                        Aucune donnée disponible pour le montent
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-12 text-center"></div>

              <pagination class="mt-6 float-end" :links="datas.links" />
            </div>
          </div>
          <div class="col-md-4">
            <div v-if="sdata" class="card shadow-1 mt-3">
              <div class="card-body">
                <div class="row text-xs">

                  <h5 class="card-header border-0 h4 mb-3 px-3 py-1 text-uppercase">{{ sdata.nom }}</h5>
                  <div class="col-md-4 text-mute font-bold text-end">

                  </div>
                  <div class="col-md-8">
                    <img v-if="sdata.url_logo" class="img-responsive rounded-3 border-1 shadow-sm w-24 mb-3" :src="'/'+sdata.url_logo" :alt="sdata.url_logo">

                  </div>
                  <div class="col-md-4 text-mute font-bold text-end">
                    Nom :
                  </div>
                  <div class="col-md-8">{{ sdata.nom }}</div>
                  <div v-if="sdata.url" class="col-md-4 text-mute font-bold text-end">
                    Site web :
                  </div>
                  <div v-if="sdata.url" class="col-md-8">
                  <a  target="_blanck" :href="sdata.url">{{ sdata.url }}</a>
                  </div>
                  <div class="col-md-4 text-mute font-bold text-end">
                    Resume :
                  </div>
                  <div class="col-md-8">{{ sdata.resume }}</div>

                  <div class="col-md-4 text-mute font-bold text-end">
                    Création :
                  </div>
                  <div class="col-md-8">
                    <i class="fas fa-calendar" aria-hidden="true"></i>
                    {{ sdata.h_created_at }}
                  </div>
                  <div class="col-md-4 text-mute font-bold text-end">
                    Etat :
                  </div>
                  <div class="col-md-8">
                    <span class=" text-success font-bold" v-if="sdata.actif">Actif</span>
                    <span class="text-danger font-bold" v-if="!sdata.actif">Désactivé</span>
                  </div>
                  <div
                    v-if="sdata.user"
                    class="col-md-4 text-mute font-bold text-end"
                  >
                    Auteur :
                  </div>
                  <div v-if="sdata.user" class="col-md-8">
                    <i class="fas fa-calendar" aria-hidden="true"></i>
                    {{ sdata.user.name }}
                  </div>
                  <div
                    v-if="sdata.h_created_at != sdata.h_updated_at"
                    class="col-md-4 text-mute font-bold text-end"
                  >
                    Dernière modification :
                  </div>
                  <div
                    v-if="sdata.h_created_at != sdata.h_updated_at"
                    class="col-md-8"
                  >
                    <i class="fas fa-calendar-check" aria-hidden="true"></i>
                    {{ sdata.h_updated_at }}
                  </div>

                  <div class="col-md-4 text-mute font-bold ">
                    Description :
                  </div>
                  <div class="col-md-12 text-xs pb-5" style="max-height:460px; overflow:auto" v-html="sdata.description">

                  </div>
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
import Summernote from "/storage/vendor/summernote/summernote.min.js";
import "/storage/vendor/summernote/summernote.min.css";

import ValidationErrors from "@/Jetstream/ValidationErrors";

export default {
    metaInfo: { title: 'Contacts' },
  components: {
    AdminLayout,
    AdminSidebar,
    TopHeader,
    Pagination,
    ValidationErrors
  },
  props: ["datas",'close'],
  data() {
    return {
      titre: "Partenaires",
      nb: 0,
      sdata: null,
      previewImage: null,
      //data:this.datas.data[this.index],
      editMode: false,
      data: null,
      Close: true,
      isOpen: false,
      dialog: {
          title: "Nouveau partenaire",
        contenu: "null",
      },
      form:this.$inertia.form({
          id: null,
        nom: null,
        resume: true,
        url: null,
        fichier: null,
        image: null,
        resume: null,
        contenu: null,
        active: true,
        fermer:true,
      }),
    };
  },
  layout: AdminLayout,

  mounted() {
    this.AddPlugin();
    this.initDatas();
    this.sdata=this.datas.data.length?this.datas.data[0]:null;
     // this.isOpen=this.form.fermer;
    //this.initDatas();
    //console.log(this.form.fermer)
    //console.log(this.datas.data[O])
  },
  watch: {},
  methods: {
    CloseAction() {
      return 1;
    },
    AddPlugin() {
      // $('.ckeditor').ckeditor();
      $("#summernote").summernote({
        placeholder: "Rédiger votre article ici ...",
        tabsize: 2,
        height: 300,
        //fontNames: ['Inter', 'Montserrat',  'Arial', 'Comic Sans MS', 'Courier New', 'Merriweather'],
        toolbar: [
          // ["Entete", [list of button]]

          [
            "style",
            ["style", "bold", "italic", "underline", "strikethrough", "clear"],
          ],
          //['font', ['strikethrough', 'superscript', 'subscript']],
          // ['font', ['strikethrough']],
          // ['fontsize', ['fontsize']], fontname
          //['link', []],
          ["para", ["link", "ul", "ol", "paragraph"]],
          ["table", ["table"]],
          ["insert", ["picture", "video"]],
          ["view", ["fullscreen", "codeview", "undo", "redo"]],
          // ['height', ['height']]
        ],
      });
    },
    ShowInfo(data) {
      this.sdata = data;
    },
    initDatas() {
        if(this.datas !=undefined && this.datas.length > 0) {
            this.sdata = datas.data[0];
            console.log(this.sdata);
        }
        if(this.$page.props.close!=undefined ) {
            this.isOpen=!this.$page.props.close;
           alert(!this.isOpen);
        }
    },
    ShowDialog: function (action, title) {
      var options = {};
      if (title != "") {
        this.dialog.title = title;
      }
    },
    openModal: function () {
      this.isOpen = true;
    },
    closeModal: function () {
      this.isOpen = false;
      this.reset();
      this.editMode = false;
    },
    reset: function () {
      this.form = {
         id: null,
        nom: null,
        active: true,
        image: null,
        resume: null,
        contenu: null,
        fermer:true,
      };
      this.previewImage=null;
       $('#summernote').summernote('code',null);
       $('#fichier').val(null);
    },
    resetData: function () {
        this.isOpen=!this.form.fermer;
        this.reset();
    },
    ClickEditor:function() {
      var el = document.getElementById("editor") || null;
      if ($('#summernote').summernote('isEmpty')) {
            alert("Le contenu de l'article est vite");
            return 0;
        }
      var smtHtml=$('#summernote').summernote('code');
      if (smtHtml.length) {
          this.form.contenu=smtHtml;
          return 1;
      }
    return 0;
    },

    save: function (data) {
      this.form.close = this.Close;
      //this.$inertia.post(route('tags.store'), data);
       if (this.ClickEditor() ) {
        this.$inertia.post(route("partenaire.store"), data, {
            preserveScroll: false,
            resetOnSuccess: true,
            onSuccess: () => this.resetData(),
            onError: () =>this.isOpen=true,
        });
      this.editMode = false;
      }
    },
    edit: function (data) {
      this.form = Object.assign({}, data);
      $('#summernote').summernote('code',data.description);

      this.form.fermer = true;
      this.editMode = true;
      this.form.active = data.actif=='1'?true:false;
      this.previewImage = data.url_logo;
      this.form.image = data.url_logo;
      //alert(this.form.active)
      /*this.form.id = data.id;
      this.form.couleur = data.couleur;
      this.form.contenu = data.description;
      */

      this.openModal();
    },

    update: function (data) {
      data._method = "PUT";
      var url = route("partenaire.update", data.id);
      if (this.ClickEditor() ) {
        this.$inertia.post(url, data, {
            preserveScroll: false,
            resetOnSuccess: true,
            onSuccess: () => this.resetData(),
        });
      }
    },
    deleteRow: function (data) {
      if (!confirm("Voulez-vous supprimer cet élément ?")) return;

      data._method = "DELETE";
      this.$inertia.post(route("partenaire.destroy", data.id), data);
      this.reset();
      this.closeModal();
    },
    selectImage() {
      this.$refs.fileInput.click();
    },
    onFileChange(e) {
      let file =  e.target.files || e.dataTransfer.files;
      if (file && file[0]) {
    this.form.fichier = file[0];
      }
    },
    pickFile(e) {
      let input = this.$refs.fileInput;
      let file = input.files;
      if (file && file[0]) {
        let reader = new FileReader();
        reader.onload = (e) => {
          this.previewImage = e.target.result;
          this.form.image = file[0];
        };
        reader.readAsDataURL(file[0]);
        this.$emit("input", file[0]);
      }
    },
  },
};
</script>

<style>
.imagePreviewWrapper {
  width: 250px;
  height: 250px;
  display: block;
  cursor: pointer;
  margin: 0 auto 0px;
  border: 2px dashed #ccc;
  background-size: cover;
  background-position: center center;
}
.note-editor.note-airframe .note-statusbar .note-resizebar, .note-editor.note-frame .note-statusbar .note-resizebar,
.note-editor.note-airframe, .note-editor.note-frame,.note-editor .note-toolbar, .note-popover .popover-content {

    background: #FFF;
    border-bottom: 1px solid #e7eaf0;
}
.note-editor.note-airframe, .note-editor.note-frame{
    border-radius:3px;

    border: 1px solid #e7eaf0;
}
</style>

