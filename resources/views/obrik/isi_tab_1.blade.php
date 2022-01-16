
<div class="modal fade" id="modal_tambah_personil" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Tambah Personil
                    
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
            <form>
                <div class="form-group">
                    <label class="form-label" for="simpleinput">Personil</label>

                    <!--<input type="text" id="new_alamat" class="form-control">-->
                    <Select class="select2 form-control" id='new_personil'>
                        <option>- pilih personil -</option>
                        
                        @foreach($ps as $p)

                        <option value='{{$p->id}}'>{{$p->nama}} </option>
                        @endforeach
                    </Select>
                </div>

                <div class="form-group">
                    <Select class="select2 form-control" id='new_sebagai'>
                        <option value="1">Anggota</option>
                        <option value="2">Ketua Tim</option>
                        <option value="3">Pengendali Teknis</option>
                        <option value="4">Pembantu Penanggung Jawab</option>
                    </select>
                </div>
    
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="tambahPersonil({{$o->id}})">Simpan</button>
            </div>
        </div>
    </div>
</div> 

<div style="float:right">
<a href='km1/{{$o->id}}' target="_blank">
<button class='btn btn-info'>Print KM-1</button>
</a>
</div><br>
<h3>Personil yang ditugaskan : </h3>

<table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Sebagai</th>
            <th>
            <button type="button" class="btn btn-sm btn-warning"
                data-toggle="modal" data-target="#modal_tambah_personil">
                Tambah</button>
                </th>
        </tr>
    </thead>
    <tbody> 
        @php
            $arr=array('', 'Anggota','Ketua Tim','Pengendali Teknis','Pembantu Penanggung Jawab');  
        @endphp
        @foreach($ops as $p)
            <tr>
                <td>
                    {{$p->nama}}
                </td>
                <td>
                    {{$p->jabatan}}
                </td>
                <td>
                    {{$arr[$p->sebagai]}}
                </td>
                <td>
                <button class='btn btn-sm btn-danger'
                onclick="if(confirm('apakah anda yakin untuk menghapus personil ini?')) hapuspersonil({{$p->id}})">
                    Hapus    
                </button>
                </td>
            </tr>
        @endforeach
       
    </tbody>
</table>
<script>

</script>