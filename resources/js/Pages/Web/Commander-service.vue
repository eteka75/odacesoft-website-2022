<template>
  <Header menu="Produits"/>
   <Head>
    <title>Nos produits et services • Odacesoft</title>
    <meta head-key="description" name="description" content="Découvrez nos produits et services pour faire décoller vos affaires grâce aux digital." />
  </Head>
  <cover-layout>
    <div class="bg-yellow-100">
    <div class="container-lg max-w-screen-xl">
      <div class="row">
        <div class="col-md-12   col-lg-12 col-xl-12 text-md-center">
          <div class="py-6 py-md-16 py-xl-20 pb-xl-40  pb-md-30">
            <h1 class="lh-tight ls-tight display-5 mb-">
             Commander un <span class="text-danger"> service ...</span>
            </h1>
            <p class="lead  text-dark mb-5">Décrivez en quelques lignes ce que vous voulez.<br> Nous nous chargerons de vous contacter pour finaliser la commande.</p>

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

      <div class=" mt-4 mt-lg-n40  mb-24">
        <div class="px-lg-8 py-4 pb-lg-10 pt-lg-8 px-2 card shadow-2 rounded-4">
    <form  method="post" >

          <h4 class=" text-cenetr mb-4">Détails sur la commande</h4>
            <div class="row">

              <div class="col-md-6 mb-2">
                <label for="nom" autofocus="true"  class=" text-xs text-muted">Nom complet (Personne/Entreprise) (*)</label>
                <input  :disabled="form.processing"  type="text" :class="[$page.props.errors.nom_auteur ?'is-invalid':'is-valid_']" class="form-control  form-controle-sm text-sm" v-model="form.nom_auteur" id="nom" placeholder=""  required="">
                 <div v-if="$page.props.errors.nom_auteur" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.nom_auteur }}
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <label for="country" class=" text-xs text-muted">Pays (*)</label>
                <select  :disabled="form.processing"  v-model="form.pays" :class="[$page.props.errors.pays ?'is-invalid':'is-valid_']" class="form-select d-block  form-controle-sm w-100 text-sm" id="country" required="">
                  <option v-if='pays' value="" >Choisir le pays...</option>
                  <option v-for="p in pays" :key="p" :value="p.id">{{ p.nom_fr_fr }}</option>
                </select>
                 <div v-if="$page.props.errors.pays" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.pays }}
                </div>
              </div>

            </div>
            <div class="row">
            <div class="col-md-6 mb-2">
                <label for="email" class=" text-xs text-muted">Email (*)</label>
                <input  :disabled="form.processing"  type="text" v-model="form.email" :class="[$page.props.errors.email ?'is-invalid':'is-valid_']" class="form-control form-controle-sm text-sm" id="email" placeholder="email@domaine.com"  required="">
                 <div v-if="$page.props.errors.email" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.email }}
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <label for="tel" class=" text-xs text-muted">Téléphone</label>
                <input  :disabled="form.processing"  type="text" :class="[$page.props.errors.tel ?'is-invalid':'is-valid_']" v-model="form.tel" class="form-control form-controle-sm text-sm" id="tel" placeholder="+229 96 77 00 00"  >
                 <div v-if="$page.props.errors.tel" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.tel }}
                </div>
              </div>

            </div>
        <!--/div>
        <div class="bg-white p-md-5 p-2 p-xl-6 shadow-2 border-1 shadow-sm mt-4"-->
            <div class="row">
             <div class="col-md-10 mb-2">
                <label for="titre" class=" text-xs text-muted">Titre de la commande (*)</label>
                <input  :disabled="form.processing"  type="text" v-model="form.nom_commande" :class="[$page.props.errors.nom_commande ?'is-invalid':'is-valid_']" class="form-control form-controle-sm text-sm" id="titre" placeholder="ex: Commande de site web pour mon entreprise"  required="">
                 <div v-if="$page.props.errors.nom_commande" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.nom_commande }}
                </div>
              </div>
             <div class="col-md-2 mb-2">
                <label for="titre" class=" text-xs text-muted">Quatité</label>
                <input  :disabled="form.processing"  type="number" v-model="form.quantite" :class="[$page.props.errors.quantite ?'is-invalid':'is-valid_']" class="form-control form-controle-sm text-sm" id="titre" placeholder="ex: Commande de site web pour mon entreprise"  required="">
                 <div v-if="$page.props.errors.quantite" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.quantite }}
                </div>
              </div>
             <div class="col-md-6 mb-2">
                <label for="type" class=" text-xs text-muted">Type de service (*)</label>
                <select  :disabled="form.processing"  v-model="form.type"  v-if='services' :class="[$page.props.errors.type ?'is-invalid':'is-valid_']" class="form-select d-block w-100" id="type" required="">
                  <option  value="">Choisir un type de service...</option>
                  <option v-for='s in services' :key="s" :value='s.id'>{{s.title}}</option>
                </select>
                 <div v-if="$page.props.errors.type" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.type }}
                </div>
              </div>
              <div class="col-md-3 mb-2">
                <label for="pmini" class=" text-xs text-muted">Prix minimum</label>
                <input  :disabled="form.processing"  type="text" v-model="form.prix_min" :class="[$page.props.errors.prix_min ?'is-invalid':'is-valid_']"  class="form-control form-controle-sm text-sm" id="pmini" placeholder="5000F"  >
                <div v-if="$page.props.errors.prix_min" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.prix_min }}
                </div>
              </div>
              <div class="col-md-3 mb-2">
                <label for="pmax" class=" text-xs text-muted">Prix maximum</label>
                <input  :disabled="form.processing"  type="text" v-model="form.prix_max" :class="[$page.props.errors.prix_max ?'is-invalid':'is-valid_']" class="form-control form-controle-sm text-sm" id="pmax" placeholder="80.000.000F" >
                 <div v-if="$page.props.errors.prix_max" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.prix_max }}
                </div>
              </div>
              <div class="col-md-12 mb-2">
                <label for="description" class=" text-xs text-muted">Description du service (*)</label>
                <textarea  :disabled="form.processing"  class="form-control" v-model="form.description"  id="description" :class="[$page.props.errors.description ?'is-invalid':'is-valid_']" placeholder="Décrivez ce que vous voulez ici" rows="4"  required></textarea>
                 <div v-if="$page.props.errors.description" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.description }}
                </div>
              </div>
            </div>

            <div class="group-forms group-file-inputs component-form-file-input" id="component-shot">
                <div class="">
                <label class="form-label" for="cfichier">Fichier décrivant le service demandé (Taille  &gt; 2Mo)</label>
                <input  :disabled="form.processing"  type="file" class="form-control bg-white mb-2"   @change="pickFile($event)" id="cfichier" />
                </div>
                <div v-if="$page.props.errors.fichier" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.fichier }}
                </div>

            </div>
            <h6 class="">Mode de payement</h6>

            <div class="d-flex my-2">
            <div class="custom-control custom-radio  me-4">
                <input  :disabled="form.processing"  v-model="form.mode_payement"  value="ESPECE" id="debit" name="paymentMethod"  :class="[$page.props.errors.mode_payement ?'is-invalid':'is-valid_']" type="radio" class="custom-control-input" checked=""  required="">
                <label class="custom-control-label ms-2" for="debit">En espèce </label>
              </div>
              <div class="custom-control custom-radio me-4">
                <input  :disabled="form.processing"  v-model="form.mode_payement" value="MOBILE-MONEY" id="credit" name="paymentMethod" :class="[$page.props.errors.mode_payement ?'is-invalid':'is-valid_']" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label ms-2" for="credit"> Par Mobile Money</label>
              </div>

              <div class="custom-control custom-radio  me-4">
                <input  :disabled="form.processing"  v-model="form.mode_payement" value="BITCOIN" id="paypal" name="paymentMethod"  :class="[$page.props.errors.mode_payement ?'is-invalid':'is-valid_']" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label ms-2" for="paypal">Par Bitcoin</label>
              </div>
            </div>
            <div>
            <div v-if="$page.props.errors.mode_payement" class="text-danger py-1 text-xs">
                    {{ $page.props.errors.mode_payement }}
                </div>
            </div>
            <div class="text-xs text-muted">* Après avoir soumis votre commande, vous recevrez un code par email qui vous permettra de la suivre de bout en bout.</div>
            <div class="mt-8">
            <jet-button @click="saveService"
                    class="btn btn-success d-block shadow-sm" type="submit"
                    :class="{ 'text-white-50': form.processing }"
                    :disabled="form.processing"
                    :loading="form.processing"
                    >  Lancer ma commande <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
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
        nom_auteur: null,
        pays: 59,
        email: null,
        nom_commande: null,
        type: "",
        tel: null,
        prix_min: null,
        prix_max: null,
        description: null,
        quantite: 1,
        fichier: null,
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
           this.$inertia.post(this.route("commande.send"), this.form, {
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
