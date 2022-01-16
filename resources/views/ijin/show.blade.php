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
                            <li class="breadcrumb-item active">Detail Perizinan </li>
                           
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
                                    Data Izin Pertambangan {{ $d->komoditas }}  di {{$d->perusahaan->nama}}
                                </h2>
                            </div>
                            <div class="panel-container show">
                                <div class="panel-content">
                                <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" id='tab1' href="#tab_borders_icons-1" role="tab"><i class="fal fa-file mr-1"></i> Perizinan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#tab_borders_icons-2" id='tab2' role="tab"><i class="fal fa-gavel mr-1"></i> Tahap Penetapan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#tab_borders_icons-3" role="tab"><i class="fal fa-binoculars mr-1"></i> Tahap Explorasi</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#tab_borders_icons-4" role="tab"><i class="fal fa-rocket mr-1"></i> Operasi Produksi</a>
                                                </li>

                                                <li class="nav-item" style='display:none'>
                                                    <a class="nav-link" data-toggle="tab" href="#tab_borders_icons-5" id='tab0' role="tab"><i class="fal fa-rocket mr-1"></i> Operasi Produksi</a>
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


var kode1='2235';
var kode2='';
var kode3='';
var kode4='';
var kode5='';


function refresh_wiup()
{
    $('#e_wiupijin').val(kode1+kode2+kode3+kode4+kode5);
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
        $('#e_desaijin').html('');
        var temp="<option value=''>- pilih -</option>";
                $('#e_desaijin').append(temp);
       // alert(arr.length);
        for(var i=0;i<arr.length;i++)
        {
            $('#e_desaijin').append("<optgroup label='"+arr[i]['kecamatan']+ "'>");
            var arr2=JSON.parse(JSON.stringify(arr[i]['desa']));
            //alert(arr2[0]['desa']);
            for(var i2=0;i2<arr2.length;i2++)
            {
                var temp="<option value='"+arr2[i2]['desa']+"|"+arr[i]['kecamatan']+"'>"+ arr2[i2]['desa']+", "+arr[i]['kecamatan']+"</option>";
                $('#e_desaijin').append(temp);
            }
            $('#e_desaijin').append("</optgroup>");
        }
            
           
        
    }
  });
}


function simpan_tab_1()
{
    arr=$('#e_desaijin').val().split('|');
  arr2=$('#e_komoditas').val().split('|');
  $.ajax({
    type:'POST',
    url:'{{route("ijin.updateijin")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'id':$('#e_id').val(),
           'perusahaan_id':$('#e_perusahaan').val(),
           'jenis':$('#e_jenisijin').val(),
           'status':$('#e_statusijin').val(),
           'jenis_komoditas':arr2[1],
           'komoditas':arr2[2],
           'wiup':$('#e_wiupijin').val(),
           'kabupaten':$('#e_kabupaten').val().split('|')[1],
           'kecamatan':arr[0],
           'desa':arr[1],
           'propinsi':'Jawa Timur',
           
          },
  success: function(data){
        //alert(data);
        var arr=JSON.parse(JSON.stringify(data));

        alert(arr['msg']);
        window.location.href = "{{ url('ijin/'.$d->id)}}";
       
        
    }
  });
}


function simpan_tab_2()
{
  $.ajax({
    type:'POST',
    url:'{{route("ijin.updateijinpenetapan")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'id':$('#e_id').val(),
           'penetapan_no':$('#e_penetapan_no').val(),
           'penetapan_oleh':$('#e_penetapan_oleh').val(),
           'penetapan_pejabat':$('#e_penetapan_pejabat').val(),
           'penetapan_luas':$('#e_penetapan_luas').val(),
           'penetapan_awal':$('#e_penetapan_awal').val(),
           'penetapan_akhir':$('#e_penetapan_akhir').val(),

          },
  success: function(data){
        //alert(data);
        var arr=JSON.parse(JSON.stringify(data));

        alert(arr['msg']);
       
        
    }
  });

    var postData=new FormData();
    postData.append('file',$('#f_penetapan').get(0).files[0]);
    postData.append('id',$('#e_id').val());
    postData.append('folder','penetapan');
    var fullPath1 = document.getElementById('f_penetapan').value;
    var startIndex1 = (fullPath1.indexOf('\\') >= 0 ? fullPath1.lastIndexOf('\\') : fullPath1.lastIndexOf('/'));
    var filename1 = fullPath1.substring(startIndex1);
    if (filename1.indexOf('\\') === 0 || filename1.indexOf('/') === 0) {
        filename1 = filename1.substring(1);
    }
    //alert(filename);

    var url="{{url('ijin/ajaxupload')}}";
    $.ajax({
        headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
        async:true,
        type:"post",
        contentType:false,
        url:url,
        data:postData,
        processData:false,
        success:function(data){
            var temp1="- <a href='../DOKUMEN_IJIN/"+$('#e_id').val()+"/penetapan/"+filename1+"' target='_blank'>"+filename1+"</a><br/>";
            $("#div_penetapan").append(temp1)
            alert(data);
        }
    });
}


function simpan_tab_3()
{
  $.ajax({
    type:'POST',
    url:'{{route("ijin.updateijinexplorasi")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'id':$('#e_id').val(),
           'explorasi_no':$('#e_explorasi_no').val(),
           'explorasi_oleh':$('#e_explorasi_oleh').val(),
           'explorasi_pejabat':$('#e_explorasi_pejabat').val(),
           'explorasi_luas':$('#e_explorasi_luas').val(),
           'explorasi_awal':$('#e_explorasi_awal').val(),
           'explorasi_akhir':$('#e_explorasi_akhir').val(),

          },
  success: function(data){
        //alert(data);
        var arr=JSON.parse(JSON.stringify(data));

        alert(arr['msg']);
       
        
    }
  });

    var postData=new FormData();
    postData.append('file',$('#f_rkabexp').get(0).files[0]);
    postData.append('id',$('#e_id').val());
    postData.append('folder','rkabexp');
    var fullPath1 = document.getElementById('f_rkabexp').value;
    var startIndex1 = (fullPath1.indexOf('\\') >= 0 ? fullPath1.lastIndexOf('\\') : fullPath1.lastIndexOf('/'));
    var filename1 = fullPath1.substring(startIndex1);
    if (filename1.indexOf('\\') === 0 || filename1.indexOf('/') === 0) {
        filename1 = filename1.substring(1);
    }
    var url="{{url('ijin/ajaxupload')}}";
    $.ajax({
        headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
        async:true,
        type:"post",
        contentType:false,
        url:url,
        data:postData,
        processData:false,
        success:function(data){
            var temp1="- <a href='../DOKUMEN_IJIN/"+$('#e_id').val()+"/rkabexp/"+filename1+"' target='_blank'>"+filename1+"</a><br/>";
            $("#div_rkabexp").append(temp1)
            alert(data);
        }
    });


    var postData2=new FormData();
    postData2.append('file',$('#f_laporanexp').get(0).files[0]);
    postData2.append('id',$('#e_id').val());
    postData2.append('folder','laporanexp');
    var fullPath2 = document.getElementById('f_laporanexp').value;
    var startIndex2 = (fullPath2.indexOf('\\') >= 0 ? fullPath2.lastIndexOf('\\') : fullPath2.lastIndexOf('/'));
    var filename2 = fullPath2.substring(startIndex2);
    if (filename2.indexOf('\\') === 0 || filename2.indexOf('/') === 0) {
        filename2 = filename2.substring(1);
    }
    var url="{{url('ijin/ajaxupload')}}";
    $.ajax({
        headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
        async:true,
        type:"post",
        contentType:false,
        url:url,
        data:postData2,
        processData:false,
        success:function(data){
            var temp1="- <a href='../DOKUMEN_IJIN/"+$('#e_id').val()+"/laporanexp/"+filename2+"' target='_blank'>"+filename2+"</a><br/>";
            $("#div_laporanexp").append(temp1)
            alert(data);
        }
    });

}




function simpan_tab_4()
{
  $.ajax({
    type:'POST',
    url:'{{route("ijin.updateijinproduksi")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'id':$('#e_id').val(),
           'produksi_no':$('#e_produksi_no').val(),
           'produksi_oleh':$('#e_produksi_oleh').val(),
           'produksi_pejabat':$('#e_produksi_pejabat').val(),
           'produksi_luas':$('#e_produksi_luas').val(),
           'produksi_awal':$('#e_produksi_awal').val(),
           'produksi_akhir':$('#e_produksi_akhir').val(),

          },
  success: function(data){
        //alert(data);
        var arr=JSON.parse(JSON.stringify(data));

        alert(arr['msg']);
       
        
    }
  });

    var postData1=new FormData();
    postData1.append('file',$('#f_rkabprod').get(0).files[0]);
    postData1.append('id',$('#e_id').val());
    postData1.append('folder','rkabprod');
    var fullPath1 = document.getElementById('f_rkabprod').value;
    var startIndex1 = (fullPath1.indexOf('\\') >= 0 ? fullPath1.lastIndexOf('\\') : fullPath1.lastIndexOf('/'));
    var filename1 = fullPath1.substring(startIndex1);
    if (filename1.indexOf('\\') === 0 || filename1.indexOf('/') === 0) {
        filename1 = filename1.substring(1);
    }
    var url="{{url('ijin/ajaxupload')}}";
    $.ajax({
        headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
        async:true,
        type:"post",
        contentType:false,
        url:url,
        data:postData1,
        processData:false,
        success:function(data){
            var temp1="- <a href='../DOKUMEN_IJIN/"+$('#e_id').val()+"/rkabprod/"+filename1+"' target='_blank'>"+filename1+"</a><br/>";
            $("#div_rkabprod").append(temp1)
            alert(data);
        }
    });


    var postData2=new FormData();
    postData2.append('file',$('#f_reklamasi').get(0).files[0]);
    postData2.append('id',$('#e_id').val());
    postData2.append('folder','reklamasi');
    var fullPath2 = document.getElementById('f_reklamasi').value;
    var startIndex2 = (fullPath2.indexOf('\\') >= 0 ? fullPath2.lastIndexOf('\\') : fullPath2.lastIndexOf('/'));
    var filename2 = fullPath2.substring(startIndex2);
    if (filename2.indexOf('\\') === 0 || filename2.indexOf('/') === 0) {
        filename2 = filename2.substring(1);
    }
    var url="{{url('ijin/ajaxupload')}}";
    $.ajax({
        headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
        async:true,
        type:"post",
        contentType:false,
        url:url,
        data:postData2,
        processData:false,
        success:function(data){
            var temp1="- <a href='../DOKUMEN_IJIN/"+$('#e_id').val()+"/reklamasi/"+filename2+"' target='_blank'>"+filename2+"</a><br/>";
            $("#div_reklamasi").append(temp1)
            alert(data);
        }
    });

    var postData3=new FormData();
    postData3.append('file',$('#f_pascatambang').get(0).files[0]);
    postData3.append('id',$('#e_id').val());
    postData3.append('folder','pascatambang');
    var fullPath3 = document.getElementById('f_pascatambang').value;
    var startIndex3 = (fullPath3.indexOf('\\') >= 0 ? fullPath3.lastIndexOf('\\') : fullPath3.lastIndexOf('/'));
    var filename3 = fullPath3.substring(startIndex3);
    if (filename3.indexOf('\\') === 0 || filename3.indexOf('/') === 0) {
        filename3 = filename3.substring(1);
    }
    var url="{{url('ijin/ajaxupload')}}";
    $.ajax({
        headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
        async:true,
        type:"post",
        contentType:false,
        url:url,
        data:postData3,
        processData:false,
        success:function(data){
            var temp1="- <a href='../DOKUMEN_IJIN/"+$('#e_id').val()+"/pascatambang/"+filename3+"' target='_blank'>"+filename3+"</a><br/>";
            $("#div_pascatambang").append(temp1)
            alert(data);
        }
    });
    

    var postData4=new FormData();
    postData4.append('file',$('#f_lingkungan').get(0).files[0]);
    postData4.append('id',$('#e_id').val());
    postData4.append('folder','lingkungan');
    var fullPath4 = document.getElementById('f_lingkungan').value;
    var startIndex4 = (fullPath4.indexOf('\\') >= 0 ? fullPath4.lastIndexOf('\\') : fullPath4.lastIndexOf('/'));
    var filename4 = fullPath4.substring(startIndex4);
    if (filename4.indexOf('\\') === 0 || filename4.indexOf('/') === 0) {
        filename4 = filename4.substring(1);
    }
    var url="{{url('ijin/ajaxupload')}}";
    $.ajax({
        headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
        async:true,
        type:"post",
        contentType:false,
        url:url,
        data:postData4,
        processData:false,
        success:function(data){
            var temp1="- <a href='../DOKUMEN_IJIN/"+$('#e_id').val()+"/lingkungan/"+filename4+"' target='_blank'>"+filename4+"</a><br/>";
            $("#div_lingkungan").append(temp1)
            alert(data);
        }
    });

}



function uploaddokdir(perusahaan_id,id)
{
    var postData=new FormData();
    postData.append('file',$('#f_dokdir_'+id).get(0).files[0]);
    postData.append('id',perusahaan_id);
    postData.append('folder','direksi_'+id);
    var fullPath1 = document.getElementById('f_dokdir_'+id).value;
    var startIndex1 = ( fullPath1.indexOf('\\') >= 0 ? fullPath1.lastIndexOf('\\') : fullPath1.lastIndexOf('/'));
    var filename1 = fullPath1.substring(startIndex1);
    if (filename1.indexOf('\\') === 0 || filename1.indexOf('/') === 0) {
        filename1 = filename1.substring(1);
    }
//alert(filename);

    var url="{{url('perusahaan/ajaxupload')}}";
    $.ajax({
        headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
        async:true,
        type:"post",
        contentType:false,
        url:url,
        data:postData,
        processData:false,
        success:function(data){
            var temp1="- <a href='../DOKUMEN/"+perusahaan_id+"/direksi_" + id +"/"+filename1+"' target='_blank'>"+filename1+"</a><br/>";
            $("#div_dokdir_"+id).append(temp1);     
            alert(data);
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
    url:'{{route("ijin.isi_tab_1")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'id':id           
          },
    success: function(data){
        //alert(data);
        $("#"+target).html(data)
        
        $("select.select2").select2({
                        tags: true
                    })
    }
  });
}


function isi_tab_2(id,target)
{
  //alert('masuk');
  $.ajax({
    type:'POST',
    url:'{{route("ijin.isi_tab_2")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
           'id':id           
          },
    success: function(data){
        //alert(data);
        $("#"+target).html(data);
    
    }
  });
}

function isi_tab_3(id,target)
{
  //alert('masuk');
  $.ajax({
    type:'POST',
    url:'{{route("ijin.isi_tab_3")}}',
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
    url:'{{route("ijin.isi_tab_4")}}',
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

function set_readonly_tab_2(tf)
{
    //alert("disini");
    $('#e_penetapan_no').prop('disabled',tf);
    $('#e_penetapan_oleh').prop('disabled',tf);
    $('#e_penetapan_pejabat').prop('disabled',tf);
    $('#e_penetapan_luas').prop('disabled',tf);
    $('#e_penetapan_awal').prop('disabled',tf);
    $('#e_penetapan_akhir').prop('disabled',tf);

    $('#f_penetapan').prop('disabled',tf);
    $('#div_tombolsimpan2').toggle();
    $('#div_tomboledit2').toggle();
}



function set_readonly_tab_3(tf)
{
    //alert("disini");
    $('#e_explorasi_no').prop('disabled',tf);
    $('#e_explorasi_oleh').prop('disabled',tf);
    $('#e_explorasi_pejabat').prop('disabled',tf);
    $('#e_explorasi_luas').prop('disabled',tf);
    $('#e_explorasi_awal').prop('disabled',tf);
    $('#e_explorasi_akhir').prop('disabled',tf);

    $('#f_rkabexp').prop('disabled',tf);
    $('#f_laporanexp').prop('disabled',tf);
    $('#div_tombolsimpan3').toggle();
    $('#div_tomboledit3').toggle();
}


function set_readonly_tab_4(tf)
{
    //alert("disini");
    $('#e_produksi_no').prop('disabled',tf);
    $('#e_produksi_oleh').prop('disabled',tf);
    $('#e_produksi_pejabat').prop('disabled',tf);
    $('#e_produksi_luas').prop('disabled',tf);
    $('#e_produksi_awal').prop('disabled',tf);
    $('#e_produksi_akhir').prop('disabled',tf);

    $('#f_rkabprod').prop('disabled',tf);
    $('#f_reklamasi').prop('disabled',tf);
    $('#f_lingkungan').prop('disabled',tf);
    $('#f_pascatambang').prop('disabled',tf);
    $('#div_tombolsimpan4').toggle();
    $('#div_tomboledit4').toggle();
}

        $(document).ready(function()
            {


                kode2=<?php echo substr($d->wiup,4,2) ?>;
                kode3=<?php echo substr($d->wiup,6,3) ?>;
                kode4=<?php echo substr($d->wiup,9,4) ?>;
                kode5=<?php echo substr($d->wiup,13) ?>;

                isi_tab_1({{$d->id}},'tab_borders_icons-1');
                isi_tab_2({{$d->id}},'tab_borders_icons-2');
                isi_tab_3({{$d->id}},'tab_borders_icons-3');
                isi_tab_4({{$d->id}},'tab_borders_icons-4');
            


                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    changeSelect()
                })

                // Select2
                function changeSelect() {
                    $("select.select2").select2({
                        tags: true
                    })
                }


            });


    
        </script>
@endsection