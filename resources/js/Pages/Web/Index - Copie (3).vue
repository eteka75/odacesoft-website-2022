<template>
  <Head>
    <title>Odacesoft, pour créer des possibilités dans le numérique en Afrique</title>
    <meta head-key="description" name="description" content="Odacesoft est une entreprise informatique spécialisée dans l'ingénierie Informatique et l'incubation d'idées innovantes." />
  </Head>

  <Notification />
  <Header menu="Home"/>
  <div class="carrousel">
    <div class="r">
            <div class="bd-example">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item">
                    <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" alt="First slide [800x400]" src="/storage/assets/web/image/commander-service-odacesoft.jpg" data-holder-rendered="true">
                    </div>
                    <div class="carousel-item active">
                    <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=666&amp;fg=444&amp;text=Second slide" alt="Second slide [800x400]" src="/storage/assets/web/image/bg-fill-particuliers.jpg" data-holder-rendered="true">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=555&amp;fg=333&amp;text=Third slide" alt="Third slide [800x400]" src="/storage/assets/web/image/bg-fill-particuliers-2.jpg" data-holder-rendered="true">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
                </div>
          </div>
  </div>
    <div class="d-flex flex-grow-1">
      <div class="w-full">
        <section
          class="
            pt-10_
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
                 Pour concrétiser vos
                  <span class="d-inline-flex text-gray-300 position-relative">
                    <span class="position-relative text-danger"
                      >rêves dans le digital.</span
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
                <div class="py-2 row mt-1">
                  <div class="flex-fill">
                    <span class="font-sm-bold -dark text-dark no-wr"
                      >Les plus commandés:
                    </span>
                  </div>
                  <div v-if="services" class="flex-fill mx-n1">

                    <a href="#"   v-for='(s,i) in services' :key="i" data-toggle="modal" data-target="#CommandeModal"
                      ><span v-if="i<8"
                        class="
                          badge
                          rounded-3
                          mb-1
                          text-dark
                          border border-black
                          mx-1
                        " @click="setType(s.id,s.title)"
                        >{{ s.title }}</span
                      ></a>
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
						<div class="shape bg-dot primary rellax w-16 h-20" data-rellax-speed="1" style="top: 1rem; left: 5.5rem; transform: translate3d(0px, -473px, 0px);"></div>
						<div class="overlap-grid overlap-grid-2">
							<div class="item">
								<figure class="roundedshadow-lg">

                                    <iframe height="420" width="100%" src="https://www.youtube.com/embed/YXuU3YpdUtA" title="YouTube video player" class="embed-responsiveimg-responsive shadow-4 w-full rounded-5" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-pictures" allowfullscreen></iframe>
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
                     :href="route('team')"
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
										<h4 class="mb-1">Etape d'idée</h4>
										<p class="mb-0">Murir votre idée, pour vous rapporcher de vos objctifs.</p>
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
										<h4 class="mb-1">Analyses et plans</h4>
										<p class="mb-0">Une expertise pour réussir dans vos projets.</p>
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
										<h4 class="mb-1">Mise en oeuvre et Croissance</h4>
										<p class="mb-0">La phase important de tout projet qui souhaite réussir.</p>
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
						<p class="lead fs-lg pe-lg-5">Nous avons pour ambitions de créer un écosystème autours des technologies qui permettent à vos affaires de croitre beaucoup plus rapidement.
                         </p>
						<p>Nous travaillons à identifier avec vous les meilleures idées adaptées à vos objectifs de vente, de carrière dans le numérique ou pour la résolution d'un problème pertinent de notre environnement.
                        Cette étape est suivie d'une analyse afin d'identifier clairement le plan à suivre afin poser les diagnostics néccessaires. </p>
						<p class="mb-6">Nous vous accompagnos enfin à mettre en oeuvre la solution choisie et à vous suivre sur le chemin de la réussite. Enfin de compte, vous êtes gagnant et nous le sommes également.</p>
                        <p class="font-bold">Souhaiteriez-vous que nous vous aidions dans la réalisation de votre idée d'entreprise dans le numérique ?</p>
                        <inertia-link class="btn btn-primary btn-sm mt-4  rounded-pill shadow-hover mb-0" :href="route('soumetre-projet')" >Soumettre mon projet</inertia-link>
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
                <div class="col-md-12">
                  <h1 class="lh-tight display-3  border-start-8_border-white text-white text-center  ls-tight mb-7 _pe-lg-20">
                    Explorez nos <span class="text-muted">réalisations</span>, <span class="text-info">activités</span> et galerie <span class="text-warning">images</span>
                  </h1>

                </div>
                <div class="p-0 bg-white rounded-5 opaci shadow-lg">

                  <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link px-2 text-dark-hover active px-lg-6" id="nav-home-realisation" data-bs-toggle="tab" data-bs-target="#nav-realisations" type="button" role="tab" aria-controls="nav-realisation" aria-selected="true"> <i class="fas fa-tasks"></i> Nos réalisations</button>
                    <button class="nav-link px-2 px-lg-6 text-dark-hover" id="nav-contact-activites" data-bs-toggle="tab" data-bs-target="#nav-activites" type="button" role="tab" aria-controls="nav-activites" aria-selected="false"><i class="fas fa-chart-pie"></i> Nos activités</button>
                    <button class="nav-link px-2 px-lg-6 text-dark-hover" id="nav-profile-galerie" data-bs-toggle="tab" data-bs-target="#nav-galerie" type="button" role="tab" aria-controls="nav-galerie" aria-selected="false"><i class="fas fa-images "></i> Galeries images</button>
                  </div>
                </nav>
                <div class="tab-content rounded-5" id="nav-tabContent ">
                  <div class="tab-pane fade show active  _  py-8"   id="nav-realisations" role="tabpanel" aria-labelledby="nav-home-realisation">
                     <div  v-if="realisations" class="owl-carousel owl-theme px-3 px-xl-8 " id="owl-carousel-realisations">
                          <div v-for="p in realisations" :key="p" class="item">
                            <inertia-link :href="route('la-realisation',p.slug)">
                                <div class="col-sm-6col-lg-4">
                                    <div class="card card-overlay-bottom card-img-scale overflow-hidden mb-4 mcard2">
                                    <!-- Card featured -->
                                                <!--span class="card-featured" title="Featured post"><i class="fas fa-star"></i></span-->
                                    <!-- Card Image -->
                                    <img :src="p.img" :alt="p.title">
                                    <div class="card-img-overlay d-flex flex-column p-3 p-md-4">
                                        <div v-if="p.service" >
                                        <a href="#" class="badge bg-warning"><i class="fas fa-circle me-2 small fw-bold"></i>{{ p.service.title }}</a>
                                        </div>
                                        <div class="w-100 mt-auto">
                                        <h4 class="text-white text-sm"><inertia-link :href="route('la-realisation',p.slug)" class="btn-link text-reset stretched-link">  {{ liveSubstr(p.title,0,70) }} </inertia-link></h4>

                                        <ul class="nav nav-divider text-white-force align-items-center small">
                                            <!--li class="nav-item position-relative">
                                            <div v-if="p.user" class="nav-link"><i class="fa fa-user-circle" aria-hidden="true"></i> <a href="#" class="stretched-link text-reset btn-link">{{ p.user.name }}</a>
                                            </div>
                                            </li-->
                                            <li class="nav-item text-sm text-white-50">• {{p.h_created_at}}</li>
                                        </ul>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </inertia-link>
                            </div>

                             <inertia-link class=" text-white" :href="route('realisations')">
                                <div class="item bg-gray-800 rounded-sm text-center font-bold text-white_ mcard2 shadow-lg p-2">
                                           <div class="py-24 mt-8 text-white"><i class="fa fa-plus-circle" aria-hidden="true"></i> Toutes les réalisations</div>
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
                                        <span  v-if="article.categories && article.categories.length > 0"  class="float-start badge rounded-pill bg-gray-300 text-muted " :class="article.categories.couleur"
                                        ><inertia-link  v-if="article.categories && article.categories.length > 0" class="text-white" :href='route("blog.cat.show",article.categories.id)'>{{ article.categories.nom }}</inertia-link></span
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
                        <div class="mt-5 my-3">
                            <inertia-link class="btn  border-primary bg-none border-2 bg-primary-hover text-white-hover rounded-pill text-primary" :href="route('partenaires')">En savoir plus <i class="fa fa-long-arrow-right" aria-hidden="true"></i></inertia-link>
                        </div>
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
        <section>
          <div class="pb-10 py-10 pb-lg-16 pt-lg-12">
            <div class="container-xl max-w-screen-xl">
              <div class="row align-items-center">
                <div class="col-lg-9 mx-center text-center">
                  <h5 class="text-uppercase text-muted mt-6 mb-3">
                    Le Blog
                  </h5>

                  <!-- Heading -->
                  <h1 class="lh-tight text-gray-800 ls-tight display-5 mb-7">
                    Découvrez les nouveautés dans différentes catégories
                  </h1>
                  <!-- Text -->
                  <p class="text-lg lead mb-7">
                    De nouvelles articles sont à découvrir pour vous aider à mieux vous outiller dans votre domaine.
                  </p>

                </div>
                ================================
                    <div  v-if="articles"  v-for="article in articles"
                :key="article" class="card h-100 shadow-1 shadow-hover-4 rounded-3 col-md-3">
                    <inertia-link class="text-dark" v-if="article && article.url && article.slug" :href='route("blog.article.show",article.slug)'> <img v-if="article.image"
                    :src="article.image.url"
                    class="card-img-top"
                    :alt="article.image.alt"
                    /></inertia-link>


                    <div class="card-body">

                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
<div class="modal" id="CommandeModal" tabindex="-1" role="dialog" aria-labelledby="commande" aria-hidden="true">
  <div class="modal-dialog  modal-lg shadow-lg" role="document">
    <div class="modal-content rounded-1">
      <div class="modal-header">
        <h5 class="modal-title" id="commande">Commander un service</h5>
        <button type="button" class="btn btn-sm close" id="fmodal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form  method="post" @submit.prevent="saveService">
      <div class="modal-body bg-gray-100">
      <progress v-if="form.progress" :value="form.progress.percentage" max="100">
  {{ form.progress.percentage }}%
</progress>

        <div class="px-lg-4">
         <div class="progress mb-4_ position-absolute"  >
            <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
          <h4 class=" text-cenetr">Détails sur la commande</h4>
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
            </div>
      </div>
      <div class="modal-footer">
        <button  :disabled="form.processing"  type="button" class="btn bg-white shadow-sm border" data-dismiss="modal">Fermer</button>
         <jet-button
                  class="btn btn-success shadow-sm"
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
import JetButton from "@/Jetstream/Button";
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
    JetButton,
  },
  metaInfo: {title: "Odacesoft, pour créer des possibilités dans le numérique en Afrique"},
  props: {
    status: Number,
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
    this.initCarroussel();
    // $('#CommandeModal').modal('toggle');
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
    props:['title','cat_services','top_services','partenaires','pageMVV','realisations','activites','services','pays','articles']
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
