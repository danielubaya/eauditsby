<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> 
            eAudit
        </title>
        <meta name="description" content="Page Titile">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="{{asset('css/vendors.bundle.css')}}">
        <link rel="stylesheet" media="screen, print" href="{{asset('css/app.bundle.css')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">   
  
        <link id="mytheme" rel="stylesheet" href="{{asset('css/themes/cust-theme-3.css')}}" >
        <!-- Place favicon.ico in the root directory -->
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon/favicon-32x32.png')}}">
        <!--<link rel="stylesheet" media="screen, print" href="css/your_styles.css">-->
       

<style>
 .select2-container--open {
                z-index: 9999999
            }

</style>

<meta name="csrf_token" content="{{csrf_token()}}">
        @yield('scriptatas')
    </head>
    <body class="mod-bg-1 ">
        <!-- DOC: script to save and load page settings -->
        <script>
            /**
             *	This script should be placed right after the body tag for fast execution 
             *	Note: the script is written in pure javascript and does not depend on thirdparty library
             **/
            'use strict';

            var classHolder = document.getElementsByTagName("BODY")[0],
                /** 
                 * Load from localstorage
                 **/
                themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
                {},
                themeURL = themeSettings.themeURL || '',
                themeOptions = themeSettings.themeOptions || '';
            /** 
             * Load theme options
             **/
            if (themeSettings.themeOptions)
            {
                classHolder.className = themeSettings.themeOptions;
                console.log("%c✔ Theme settings loaded", "color: #148f32");
            }
            else
            {
                console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
            }
            if (themeSettings.themeURL && !document.getElementById('mytheme'))
            {
                var cssfile = document.createElement('link');
                cssfile.id = 'mytheme';
                cssfile.rel = 'stylesheet';
                cssfile.href = themeURL;
                document.getElementsByTagName('head')[0].appendChild(cssfile);
            }
            /** 
             * Save to localstorage 
             **/
            var saveSettings = function()
            {
                themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
                {
                    return /^(nav|header|mod|display)-/i.test(item);
                }).join(' ');
                if (document.getElementById('mytheme'))
                {
                    themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
                };
                localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
            }
            /** 
             * Reset settings
             **/
            var resetSettings = function()
            {
                localStorage.setItem("themeSettings", "");
            }

        </script>
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside -->
                <aside class="page-sidebar">
                    <div class="page-logo">
                        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                            <img src="{{asset('img/logo.png')}}" alt="SmartAdmin WebApp" aria-roledescription="logo" style="width:54px"      >
                            <span class="page-logo-text mr-4" style="font-size:24px">eAudit</span>
                             </a>
                    </div>
                    <!-- BEGIN PRIMARY NAVIGATION -->
                    <nav id="js-primary-nav" class="primary-nav" role="navigation">
                        <div class="nav-filter">
                            <div class="position-relative">
                                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                                    <i class="fal fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="info-card">
                            <img src="{{asset('img/demo/avatars/avatar-m.png')}}" class="profile-image rounded-circle" alt="Admin">
                            <div class="info-card-text">
                                <a href="#" class="d-flex align-items-center text-white">
                                    <span class="text-truncate text-truncate-sm d-inline-block">
                                        Administrator
                                    </span>
                                </a>
                                <span class="d-inline-block text-truncate text-truncate-sm">Surabaya, Jatim</span>
                            </div>
                            <img src="{{asset('img/card-backgrounds/cover-2-lg.jpg')}}" class="cover" alt="cover">
                            <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                                <i class="fal fa-angle-down"></i>
                            </a>
                        </div>
                        <ul id="js-nav-menu" class="nav-menu">
                            <li><a href="{{url('obrik')}}" title="Daftar Obrik" >
                            <i class="fal fa-link"></i>
                                    <span class="nav-link-text" >Daftar Kegiatan/Obrik</span>                                                    </a>
                                </a></li>

                                <li class="">
                                <a href="#" title="Kendali Mutu" data-filter-tags="application intel" class=" waves-effect waves-themed" aria-expanded="true">
                                    <i class="fal fa-wrench"></i>
                                    <span class="nav-link-text" data-i18n="nav.application_intel">Kendali Mutu (KM)</span>
                                <b class="collapse-sign"><em class="fal fa-angle-up"></em></b></a>
                                <ul style="display: none;">
                                    <li>
                                        <a href="" title="Analytics Dashboard" class=" waves-effect waves-themed">
                                            <span class="nav-link-text" >SPT</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="KM1 - Kartu Penugasan" class=" waves-effect waves-themed">
                                            <span class="nav-link-text" >KM1 - Kartu Penugasan </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="KM2 - Anggaran Waktu" class=" waves-effect waves-themed">
                                            <span class="nav-link-text" >KM2 - Anggaran Waktu </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="KM2 - Anggaran Waktu" class=" waves-effect waves-themed">
                                            <span class="nav-link-text" >KM2 - Anggaran Waktu </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="KM3 - Program Audit/Evaluasi" class=" waves-effect waves-themed">
                                            <span class="nav-link-text" >KM3 - Program Audit/Evaluasi </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="KM4 - Lap. Supervisi Pengawasan " class=" waves-effect waves-themed">
                                            <span class="nav-link-text" >KM4 - Lap. Supervisi Pengawasan </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="KM5 - Pengendalian Penyusunan Laporan " class=" waves-effect waves-themed">
                                            <span class="nav-link-text" >KM5 - Pengendalian Penyusunan Laporan </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="KM6 - Reviu Konsep Laporan " class=" waves-effect waves-themed">
                                            <span class="nav-link-text" >KM6 - Reviu Konsep Laporan </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="KM7 - Checklist Akhir " class=" waves-effect waves-themed">
                                            <span class="nav-link-text" >KM7 - Checklist Akhir </span>
                                        </a>
                                    </li>                                   
                                </ul>
                            </li>
                            


                        </ul>
                        <div class="filter-message js-filter-message bg-success-600"></div>
                    </nav>
                    <!-- END PRIMARY NAVIGATION -->
                    <!-- NAV FOOTER -->
                    <div class="nav-footer shadow-top">
                        <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
                            <i class="ni ni-chevron-right"></i>
                            <i class="ni ni-chevron-right"></i>
                        </a>
                    </div> <!-- END NAV FOOTER -->
                </aside>
                <!-- END Left Aside -->
                <div class="page-content-wrapper">
                        
                    @yield('content')
                    
                </div>
            </div>
        </div>
        <!-- END Page Wrapper -->
        <!-- base vendor bundle: 
			 DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations 
						+ pace.js (recommended)
						+ jquery.js (core)
						+ jquery-ui-cust.js (core)
						+ popper.js (core)
						+ bootstrap.js (core)
						+ slimscroll.js (extension)
						+ app.navigation.js (core)
						+ ba-throttle-debounce.js (core)
						+ waves.js (extension)
						+ smartpanels.js (extension)
						+ src/../jquery-snippets.js (core) -->
        <script src="{{asset('js/vendors.bundle.js')}}"></script>
        <script src="{{ asset('js/formplugins/select2/select2.bundle.js')}}"></script>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

        <script src="{{asset('js/app.bundle.js')}}"></script>
        <!--<script src="js/../script.js"></script>
	<script>
		$(document).ready(function () {
			
		});
	</script>-->

    @yield('scriptbawah')
    </body>
</html>
