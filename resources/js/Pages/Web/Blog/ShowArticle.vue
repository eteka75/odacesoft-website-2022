    <template>
    <Header menu="Blog" />

        <nav-cat v-if="categories" :datas='[categories,cat]'  />
    <Head>
        <title  v-if="article">{{ article.title }} • Odacesoft</title>
        <meta  v-if="article"
        head-key="description"
        name="description"
        content="Apprendre, Créer, Former et partager nos connaissances dans toute l'Afrique."
        />
    </Head>
    <cover-layout>
        <div   class="bg-dark_ bg-fade-primary cover_article_blog  mb-O">
        <div class="container">
            <div class="row">
            <div class="col-6">
            <inertia-link class="bg-white  shadow-sm btn text-dark py-1 mt-2 px-3" :href="route('blog')">
                <i class="fa fa-chevron-left" aria-hidden="true"></i> Blog</inertia-link>
            </div>
            <div class="col-6 text-end">
            <inertia-link v-if='next' data-toggle="tooltip" data-placement="top" :title="next.title" class="bg-white btn shadow-sm font-normal text-dark py-1 mt-2 px-3" :href="route('blog.article.show',next.slug)">
                 Suivant
                <i class="fa fa-chevron-right" aria-hidden="true"></i></inertia-link>
            </div>
                <div :class="[(article.image && article.image.url)?' col-lg-12 text-center':'text-center col-lg-12']">
                    <div class="py-5 py-md-10  text-break" >

                    <h1 v-if="article" class="lh-tight ls-tight display-6 mb-2 text-white_ text-shadow me-0"  >{{ article.title }}</h1>
                    <p class="mb-2"><inertia-link class="text-white" :href='route("blog.cat.show",article.categories.slug)'><span v-if="article.categories"  class="badge px-4 rounded-5  " :class="article.categories.couleur">{{article.categories.nom}}</span></inertia-link></p>
                    <span v-if="article" class="me-3 text-muted text-xs mx-2"> <i class="far fa-calendar" aria-hidden="true"></i> {{ article.h_created_at}}</span>
                    <span v-if="article" class="me-3 text-muted text-xs mx-2"> <i class="far fa-eye" aria-hidden="true"></i> {{article.view_count}} vue{{article.view_count>1?'s':''}}</span>
                        <div class="my-3">
                            <ul class="d-inline list-unstyled" v-if="article.tags">
                                <li class="me-2 mb-2 text-sm list-inline-item" v-for="tag in article.tags" :key='tag'> <inertia-link :href="route('blog.tags.show',tag.slug)"><span class="badge text-dark bg-gray-100 text-xs border rounded-5 px-5 py-2">#{{tag.nom}}</span></inertia-link></li>
                            </ul>
                        </div>
                    </div>
            </div>

            </div>
        </div>
        </div>
        <div class="container-lg max-w-screen-xl">
        <div class="row">
        <div v-if="article" class="col-md-10 mx-auto  text-start text-justify_">
            <div v-if="article.image" class="text-center px-lg-10">
                <img
                :src="'/'+article.image.url"
                class="img-responsive rounded-5 mx-auto shadow-4_  border-8 border-white"
                :alt="article.image.alt"
                />
                </div>
            <div class="p-lg-10 text-xl text-dark font-serif text-break" v-html="article.content">
            </div>
        </div>
        </div>
        </div>
        <div>
        <div class="bg-gray-100 py-20">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto px-lg-10">
                    <h6 class="mx-lg-8 text-xs text-muted text-uppercase font-semibold"></h6>
                    <div class="d-flex flex-row align-items-center text-left comment-top p-2  py-3 bordertop border-bottom_   _bg-whiteborder-top px-4">
                    <div class="profile-image">
                        <div class="float-right me-2 avatar" v-if="article.user">

                            <img  :src="'/'+article.user.profile_photo_url" :alt="article.user.name" class="rounded-circle w-16">
                            </div>
                        </div>
                        <!--div class="d-flex flex-column-reverse flex-grow-0 align-items-center votings ml-1"><i class="fa fa-sort-up fa-2x hit-voting"></i><span>127</span><i class="fa fa-sort-down fa-2x hit-voting"></i></div-->
                        <div class="d-flex flex-column ml-3">
                            <div class="d-flex mx-3 flex-row post-title">
                                <h5>{{article.user.name}}</h5>

                            </div>
                            <div class="d-flex flex-row  mx-3  align-items-center txt-muted align-content-center post-title">
                                <div class="text-xs text-muted">
                                    {{article.user.articles_count}} Article{{article.user.articles_count>1?'s':''}} &nbsp;&nbsp;&nbsp; •  Membre, {{article.user.h_created_at}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--div class="container-lg">
            <div class="col-md-10 mx-auto px-lg-10">
                <div  class="d-flex flex-column col b">


                <div v-if="$page.props.auth.user" class="  mt-5 mb-5 pt-10 border-top">
                <div class="d-flex  justify-content-center rounded-3 row bg-gray-200 border-1 border p-5 ">

                <div class="card hadow-2 ">
            <form class='d-block' method="post" @submit.prevent="commenter">

        <div class="card-body row s">
            <div class="col-md-2 col-xl-1 ">

            <div class="mt-0" >

            <img :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name" class="rounded-circle w-14">
            </div>

            </div>
            <div class="col-md-10">
                <div class="comment-box ml-2 ">
                <div class="text-dark font-bold">{{$page.props.auth.user.name}}</div>
                <div v-if="$page.props.auth.user.nb_articles" class="text-xs text-muted"><span class="me-2"> Inscription, {{$page.props.auth.user.h_created_at}} </span>• {{$page.props.auth.user.nb_articles}} Article{{$page.props.auth.user.nb_articles>1?'s':''}} posté{{$page.props.auth.user.nb_articles>1?'s':''}}</div>

                    <div class="rating">
                    <input type="radio" name="rating" v-model="form.note" value="5" id="5"><label for="5">☆</label>
                    <input type="radio" name="rating" v-model="form.note" value="4" id="4"><label for="4">☆</label>
                    <input type="radio" name="rating" v-model="form.note" value="3" id="3"><label for="3">☆</label>
                    <input type="radio" name="rating" v-model="form.note" value="2" id="2"><label for="2">☆</label>
                    <input type="radio" name="rating" v-model="form.note" value="1" id="1"><label for="1">☆</label>
                    </div>
                    <div class="comment-area mt-4"> <textarea  requiredv-if="form" v-model="form.commentaire" class="form-control"  :class="[$page.props.errors.commentaire ?'is-invalid':'is-valid_']" placeholder="Quel est votre avis sur cet article ?" rows="3"></textarea> </div>
                    <div
                        v-if="$page.props.errors.commentaire"
                        class="text-danger py-1 text-xs"
                        >
                        {{ $page.props.errors.commentaire }}
                    </div>
                    <div class="comment-btns mt-2">

                        <div class="row">
                            <div class="col-6">
                                <jet-button class="btn btn-primary btn-sm py-2 shodaw-1" type="submit"

                                :class="{ 'text-white-50': form.processing }"
                                :disabled="form.processing"
                                :loading="form.processing" >Commenter</jet-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </form>
    </div>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="media g-mb-30 media-comment">
                <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                <div class="g-mb-15">
                    <h5 class="h5 g-color-gray-dark-v1 mb-0">John Doe</h5>
                    <span class="g-color-gray-dark-v4 g-font-size-12">5 days ago</span>
                </div>

                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue
                    felis in faucibus ras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>

                <ul class="list-inline d-sm-flex my-0">
                    <li class="list-inline-item g-mr-20">
                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                        <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                        178
                    </a>
                    </li>
                    <li class="list-inline-item g-mr-20">
                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                        <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                        34
                    </a>
                    </li>
                    <li class="list-inline-item ml-auto">
                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                        <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                        Reply
                    </a>
                    </li>
                </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="media g-mb-30 media-comment">
                <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Image Description">
                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                <div class="g-mb-15">
                    <h5 class="h5 g-color-gray-dark-v1 mb-0">John Doe</h5>
                    <span class="g-color-gray-dark-v4 g-font-size-12">5 days ago</span>
                </div>

                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue
                    felis in faucibus ras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>

                <ul class="list-inline d-sm-flex my-0">
                    <li class="list-inline-item g-mr-20">
                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                        <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                        178
                    </a>
                    </li>
                    <li class="list-inline-item g-mr-20">
                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                        <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                        34
                    </a>
                    </li>
                    <li class="list-inline-item ml-auto">
                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                        <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                        Reply
                    </a>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    <hr>
        <div v-if="commentaires.length" class="coment-bottom bg-white  px-0 rounded-3">
                    <div  v-for="comment in commentaires" :key='comment' class="commented-section pb-4  mt-2 px-8  border-bottom">
                        <div class="d-flex flex-row align-items-center commented-user">
                            <span class="float-right me-2 avatar" v-if="comment.user">

                            <img  :src="comment.user.profile_photo_url" :alt="comment.name" class="rounded-circle  w-8">
                            </span>
                                <h5 v-if="comment.user" class="text-xs">{{comment.user.name}}</h5>
                                <span class="dot mx-1"> •</span>
                                <span class="mt-1 text-muted  text-xs ">{{comment.h_created_at}}</span>
                        </div>
                        <div class="comment-text-sm"><span>{{comment.message}}</span></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

            </div>
        </div-->
        </div>
        </div>
    </cover-layout>
    </template>

    <script>
    import { Head } from "@inertiajs/inertia-vue3";

    import JetButton from "@/Jetstream/Button";
    import {formatRelative} from 'date-fns';
    import { fr } from 'date-fns/locale'
    import Header from "@/Components/Header";
    import NavCat from "@/Components/NavCat";
    import Notification from "@/Components/Notification";
    import Footer from "@/Components/Footer";
    import CoverLayout from "@/Layouts/CoverLayout";

    import Pagination from "@/Components/Pagination";

    export default {
    components: {
        Header,
        JetButton,
        Notification,
        Footer,
        CoverLayout,
        Pagination,
        NavCat,
    },

    data() {
        return {
        titre: "Catégories d'article",
        nb: 0,
        editMode: false,
        data: null,
        Close: true,
        isOpen: false,
        dialog: {
            title: "Nouvelle article",
            contenu: "null",
        },
        form: {
            user_id:null,
            commentaire:null,
            note:0,
            article_id:this.article.id
        },
        };
    },
    methods:{
        format(date){
            return  formatRelative(new Date(date),new Date(),{locale: fr});

        },

        commenter: function () {

        this.$inertia.post(route('commentaire.store'),this.form, {
            preserveScroll: false,
                resetOnSuccess: true,
            onSuccess: () => this.initData(),
            })

        this.editMode = false;
        },
        resetData(){
            //this.commentaire=null;
        },
        initData(){
            this.form.commentaire=null;
            this.form.user_id=this.$page.props.auth.user!=null?this.$page.props.auth.user.id:null;
            this.form.article_id=this.article.id;
        },

    },
    mounted() {
        this.initData();
        $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        });
    },
    props: ["article",'next','categories','commentaires','cat'],
    };
    </script>

    <style>
        .cover_article_blog{
            background-position: 0% center;
            background-size:contain;
            background-repeat: no-repeat;
        }


    .rating {
        display: flex;
        margin-top: -10px;
        flex-direction: row-reverse;
        margin-left: -4px;
        float: left
    }

    .rating>input {
        display: none
    }

    .rating>label {
        position: relative;
        width: 19px;
        font-size: 25px;
        color: #f7b900;
        cursor: pointer
    }
    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .rating>input:checked~label:before {
        opacity: 1
    }

    .rating:hover>input:checked~label:before {
        opacity: 0.4
    }








    @media (min-width: 0) {
        .g-mr-15 {
            margin-right: 1.07143rem !important;
        }
    }
    @media (min-width: 0){
        .g-mt-3 {
            margin-top: 0.21429rem !important;
        }
    }

    .g-height-50 {
        height: 50px;
    }

    .g-width-50 {
        width: 50px !important;
    }

    @media (min-width: 0){
        .g-pa-30 {
            padding: 2.14286rem !important;
        }
    }

    .g-bg-secondary {
        background-color: #fafafa !important;
    }

    .u-shadow-v18 {
        box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
    }

    .g-color-gray-dark-v4 {
        color: #777 !important;
    }

    .g-font-size-12 {
        font-size: 0.85714rem !important;
    }

    .media-comment {
        margin-top:20px
    }
    </style>
