<template>
  <div>

      <Top-Header :titre="title">
        <template #btn>
          <div>
            <inertia-link
              :href="route('realisation.index')"
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
            <!--inertia-link v-if="article"
              :href="route('realisation.edit', article.id)"
              class="
                btn
                d-inline-flex
                btn-sm bg-gray-700 text-white
                mx-1
              "
            >
              <span class="pe-2">
                <i class="fas fa-edit" aria-hidden="true"></i>
              </span>
              <span>Modifier</span>
            </inertia-link-->

          </div>
        </template>
      </Top-Header>
      <div class="main-content">
          
        <div class="row">
        <div class='col-md-12'>
                <ValidationErrors/>
            </div>
          <div class="col-lg-6">
          <div v-if="article" class="card shadow-2 mb-6">
                <div class="card-body" >
                <h3  class="h4">{{article.titre}}</h3>
                <ul class=" d-flex text-xs list-inline text-muted pt-2">
                    <li class="me-2"><i class="far fa-calendar-alt  me-1" aria-hidden="true"></i>Ajouté, {{ article.h_created_at }}</li>
                    <li v-if=' article.h_updated_at!= article.h_created_at' class="me-2"><i class="far fa-calendar-check me-1" aria-hidden="true"></i>Dernière mise à jour, {{ article.h_updated_at }}</li>
                    <li v-if="article.categories" class="me-2"><span class="badgebg-green-600text-whitesrounded-5"> <i class="fa fa-bookmark" aria-hidden="true"></i> {{ article.categories.nom }}</span></li>
                    <li v-if="article" class="me-2"><span class="badgebg-green-600text-whitesrounded-5"> <i class="far fa-eye" aria-hidden="true"></i> {{ article.view_count }} vue{{ (article.view_count)>1?'s':''}}</span></li>
                    <li v-if="article.commentaires" class="me-2"><span class="badgebg-green-600text-whitesrounded-5"> <i class="far fa-comments" aria-hidden="true"></i> {{ article.commentaires.length }} Commentaire{{ article.commentaires.length>1?'s':'' }}</span></li>
                </ul>
                <ul  class=" d-flex list-inline text-muted text-xs pt-2" v-if='article.tags'>
                <li class="text-dark fw-bold font-bold">Mots clés :</li>
                    <li class="me-3" v-for='tag in article.tags' :key='tag'>#{{tag.nom}}</li>
                </ul>
                <p v-if="article.lead" class="lead border text-xs bg-gray-100 rounded-2 mb-4 py-3 px-6">
                    {{ article.lead }}
                </p>
                <div>
                    <img v-if="article.img"
                    :src="'/'+article.img"
                    class="img-responsive rounded-5 w-100 shadow-4_ mb-8"
                    :alt="article.title"
                    />
                </div>
                <div v-if="article"  class=" text-dark font-serif text-lg" v-html="article.description">

                </div>
                </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form  method="post" >
                    <div  class="card shadow-2 mb-6">
                        <div class="card-body" >
                        <h3  class="h4">Ajouter des images au dossier</h3>
                        <hr>
                        <div>
                        <div class="mb-3">
                            <div class="gallery mb-2"></div>
                            <label for="formFileSm" class="form-label"
                                >Ajouter une ou des images de cette réalisation </label
                            >
                            <a href="#"><div @click='CheckImg()' style="" class="bg-gray-100 py-20 px-15 border border-dashed text-center text-dark rounded-3 mb-4">
                               <i class="fa fa-camera"></i> Cliquez pour ajouter 
                            </div>
                            </a>
                            <div class="mb-2 text-xs text-muted"><b>Format autorisés:</b> jpeg,png,jpg,gif</div>

                            <input id="fichierimg" 
                                class="form-control d-none form-control-sm hidden"
                                ref="fileInput"  multiple  required
                                type="file"
                                @input="pickFile"
                            />
                        </div>
                       
                       
                       
                    <button
                        type="button"
                        class="btn btn-primary mx-1 btn-sm"
                        v-show="!editMode"
                        :class="{ 'text-white-50': form.processing }"
                    :disabled="form.processing"
                    :loading="form.processing"
                        @click="save(form)"
                        
                    >
                        <i class="fas fa-save"></i>
                        Sauvegarder
                    </button>

                        </div>
                        </div>
                    </div>
            </form> 
                    <div v-if="images && images.length"  class="card shadow-2 mb-6">
                        <div class="card-body" >
                            <h3  class="h4">LES IMAGES DU DOSSIER</h3>
                            <hr>
                            <div class="d-img-show"  v-for='img in images'>
                            <img class="g_image_mini " :src="'/'+img.url" :alt="img.nom" />
                            <br>
                            <inertia-link  @click="deleteImage(img)" class="btn  border bg-none btn-sm btn-xs btn-block w-100 text-muted" href="#"><i class="fas fa-trash text-muted" aria-hidden="true"></i> Supprimer </inertia-link>
                            </div>
                        <div>
                    </div>
                </div>
                </div>
        </div>
                
          </div>
           
      </div>
  </div>
</template>

<script>
import TopHeader from "@/Components/TopHeader";
import AdminLayout from "@/Layouts/AdminLayout";
import AdminSidebar from "@/Components/AdminSidebar";
import JetButton from "@/Jetstream/Button";

import { Head } from "@inertiajs/inertia-vue3";
import '/storage/vendor/summernote/summernote.min.css'
import '/storage/vendor/tagsinput/tagsinput.js'

import ValidationErrors from "@/Jetstream/ValidationErrors";


export default {
  components: {
    AdminLayout,
    AdminSidebar,
    TopHeader,
    JetButton,
    ValidationErrors,
  },
  layout: AdminLayout,
  data(){
      return {
          title:"Affichage du dossier images ",
          article:null,
          
      previewImage: [],
      form:this.$inertia.form({
      id: null,
      processinsg: "",
      fichier: null,
      image: [],
      fermer:true,
    }),
      }
  },
props:['data','id','images'],
  mounted() {
      this.initData();
      $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {
    
            if (input.files) {
                var filesAmount = input.files.length;
    
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
    
                    reader.onload = function(event) {
                        $($.parseHTML('<img class="g_image_mini">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }
    
                    reader.readAsDataURL(input.files[i]);
                }
            }
    
        };
    
        $('#fichierimg').on('change', function() {
            $('div.gallery').html('');
            imagesPreview(this, 'div.gallery');
        });
    });
  },
  methods: {
      initData(){
          this.article=this.data;
          this.form.id=this.id;
      },
      deleteImage: function (data) {
        if (!confirm("Voulez-vous supprimer cette image ?")) return;
        data._method = "DELETE";
        this.$inertia.post(route("gimage.destroy", data.id), data);
        this.resetData();
        //this.closeModal();
      },
      save: function (data) {
        this.form.processing= true;
        this.form.close = this.Close;
        //this.$inertia.post(route('tags.store'), data);
        // if (this.ClickEditor() ) {
          this.$inertia.post(route('gimage.store'), data, {
              preserveScroll: false,
              resetOnSuccess: true,
              onSuccess: () => this.resetData(),
              onError: () =>this.form.processing= false,
          });
        this.editMode = false;
       // }
      },
      resetData: function () {
         // alert(this.form.processing)
        //this.form.id=null;
        this.form.image=[];        
        this.form.processing= false;
        $('div.gallery').html('');
    },
    
      CheckImg(){
          $('#fichierimg').click();
      },
    pickFile(e) {
      let input = this.$refs.fileInput;
      let files = input.files;
      
      
      var i=0,f=0;
     
      for(f in files){
        let reader = new FileReader();
        if (typeof  files[f] === 'object'){
            this.form.image[i++] = files[f];
            //alert(typeof  files[f] )
        }
        ///alert(this.form.image)
        //console.log("FICHIERRRRRRRRRRRRRR"+files[f]);
       
       /* console.log("IMMMMMMMMMMMMMMMAGE"+this.previewImage);
        reader.readAsDataURL(files[0]);
        this.$emit("input", files[f]);*/
      };
     /* if (files && files[0]) {
        let reader = new FileReader();
        reader.onload = (e) => {
          this.previewImage = e.target.result;
          this.form.image = files[0];
        };
        reader.readAsDataURL(files[0]);
        this.$emit("input", files[0]);
      }
      */
    },
  }
}
</script>
<style type="text/css">
    .g_image_mini{
       
        max-height:120px;
        display:inline;
        margin:5px;

    }
    .d-img-show{
        float:left;
        margin:0px;
        border:1px solid #cccccc;
        padding:4px;
        text-align:center;
        margin-right:-1px;
        margin-bottom:-1px;
    }
</style>
