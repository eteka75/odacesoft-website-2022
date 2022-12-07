<template>
  <div>
    <div
      class="w-full w-lg-56 flex-none d-lg-block collapse"
      id="docsSidenavCollapse"
    >
      <div class="position-lg-sticky top-lg-0">
        <div
          class="overflow-y-auto scrollnav border-end-lg pe-7 h-lg-calc"
          style="--w-h-lg: 73px"
        >
          <div class="d-lg-block pb-6 pt-5 ms-n2">
            <ul class="nav d-block mb-3">
              <li class="nav-item d-flex">
                <inertia-link
                  :href="route('dashboard')"
                  class="
                    nav-link
                    text-uppercase text-xs text-heading
                    px-2
                    mb-2
                    font-bold
                    ls-wider
                  "
                  :class="[ this.$page.props.menu == 'tb' ? 'active' : '', '']"

                >
                  <i class="far fa-home" aria-hidden="true"></i>
                  Tableau de board
                </inertia-link>
              </li>
            </ul>
            <div
              class="
                d-flex
                align-items-center
                text-xs text-heading
                font-bold
                ls-wider
                text-uppercase
                mb-2
                px-2
              "
              data-bs-toggle="collapse"
              href="#collapse-getting-started"
              role="button"
              aria-expanded="true"
              aria-controls="collapse-getting-started"
            >
              <div><i class="far fa-globe"></i> LE SITE WEB</div>
              <div class="ms-auto text-muted">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="14"
                  height="14"
                  fill="currentColor"
                  class="bi bi-chevron-down me-n4"
                  viewBox="0 0 16 16"
                >
                  <path
                    fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
                  ></path>
                </svg>
              </div>
            </div>
            <div
              class="collapse"
              :class="[ this.$page.props.hmenu == 'Web' || this.$page.props.menu == 'thb' ? 'show' : '', '']"
              id="collapse-getting-started"
            >
              <ul class="nav flex-column">

                <li class="nav-item">
                  <inertia-link :href="route('page.index')"  :class="[this.$page.props.menu == 'page' ? 'active' : '', '']" class="nav-link px-2 py-2">
                    Gestion des pages
                  </inertia-link>
                </li>
                <li class="nav-item">
                  <inertia-link :href="route('activite.index')"  :class="[this.$page.props.menu == 'act' ? 'active' : '', '']"  class="nav-link px-2 py-2">
                    Activités
                  </inertia-link>
                </li>
                 <li class="nav-item">
                  <inertia-link :href="route('slide.index')"  :class="[this.$page.props.menu == 'slide' ? 'active' : '', '']"  class="nav-link px-2 py-2">
                    Slides
                  </inertia-link>
                </li>
                <li class="nav-item">
                  <inertia-link :href="route('programme.index')"  :class="[this.$page.props.menu == 'prog' ? 'active' : '', '']"  class="nav-link px-2 py-2">
                    Programmes
                  </inertia-link>
                </li>
                <li class="nav-item">
                  <inertia-link :href="route('ressource.index')"  :class="[this.$page.props.menu == 'rsc' ? 'active' : '', '']"  class="nav-link px-2 py-2">
                    Ressources
                  </inertia-link>
                </li>

                <li class="nav-item">
                  <inertia-link :href="route('partenaire.index')"  :class="[this.$page.props.menu == 'prt' ? 'active' : '', '']"  class="nav-link px-2 py-2">
                    Partenaires
                  </inertia-link>
                </li>

                <li class="nav-item">
                  <inertia-link :href="route('evenement.index')"  :class="[this.$page.props.menu == 'event' ? 'active' : '', '']"  class="nav-link px-2 py-2">
                    Evènements
                  </inertia-link>
                </li>
                 <li class="nav-item">
                  <inertia-link :href="route('email.index')" :class="[this.$page.props.menu == 'eml' ? 'active' : '', '']"  class="nav-link px-2 py-2">
                    Email
                  </inertia-link>
                </li>
              </ul>
            </div>
            <div
              class="
                d-flex
                align-items-center
                text-xs text-heading
                font-bold
                ls-wider
                text-uppercase
                mb-2
                px-2
                mt-8
              "
              data-bs-toggle="collapse"
              href="#collapse-blog"
              role="button"
              aria-expanded="true"
              aria-controls="collapse-blog"
            >
              <div><i class="far fa-newspaper"></i> LE BLOG</div>
              <div class="ms-auto text-muted">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="14"
                  height="14"
                  fill="currentColor"
                  class="bi bi-chevron-down me-n4"
                  viewBox="0 0 16 16"
                >
                  <path
                    fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
                  ></path>
                </svg>
              </div>
            </div>
            <div
              class="collapse"
              :class="[ this.$page.props.hmenu == 'Blog' ? 'show' :  this.$page.props.hmenu]"
              id="collapse-blog"
            >
              <ul class="nav flex-column">
                <li class="nav-item">
                  <inertia-link
                    href="/dashboard/article"
                    class="nav-link px-2 py-2"
                    :class="[ this.$page.props.menu == 'art' ? 'active' : '', '']"
                  >
                    Mes articles
                  </inertia-link>
                </li>
                <li class="nav-item">
                  <inertia-link :class="[ this.$page.props.menu== 'ac' ? 'active' : '', '']" :href="route('categorie-article.index')" class="nav-link px-2 py-2">
                    Catégories d'articles
                  </inertia-link>
                </li>
                <li class="nav-item">
                  <inertia-link  :class="[ this.$page.props.menu== 'mtc' ? 'active' : '', '']" :href="route('tags.index')" class="nav-link px-2 py-2">
                    Mots clés
                  </inertia-link>
                </li>
                <!--li class="nav-item">
                  <inertia-link   :class="[ this.$page.props.menu== 'sta' ? 'active' : '', '']" :href="route('statistique.index')" class="nav-link px-2 py-2">
                    Statistiques
                  </inertia-link>
                </li-->
              </ul>
            </div>
            <div
              class="
                d-flex
                align-items-center
                text-xs text-heading
                font-bold
                ls-wider
                text-uppercase
                mb-2
                px-2
                mt-8
              "
              data-bs-toggle="collapse"
              href="#collapse-services"
              role="button"
              aria-expanded="true"
              aria-controls="collapse-services"
            >
              <div><i class="far fa-tasks"></i> Services</div>
              <div class="ms-auto text-muted">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="14"
                  height="14"
                  fill="currentColor"
                  class="bi bi-chevron-down me-n4"
                  viewBox="0 0 16 16"
                >
                  <path
                    fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
                  ></path>
                </svg>
              </div>
            </div>
            <div class="collapse"
            :class="[ this.$page.props.hmenu == 'Serv' ? 'show' : '']"
             id="collapse-services">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <inertia-link
                    :href="route('service.index')"
                    class="nav-link px-2 py-2"
                    :class="[ this.$page.props.menu== 'so' ? 'active' : '', '']"
                  >
                    Services offerts
                  </inertia-link>
                </li>
                <li class="nav-item">
                  <inertia-link  :class="[ this.$page.props.menu== 'ctserv' ? 'active' : '', '']" :href="route('categorie-service.index')"  class="nav-link px-2 py-2">
                    Catégories de services
                  </inertia-link>
                </li>

                <li class="nav-item">
                  <inertia-link  :class="[ this.$page.props.menu== 'meq' ? 'active' : '', '']" :href="route('membre.index')" class="nav-link px-2 py-2">
                    Membres de l'équipe
                  </inertia-link>
                </li>
                <li class="nav-item">
                  <inertia-link  :class="[ this.$page.props.menu== 'stag' ? 'active' : '', '']" :href="route('stagiaire.index')"  class="nav-link px-2 py-2">
                    Stagiaires
                  </inertia-link>
                </li>
                <li class="nav-item">
                  <inertia-link  :class="[ this.$page.props.menu== 'cmd' ? 'active' : '', '']" :href="route('commande.index')"  class="nav-link px-2 py-2">
                    Commandes
                  </inertia-link>
                </li>
                <li class="nav-item">
                  <inertia-link  :class="[ this.$page.props.menu== 'real' ? 'active' : '', '']" :href="route('realisation.index')"  class="nav-link px-2 py-2">
                    Réalisations
                  </inertia-link>
                </li>
                <li class="nav-item">
                  <inertia-link  :class="[ this.$page.props.menu== 'gimg' ? 'active' : '', '']" :href="route('galerie-image.index')"  class="nav-link px-2 py-2">
                    Galeries image
                  </inertia-link>
                </li>
                <li class="nav-item">
                  <inertia-link  :class="[ this.$page.props.menu== 'msg' ? 'active' : '', '']" :href="route('message.index')"  class="nav-link px-2 py-2">
                    Messages
                  </inertia-link>
                </li>
                <li class="nav-item">
                  <inertia-link  :class="[ this.$page.props.menu== 'adh' ? 'active' : '', '']" :href="route('adherant.index')"  class="nav-link px-2 py-2">
                    Adhésions
                  </inertia-link>
                </li>
                <li class="nav-item">
                  <inertia-link  :class="[ this.$page.props.menu== 'pjt' ? 'active' : '', '']" :href="route('projet.index')"  class="nav-link px-2 py-2">
                    Projets
                  </inertia-link>
                </li>

                <li class="nav-item">
                  <inertia-link  :class="[ this.$page.props.menu== 'faq' ? 'active' : '', '']" :href="route('faq.index')" class="nav-link px-2 py-2"> FAQ </inertia-link>
                </li>
              </ul>
            </div>
            <div
              class="
                d-flex
                align-items-center
                text-xs text-heading
                font-bold
                ls-wider
                text-uppercase
                mb-2
                px-2
                mt-8
              "
              data-bs-toggle="collapse"
              href="#collapse-layout"
              role="button"
              aria-expanded="true"
              aria-controls="collapse-layout"
            >
              <div><i class="far fa-users"></i> Les utilisateurs</div>
              <div class="ms-auto text-muted">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="14"
                  height="14"
                  fill="currentColor"
                  class="bi bi-chevron-down me-n4"
                  viewBox="0 0 16 16"
                >
                  <path
                    fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
                  ></path>
                </svg>
              </div>
            </div>
            <div class="collapse" :class="[ this.$page.props.hmenu == 'User' ? 'show' : '', '']" id="collapse-layout">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <inertia-link :href="route('users.index')" class="nav-link px-2 py-2"  :class="[this.menu == 'usr' ? 'active' : '', '']">
                    Gestion des utilisateurs
                  </inertia-link>
                </li>
                <!--li class="nav-item">
                  <inertia-link href="gutters.html" class="nav-link px-2 py-2"> Rôles </inertia-link>
                </li>
                <li class="nav-item">
                  <inertia-link href="columns.html" class="nav-link px-2 py-2">
                    Statistiques
                  </inertia-link>
                </li-->
              </ul>
            </div>
            <div
              class="
                d-flex
                align-items-center
                text-xs text-heading
                font-bold
                ls-wider
                text-uppercase
                mb-2
                px-2
                mt-8
              "
              data-bs-toggle="collapse"
              href="#collapse-utilities"
              role="button"
              aria-expanded="true"
              aria-controls="collapse-utilities"
            >
              <div><i class="fa fa-cog" aria-hidden="true"></i> Paramètres</div>
              <div class="ms-auto text-muted">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="14"
                  height="14"
                  fill="currentColor"
                  class="bi bi-chevron-down me-n4"
                  viewBox="0 0 16 16"
                >
                  <path
                    fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
                  ></path>
                </svg>
              </div>
            </div>
            <div class="collapse" :class="[ this.$page.props.hmenu == 'Param' ? 'show' : '', '']" id="collapse-utilities">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <inertia-link href="backgrounds.html" class="nav-link px-2 py-2">
                    Paramètres du site
                  </inertia-link>
                </li>
                <li class="nav-item">
                  <a href="borders.html" class="nav-link px-2 py-2">
                   Autres paramètres
                  </a>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      menu: null,
      parent: null,
    };
  },

  mounted() {
    this.menu = this.$page.props.menu;
    this.parent = this.$page.props.hmenu;
  },
};
</script>
<style>
.nav-link.active{
    background: #f5f9fc;
    padding-left: 20px !important;
    font-weight: bolder;

}
</style>
