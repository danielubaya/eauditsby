<div class="modal-body" >
<table class="table table-bordered table-hover table-striped w-100">
    <thead>
        <tr>
            <th width="20%" style="text-align:right">
                <label class="form-label" for="simpleinput">
                    Nomor Penetapan
                </label>
            </th>
            
            <th >
                <input type='text' disabled='true' 
                class="form-control" id='e_penetapan_no'
                value="{{$d->penetapan_no}}">
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
                class="form-control" id='e_penetapan_oleh'
                value="{{$d->penetapan_oleh}}">
            </th>       
            
             
        </tr>
        
        <tr>
            <th width="20%" style="text-align:right">
                <label class="form-label" for="simpleinput">
                    Pejabat Penetap
                </label>
            </th>
            
            <th >
                <input type='text' disabled='true' 
                class="form-control" id='e_penetapan_pejabat'
                value="{{$d->penetapan_pejabat}}">
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
                class="form-control" id='e_penetapan_luas'
                value="{{$d->penetapan_luas}}">
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
            disabled='t' value='{{$d->penetapan_awal}}'  
            id="e_penetapan_awal">
            <input class="form-control  col-md-6" type="date" 
            disabled='t' value='{{$d->penetapan_akhir}}'  
            id="e_penetapan_akhir">
            
            </div>
            </th>      
        </tr>
        <tr>
            <th width="20%" style="text-align:right; vertical-align:top">
                <label class="form-label" for="simpleinput">
                Dokumen Penetapan</label>
            
            </th>
            <th>
                <div id="div_penetapan">
                @foreach($files_penetapan as $f)
                    - <a href="../DOKUMEN_IJIN/{{$d->id}}/penetapan/{{$f}}" target="_blank">{{$f}}</a><br>
                @endforeach
                </div>
                <input type="file" id="f_penetapan"  name="f_penetapan"  disabled='t' class="form-control">
            </th>
        </tr>
    </thead>
</table>   
        
        <div class="form-group" style="float:right" id="div_tomboledit2">
            <button class="btn btn-warning" onclick="set_readonly_tab_2(false)">Edit</button>
        </div>
        <div class="form-group" style="float:right;display:none" id="div_tombolsimpan2">
            <button class="btn btn-success" onclick="simpan_tab_2();set_readonly_tab_2(true)">Simpan</button>
            <button class="btn btn-danger" onclick="set_readonly_tab_2(true)">Batal</button>
        </div>
        <br>
</div>