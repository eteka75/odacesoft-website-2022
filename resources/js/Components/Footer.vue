<template>
  <div class="bg-gray-100 border-top border-bottom ">
    <footer class="">
      <div class="container max-w-screen-xl">
        <div class="pt-0 ">

          <div class="row my-7 align-content-center g-5">
            <div class="col px-md-30 px-lg-40 px-xl-60">
              <div class="row">
                 <div class="col-md-4 col-xs-12">
              <h6 class="h4 mb-3">A propos</h6>
              <ul class="list-unstyled p-0">
                <li>
                  <inertia-link class="nav-link px-0" href="/a-propos"
                    >A propos</inertia-link
                  >
                </li>
                <li>
                  <inertia-link class="nav-link px-0" href="/services"
                    >Services</inertia-link
                  >
                </li>
                <li>
                  <inertia-link class="nav-link px-0" href="/partenaires"
                    >Partenaires</inertia-link
                  >
                </li>
                <li>
                  <inertia-link class="nav-link px-0" href="/projets"
                    >Projets</inertia-link
                  >
                </li>
                <li>
                  <inertia-link class="nav-link px-0" href="/team"
                    >Notre équipe</inertia-link
                  >
                </li>
                <li>
                  <inertia-link class="nav-link px-0" href="/evenements"
                    >Evènements</inertia-link
                  >
                </li>
                
              </ul>
            </div>
            <div class="col-md-4 col-xs-12">
              <h6 class="h4  mb-3">Aide</h6>
              <ul class="list-unstyled p-0">
               <li>
                  <inertia-link class="nav-link px-0" href="/blog"
                    >Le Blog</inertia-link
                  >
                </li>
                <li>
                  <inertia-link class="nav-link px-0" href="/mes-commandes"
                    >Mes commandes</inertia-link
                  >
                </li>
                <li>
                  <inertia-link class="nav-link px-0" href="/ressources"
                    >Ressources utiles</inertia-link
                  >
                </li>

              <li>
                  <inertia-link  class="nav-link px-0" href="/help"
                    >Aide et Assistance</inertia-link
                  >
                </li>

                <li>
                  <inertia-link class="nav-link px-0" href="/faq"
                    >Forum aux questions (FAQ)</inertia-link
                  >
                </li>


                <li>
                  <inertia-link class="nav-link px-0" href="/contact"
                    >Nous contacter</inertia-link
                  >
                </li>

              </ul>
            </div>
            <div class="col-md-4 col-xs-12">
              <h6 class="h4  mb-3">Rester en contact avec nous</h6>
              <ul class="list-unstyled p-0">
                <li>
                  <a class="nav-link px-0" href="https://facebook.com/Odacesoft"
                    target="_blanck" >Rejoignez nous sur Facebook</a>
                </li>
                <li>
                  <a class="nav-link px-0" href="https://twitter.com/Odacesoft"
                    target="_blanck" >Suivez-nous sur Twitter</a>
                </li>
                <li>
                  <a class="nav-link px-0" href="https://linkedin.com/company/Odacesoft"
                    target="_blanck" >Abonnez-vous sur LinkedIn</a>
                </li>
                <li>
                  <inertia-link class="nav-link px-0" href="/join"
                    >Intéger le groupe WhatsApp</inertia-link>
                </li>
                <li>
                  <inertia-link class="nav-link px-0 border-sm-light d-flex" href="/galerie-images"
                    >Explorer nos images</inertia-link>
                </li>
                <!--li>
                  <inertia-link class="nav-link px-0" href="/register"
                    >Rejoignez-nous,créez un compte</inertia-link
                  >
                </li-->


              </ul>
            </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </footer>
    <div class="bg-white border-top">
      <div class="container max-w-screen-xl">
        <div class="row align-items-center justify-content-md-between pt-3 pb-5">
          <div class="col-md-7 col-12 col-xl-7">
            <div class="copyright text-sm text-center text-md-start">
            <span class="d-xs-block d-md-none"></span> <inertia-link href="/terms" class="h6 text-sm text-primary">Terms</inertia-link>
              &nbsp;&nbsp; <inertia-link href="/privacy" class="h6 text-primary text-sm">Conditions de confidentialité</inertia-link> &nbsp;&nbsp; <inertia-link href="plan-du-site" class="h6 text-sm text-primary">Plan du site</inertia-link>

              <br> &copy; 2015-2022
              Odacesoft. Tout droit réservé. 
            </div>
          </div>
          <div class="col-md-5 col-xl-5">
            <ul
              class="
                nav
                justify-content-center justify-content-md-end
                mt-3 mt-md-0
                mx-n3 d-flex text-start text-sm-center text-sm-center
              "
            >
              <li class="nav-item" v-if='$page.props.user'>
                <a class="nav-link text-muted text-hover-success d-xs-inline-block text-sm" :href="route('register')"> <i class="far fa-users" aria-hidden="true"></i> Créer un compte</a>
              </li>
              <li class="nav-item d-none d-md-inline-flex mt-2" v-if='!$page.props.user'>
                <a class="nav-link text-muted  text-sm" :href="route('login')"> S'identifier</a>
              </li>
              <li class="nav-item">
                  <a
                    href="https://github.com/odacesoft"
                    rel="noopener"
                    class="nav-link text-lg text-dark-hover text-muted"
                    target="_blank"  title="GitHub"  alt="GitHub"
                  >
                    <i class="fab text-black-hover fa-github"></i>
                  </a>
                </li>
                <!--li class="nav-item">
                  <a
                    href="https://dribbble.com/odacesoft"
                    class="nav-link text-lg text-muted"
                    target="_blank"
                  >
                    <i class="fab fa-dribbble"></i>
                  </a>
                </li-->

                <li class="nav-item">
                  <a
                    href="https://linkedin.com/company/odacesoft"
                    class="nav-link text-lg px-sm-1 px-md-2 text-info-hover text-muted" title="LinkedIn"  alt="LinkedIn"
                    target="_blank" rel="noopener"
                  >

                    <i class="fab text-primary-hover fa-linkedin"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    href="https://twitter.com/odacesoft"
                    class="nav-link text-lg text-info-hover text-muted"
                    target="_blank" rel="noopener"  title="Twitter"  alt="Twitter"
                  >
                    <i class="fab text-info-hover fa-twitter"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    href="https://www.youtube.com/channel/UC_A-w6yMj3cMtAVoeXifFBQ"
                    class="nav-link text-lg text-danger-hover text-muted"
                    target="_blank" rel="noopener"  title="YouTube"  alt="Youtube"
                  >
                    <i class="fab text-danger-hover fa-youtube"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    href="https://facebook.com/Odacesoft"
                    class="nav-link text-lg text-muted" rel="noopener"
                    target="_blank"  title="Facebook"  alt="Facebook"
                  >
                    <i class="fab text-primary-hover fa-facebook"></i>
                  </a>
                </li>

              <!--li class="nav-item">
                <a class="nav-link text-muted" href="license.html">Licenses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-muted" href="terms.html">Terms</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-muted" href="privacy.html">Privacy</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-muted pr-0" href="cookies.html"
                  >Cookies</a
                >
              </li-->
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  setup() {},
};
</script>
