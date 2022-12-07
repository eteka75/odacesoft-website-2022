<template>
  <div>

    <form method="post" @submit.prevent="store">
      <Top-Header titre="Nouvelle activité">
        <template #btn>
          <div>
            <inertia-link
              :href="route('activite.index')"
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
                  placeholder="Titre de votre article"
                />
                <div class="form-group mb-3">
                    <textarea class="form-control" v-model="form.description" id="lead" placeholder="Descriptionde l'activité"></textarea>
                </div>
                <div class="form-group">
                    <div id="summernote" class="form-control"  ></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-xl-3">

            <div class="card rounded-2 mb-4 shadow-1">
              <div class="card-body p-4">
                 <label for="formFileSm" class="form-label"
                    >Publication de l'activité</label>
                <div class="">
                <div class="form-check form-switch mb-3">
                  <input
                    value="1"
                    class="form-check-input"
                    v-model="form.actif"
                    :error="form.errors.actif"
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
               <label for="temps">Temps de lecture </label>
                <div class="">
                  <div class="form-floating">
                      <select
                        required
                        class="form-select text-sm py-0"
                        v-model="form.temps"
                        :error="form.errors.temps"
                        id="temps"
                        :class="[$page.props.errors.temps ?'is-invalid':'is-valid_']"
                        aria-label="Floating label "
                      >
                        <option selected value="0">Choissir une durée</option>
                      <option v-for="i in 10" :key='i' :value='i'>{{i}} min</option>
                   </select>
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

                  <input
                    class="form-control form-control-sm hidden"
                    ref="fileInput"
                    type="file"
                    @input="pickFile"
                  />
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

import { Head } from "@inertiajs/inertia-vue3";
//import CKEditor from '@ckeditor/ckeditor5-vue';
//import CKEditor4  from 'ckeditor4-vue';
import Summernote from '/storage/vendor/summernote/summernote.min.js'
import '/storage/vendor/summernote/summernote.min.css'
import '/storage/vendor/tagsinput/tagsinput.js'
//import 'bootstrap/dist/css/bootstrap.min.css'

//import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
//import AppCkeditor from "@/Components/Ckeditor";
//import Base64UploadAdapter from '@ckeditor/ckeditor5-upload/src/adapters/base64uploadadapter';

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
  props:['cats'],
  data() {
    return {

      titre: "Activité",
      editMode: false,
      isOpen: false,
      previewImage: null,
      form: this.$inertia.form({
        title: null,
        description: null,
        contenu: null,
        image: null,
        temps: null,
       // categorie_id: 0,
        actif: false,
       // tags: null,
      }),
    };
  },
  layout: AdminLayout,
  mounted() {
    this.AddPlugin();
  },
  methods: {
    handleChange(data) {
      this.markdownContent = data.htmlContent;
    },
    AddTag() {},
    AddPlugin() {
       // $('.ckeditor').ckeditor();
       $('#summernote').summernote({
        placeholder: 'Rédiger votre article ici ...',
        tabsize: 2,
        height: 300,
        fontNames: ['Inter', 'Montserrat',  'Arial', 'Comic Sans MS', 'Courier New', 'Merriweather'],
        toolbar: [
    // ["Entete", [list of button]]

            ['style', [ "style",'bold', 'italic', 'underline','strikethrough', 'clear','fontname']],
            //['font', ['strikethrough', 'superscript', 'subscript']],
           // ['font', ['strikethrough']],
           // ['fontsize', ['fontsize']],
            //['link', []],
            ['para', ['link','ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', [ 'picture', 'video']],
            ['view', ['fullscreen', 'codeview','undo','redo']],
           // ['height', ['height']]
        ]
      });



      /*const plugin = document.createElement("script");
                plugin.setAttribute(
                "src",
                "//storage/vendor/ckeditor5/balloon/ckeditor.js"
                );
                plugin.async = true;
                document.head.appendChild(plugin);
                */
      // $('.ckeditor').ckeditor();

      var ed = document.getElementById("editor") || null;

      if (ed && typeof ClassicEditor != "undefined") {

           ClassicEditor
		.create( document.querySelector( '#editor' ), {
           // plugins: [ ]
           // plugins: [ Base64UploadAdapter]
			 toolbar:{
                items: [
                    'heading', '|',
                    'alignment', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                    'link', '|',
                    'bulletedList', 'numberedList', 'todoList',

                    //'fontfamily', 'fontsize',
                    //'fontColor', 'fontBackgroundColor', '|',
                    'code', 'codeBlock', '|',
                    'insertTable', '|',
                    'outdent', 'indent', '|',

                    //'uploadImage',
                    'blockQuote', '|',
                    'undo', 'redo'
                ],
                shouldNotGroupWhenFull: true
            }
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
      }
    },
    ClickEditor() {
      var el = document.getElementById("editor") || null;
      if ($('#summernote').summernote('isEmpty')) {
            alert("Le contenu de l'article est vite");
            return 0;
        }
      var smtHtml=$('#summernote').summernote('code');
   // alert(smtHtml)
      if (smtHtml.length) {
          this.form.contenu=smtHtml;
          return 1;
      }
    return 0;
     /* if (el) {
        var data = el.innerHTML;
        console.log(el.toString());
        this.form.contenu = data;
        return 0;
      }/**/
    },
    setTag() {
      var v = document.getElementById("vtags") || null;
      if (v) {
        this.form.tags = v.value;
        //alert( this.form.tags)
      }
      return 1;
    },
    store() {
      /*this.form.post({forceFormData: true});*/

      if (this.ClickEditor() && this.setTag()) {
        this.$inertia.post(this.route("activite.store"), this.form, {
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
