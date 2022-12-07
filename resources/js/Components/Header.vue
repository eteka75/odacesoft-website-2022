<template>
  <div>
    
    <header>
      <div class="bg-primary_ bg-gray-blue">
        <div class="container-xxl">
          <nav class="navbarnavbar-light flaot-end ">
            <div class="nav-bar-right" id="navtop">
              <ul class=" mb-0 list-inline p-0 text-xs d-flex">                
                <li v-bind:class="[this.menu=='Formations' ? 'active' : '', '']" class="list-inline-item mx-0 px-1" >
                  <inertia-link class="nav-link px-1 text-nowrap  font-regular" :href="route('formations')">Formations</inertia-link>
                </li>
                <li v-bind:class="[this.menu=='Emplois' ? 'active' : '', '']" class="list-inline-item mx-0 px-1">
                  <inertia-link class="nav-link px-1 text-nowrap  font-regular" :href="route('emplois')">Emploies</inertia-link>
                </li>
                <li v-bind:class="[this.menu=='Events' ? 'active' : '', '']" class="list-inline-item mx-0 px-1">
                  <inertia-link class="nav-link px-1 text-nowrap  font-regular" :href="route('events')">Evénements</inertia-link>
                </li>
                <li v-bind:class="[this.menu=='Ressources' ? 'active' : '', '']" class="list-inline-item mx-0 px-1">
                  <inertia-link class="nav-link px-1 text-nowrap  font-regular" :href="route('ressources')">Ressources</inertia-link>
                </li>
                <li v-bind:class="[this.menu=='Startups' ? 'active' : '', '']" class="list-inline-item mx-0 px-1">
                  <inertia-link class="nav-link px-1 text-nowrap  font-regular" :href="route('startups')">Startups</inertia-link>
                </li>
                <li v-bind:class="[this.menu=='Boutique' ? 'active' : '', '']" class="list-inline-item mx-0 px-1">
                  <inertia-link class="nav-link px-1 text-nowrap  font-regular" :href="route('boutique')">Boutique</inertia-link>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <nav
        class="
          navbar navbar-main navbar-expand-lg navbar-light
          bg-white
          pb-0 pt-0
          px-0
          navbar-border
        "
        id="navbar_main"
      >
        <div class="container-xxl">
          <!-- Logo -->
          <inertia-link class="navbar-brand mt-n1 text-center" href="/">
            <div class="w-md-auto text-dark">
              <img
                src="/storage/images/logo-odacesoft-black-mini.jpg"
                alt="Odacesoft"
              />
            </div>
          </inertia-link>
          <!-- Brand + Toggler (for mobile devices) -->
          <button
            class="navbar-toggler me-n4 ms-auto text-start"
            type="button"
            data-bs-toggle="modal"
            data-bs-target="#mobile_nav"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">div class="align-items-center order-lg-4 ps-lg-3 d-none d-lg-flex justify-content-end" style="width: 130px;">


                                <div class="dropdown">

                                                    <a href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="px-2 position-relative d-lg-none">
                                        <span class="avatar avatar-xs bg-warning text-white font-regular rounded-circle">
                                            <i class="far fa-user"></i>
                                        </span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow px-6 pt-2 pb-2 shadow-3">


                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item px-0" href="login.html">Settings</a>
                                        <a class="dropdown-item px-0" href="login.html">Billing</a>
                                        <a href="#" class="dropdown-item px-0" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                        <div class="dropdown-divider"></div>

                                        <div class="dropdown-item px-0 d-flex w-full d-none">
                                            <div>
                                                <i class="far fa-moon-stars me-3 text-muted"></i>Dark Mode
                                            </div>
                                            <div class="ms-auto">
                                                <div class="custom-control custom-switch me-n3">
                                                    <form id="frmToggleDarkMode" action="https://webpixels.io/dark-mode" method="post">
                                                        <input type="hidden" name="_token" value="EaeQN2H1G4o1MvK6MR522DU6lnspAlx9BxGtnq7f">                                    <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="switchDarkMode" name="switch_dark_mode" >
                                                            <label class="form-check-label" for="switchDarkMode"></label>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div-->

          <!-- Menu -->
          <div
            class="collapse navbar-collapse order-lg-3 justify-content-start"
            id="navbar-main-collapse"
          >
            <ul class="navbar-nav align-items-lg-center ms-lg-5">
              <li class="nav-item">
                <inertia-link class="nav-link" v-bind:class="[this.menu=='Home' ? 'active' : '', '']" :href="route('accueil')"> <i class="fas fa-home" aria-hidden="true"></i> </inertia-link>
              </li>

              

              <!--li class="nav-item">
              <li class="nav-item dropdown_">
                <inertia-link
                  class="nav-link dropdown-toggle_"  v-bind:class="[this.menu=='Produits' ? 'active' : '', '']"
                  :href="route('accueil')"
                  id="navbarDropdownMenu"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  >Services</inertia-link>
                
              </li>
                <inertia-link class="nav-link"  v-bind:class="[this.menu=='Projets' ? 'active' : '', '']" :href="route('projets')">
                   {{('Projets')}}
                </inertia-link>
              </li-->
              <!--li class="nav-item">
                <inertia-link class="nav-link"  v-bind:class="[this.menu=='Programmes' ? 'active' : '', '']" :href="route('programmes')">
                  {{('Programmes')}}
                </inertia-link>
              </li-->
              <li class="nav-item">
              <inertia-link class="nav-link"  v-bind:class="[this.menu=='Produits' ? 'active' : '', '']" :href="route('services')">
                 {{('Services')}}
              </inertia-link>
            </li>
              <li class="nav-item">
                <inertia-link class="nav-link"  v-bind:class="[this.menu=='Programmes' ? 'active' : '', '']" :href="route('projets')">
                  {{('Projets')}}
                </inertia-link>
              </li>
              <li class="nav-item">
                <inertia-link class="nav-link"  v-bind:class="[this.menu=='Réalisations' ? 'active' : '', '']" :href="route('realisations')">
                   {{('Réalisations')}}
                </inertia-link>
              </li>
               <li class="nav-item">
                <inertia-link class="nav-link"  v-bind:class="[this.menu=='Activites' ? 'active' : '', '']" :href="route('activites')">
                   {{('Activités')}}
                </inertia-link>
              </li>


              <li class="nav-item">
                <inertia-link class="nav-link"  v-bind:class="[this.menu=='Blog' ? 'active' : '', '']" :href="route('blog')">
                  {{('Blog')}}
                </inertia-link>
              </li>
              <li class="nav-item">
                <inertia-link class="nav-link"  v-bind:class="[this.menu=='Contacts' ? 'active' : '', '']" :href="route('contact')">
                   {{('Contacts')}}
                </inertia-link>
              </li>
               <!--li class="nav-item dropdown">
                <inertia-link
                  class="nav-link dropdown-toggle"  v-bind:class="[this.menu=='Produits' ? 'active' : '', '']"
                  href="#autres"
                  id="navbarDropdownMenu"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  ><i class="fa fa-ellipsis-h"></i></inertia-link
                >
                <div
                  class="
                    dropdown-menu dropdown-menu-md
                    p-0
                    overflow-hidden
                    shadow-6
                  "
                  aria-labelledby=""
                >
                  <div class="px-6 pt-6">
                    <inertia-link
                      :href="route('partenaires')"
                      class="dropdown-group mb-6"
                      role="button"
                    >
                      <div class="d-flex">
                        <div>
                          <div class="icon text-dark mt-1 text-lg lh-snug">
                            <i class="fas fa-hands-helping    "></i>
                          </div>
                        </div>
                        <div class="ps-4">
                          <span class="d-block dropdown-heading mb-0"
                            >Nos parteanaires</span
                          >
                          <p class="dropdown-helper">
                            Découvrez nos différentes offres de formation
                          </p>
                        </div>
                      </div>
                    </inertia-link>
                    <inertia-link
                       :href="route('ressources')"
                      class="dropdown-group mb-6"
                      role="button"
                    >
                      <div class="d-flex">
                        <div>
                          <div class="icon text-gray-600 mt-1 text-lg lh-snug">
                            <i class="far fa-file-alt    "></i>
                          </div>
                        </div>
                        <div class="ps-4">
                          <span class="d-block dropdown-heading mb-0"
                            >Ressources</span
                          >
                          <p class="dropdown-helper">
                          Les différentes ressources pour mieux vous outiller
                          </p>
                        </div>
                      </div>
                    </inertia-link>

                    <inertia-link
                      :href="route('events')"
                      class="dropdown-group mb-6"
                      role="button"
                    >
                      <div class="d-flex">
                        <div>
                          <div class="icon text-warning mt-1 text-lg lh-snug">
                           <i class="far fa-calendar-check" aria-hidden="true"></i>
                          </div>
                        </div>
                        <div class="ps-4">
                          <span class="d-block dropdown-heading mb-1"
                            >Evènements</span
                          >
                          <p class="dropdown-helper">
                            Découvrez nos évènements
                          </p>
                        </div>
                      </div>
                    </inertia-link>
                  </div>
                </div>
              </li-->

            </ul>

            <!-- Search -->
            <form
              class="form-light ms-lg-auto me-lg-4 mt-4 mb-3 my-lg-0 order-lg-2_"
            >
              <div id="search-inner" class="input-group input-group-inline shadow-none">
                <span
                  class="
                    input-group-text
                    bg-transparent
                    border-0
                    shadow-none
                    ps-0
                    pe-3
                  "
                >
                  <i class="far fa-search"></i>
                </span>
                <input
                  type="text"
                  class="
                    form-control form-control-flush
                    bg-transparent
                    border-0
                  "
                  id="search"
                  placeholder="Rechercher sur le site ..."
                  aria-label="Search"
                  aria-describedby=""
                  data-docs-version="1.0"
                />
              </div>
            </form>
             <inertia-link class="btn btn-danger float-right p-1 px-3"  v-bind:class="[this.menu=='Commande' ? 'active' : '', '']" :href="route('commander.service')">
               <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                </inertia-link>
          </div>

          <div
            class="
              navbar-nav
              order-lg-5
              ps-lg-4
              ms-auto
              d-none d-lg-inline-flex
              align-items-center
            "
          >

          <!-- Collapse -->
          <ul  v-if="$page.props.jetstream.hasTeamFeatures &&  $page.props.user" class="navbar-nav ml-auto align-items-baseline">
            <!-- Team Management -->
            <jet-dropdown class="shadow par-0"
              id="teamManagementDropdown"

            >
              <template #trigger>
                 <img v-if="$page.props.jetstream.managesProfilePhotos" class="rounded-circle me-2" width="30" height="30" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                
               <span :title="$page.props.user.current_team.name"> {{ $page.props.user.name }}</span>

               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
              </template>

              <template v-if="$page.props.user"  #content>
                <!-- Team Management -->
                <template  v-if="$page.props.jetstream.hasTeamFeatures && $page.props.user!=null">
                <!-- Account Management -->
                <h6 class="dropdown-header small text-muted">Manage Account</h6>

                <jet-dropdown-link :href="route('dashboard')">
                  Administration
                </jet-dropdown-link>
                <jet-dropdown-link :href="route('profile.show')">
                  Profile
                </jet-dropdown-link>

                <jet-dropdown-link
                  :href="route('api-tokens.index')"
                  v-if="$page.props.jetstream.hasApiFeatures"
                >
                  API Tokens
                </jet-dropdown-link>


                  <h6 class="dropdown-header">Manage Team</h6>

                  <!-- Team Settings -->
                  <jet-dropdown-link
                    :href="route('teams.show', $page.props.user.current_team)"
                  >
                    Team Settings
                  </jet-dropdown-link>

                  <jet-dropdown-link
                    :href="route('teams.create')"
                    v-if="$page.props.jetstream.canCreateTeams"
                  >
                    Create New Team
                  </jet-dropdown-link>

                  <hr class="dropdown-divider" />

                  <!-- Team Switcher -->
                  <h6 class="dropdown-header">Switch Teams</h6>

                  <template
                    v-for="team in $page.props.user.all_teams"
                    :key="team.id"
                  >
                    <form @submit.prevent="switchToTeam(team)">
                      <jet-dropdown-link as="button">
                        <div class="d-flex">
                          <svg
                            v-if="team.id == $page.props.user.current_team_id"
                            class="mr-1 text-success"
                            width="20"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                          >
                            <path
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                            ></path>
                          </svg>

                          <span>{{ team.name }}</span>
                        </div>
                      </jet-dropdown-link>
                    </form>
                  </template>
                <hr class="dropdown-divider" />

                <!-- Authentication -->
                <form @submit.prevent="logout">
                  <jet-dropdown-link as="button"> <i class="fa fa-sign-out" aria-hidden="true"></i> Se déconnecter </jet-dropdown-link>
                </form>
                </template>
              </template>
            </jet-dropdown>
          </ul>

            <inertia-link  v-if="!$page.props.user" href="/nous-rejoindre" class="nav-link text-nowrap me-n5">
              {{('Nous rejoindre')}} <i class="far fa-long-arrow-right ms-2"></i>
            </inertia-link>


            <!-- Right navigation -->
            <!--div class="navbar-nav ms-lg-4">
                <inertia-link class="nav-item nav-link" href="#">Se connecter</inertia-link>
            </div>
            <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
                <inertia-link href="#" class="btn btn-sm btn-neutral w-full w-lg-auto">
                    S'enrégistrer
                </inertia-link>
            </div-->
          </div>
        </div>
      </nav>
      <!-- Mobile -->
      <div
        id="mobile_nav"
        tabindex="-1"
        aria-labelledby="mobile_nav"
        aria-hidden="true"
        class="modal hide fade in"
        data-keyboard="false"
        data-backdrop="static"
      >
        <div class="modal-dialog shadow-4 w-auto max-w-full_ max-w-xl-screen-md mx-auto _mx-sm-2">
          <div class="modal-content rounded-xl">
            <div class="p-1">
              <div class="px-6 pt-4 position-relative">
                <!-- Logo -->
                <a class="navbar-brand" href="/">
                  <div class="w-md-auto text-dark">
                    <img
                      id="mobile-logo"
                      src="../../../public/storage/assets/web/image/logo-odacesoft-for-mobile.jpg"
                      alt="Odacesoft"
                    />
                  </div>
                </a>

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
                <!--ul class="navbar-nav flex-row flex-wrap pt-4 py-lg-0">
                  <li class="nav-item col-6 col-lg-auto">
                    <inertia-link class="nav-link py-2" href="/"
                      >{{__('Accueil')}}</inertia-link
                    >
                  </li>
                   <li class="nav-item col-6 col-lg-auto">
                    <inertia-link class="nav-link py-2" :href="route('activites')"
                      >{{('Activités')}}</inertia-link>

                  </li>
                  <li class="nav-item col-6 col-lg-auto">
                    <inertia-link class="nav-link py-2" :href="route('partenaires')"
                      >{{('Partenaires')}}</inertia-link>

                  </li>
                  <li class="nav-item col-6 col-lg-auto">
                    <inertia-link class="nav-link py-2" :href="route('programmes')"
                      >{{('Programmes')}}</inertia-link>

                  </li>
                     <li class="nav-item col-6 col-lg-auto">
                    <inertia-link class="nav-link py-2" :href="route('projets')"
                      >{{('Projets')}}</inertia-link>

                  </li>
                  <li class="nav-item col-6 col-lg-auto">
                    <inertia-link class="nav-link py-2" :href="route('contact')"
                      >{{('Contact')}}</inertia-link>

                  </li>
                  <li class="nav-item col-6 col-lg-auto">
                    <inertia-link class="nav-link py-2"  :href="route('ressources')"
                      >{{('Resources')}}</inertia-link>

                  </li>
                  <li class="nav-item col-6 col-lg-auto">
                    <inertia-link class="nav-link py-2" :href="route('blog')"
                      >{{('Blog')}}</inertia-link>

                  </li>
                </ul-->
                <hr class="mb-0 mt-3" />
                <ul class="navbar-nav row flex-row flex-wrap ms-llg-auto">
                <li class="nav-item col-12 col-lg-auto border-bottom py-1">
                    <inertia-link
                      :href="route('accueil')"
                      class="nav-link b-1"
                      role="button"
                    >
                      <div class="d-flex">
                        <div>
                          <div class="icon text-dark mt-1 text-lg lh-snug">
                            <i class="fas fa-home"></i>
                          </div>
                        </div>
                        <div class="ps-4">
                          <span class="d-block mb-0"
                            >{{('Accueil')}}</span
                          >
                           <p class="text-xs text-muted">
                           Aller à la page d'accueil
                          </p>
                        </div>
                      </div>
                    </inertia-link>
                  </li>
                  <li class="nav-item col-12 col-lg-auto border-bottom py-1">
                    <inertia-link
                      :href="('services')"
                      class="nav-link b-1"
                      role="button"
                    >
                      <div class="d-flex">
                        <div>
                          <div class="icon text-success mt-1 text-lg lh-snug">
                            <i class="fa fa-object-group"></i>
                          </div>
                        </div>
                        <div class="ps-4">
                          <span class="d-block mb-0"
                            >{{('Services')}}</span
                          >
                          <p class="text-xs text-muted">
                            {{('Découvrez nos différents services')}}
                          </p>
                        </div>
                      </div>
                    </inertia-link>
                  </li>
                  <li class="nav-item col-12 col-lg-auto border-bottom py-1">
                    <inertia-link
                      :href="route('projets')"
                      class="nav-link b-1"
                      role="button"
                    >
                      <div class="d-flex">
                        <div>
                          <div class="icon text-danger mt-1 text-lg lh-snug">
                            <i class="fas fa-database"></i>
                          </div>
                        </div>
                        <div class="ps-4">
                          <span class="d-block mb-0"
                            >{{('Projets')}}</span
                          >
                          <p class="text-xs text-muted">
                            {{('Nos projets et programmes')}}
                          </p>
                        </div>
                      </div>
                    </inertia-link>
                  </li>
                  <li class="nav-item col-12 col-lg-auto border-bottom py-1">
                    <inertia-link
                      :href="route('realisations')"
                      class="nav-link b-1"
                      role="button"
                    >
                      <div class="d-flex">
                        <div>
                          <div class="icon text-dark-80 mt-1 text-lg lh-snug">
                            <i class="fas fa-tachometer"></i>
                          </div>
                        </div>
                        <div class="ps-4">
                          <span class="d-block mb-0"
                            >{{('Réalisations')}}</span
                          >
                          <p class="text-xs text-muted">
                            {{('Découvrez nos réalisations et prestations.')}}
                          </p>
                        </div>
                      </div>
                    </inertia-link>
                  </li>
                  <li class="nav-item col-12 col-lg-auto border-bottom py-1">
                    <inertia-link
                      :href="route('activites')"
                      class="nav-link b-1"
                      role="button"
                    >
                      <div class="d-flex">
                        <div>
                          <div class="icon text-warning mt-1 text-lg lh-snug">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                          </div>
                        </div>
                        <div class="ps-4">
                          <span class="d-block mb-0"
                            >{{('Activités')}}</span
                          >
                          <p class="text-xs text-muted">
                            {{('Nos activités et actions au service de la communauté')}}
                          </p>
                        </div>
                      </div>
                    </inertia-link>
                  </li>
                  <li class="nav-item col-12 col-lg-auto border-bottom py-1">
                    <inertia-link
                      :href="route('blog')"
                      class="nav-link b-1"
                      role="button"
                    >
                      <div class="d-flex">
                        <div>
                          <div class="icon text-primary mt-1 text-lg lh-snug">
                            <i class="fa fa-newspaper" aria-hidden="true"></i>
                          </div>
                        </div>
                        <div class="ps-4">
                          <span class="d-block mb-0"
                            >{{('Blog')}}</span
                          >
                          <p class="text-xs text-muted">
                            {{('Pour vous faire découvrir de nouvelles choses.')}}
                          </p>
                        </div>
                      </div>
                    </inertia-link>
                  </li>
                  <li class="nav-item col-12 col-lg-auto border-bottom py-1">
                    <inertia-link
                      :href="('contact')"
                      class="nav-link b-1"
                      role="button"
                    >
                      <div class="d-flex">
                        <div>
                          <div class="icon text-success rotate-90 rotate mt-1 text-lg lh-snug">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                          </div>
                        </div>
                        <div class="ps-4">
                          <span class="d-block mb-0"
                            >{{('Contactez-nous')}}</span
                          >
                          <p class="text-xs text-muted">
                            {{('Devenez partenaire ou envoyez nous un message.')}}
                          </p>
                        </div>
                      </div>
                    </inertia-link>
                  </li>
                  <!--li class="nav-item col-12 col-lg-auto border-bottom py-1">
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
                      :href="route('s-entreprises')"
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
                      :href="route('services')"
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
                          <span class="d-block mb-0">{{('Tous les services')}}</span>
                          <p class="text-xs text-muted">
                            {{('Le meilleur choix qui déterminera vos résultats.')}}
                          </p>
                        </div>
                      </div>
                    </inertia-link>
                  </li-->
                </ul>
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
    </header>
  </div>
</template>
<script>
import JetDropdown from '@/Jetstream/Dropdown'
import JetDropdownLink from '@/Jetstream/DropdownLink'
import JetNavLink from '@/Jetstream/NavLink'

export default {
    metaInfo: {
    title: 'Default App Title',
    titleTemplate: '%s | vue-meta Example App'
  },
  components: {
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
  },
   methods: {
    switchToTeam(team) {
      this.$inertia.put(route('current-team.update'), {
        'team_id': team.id
      }, {
        preserveState: false
      })
    },

    logout() {
      this.$inertia.post(route('logout'));
    },
  },
  computed: {
    path() {
      return window.location.pathname
    }
  },
  props: ["menu"]
  ,
};
window.axeptioSettings = {
  clientId: "62239cfcbf278adaa658b910",
  cookiesVersion: "odacesoft-fr",
};
 
(function(d, s) {
  var t = d.getElementsByTagName(s)[0], e = d.createElement(s);
  e.async = true; e.src = "//static.axept.io/sdk.js";
  t.parentNode.insertBefore(e, t);
})(document, "script");

</script>