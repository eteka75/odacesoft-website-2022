<template>

     <!--Head>
      <title>{{ title }} </title>
      <meta
        head-key="description"
        name="description"
        content="Les articles du blog."
      />
      <meta property="og:url" :content="p_url" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              :content="titre" />
    <meta property="og:description"        :content="p_description" />
    <meta property="og:image"              :content="p_image" />
    </Head-->
  <div id="topheader">
    <div class="menu-top pt-5 pb-3 bg-white px-lg-8 border-bottom">
      <div class="row align-items-center">
        <div class="col-md-6 col-12 mb-3 mb-md-0">
          <!-- Title -->
          <h1 class="h3 m-xs-5 my-xs-10 mb-0 ls-tight">{{ titre }}</h1>
        </div>
        <!-- Actions -->
        <div class="col-md-6 col-12 text-md-end">
          <div class="mx-n1">
            <slot name="btn" />
          </div>
        </div>
      </div>
    </div>
    <div class="mx-5 mt-4 mx-lg-8 mb-4">
   
        <!--jet-validation-errors class="mb-3" /
          <flash-messages />
        -->
    </div>
  </div>
</template>
<script>
import FlashMessages from "@/Components/FlashMessages";
import JetValidationErrors from "@/Jetstream/ValidationErrors";

import { Head } from "@inertiajs/inertia-vue3";
export default {
   components: {
    FlashMessages,
    JetValidationErrors,
  },
   metaInfo() {
        return {
            title: 'OK',
            meta: [
                { name: 'description', content: 'Connect and follow ' + this.userData.name + ' on Epiloge - ' + this.userData.tagline},
                { property: 'og:title', content: this.userData.name + ' - Epiloge'},
                { property: 'og:site_name', content: 'Epiloge'},
                { property: 'og:description', content: 'Connect and follow ' + this.userData.name + ' on Epiloge - ' + this.userData.tagline},
                {property: 'og:type', content: 'profile'},
                {property: 'og:url', content: 'https://epiloge.com/@' + this.userData.username},
                {property: 'og:image', content: this.aws_url + '/users/' + this.userData.profileurl + '-main.jpg' }
            ]
        }
    },
  props: {
    titre: {
      type: String,
      default: "Tableau de bord",
    },
    p_description: {
      type: String,
      default: "Odacesoft est une agence d'ingénierie informatique à Parakou, Bénin",
    },
  },
};
</script>

