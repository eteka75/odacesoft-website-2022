<template>
  <Header menu="Home"/>
  <Head>
    <title>A propos • Odacesoft</title>
        <meta head-key="description" name="description" content="Découvrez qui nous sommes, nos rêves et nos ambitions pour contribuer à l'émergence de notre continent." />
  </Head>
  <cover-layout>

    <section class="bg-fade-light bg-fade-bottom py-4">

    <div class="container-lg max-w-screen-xl">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 text-center">
        <ul class="breadcrumb  list-inline text-xs text-muted">
                  <li class="list-inline-item"> <a :href="route('accueil')" class="text-muted" title="Odacesoft"><i class="fas fa-home"></i> Accueil </a></li>
              <li  class="list-inline-item">A propos</li>
          </ul>
          <div class="py-10 py-md-12 py-xl-10">
            <h1 class="lh-tight ls-tight display-4 mb-0">
              Qui sommes nous ?
            </h1>
            <p
              class="
                text-lg_
                px-lg-16 px-xl-24
                lead
                col-md-8 mx-auto font-light_
                mx-center
                text-muted
              "
            >
              Derrière nos offres se cache une histoire, une vission, une mission déclinés en plusieurs objectifs
            </p>

          </div>
        </div>
      </div>

    </div>
    </section>
    <section class="wrapper bg-yellow-50 ">
        <div class='container'>
            <div class='row'>
                <div v-if="data" class='col-md-12'>
                    {{ data }}
                </div>
            </div>
        </div>
    </section>
    <section class="wrapper d-none bg-yellow-50 ">
			<div class="container py-14 pt-md-17 pb-md-19">
				<div class="row gx-lg-8 gx-xl-12 gy-10 gy-lg-0 mb-lg-n3">
					<div class="col-lg-4">
						<h3 class="display-2 mb-3 pe-xl-15">Nous sommes fiers de contribuer à la création de la valeur</h3>
						<p class="lead fs-lg mb-0 pe-xxl-10">Nous apportons des solutions réelles afin de rendre la vie facile à notre communauté.</p>
					</div>
					<!-- /column -->
					<div class="col-lg-8 mt-lg-2">
						<div class="row align-items-center counter-wrapper gy-6 text-center">
							<div class="col-md-4">
								<img src="/src/img/icons/check.svg"  class="svg-inject w-20 icon-svg icon-svg-md text-primary mb-3" alt="">
								<h3 class="counter">7518</h3>
								<p>Completed Projects</p>
							</div>
							<!--/column -->
							<div class="col-md-4">
								<img src="src/img/icons/user.svg" class="svg-inject  w-20 icon-svg icon-svg-md text-primary mb-3" alt="">
								<h3 class="counter">3472</h3>
								<p>Happy Customers</p>
							</div>
							<!--/column -->
							<div class="col-md-4">
								<img src="src/img/icons/briefcase-2.svg" class="svg-inject   w-20 icon-svg icon-svg-md text-primary mb-3" alt="">
								<h3 class="counter">2184</h3>
								<p>Expert Employees</p>
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
};
</script>
