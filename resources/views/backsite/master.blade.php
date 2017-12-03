<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SITL Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="/backsite/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="/backsite/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="/backsite/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="/backsite/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="/backsite/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="/backsite/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <div id="app">
        <!-- Page Loader -->
        <page-loader></page-loader>
        <!-- #END# Page Loader -->

        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->

        <!-- Search Bar -->
        <div class="search-bar" v-if="isAuthenticated">
            <div class="search-icon">
                <i class="material-icons">search</i>
            </div>
            <input type="text" placeholder="START TYPING...">
            <div class="close-search">
                <i class="material-icons">close</i>
            </div>
        </div>
        <!-- #END# Search Bar -->

        <!-- Top Bar -->
        <top-bar v-if="isAuthenticated"></top-bar>
        <!-- #Top Bar -->

        <side-bar v-if="isAuthenticated"></side-bar>
        
        <router-view></router-view>
    </div>

    <!-- Jquery Core Js -->
    <script src="/backsite/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="/backsite/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="/backsite/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="/backsite/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="/backsite/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="/backsite/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="/backsite/plugins/raphael/raphael.min.js"></script>
    <script src="/backsite/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="/backsite/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="/backsite/plugins/flot-charts/jquery.flot.js"></script>
    <script src="/backsite/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="/backsite/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="/backsite/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="/backsite/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="/backsite/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="/backsite/js/admin.js"></script>
    <script src="/backsite/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="/backsite/js/demo.js"></script>

    <!-- SPA -->
    <script src="/backsite/js/app.js"></script>
</body>

</html>