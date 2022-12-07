<template>
  <div>
    <div
      class="group-navigation group-navbar component-navbar-1"
      id="component-shot"
    >
      <nav
        class="
          navbar navbar-expand-lg navbar-light
          border-bottom
          bg-white
          px-0
          py-1
          fixed-top
          position-lg-sticky
          top-lg-10
        "
      >
        <div class="container-fluid">
          <!-- Logo -->
          <a class="navbar-brand" href="/">
            <div class="w-md-auto text-dark">
              <img
                id="mobile-logo"
                src="/storage/assets/web/image/logo-odacesoft-admin.png"
                alt="Odacesoft"
              />
            </div>
          </a>

          <!-- Collapse -->
          <ul class="navbar-nav ml-auto align-items-baseline">
            <!-- Team Management -->
            <jet-dropdown class="shadow par-0"
              id="teamManagementDropdown"
              v-if="$page.props.jetstream.hasTeamFeatures"
            >
              <template #trigger>
                 <img v-if="$page.props.jetstream.managesProfilePhotos" class="rounded-circle me-2" width="32" height="32" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                <span :title="$page.props.user.current_team.name"> {{ $page.props.user.name }}</span>
                
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
              </template>

              <template  #content>
                <!-- Team Management -->
                <template v-if="$page.props.jetstream.hasTeamFeatures">
                <!-- Account Management -->
                <h6 class="dropdown-header small text-muted">Manage Account</h6>

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

            <!-- Authentication Links -->
            <!--jet-dropdown id="settingsDropdown">
              <template #trigger>
                <img
                  v-if="$page.props.jetstream.managesProfilePhotos"
                  class="rounded-circle"
                  width="32"
                  height="32"
                  :src="$page.props.user.profile_photo_url"
                  :alt="$page.props.user.name"
                />

                <span v-else>
                  {{ $page.props.user.name }}

                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </span>
              </template>

              <template #content>
                <h6 class="dropdown-header small text-muted">Manage Account</h6>

                <jet-dropdown-link :href="route('profile.show')">
                  Profile
                </jet-dropdown-link>

                <jet-dropdown-link
                  :href="route('api-tokens.index')"
                  v-if="$page.props.jetstream.hasApiFeatures"
                >
                  API Tokens
                </jet-dropdown-link>

                <hr class="dropdown-divider" />

                <form @submit.prevent="logout">
                  <jet-dropdown-link as="button"> Log out </jet-dropdown-link>
                </form>
              </template>
            </jet-dropdown-->
          </ul>
          <!-- Navbar toggle -->
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>
    </div>
  </div>
</template>

<script>
import JetDropdown from '@/Jetstream/Dropdown'
import JetDropdownLink from '@/Jetstream/DropdownLink'
import JetNavLink from '@/Jetstream/NavLink'

export default {
  components: {
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
  },

  data() {
    return {
      showingNavigationDropdown: false,
    }
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
</script>

<style>
    img#mobile-logo{
    height:22px !important;
    margin-bottom: 5px;
    }
    .par-0{
        right:0 !important;
        margin-top:5px
    }
    .dropdown-item{      
    padding: 0.1rem 1rem !important;
    }
</style>
