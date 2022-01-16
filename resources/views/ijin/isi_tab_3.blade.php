<div class="modal-body" >
<table class="table table-bordered table-hover table-striped w-100">
    <thead>
        <tr>
            <th width="20%" style="text-align:right">
                <label class="form-label" for="simpleinput">
                    Nomor Perijinan Explorasi
                </label>
            </th>
            
            <th >
                <input type='text' disabled='true' 
                class="form-control" id='e_explorasi_no'
                value="{{$d->explorasi_no}}">
            </th>        
        </tr>

        <tr>
            <th width="20%" style="text-align:right">
                <label class="form-label" for="simpleinput">
                    Ditetapkan oleh
                </label>
            </th>
            
            <th >
                <input type='text' disabled='true' 
                class="form-control" id='e_explorasi_oleh'
                value="{{$d->explorasi_oleh}}">
            </th>       
            
             
        </tr>
        
        <tr>
            <th width="20%" style="text-align:right">
                <label class="form-label" for="simpleinput">
                    Pejabat Pemberi Izin
                </label>
            </th>
            
            <th >
                <input type='text' disabled='true' 
                class="form-control" id='e_explorasi_pejabat'
                value="{{$d->explorasi_pejabat}}">
            </th>       
            
             
        </tr>


        <tr>
            <th width="20%" style="text-align:right">
                <label class="form-label" for="simpleinput">
                    Luas
                </label>
            </th>
            <th >
                <input type='text' disabled='true' 
                class="form-control" id='e_explorasi_luas'
                value="{{$d->explorasi_luas}}">
            </th>      
        </tr>

        <tr>
            <th width="20%" style="text-align:right">
                <label class="form-label" for="simpleinput">
                    Tgl Berlaku (awal s/d akhir)
                </label>
            </th>
            <th >
            <Div class="row" style="padding-left:12px; padding-right:12px">
           
            <input class="form-control col-md-6" type="date" 
            disabled='t' value='{{$d->explorasi_awal}}'  
            id="e_explorasi_awal">
            <input class="form-control  col-md-6" type="date" 
            disabled='t' value='{{$d->explorasi_akhir}}'  
            id="e_explorasi_akhir">
            
            </div>
            </th>      
        </tr>
        <tr>
            <th width="20%" style="text-align:right; vertical-align:top">
                <label class="form-label" for="simpleinput">
                Dokumen RKAB Eksplorasi</label>
            
            </th>
            <th>
                <div id="div_rkabexp">
                @foreach($files_rkabexp as $f)
                    - <a href="../DOKUMEN_IJIN/{{$d->id}}/rkabexp/{{$f}}" target="_blank">{{$f}}</a><br>
                @endforeach
                </div>
                <input type="file" id="f_rkabexp"  name="f_rkabexp"  disabled='t' class="form-control">
            </th>
        </tr>
        <tr>
            <th width="20%" style="text-align:right; vertical-align:top">
                <label class="form-label" for="simpleinput">
                Dokumen Laporan Eksplorasi</label>
            
            </th>
            <th>
                <div id="div_laporanexp">
                @foreach($files_laporanexp as $f)
                    - <a href="../DOKUMEN_IJIN/{{$d->id}}/laporanexp/{{$f}}" target="_blank">{{$f}}</a><br>
                @endforeach
                </div>
                <input type="file" id="f_laporanexp"  name="f_laporanexp"  disabled='t' class="form-control">
            </th>
        </tr>
    </thead>
</table>   
        
        <div class="form-group" style="float:right" id="div_tomboledit3">
            <button class="btn btn-warning" onclick="set_readonly_tab_3(false)">Edit</button>
        </div>
        <div class="form-group" style="float:right;display:none" id="div_tombolsimpan3">
            <button class="btn btn-success" onclick="simpan_tab_3();set_readonly_tab_3(true)">Simpan</button>
            <button class="btn btn-danger" onclick="set_readonly_tab_3(true)">Batal</button>
        </div>
        <br>
</div>