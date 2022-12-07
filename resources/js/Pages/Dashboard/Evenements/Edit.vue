<template>
  <div>

    <form method="post" @submit.prevent="update">
      <Top-Header :titre="titre">
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
            <jet-button
              type="submit"
              class="btn btn-primary btn-sm py-2 shodaw-1"
              :class="{ 'text-white-50': form.processing }"
              :disabled="form.processing"
              :loading="form.processing"
            >
              <!--i class="far fa-save"></i-->
              Sauvegarder
            </jet-button>
          </div>
        </template>
      </Top-Header>

      <div class="main-content">
        <div class="row">
        <div class='col-md-12'>
        <ValidationErrors />
      </div>
          <div class="col-lg-8 col-xl-9">
            <div class="cardrounded-1shadow-sm">
              <div class="card-bodypy-8px-10">
                <input
                  v-model="form.title"
                  required
                  :error="form.errors.title"
                  :class="[$page.props.errors.title ?'is-invalid':'is-valid_']"
                  type="text"
                  class="
                    form-control form-control-lg
                    text-xl
                    py-1
                    rounded-1
                    mb-3
                  "
                  id="floatingInput"
                  placeholder="nom de l'évènement"
                />
                <div class="form-group mb-3">
                    <textarea class="form-control" v-model="form.description" id="lead" placeholder="Description de l'évènement"></textarea>
                </div>
                <div class="form-group">
                    <div id="summernote" class="form-control"  ></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-xl-3 pb-4">

            <div class="card rounded-2 mb-4 shadow-1">
              <div class="card-body p-4">
                 <label for="formFileSm" class="form-label"
                    >Classer cet évènement dans le top</label>
                <div class="">
                <div class="form-check form-switch mb-3">
                  <input
                    value="1"
                    class="form-check-input"
                    v-model="form.top"
                    :error="form.errors.top"
                     :class="[$page.props.errors.top ?'is-invalid':'is-valid_']"

                    type="checkbox"
                    id="classement"
                  />
                  <label class="form-check-label" for="classement"
                    >Activer</label
                  >
                </div>
                </div>
            </div>
            </div>
            <div class="card rounded-2 mb-4 shadow-1">
              <div class="card-body p-4">
                 <label for="formFileSm" class="form-label"
                    >Informations</label>
                <div class="">
                    <div class="d-flex">
                        <div class="form-group mb-2 me-2">
                            <label for="lieu" class="text-muted text-xs">Priorité</label>
                            <input type="number"  :class="[$page.props.errors.priorite ?'is-invalid':'is-valid_']" placeholder="Priorité" class="form-control text-xs" v-model="form.priorite">
                        </div>
                        <div class="form-group mb-2">
                            <label for="lieu" class="text-muted text-xs">Participants</label>
                            <input type="number"  :class="[$page.props.errors.participants ?'is-invalid':'is-valid_']" placeholder="Nombre de participants" class="form-control text-xs" v-model="form.participants">
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="lieu" class="text-muted text-xs">Lieu</label>
                        <input type="text"  :class="[$page.props.errors.lieu ?'is-invalid':'is-valid_']" placeholder="Lieu de l'évènement" class="form-control text-xs" v-model="form.lieu">
                    </div>
                    <div class="d-flex border-topmt-3">
                    <label for="lieu" class="text-muted text-xs">Date et heure de démarrage</label>
                    </div>
                    <div class="d-flex">
                        <div class="form-group mb-1 me-2">
                        <input type="text" placeholder="Date début" id="datedebut"  :class="[$page.props.errors.datedebut ?'is-invalid':'is-valid_']" class="form-control text-xs dpicker" v-model="form.datedebut">
                        </div>
                        <div class="form-group mb-1 me-2">
                        <input type="text" placeholder="Heure début"  :class="[$page.props.errors.heuredebut ?'is-invalid':'is-valid_']" class="form-control text-xs tpicker" v-model="form.heuredebut">
                        </div>
                    </div>
                    <div class="d-flex">
                    <label for="lieu" class="text-muted text-xs">Date et heure de fin</label>
                    </div>
                    <div class="d-flex">
                        <div class="form-group mb-1 me-2">
                        <input type="text" placeholder="Date fin" id="datefin" :class="[$page.props.errors.datefin ?'is-invalid':'is-valid_']" class="datepicker form-control text-xs dpicker" v-model="form.datefin">
                        </div>
                        <div class="form-group mb-1 me-2">
                        <input type="text" placeholder="Heure fin"  :class="[$page.props.errors.heurefin ?'is-invalid':'is-valid_']" class="form-control text-xs tpicker" v-model="form.heurefin">
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="card rounded-2 mb-4 shadow-1">
              <div class="card-body p-4">
                 <label for="formFileSm" class="form-label"
                    >Publication de l'évènement</label>
                <div class="">
                <div class="form-check form-switch mb-3">
                  <input
                    value="1"
                    class="form-check-input"
                    v-model="form.actif"
                    :error="form.errors.actif"
                     :class="[$page.props.errors.actif ?'is-invalid':'is-valid_']"
                    checked
                    type="checkbox"
                    id="flexSwitchCheckDefault"
                  />
                  <label class="form-check-label" for="flexSwitchCheckDefault"
                    >Pulier</label
                  >
                </div>
                </div>
            </div>
            </div>
            <div class="card rounded-2 mb-4 shadow-1">
              <div class="card-body p-4">
                <div class="mb-3">
                  <label for="formFileSm" class="form-label"
                    >Ajouter une image</label
                  >
                     <div class="mb-2 text-xs text-muted"><b>Format autorisés:</b> jpeg,png,jpg,webp</div>

                  <input
                    class="form-control form-control-sm hidden"
                    ref="fileInput"
                    type="file"
                     :class="[$page.props.errors.image ?'is-invalid':'is-valid_']"
                    @input="pickFile"
                  />
                </div>
                <div v-if="$page.props.errors.image"
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
      </div>
    </form>

  </div>
</template>

<script>
import TopHeader from "@/Components/TopHeader";
import AdminLayout from "@/Layouts/AdminLayout";
import AdminSidebar from "@/Components/AdminSidebar";
import JetButton from "@/Jetstream/Button";
import ValidationErrors from "@/Jetstream/ValidationErrors";

import '/storage/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'
import '/storage/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css'
import '/storage/vendor/TimePicker/TimePicker.js'
import  '/storage/vendor/TimePicker/timepicker.min.css'


import { Head } from "@inertiajs/inertia-vue3";

import Summernote from '/storage/vendor/summernote/summernote.min.js';
import '/storage/vendor/summernote/summernote.min.css';
import '/storage/vendor/tagsinput/tagsinput.js';

export default {
  components: {
    AdminLayout,
    AdminSidebar,
    TopHeader,
    JetButton,
    Summernote,
    ValidationErrors,
    //ckeditor: CKEditor4.component ,
  },
  props:['cats','activite'],
  data() {
    return {
      title: "Moification d'évènement",
      previewImage: null,
      titre: "Evènement",
      editMode: false,
      isOpen: false,
      previewImage: null,
      form: this.$inertia.form({
        title: null,
        description: null,
        lieu: null,
        priorite: 0,
        top: false,
        participants: 20,
        datedebut: null,
        heuredebut: null,
        datefin: null,
        heurefin: null,
        contenu: null,
        image: null,
        actif: false
      }),
    };
  },
  layout: AdminLayout,
  mounted() {
      this.initData();
    this.AddPlugin();
  },
  methods: {
      AddTag() {this.setTag()},
      setTag() {
      var v = document.getElementById("vtags") || null;
      if (v) {
        this.form.tags = v.value;
      return 1;
      }
       return 0;
    },
    initData() {
        this.form.id = this.activite.id;
        this.form.title = this.activite.title;
        this.form.lieu = this.activite.lieu;
        this.form.priorite = this.activite.priorite;
        this.form.top = this.activite.top;
        this.form.participants = this.activite.nb_participants;
        this.form.datedebut = this.activite.date_event;
        this.form.heuredebut = this.activite.heure_event;
        this.form.datefin = this.activite.date_fin;
        this.form.heurefin = this.activite.heure_fin;
        this.form.actif =(this.activite.actif>=1)?true:false;
        this.form.top =(this.activite.top>=1)?true:false;

        //this.form.actif = this.activite.actif;
        this.form.contenu = this.activite.content;
        this.form.description = this.activite.lead;

       // this.form.publie = (this.activite.actif>=1)?true:false;
        this.previewImage = (this.activite.img)? '/'+this.activite.img:null;
        //alert(this.activite.top)
    },
    ClickEditor() {

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
    AddPlugin() {

         $('.dpicker').datepicker({
        format: 'mm/dd/yyyy',
            startDate: '-100y'
        });

        $('.tpicker').timepicker();
       $('#summernote').summernote({
        placeholder: 'Rédiger votre article ici ...',
        tabsize: 2,
        height: 600,
        fontNames: ['Inter', 'Montserrat',  'Arial', 'Comic Sans MS', 'Courier New', 'Merriweather'],
        toolbar: [
        ['style', [ "style",'bold', 'italic', 'underline','strikethrough', 'clear','fontname']],
        ['para', ['link','ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', [ 'picture', 'video']],
        ['view', ['fullscreen', 'codeview','undo','redo']],
        ]
      });

      $('#summernote').summernote('code',this.form.contenu);


    },
    update() {
        this.form._method = "PUT";

      if (this.ClickEditor()) {
        this.$inertia.post(this.route("evenement.update",this.form.id), this.form, {
          forceFormData: true,
        });
      }
    },
    selectImage() {
      this.$refs.fileInput.click();
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

/*
 * bootstrap-tagsinput v0.8.0
 *
 */
/*ClassicEditor
		.create( document.querySelector( '#editor1' ) )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( error => {
			console.error( 'There was a problem initializing the editor.', error );
		} );
*/

</script>
<style >
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
/*.note-editor .note-toolbar .note-dropdown-menu, .note-popover .popover-content .note-dropdown-menu{max-width:200px}*/
.note-editor .note-toolbar .note-dropdown-menu li a:hover{background-color:#eeeeee !important}
.note-dropdown-menu a:hover{background-color:#eeeeee !important}
.note-dropdown-menu a{
    padding: left 2px !important;
    padding: right 2px  !important;
    color:inherit;
}
.note-editor.note-airframe .note-statusbar, .note-editor.note-frame .note-statusbar{
    border-top: 0px solid #e7eaf0;
}
blockquote {
    margin: 0 0 1rem;
    border-left: 4px solid #aaa;
    padding: 0px 10px;
}
.note-editor.note-airframe .note-editing-area, .note-editor.note-frame .note-editing-area{
    line-height:1.3em;
}
/*
 * bootstrap-tagsinput v0.8.0
 *
 */

.bootstrap-tagsinput {
  background-color: #fff;
  border: 1px solid #eee9e9;
  /*box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);*/
  display: inline-block;
  padding: 5px 8px;
  color: #555;
  vertical-align: middle;
  border-radius: 3px;
  width: 100%;
  line-height: 25px;
  cursor: text;
}
.bootstrap-tagsinput input {
  border: none;
  box-shadow: none;
  outline: none;
  background-color: transparent;
  padding: 0 6px;
  margin: 0;
  width: auto;
  max-width: inherit;
}
.bootstrap-tagsinput.form-control input::-moz-placeholder {
  color: #777;
  opacity: 1;
}
.bootstrap-tagsinput.form-control input:-ms-input-placeholder {
  color: #777;
}
.bootstrap-tagsinput.form-control input::-webkit-input-placeholder {
  color: #777;
}
.bootstrap-tagsinput input:focus {
  border: none;
  box-shadow: none;
}
.bootstrap-tagsinput .badge {
  margin-right: 2px;
  color: white;
  background-color: #0275d8;
  padding: 5px 8px;
  border-radius: 3px;
  border: 1px solid #01649e;
  margin-bottom: 5px;
}
.bootstrap-tagsinput .badge [data-role="remove"] {
  margin-left: 8px;
  cursor: pointer;
}
.bootstrap-tagsinput .badge [data-role="remove"]:after {
  content: "x";
  padding: 0px 4px;
  background-color: rgba(0, 0, 0, 0.1);
  border-radius: 50%;
  font-size: 13px;
}
.bootstrap-tagsinput .badge [data-role="remove"]:hover:after {
  background-color: rgba(0, 0, 0, 0.62);
}
.bootstrap-tagsinput .badge [data-role="remove"]:hover:active {
  box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
}

/*CKEDITOR*/
.ck.ck-toolbar,
.ck.ck-editor__main > .ck-editor__editable:not(.ck-focused) {
  background-color: #ffffff;
  border: 1px solid #e7eaf0;
}

.ck.ck-editor__main > .ck-editor__editable:not(.ck-focused),
.ck.ck-editor__main > .ck-editor__editable {
  padding: 0.41em 1.2em;
  min-height: 20em;
}
</style>
