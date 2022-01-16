@extends('layout.smartadmin')

@section('content')

<div class="modal fade" id="ijin-modal" tabindex='200'    role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id='div-content-ijin'>
            <div class="modal-header">
                <h4 class="modal-title">
                    Tambah Data Obrik
                    
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
        
           
</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="tambahijin()">Simpan</button>
            </div>
        </div>
    </div>
    </div> 




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

<ol class="breadcrumb " style="margin-top:18px;min-width:400px">
        <li class="breadcrumb-item"><a href="javascript:void(0);">eAudit</a></li>
        <li class="breadcrumb-item active">Master Obrik</li>
        
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
                            DAFTAR KEGIATAN/OBRIK
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                    <!-- datatable start -->
    
            

<table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
    <thead>
        <tr>
            <th>No</th>
            <th colspan='3'>Kelompok - Kegiatan/Obrik</th>
            <th>Irban</th>
            <th>Jan</th>
            <th>Feb</th>
            <th>Mar</th>
            <th>Apr</th>
            <th>Mei</th>
            <th>Jun</th>
            <th>Jul</th>
            <th>Agu</th>
            <th>Sep</th>
            <th>Okt</th>
            <th>Nov</th>
            <th>Des</th>

            <th>
            <button type="button" class="btn btn-sm btn-warning"
                data-toggle="modal" data-target="#ijin-modal">
                Tambah</button>
                </th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($data as $d)
        <tr>
            <td>{{$d->kode_grup_1}}</td>
            <td colspan="3">{{$d->nama}}</td>
            <td colspan="13"></td>
            
        </tr>
            @foreach($d->grup2 as $g)
            <tr>
                <td></td>
                <td>{{$g->kode_grup_2}}</td>
                <td colspan="2">{{$g->nama}}</td>
                
                <td colspan="13"></td>
            </tr>
                @foreach($g->obrik as $o)
                <tr>
                    <td></td>
                    <td></td>
                    <td>{{$o->urutan}}</td>
                    <td >{{$o->nama}}

                        
                    </td>
                    
                    <td >{{$o->irban}}</td>
                    <td 
                    @if($o->bul1)
                     style="background-color:cyan"
                    @endif
                    ><span style="font-size:9px">{{$o->bul1}}</span>
                    </td>
                    <td 
                    @if($o->bul2)
                     style="background-color:cyan"
                    @endif
                    ><span style="font-size:9px">{{$o->bul2}}</span>
                    </td>
                    <td 
                    @if($o->bul3)
                     style="background-color:cyan"
                    @endif
                    ><span style="font-size:9px">{{$o->bul3}}</span>
                    </td>
                    <td 
                    @if($o->bul4)
                     style="background-color:cyan"
                    @endif
                    ><span style="font-size:9px">{{$o->bul4}}</span>
                    </td>
                    <td 
                    @if($o->bul5)
                     style="background-color:cyan"
                    @endif
                    ><span style="font-size:9px">{{$o->bul5}}</span>
                    </td>
                    <td 
                    @if($o->bul6)
                     style="background-color:cyan"
                    @endif
                    ><span style="font-size:9px">{{$o->bul6}}</span>
                    </td>
                    <td 
                    @if($o->bul7)
                     style="background-color:cyan"
                    @endif
                    ><span style="font-size:9px">{{$o->bul7}}</span>
                    </td>
                    <td 
                    @if($o->bul8)
                     style="background-color:cyan"
                    @endif
                    ><span style="font-size:9px">{{$o->bul8}}</span>
                    </td>
                    <td 
                    @if($o->bul9)
                     style="background-color:cyan"
                    @endif
                    ><span style="font-size:9px">{{$o->bul9}}</span>
                    </td>
                    <td 
                    @if($o->bul10)
                     style="background-color:cyan"
                    @endif
                    ><span style="font-size:9px">{{$o->bul10}}</span>
                    </td>
                    <td 
                    @if($o->bul11)
                     style="background-color:cyan"
                    @endif
                    ><span style="font-size:9px">{{$o->bul11}}</span>
                    </td>
                    <td 
                    @if($o->bul12)
                     style="background-color:cyan"
                    @endif
                    ><span style="font-size:9px">{{$o->bul12}}</span>
                    </td>
                    <td>
                    <a href="{{url('obrik/'.$o->id)}}">
                                                            <button class='btn btn-sm btn-primary'>
                                                                Detail
                                                            </button>
                                                            </a>
                    </td>
                </tr>
                @endforeach
            @endforeach
        @endforeach
    </tbody>
</table>

<!-- datatable end -->
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
<script>
</script>
@endsection

@section('scriptbawah')

<script src="{{ asset('js/datagrid/datatables/datatables.bundle.js')}}"></script>



<script>
$.fn.modal.Constructor.prototype.enforceFocus = function() {};

        $(document).ready(function()
            {
                /*
                $('#dt-basic-example').dataTable(
                {
                    responsive: true
                });

                $('.js-thead-colors a').on('click', function()
                {
                    var theadColor = $(this).attr("data-bg");
                    console.log(theadColor);
                    $('#dt-basic-example thead').removeClassPrefix('bg-').addClass(theadColor);
                });

                $('.js-tbody-colors a').on('click', function()
                {
                    var theadColor = $(this).attr("data-bg");
                    console.log(theadColor);
                    $('#dt-basic-example').removeClassPrefix('bg-').addClass(theadColor);
                });
                */
           
            });

            var parentElement = $('#div-content-ijin');
   
            $('.select2').select2({
                dropdownParent: parentElement
            });


           
        </script>
@endsection