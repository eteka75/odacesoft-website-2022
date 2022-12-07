<template>
  <div>

    <form method="post" @submit.prevent="store">
      <Top-Header titre="Nouvelle article">
        <template #btn>
          <div>
            <inertia-link
              :href="route('article.index')"
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
       <div class='col-md-12'>
        <ValidationErrors />
      </div>
        <div class="row">
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
                <div class="form-group">
                    <div id="summernote" class="form-control"  ></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-xl-3">
            <progress
              v-if="form.progress"
              :value="form.progress.percentage"
              class="my-3"
              max="100"
            >
              {{ form.progress.percentage }}%
            </progress>
            <div class="card rounded-2 shadow-1 mb-5">
              <div class="card-body p-4">
                <h6 class="mb-2">Catégories & Mots clés</h6>
                <div class="row">
                  <div class="col-md-12 mb-3">

                    <div class="form-floating">
                      <select
                        required
                        class="form-select"
                        v-model="form.categorie_id"
                        :error="form.errors.categorie_id"
                        id="cats"
                        :class="[$page.props.errors.categorie_id ?'is-invalid':'is-valid_']"
                        aria-label="Floating label select example"
                      >
                        <option value="0">Choissir une catégorie</option>
                        <option  v-if="cats" v-for="cat in cats"  :value="cat.id" :key="cat">{{cat.nom}}</option>
                      </select>
                      <label for="cats">Catégories</label>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <input
                      type="text"
                      id="tags"
                      class="form-control"
                      v-model="form.tags"
                      :error="form.errors.tags"
                       :class="[$page.props.errors.tags ?'is-invalid':'is-valid_']"
                      data-role="tagsinput"
                      placeholder="Mot1,Mot2,Mot3,..."
                    />

                    <input id="vtags" @change="AddTag" class="d-none hidden" />
                  </div>
                  <div
                                    v-if="$page.props.errors.tags"
                                    class="text-danger py-1 text-xs"
                                  >
                                    {{ $page.props.errors.tags }}
                                </div>
                </div>

              </div>
            </div>

            <div class="card rounded-2 mb-4 shadow-1">
              <div class="card-body p-4">
                 <label for="formFileSm" class="form-label"
                    >Publication</label>
                <div class="">
                <div class="form-check form-switch mb-3">
                  <input
                    value="1"
                    class="form-check-input"
                    v-model="form.publie"
                    :error="form.errors.publie"
                    checked
                    type="checkbox"
                    id="flexSwitchCheckDefault"
                  />
                  <label class="form-check-label" for="flexSwitchCheckDefault"
                    >Pulier l'article</label
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
        //editor: ClassicEditor,
        editorData: '<p>Content of the editor.</p>',
        editorConfig: {
            // The configuration of the editor.
        },
      text: "",
      editorConfig: {
        // The configuration of the editor.
      },

      titre: "Articles du Blog",
      editMode: false,
      isOpen: false,
      previewImage: null,
      form: this.$inertia.form({
        title: null,
        contenu: null,
        image: null,
        categorie_id: 0,
        publie: false,
        tags: null,
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
        this.$inertia.post(this.route("article.store"), this.form, {
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
