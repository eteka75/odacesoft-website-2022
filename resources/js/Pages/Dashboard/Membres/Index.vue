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
    <div class='col-md-12'>
        <ValidationErrors />
      </div>
      <div>
        <div class="row" v-show="isOpen">
          <div class="col-md-8 col-xl-8">
            <div class="max bg-white card">
              <div class="card-body">
                <div class="modal-header border-0 py-0">
                  <h5 class="modal-title py-0 border-0 text-uppercase" id="CreateModalLabel">
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
                    <div class="col me-3">
                      <div class="form-floating">
                        <input
                          required
                          type="text"
                          id="nom"
                          class="form-control form-control-sm"
                          :class="[
                            $page.props.errors.nom ? 'is-invalid' : '',
                          ]"
                          placeholder="Le nom de la ressource"
                          v-model="form.nom"
                        />

                        <label for="nom">Nom (*)</label>
                      </div>
                      <div
                        v-if="$page.props.errors.nom"
                        class="text-danger py-1 text-xs"
                      >
                        {{ $page.props.errors.nom }}
                      </div>
                    </div>
                    <div class="col ">
                      <div class="form-floating">
                        <input
                          required
                          type="text"
                          id="nom"
                          class="form-control form-control-sm"
                          :class="[
                            $page.props.errors.prenom ? 'is-invalid' : '',
                          ]"
                          placeholder="Le nom de la ressource"
                          v-model="form.prenom"
                        />

                        <label for="nom">Prénoms (*)</label>
                      </div>
                      <div
                        v-if="$page.props.errors.prenom"
                        class="text-danger py-1 text-xs"
                      >
                        {{ $page.props.errors.prenom }}
                      </div>
                    </div>
                  </div>
                  <div class="form-group mb-3">
                      <div class="form-floating">
                        <input
                          required
                          type="text"
                          id="nom"
                          class="form-control form-control-sm"
                          :class="[
                            $page.props.errors.nom ? 'is-invalid' : '',
                          ]"
                          placeholder="Le nom de la ressource"
                          v-model="form.poste"
                        />

                        <label for="nom">Poste (*)</label>
                      </div>
                      <div
                        v-if="$page.props.errors.poste"
                        class="text-danger py-1 text-xs"
                      >
                        {{ $page.props.errors.poste }}
                      </div>
                    </div>

                  <div class="form-group mb-3">
                      <div class="form-floating">
                        <textarea rows="5"
                          required
                          type="text"
                          id="categ"
                          class="form-control form-control-sm"
                          :class="[
                            $page.props.errors.resume ? 'is-invalid' : '',
                          ]"
                          v-model="form.resume"
                        ></textarea>

                        <label for="categ">Bref détail sur le membre (*)</label>
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
          <div class="col-lg-4 col-xl-4">
            <div class="card rounded-2 mb-4 shadow-1">
              <div class="card-body p-4">
                <div class="mb-3 d-flex ">
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
                        :disabled="form.processing"
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
                    <div class="mb-3">
                     <label for="formFileSm" class="form-label"
                    >Informations</label
                  >
                  <div class="form-group d-flex gx-2 mb-4">
                    <div class="col me-3">
                      <div class="form-floating">
                        <input
                          required
                          type="text"
                          id="nom"
                          class="form-control form-control-sm text-xs"
                          :class="[
                            $page.props.errors.lieunaissance ? 'is-invalid' : '',
                          ]"
                          placeholder="Le nom de la ressource"
                          v-model="form.lieunaissance"
                        />

                        <label for="nom">Lieu de naissance</label>
                      </div>
                      <div
                        v-if="$page.props.errors.lieunaissance"
                        class="text-danger py-1 text-xs"
                      >
                        {{ $page.props.errors.lieunaissance }}
                      </div>
                    </div>
                    <div class="col ">
                      <div class="form-floating">
                        <input
                           data-date-end-date="0d"
                          type="text"
                          id="datenaissance"
                          class="form-control datepicker form-control-sm  text-xs"
                          :class="[
                            $page.props.errors.datenaissance ? 'is-invalid' : '',
                          ]"
                          placeholder="Le nom de la ressource"
                          @focus="takeData"
                          v-model="form.datenaissance"
                        />

                        <label for="datenaissance">Date de naissance</label>
                      </div>
                      <div
                        v-if="$page.props.errors.datenaissance"
                        class="text-danger py-1 text-xs"
                      >
                        {{ $page.props.errors.datenaissance }}
                      </div>
                    </div>
                  </div>
                  <div class="form-group d-flex gx-2 mb-4">

                    <div class="col me-3">
                      <div class="form-floating">
                        <select  v-model="form.niveau_etude" :class="[
                            $page.props.errors.niveau_etude ? 'is-invalid' : '',
                          ]"
                          placeholder="Niveau" class="form-select  text-xs" >
                            <option value="Bac">Bac</option>
                            <option value="Licence">Licence</option>
                            <option value="Master">Master</option>
                            <option value="Doctorat">Doctorat</option>
                        </select>

                        <label for="nom">Niveau d'étude (*)</label>
                      </div>
                      <div
                        v-if="$page.props.errors.niveau_etude"
                        class="text-danger py-1 text-xs"
                      >
                        {{ $page.props.errors.niveau_etude }}
                      </div>
                    </div>
                    <div class="col ">
                      <div class="form-floating">
                        <select required  v-model="form.sexe" :class="[
                            $page.props.errors.sexe ? 'is-invalid' : '',
                          ]"
                          placeholder="Niveau" class="form-select text-xs" >
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                        </select>

                        <label for="nom">Sexe (*)</label>
                      </div>
                      <div
                        v-if="$page.props.errors.sexe"
                        class="text-danger py-1 text-xs"
                      >
                        {{ $page.props.errors.sexe }}
                      </div>
                    </div>

                  </div>
                  <div class="form-group d-flex gx-2 mb-4">
                  <div class="col-md-6 ">
                      <div class="form-floating">
                        <select v-if="nmax" required  v-model="form.ordre" :class="[
                            $page.props.errors.ordre ? 'is-invalid' : '',
                          ]"
                          placeholder="Niveau" class="form-select text-xs" >
                            <option v-for="j in nmax" :key="j" :value="j"> Priorité {{j}}</option>
                        </select>

                        <label for="nom">Ordre (*)</label>
                      </div>
                      <div
                        v-if="$page.props.errors.ordre"
                        class="text-danger py-1 text-xs"
                      >
                        {{ $page.props.errors.ordre }}
                      </div>
                    </div>
                  </div>
                </div>
                </div>
            </div>
            <div class="card rounded-2 mb-4 shadow-1">
              <div class="card-body p-4">
                <div class="mb-3">
                  <label for="formFileSm" class="form-label"
                    >Médias sociaux</label>
                        <div class='d-flex'>
                            <div class="col  me-2">
                         <label for='site text-muted text-xs'>Site web:</label>
                                <input class="form-control text-xs"  :title="$page.props.errors.siteweb"  :class="[$page.props.errors.siteweb ? 'is-invalid' : '']" placeholder="https://nometprenom.com"  v-model="form.siteweb">
                            </div>
                            <div class="col">
                                <label for='site text-muted text-xs'>Facebook:</label>
                                <input class="form-control text-xs"  :title="$page.props.errors.facebook"  :class="[$page.props.errors.facebook ? 'is-invalid' : '']"  placeholder="https://facebook.com/nometprenom"   v-model="form.facebook">
                            </div>
                        </div>
                        <div class='d-flex'>
                            <div class="col  me-2">
                                <label for='site text-muted text-xs'>Twitter</label>
                                <input class="form-control text-xs"  :title="$page.props.errors.twitter"  :class="[$page.props.errors.twitter ? 'is-invalid' : '']"  placeholder="https://twitter.com/nometprenom"  v-model="form.twitter">
                            </div>

                            <div class="col">
                                <label for='site text-muted text-xs'>Instagram</label>
                                <input class="form-control text-xs" :title="$page.props.errors.instagram" :class="[$page.props.errors.instagram ? 'is-invalid' : '']" placeholder="https://instagram.com/nometprenom"  v-model="form.instagram">
                            </div>
                        </div>
                        <div class='d-flex'>
                            <div class="col  me-2">
                                <label for='site text-muted text-xs'>LinkedIn</label>
                                <input class="form-control text-xs"  :title="$page.props.errors.linkedin"  :class="[$page.props.errors.linkedin ? 'is-invalid' : '']"  placeholder="https://linkedin.com/nometprenom"  v-model="form.linkedin">
                            </div>

                            <div class="col">
                                <label for='site text-muted text-xs'>Autre lien</label>
                                <input class="form-control text-xs"  :title="$page.props.errors.autre"  :class="[$page.props.errors.autre ? 'is-invalid' : '']"  placeholder="https://linkedin.com/nometprenom"  v-model="form.autre">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card rounded-2 mb-4 shadow-1">
              <div class="card-body p-4">
                <div class="mb-3">
                  <label for="formFileSm" class="form-label"
                    >Ajouter une photo </label
                  >
                  <div class="mb-2 text-xs text-muted"><b>Formats autorisés:</b> jpeg,png,jpg</div>

                  <input
                    class="form-control form-control-sm hidden"
                    ref="fileInput" id="fichier"
                    type="file"
                     :class="[
                            $page.props.errors.image ? 'is-invalid' : '',
                          ]"
                    @change="pickFile"
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
                    >Ajouter un fichier</label
                  >
                  <div class="mb-2 text-xs text-muted"><b>Formats autorisés:</b> PDF,DOCS,DOCX,DOC</div>

                  <input
                   :class="[
                            $page.props.errors.fichier ? 'is-invalid' : '',
                          ]"
                    class="form-control form-control-sm hidden"
                    ref="fileInput"
                    type="file"
                    @input="onFileChange"

                  />
                   <div
                    v-if="$page.props.errors.fichier"
                    class="text-danger py-1 text-xs"

                  >
                    {{ $page.props.errors.fichier }}
                  </div>
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
                      <th class="">#</th>
                      <th scope="col">Membre</th>
                      <th scope="col">Etat</th>
                      <th scope="col">Date d'ajout</th>
                      <th class="text-end">Actions</th>
                    </tr>
                  </thead>
                  <tbody v-if="datas && datas.data!=undefined && datas.data!=null ">
                    <tr  @click="ShowInfo(row)"  v-for="(row,i) in datas.data" :key="row">
                   <td> {{ i+1 }}</td>
                   <td>  <button class="text-dark bg-none font-bold d-block px-0" @click="ShowInfo(row)" >{{ row.nom+" "+row.prenom }}</button>
                   <p class="text-muted font-light"><small>Poste ({{ row.ordre }}) : {{ row.poste }}</small></p></td>
                   <td class="text-center">
                      <span v-if="row.actif" class="badge bg-success rounded-5 text-white">Actif</span>
                      <span v-if="!row.actif" class="badge bg-gray-500 rounded-5  text-white">Désactivé</span>
                    </td>
                   <td> {{ row.h_created_at }}</td>
                   <td nowrap class="text-end">
                                <button
                                @click="ShowInfo(row)"
                                class="mx-1 bg-none"
                              >
                                <i class="fas fa-eye"></i>
                              </button>
                              <button @click="edit(row)" class="mx-1 bg-none">
                                <i class="fas fa-edit"></i>

                              </button>

                              <button

                                @click="deleteRow(row)"
                                class="mx-1 bg-none text-danger"
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

                  <h5 class="card-header h4 mb-3 px-3 py-1 text-uppercase  border-0 text-center">{{ sdata.nom+" "+sdata.prenom }}</h5>
                   <div class="col-md-4 text-mute font-bold text-end">

                  </div>
                  <div class="col-md-8">
                    <img v-if="sdata.photo" class="img-responsive rounded-3 border-1 shadow-sm w-24 mb-3" :src="'/'+sdata.photo" :alt="sdata.photo">

                  </div>
                  <div class="col-md-4 text-mute font-bold text-end">
                    Nom :
                  </div>

                  <div class="col-md-8">{{ sdata.nom }}</div>
                  <div class="col-md-4 text-mute font-bold text-end">
                    Prénoms :
                  </div>
                  <div class="col-md-8">{{ sdata.prenom }}</div>
                  <div class="col-md-4 text-mute font-bold text-end">
                    Poste :
                  </div>
                  <div class="col-md-8">{{ sdata.poste }}</div>
                  <div class="col-md-4 text-mute font-bold text-end">
                    Sexe :
                  </div>
                  <div class="col-md-8">{{ sdata.sexe=='M'?'Masculin':'Féminin' }}</div>
                  <div class="col-md-4 text-mute font-bold text-end">
                    Date de naissance :
                  </div>
                  <div class="col-md-8">{{ sdata.datenaissance}}</div>
                  <div class="col-md-4 text-mute font-bold text-end">
                    Lieu :
                  </div>
                  <div class="col-md-8">{{ sdata.lieunaissance}}</div>
                  <div class="col-md-4 text-mute font-bold text-end">
                    Niveau d'étude :
                  </div>
                  <div class="col-md-8">{{ sdata.niveau_etude}}</div>
                  <div v-if="sdata.website" class="col-md-4 text-mute font-bold text-end">
                    Site web:
                  </div>
                  <div v-if="sdata.website" class="col-md-8 text-xs">{{ sdata.website}}</div>
                  <div v-if="sdata.facebook" class="col-md-4 text-mute font-bold text-end">
                    Facebook:
                  </div>
                  <div v-if="sdata.facebook" class="col-md-8">{{ sdata.facebook}}</div>
                  <div v-if="sdata.twitter" class="col-md-4 text-mute font-bold text-end">
                    Twitter:
                  </div>
                  <div v-if="sdata.twitter" class="col-md-8 text-xs">{{ sdata.twitter}}</div>
                  <div v-if="sdata.instagram" class="col-md-4 text-mute font-bold text-end">
                    Instagram:
                  </div>
                  <div v-if="sdata.instagram" class="col-md-8 text-xs">{{ sdata.instagram}}</div>
                  <div v-if="sdata.other_link" class="col-md-4 text-mute font-bold text-end">
                    Autres:
                  </div>
                  <div v-if="sdata.other_link" class="col-md-8 text-xs">{{ sdata.other_link}}</div>

                  <div class="col-md-4 text-mute font-bold text-end">
                    Création :
                  </div>
                  <div class="col-md-8">
                    <i class="fas fa-calendar" aria-hidden="true"></i>
                    {{ sdata.h_created_at }}
                  </div>
                 <div
                    v-if="sdata.user"
                    class="col-md-4 text-mute font-bold text-end"
                  >
                    Ajouté par :
                  </div>
                  <div v-if="sdata.user" class="col-md-8">
                    <i class="fas fa-user" aria-hidden="true"></i>
                    {{ sdata.user.name }}
                  </div>
                  <div class="col-md-4 text-mute font-bold text-end">
                    Etat :
                  </div>
                  <div class="col-md-8">

                    <span class=" text-success font-bold" v-if="sdata.actif">Activé</span>
                    <span class="text-danger font-bold" v-if="!sdata.actif">Désactivé</span>
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
                    Biographie :
                  </div>
                  <div class="col-md-12 text-xs pb-5" style="max-height:460px; overflow:auto" v-html="sdata.bio">

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

import '/storage/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'
import  '/storage/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css'
import { Head } from "@inertiajs/inertia-vue3";

import TopHeader from "@/Components/TopHeader";
import AdminLayout from "@/Layouts/AdminLayout";
import AdminSidebar from "@/Components/AdminSidebar";
import Pagination from "@/Components/Pagination";
import Summernote from "/storage/vendor/summernote/summernote.min.js";
import "/storage/vendor/summernote/summernote.min.css";
//import vuejsDatepicker from 'vuejs-datepicker';
import VueDatepicker from '@/Jetstream/VueDatepicker';

import ValidationErrors from "@/Jetstream/ValidationErrors";

export default {
  components: {
    AdminLayout,
    AdminSidebar,
    Summernote,
    TopHeader,
    Pagination,
    VueDatepicker,
    ValidationErrors
  },
  props: ["datas",'close','nmax'],
  data() {
    return {
      titre: "Membres",
      nb: 0,
      ladate: 0,
      sdata: null,
      previewImage: null,
      //data:this.datas.data[this.index],
      editMode: false,
      data: null,
      Close: true,
      isOpen: false,
      dialog: {
          title: "Nouveau membre",
        contenu: "null",
      },
      form:this.$inertia.form({
        id: null,
        nom: null,
        prenom: null,
        poste: null,
        sexe: null,
        niveau_etude: null,
        datenaissance: null,
        sexe: null,
        siteweb: null,
        facebook: null,
        twitter: null,
        linkedin: null,
        instagram: null,
        autre: null,
        datenaissance:null,
        lieunaissance: null,
        titre: null,
        active: true,
        fichier: null,
        image: null,
        resume: null,
        contenu: null,
        fermer:true,
      }),
    };
  },
  layout: AdminLayout,

  mounted() {
    this.AddPlugin();
    this.initDatas();
    this.sdata=this.datas.data.length?this.datas.data[0]:null;
    if(!this.editMode){
        this.form.ordre=this.nmax;
    }
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
       $('#datenaissance').datepicker({
        format: 'mm/dd/yyyy',
            startDate: '-100y'
        });
        $('#datenaissance').change(function () {
           $('#vdatenaissance').val($(this).val());
        });

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
            this.sdata = this.datas.data[0];
            console.log(this.sdata);
        }
        if(this.$page.props.close!=undefined ) {
            this.isOpen=!this.$page.props.close;
          //this alert(!this.isOpen);
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
        prenom: null,
        poste: null,
        sexe: null,
        niveau_etude: null,
        datenaissance: null,
        sexe: null,
        siteweb: null,
        facebook: null,
        twitter: null,
        linkedin: null,
        instagram: null,
        autre: null,
        lieunaissance: null,
        titre: null,
        active: true,
        fichier: null,
        image: null,
        resume: null,
        ordre: 0,
        contenu: null,
        fermer:true,
      };
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
        this.$inertia.post(route("membre.store"), data, {
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
      this.form.titre = data.title;
      this.form.resume = data.lead;
      this.form.siteweb = data.website;
      this.form.autre = data.other_link;
      this.form.niveau_etude = data.niveau_etude;
      this.form.ordre = data.ordre;
      this.form.fermer = true;
      this.editMode = true;
      this.form.fichier = null;
      this.form.active = data.actif=='1'?true:false; //DD/MM/YY
      var y=data.datenaissance.slice(0,4),
          m=data.datenaissance.slice(5,7),
          d=data.datenaissance.slice(8,10),
          dnais=d+'/'+m+'/'+y;
       this.form.datenaissance = dnais;
     // alert(dnais+'========'+data.datenaissance)
      //alert(this.form.niveau_etude)
      /*this.form.id = data.id;
      this.form.couleur = data.couleur;
      this.form.contenu = data.description;
      */
     $('#summernote').summernote('code',data.bio);

      this.openModal();
    },

    update: function (data) {
      data._method = "PUT";
      var url = route("membre.update", data.id);
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
      this.$inertia.post(route("membre.destroy", data.id), data);
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
           // alert('fichier')
      }
    },
     pickFile(e) {
         var t;
    const file = t=e.target.files[0];
    this.form.image = t;
    this.form.image = file;
    this.previewImage = URL.createObjectURL(file);
    },
    pickFile2(e) {
      let input = this.$refs.fileInput;
      let file = input.files  || e.dataTransfer.files;
      console.log(file[0])
      if (file!=null && file[0]) {
        let reader = new FileReader();
        alert('')
        reader.onload = (e) => {
          this.previewImage = e.target.result;
          this.form.image = file[0];
        };
        reader.readAsDataURL(file[0]);
        this.$emit("input", file[0]);
      }
    },
    takeData(){
         this.form.datenaissance= $('#datenaissance').val();
         //alert(this.form.datenaissance)
    }
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

