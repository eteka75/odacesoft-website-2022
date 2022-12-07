<template>
    <Head>
      <title>Tableau de bord • Odacesoft</title>
      <meta
        head-key="description"
        name="description"
        content="Odacesoft est une entreprise informatique spécialisée dans l'ingénierie Informatique et l'incubation d'idées innovantes."
      />
    </Head>
  <div>

    <div class="menu-top pt-6 pb-2 bg-white px-lg-8 border-bottom">
      <div class="row align-items-center">
        <div class="col-md-6 col-12  mb-md-0">
          <!-- Title -->
          <h1 class="h3 mb-0 ls-tight">{{titre}}</h1>
        </div>
        <!-- Actions -->
        <div class="col-md-6 col-12 text-md-end">
          <div class="mx-n1">

            <!--inertia-link href="#" class="btn d-inline-flex btn-sm btn-primary mx-1">
              <span class="pe-2">
                <i class="far  fa-plus"></i>
              </span>
              <span>Générer des rapports</span>
            </inertia-link-->
            <div class="dropdown">
            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Action
            </button>
            <ul class="dropdown-menu shadow-2" aria-labelledby="dropdownMenuButton">
                <li><inertia-link class="dropdown-item" :href="route('article.index')"><i class="far fa-globe    "></i> Gestion du site web</inertia-link></li>
                <li><inertia-link class="dropdown-item" :href="route('article.create')"> <i class="fas fa-newspaper    "></i> Gestion du blog</inertia-link></li>
                <li><inertia-link class="dropdown-item" :href="route('article.create')"><i class="fas fa-tasks" aria-hidden="true"></i> Gestions des services</inertia-link></li>
                <li><inertia-link class="dropdown-item" :href="route('article.create')"><i class="fas fa-users" aria-hidden="true"></i> Gestions des utilisateurs</inertia-link></li>
                <li><inertia-link class="dropdown-item" :href="route('article.create')"><i class="fas fa-cog "></i> Paramètres</inertia-link></li>
            </ul>
        </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main-content">
      <div>
        <div
          class="group-headings group-page-headings component-heading-page-1"
          id="component-shot"
        ></div>
        <div class="py-6">

            <div class="row">

                         <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-danger_ shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-bold text-danger_ text-uppercase mb-1">Commandes taritées
                                            </div>

                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-bold text-gray-800 ">{{nb_commandes}}<span class='text-muted text-xs'>/{{ nb_commandes }}</span></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>

                                        </div>
                                         <inertia-link :href="route('commande.index')" class="text-xs text-muted">Voir les commandes -></inertia-link>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-success_ shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-bold text-success_ text-uppercase mb-1">
                                                Inscriptions aux formations</div>
                                          <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-bold text-gray-800 ">-<span class='text-muted text-xs'>/-</span></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                             <inertia-link href="#" class="text-xs text-muted">Voir les inscrits -></inertia-link>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-primary_  shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-bold text-primary_ text-uppercase mb-1">
                                                Messagess</div>

                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-bold text-gray-800 ">{{nb_messages}}<span class='text-muted text-xs'>/{{nb_messages}}</span></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 77%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>

                                        </div>
                                         <inertia-link :href="route('message.index')" class="text-xs text-muted">Voir les messages -></inertia-link>
                                        </div>

                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-warning_ shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-bold text-warning_ text-uppercase mb-1">
                                               Demandes de partenariats</div>
                                             <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-bold text-gray-800 ">{{nb_d_partenariats}}<span class='text-muted text-xs'>/{{nb_d_partenariats}}</span></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                             <inertia-link  :href="route('demande-partenariat.index')"  class="text-xs text-muted">Voir les statistiques -></inertia-link>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chart-bar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       



                    </div>
            <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-dark">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle text-muted" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas id="myAreaChart" style="display: block; height: 320px; width: 774px;" class="chartjs-render-monitor" width="967" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-dark">Revenue Sources</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle text-muted" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right text-dark shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas id="myPieChart" style="display: block; height: 245px; width: 354px;" class="chartjs-render-monitor" width="442" height="306"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CoverLayout from "@/Layouts/CoverLayout";
import AdminLayout from "@/Layouts/AdminLayout";

import { Head } from '@inertiajs/inertia-vue3'

export default {
  components: {
    AdminLayout,
    CoverLayout,
  },
   metaInfo: { title: 'Dashboard' },
   props: ["nb_commandes",'nb_messages','nb_d_partenariats'],
 data(){
     return {
         titre:"Tablau de bord",
     }
 },
  layout:AdminLayout,
};
</script>
