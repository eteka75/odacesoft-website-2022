<template>
  <Header menu="Accueil"/>
   <Head>
    <title>Statut de la demande de stage • Odacesoft</title>
    <meta head-key="description" name="description" content="Découvrez nos produits et services pour faire décoller vos affaires grâce aux digital." />
  </Head>
  <cover-layout>
    <div class="bg-gray-800">
    <div class="container-lg max-w-screen-xl">
      <div class="row">
        <div class="col-md-12   col-lg-12 col-xl-12 text-md-center">
          <div class="py-6 py-md-16 py-xl-20 pb-xl-40  pb-md-30">
            <h1 class="lh-tight text-white ls-tight display-5 mb-">
             Etat de votre <span class="text-white-50"> demande de stage</span>
            </h1>
            <p class="lead col-12 col-md-8 text-sm col-xl-6 mx-auto  text-white-80 mb-5">Renseignez le code qui vous a été fourni lors de la soumission de votre demande de stage et cliquez sur le bouton de vérification.</p>

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
        <div class="col-md-6 col-xxl-5 mx-auto ">

      <div class="  mt-4 mt-lg-n20 mt-xl-n40  mb-24">
        <div class="px-lg-8 py-4 pb-lg-10 pt-lg-8 px-sm-3 px-md-8 my-md-8 bg-sm-white shadow-md-2 rounded-4">
    <form  method="post" @submit.prevent="saveService"  >

          <h4 class=" text-cenetr mb-4 text-center">Code de la demande de stage</h4>
            <div class="row">
              <div class="col-md-12 mb-2">
                 <input  :disabled="form.processing"  type="text" :class="[$page.props.errors.code ?'is-invalid':'is-valid_']" class="form-control text-center form-controle-sm text-sm" v-model="form.code" id="code" placeholder="Saisir le code de la demande de stage (ex:A1GSOZA)"  required="">
                 <div v-if="$page.props.errors.code" class="text-danger text-center py-1 text-xs">
                    {{ $page.props.errors.code }}
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
        code: null,
      }),
    };
  },
  methods:{
      saveService:function(){
           this.form.processing= true;
           this.$inertia.post(this.route("stage.statut"), this.form, {
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
         this.form.code = null;
      },
  },
  /*props:['pays','services']*/
};
</script>
