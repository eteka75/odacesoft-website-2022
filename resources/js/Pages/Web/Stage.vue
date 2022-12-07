<template>
  <Header menu="Produits"/>
   <Head>
    <title>Demande de stage • Odacesoft</title>
    <meta head-key="description" name="description" content="Découvrez nos produits et services pour faire décoller vos affaires grâce aux digital." />
  </Head>
  <cover-layout>
    <div class="bg-gray-800">
    <div class="container-lg max-w-screen-xl">
      <div class="row">
        <div class="col-md-12   col-lg-12 col-xl-12 text-md-center">
          <div class="py-6 py-md-16 py-xl-20 pb-xl-40  pb-md-30">
            <h1 class="lh-tight text-white ls-tight display-5 mb-">
             Demande de <span class="text-white-50"> stage</span>
            </h1>
            <p class="lead col-12 col-md-8 text-sm col-xl-6 mx-auto  text-white-80 mb-5">Renseignez ce formulaire de demande de stage en fournissant un email valide. Un <u>lien vous seras envoyé par email pour confirmation</u> du dossier, afin que votre dossier ne soit pris en compte.</p>

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
        <div class="col-md-9 col-xxl-8 mx-auto ">

      <div class="  mt-4 mt-lg-n20 mt-xl-n40  mb-24">
        <div class="px-lg-8 py-4 pb-lg-10 pt-lg-8 px-sm-3 px-md-8 my-md-8 bg-sm-white shadow-md-2 rounded-4">
    <form  method="post" @submit.prevent="saveService"  >

          <h4 class=" text-cenetr mb-4">Information sur le candidat</h4>
            <div class="row">
              <div class="col-md-6 mb-2">
                <label for="nom" autofocus="true"  class=" text-xs text-muted_ text-dark">Nom de famille (*)</label>
                <input  :disabled="form.processing"  type="text" :class="[$page.props.errors.nom ?'is-invalid':'is-valid_']" class="form-control  form-controle-sm text-sm" v-model="form.nom" id="nom" placeholder="Votre nom de famille"  required="">
                 <div v-if="$page.props.errors.nom" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.nom }}
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <label for="nom" autofocus="true"  class=" text-xs text-muted_ text-dark">Prénoms (*)</label>
                <input  :disabled="form.processing"  type="text" :class="[$page.props.errors.prenom ?'is-invalid':'is-valid_']" class="form-control  form-controle-sm text-sm" v-model="form.prenom" id="prenom" placeholder="Votre prénom"  required="">
                 <div v-if="$page.props.errors.prenom" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.prenom }}
                </div>
              </div>
               <div class="col-md-6 mb-2">
                <label for="nom" autofocus="true"  class=" text-xs text-muted_ text-dark">Lieu de résidence (*)</label>
                <input  :disabled="form.processing"  type="text" :class="[$page.props.errors.lieu ?'is-invalid':'is-valid_']" class="form-control  form-controle-sm text-sm" v-model="form.lieu" id="prenom" placeholder="Votre lieu de résidence"  required="">
                 <div v-if="$page.props.errors.lieu" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.lieu }}
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <label for="country" class=" text-xs text-muted_ text-dark">Sexe (*)</label>
                <select  :disabled="form.processing"  v-model="form.sexe" :class="[$page.props.errors.sexe ?'is-invalid':'is-valid_']" class="form-select d-block  form-controle-sm w-100 text-sm" id="sexe" required="">
                  <!--option  value="" >Choisir sexe...</option-->
                  <option value="M">Masculin</option>
                  <option value="F">Féminin</option>
                </select>
                 <div v-if="$page.props.errors.sexe" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.sexe }}
                </div>
              </div>
              <!--div class="col-md-6 mb-2">
                <label for="country" class=" text-xs text-muted_ text-dark">Pays (*)</label>
                <select  :disabled="form.processing"  v-model="form.pays" :class="[$page.props.errors.pays ?'is-invalid':'is-valid_']" class="form-select d-block  form-controle-sm w-100 text-sm" id="country" required="">
                  <option v-if='pays' value="" >Choisir le pays...</option>
                  <option v-for="p in pays" :key="p" :value="p.id">{{ p.nom_fr_fr }}</option>
                </select>
                 <div v-if="$page.props.errors.pays" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.pays }}
                </div>
              </div-->

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
                <label for="tel" class=" text-xs text-muted_ text-dark">Téléphone (*)</label>
                <input  :disabled="form.processing"  type="text" :class="[$page.props.errors.tel ?'is-invalid':'is-valid_']" v-model="form.tel" class="form-control form-controle-sm text-sm" id="tel" placeholder="+229 96 77 00 00"  >
                 <div v-if="$page.props.errors.tel" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.tel }}
                </div>
              </div>
             
               <div class="col-md-6 mb-2">
                 <label for="country" class=" text-xs text-muted_ text-dark">Domaine choisi (*)</label>
                <select  :disabled="form.processing"  v-model="form.domaine" :class="[$page.props.errors.domaine ?'is-invalid':'is-valid_']" placeholder="Choisir sexe..." class="form-select d-block  form-controle-sm w-100 text-sm" id="domaine" required="">
                  <option value="SECRETARIAT">Rédaction Web & Secrétariat</option>
                  <option value="DESIGN-COMMUNICATION">Design & Communication</option>
                  <option value="DEVELOPPEMENT-WEB">Développement d'Application Web</option>
                  <option value="DEVELOPPEMENT-MOBILE">Développement d'Application Mobile</option>
                </select>
                 <div v-if="$page.props.errors.domaine" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.domaine }}
                </div>
              </div>
              <div class="col-md-6 mb-2">
                 <label for="country" class=" text-xs text-muted_ text-dark">Durée du stage  (*)</label>
                <select  :disabled="form.processing"  v-model="form.duree" :class="[$page.props.errors.domaine ?'is-invalid':'is-valid_']" class="form-select d-block  form-controle-sm w-100 text-sm" id="duree" placeholder="Choisir un domaine..." required="">
                  
                  <option value="2">Deux (02) mois</option>
                  <option value="3">Trois (03) mois</option>
                  <option value="4">Quatre (04) mois</option>
                  <option value="5">Cinq (05) mois</option>
                  <option value="6">Sixe (03) mois</option>
                </select>
                 <div v-if="$page.props.errors.domaine" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.duree }}
                </div>
              </div>
               <div class="group-forms group-file-inputs component-form-file-input" id="component-shot">
                  <div class="">
                  <label class="text-xs text-muted_ text-dark" for="cfichier_">Curriculum Vitae CV (Taille  &lt; 2Mo)</label>
                  <input  :disabled="form.processing"  type="file" class="form-control form-control-sm bg-white mb-2"   @change="pickFileCV($event)" id="fichier_cv" />
                  </div>
                  <div v-if="$page.props.errors.fichier_cv" class="text-danger py-1 text-xs">
                      {{ $page.props.errors.fichier_cv }}
                  </div>
              </div>
              <div class="group-forms group-file-inputs component-form-file-input" id="component-shot">
                  <div class="">
                  <label class="text-xs text-muted_ text-dark" for="cfichier_">Lettre de motivation (Taille  &lt; 2Mo)</label>
                  <input  :disabled="form.processing"  type="file" class="form-control form-control-sm bg-white mb-2"   @change="pickFileMotiv($event)" id="fichier_motivation" />
                  </div>
                  <div v-if="$page.props.errors.fichier_cv" class="text-danger py-1 text-xs">
                      {{ $page.props.errors.fichier_motivation }}
                  </div>
              </div>
              <div class="col-md-12 mb-2">
                <label for="tel" class=" text-xs text-muted_ text-dark">Nom et contact de 2 personnes de référence (*):</label>
                <textarea  :disabled="form.processing"  type="text" :class="[$page.props.errors.references ?'is-invalid':'is-valid_']" v-model="form.references" class="form-control form-controle-sm text-sm" id="references" placeholder="1- Nom et prénom +229 96 77 00 00"  ></textarea>
                 <div v-if="$page.props.errors.tel" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.references }}
                </div>
              </div>
              <div class="col-md-12 mb-2">
                <label for="tel" class=" text-xs text-muted_ text-dark">Quelles sont les raisons pour lesquelles vous nous avez choisies (*):</label>
                <textarea  :disabled="form.processing"  type="text" :class="[$page.props.errors.raisons ?'is-invalid':'is-valid_']" v-model="form.raisons" class="form-control form-controle-sm text-sm" id="raisons" placeholder="Décrivez ici, vos raisons"  ></textarea>
                 <div v-if="$page.props.errors.raisons" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.raisons }}
                </div>
              </div>
              <div class="col-md-12 mb-2">
                <label for="tel" class=" text-xs text-muted_ text-dark">Quelles sont vos 3 meilleures compétences (*):</label>
                <textarea  :disabled="form.processing"  type="text" :class="[$page.props.errors.competences ?'is-invalid':'is-valid_']" rows="4" v-model="form.competences" class="form-control form-controle-sm text-sm" id="competences" placeholder="1- Compétence en ..."  ></textarea>
                 <div v-if="$page.props.errors.competences" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.competences }}
                </div>
              </div>

            </div>
        <!--/div>
        <div class="bg-white p-md-5 p-2 p-xl-6 shadow-2 border-1 shadow-sm mt-4"-->
          

           
            <div class="mt-8 text-center">
            <jet-button @click="saveService" 
                    class="btn bg-gray-800 text-white d-block d-sm-inline shadow-sm" type="submit"
                    :class="{ 'text-white-50': form.processing }"
                    :disabled="form.processing"
                    :loading="form.processing"
                    > Soumettre ma demande <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
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
        prenom: null,
        email: null,
        domaine: null,
        tel: null,
        duree: null,
        fichier_cv: null,
        fichier_motivation: null,
        references: null,
        raisons: null,
        competences: null,
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
           this.$inertia.post(this.route("stage.send"), this.form, {
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
         this.form.nom = null;
         this.form.domaine = null;
         this.form.email = null;
         this.form.tel = null;
         this.form.references = null;
         this.form.raisons = null;
         this.form.competences = null;
         this.form.fichier_cv = null;
         this.form.fichier_motivation = null;
         this.form.processing= false
      },
    pickFileCV(e) {
        const file = event.target.files[0]
        this.form.fichier_cv = file;

    },
    pickFileMotiv(e) {
        const file = event.target.files[0]
        this.form.fichier_motivation = file;

    }
  },
  /*props:['pays','services']*/
};
</script>
