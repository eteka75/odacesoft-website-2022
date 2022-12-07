<template>
  <div id="app" class="d-flex flex-column min-h-screen">
    <Notification />
    <!-- Page Content -->
    <main class="d-flex flex-grow-1">
      <div class="w-full">
        <slot></slot>
      </div>
    </main>
    <Footer />
  </div>
</template>
<script>
import Header from "./../Components/Header";
import Notification from "./../Components/Notification";
import Footer from "./../Components/Footer";
import { Inertia } from '@inertiajs/inertia'

/*Inertia.on('before', (event) => {
  return confirm('Voulez-vous quitter cette page ?')
})*/
export default {
  components: {
    Header,
    Notification,
    Footer,
  },
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    status: Number,
  },
  mounted: function () {
       this.closeBackdrop();
    //method1 will execute at pageload
    var body = document.getElementsByTagName('body')[0];
    var hid= body.style.overflowY;
    if(hid=="hidden"){
         //body.style.overflowY = "auto";
         $("#odace_app").addClass("AdjustOverflowWidth");
          this.closeBackdrop();
    }
    //document.getElementById("odace_app").style.overflowY = "auto";
  },
  methods: {
    closeBackdrop: function () {
      $("* .modal-backdrop").hide();
    },
  },
};
</script>

<style  type="text/css">

.navbar-expand-lg .navbar-brand img {
  height: 1.2em !important;
}
.nav-link.active {
  font-weight: 500 !important;
  color: #0a65d3 !important;
  background:#d7e8fa;
}

#search-inner{
    background: #f5f6f7;
    border-radius: 40px;
    padding-left: 15px;
}

.card-bg-scale {
  z-index: 99;
}

.card-bg-scale::after {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: inherit;
  -webkit-transition: all 1s !important;
  transition: all 1s !important;
  z-index: -2;
}
#navbarNav{width:100%;}
#blogNav{

    overflow-x: auto;
    }
#navtop{
    height:32px;
    overflow: auto;
    }
#navtop ul li a.nav-link{
     /*color:#f5f6f7 //b4d6fa ;*/
    color:#FFFFFF  !important;
    /*font-size: 1.3em;*/
}
#navtop ul li.active{
    background-color: #d7e8fa !important;
}
#navtop ul li.active a,#navtop ul li.active a:hover{
    color: #003366 !important;
}
#navtop ul li .nav-link:hover{
    /*color:#f5f6f7  ;*/
    color:#f5f6f7  !important;

    text-decoration:underline}

.card-bg-scale:hover::after {
  -webkit-transform: scale(1.1);
          transform: scale(1.1);
  -webkit-transition: all 1s !important;
  transition: all 1s !important;
}
#blogNav .list-inline-item.active a{
background: #d7e8fa;
color:#0a65d3 !important;
background-color:#ffffff;
border-bottom: 2px solid #0a65d3 !important;
}
.dropdown:hover .dropdown-menu {
    display: block;
    margin-top: 0;
 }

#nprogress .bar {
  position: fixed;
  z-index: 10000;
}
@media(max-width:800px) {
    .display-6{
        font-size: 1.1em !important;
    }
}

.bg-danger-fun {
  /*background: #f9f8fd;
  background: #bfe6f2;*/
  background: #f2ecbf;
}
:root {
  --nprogress-color: #29d;
  --nprogress-z-index: 3000;
}

.img-article-cover{
    height:150px;
    overflow:hidden;
    background: url("./../../../public/storage/assets/web/image/logo-odacesoft-black-mini.png") #fafafa no-repeat 50% 50%;

    border-radius:12px 12px 0 0;
}
.img-article-cover2 img{ border-radius:12px 12px 0 0;}
.img-article-cover2{
    min-height:140px;
    max-height:210px;
    height:200px;
    overflow:hidden;
    background: url("./../../../public/storage/assets/web/image/logo-odacesoft-black-mini.png") #fafafa no-repeat 50% 50%;
    border-radius:2rem !important ;


}

.photo-link.photo-brand:before {
    right: 15px;
    left: 15px;
}

.photo-link.photo-brand:before {
    right: 4px;
    left: 4px;
    top: -4px;
}
.photo-link:after,
.photo-link:before
{
content: "";
    position: absolute;
    height: 1px;
    background: #afb7bc;
    -webkit-transition: all .15s ease-in-out;
    transition: all .15s ease-in-out;

}
#autres-realisations figure{
    height:280px;
}
.text-reset {
  color: inherit !important;
}
.pagination li.page-item,.pagination .page-link {
    margin: auto 4px;
    border-radius: 5px !important;
}
.stretched-link::after {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1;
  content: "";
}
.mcard{
    height:392px;
}
.dcard{
    height:222px;
}
.mcard1,.mcard1 img{
    height:220px;
}
.mcard3,.mcard3 img{
    height:320px;
}
.mcard2,.mcard2 img{
    height:300px;
}
.font-rubik{
  font-family: "Rubik",Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  font-weight: 400;
}
.mcard1>img,
.mcard2>img,
.mcard2 img,
.mcard3>img,
.mcard3 img
{
  height:100%;
  object-fit:cover;
  -o-object-fit:cover;
  -moz-object-fit:cover;
}
.card.card-overlay-bottom{
    overflow: hidden;
    will-change: transform;
    }
    .btn-link {
    padding-bottom: 0px;
    background: -webkit-gradient(linear, left top, right top, from(currentColor), to(currentColor));
    background: linear-gradient(to right, currentColor 0%, currentColor 100%);
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-size: auto;
    background-size: 0px 6%;
    background-repeat: no-repeat;
    background-position: left 100%;
    -webkit-transition-duration: .5s;
    transition-duration: .5s;
    font-weight: inherit;
    padding: 0;
    color:white;
}
.card-img-overlay {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 1.25rem;
    border-radius: 0.7rem;
    background:rgba(0, 0, 0, 0.6)
}
.btn-link:hover {
    background-size: 100% 6%;
}
small, .small, .small {
    font-weight: 400;
}
.align-items-center {
    -webkit-box-align: center !important;
    -ms-flex-align: center !important;
    align-items: center !important;
}

.card-img-scale .card-img {
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  -webkit-transform: scale(1);
          transform: scale(1);
}

.card-img-scale:hover .card-img {
  -webkit-transform: scale(1.08);
          transform: scale(1.08);
}
.card-featured {
  position: absolute;
  z-index: 99;
  background: #2163e8;
  color: #fff;
  -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
  text-align: center;
  top: -8px;
  right: -48px;
  width: 120px;
  padding: 16px 0 3px 0;
}
.card-img-overlay-transparant{
  background:transparant !important;
}
.card, .overflow-hidden {
  will-change: transform;
}

.card .card-element-hover {
  visibility: hidden;
  margin-top: 30px;
  opacity: 0;
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  z-index: 9;
}

.card:hover .card-element-hover {
  visibility: visible;
  margin-top: 0px;
  opacity: 1;
}

.card.card-overlay-bottom {
  overflow: hidden;
}

.card.card-overlay-bottom:before {
  content: "";
  position: absolute;
  height: 50%;
  width: 100%;
  bottom: 0;
  left: 0;
  right: 0;
  background-image: -webkit-gradient(linear, left top, left bottom, from(transparent), to(black));
  background-image: linear-gradient(180deg, transparent, black);
  z-index: 1;
}
.text-white-force *:not(.btn):not(.dropdown-item):not(.badge) {
  color: #fff;
}
.card .card-img-overlay {
  z-index: 2;
}
.card .card-img-overlay {
    z-index: 2;

    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 1.25rem;
    border-radius: 0px !important;
    background-color:rgba(0, 0, 0, 0.47)
}
.card.card-overlay-top {
  overflow: hidden;
}

.card.card-overlay-top:before {
  content: "";
  position: absolute;
  height: 50%;
  width: 100%;
  top: 0;
  left: 0;
  right: 0;
  background-image: -webkit-gradient(linear, left bottom, left top, from(transparent), to(black));
  background-image: linear-gradient(0deg, transparent, black);
}
.btn-link {
  font-weight: 500;
  color: #2163e8;
  text-decoration: none;
}

.btn-link:hover {
  color: #1a4fba;
}

.btn-link:disabled, .btn-link.disabled {
  color: #d0d4d9;
}

#article-top .card-body{
    height:160px;
}
.obackdrop{
    top: 0;
    position: absolute;
    width: 100%;
    height: 100%;
    background-color:rgba(0,0,0,0.7);
}


.tb-shadow {
  text-shadow: 0 2px 2px #2e3142;
}
#bloc_pub {
  background: #f4f6f7;
}
#o-patrtenaires figure img {
    max-width: 100%;
    /*height: 100% !important;*/
    max-height:100% !important;
}
#o-patrtenaires figure {
    max-height: 145px;
    line-height: 125px;
    text-align: center;
    margin: 1em 0;
    overflow: hidden;
}
#nav-realisation .item
 {
     height:15em;
}
#nav-realisation .cap-real{
    position:absolute;
    background-color:rgba(0, 0, 0, 0.8);
    color:#ffffff;
    bottom:1.8em;
    width:98%;
    left:1px;
}
#nav-realisation .owl-carousel{
    padding:0 1rem;
}
#nav-realisation .item figure {
    max-height: 225px;
    line-height: 225px;
    text-align: center;
    margin: 1em 0;
}
.scard{

}
#navbar_main.navbar-expand-lg .navbar-nav .nav-link{
    padding-right: 0.9rem;
padding-left:0.9rem;
font-weight: normal;
}
@media (min-width: 800px) {
  #bloc_pub {
    background: url("./../../../public/storage/assets/web/image/commander-service-odacesoft.jpg")
      #75adce no-repeat;
    background-size: auto 100%;
    background-position: 100% 0%;
    background-color: #75adce;
    height: 300px;
  }
}
.bgp1 {
  background: #75adce !important;
}
.bgp2 {
  background: #fefefe;
}
#mobile-logo {
  height: 25px;
}
.min-h{
    min-height:550px;
}
.bg-primary-fun {
  background: #edf5ff;
}
.bg-success-fun {
  background: #e9f7f0 !important;
}
.bg-fun2 {
  background: #d3e6f0 !important;
}
.navbar {
   /*box-shadow: 1px 2px 2px #eee !important;*/
}
/* -----
SVG Icons - svgicons.sparkk.fr
----- */

.svg-icon {
  width: 1em;
  height: 1em;
}

.svg-icon path,
.svg-icon polygon,
.svg-icon rect {
  fill: #4691f6;
}

.svg-icon circle {
  stroke: #4691f6;
  stroke-width: 1;
}

@media (max-width: 767px) {
  .btn-xs-block {
    display: block;
    width: 100%;
  }
  input[type="submit"].btn-xs-block,
  input[type="reset"].btn-xs-block,
  input[type="button"].btn-xs-block {
    width: 100%;
  }
  .btn-block + .btn-xs-block,
  .btn-xs-block + .btn-block,
  .btn-xs-block + .btn-xs-block {
    margin-top: 0.5rem;
  }
}
@media (min-width: 768px) and (max-width: 991px) {
  .btn-sm-block {
    display: block;
    width: 100%;
  }
  input[type="submit"].btn-sm-block,
  input[type="reset"].btn-sm-block,
  input[type="button"].btn-sm-block {
    width: 100%;
  }
  .btn-block + .btn-sm-block,
  .btn-sm-block + .btn-block,
  .btn-sm-block + .btn-sm-block {
    margin-top: 0.5rem;
  }
}
@media (min-width: 992px) and (max-width: 1199px) {
  .btn-md-block {
    display: block;
    width: 100%;
  }
  input[type="submit"].btn-md-block,
  input[type="reset"].btn-md-block,
  input[type="button"].btn-md-block {
    width: 100%;
  }
  .btn-block + .btn-md-block,
  .btn-md-block + .btn-block,
  .btn-md-block + .btn-md-block {
    margin-top: 0.5rem;
  }
}
@media (min-width: 1200px) {
  .btn-lg-block {
    display: block;
    width: 100%;
  }
  input[type="submit"].btn-lg-block,
  input[type="reset"].btn-lg-block,
  input[type="button"].btn-lg-block {
    width: 100%;
  }
  .btn-block + .btn-lg-block,
  .btn-lg-block + .btn-block,
  .btn-lg-block + .btn-lg-block {
    margin-top: 0.5rem;
  }
}
</style>
