<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!--title>{{ isset($titre) ?$titre."-":""}} Odacesoft • Agence d'ingénierie informatique à Parakou, Bénin </title-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Pour vos solutions informatiques (logiciels, sites web, réseaux informatique, communication digitale,...) et pour vous faire former dans les métiers du numérique, faites nous confiance. Nous oeuvrons pour l'entrepreunariat des jeunes en générale et celui des filles/femmes en particulier." />
        <meta name="robots" content="index,follow" />
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('storage/assets/apple/apple-touch-icon-57x57.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('storage/assets/apple/apple-touch-icon-114x114.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('storage/assets/apple/apple-touch-icon-72x72.png')}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('storage/assets/apple/apple-touch-icon-144x144.png')}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('storage/assets/apple/apple-touch-icon-60x60.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('storage/assets/apple/apple-touch-icon-120x120.png')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('storage/assets/apple/apple-touch-icon-76x76.png')}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('storage/assets/apple/apple-touch-icon-152x152.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/assets/apple/apple-touch-icon-180x180.png')}}">
        <link rel="shortcut icon" href="{{ asset('storage/assets/favicon.ico')}}"> 
        <link rel="canonical" href="http://odacesoft.com" />
        <!-- Fonts -->
        <!--link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet"-->

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
        
        <!-- Styles -->
        <!--link rel="stylesheet" href="{{ asset('css/app-light .css') }}"-->
         <!-- Styles -->
        <meta name="author" content="ETEKA S. Wilfried" />
        <meta name="theme-color" content="#4285f4">
        <Meta name="robots " content="index, follow" />
        <!-- Primary Meta Tags -->
        <meta name="title" content="Odacesoft • Agence d'ingénierie informatique à Parakou, Bénin">
        <meta name="description" content="Nous vous aidons à conception des solutions informatiques, à déployer le réseau Informatique de vos entreprises, à mettre en place un plan de communication éfficace sur les réseaux sociaux (Facebook, Twitter, Instagram,...), et à démarrer de bon pied l'entrepreunariat si vous êtes un jeune garçon et filles/femmes.">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://odacesoft.com/">
        <meta property="og:title" content="Odacesoft • Agence d'ingénierie informatique à Parakou, Bénin">
        <meta property="og:description" content="Nous vous aidons à conception des solutions informatiques, à déployer le réseau Informatique de vos entreprises, à mettre en place un plan de communication éfficace sur les réseaux sociaux (Facebook, Twitter, Instagram,...), et à démarrer de bon pied l'entrepreunariat si vous êtes un jeune en générale et des filles/femmes en particulier.">
        <meta property="og:image" content="https://odacesoft.com/storage/assets/preview.jpg">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://odacesoft.com">
       <meta property="twitter:title" content="Odacesoft • Agence d'ingénierie informatique à Parakou, Bénin">
        <meta property="twitter:description" content="Nous vous aidons à conception des solutions informatiques, à déployer le réseau Informatique de vos entreprises, à mettre en place un plan de communication éfficace sur les réseaux sociaux (Facebook, Twitter, Instagram,...), et à démarrer de bon pied l'entrepreunariat si vous êtes un jeune garçon et filles/femmes.">

        <meta property="twitter:image" content="https://odacesoft.com/storage/assets/preview.jpg">
        <link rel="manifest" href="./manifest.json">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{ asset('storage/css/app8499.css') }}"/>
        <!-- Styles -->

        <style>
            body {
                /*
                font-family:Montserrat, Inter, "Helvetica Neue",Helvetica,Arial;
                font-weight: 400;
                */
            }
        </style>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v13.0&appId=808192846614159&autoLogAppEvents=1" nonce="JPgbl7DI"></script>

        <!-- Scripts -->
        @routes
        <!--script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script-->
        <script src="{{ asset('storage/js/app.js') }}" defer></script>
    </head>
    <body id="odace_app">
        @inertia
        <x-translation></x-translation>
        <link rel="stylesheet"  type="text/css" href="{{ asset('storage/vendor/icons/css/all.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

        <script type="text/javascript">

</script>
<!--script src="{{ asset('../node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script src="{{ asset('../node_modules/@ckeditor/ckeditor5-vue/dist/ckeditor.js') }}"></script>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script src="{{ asset('storage/vendor/ckeditor5/classic/ckeditor.js') }}"></script>
        <script src="{{ asset('storage/vendor/tagsinput/tagsinput.js') }}">

        </script-->
    </body>
</html>
