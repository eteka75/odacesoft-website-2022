<template>
  <Header menu="Accueil"/>
  <Head>
    <title>A propos • Odacesoft</title>
        <meta head-key="description" name="description" content="Découvrez qui nous sommes, nos rêves et nos ambitions pour contribuer à l'émergence de notre continent." />
  </Head>
  <cover-layout>

    <div class="container-lg max-w-screen-xl">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 text-md-center">
          <div class="py-10 py-md-16 py-xl-20">
            <h1 class="lh-tight ls-tight display-4 mb-8">
            A propos
            </h1>
            <p class="text-lg  px-lg-16 px-xl-24 text-muted">
             Lodit alias fuga nobis. Inventore odio quos, voluptatem voluptas illo quod. 🔥
            </p>
          </div>
        </div>
      </div>
    </div>
    <section class="wrapper bg-yellow-50 ">
			<div class="container py-14 pt-md-17 pb-md-19">
				<div class="row gx-lg-8 gx-xl-12 gy-10 gy-lg-0 mb-lg-n3">
					<div class="col-lg-4">
						<h3 class="display-4 mb-3 pe-xl-15">We are proud of our works</h3>
						<p class="lead fs-lg mb-0 pe-xxl-10">We bring solutions to make life easier for our customers.</p>
					</div>
					<!-- /column -->
					<div class="col-lg-8 mt-lg-2">
						<div class="row align-items-center counter-wrapper gy-6 text-center">
							<div class="col-md-4">
								<img src="src/img/icons/check.svg"  class="svg-inject w-20 icon-svg icon-svg-md text-primary mb-3" alt="">
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
