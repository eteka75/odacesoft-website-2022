<template>
  <div>

    <form method="post" @submit.prevent="update">
      <Top-Header :titre="titre">
        <template #btn>
          <div>
            <inertia-link
              :href="route('service.index')"
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
      <div class='mb-4 px-10'>
        <ValidationErrors />
      </div>
      <div class="main-content">
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
                <h6 class="mb-2">Prix minimum et maximum</h6>
                <div class="d-flex">
                  <div class="col me-2">
                  <label for="pmin" class="text-muted text-xs">Prix minimum</label>
                    <input type="text"  v-model="form.prix_min" id="pmin" class="form-control" placeholder="5000F">
                  </div>
                  <div class="col">
                  <label for="pmax"   class="text-muted text-xs">Prix maximum</label>
                    <input type="text" v-model="form.prix_max" id="pmax" class="form-control" placeholder="100.000F">
                  </div>
                </div>

              </div>
            </div>
            <div class="card rounded-2 shadow-1 mb-5">
              <div class="card-body p-4">
                <h6 class="mb-2">Catégories </h6>
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
                        <option  v-for="cat in cats"  :value="cat.id" :key="cat">{{cat.title}}</option>
                      </select>
                      <label for="cats">Catégories</label>
                    </div>
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
  props:['cats','service'],
  data() {
    return {
      title: "Moification d'",
       previewImage: null,
      form: this.$inertia.form({
        title: null,
        contenu: null,
        resume: null,
        image: null,
        prix_min: 0,
        prix_max: 0,
        categorie_id: 0,
        publie: false,
        tags: null,
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
        alert("")
       return 0;
    },
    initData() {
        this.form.id = this.service.id;
        this.form.title = this.service.title;
        this.form.contenu = this.service.content;
        this.form.resume = this.service.lead;
        this.form.prix_min = this.service.prix_min;
        this.form.prix_max = this.service.prix_max;
        this.form.categorie_id = (this.service.categorie_service_id)? this.service.categorie_service_id:null;
        this.form.publie = (this.service.actif>=1)?true:false;

        this.previewImage = (this.service.img)? '/'+this.service.img:null;
        
            //alert(this.editorData)
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
        this.$inertia.post(this.route("service.update",this.form.id), this.form, {
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
