<template>
  <Header menu="Contacts" />
  <Head>
    <title>Message envoyé • Odacesoft</title>
    <meta
      head-key="description"
      name="description"
      content="Contactez nous par email, par Whatsapp, sur les réseaux socieux ou envoyez-nous un message."
    />
  </Head>
  <cover-layout>


    <div class=" bg-surface-secondary min-h">
    <div class="container-lg  max-w-screen-xl">
      <div class="row">
        <div class="col-md-9 col-lg-8 col-xl-8 mx-auto ">

          <div class="pt-10 pt-md-16 pt-xl-20">

            <div
              class="group-cards group-profile-cards component-card-profile-1"
              id="component-shot"
            >
            <form method="post" @submit.prevent="contacter">
              <div class="card mx-autoshadow-sm shadow-1 mb-12 border-2border-success mb-xl-20">
                <div class="card-body">
                  <!-- Stats -->

                  <div>
                    <div class="d-flex">
                    <div class="col-1">

                    </div>
                    <div class='col-10 text-center'>
                    {{ data }}
                    {{ msg }}
                    <img class='img-responsi mx-auto' src='./../../../../public/storage/assets/web/image/after-contact.jpg'>
                    <h4 class="text-success">  <i class='fa fa-check'></i> Votre message a été envoyé avec succès !</h4>
                    <p class="text-muted lead">Notre service client vous contactera par email ou par téléphone dans les heures qui suivent afin de prendre en compte, votre préoccupation. </p>
                    <div class="font-serif font-bold text-danger mt-3"><i>Merci pour la fidélité.</i></div>
                    <p class="mt-3 text-xs text-muted">Odacesoft, pour créer des possibilités !</p>
                    </div>
                    </div>
                  </div>
                </div>
              </div>


            </form>
                <div class="mt-3 text-center mb-18">
                    <inertia-link class=" btn btn-primary bg-gray-800 btn-lg" :href="route('accueil')"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Retour à l'accueil </inertia-link>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

  </cover-layout>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
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
  props:['data','msg'],
data(){
    return{
    };
},
  methods: {
      contacter:function(){
          alert('')
        this.$inertia.post(this.route("contacter"), this.form, {
          forceFormData: true,
        });
    }
  }
};
</script>
<style scoped>

  #services-contact{
    background:url('../../../../public/storage/assets/web/image/fond-contact-clients.jpg') #111 no-repeat;
    background-position: 0% 0%;
  background-size: 100% auto;
 }
@media screen and (min-width:800px) {
  #services-contact{
  min-height: 350px;
  }
}
#carte{height:750px;margin-top:-325px}
</style>
