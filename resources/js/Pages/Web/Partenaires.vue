<template>
   <Header menu="Partenaires"/>
   <Head>
    <title>Nos partenaires • Odacesoft</title>
    <meta head-key="description" name="description" content="Odacesoft est une entreprise informatique spécialisée dans l'ingénierie Informatique et l'incubation d'idées innovantes." />
  </Head>
  <cover-layout>
  <div id="services-partenaires" >
      <div class="container max-w-screen-xl">
         <div class="row">
          <div class="col-md-12 text-center align-items-baseline col-xl-12">
            <div class="pt-6 pb-8  pt-xl-20 pb-xl-8">
              <h1 class="lh-tight text-white ls-tight tb-shadow display-5 mt-16 mb-1">
             Nos partenaires
              </h1>
              <p class="text-lg  text-white px-lg-56 px-md-30 tb-shadow">
                Pour mieux réussir dans votre prochain projet, notre coup de main pourra changer positivement vos résultats.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-gray-100 py-8">
    <div class="container-lg max-w-screen-xl">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 text-md-center">
          <div v-if="datas" id="o-patrtenaires" class="row row-cols-2 mt-3 row-cols-md-4 gx-2 gx-md-8 gx-xl-12 gy-12">

            <div v-for="p in datas.data" :key="p" class="bg-white shadow-sm  border-end text-center border-top px-6 me-xl-3me-1 py-3 mt-0 mb-0 col">

                    <figure :title="p.nom" class="px-3 px-md-0 px-xxl-2"><a v-if="p.url!=null" :href="p.url" target="_blanck">
                    <img :src="p.url_logo" :alt="p.nom">
                    </a>
                    <span v-else>
                            <img :src="p.url_logo" :alt="p.nom">
                    </span>

                    </figure>
            </div>
            </div>
        </div>
        <div v-if="datas" class="col-md-12 py-4 mx-auto text-center">
            <pagination class="mt-6 justify-content-center" :links="datas.links" />
        </div>
      </div>
    </div>
    </div>
    <section class="wrapper image-wrapper bg-auto py-8 no-overlay bg-gray-800 text-white text-center bg-map" data-image-src="src/img/map.png">
			<div class="container pt-0 pb-14 pt-md-16 pb-md-18">
				<div class="row">
					<div class="col-lg-10 col-xl-9 col-xxl-8 mx-auto">
						<h2 class="fs-15 text-uppercase text-white opacity-70 text-sm mb-3">Rejoignez notre communauté</h2>
						<h3 class="display-5 mb-8 px-lg-12 text-white">Nous avons le soutiens de plus de 500+ clients et partanaires.</h3>
                        <p class="fs-15 text-uppercases text-lg h3 text-light text-white placeholder-opacity-70  mb-3">Rejoingnez-nous maintenant pour grandir et faire grandir vos business.</p>
                        <div class="my-4 text-center"> <inertia-link class="btn btn-primary  rounded-5 my-5" :href="route('contact')"> Contactez-nous</inertia-link></div>
					</div>
					<!-- /.row -->
				</div>
				<!-- /column -->
				<div class="row">
					<div class="col-md-10 col-lg-10 col-xl-7 mt-8 mx-auto">
						<div class="row align-items-center counter-wrapper gy-4 gy-md-0">
							<div class="col-md-4 text-center">
								<h3 class="counter counter-lg display-4 text-success">05+</h3>
								<p>Projects en cours</p>
							</div>
							<!--/column -->
							<div class="col-md-4 text-center">
								<h3 class="counter counter-lg display-4 text-danger">800+</h3>
								<p>Clients satisfaits</p>
							</div>
							<!--/column -->
							<!--/column -->
							<div class="col-md-4 text-center">
								<h3 class="counter counter-lg display-4 text-warning">12+</h3>
								<p>Experts à votre écoute</p>
							</div>
							<!--/column -->
						</div>
						<!--/.row -->
					</div>
					<!-- /column -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</section>
  </cover-layout>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
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
  props:['datas']
};
</script>
<style scoped>
   #services-partenaires{
    background:url('../../../../public/storage/assets/web/image/fond-partenaires.jpg') #111 no-repeat;
    background-position: 0% 0%;
  background-size: 100% auto;
 }
@media screen and (min-width:800px) {
  #services-partenaires{
  min-height: 350px;
  }
}

</style>
