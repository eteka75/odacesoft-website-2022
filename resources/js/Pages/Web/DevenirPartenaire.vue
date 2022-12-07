<template>
  <Header menu="Produits"/>
   <Head>
    <title>Demande de partenariat de stage • Odacesoft</title>
    <meta head-key="description" name="description" content="Découvrez nos produits et services pour faire décoller vos affaires grâce aux digital." />
  </Head>
  <cover-layout>
    <div class="bg-gray-blue">
    <div class="container-lg max-w-screen-xl">
      <div class="row">
        <div class="col-md-12   col-lg-12 col-xl-12 text-md-center">
          <div class="py-6 py-md-16 py-xl-20 pb-xl-40  pb-md-30">
            <h1 class="lh-tight text-white ls-tight display-5 mb-">
             Demande de <span class="text-white-50"> partenariat</span>
            </h1>
            <p class="lead col-12 col-md-8 col-xl-6 mx-auto  text-white-80 mb-5 px-4">Renseignez du formulaire de demande de demande de partenariat. <br>Nous vous <u>contacterons </u> en vue de vous donner une suite.</p>

          </div>
        </div>
    </div>
</div>
</div>
<div class='bg-surface-tertiary'>
 <div class="container-lg max-w-screen-xl">
<div class="row">
        <!--div class="col-md-4 col-xxl-5">
        </div-->
        <div class="col-md-8 col-xxl-7 mx-auto ">

      <div class="  mt-4 mt-lg-n20 mt-xl-n40  mb-24">
        <div class="px-lg-8 py-4 pb-lg-10 pt-lg-8 px-3 px-md-8 my-md-8 bg-sm-white shadow-md-2 rounded-4  ">
    <form  method="post" >

         <h4 class=" text-cenetr mb-4">Information sur le partenariat</h4>
            <div class="row">

              <div class="col-md-6 mb-2">
                <label for="nom" autofocus="true"  class=" text-xs text-muted_ text-dark">Nom complet du point focal du partenariat (*)</label>
                <input  :disabled="form.processing"  type="text" :class="[$page.props.errors.nom ?'is-invalid':'is-valid_']" class="form-control  form-controle-sm text-sm" v-model="form.nom" id="nom" placeholder="Votre nom de famille"  required="">
                 <div v-if="$page.props.errors.nom" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.nom }}
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <label for="nom" autofocus="true"  class=" text-xs text-muted_ text-dark">Nom de la structure (pour les organisations)</label>
                <input  :disabled="form.processing"  type="text" :class="[$page.props.errors.structure ?'is-invalid':'is-valid_']" class="form-control  form-controle-sm text-sm" v-model="form.structure" id="structure" placeholder="Votre entreprise ou organisation"  required="">
                 <div v-if="$page.props.errors.structure" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.structure }}
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <label for="nom" autofocus="true"  class=" text-xs text-muted_ text-dark">Secteur d'activité  (*)</label>
                <input  :disabled="form.processing"  type="text" :class="[$page.props.errors.secteur ?'is-invalid':'is-valid_']" class="form-control  form-controle-sm text-sm" v-model="form.secteur" id="secteur" placeholder="Votre secteur d'activité"  required="">
                 <div v-if="$page.props.errors.secteur" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.secteur }}
                </div>
              </div>
               <div class="col-md-6 mb-2">
                <label for="nom" autofocus="true"  class=" text-xs text-muted_ text-dark">Lieu de résidence de structure  (*)</label>
                <input  :disabled="form.processing"  type="text" :class="[$page.props.errors.lieu ?'is-invalid':'is-valid_']" class="form-control  form-controle-sm text-sm" v-model="form.lieu" id="lieu" placeholder="Votre lieu de résidence"  required="">
                 <div v-if="$page.props.errors.lieu" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.lieu }}
                </div>
              </div>
               

            </div>
            <div class="row">
            <div class="col-md-6 mb-2">
                <label for="email" class=" text-xs text-muted_ text-dark">Email (*)</label>
                <input  :disabled="form.processing"  type="text" v-model="form.email" :class="[$page.props.errors.email ?'is-invalid':'is-valid_']" class="form-control form-controle-sm text-sm" id="email" placeholder="email@domaine.com"  required="">
                 <div v-if="$page.props.errors.email" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.email }}
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <label for="tel" class=" text-xs text-muted_ text-dark">Téléphone</label>
                <input  :disabled="form.processing"  type="text" :class="[$page.props.errors.tel ?'is-invalid':'is-valid_']" v-model="form.tel" class="form-control form-controle-sm text-sm" id="tel" placeholder="+229 96 77 00 00"  >
                 <div v-if="$page.props.errors.tel" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.tel }}
                </div>
              </div>
              <div class="col-md-12 mb-2">
                <label for="tel" class=" text-xs text-muted_ text-dark">Bref résumé de  l'accord de partenariat (*):</label>
                <textarea  :disabled="form.processing"  type="text" :class="[$page.props.errors.details_accord ?'is-invalid':'is-valid_']" rows="4" v-model="form.details_accord" class="form-control form-controle-sm text-sm" id="details_accord" placeholder=""  ></textarea>
                 <div v-if="$page.props.errors.details_accord" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.details_accord }}
                </div>
              </div>
               
               <div class="group-forms group-file-inputs component-form-file-input" id="component-shot">
                  <div class="">
                  <label class="text-xs text-muted_ text-dark" for="cfichier_">Fichier des clauses de l'accord de partenariat (Taille  &lt; 2Mo)</label>
                  <input  :disabled="form.processing"  type="file" :class="[$page.props.errors.fichier_partenariat ?'is-invalid':'is-valid_']" class="form-control form-control-sm bg-white mb-2" name="fichier_partenariat"   @change="pickFile($event)" id="fichier_partenariat" />
                  </div>
                  <div v-if="$page.props.errors.fichier_partenariat" class="text-danger py-1 text-xs">
                      {{ $page.props.errors.fichier }}
                  </div>
              </div>
              
              

            </div>
        <!--/div>
        <div class="bg-white p-md-5 p-2 p-xl-6 shadow-2 border-1 shadow-sm mt-4"-->
          

           
            <div class="mt-8 text-center">
            <jet-button @click="saveService"
                    class="btn bg-gray-blue text-white d-block d-sm-inline shadow-sm" type="submit"
                    :class="{ 'text-white-50': form.processing }"
                    :disabled="form.processing"
                    :loading="form.processing"
                    > Envoyer la demande <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </jet-button>
          </div>
          </form>
            </div>
             </div>
        </div>

      </div>
    </div>
    </div>
  </cover-layout>
</template>

<script>
import Header from "@/Components/Header";
import Notification from "@/Components/Notification";
import Footer from "@/Components/Footer";
import CoverLayout from "@/Layouts/CoverLayout";

export default {
  components: {
    Header,
    Notification,
    Footer,
    CoverLayout,
  },
  data(){

    return {
      previewImage: null,
      titre: "Activité",
      editMode: false,
      isOpen: false,
      previewImage: null,
      form: this.$inertia.form({
        nom: null,
        structure: null,
        lieu: null,
        secteur: null,
        email: null,
        tel: null,
        details_accord: null,
        fichier_cv: null,
      }),
    };
  },
  methods:{
      setType:function(id,text=''){
          this.form.type = id;
          this.form.nom_commande = 'Commande de '+text;
          this.form.description = 'Voici les caractéristiques de ma commande: \n 1-';
          this.resetProcess();
      },
      saveService:function(){
           this.form.processing= true;
           this.$inertia.post(this.route("save-partenaire"), this.form, {
            forceFormData: true,
            onSuccess: () => this.resetData(),
            /*
             onCancel: () =>this.resetProcess(),
            onBefore: visit => this.resetProcess(),
            onStart: visit => this.resetProcess(),
            onProgress: progress => this.resetProcess(),
            onError: errors => this.resetProcess(),
            onSuccess: page => this.resetProcess(),
            onFinish: visit => this.resetProcess(),*/
            onError: () => this.resetProcess(),
        });
      },
      resetProcess:function() {this.form.processing= false;},
      resetData:function() {
          $('#fmodal').click();
         this.form.reset() ;
         this.form.nom_auteur = null;
         this.form.pays = 59;
         this.form.email = null;
         this.form.nom_commande = null;
         this.form.type = "";
         this.form.tel = null;
         this.form.prix_min = null;
         this.form.prix_max = null;
         this.form.quantite = 1;
         this.form.description = null;
         this.form.fichier = null;
         this.form.processing= false
      },
    pickFile(e) {
        const file = event.target.files[0]
        this.form.fichier = file;

    },
   initCarroussel:function(){
       $('#owl-carousel-realisations').owlCarousel({
        loop: true,
        margin: 5,
        autoHeight:true,
        responsiveClass: true,
        responsive: {
            0: {
            items: 1,
            nav: true
            },
            600: {
            items: 3,
            nav: false
            },
            1000: {
            items: 4,
            nav: true,
            loop: false,
            margin: 20
            }
        }
        });
       $('#owl-carousel-article').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
            items: 1,
            nav: true
            },
            600: {
            items: 3,
            nav: false
            },
            1000: {
            items: 4,
            nav: true,
            loop: false,
            margin: 20
            }
        }
        });
   }
  },
  props:['pays','services']
};
</script>
