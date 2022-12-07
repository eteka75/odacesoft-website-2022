<template>
  <div id="app" class="d-flex flex-column min-h-screen">
    <Notification />
    <!-- Page Content -->
    <Admin-Header/>
    <div id="app" class="d-flex flex-column min-h-screen">
      <main class="d-flex flex-grow-1">
        <div class="w-full">
          <div class="container-fluid">
            <div class="d-lg-flex">
              <!-- Sidebar -->
              <Admin-Sidebar menu="menu" parent="parent" />
              <!-- Content -->
              <div
                class="
                  min-w-0
                  w-full
                  flex-fill
                  max-h-full
                  overflow-visible
                "
              >
                <div class="d-flex max-w-screen-xl col-xl-12">
                  <div class="min-w-0 col   bg-gray-100  ">
                    <main class="min-h"><slot></slot></main>

                  </div>

                </div>
                <div class="border-tops d-flex max-w-screen-xl">
                      <div class="text-xs py-4 px-4 px-lg-10 text-right text-muted pt-3">
                        &copy; {{ new Date().getFullYear() }} Copyright
                        Odacesoft
                      </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>
<script>
import { Head } from "@inertiajs/inertia-vue3";
import Notification from "@/Components/Notification";
import AdminHeader from "@/Components/AdminHeader";
import AdminSidebar from "@/Components/AdminSidebar";

export default {
  components: {
    Notification,
    AdminHeader,
    AdminSidebar,
  },
  data() {
    return {
      showingNavigationDropdown: false,
      menu: "tb",
      parent: "Web",
    };
  },
  mounted() {
    this.initMenu();
  },

  methods: {
    switchToTeam(team) {
      this.$inertia.put(
        route("current-team.update"),
        {
          team_id: team.id,
        },
        {
          preserveState: false,
        }
      );
    },

    logout() {
      this.$inertia.post(route("logout"));
    },
  },

  computed: {
    path() {
      return window.location.pathname;
    },
  },
};
</script>

<style>
    .nav-link.active{
    color:#0090ff !important
    }
    .min-h{
    min-height: 500px;
    }
    .main-content{
    min-height: 34em;
    padding:0 2em 4em;
    }
</style>
