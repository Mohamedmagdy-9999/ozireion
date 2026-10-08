<!doctype html>
<html lang="en" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Scolasys - Leaders Language Schools">
		<meta name="author" content="ScolaSys">
		<meta name="keywords" content="Scolasys - Leaders Language Schools">
        <!-- TITLE -->
		<title>ozireion</title>
        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/images/leaders.jpg')}}" />
        <!-- BOOTSTRAP CSS -->
        <link id="style" href="{{asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
        <!-- STYLE CSS -->
        <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" />
        <link href="{{asset('admin/assets/css/skin-modes.css')}}" rel="stylesheet" />

        <link href="{{asset('admin/assets/css/animated.css')}}" rel="stylesheet" />

        <!--- FONT-ICONS CSS -->
        <link href="{{asset('admin/assets/plugins/icons/icons.css')}}" rel="stylesheet" />

        <!-- INTERNAL Switcher css -->
        <link href="{{asset('admin/assets/switcher/css/switcher.css')}}" rel="stylesheet">
        <link href="{{asset('admin/assets/switcher/demo.css')}}" rel="stylesheet">
        <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
       

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        @livewireStyles
    </head>

    <body class="ltr app sidebar-mini">

        <!-- Switcher-->
        <!-- Switcher -->
        <div class="switcher-wrapper">
            <div class="demo_changer">
                <div class="form_holder sidebar-right1">
                    <div class="row">
                        <div class="predefined_styles">
                            <div class="swichermainleft">
                                <h4>Navigation Style</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex">
                                            <span class="me-auto">Vertical Menu</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch15"
                                                    id="myonoffswitch34" class="onoffswitch2-checkbox" checked>
                                                <label for="myonoffswitch34" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2">
                                            <span class="me-auto">Horizontal Click Menu</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch15"
                                                    id="myonoffswitch35" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch35" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2">
                                            <span class="me-auto">Horizontal Hover Menu</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch15"
                                                    id="myonoffswitch111" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch111" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft">
                                <h4>LTR and RTL VERSIONS</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex">
                                            <span class="me-auto">LTR Version</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch7"
                                                    id="myonoffswitch23" class="onoffswitch2-checkbox" checked>
                                                <label for="myonoffswitch23" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2">
                                            <span class="me-auto">RTL Version</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch7"
                                                    id="myonoffswitch24" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch24" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swichermainleft">
                                <h4>Dark Theme Style</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex mt-2">
                                            <span class="me-auto">Dark Theme</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch1"
                                                    id="myonoffswitch2" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch2" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex">
                                            <span class="me-auto">Light Theme</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch1"
                                                                           id="myonoffswitch1" class="onoffswitch2-checkbox" checked>
                                                <label for="myonoffswitch1" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft">
                                <h4>Reset All Styles</h4>
                                <div class="skin-body">
                                    <div class="switch_section my-4">
                                        <button class="btn btn-danger btn-block resetCustomStyles" id="resetAll" type="button">Reset All
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Switcher -->
        <!-- Switcher-->

        <!-- GLOBAL-LOADER -->
		<div id="global-loader">
			<img src="{{asset('admin/assets/images/scolstouch.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /GLOBAL-LOADER -->

        <!-- PAGE -->
		<div class="page">
			<div class="page-main">

                <!-- app-Header -->
                <div class="app-header header sticky">
                    <div class="container-fluid main-container">
                        <div class="d-flex">
                            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="#"></a>
                            <!-- sidebar-toggle-->
                            <a class="logo-horizontal " href="/dashboard">
                                <img src="assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                                <img src="assets/images/brand/logo-3.png" class="header-brand-img light-logo1"
                                    alt="logo">
                            </a>
                            <!-- LOGO -->
                            <div class="main-header-center ms-3 d-none d-xl-block">
                                <h4> <strong>Ozierion Management System</strong></h4>
                            </div>
                            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                                <div class="dropdown d-xl-none d-md-block d-none">
                                    <a href="#" class="nav-link icon" data-bs-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path fill="" d="M21.2529297,17.6464844l-2.8994141-2.8994141c-0.0021973-0.0021973-0.0043945-0.0043945-0.0065918-0.0065918c-0.8752441-0.8721313-2.2249146-0.9760132-3.2143555-0.3148804l-0.8467407-0.8467407c1.0981445-1.2668457,1.7143555-2.887146,1.715332-4.5747681c0.0021973-3.8643799-3.1286621-6.9989014-6.993042-7.0011597S2.0092773,5.1315308,2.007019,8.9959106S5.1356201,15.994812,9,15.9970703c1.6889038,0.0029907,3.3114014-0.6120605,4.5789185-1.7111206l0.84729,0.84729c-0.6630859,0.9924316-0.5566406,2.3459473,0.3208618,3.2202759l2.8994141,2.8994141c0.4780884,0.4786987,1.1271973,0.7471313,1.8037109,0.7460938c0.6766357,0.0001831,1.3256226-0.2686768,1.803894-0.7472534C22.2493286,20.2558594,22.2488403,18.6417236,21.2529297,17.6464844z M9.0084229,14.9970703c-3.3120728,0.0023193-5.9989624-2.6807861-6.0012817-5.9928589S5.6879272,3.005249,9,3.0029297c1.5910034-0.0026855,3.1175537,0.628479,4.2421875,1.7539062c1.1252441,1.1238403,1.7579956,2.6486206,1.7590942,4.2389526C15.0036011,12.3078613,12.3204956,14.994751,9.0084229,14.9970703z M20.5458984,20.5413818c-0.604126,0.6066284-1.5856934,0.6087036-2.1923828,0.0045166l-2.8994141-2.8994141c-0.2913818-0.2910156-0.4549561-0.6861572-0.4544678-1.0979614C15.0006714,15.6928101,15.6951294,15,16.5507812,15.0009766c0.4109497-0.0005493,0.8051758,0.1624756,1.0957031,0.453125l2.8994141,2.8994141C21.1482544,18.9584351,21.1482544,19.9364624,20.5458984,20.5413818z"/></svg>
                                    </a>
                                    <div class="dropdown-menu header-search dropdown-menu-start">
                                        <div class="input-group w-100 p-2">
                                            <input type="text" class="form-control" placeholder="Search....">
                                            <div class="input-group-text btn btn-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path  d="M21.2529297,17.6464844l-2.8994141-2.8994141c-0.0021973-0.0021973-0.0043945-0.0043945-0.0065918-0.0065918c-0.8752441-0.8721313-2.2249146-0.9760132-3.2143555-0.3148804l-0.8467407-0.8467407c1.0981445-1.2668457,1.7143555-2.887146,1.715332-4.5747681c0.0021973-3.8643799-3.1286621-6.9989014-6.993042-7.0011597S2.0092773,5.1315308,2.007019,8.9959106S5.1356201,15.994812,9,15.9970703c1.6889038,0.0029907,3.3114014-0.6120605,4.5789185-1.7111206l0.84729,0.84729c-0.6630859,0.9924316-0.5566406,2.3459473,0.3208618,3.2202759l2.8994141,2.8994141c0.4780884,0.4786987,1.1271973,0.7471313,1.8037109,0.7460938c0.6766357,0.0001831,1.3256226-0.2686768,1.803894-0.7472534C22.2493286,20.2558594,22.2488403,18.6417236,21.2529297,17.6464844z M9.0084229,14.9970703c-3.3120728,0.0023193-5.9989624-2.6807861-6.0012817-5.9928589S5.6879272,3.005249,9,3.0029297c1.5910034-0.0026855,3.1175537,0.628479,4.2421875,1.7539062c1.1252441,1.1238403,1.7579956,2.6486206,1.7590942,4.2389526C15.0036011,12.3078613,12.3204956,14.994751,9.0084229,14.9970703z M20.5458984,20.5413818c-0.604126,0.6066284-1.5856934,0.6087036-2.1923828,0.0045166l-2.8994141-2.8994141c-0.2913818-0.2910156-0.4549561-0.6861572-0.4544678-1.0979614C15.0006714,15.6928101,15.6951294,15,16.5507812,15.0009766c0.4109497-0.0005493,0.8051758,0.1624756,1.0957031,0.453125l2.8994141,2.8994141C21.1482544,18.9584351,21.1482544,19.9364624,20.5458984,20.5413818z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- SEARCH -->
                                <button class="navbar-toggler navresponsive-toggler d-md-none ms-auto" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                    aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                                </button>
                                <div class="navbar navbar-collapse responsive-navbar p-0">
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                        <div class="d-flex order-lg-2">
                                            <div class="dropdown d-md-none d-flex">
                                                <a href="#" class="nav-link icon" data-bs-toggle="dropdown">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path  d="M21.2529297,17.6464844l-2.8994141-2.8994141c-0.0021973-0.0021973-0.0043945-0.0043945-0.0065918-0.0065918c-0.8752441-0.8721313-2.2249146-0.9760132-3.2143555-0.3148804l-0.8467407-0.8467407c1.0981445-1.2668457,1.7143555-2.887146,1.715332-4.5747681c0.0021973-3.8643799-3.1286621-6.9989014-6.993042-7.0011597S2.0092773,5.1315308,2.007019,8.9959106S5.1356201,15.994812,9,15.9970703c1.6889038,0.0029907,3.3114014-0.6120605,4.5789185-1.7111206l0.84729,0.84729c-0.6630859,0.9924316-0.5566406,2.3459473,0.3208618,3.2202759l2.8994141,2.8994141c0.4780884,0.4786987,1.1271973,0.7471313,1.8037109,0.7460938c0.6766357,0.0001831,1.3256226-0.2686768,1.803894-0.7472534C22.2493286,20.2558594,22.2488403,18.6417236,21.2529297,17.6464844z M9.0084229,14.9970703c-3.3120728,0.0023193-5.9989624-2.6807861-6.0012817-5.9928589S5.6879272,3.005249,9,3.0029297c1.5910034-0.0026855,3.1175537,0.628479,4.2421875,1.7539062c1.1252441,1.1238403,1.7579956,2.6486206,1.7590942,4.2389526C15.0036011,12.3078613,12.3204956,14.994751,9.0084229,14.9970703z M20.5458984,20.5413818c-0.604126,0.6066284-1.5856934,0.6087036-2.1923828,0.0045166l-2.8994141-2.8994141c-0.2913818-0.2910156-0.4549561-0.6861572-0.4544678-1.0979614C15.0006714,15.6928101,15.6951294,15,16.5507812,15.0009766c0.4109497-0.0005493,0.8051758,0.1624756,1.0957031,0.453125l2.8994141,2.8994141C21.1482544,18.9584351,21.1482544,19.9364624,20.5458984,20.5413818z"/></svg>
                                                </a>
                                                <div class="dropdown-menu header-search dropdown-menu-start">
                                                    <div class="input-group w-100 p-2">
                                                        <input type="text" class="form-control" placeholder="Search....">
                                                        <div class="input-group-text btn btn-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path  d="M21.2529297,17.6464844l-2.8994141-2.8994141c-0.0021973-0.0021973-0.0043945-0.0043945-0.0065918-0.0065918c-0.8752441-0.8721313-2.2249146-0.9760132-3.2143555-0.3148804l-0.8467407-0.8467407c1.0981445-1.2668457,1.7143555-2.887146,1.715332-4.5747681c0.0021973-3.8643799-3.1286621-6.9989014-6.993042-7.0011597S2.0092773,5.1315308,2.007019,8.9959106S5.1356201,15.994812,9,15.9970703c1.6889038,0.0029907,3.3114014-0.6120605,4.5789185-1.7111206l0.84729,0.84729c-0.6630859,0.9924316-0.5566406,2.3459473,0.3208618,3.2202759l2.8994141,2.8994141c0.4780884,0.4786987,1.1271973,0.7471313,1.8037109,0.7460938c0.6766357,0.0001831,1.3256226-0.2686768,1.803894-0.7472534C22.2493286,20.2558594,22.2488403,18.6417236,21.2529297,17.6464844z M9.0084229,14.9970703c-3.3120728,0.0023193-5.9989624-2.6807861-6.0012817-5.9928589S5.6879272,3.005249,9,3.0029297c1.5910034-0.0026855,3.1175537,0.628479,4.2421875,1.7539062c1.1252441,1.1238403,1.7579956,2.6486206,1.7590942,4.2389526C15.0036011,12.3078613,12.3204956,14.994751,9.0084229,14.9970703z M20.5458984,20.5413818c-0.604126,0.6066284-1.5856934,0.6087036-2.1923828,0.0045166l-2.8994141-2.8994141c-0.2913818-0.2910156-0.4549561-0.6861572-0.4544678-1.0979614C15.0006714,15.6928101,15.6951294,15,16.5507812,15.0009766c0.4109497-0.0005493,0.8051758,0.1624756,1.0957031,0.453125l2.8994141,2.8994141C21.1482544,18.9584351,21.1482544,19.9364624,20.5458984,20.5413818z"/></svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- COUNTRY -->

                                            <!-- Theme-Layout -->

                                            <!-- SHORTCUTS -->

                                            <!-- CART -->

                                            <!-- Messages-->

                                            <!-- NOTIFICATIONS -->
                                            <div class="dropdown d-md-flex profile-1">
                                                <a href="#" data-bs-toggle="dropdown" class="nav-link pe-2 leading-none d-flex animate">



                                                        {{-- <span>
                                                            <img src="{{ asset('admin/assets/images/leaders.jpg') }}" alt="profile-user"
                                                                class="avatar  profile-user brround cover-image">
                                                        </span> --}}
                                                        <div class="text-center p-1 d-flex d-lg-none-max">

                                                            <h6 class="mb-0" id="profile-heading">{{ auth()->user()->name }}<i class="user-angle ms-1 fa fa-angle-down "></i></h6>
                                                        </div>


                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">






                                                        <form action="{{route('logout')}}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="dropdown-item" >
                                                                Log out
                                                            </a>
                                                        </form>


                                                </div>
                                            </div>
                                            <!-- Profile -->
                                        </div>
                                    </div>
                                </div>
                                <div class="demo-icon nav-link icon fe-spin">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M11.5,7.9c-2.3,0-4,1.9-4,4.2s1.9,4,4.2,4c2.2,0,4-1.9,4-4.1c0,0,0-0.1,0-0.1C15.6,9.7,13.7,7.9,11.5,7.9z M14.6,12.1c0,1.7-1.5,3-3.2,3c-1.7,0-3-1.5-3-3.2c0-1.7,1.5-3,3.2-3C13.3,8.9,14.7,10.3,14.6,12.1C14.6,12,14.6,12.1,14.6,12.1z M20,13.1c-0.5-0.6-0.5-1.5,0-2.1l1.4-1.5c0.1-0.2,0.2-0.4,0.1-0.6l-2.1-3.7c-0.1-0.2-0.3-0.3-0.5-0.2l-2,0.4c-0.8,0.2-1.6-0.3-1.9-1.1l-0.6-1.9C14.2,2.1,14,2,13.8,2H9.5C9.3,2,9.1,2.1,9,2.3L8.4,4.3C8.1,5,7.3,5.5,6.5,5.3l-2-0.4C4.3,4.9,4.1,5,4,5.2L1.9,8.8C1.8,9,1.8,9.2,2,9.4l1.4,1.5c0.5,0.6,0.5,1.5,0,2.1L2,14.6c-0.1,0.2-0.2,0.4-0.1,0.6L4,18.8c0.1,0.2,0.3,0.3,0.5,0.2l2-0.4c0.8-0.2,1.6,0.3,1.9,1.1L9,21.7C9.1,21.9,9.3,22,9.5,22h4.2c0.2,0,0.4-0.1,0.5-0.3l0.6-1.9c0.3-0.8,1.1-1.2,1.9-1.1l2,0.4c0.2,0,0.4-0.1,0.5-0.2l2.1-3.7c0.1-0.2,0.1-0.4-0.1-0.6L20,13.1z M18.6,18l-1.6-0.3c-1.3-0.3-2.6,0.5-3,1.7L13.4,21H9.9l-0.5-1.6c-0.4-1.3-1.7-2-3-1.7L4.7,18l-1.8-3l1.1-1.3c0.9-1,0.9-2.5,0-3.5L2.9,9l1.8-3l1.6,0.3c1.3,0.3,2.6-0.5,3-1.7L9.9,3h3.5l0.5,1.6c0.4,1.3,1.7,2,3,1.7L18.6,6l1.8,3l-1.1,1.3c-0.9,1-0.9,2.5,0,3.5l1.1,1.3L18.6,18z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /app-Header -->

                <!--APP-SIDEBAR-->
                <div class="sticky">
                    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                    <div class="app-sidebar">
                        <div class="side-header">
                            <a class="header-brand1" href="/dashboard">

                                <img src="{{asset('admin/assets/images/ozierion.jpeg')}}" class="header-brand-img light-logo1" alt="logo">
                            </a><!-- LOGO -->
                        </div>
                        <div class="main-sidemenu">
                            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                    fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                                </svg>
                            </div>
                            
                            <ul class="side-menu">
                                <li>
                                    <h3>Menu</h3>
                                </li>
                                <li class="slide">
                                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('dashboard')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M19.9794922,7.9521484l-6-5.2666016c-1.1339111-0.9902344-2.8250732-0.9902344-3.9589844,0l-6,5.2666016C3.3717041,8.5219116,2.9998169,9.3435669,3,10.2069702V19c0.0018311,1.6561279,1.3438721,2.9981689,3,3h2.5h7c0.0001831,0,0.0003662,0,0.0006104,0H18c1.6561279-0.0018311,2.9981689-1.3438721,3-3v-8.7930298C21.0001831,9.3435669,20.6282959,8.5219116,19.9794922,7.9521484z M15,21H9v-6c0.0014038-1.1040039,0.8959961-1.9985962,2-2h2c1.1040039,0.0014038,1.9985962,0.8959961,2,2V21z M20,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2h-2v-6c-0.0018311-1.6561279-1.3438721-2.9981689-3-3h-2c-1.6561279,0.0018311-2.9981689,1.3438721-3,3v6H6c-1.1040039-0.0014038-1.9985962-0.8959961-2-2v-8.7930298C3.9997559,9.6313477,4.2478027,9.0836182,4.6806641,8.7041016l6-5.2666016C11.0455933,3.1174927,11.5146484,2.9414673,12,2.9423828c0.4853516-0.0009155,0.9544067,0.1751099,1.3193359,0.4951172l6,5.2665405C19.7521973,9.0835571,20.0002441,9.6313477,20,10.2069702V19z"/></svg>
                                        <span class="side-menu__label">Dashboard</span>
                                    </a>
                                </li>

                                
                                        
                                  

                                    @can('setup')
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                                <i class="fe fe-settings"> </i>
                                                <span class="side-menu__label"> &nbsp;Setup</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">Tables</a></li>
                                                    @can('slider')
                                                        <li><a href="{{route('slider.index')}}" class="slide-item">Sliders</a></li>
                                                    @endcan

                                                    @can('about')
                                                        <li><a href="{{route('about.index')}}" class="slide-item">About us</a></li>
                                                    @endcan

                                                    @can('country')
                                                        <li><a href="{{route('country.index')}}" class="slide-item">Countries</a></li>
                                                    @endcan

                                                    @can('branch')
                                                        <li><a href="{{route('branch.index')}}" class="slide-item">Branches</a></li>
                                                    @endcan

                                                    @can('category')
                                                        <li><a href="{{route('category.index')}}" class="slide-item">Categories</a></li>
                                                    @endcan

                                                    @can('sub')
                                                        <li><a href="{{route('sub_category.index')}}" class="slide-item">SubCategories</a></li>
                                                    @endcan

                                                    @can('type')
                                                        <li><a href="{{route('type.index')}}" class="slide-item">Types</a></li>
                                                    @endcan

                                                    @can('coach')
                                                        <li><a href="{{route('coach.index')}}" class="slide-item">Coaches</a></li>
                                                    @endcan

                                                    @can('sessions')
                                                        <li><a href="{{route('sessions.index')}}" class="slide-item">Sessions</a></li>
                                                    @endcan
                                               

                                            </ul>
                                        </li>
                                    @endcan

                                    @can('ecommerce')
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                               <i class="fe fe-shopping-bag"></i>
                                                <span class="side-menu__label"> &nbsp;E-commerce</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">Tables</a></li>
                                                    @can('products')
                                                        <li><a href="{{route('product.index')}}" class="slide-item">Products</a></li>
                                                    @endcan

                                               

                                            </ul>
                                        </li>
                                    @endcan

                                    @can('security')
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M20.6601562,7c-0.767334-1.3284302-2.5855103-1.836853-4.8673706-1.5704346C14.8826904,3.3205566,13.5338745,2,12,2S9.1172485,3.3204956,8.2071533,5.4296265C5.9249268,5.1627808,4.1060181,5.6706543,3.3398438,7c-0.7667847,1.3283081-0.2972412,3.1570435,1.074585,5c-1.3718262,1.8429565-1.8413696,3.6716919-1.074646,5c0.6367188,1.1025391,1.9942017,1.6435547,3.7421875,1.6435547c0.3729858-0.0189819,0.7437134-0.0548096,1.112915-0.1002197C9.1050415,20.6685791,10.4594116,22,12,22s2.8949585-1.3314209,3.8051147-3.456665c0.3692017,0.0454102,0.7399292,0.0812378,1.112915,0.1002197c1.7469482,0,3.1063843-0.5410156,3.7421265-1.6435547c0.7667847-1.3283081,0.2972412-3.1570435-1.074585-5C20.9573975,10.1570435,21.4269409,8.3283081,20.6601562,7z M15.6480713,8.3894043C15.2786865,8.1427612,14.8995972,7.9006348,14.5,7.6699219c-0.3996582-0.230835-0.7990723-0.4382935-1.1974487-0.6350098c0.6378784-0.2148438,1.2570801-0.3780518,1.8477173-0.4918823C15.3469238,7.1115112,15.5151978,7.7294312,15.6480713,8.3894043z M12,3c1.0654297,0,2.0482178,0.9987793,2.7738037,2.5901489c-0.8824463,0.1806641-1.8171387,0.4703369-2.7739868,0.8580933C11.0432129,6.06073,10.1085815,5.7709351,9.2261353,5.59021C9.9517212,3.9987793,10.9345093,3,12,3z M8.8425293,6.5646973c0.6322021,0.1143799,1.2553101,0.2702026,1.866333,0.4645996C10.3067017,7.2276001,9.9035645,7.4368286,9.5,7.6699219C9.1004028,7.9006348,8.7213135,8.1427612,8.3519287,8.3894043C8.4831543,7.7377319,8.6489868,7.1273193,8.8425293,6.5646973z M4.2050781,7.5c0.6743774-0.8552856,1.7492065-1.2923584,2.8291016-1.1503906c0.2658691,0.0151367,0.5303345,0.0407715,0.7941895,0.0700073c-0.2806396,0.8480225-0.494751,1.7927856-0.6360474,2.8049927C6.3783569,9.859436,5.6602173,10.5241089,5.0626221,11.197998C4.0467529,9.7736816,3.6727905,8.4230347,4.2050781,7.5z M7.0488892,13.3538208C6.5440674,12.9088745,6.0932007,12.4544067,5.6994019,12c0.3937988-0.4544067,0.8446655-0.9089355,1.3494873-1.3538818C7.0200195,11.0892944,7,11.5386353,7,12S7.0200195,12.9107056,7.0488892,13.3538208z M4.2050781,16.5c-0.5322876-0.9230347-0.1583252-2.2736816,0.8575439-3.697998c0.5975952,0.6738892,1.3157349,1.338562,2.1296997,1.9733887c0.1427002,1.0221558,0.3591309,1.9763184,0.6437988,2.8307495C6.0949097,17.7734375,4.7382812,17.4219971,4.2050781,16.5z M8.3519287,15.6105957C8.7213135,15.8572388,9.1004028,16.0993652,9.5,16.3300781c0.3783569,0.2339478,0.7686157,0.4447021,1.1637573,0.6447144c-0.6261597,0.2092285-1.2341309,0.3692017-1.8143921,0.4810181C8.652832,16.8876953,8.4847412,16.2700806,8.3519287,15.6105957z M12,21c-1.0717163,0-2.0603027-1.0095215-2.7870483-2.6173096C10.1655884,18.2009888,11.0983276,17.9318848,12,17.5773926c0.9016113,0.3544922,1.8344116,0.6235962,2.7870483,0.8052979C14.0603027,19.9904785,13.0717163,21,12,21z M15.1503906,17.456543c-0.5805054-0.1118164-1.1887207-0.2718506-1.8151245-0.4812622C13.7307739,16.7751465,14.1212769,16.56427,14.5,16.3300781c0.3995972-0.2307129,0.7786865-0.4728394,1.1480713-0.7194824C15.5151978,16.2703857,15.3470459,16.8881836,15.1503906,17.456543z M15.8648682,14.2316284C15.2859497,14.6641235,14.6652832,15.0805054,14,15.4648438c-0.6655884,0.3839111-1.3366699,0.7131958-2.0007935,0.9981689C11.3355713,16.1780396,10.6650391,15.8487549,10,15.4648438c-0.6652832-0.3843384-1.2859497-0.8007202-1.8648682-1.2332153C8.0501099,13.5140381,8,12.7683105,8,12s0.0501099-1.5140381,0.1351318-2.2316284C8.7140503,9.3358765,9.3347168,8.9194946,10,8.5351562c0.6747437-0.3895264,1.3552246-0.7230835,2.0283813-1.0108032C12.7068481,7.8132324,13.3676758,8.1464844,14,8.5351562c0.6652832,0.3843384,1.2859497,0.8007202,1.8648682,1.2332153C15.9498901,10.4859619,16,11.2316895,16,12S15.9498901,13.5140381,15.8648682,14.2316284z M19.7949219,7.5c0.5322876,0.9230347,0.1583252,2.2736816-0.8575439,3.697998c-0.5975952-0.6738892-1.3157349-1.338562-2.1296997-1.9733887c-0.1427612-1.022644-0.359314-1.9771729-0.644165-2.8319092C17.90448,6.2254639,19.2612915,6.5772095,19.7949219,7.5z M16.9511108,10.6461182C17.4559326,11.0910645,17.9067993,11.5455933,18.3005981,12c-0.3937988,0.4544067-0.8446655,0.9088745-1.3494873,1.3538208C16.9799805,12.9107056,17,12.4613647,17,12S16.9799805,11.0892944,16.9511108,10.6461182z M19.7949219,16.5c-0.5328369,0.9221191-1.8897095,1.2739868-3.6312866,1.1068115c0.28479-0.8546143,0.5013428-1.80896,0.644043-2.8314209c0.8139648-0.6348267,1.5321045-1.2994995,2.1296997-1.9733887C19.9532471,14.2263184,20.3272095,15.5769653,19.7949219,16.5z"></path>
                                                </svg>
                                                <span class="side-menu__label">Security</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <li><a class="slide-item" href="{{ route('users.index') }}">Manage Users</a></li>
                                                <li><a class="slide-item" href="{{ route('roles.index') }}">Manage Role</a></li>
                                                
                                                
                                                {{-- <li><a class="slide-item" href="{{ route('chat_gbt') }}">AI Module</a></li> --}}
                                            </ul>
                                        </li>
                                    
                                    @endcan

                                  


                                   
                                    

                               
                                    

                                    


                                 
                                    

                                   
                                    
                            </ul>
                            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                                    width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/APP-SIDEBAR-->
                @yield('content')

                <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
                            style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <h5>يوجد طلاب جدد</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                <footer class="footer">
                    <div class="container">
                        <div class="row align-items-center flex-row-reverse">
                            <div class="col-md-12 col-sm-12 text-center">
                                Copyright © 2026 <a href="#">ozireion</a>. Developed with <span class="fa fa-heart text-danger"></span> by <a href="#">Mind </a> All rights reserved
                            </div>
                        </div>
                    </div>
                </footer>

                    <!-- CONTAINER CLOSED -->
             </div>
        </div>


        <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

        <!-- JQUERY JS -->
        <script src="{{asset('admin/assets/plugins/jquery/jquery.min.js')}}"></script>

        <!-- BOOTSTRAP JS -->
        <script src="{{asset('admin/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

        <!-- SIDE-MENU JS -->
        <script src="{{asset('admin/assets/plugins/sidemenu/sidemenu.js')}}"></script>

        <!-- Perfect SCROLLBAR JS-->
        <script src="{{asset('admin/assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/p-scroll/pscroll.js')}}"></script>

        <!-- STICKY JS -->
        <script src="{{asset('admin/assets/js/sticky.js')}}"></script>


        <!-- APEXCHART JS -->
        <script src="{{asset('admin/assets/js/apexcharts.js')}}"></script>

        <!-- INTERNAL SELECT2 JS -->
        <script src="{{asset('admin/assets/plugins/select2/select2.full.min.js')}}"></script>

        <!-- CHART-CIRCLE JS-->
        <script src="{{asset('admin/assets/plugins/circle-progress/circle-progress.min.js')}}"></script>

        <!-- INTERNAL DATA-TABLES JS-->
        <script src="{{asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>

        <!-- INDEX JS -->
        <script src="{{asset('admin/assets/js/index1.js')}}"></script>
        <script src="{{asset('admin/assets/js/index.js')}}"></script>

        <!-- Reply JS-->
		<script src="{{asset('admin/assets/js/reply.js')}}"></script>

        

        <!-- COLOR THEME JS -->
        <script src="{{asset('admin/assets/js/themeColors.js')}}"></script>

        <!-- CUSTOM JS -->
        <script src="{{asset('admin/assets/js/custom.js')}}"></script>

        <!-- SWITCHER JS -->
        <script src="{{asset('admin/assets/switcher/js/switcher.js')}}"></script>

        <script src="{{asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/datatable/js/jszip.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/table-data.js')}}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

        @livewireScripts

        @stack('scripts')
    </body>


<!-- Mirrored from laravel8.spruko.com/noa/index by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Jan 2023 09:11:11 GMT -->
</html>
