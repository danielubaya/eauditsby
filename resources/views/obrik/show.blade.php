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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">eAudit</a></li>
                            <li class="breadcrumb-item active">Detail Kegiatan/Obrik </li>
                           
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
                                <div class="row">
                                    <div class="col-12">
                                <br>
                                            <span style="font-weight:bold;font-size:16px"> {{ $d->nama_grup_1 }} <br>pada {{$d->nama}}</span>

                                </div>
                                </div>
                                   
                            </div>
                            <div class="panel-container show">
                                <div class="panel-content">
                                <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" id='tab1' href="#tab_borders_icons-1" role="tab"><i class="fal fa-user mr-1"></i> KM-1</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#tab_borders_icons-2" id='tab2' role="tab"><i class="fal fa-gavel mr-1"></i> KM-2</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#tab_borders_icons-3" role="tab"><i class="fal fa-binoculars mr-1"></i> KM-3</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#tab_borders_icons-4" role="tab"><i class="fal fa-clock mr-1"></i> KM-4</a>
                                                </li>

                                                <li class="nav-item" >
                                                    <a class="nav-link" data-toggle="tab" href="#tab_borders_icons-5" role="tab"><i class="fal fa-rocket mr-1"></i> KM-5</a>
                                                </li>

                                                <li class="nav-item" >
                                                    <a class="nav-link" data-toggle="tab" href="#tab_borders_icons-6" role="tab"><i class="fal fa-cloud mr-1"></i> KM-6</a>
                                                </li>

                                                <li class="nav-item" >
                                                    <a class="nav-link" data-toggle="tab" href="#tab_borders_icons-7" role="tab"><i class="fal fa-check mr-1"></i> KM-7</a>
                                                </li>
                                                
                                                
                                            </ul>
                                            <div class="tab-content border border-top-0 p-3">
                                                <div class="tab-pane fade show active" id="tab_borders_icons-1" role="tabpanel">
                                                    <img src="{{asset('/img/loading.gif')}}" />
                                                </div>
                                                <div class="tab-pane fade" id="tab_borders_icons-2" role="tabpanel">
                                                    <img src="{{asset('/img/loading.gif')}}" />
                                                </div>
                                                <div class="tab-pane fade" id="tab_borders_icons-3" role="tabpanel">
                                                    <img src="{{asset('/img/loading.gif')}}" />
                                                </div>
                                                <div class="tab-pane fade" id="tab_borders_icons-4" role="tabpanel">
                                                    <img src="{{asset('/img/loading.gif')}}" />
                                                </div>
                                                <div class="tab-pane fade" id="tab_borders_icons-5" role="tabpanel">
                                                    <img src="{{asset('/img/loading.gif')}}" />
                                                </div>
                                                <div class="tab-pane fade" id="tab_borders_icons-6" role="tabpanel">
                                                    <img src="{{asset('/img/loading.gif')}}" />
                                                 </div>
                                                 <div class="tab-pane fade" id="tab_borders_icons-7" role="tabpanel">
                                                    <img src="{{asset('/img/loading.gif')}}" />
                                                 </div>
                                            </div>                         
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

function isi_tab_1(id,target)
{
  //alert('masuk');
  $.ajax({
    type:'POST',
    url:'{{route("obrik.isi_tab_1")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'id':id           
          },
    success: function(data){
        //alert(data);
        $("#"+target).html(data)
        
      
    }
  });
}


function isi_tab_2(id,target)
{
  //alert('masuk');
  $.ajax({
    type:'POST',
    url:'{{route("obrik.isi_tab_2")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'id':id           
          },
    success: function(data){
        //alert(data);
        $("#"+target).html(data) 
    }
  });
}


function isi_tab_3(id,target)
{
  //alert('masuk');
  $.ajax({
    type:'POST',
    url:'{{route("obrik.isi_tab_3")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'id':id           
          },
    success: function(data){
        //alert(data);
        $("#"+target).html(data) 
    }
  });
}


function isi_tab_4(id,target)
{
  //alert('masuk');
  $.ajax({
    type:'POST',
    url:'{{route("obrik.isi_tab_4")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'id':id           
          },
    success: function(data){
        //alert(data);
        $("#"+target).html(data) 
    }
  });
}


function isi_tab_7(id,target)
{
  //alert('masuk');
  $.ajax({
    type:'POST',
    url:'{{route("obrik.isi_tab_7")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'id':id           
          },
    success: function(data){
        //alert(data);
        $("#"+target).html(data) 
    }
  });
}



function set_readonly_tab_1(tf)
{
    //alert("disini");
    $('#e_perusahaan').prop('disabled',tf);
    $('#e_jenisijin').prop('disabled',tf);
    $('#e_statusijin').prop('disabled',tf);
    $('#e_desaijin').prop('disabled',tf);

    $('#e_tahunijin').prop('disabled',tf);
    $('#e_nomorijin').prop('disabled',tf);
    
    $('#e_komoditas').prop('disabled',tf);

    $('#e_kabupaten').prop('disabled',tf);
    $('#div_tombolsimpan').toggle();
    $('#div_tomboledit').toggle();

    $('#tab0').trigger('click');

    $('#tab1').trigger('click');
    
}


function tambahPersonil(id)
{

  $.ajax({
    type:'POST',
    url:'{{route("obrik.tambahPersonil")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'obrik_id':id,
           'personil_id':$('#new_personil').val(),
           'sebagai':$('#new_sebagai').val(),
           
          },
    success: function(data){
        //alert(data);
        var arr=JSON.parse(JSON.stringify(data));

        //alert(arr['msg']);
       
        isi_tab_1({{$d->id}},'tab_borders_icons-1')
    }
  });
}

function simpanNoKartuPenugasan(obrik_id,no_kartu)
{
  //alert(obrik_id + " " + no_kartu )
  $.ajax({
    type:'POST',
    url:'{{route("obrik.simpanNoKartuPenugasan")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'obrik_id':obrik_id,
           'no_kartu':no_kartu
           
          },
    success: function(data){
        //alert(data);
        var arr=JSON.parse(JSON.stringify(data));

        if(arr['status']=='success')
        {
            $('#span_kartu').show();
        }
       
    }
  });
}


function simpanHAketua(obrik_id,tahap_id,nilai)
{
   // alert(obrik_id + " " + tahap_id + " " + nilai)
  $.ajax({
    type:'POST',
    url:'{{route("obrik.simpanHAketua")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'obrik_id':obrik_id,
           'tahap_id':tahap_id,
           'nilai':nilai,
           
          },
    success: function(data){
        //alert(data);
        var arr=JSON.parse(JSON.stringify(data));

        if(arr['status']=='success')
        {
            $('#span_ketua_'+tahap_id).show();
            $('#jum_'+tahap_id).html($('#ketua_'+tahap_id).val()*1+$('#anggota_'+tahap_id).val()*1)
           
        }
       
    }
  });
}



function simpanHAanggota(obrik_id,tahap_id,nilai)
{
  //  alert(obrik_id + " " + tahap_id + " " + nilai)
  $.ajax({
    type:'POST',
    url:'{{route("obrik.simpanHAanggota")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'obrik_id':obrik_id,
           'tahap_id':tahap_id,
           'nilai':nilai,
           
          },
    success: function(data){
        //alert(data);
        var arr=JSON.parse(JSON.stringify(data));

        if(arr['status']=='success')
        {
            $('#span_anggota_'+tahap_id).show();
            $('#jum_'+tahap_id).html($('#ketua_'+tahap_id).val()*1+$('#anggota_'+tahap_id).val()*1)
                 
        }
       
    }
  });
}

function tambahProgram(id,program,personil1,personil2,waktu)
{
  $.ajax({
    type:'POST',
    url:'{{route("obrik.tambahProgram")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'obrik_id':id,
           'program':program,
           'personil1':personil1,
           'personil2':personil2,
           'waktu':waktu
           
          },
    success: function(data){
        //alert(data);
        var arr=JSON.parse(JSON.stringify(data));
       
        isi_tab_3({{$d->id}},'tab_borders_icons-3')
    }
  });
}


function tambahSupervisi(id,personil_id,tanggal,jum_selesai,jum_sedang,jum_belum,persen_capaian,persen_target,masalah,instruksi)
{
  $.ajax({
    type:'POST',
    url:'{{route("obrik.tambahSupervisi")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'obrik_id':id,
           'personil_id':personil_id,
           'tanggal':tanggal,
           'jum_selesai':jum_selesai,
           'jum_sedang':jum_sedang,
           'jum_belum':jum_belum,
           'persen_capaian':persen_capaian,
           'persen_target':persen_target,
           'masalah':masalah,
           'instruksi':instruksi
          },
    success: function(data){
        //alert(data);
        var arr=JSON.parse(JSON.stringify(data));
       
        isi_tab_4({{$d->id}},'tab_borders_icons-4   ')
    }
  });
}

function updateRealisasiProgram(id,personil1,personil2,waktu)
{
  $.ajax({
    type:'POST',
    url:'{{route("obrik.updateRealisasiProgram")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'id':id,
           'personil1':personil1,
           'personil2':personil2,
           'waktu':waktu
           
          },
    success: function(data){
        //alert(data);
        var arr=JSON.parse(JSON.stringify(data));
       
        isi_tab_3({{$d->id}},'tab_borders_icons-3')
    }
  });
}


function siapRealisasiProgram(obrik_id,program_id)
{
  $.ajax({
    type:'POST',
    url:'{{route("obrik.siapRealisasiProgram")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'obrik_id':obrik_id,
           'program_id':program_id,
          },
    success: function(data){
        //alert(data);
        $('#div_realisasi').html(data);
    }
  });
}



$(document).ready(function()
    {
        isi_tab_1({{$d->id}},'tab_borders_icons-1');
        isi_tab_2({{$d->id}},'tab_borders_icons-2');
        isi_tab_3({{$d->id}},'tab_borders_icons-3');
        isi_tab_4({{$d->id}},'tab_borders_icons-4');
       // isi_tab_5({{$d->id}},'tab_borders_icons-5');
       // isi_tab_6({{$d->id}},'tab_borders_icons-6');
        isi_tab_7({{$d->id}},'tab_borders_icons-7');
    });


</script>
@endsection