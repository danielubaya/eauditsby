@extends('layout.smartadmin')

@section('content')

<div class="modal fade" id="ijin-modal" tabindex='200'    role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id='div-content-ijin'>
            <div class="modal-header">
                <h4 class="modal-title">
                    Tambah Data Perijinan
                    
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
        
            <div class="form-group">
        <label class="form-label" for="simpleinput">
        Perusahaan</label>

        <!--<input type="text" id="new_alamat" class="form-control">-->
        <Select class="select2 form-control" id='new_perusahaan'>
            <option>- pilih perusahaan -</option>
            
            @foreach($perusahaan as $p)

            
            <option value='{{$p->id}}'>{{$p->nama}}</option>

            @endforeach
        </Select>
    </div>

    <div class="form-group">
        <label class="form-label" for="example-select">Jenis Perizinan </label>
        <select class="form-control" id="new_jenisijin">
        <option>-pilih-</option>
        <option value='Izin Usaha Pertambangan (IUP)'>Izin Usaha Pertambangan (IUP)</option>
        <option value='Izin Usaha Pertambangan Khusus (IUPK)'>Izin Usaha Pertambangan Khusus (IUPK)</option>
        <option value='Izin Pertambangan Rakyat (IPR)'>Izin Pertambangan Rakyat (IPR)</option>
        <option value='Surat Izin Penambangan Batuan (SIPB)'>Surat Izin Penambangan Batuan (SIPB)</option>
        <option value='Izin Usaha Pertambangan Khusus (IUPK) sebagai Kelanjutan Operasi Kontrak/Perjanjian'>Izin Usaha Pertambangan Khusus (IUPK) sebagai Kelanjutan Operasi Kontrak/Perjanjian</option>
        <option value='PKP2B'>PKP2B</option>
        <option value='KK'>KK</option>
        <option value='Surat Izin Pertambangan Daerah (SIPD)'>Surat Izin Pertambangan Daerah (SIPD)</option>
        <option value='Kuasa Pertambangan (KP)'>Kuasa Pertambangan (KP) </option>
        </select>
    </div>

<div class="form-group">
        <label class="form-label" for="example-select">Status Perijinan </label>
        <select class="form-control" id="new_statusijin">
        <option>-pilih-</option>
        <option value='Baru'>Baru</option>
        <option value='Penyesuaian'>Penyesuaian</option>
        <option value='Perpanjangan Pertama'>Perpanjangan Pertama
</option>
        <option value='Perpanjangan Kedua'>Perpanjangan Kedua</option>
        <option value='Penciutan'>Penciutan</option>
        <option value='Eksisting'>Eksisting</option>
        </select>
    </div>


    <div class="form-group"> 
        <label class="form-label " for="example-select">Kabupaten </label>
        <select class="form-control select2" id="new_kabupaten"
        onchange="
        kode2=$(this).val().split('|')[0];
        refresh_wiup();
        refresh_desa()">
        <option>- pilih kabupaten/kota -</option>
        @foreach($kab as $k)
        <option value='{{$k->kode}}|{{$k->nama}}'>{{$k->nama}}</option>
        @endforeach
        </select>
    </div>


    <div class="form-group">
        <label class="form-label" for="simpleinput">Desa</label>
        <select  id="new_desaijin" class="form-control select2">
        </select>
    </div>

    <div class="form-group">
        <label class="form-label" for="simpleinput">Komoditas</label>

        <!--<input type="text" id="new_alamat" class="form-control">-->
        <Select class="select2 form-control" id='new_komoditas' onchange="kode3=$(this).val().split('|')[0];refresh_wiup()">
        
            <option>- pilih komoditas -</option>
            
            @foreach($minj as $j)

            <optgroup label="{{$j->nama_jenis}}">
            @foreach($j->mins as $m)

            <option value='{{$m->kode}}|{{$j->nama_jenis}}|{{$m->nama_mineral}}'>{{$m->nama_mineral}}</option>
            @endforeach
            </optgroup>
            @endforeach
        </Select>
    </div>

    <div class="form-group " >
        <label class="form-label" for="simpleinput">Tahun dan Nomor</label>
        <Div class="row" style="padding-left:12px; padding-right:12px">
    <input type="text" id="new_tahunijin"  class="form-control col-sm-6" onkeyup="kode4=$(this).val();refresh_wiup()">
         <input class="form-control col-sm-6" type="text"    onkeyup="kode5=$(this).val();refresh_wiup()" id="new_nomorijin">   </Div>
     </div>

                
    <div class="form-group">
        <label class="form-label" for="simpleinput">Kode WIUP</label>
        <input type="text" readonly='t' disabled='t' id="new_wiupijin" class="form-control">
    </div>

    
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

<ol class="breadcrumb " style="margin-top:18px;min-width:300px">
        <li class="breadcrumb-item"><a href="javascript:void(0);">SADEWA</a></li>
        <li class="breadcrumb-item active">Perijinan</li>
        
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
                            DAFTAR IZIN PERTAMBANGAN
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                    <!-- datatable start -->
    <div class="modal fade modal-fullscreen" id="peta-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Peta Lokasi Perijinan
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body" id="div_peta"
              style="padding:0px">
            </div>
        </div>
    </div>
    </div>
            

       
<table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
    <thead>
        <tr>
            <th>Perusahaan -<br>WIUP</th>
            <th>Jenis-Status Izin
            <th>Komoditas</th>
            <th>Lokasi</th>
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
            <td>{{$d->perusahaan->nama}}<br>{{$d->wiup}}</td>
            <td>{{$d->jenis}}<br>{{$d->status}}
            <td>{{$d->jenis_komoditas}}<br>
                <b>{{$d->komoditas}}</b></td>
            <td >{{$d->desa}}, {{$d->kecamatan}},
                    {{$d->kabupaten}}, {{$d->propinsi}}

                    <br>
                    <button class="btn btn-sm btn-info"
                    data-toggle="modal" data-target="#peta-modal"
                onclick="bukapeta({{$d->id}},'div_peta')"
                    >Peta Lokasi</button>
            </td>
            <td>
            <a href="{{url('ijin/'.$d->id)}}">
                                                            
                <button class='btn btn-sm btn-primary'>
                    Detail    
                </button>
                
            </td>
        </tr>
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


var kode1='2235';
var kode2='';
var kode3='';
var kode4='';
var kode5='';


function refresh_wiup()
{
    $('#new_wiupijin').val(kode1+kode2+kode3+kode4+kode5);
}


function refresh_desa()
{

  $.ajax({
    type:'POST',
    url:'{{route("ijin.daftardesa")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'kode':kode2,
          },
    success: function(data){
        //alert(data);
        var arr=JSON.parse(data);   
        $('#new_desaijin').html('');
        var temp="<option value=''>- pilih -</option>";
                $('#new_desaijin').append(temp);
       // alert(arr.length);
        for(var i=0;i<arr.length;i++)
        {
            $('#new_desaijin').append("<optgroup label='"+arr[i]['kecamatan']+ "'>");
            var arr2=JSON.parse(JSON.stringify(arr[i]['desa']));
            //alert(arr2[0]['desa']);
            for(var i2=0;i2<arr2.length;i2++)
            {
                var temp="<option value='"+arr2[i2]['desa']+"|"+arr[i]['kecamatan']+"'>"+ arr2[i2]['desa']+", "+arr[i]['kecamatan']+"</option>";
                $('#new_desaijin').append(temp);
            }
            $('#new_desaijin').append("</optgroup>");
        }
            
           
        
    }
  });
}

function tambahijin()
{
  arr=$('#new_desaijin').val().split('|');
  arr2=$('#new_komoditas').val().split('|');

  $.ajax({
    type:'POST',
    url:'{{route("ijin.tambahijin")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'perusahaan_id':$('#new_perusahaan').val(),
           'jenis':$('#new_jenisijin').val(),
           'status':$('#new_statusijin').val(),
           'jenis_komoditas':arr2[1],
           'komoditas':arr2[2],
           'wiup':$('#new_wiupijin').val(),
           'kabupaten':$('#new_kabupaten').val().split('|')[1],
           'kecamatan':arr[0],
           'desa':arr[1],
           'propinsi':'Jawa Timur',
           
          },
    success: function(data){
        //alert(data);
        var arr=JSON.parse(JSON.stringify(data));

        alert(arr['msg']);
       
        
        window.location.href = "{{ route('ijin.index')}}";
    }
  });
}


function bukapeta(id,target)
{
  $.ajax({
    type:'POST',
    url:'{{route("perusahaan.lihatpeta")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'id':id,
          },
    success: function(data){
        //alert(data);
        $('#'+target).html(data.isi);
       
    }
  });
}

function simpanwkt(id,wkt)
{
  $.ajax({
    type:'POST',
    url:'{{route("perusahaan.simpanwkt")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'id':id,
           'wkt':wkt
          },
    success: function(data){
        alert(data);
       // $('#'+target).html(data.isi);
       
    }
  });
}
function simpanwkt(id,wkt)
{
  $.ajax({
    type:'POST',
    url:'{{route("perusahaan.simpanwkt")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'id':id,
           'wkt':wkt
          },
    success: function(data){
        alert(data);
       // $('#'+target).html(data.isi);
       
    }
  });
}



</script>
@endsection

@section('scriptbawah')

<script src="{{ asset('js/datagrid/datatables/datatables.bundle.js')}}"></script>



<script>
$.fn.modal.Constructor.prototype.enforceFocus = function() {};

        $(document).ready(function()
            {
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
    
           
            });

            var parentElement = $('#div-content-ijin');
   
            $('.select2').select2({
                dropdownParent: parentElement
            });


           
        </script>
@endsection