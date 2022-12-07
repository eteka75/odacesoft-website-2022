<template>
  <!--Head>
    <title>Odacesoft, pour créer des possibilités dans le numérique en Afrique</title>
    <meta head-key="description" name="description" content="Odacesoft est une entreprise informatique spécialisée dans l'ingénierie Informatique et l'incubation d'idées innovantes." />
  </Head-->
  <Header menu="Home"/>


    <div class="d-flex flex-grow-1">
      <div class="w-full">
        <section
          class="
            pt-10
            bg-danger-fun
            pb-5 pb-md-8 pb-xxl-16
            py-md-20
            position-relative
            overflow-hidden
          "
        >
          <div class="container-lg">
            <div class="row">
              <div class="col-md-6">
                <h1 class="lh-tight ls-tight display-5 mb-7">
                  Avez-vous un rêves ?
                  <span class="d-inline-flex text-gray-300 position-relative">
                    <span class="position-relative text-danger"
                      >Concrétisons là !</span
                    >
                  </span>
                </h1>
                <p class="text-dark lead font-regular mb-7 mb-md-10 pe-lg-14">
                  Des millions de personnes réalisent leurs rêves à travers le monde en partant de
                  rien. Notre rêves à nous, est de vous aider à réaliser la votre. Pour y arriver, nous y mettons les moyens nécessaires.
                </p>
                <div class="py-2">
                  <inertia-link
                    class="
                      btn btn-danger btn-xs-block
                      mr-1
                      mb-2
                      text-white
                      shadow-sm
                      font-weight-bold
                      border border-1
                      rounded-lg
                    "
                    :href="route('commander.service')"
                  >
                    Commander un service <i class="far fa-shopping-cart"></i
                  ></inertia-link>
                  <inertia-link
                    class="
                      btn btn-white
                      mb-2
                      mx-md-2 mx-xl-5
                      btn-xs-block
                      rounded-lg
                      border
                      shadow-sm
                    "
                    :href="route('services')"
                    >En savoir plus -></inertia-link>
                  <div class="text-xs text-dark">
                    * Commandez au moins 2 services pour bénéficier de
                    réductions allant de 10 à 25%.
                  </div>
                </div>
                <div class="py-2 row mt-8">
                  <div class="flex-fill">
                    <span class="font-sm-bold -dark text-dark no-wr"
                      >Les plus commandés:
                    </span>
                  </div>
                  <div v-if="services" class="flex-fill mx-n1">

                    <a href="#"   v-for='s in services' data-toggle="modal" data-target="#exampleModal"
                      ><span
                        class="
                          badge
                          rounded-3
                          mb-1
                          text-dark
                          border border-black
                          mx-1
                        " @click="alert('OK')"
                        >{{ s.title }}</span
                      ></a>
                    <inertia-link
                      href="/commander-un-service/gestion-page-facebook"
                      ><span
                        class="
                          badge
                          rounded-3
                          mb-1
                          text-dark
                          border border-black
                          mx-1
                        "
                        >Gestion de page Facebook</span
                      ></inertia-link
                    >
                    <inertia-link href="/commander-un-service/badges"
                      ><span
                        class="
                          badge
                          rounded-3
                          mb-1
                          text-dark
                          border border-black
                          mx-1
                        "
                        >Badges</span
                      ></inertia-link
                    >
                    <inertia-link
                      href="/commander-un-service/boostage-vente-facebook"
                      ><span
                        class="
                          badge
                          rounded-3
                          mb-1
                          text-dark
                          border border-black
                          mx-1
                        "
                        >Boostage de vente sur facebbok</span
                      ></inertia-link
                    >
                    <inertia-link href="/commander-un-service/site-web-vitrine"
                      ><span
                        class="
                          badge
                          rounded-3
                          mb-1
                          text-dark
                          border border-black
                          mx-1
                        "
                        >Conception de site web victrine</span
                      ></inertia-link
                    >
                    <inertia-link
                      href="/commander-un-service/logiciel-de-factures-normalises"
                      ><span
                        class="
                          badge
                          rounded-3
                          mb-1
                          text-dark
                          border border-black
                          mx-1
                        "
                        >Logiciels de factures normalisés</span
                      ></inertia-link
                    >
                    <inertia-link href="/commander-un-service/carte-de-visite"
                      ><span
                        class="
                          badge
                          rounded-3
                          mb-1
                          text-dark
                          border border-black
                          mx-1
                        "
                        >Carte de visite</span
                      ></inertia-link
                    >
                    <inertia-link
                      href="/commander-un-service/logiciel-de-factures-normalises"
                      ><span
                        class="
                          badge
                          rounded-3
                          mb-1
                          text-dark
                          border border-black
                          mx-1
                        "
                        >Impression sur bâche</span
                      ></inertia-link
                    >
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="w-xl-12/10 position-relative">
                  <!-- Decorations -->
                  <span
                    class="
                      d-none d-lg-block
                      position-absolute
                      top-0
                      start-0
                      transform
                      translate-x-n32 translate-y-n16
                      w-2/3
                      h-2/3
                      bg-warning
                      opacity-20
                      rounded-circle
                      filter
                      blur-50
                    "
                  ></span>
                  <span
                    class="
                      d-none d-xl-block
                      position-absolute
                      bottom-0
                      end-0
                      transform
                      translate-x-16 translate-y-16
                      w-32
                      h-32
                      bg-warning
                      opacity-60
                      rounded-circle
                      filter
                      blur-50
                    "
                  ></span>
                  <!-- Image -->
                  <img
                    alt="..."
                    src="./../../../../public/storage/assets/web/image/odacesoft-hero.jpg"
                    class="img-fluid rounded-5"
                  />
                </div>
                <!-- <img src="./../../../../public/storage/assets/web/image/team-home-odacesoft.jpg"  class="embed-responsive ml-n3" alt="Nous réalisons vos projets" /> -->
                <!-- <img src="./../../../../public/storage/assets/web/svg/illustration-3.svg"  class="embed-responsive ml-n3" alt="Nous réalisons vos projets" /> -->
              </div>
            </div>
          </div>
        </section>
        <div class="container py-8 py-md-10">
				<div class="row gx-lg-8 gx-xl-12 gy-10 mb-14 mb-md-17 align-items-center">
					<div class="col-lg-6 position-relative order-lg-1_">
						<div class="shape bg-dot primary rellax w-16 h-20" data-rellax-speed="1" style="top: 3rem; left: 5.5rem; transform: translate3d(0px, -473px, 0px);"></div>
						<div class="overlap-grid overlap-grid-2">
							<div class="item">
								<figure class="rounded shadow-lg">

                                    <img src="/storage/assets/web/image/img-qui-somme-nous.jpg"  class="embed-responsive ml-n3" alt="Nous réalisons vos projets" />
                                </figure>
							</div>
						</div>
					</div>
					<!--/column -->
					<div class="col-lg-6">
						<h2 class="display-4 mb-3">Qui sommes nous ?</h2>
						<p class="lead fs-lg font-bold"> Nous sommes une agence d'ingénierie Informatique.
                        Nous réfléchissons sur les problèmes de notre environnement et nous y proposons des solutions. Nous pensons qu'on peut rendre le monde meilleur grâce à la Technologie.</p>
						<p class="mb-6 text-muted text-sm ">Nous aidons personnes et les entreprises à intégrer le numérique dans la mise en oeuvre de leurs chaines de valeur. Notre cible est principalement les enfants, les jeunes et les PME. Notre vision de créer un écosystème basé sur l'usage des outils numériques pour faciliter l'accès
                        à des services vitaux de la société. A travers : </p>
						<div class="row gy-3 font-bold gx-xl-8 text-sm">
							<div class="col-xl-12">
								<ul class="list-unstyled mb-1">
									<li><span><i class="fa fa-check text-success me-2"></i></span><span>La mise en place de solutions (Logiciels, Site Web) ; </span></li>
									<li class="mt-3"><span><i class="fa fa-check text-success me-2"></i></span><span>La mise en place d'un plan de communication éfficace ;</span></li>
								</ul>
							</div>
							<div class="col-xl-12">
								<ul class="list-unstyled mb-3">
									<li><span><i class="fa fa-check text-success me-2"></i></span><span>Le renforcement de capacités des jeunes et acteurs du numérique ;</span></li>
									<li class="mt-3"><span><i class="fa fa-check text-success me-2"></i></span><span> L'incubations des projtes innovants.</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				</div>



        <section v-if="pageMVV" class="bg-surface-secondary  py-8 py-xl-15">
        <div class="container">
        <div class="row gx-lg-8 gx-xl-12 gy-6 mb-14mb-md-18">

					<div v-for="(page,i) in pageMVV" :key="page" class="col-lg-4">
						<div class="d-flex flex-row">
							<div>
								<div class="icon btn btn-circle disabled btn-soft-primary me-4"> <span class="number fs-18">{{i+1}}</span> </div>
							</div>
							<div>
								<h4>{{ page.title }} </h4>
								<p class="mb-2 text-sm">{{ liveSubstr(page.resume,0,1000) }}</p>
                                <!--inertia-link :href="route('apropos-de',page.slug)" class=" text-sm mt-2 text-dark font-bold">La suite -></inertia-link-->
							</div>
						</div>
					</div>
				</div>
        </div>
        </section>
        <section class="bg-dark text-white bg-green-100_">
          <div class="py-16 py-md-24 py-lg-32 position-relative">
            <div class="container-lg max-w-screen-xl">
              <!-- Title -->
              <div class="row align-items-center mb-16">
                <div
                  class="col-12 col-md-10 col-lg-10 mx-lg-auto text-lg-center"
                >
                  <section>
                    <h1 class="lh-tight text-white ls-tight display-4 mb-8">
                      Nos domaines d'expertises pour <br> vous
                      <span class="text-warning">aider</span> à
                      <span class="text-dangers">atteindre</span>
                      <span class="text-success"> vos buts.</span>
                    </h1>

                    <p class="text-lg px-lg-32">
                      Nous ne nous engageons dans le fourniture d'un service que
                      si nous en avons les moyens. Chaque service est fourni à
                      360° afin de vous garantir une meilleure expérience
                      avec nous.
                    </p>
                  </section>
                </div>
              </div>

              <!-- Content -->
              <div v-if="cat_services" data-masonry='{"percentPosition": true }' class="row g-7 g-lg-7">
                <div v-for="c in cat_services" :key="c" class="col-12 col-md-6 col-lg-4">
                  <div class="card border-0 shadow-4 shadow-6-hover mb-4 scard">
                    <div class="p-5 p-md-5 p-xl-10">
                      <section>
                        <header>
                          <div
                            class="
                              icon icon-xl
                              svg-current
                              text-success
                              mb-8
                              mx-n2
                            "
                          >
                            <img :src="c.img" :alt="c.title" />
                          </div>

                          <h1 class="h3 mb-4">{{ c.title }}</h1>
                        </header>

                        <!-- Text -->
                        <p class="text-muted text-sm mb-5">
                         {{c.lead}}
                        </p>

                        <footer>
                          <a
                            :href="route('cat-service',c.slug)"
                            class="font-semibold link-primary stretched-link"
                            >Plus d'infos -></a
                          >
                        </footer>
                      </section>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>

        <section>
          <div class="pb-10 pb-lg-26 pt-lg-32">
            <div class="container-xl max-w-screen-xl">
              <div class="row align-items-center">
                <div class="col-lg-5 order-lg-2 offset-lg-1 mb-10 mb-lg-0">
                  <h5 class="text-uppercase text-muted mt-6 mb-3">
                    L'équipe
                  </h5>

                  <!-- Heading -->
                  <h1 class="lh-tight ls-tight display-5 mb-7">
                    Une équipe de jeunes passionnées, pour
                    <span class="d-inline-flex text-warning position-relative">
                      <span
                        aria-hidden="true"
                        class="
                          d-inline
                          position-absolute
                          h-3
                          inset-x-0
                          bottom-0
                          bg-warning
                          -700
                          transform
                          scale-105
                          rounded
                        "
                      ></span>
                      <span class="position-relative"> mieux vous servir </span>
                    </span>
                  </h1>
                  <!-- Text -->
                  <p class="text-lg lead mb-7">
                    La réalisation d'une idée, d'un projet digital qui permet
                    d'atteindre des objectifs de réussite à long terme nécessite
                    des ressources humaines qualifiées et passionnées par ce
                    qu'ils font. Nul n'entre à Odacesoft s'il n'est passionné
                  </p>

                  <div class="d-flex mx-n1 mb-3">
                    <a
                      class="
                        d-inline-block
                        link-warning
                        text-md
                        font-semibold
                        px-2
                        my-2
                        mx-md-2
                        w-full w-md-auto
                      "
                      href="/equipe"
                      >En savoir plus -></a
                    >
                  </div>
                </div>

                <div
                  class="
                    col-12 col-md-12 col-lg-6
                    order-lg-1
                    p-0
                    position-relative
                  "
                >
                  <div class="position-relative overlap-10">
                    <img
                      src="./../../../../public/storage/assets/web/image/team-home-odacesoft.jpg"
                      class="img-fluid rounded-5"
                      alt="Team Odacesoft"
                    />
                  </div>

                  <!-- Decorations -->
                  <div
                    class="
                      d-none d-lg-inline-block
                      position-absolute
                      top-0
                      start-0
                      w-64
                      h-64
                      mt-n10
                      ms-n10
                      text-muted
                    "
                  >
                    <svg
                      width="185"
                      height="186"
                      viewBox="0 0 185 186"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                      <circle cx="22" cy="2" r="2" fill="currentColor"></circle>
                      <circle cx="42" cy="2" r="2" fill="currentColor"></circle>
                      <circle cx="62" cy="2" r="2" fill="currentColor"></circle>
                      <circle cx="82" cy="2" r="2" fill="currentColor"></circle>
                      <circle
                        cx="102"
                        cy="2"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="2"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="2"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="2"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="2"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle cx="2" cy="22" r="2" fill="currentColor"></circle>
                      <circle
                        cx="22"
                        cy="22"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="42"
                        cy="22"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="62"
                        cy="22"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="82"
                        cy="22"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="102"
                        cy="22"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="22"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="22"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="22"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="22"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle cx="2" cy="42" r="2" fill="currentColor"></circle>
                      <circle
                        cx="22"
                        cy="42"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="42"
                        cy="42"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="62"
                        cy="42"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="82"
                        cy="42"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="102"
                        cy="42"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="42"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="42"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="42"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="42"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle cx="2" cy="62" r="2" fill="currentColor"></circle>
                      <circle
                        cx="22"
                        cy="62"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="42"
                        cy="62"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="62"
                        cy="62"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="82"
                        cy="62"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="102"
                        cy="62"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="62"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="62"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="62"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="62"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle cx="2" cy="82" r="2" fill="currentColor"></circle>
                      <circle
                        cx="22"
                        cy="82"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="42"
                        cy="82"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="62"
                        cy="82"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="82"
                        cy="82"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="102"
                        cy="82"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="82"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="82"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="82"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="82"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="2"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="22"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="42"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="62"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="82"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="102"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="102"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="2"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="22"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="42"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="62"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="82"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="102"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="122"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="2"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="22"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="42"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="62"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="82"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="102"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="142"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="2"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="22"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="42"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="62"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="82"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="102"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="162"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="2"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="22"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="42"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="62"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="82"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="102"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="122"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="142"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="162"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                      <circle
                        cx="182"
                        cy="182"
                        r="2"
                        fill="currentColor"
                      ></circle>
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section>
            <div class="bg-light-boxed-right bg-checkered  py-10 py-xl-20 text-">
				<div class="container">
				<div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
					<div class="col-lg-6 order-lg-2">
						<div class="card shadow-sm me-lg-6">
							<div class="card-body p-6">
								<div class="d-flex flex-row">
									<div>
										<span class="icon btn btn-circle btn-lg btn-soft-primary disabled me-4"><span class="number">01</span></span>
									</div>
									<div>
										<h4 class="mb-1">Collect Ideas</h4>
										<p class="mb-0">Nulla vitae elit libero pharetra augue dapibus.</p>
									</div>
								</div>
							</div>
							<!--/.card-body -->
						</div>
						<!--/.card -->
						<div class="card ms-lg-13 mt-6 shadow-sm  ms-6">
							<div class="card-body p-6">
								<div class="d-flex flex-row">
									<div>
										<span class="icon btn btn-circle btn-lg btn-soft-primary disabled me-4"><span class="number">02</span></span>
									</div>
									<div>
										<h4 class="mb-1">Data Analysis</h4>
										<p class="mb-0">Vivamus sagittis lacus vel augue laoreet.</p>
									</div>
								</div>
							</div>
							<!--/.card-body -->
						</div>
						<!--/.card -->
						<div class="card  mt-6 ms-12 shadow-sm">
							<div class="card-body p-6 ">
								<div class="d-flex flex-row">
									<div>
										<span class="icon btn btn-circle btn-lg btn-soft-primary disabled me-4"><span class="number">03</span></span>
									</div>
									<div>
										<h4 class="mb-1">Finalize Product</h4>
										<p class="mb-0">Cras mattis consectetur purus sit amet.</p>
									</div>
								</div>
							</div>
							<!--/.card-body -->
						</div>
						<!--/.card -->
					</div>
					<!--/column -->
					<div class="col-lg-6">
						<h2 class="display-6 mb-3">Comment ça marche ?</h2>
						<p class="lead fs-lg pe-lg-5">Find out everything you need to know and more about how we create our business process models.</p>
						<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam quis risus eget urna mollis ornare.</p>
						<p class="mb-6">Nullam id dolor id nibh ultricies vehicula ut id elit. Vestibulum id ligula porta felis euismod semper. Aenean lacinia bibendum nulla sed consectetur. Sed posuere consectetur est at lobortis. Vestibulum id ligula porta felis.</p>
						<a href="http://themes.iki-bir.com/sandbox/index15.html#" class="btn btn-primary rounded-pill shadow-hover mb-0">En savoir plus</a>
					</div>
					<!--/column -->
				</div>
				<!--/.row -->
				</div>

			</div>
        </section>
        <section>
          <div class=" bg-gray-900">
          <div class="  pb-lg-15 pt-lg-20 pb-20 pt-10">
            <div class="container-xl max-w-screen-xl">
              <div class="row align-items-center">
                <div class="col-md-10">
                  <h1 class="lh-tight ps-5 border-start-8 border-white text-white  ls-tight display-5 mb-7 pe-lg-40">
                    Explorez nos réalisations, activités et galerie images
                  </h1>

                </div>
                <div class="p-0 bg-white rounded-5 opaci shadow-lg">

                  <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link px-2 text-dark-hover active px-lg-6" id="nav-home-realisation" data-bs-toggle="tab" data-bs-target="#nav-realisation" type="button" role="tab" aria-controls="nav-realisation" aria-selected="true"> <i class="fas fa-tasks"></i> Nos réalisations</button>
                    <button class="nav-link px-2 px-lg-6 text-dark-hover" id="nav-contact-activites" data-bs-toggle="tab" data-bs-target="#nav-activites" type="button" role="tab" aria-controls="nav-activites" aria-selected="false"><i class="fas fa-chart-pie"></i> Nos activités</button>
                    <button class="nav-link px-2 px-lg-6 text-dark-hover" id="nav-profile-galerie" data-bs-toggle="tab" data-bs-target="#nav-galerie" type="button" role="tab" aria-controls="nav-galerie" aria-selected="false"><i class="fas fa-images "></i> Galeries images</button>
                  </div>
                </nav>
                <div class="tab-content rounded-5" id="nav-tabContent ">
                  <div class="tab-pane fade show active  _  py-8"   id="nav-realisation" role="tabpanel" aria-labelledby="nav-home-realisation">
                     <div  v-if="realisations" class="owl-carousel owl-theme  " id="owl-carousel-realisations">
                            <div v-for="p in realisations" :key="p" class="item bg-white border mb-4 rounded-sm shadow-3__ p-2">
                                 <figure :title="p.title" class="pb-3 px-md-0 px-xl-2">
                                <inertia-link :href="route('la-realisation',p.slug)">
                                    <img :src="p.img" :alt="p.title" class="rounded-0" />
                                </inertia-link>
                                </figure>
                                <inertia-link :href="route('la-realisation',p.slug)">
                                <div class="cap-real py-2 px-5 rounded- bg-white -100">
                                <h5  class="text-xs text-white_ p-O m-0"> <i class="fa fa-bookmark" aria-hidden="true"></i> {{ liveSubstr(p.title,0,50) }}</h5>

                                </div>
                                </inertia-link>
                            </div>

                             <inertia-link :href="route('realisations')">
                                <div class="item bg-gray-100 rounded-sm text-center font-bold text-white_  shadow-lg p-2">
                                           <div class="py-24"><i class="fa fa-plus-circle" aria-hidden="true"></i> Toutes les réalisations</div>
                                </div>
                            </inertia-link>
                        </div>

                  </div>
                  <div class="tab-pane fade py-8 px-4" id="nav-activites" role="tabpanel" aria-labelledby="nav-profile-activites">
                      <div  v-if="activites" class="owl-carousel owl-theme" id="owl-carousel-article">
                            <div  v-for="article in activites" id="article-top"
                                :key="article" class="card h-100 item shadow-1 shadow-hover-4 rounded-3 ">
                                    <inertia-link class="text-dark" v-if="article" :href='route("activite",article.slug)'>
                                    <div class="img-article-cover">
                                    <img v-if="article.img"
                                    :src="'/'+article.img"
                                    class="card-img-top"
                                    :alt="article.img"
                                    />
                                    </div>
                                    </inertia-link>
                                    <div class="card-body">
                                    <div class="clearfix mb-3">
                                        <span  v-if="article.categories"  class="float-start badge rounded-pill bg-gray-300 text-muted " :class="article.categories.couleur"
                                        ><inertia-link class="text-white" :href='route("blog.cat.show",article.categories.id)'>{{ article.categories.nom }}</inertia-link></span
                                        >
                                    </div>

                                    <h4 class="mb-2 h6"><inertia-link class="text-dark" :href='route("activite",article.slug)'> {{ liveSubstr(article.title,0,55) }}</inertia-link></h4>
                                    <div v-if="article.lead" class="text-xs text-muted">{{ liveSubstr(article.lead,0,50) }}</div>
                                <div class="d-flex text-xs mt-4">
                                     <span class="float-end price-hp me-3 text-xs"><i class="fa fa-calendar-o" aria-hidden="true"></i> {{ article.h_created_at }}</span>
                                    <span v-if="article.user" class="me-3"> <i class="far fa-user-circle" aria-hidden="true"></i> {{article.user.name}}</span>
                                    <span v-if="article.view_count" class="me-3"> <i class="far fa-eye" aria-hidden="true"></i> {{ (article.view_count)}}</span>
                                </div>
                                    <!--div class="text-center my-2">
                                        <a href="#" class="card-link">Lire la suite -></a>
                                    </div-->
                                    </div>
                        </div>
                            <inertia-link :href="route('activites')">
                                <div class="item bg-gray-100 rounded-sm text-center font-bold text-white_  shadow-lg p-2">
                                <div class="top-img py-4"></div>
                                <div class="card-body">
                                           <div class="py-24"><i class="fa fa-plus-circle" aria-hidden="true"></i> Toutes nos activités</div>
                                </div>
                                </div>
                            </inertia-link>
                        </div>
                  </div>
                  <div class="tab-pane fade" id="nav-galerie" role="tabpanel" aria-labelledby="nav-contact-galerie">
                    <div  class="p-4 px-xl-8 ">
                    <div  v-if="realisations" class="row" >
                            <div v-for="p in realisations" :key="p" class="col-md-3 p-0" >
                                 <figure :title="p.title" class="pb-3px-md-0px-xl-2">
                                <a class="example-image-link" :href="p.img" data-lightbox="example-set" :data-title="p.title">
                                    <img :src="p.img" :alt="p.title" class="rounded-0 shadow-lg img-responsive" />
                                </a>
                                </figure>

                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          </div>
        </section>
        <section class="">
        <section class="wrapper bg-translucent-dark wrapper-border">
			<div class="container py-14 py-md-16">
				<div class="row gx-lg-8 gx-xl-12 gy-10 gy-lg-0">
					<div class="col-lg-4 mt-lg-2">
						<h2 class="fs-15 text-uppercase text-sm text-muted mb-3">Nos Clients et partenaires</h2>
						<h3 class="display-5 mb-3 pe-xxl-5">Une <span class="text-danger">crédibilité</span> confirmée par nos clients et partenaires</h3>
						<p class="lead fs-lg mb-0 pe-xxl-5">Nous aidons notre clients à faire les bons choix afin d'atteindre leurs objectifs.</p>
					</div>
					<!-- /column -->
					<div class="col-lg-8">
						<div v-if="partenaires" id="o-patrtenaires" class="row row-cols-2 mt-3 row-cols-md-4 gx-2 gx-md-8 gx-xl-12 gy-12">

                            <div v-for="p in partenaires" :key="p" class="bg-white shadow-sm  border-end text-center border-top px-6 me-xl-3me-1 py-3 mt-0 mb-0 col">

                                    <figure :title="p.nom" class="px-3 px-md-0 px-xxl-2"><a v-if="p.url!=null" :href="p.url" target="_blanck">
                                    <img :src="p.url_logo" :alt="p.nom">
                                    </a>
                                    <span v-else>
                                         <img :src="p.url_logo" :alt="p.nom">
                                    </span>

                                    </figure>
                            </div>

						</div>
						<!--/.row -->
					</div>
					<!-- /column -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</section>
        </section>
        <!--div class="obackdrop">

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xxl-7 mt-6 mx-auto">
                     <div class="modal-dialog w-auto max-w-full m-3">
                        <div class="modal-content rounded-xl">
                            <div class="p-1">
                            <div class="px-6 pt-4 position-relative">


                                <div class="position-absolute top-4 end-4 text-xs">
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                                </div>
                            </div>
                            <div class="px-6 pb-4">
                                <ul class="navbar-nav flex-row flex-wrap pt-4 py-lg-0">
                                <li class="nav-item col-6 col-lg-auto">
                                    <inertia-link class="nav-link py-2" href="/"
                                    >{{__('Accueil')}}</inertia-link
                                    >
                                </li>
                                <li class="nav-item col-6 col-lg-auto">
                                    <inertia-link class="nav-link py-2" href="/partenaires"
                                    >{{('Partenaires')}}</inertia-link>

                                </li>
                                <li class="nav-item col-6 col-lg-auto">
                                    <inertia-link class="nav-link py-2" href="/projets"
                                    >{{('Projets')}}</inertia-link>

                                </li>
                                <li class="nav-item col-6 col-lg-auto">
                                    <inertia-link class="nav-link py-2" href="contact"
                                    >{{('Contact')}}</inertia-link>

                                </li>
                                <li class="nav-item col-6 col-lg-auto">
                                    <inertia-link class="nav-link py-2" href="/resources"
                                    >{{('Resources')}}</inertia-link>

                                </li>
                                <li class="nav-item col-6 col-lg-auto">
                                    <inertia-link class="nav-link py-2" href="/blog"
                                    >{{('Blog')}}</inertia-link>

                                </li>
                                </ul>
                                <small class="text-muted text-xs">{{('Services')}}</small>
                                <hr class="mb-0 mt-0" />
                                <ul class="navbar-nav flex-row flex-wrap ms-llg-auto">
                                <li class="nav-item col-12 col-lg-auto border-bottom py-1">
                                    <inertia-link
                                    href="./services/pour-les-particuliers"
                                    class="nav-link b-1"
                                    role="button"
                                    >
                                    <div class="d-flex">
                                        <div>
                                        <div class="icon text-success mt-1 text-lg lh-snug">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        </div>
                                        <div class="ps-4">
                                        <span class="d-block mb-0"
                                            >{{('Pour les particuliers')}}</span
                                        >
                                        <p class="text-xs text-muted">
                                            {{('Dépensez moins pour atteindre vos rêves personnels.')}}
                                        </p>
                                        </div>
                                    </div>
                                    </inertia-link>
                                </li>
                                <li class="nav-item col-12 border-bottom py-1 col-lg-auto">
                                    <inertia-link
                                    href="/services/pour-les-entreprises"
                                    class="nav-link"
                                    role="button"
                                    >
                                    <div class="d-flex">
                                        <div>
                                        <div class="icon text-danger mt-1 text-lg lh-snug">
                                            <i class="fa fa-building" aria-hidden="true"></i>
                                        </div>
                                        </div>
                                        <div class="ps-4">
                                        <span class="d-block mb-0">{{('Pour les entreprises')}}</span>
                                        <p class="text-xs text-muted">
                                            {{('Découvrez les produits qui feront croitre votre.')}}
                                            business.
                                        </p>
                                        </div>
                                    </div>
                                    </inertia-link>
                                </li>
                                <li class="nav-item col-12 py-1 col-lg-auto">
                                    <inertia-link
                                    href="/services/autres-services"
                                    class="nav-link"
                                    role="button"
                                    >
                                    <div class="d-flex">
                                        <div>
                                        <div class="icon text-primary mt-1 text-lg lh-snug">
                                            <i class="fas fa-folder-plus"></i>
                                        </div>
                                        </div>
                                        <div class="ps-4">
                                        <span class="d-block mb-0">{{('Autres services')}}</span>
                                        <p class="text-xs text-muted">
                                            {{('Le meilleur choix qui déterminera vos résultats.')}}
                                        </p>
                                        </div>
                                    </div>
                                    </inertia-link>
                                </li>
                                </ul>
                                <hr class="my-4" />
                                <ul class="navbar-nav flex-row flex-wrap ms-llg-auto">
                                <li class="nav-item col-6 col-llg-auto">
                                    <a
                                    class="nav-link py-2"
                                    href="https://facebook.com/odacesoft"
                                    target="_blank"
                                    rel="noopener"
                                    >
                                    <i class="fab fa-facebook"></i>
                                    <small class="d-llg-none ms-2">Facebook</small>
                                    </a>
                                </li>
                                <li class="nav-item col-6 text-end col-llg-auto">
                                    <a
                                    class="nav-link py-2"
                                    href="https://twitter.com/odacesoft"
                                    target="_blank"
                                    rel="noopener"
                                    >
                                    <i class="fab fa-twitter"></i>
                                    <small class="d-llg-none ms-2">Twitter</small>
                                    </a>
                                </li>
                                <li class="nav-item col-6 col-llg-auto">
                                    <a
                                    class="nav-link py-2"
                                    href="https://linkedin.com/company/odacesoft"
                                    target="_blank"
                                    rel="noopener"
                                    >
                                    <i class="fab fa-twitter"></i>
                                    <small class="d-llg-none ms-2">LinkedIn</small>
                                    </a>
                                </li>
                                <li class="nav-item y text-end col-6 col-llg-auto">
                                    <a
                                    class="nav-link py-2"
                                    href="https://github.com/Odacesoft"
                                    target="_blank"
                                    rel="noopener"
                                    >
                                    <i class="fab fa-github"></i>
                                    <small class="d-llg-none ms-2">GitHub</small>
                                    </a>
                                </li>
                                </ul>
                                <hr class="my-4" />
                                <div class="d-flex">
                                <a href="/join" class="btn btn-primary btn-sm mx-auto">
                                    Nous rejoindre <span class="ms-2">-></span>
                                </a>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
        </div-->
        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg shadow-lg" role="document">
    <div class="modal-content rounded-1">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Commander un service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-gray-100">
        <form  method="post" @submit.prevent="saveService">
        <div class="px-lg-4">
          <h4 class=" text-cenetr">Détails sur la commande</h4>
            <div class="row">

              <div class="col-md-6 mb-2">
                <label for="nom" class=" text-xs text-muted">Nom complet (Personne/Entreprise)</label>
                <input type="text" class="form-control  form-controle-sm text-sm" id="nom" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <label for="country" class=" text-xs text-muted">Pays</label>
                <select class="form-select d-block  form-controle-sm w-100 text-sm" id="country" required="">
                  <option v-if='pays' value="">Choisir le pays...</option>
                  <option v-for="p in pays" :key="p" :value="p.id">{{ p.nom_fr_fr }}</option>
                </select>
              </div>

            </div>
            <div class="row">
              <div class="col-md-6 mb-2">
                <label for="tel" class=" text-xs text-muted">Téléphone</label>
                <input type="text" class="form-control form-controle-sm text-sm" id="tel" placeholder="+229 96 77 00 00" value="" required="">

              </div>
              <div class="col-md-6 mb-2">
                <label for="email" class=" text-xs text-muted">Email</label>
                <input type="text" class="form-control form-controle-sm text-sm" id="email" placeholder="email@domaine.com" value="" required="">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>
        <!--/div>
        <div class="bg-white p-md-5 p-2 p-xl-6 shadow-2 border-1 shadow-sm mt-4"-->
            <div class="row">
             <div class="col-md-12 mb-2">
                <label for="titre" class=" text-xs text-muted">Titre de la commande</label>
                <input type="text" class="form-control form-controle-sm text-sm" id="titre" placeholder="ex: Commande de site web pour mon entreprise" value="" required="">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
             <div class="col-md-6 mb-2">
                <label for="type" class=" text-xs text-muted">Type de service</label>
                <select  v-if='services' class="form-select d-block w-100" id="type" required="">
                  <option  value="">Choisir un service...</option>
                  <option v-for='s in services' :key="s" :value='s.id'>{{s.title}}</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-3 mb-2">
                <label for="pmini" class=" text-xs text-muted">Prix minimum</label>
                <input type="text" class="form-control form-controle-sm text-sm" id="pmini" placeholder="5000F" value="" >
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-3 mb-2">
                <label for="pmax" class=" text-xs text-muted">Prix maximum</label>
                <input type="text" class="form-control form-controle-sm text-sm" id="pmax" placeholder="80.000.000F" value="" required="">
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-12 mb-2">
                <label for="description" class=" text-xs text-muted">Description du service</label>
                <textarea class="form-control" id="description" placeholder="Décrivez ce que vous voulez ici" rows="4"  required=""></textarea>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
            </div>
            <hr class="mb-1">

            <h6 class="mb-2 ">Mode de payement</h6>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                <label class="custom-control-label  ms-2" for="credit"> Par Mobile Money</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label ms-2" for="debit">En espèce </label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label ms-2" for="paypal">Par Bitcoin</label>
              </div>
            </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-white border" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary" >Lancer ma commande -></button>
      </div>
    </div>
  </div>
</div>
         <Footer />
      </div>


    </div>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'

import Header from "@/Components/Header";
import Notification from "@/Components/Notification";
import Footer from "@/Components/Footer";
import CoverLayout from "@/Layouts/CoverLayout";
import "/storage/vendor/masonry/masonry.min.js";
import "/storage/vendor/owl.carousel/owl.carousel.min.js";
import "/storage/vendor/owl.carousel/assets/owl.carousel.min.css";
import "/storage/vendor/owl.carousel/assets/owl.theme.default.min.css";

import "/storage/vendor/lightbox/css/lightbox.css";
import "/storage/vendor/lightbox/js/lightbox.js";


export default {
  components: {
    Header,
    Notification,
    Footer,
    CoverLayout,
  },
  metaInfo: {title: "Odacesoft, pour créer des possibilités dans le numérique en Afrique"},
  props: {
    status: Number,
  },
  data(){
      return{
          cmpt1:0,
      }
  },
  computed: {
    title() {
      return {
        503: '503: Service Unavailable',
        500: '500: Server Error',
        404: '404: Page Not Found',
        403: '403: Forbidden',
      }[this.status]
    },
    description() {
      return {
        503: 'Sorry, we are doing some maintenance. Please check back soon.',
        500: 'Whoops, something went wrong on our servers.',
        404: 'Sorry, the page you are looking for could not be found.',
        403: 'Sorry, you are forbidden from accessing this page.',
      }[this.status]
    },
  },
  mounted:function(){
    this.initCarroussel()
  },
  methods:{
   initCarroussel:function(){
       $('#owl-carousel-realisations').owlCarousel({
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
            items: 5,
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
    props:['title','cat_services','top_services','partenaires','pageMVV','realisations','activites','services']
  ,
    metaInfo: {
      title: 'My Example App',
      titleTemplate: '%s - Yay!',
      htmlAttrs: {
        lang: 'fr',
        amp: true
      }
    }
};
</script>
<style scoped>

.list-logo > li img {
  max-width: 100%;
  max-height: 50px;
  margin: auto;
  vertical-align: middle !important;
}
.list-logo > li {
  width: 15em;
  padding: 15px 20px;
  background: #ffffff;
  height: 80px;
  float: left;
  text-align: center;
  vertical-align: middle;
  border-radius: 3px;
  margin-bottom: 15px;
}
</style>
