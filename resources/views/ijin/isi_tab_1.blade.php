<div class="modal-body" >
<table class="table table-bordered table-hover table-striped w-100">
    <thead>
        <tr>
            <th width="20%" style="text-align:right"><label class="form-label" for="simpleinput">Nama Perusahaan</label>
            </th>
            
            <th id="th-edit-perusahaan">
            <Select disabled='true' class="select2 form-control" id='e_perusahaan'>
            <option>- pilih perusahaan -</option>
            
            @foreach($perusahaan as $p)

            <?php 
            $s_select="";
            if($p->id==$d->perusahaan_id){
                $s_select=" selected='SELECTED' ";
            }   
            ?>
            <option value='{{$p->id}}'{{$s_select}} >{{$p->nama}}</option>

            @endforeach
        </Select>
            <input type="hidden" id="e_id" class="form-control"  value="{{$d->id}}">
            </th>        
        </tr>
        <tr>
            <th width="20%" style="text-align:right">
            <label class="form-label" for="simpleinput">
                Jenis Perijinan
            </label>
            </th>
            
            <th >
            <select class="form-control" disabled='t' id="e_jenisijin">
                <option value="{{$d->jenis}}">{{$d->jenis}}</option>
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
            </th>
        </th>
        <tr>
            <th width="20%" style="text-align:right">
            <label class="form-label" for="simpleinput">
                Status Perijinan
            </label>
            </th>
            <th>
            <select class="form-control" disabled="t" id="e_statusijin">
                <option value="{{$d->status}}">{{$d->status}}</option>
                <option value='Baru'>Baru</option>
                <option value='Penyesuaian'>Penyesuaian</option>
                <option value='Perpanjangan Pertama'>Perpanjangan Pertama
        </option>
                <option value='Perpanjangan Kedua'>Perpanjangan Kedua</option>
                <option value='Penciutan'>Penciutan</option>
                <option value='Eksisting'>Eksisting</option>
            </select>
            </th>
        </th>
        <tr>
            <th width="20%" style="text-align:right">
            <label class="form-label" for="simpleinput">
                Kabupaten
            </label>
            </th>
            <th>
            <select disabled='t' class="form-control select2" id="e_kabupaten"
            onchange="kode2=$(this).val().split('|')[0];refresh_wiup();refresh_desa()">
    
                @foreach($kab as $k)
                <?php 
                $kabSelect="";
                if($d->kabupaten==$k->nama) $kabSelect=" selected='SELECTED' ";
                 ?>
                <option value='{{$k->kode}}|{{$k->nama}}' {{$kabSelect}}>{{$k->nama}}</option>
                @endforeach
            </select>
            </th>
        </tr>
        <tr>
            <th width="20%" style="text-align:right">
            <label class="form-label" for="simpleinput">
                Desa, Kecamatan
            </label>
            </th>
            <th>
                <select  id="e_desaijin" disabled='t' class="form-control select2">
                    <option value="{{$d->desa}}|{{$d->kecamatan}}">{{$d->desa}}, {{$d->kecamatan}}
                </select>
            </th>
        </tr>
        <tr>
            <th width="20%" style="text-align:right">
            <label class="form-label" for="simpleinput">
                Komoditas
            </label>
            </th>
            <th>
            <Select class="select2 form-control" disabled='t' id='e_komoditas' onchange="kode3=$(this).val().split('|')[0];refresh_wiup()">
        
            <option>- pilih komoditas -</option>
            
            @foreach($minj as $j)

            <optgroup label="{{$j->nama_jenis}}">
            @foreach($j->mins as $m)
            <?php 
                $komSelect="";
                if( substr($d->wiup,6,3)==$m->kode) $komSelect=" selected='SELECTED' ";
                 ?>
            <option {{$komSelect}} value='{{$m->kode}}|{{$j->nama_jenis}}|{{$m->nama_mineral}}'>{{$m->nama_mineral}}</option>
            @endforeach
            </optgroup>
            @endforeach
        </Select>
            </th>
        </tr>
        <tr>
            <th width="20%" style="text-align:right">
            <label class="form-label" for="simpleinput">
                Tahun - Nomor
            </label>
            </th>
            <th>
            <Div class="row" style="padding-left:12px; padding-right:12px">
                <input disabled='t' value="<?php echo substr($d->wiup,9,4) ?>" type="text" id="e_tahunijin"  class="form-control col-sm-6" onkeyup="kode4=$(this).val();refresh_wiup()">
                <input  disabled='t'  value="<?php echo substr($d->wiup,13) ?>" class="form-control col-sm-6" type="text"    onkeyup="kode5=$(this).val();refresh_wiup()" id="e_nomorijin">   </Div>
            </th>
        </tr>

        <tr>
            <th width="20%" style="text-align:right">
            <label class="form-label" for="simpleinput">
                WIUP
            </label>
            </th>
            <th>
            <input type="text" readonly='t' disabled='t' 
            id="e_wiupijin" class="form-control"
            value="{{$d->wiup}}">
            </th>
        </tr>
    </thead>
</table>   
        
        <div class="form-group" style="float:right" id="div_tomboledit">
            <button class="btn btn-warning" onclick="set_readonly_tab_1(false)">Edit</button>
        </div>
        <div class="form-group" style="float:right;display:none" id="div_tombolsimpan">
            <button class="btn btn-success" onclick="simpan_tab_1();set_readonly_tab_1(true)">Simpan</button>
            <button class="btn btn-danger" onclick="set_readonly_tab_1(true)">Batal</button>
        </div>
        <br>
</div>