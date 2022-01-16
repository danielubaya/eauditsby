<div class="modal-body" >
<table class="table table-bordered table-hover table-striped w-100">
    <thead>
        <tr>
            <th width="20%" style="text-align:right">
                <label class="form-label" for="simpleinput">
                    Nomor Perijinan Produksi
                </label>
            </th>
            
            <th >
                <input type='text' disabled='true' 
                class="form-control" id='e_produksi_no'
                value="{{$d->produksi_no}}">
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
                class="form-control" id='e_produksi_oleh'
                value="{{$d->produksi_oleh}}">
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
                class="form-control" id='e_produksi_pejabat'
                value="{{$d->produksi_pejabat}}">
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
                class="form-control" id='e_produksi_luas'
                value="{{$d->produksi_luas}}">
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
            disabled='t' value='{{$d->produksi_awal}}'  
            id="e_produksi_awal">
            <input class="form-control  col-md-6" type="date" 
            disabled='t' value='{{$d->produksi_akhir}}'  
            id="e_produksi_akhir">
            
            </div>
            </th>      
        </tr>
        <tr>
            <th width="20%" style="text-align:right; vertical-align:top">
                <label class="form-label" for="simpleinput">
                Dokumen RKAB Operasi Produksi</label>
            
            </th>
            <th>
                <div id="div_rkabprod">
                @foreach($files_rkabprod as $f)
                    - <a href="../DOKUMEN_IJIN/{{$d->id}}/rkabprod/{{$f}}" target="_blank">{{$f}}</a><br>
                @endforeach
                </div>
                <input type="file" id="f_rkabprod"  name="f_rkabprod"  disabled='t' class="form-control">
            </th>
        </tr>
        <tr>
            <th width="20%" style="text-align:right; vertical-align:top">
                <label class="form-label" for="simpleinput">
                Dokumen Rencana Reklamasi</label>
            
            </th>
            <th>
                <div id="div_reklamasi">
                @foreach($files_reklamasi as $f)
                    - <a href="../DOKUMEN_IJIN/{{$d->id}}/reklamasi/{{$f}}" target="_blank">{{$f}}</a><br>
                @endforeach
                </div>
                <input type="file" id="f_reklamasi"  name="f_reklamasi"  disabled='t' class="form-control">
            </th>
        </tr>

        <tr>
            <th width="20%" style="text-align:right; vertical-align:top">
                <label class="form-label" for="simpleinput">
                Dokumen Rencana Pascatambang</label>
            
            </th>
            <th>
                <div id="div_pascatambang">
                @foreach($files_pascatambang as $f)
                    - <a href="../DOKUMEN_IJIN/{{$d->id}}/pascatambang/{{$f}}" target="_blank">{{$f}}</a><br>
                @endforeach
                </div>
                <input type="file" id="f_pascatambang"  name="f_pascatambang"  disabled='t' class="form-control">
            </th>
        </tr>

        <tr>
            <th width="20%" style="text-align:right; vertical-align:top">
                <label class="form-label" for="simpleinput">
                Dokumen Lingkungan</label>
            
            </th>
            <th>
                <div id="div_lingkungan">
                @foreach($files_lingkungan as $f)
                    - <a href="../DOKUMEN_IJIN/{{$d->id}}/lingkungan/{{$f}}" target="_blank">{{$f}}</a><br>
                @endforeach
                </div>
                <input type="file" id="f_lingkungan"  name="f_lingkungan"  disabled='t' class="form-control">
            </th>
        </tr>

    </thead>
</table>   
        
        <div class="form-group" style="float:right" id="div_tomboledit4">
            <button class="btn btn-warning" onclick="set_readonly_tab_4(false)">Edit</button>
        </div>
        <div class="form-group" style="float:right;display:none" id="div_tombolsimpan4">
            <button class="btn btn-success" onclick="simpan_tab_4();set_readonly_tab_4(true)">Simpan</button>
            <button class="btn btn-danger" onclick="set_readonly_tab_4(true)">Batal</button>
        </div>
        <br>
</div>