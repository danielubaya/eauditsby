<div class="modal fade" id="modal_realisasi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Realisasi Program
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body" id="div_realisasi">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updateRealisasiProgram($('#update_id').val(),$('#real_personil1').val(),$('#real_personil2').val(),$('#real_waktu').val())">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_tambah_program" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Tambah Program
                    
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
            <form>
                <div class="form-group">
                    <label class="form-label" for="simpleinput">Program Kerja</label>

                    <!--<input type="text" id="new_alamat" class="form-control">-->
                    <input class="form-control" id='new_program'/>
                </div>
                <div class="form-group">
                    <label class="form-label" for="simpleinput">Personil 1</label>

                    <!--<input type="text" id="new_alamat" class="form-control">-->
                    <Select class="select2 form-control" id='new_personil1'>
                        <option>- pilih personil -</option>
                        
                        @foreach($ps as $p)

                        <option value='{{$p->id}}'>{{$p->nama}} </option>
                        @endforeach
                    </Select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="simpleinput">Personil 2</label>

                    <!--<input type="text" id="new_alamat" class="form-control">-->
                    <Select class="select2 form-control" id='new_personil2'>
                        <option value="0">- Tanpa personil 2 -</option>
                        @foreach($ps as $p)

                        <option value='{{$p->id}}'>{{$p->nama}} </option>
                        @endforeach
                    </Select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="simpleinput">Anggaran Waktu</label>

                    <Select class="select2 form-control" id='new_waktu'>
                        <option>- Pilih waktu -</option>
                        @for($i=1;$i<=50;$i++)
                        <option value="{{$i}}">{{$i}} hari</option>
                        @endfor
                    </select>
                </div>
    
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" 
                onclick="tambahProgram({{$o->id}},$('#new_program').val(), $('#new_personil1').val(),$('#new_personil2').val(),$('#new_waktu').val() )">Simpan</button>
            </div>
        </div>
    </div>
</div> 

<div style="float:right">
<a href='km3/{{$o->id}}' target="_blank">
<button class='btn btn-info'>Print KM-3</button>
</a>
</div><br>
<h3>PROGRAM PERSIAPAN PELAKSANAAN / PENYELESAIAN PENUGASAN : </h3>

<table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
    <thead>
        <tr>
            <th rowspan="2" style="text-align:center">No</th>
            <th rowspan="2" style="text-align:center">Uraian<br>Tujuan dan Prosedur<br> Audit</th>
            <th colspan="2" style="text-align:center">Rencana</th>
            <th colspan="2" style="text-align:center">Realisasi</th>
            </th>
            <th rowspan="2" style="text-align:center">Ref<br> KKA</th>
            <th rowspan="2" style="text-align:center">Ket</th>
            
            <th rowspan="2">
            <button type="button" class="btn btn-sm btn-warning"
                data-toggle="modal" data-target="#modal_tambah_program">
                Tambah</button>
                </th>
        </tr>
        <tr>
            <th style="text-align:center">Dilaksanakan<br>oleh</th>

            <th style="text-align:center">Anggaran<br>Waktu</th>

            <th style="text-align:center">Dilaksanakan<br>oleh</th>

            <th style="text-align:center">Anggaran<br>Waktu</th>
        </tr>
    </thead>
    <tbody> 
        @php
            $no=0;
        @endphp
        @foreach($ops as $p)

            @php
                $no++;
            @endphp
            <tr>
                <td>
                    {{$no}}.
                </td>
                <td>
                    {{$p->nama_program}}
                </td>
                <td>
                    <ul style="padding-inline-start:8px">
                    @if($p->rencana_personil_1_nama)
                     <li>{{$p->rencana_personil_1_nama}}</li>
                    @endif
                    @if($p->rencana_personil_2_nama)
                     <li>{{$p->rencana_personil_2_nama}}</li>
                    @endif
                    </ul>    
                </td>
                <td>
                    {{$p->rencana_waktu}} hari
                </td>
                <td>
                    <ul style="padding-inline-start:8px">
                    @if($p->realisasi_personil_1_nama)
                     <li>{{$p->realisasi_personil_1_nama}}</li>
                     @endif
                     @if($p->realisasi_personil_2_nama)
                     <li>{{$p->realisasi_personil_2_nama}}</li>
                     @endif
                    </ul>    
                </td>
                <td>
                    {{$p->realisasi_waktu}} hari
                </td>
                <td>

                </td>
                <td>
                    {{$p->keterangan}}
                </td>
                <td>
                     
                <button class="btn btn-sm btn-warning"
                data-toggle="modal" data-target="#modal_realisasi"
                onclick="siapRealisasiProgram({{$o->id}},{{$p->id}})"
                >Realisasi</button>
                <button class='btn btn-sm btn-danger'
                onclick="if(confirm('apakah anda yakin untuk menghapus program ini?')) hapusProgram({{$p->id}})">
                    Hapus    
                </button>
                </td>
            </tr>
        @endforeach
       
    </tbody>
</table>
<script>

</script>