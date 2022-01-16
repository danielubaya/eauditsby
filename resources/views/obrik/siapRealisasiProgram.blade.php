<form>
    <div class="form-group">
        <label class="form-label" for="simpleinput">Program Kerja</label>

        <!--<input type="text" id="new_alamat" class="form-control">-->
       <br>
        {{$ops->nama_program}}
    </div>
    <div class="form-group">
        <label class="form-label" for="simpleinput">Rencana Personil 1</label>

        <!--<input type="text" id="new_alamat" class="form-control">-->
       <br>
        {{$ops->rencana_personil_1_nama}}
    </div>
    <div class="form-group">
        <label class="form-label" for="simpleinput">Rencana Personil 2</label>

        <!--<input type="text" id="new_alamat" class="form-control">-->
       <br>
        {{$ops->rencana_personil_2_nama}}
    </div>
    <div class="form-group">
        <label class="form-label" for="simpleinput">Rencana Waktu</label>

        <!--<input type="text" id="new_alamat" class="form-control">-->
       <br>
        {{$ops->rencana_waktu}} hari
        <input type="hidden" value="{{$ops->id}}" id="update_id"/>
    </div>
    <div class="form-group">
        <label class="form-label" for="simpleinput">Realisasi Personil 1</label>
        <!--<input type="text" id="new_alamat" class="form-control">-->
        <Select class="select2 form-control" id='real_personil1'>
            <option>- pilih personil -</option>
            @foreach($ps as $p)

            <option value='{{$p->id}}'>{{$p->nama}} </option>
            @endforeach
        </Select>
    </div>
    <div class="form-group">
        <label class="form-label" for="simpleinput">Realisasi Personil 2</label>

        <!--<input type="text" id="new_alamat" class="form-control">-->
        <Select class="select2 form-control" id='real_personil2'>
            <option value="0">- Tanpa personil 2 -</option>
            @foreach($ps as $p)

            <option value='{{$p->id}}'>{{$p->nama}} </option>
            @endforeach
        </Select>
    </div>

    <div class="form-group">
        <label class="form-label" for="simpleinput">Realisasi Waktu</label>

        <Select class="select2 form-control" id='real_waktu'>
            <option>- Pilih waktu -</option>
            @for($i=1;$i<=50;$i++)
            <option value="{{$i}}">{{$i}} hari</option>
            @endfor
        </select>
    </div>

</form>
            