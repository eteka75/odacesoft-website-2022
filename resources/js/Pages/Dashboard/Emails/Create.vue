<template>
  <div>

    <form  method="post" @submit.prevent="store">
    <span>
    </span>
      <Top-Header :titre="title">
        <template #btn>
          <div>
            <inertia-link
              :href="route('email.index')"
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
            <jet-button v-if="!editMode"
              type="submit"
              class="btn btn-primary btn-sm py-2 shodaw-1"
              :class="{ 'text-white-50': form.processing }"
              :disabled="form.processing"
              :loading="form.processing"
            >
              <!--i class="far fa-save"></i-->
              Envoyer le message
            </jet-button>
            <jet-button v-if="editMode"
              type="submit"
              class="btn btn-success ms-1 btn-sm py-2 shodaw-1"
              :class="{ 'text-white-50': form.processing }"
              :disabled="form.processing"
              :loading="form.processing"
            >
              <i class="fas fa-edit    "></i>
              Modifier
            </jet-button>
          </div>
        </template>
      </Top-Header>
      <div class="main-content">
        <div class='row'>
            <div class='col-md-12'>
                <ValidationErrors/>
            </div>
            <div class="pb-6 col-md-8 col-xl-9">
                <div class="card min-h">
                    <div class="card-body">
                            <div class="form-group-4 col mb-3 ">
                                    <input
                                    v-model="form.exp"
                                    required
                                    :error="form.errors.exp"
                                    :class="[$page.props.errors.exp ?'is-invalid':'is-valid_']"
                                    type="text"
                                    class="
                                        form-control form-control-sm
                                        text-xs
                                        py-1
                                        rounded-1
                                        mb-3
                                    "

                                    id="floatingInput"
                                    placeholder="Exp: email1@gmail.com;email1@gmail.com"
                                    />
                            </div>
                            <div class="form-group-4 mb-3">
                                <input
                                v-model="form.objet"
                                required
                                :error="form.errors.objet"
                                :class="[$page.props.errors.objet ?'is-invalid':'is-valid_']"
                                type="text"
                                class="
                                    form-control form-control-sm
                                    text-lg
                                    py-1
                                    rounded-1
                                    mb-3
                                "
                                id="floatingInput"
                                placeholder="Object du message"
                                />

                            </div>
                             <div class="form-group-4 mb-3">
                                <input
                                v-model="form.dest"
                                required
                                :error="form.errors.dest"
                                :class="[$page.props.errors.dest ?'is-invalid':'is-valid_']"
                                type="text"
                                class="
                                    form-control form-control-sm
                                    text-sm
                                    py-1
                                    rounded-1
                                    mb-3
                                "
                                id="floatingInput"
                                placeholder="Destinataire: email1@gmail.com;email1@gmail.com;email3@gmail.com"
                                />
                            </div>
                             <div class="d-flex">

                                <div class="form-group-4 col mb-3">
                                    <input
                                    v-model="form.cci"

                                    :error="form.errors.cci"
                                    :class="[$page.props.errors.cci ?'is-invalid':'is-valid_']"
                                    type="text"
                                    class="
                                        form-control form-control-sm
                                        text-xs
                                        py-1
                                        rounded-1
                                        mb-3
                                    "
                                    id="floatingInput"
                                    placeholder="Cci: email1@gmail.com;email1@gmail.com;email3@gmail.com"
                                    />
                                </div>
                             </div>
                             <div class="form-group mb-4">
                                    <div id="summernote" class="form-control"  ></div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3">

            <div class="card rounded-2 mb-4 shadow-1">
              <div class="card-body p-4">
                 <label for="formFileSm" class="form-label"
                    ></label>
                <div class="">
                <div class="form-check form-switch mb-3">
                  <input
                    value="1"
                    class="form-check-input"
                    v-model="form.active"
                    :error="form.errors.active"
                    checked
                    type="checkbox"
                    id="flexSwitchCheckDefault"
                  />
                  <label class="form-check-label" for="flexSwitchCheckDefault"
                    >Rester sur la page </label
                  >
                </div>
                </div>
            </div>
            </div>
            <div v-if="showimg" class="card rounded-2 mb-4 shadow-1">
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
import Summernote from '/storage/vendor/summernote/summernote.min.js'
import '/storage/vendor/summernote/summernote.min.css'
import '/storage/vendor/tagsinput/tagsinput.js'
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
      titre: "Envoie d'email",
      showimg:false,
      editMode: false,
      previewImage: null,
      form: this.$inertia.form({
        id: null,
        objet: null,
        exp: null,
        dest: null,
        cci: null,
        message: null,
        active: false,
      }),
    };
  },
  layout: AdminLayout,
  mounted() {
    this.AddPlugin();
    this.initData();
  },
  props:['edit','data'],
  methods: {
      initData() {
        if(this.edit!=undefined) {
            if(this.edit){
                this.editMode=true;
            }
        }
         if(this.data !==undefined) {
            this.form.id=this.data.id;
            this.form.objet=this.data.objet;
            this.form.dest=this.data.destinataire;
            this.form.exp=this.data.expediteur;
            //alert(this.data.actif)
            this.form.active=false;
            this.form.message=this.data.message;
            console.log(this.form);
            $('#summernote').summernote('code',this.form.message);
        }

    },
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
            ['para', ['link','ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', [ 'picture', 'video']],
            ['view', ['fullscreen', 'codeview','undo','redo']],
           // ['height', ['height']]
        ]
      });

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
          this.form.message=smtHtml;
          return 1;
      }
    return 0;
    },
    store() {
    if(!this.editMode) {
         if (this.ClickEditor()) {
        this.$inertia.post(this.route("email.store"), this.form, {
          forceFormData: true,
        });
      }
    }
    //Mise a jour
    if(this.editMode) {
         this.form._method = "PUT";
         if (this.ClickEditor())  {
        this.$inertia.post(this.route("email.update",this.form.id), this.form, {
          forceFormData: true,
        });
      }
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

