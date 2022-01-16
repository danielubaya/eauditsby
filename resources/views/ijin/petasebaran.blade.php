@extends('layout.smartadmin')

@section('content')
<header class="page-header" role="banner">
                        <div class="hidden-md-down dropdown-icon-menu position-relative">
                            <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
                                <i class="ni ni-menu"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
                                        <i class="ni ni-minify-nav"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
                                        <i class="ni ni-lock-nav"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    <ol class="breadcrumb " style="margin-top:18px;min-width:300px">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">SADEWA</a></li>
                            <li class="breadcrumb-item active">Perusahaan</li>
                           
                            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
                        </ol>
                    </header>
                    <!-- END Page Header -->
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                    
            <div class="content">

                <div class="row">
                            <div class="col-xl-12">
                                <div id="panel-1" class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                            PETA SEBARAN PERIJINAN
                                        </h2>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content" id='map' style="height:560px">
                                        </div>
                                        <div id="sidebar_div" >
    <h3>Legenda Peta:</h3>
    <p id='p_wkt'></p>
    

</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
            </div>
            </main>
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
                    <!-- BEGIN Page Footer -->
                    <footer class="page-footer" role="contentinfo">
                        <div class="d-flex align-items-center flex-1 text-muted">
                            <span class="hidden-md-down fw-700">2022 © INSPEKTORAT KOTA SURABAYA</a></span>
                        </div>
                        
                    </footer>
                    <!-- END Page Footer -->
                    <!-- BEGIN Shortcuts -->
@endsection

@section('scriptatas')
@endsection
@section('scriptbawah')


       
<script type="text/javascript">
    var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'] });

    var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'] });

    var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
    maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3']
    });


    var map=L.map('map',{
        
        zoomsliderControl: true,
          zoomControl: false,

    }).setView([-7.65745 , 112.752087], 9);
    var osm=L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {});       osm.addTo(map);     
    var baseMaps = {
			"OpenStreetMap": osm,
			"Google Street":googleStreets,
			"Google Satellite": googleSat,
			"googleHybrid":googleHybrid
		};
	  
	  L.control.layers(baseMaps).addTo(map);
        
 var ctPan=L.control.pan().addTo(map);

 var ctScale=L.control.betterscale().addTo(map);

 
var ctSidebar=L.control.sidebar('sidebar_div', 
{autoPan:false, closeButton:true, position: 'left'}).addTo(map);


      $('#peta-modal').on('shown.bs.modal', function() {
        map.invalidateSize();
    });

    var wkt = new Wkt.Wkt();
var ctBtnSidebar=L.easyButton("<span>Info<br>Peta</span>",
                function() {
                 ctSidebar.toggle();
                });
  	           ctBtnSidebar.addTo(map);
                 L.Control.geocoder().addTo(map);


    @foreach($data as $d)   
    var geom = "{{$d->wkt}}"; 
    wkt.read(geom); 
    var feature_{{$d->id}} = wkt.toObject(); 
    feature_{{$d->id}}.addTo(map); 
    feature_{{$d->id}}.on('click', function (e) { 
        var pop = L.popup();
        pop.setLatLng(e.latlng);
        pop.setContent("<table>" +
        "<tr><td>Ijin </td><td>:</td><td>{{$d->jenis}} {{$d->komoditas}}</td></tr>"+
        "<tr><td>Milik </td><td>:</td><td>{{$d->perusahaan->nama}} </td></tr>"+
        "<tr><td>Alamat </td><td>:</td><td>{{$d->desa}}, {{$d->kecamatan}},{{$d->kabupaten}}  </td></tr>"+
        "<tr><td>Luas </td><td>:</td><td>{{$d->luas}} ha </td></tr>"+
        "<tr><td>WIUP </td><td>:</td><td>{{$d->wiup}} </td></tr>"+
        "<tr><td>No Ijin </td><td>:</td><td>{{$d->no_ijin}} </td></tr>"+
        "<tr><td>Waktu </td><td>:</td><td>{{$d->tgl_awal}} s/d {{$d->tgl_akhir}} </td></tr>"+
        
        "</table>"
        
        );
        
        map.openPopup(pop);
    });  
    xy = feature_{{$d->id}}.getBounds().getCenter();
   
    var point_{{$d->id}}= L.marker(xy).bindPopup("Universitas Surabaya");
    point_{{$d->id}}.addTo(map);
    point_{{$d->id}}.on('click', function (e) { 
        var pop = L.popup();
        pop.setLatLng(e.latlng);
        pop.setContent("<table>" +
        "<tr><td>Ijin </td><td>:</td><td>{{$d->jenis}} {{$d->komoditas}}</td></tr>"+
        "<tr><td>Milik </td><td>:</td><td>{{$d->perusahaan->nama}} </td></tr>"+
        "<tr><td>Alamat </td><td>:</td><td>{{$d->desa}}, {{$d->kecamatan}},{{$d->kabupaten}}  </td></tr>"+
        "<tr><td>Luas </td><td>:</td><td>{{$d->luas}} ha </td></tr>"+
        "<tr><td>WIUP </td><td>:</td><td>{{$d->wiup}} </td></tr>"+
        "<tr><td>No Ijin </td><td>:</td><td>{{$d->no_ijin}} </td></tr>"+
        "<tr><td>Waktu </td><td>:</td><td>{{$d->tgl_awal}} s/d {{$d->tgl_akhir}} </td></tr>"+
        
        "</table>"
        
        );
         map.openPopup(pop);
    }); 

    @endforeach 


</script>
@endsection