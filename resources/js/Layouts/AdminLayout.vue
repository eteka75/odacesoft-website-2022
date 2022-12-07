<template>
  <div id="app" class="d-flex flex-column min-h-screen">
    <Notification />
    <!-- Page Content -->
    <admin-header menu="tb"/>
    <div id="app" class="d-flex flex-column min-h-screen">
      <main class="d-flex flex-grow-1">
        <div class="w-full">
          <div class="container-fluid">
            <div class="d-lg-flex">
              <!-- Sidebar -->
              <Admin-Sidebar  />
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
                <div class="d-flex max-w-screen-xl_ col-xl-12">
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
import Notification from "@/Components/Notification";
import AdminSidebar from "@/Components/AdminSidebar";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetNavLink from "@/Jetstream/NavLink";
import AdminHeader from '../Components/AdminHeader.vue';

export default {
  components: {
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    Notification,
    AdminHeader,
    AdminSidebar,
  },

  data() {
 return {
      showingNavigationDropdown: false,
      m: null,
      p: null,
    };
  },
  mounted() {
      this.m=this.$page.props.menu;
      this.p=this.$page.props.hmenu;
     // alert(this.m)
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

<style >

.note-editor.note-airframe .note-statusbar .note-resizebar, .note-editor.note-frame .note-statusbar .note-resizebar,
.note-editor.note-airframe, .note-editor.note-frame,.note-editor .note-toolbar, .note-popover .popover-content {

    background: #FFF;
    border-bottom: 1px solid #e7eaf0;
}
.note-editor.note-airframe, .note-editor.note-frame{
    border-radius:3px;

    border: 1px solid #e7eaf0;
}
    .nav-link.active{
    color:#0090ff !important
    }
    .min-h{
    min-height: 500px;
    }
    .main-content{
    min-height: 34em !important;
    padding:0 1em;
    }


.imagePreviewWrapper {
  width: 250px;
  height: 250px;
  display: block;
  cursor: pointer;
  margin: 0 auto 0px;
  border: 2px dashed #ccc;
  background-size: cover;
  background-position: center center;
}

/*.note-editor .note-toolbar .note-dropdown-menu, .note-popover .popover-content .note-dropdown-menu{max-width:200px}*/
/*
 * bootstrap-tagsinput v0.8.0
 *
 */

.bootstrap-tagsinput {
  background-color: #fff;
  border: 1px solid #eee9e9;
  /*box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);*/
  display: inline-block;
  padding: 5px 8px;
  color: #555;
  vertical-align: middle;
  border-radius: 3px;
  width: 100%;
  line-height: 25px;
  cursor: text;
}
.bootstrap-tagsinput input {
  border: none;
  box-shadow: none;
  outline: none;
  background-color: transparent;
  padding: 0 6px;
  margin: 0;
  width: auto;
  max-width: inherit;
}
.bootstrap-tagsinput.form-control input::-moz-placeholder {
  color: #777;
  opacity: 1;
}
.bootstrap-tagsinput.form-control input:-ms-input-placeholder {
  color: #777;
}
.bootstrap-tagsinput.form-control input::-webkit-input-placeholder {
  color: #777;
}
.bootstrap-tagsinput input:focus {
  border: none;
  box-shadow: none;
}
.bootstrap-tagsinput .badge {
  margin-right: 2px;
  color: white;
  background-color: #0275d8;
  padding: 5px 8px;
  border-radius: 3px;
  border: 1px solid #01649e;
  margin-bottom: 5px;
}
.bootstrap-tagsinput .badge [data-role="remove"] {
  margin-left: 8px;
  cursor: pointer;
}
.bootstrap-tagsinput .badge [data-role="remove"]:after {
  content: "x";
  padding: 0px 4px;
  background-color: rgba(0, 0, 0, 0.1);
  border-radius: 50%;
  font-size: 13px;
}
.bootstrap-tagsinput .badge [data-role="remove"]:hover:after {
  background-color: rgba(0, 0, 0, 0.62);
}
.bootstrap-tagsinput .badge [data-role="remove"]:hover:active {
  box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
}

</style>
