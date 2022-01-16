 

<div style="float:right">
<a href='km2/{{$o->id}}' target="_blank">
<button class='btn btn-info'>Print KM-2</button>
</a>
</div><br>
<h3>ANGGARAN WAKTU AUDIT OPERASIONAL : </h3>

<br>
No. Kartu Penugasan :
<input class="form-control" value="{{$o->no_kartu_penugasan}}"  style="display:inline;width:200px" id="no_kartu">
<button class="btn btn-primary" onclick="simpanNoKartuPenugasan({{$o->id}},$('#no_kartu').val())">Simpan</button>
<span style="color:green;display:none" id="span_kartu"><i class='fa fa-check'></i></span>
                   
<br>
<table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
    <thead>
        <tr>
            <th>No</th>
            <th>Uraian</th>
            <th>Ketua Tim <bR>(HA)</th>
            <th>Anggota Tim <br>(HA-4 Orang)</th>
            <th>Jumlah<bR>(HA)</th>
            
        </tr>
    </thead>
    <tbody> 
       
        @foreach($data as $g)
            <tr>
                <td>
                    <b>{{$g->kode}}</b>
                </td>
                <td colspan="4">
                <b>{{$g->nama}}</b>
                </td>
                
            </tr>
            @foreach($g->tahaps as $t)
                <tr>
                    <td>{{$t->urut}}</td>
                    <td>{{$t->nama}}</td>

                    <td>
                        
                        <select class="form-control" style="width:80px;font-weight:bold;display:inline"
                            onchange="simpanHAketua({{$o->id}},{{$t->id}},$(this).val())"
                           id="ketua_{{$t->id}}"
                        >
                            <option value='0'>-</option>
                            @for($i=1;$i<=10;$i++)
                            <option value='{{$i}}'
                            
                            @if($t->ha_ketua==$i)
                             selected='selected'
                            @endif
                            >{{$i}}</option>
                            @endfor

                        </select>
                        <span style="color:green;display:none"
                        id="span_ketua_{{$t->id}}"><i class='fa fa-check'></i></span>
                    </td>


                    <td>
                        
                        <select class="form-control" style="width:80px;font-weight:bold;display:inline"
                            onchange="simpanHAanggota({{$o->id}},{{$t->id}},$(this).val())"
                            id="anggota_{{$t->id}}"
                            >
                            <option value='0'>-</option>
                            @for($i=1;$i<=50;$i++)
                            <option value='{{$i}}'
                            @if($t->ha_anggota==$i)
                             selected='selected'
                            @endif
                            >{{$i}}</option>
                            @endfor

                        </select>
                        <span style="color:green;display:none"
                        id="span_anggota_{{$t->id}}"><i class='fa fa-check'></i></span>

                    </td>
                    <td id='jum_{{$t->id}}' style="text-align:center;font-weight:bold">

                    </td>
                    <script>
                        $('#jum_{{$t->id}}').html($('#ketua_{{$t->id}}').val()*1+$('#anggota_{{$t->id}}').val()*1)
                    </script>
                </tr>
            @endforeach
        @endforeach
       
    </tbody>
</table>
<script>

</script>