<div class="modal fade  " id="modal_tambah_supervisi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Tambah Laporan
                    
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
            <form>
               
                <div class="form-group">
                    <label class="form-label" for="simpleinput">Nama </label>

                    <!--<input type="text" id="new_alamat" class="form-control">-->
                    <Select class="select2 form-control" id='new_supervisi_personil'>
                        <option>- pilih personil -</option>
                        
                        @foreach($ps as $p)

                        <option value='{{$p->id}}'>{{$p->nama}} </option>
                        @endforeach
                    </Select>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="simpleinput">Tanggal</label>

                    <!--<input type="text" id="new_alamat" class="form-control">-->
                    <input class="form-control" id='new_supervisi_tanggal'/>
                    <script>
                    $(function () {
                        $('#new_supervisi_tanggal').datepicker({  
                            format: 'dd-mm-yyyy'
                            });  
                    });
                    </script>

                </div>
                Kemajuan Pengawasan:
                <br>
                <ol type="I">
                    <li>
                    Evaluasi pelaksanaan program audit :<br>
                    <table>
                        <tr>
                            <td>
                                1.
                            </td>
                            <td>Jumlah program audit yang telah diselesaikan</td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control"
                                style="display:inline;width: 60px" id="new_jum_selesai"> program
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2.
                            </td>
                            <td>Nomor Program audit sedang dilaksanakan </td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control"
                                style="display:inline;width: 60px" id="new_jum_sedang"> program
                            </td>
                        </tr>
                        <tr>
                            <td>
                                3.
                            </td>
                            <td>Jumlah program audit yang belum dikerjakan </td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control"
                                style="display:inline;width: 60px" id="new_jum_belum"> program
                            </td>
                        </tr>   
                        <tr>
                            <td>
                                4.
                            </td>
                            <td>Prosentase realisasi pencapaian target </td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control"
                                style="display:inline;width: 60px" id="new_persen_capaian"> %
                            </td>
                        </tr>
                        <tr>
                            <td>
                                5.
                            </td>
                            <td>Prosentase realisasi pencapaian target seharusnya </td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control"
                                style="display:inline;width: 60px" id="new_persen_target"> %
                            </td>
                        </tr>
                    </table>
                    </li>
                    <li>
                    Masalah penting yang dijumpai dalam audit :
                    <input type="text" class="form-control" id="new_masalah"> 
                            
                    </li>
                    <li>
                    Instruksi kepada ketua tim audit :
                    <input type="text" class="form-control" id="new_instruksi"> 
                            
                    </li>
                </ol>
                
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" 
                onclick="tambahSupervisi({{$o->id}},$('#new_supervisi_personil').val(), $('#new_supervisi_tanggal').val(),$('#new_jum_selesai').val(),$('#new_jum_sedang').val(),$('#new_jum_belum').val(),$('#new_persen_capaian').val(),$('#new_persen_target').val(),$('#new_masalah').val(),$('#new_instruksi').val() )">Simpan</button>
            </div>
        </div>
    </div>
</div> 

<br>
<h3>LAPORAN SUPERVISI PELAKSANAAN PENGAWASAN : </h3>

<table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
    <thead>
        <tr>
            <th rowspan="2" style="text-align:center">No</th>
            <th rowspan="2" style="text-align:center">Auditor</th>
            <th rowspan="2" style="text-align:center">Tanggal</th>
            <th colspan="5" style="text-align:center">Evaluasi</th>
            <th rowspan ="2" style="text-align:center">Masalah</th>
            <th rowspan="2" style="text-align:center">Instruksi</th>
            
            <th rowspan="2">
            <button type="button" class="btn btn-sm btn-warning"
                data-toggle="modal" data-target="#modal_tambah_supervisi">
                Tambah</button>
                </th>
        </tr>
        <tr>
            <th style="text-align:center">Jumlah<br>selesai</th>

            <th style="text-align:center">Jumlah<br>sedang dilaksanakan</th>

            <th style="text-align:center">Jumlah<br>belum dikerjakan</th>

            <th style="text-align:center">Persen Realisasi<br>Capaian</th>
            <th style="text-align:center">Persen Realisasi<br>Seharusnya</th>
 
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
                    {{$p->personil_nama}}
                </td>
                <td>
                    {{$p->tanggal}}
                </td>
                <td>
                    {{$p->jum_selesai}}
                </td>
                <td>
                    {{$p->jum_sedang}}
                </td>
                <td>
                    {{$p->jum_belum}}
                </td>

                <td>
                    {{$p->persen_capaian}}%
                </td>

                <td>
                    {{$p->persen_target}}%
                </td>

                <td>
                    {{$p->masalah}}
                </td>

                <td>
                    {{$p->instruksi}}
                </td>
                
                <td>
                     
                
                <a href='km4/{{$p->id}}' target="_blank">
                <button class='btn btn-info'>Print KM4</button>
                </a>
                </td>
            </tr>
        @endforeach
       
    </tbody>
</table>
<script>

</script>