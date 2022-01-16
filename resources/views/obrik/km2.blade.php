<html>
<head>
	
</head>

<body width="780px">


<h3>INSPEKTORAT KOTA SURABAYA</h3>

<table style="font-family: arial; width: 760px; " border="0" cellpadding="0" cellspacing="0"
       style="empty-cells:show;  ">
    <tr   style="font-size: 14px">
        <td colspan="14" align="center">

				<B style="text-align: center;font-size:16px"><u>ANGGARAN WAKTU AUDIT OPERASIONAL</u></B><br>					
                	
				<?php echo  "(HA PRODUKTIF)" ?>
				<br><br>
			
        </td>
	
    </tr>
    <tr>
	<td colspan="14" style="text-align: left;">
        <table>
            <tr>
                <td>
                Nama obyek audit
                </td>
                <td>
                    :
                </td>
                <td>
                    {{$o->nama}}
                </td>
            </tr>
            <tr>
                <td>
                Kegiatan / program yang diaudit
                </td>
                <td>
                    :
                </td>
                <td>
                    {{$o->nama_grup_1}}
                </td>
            </tr>

            <tr>
                <td>
                Nomor Kartu Penugasan
                </td>
                <td>
                    :
                </td>
                <td>
                {{$o->no_kartu_penugasana}}
                </td>
            </tr>
        </table>
    </td>
    </tr>

    
           
    
    <tr>
	<td colspan="14" style="text-align: left;">
    <table border=1 cellspacing=0 cellpadding=3 id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
    <thead>
        <tr>
            <th colspan="2" >Audit Pendahuluan<br>
              <span id="tot_A">5 Hr</span>
            </th>
            <th width="25%">Evaluasi SPM<br>
            <span id="tot_B">4 Hr</span>
            </th>
            <th width="25%">Audit Lanjut<br>
            <span id="tot_C">16 Hr</span>
            </th>
            <th colspan="2" width="25%">Peyelesaian Audit<br>
            <span id="tot_D">5 Hr</span>
            </th>
            

        </tr>
        <tr>
            <th colspan="6">&nbsp;<br>
            </th>
            

        </tr>
        <tr>
            <th width="3s0px"   >No</th>
            <th colspan="2">Uraian</th>
            <th>Ketua Tim <bR>(HA)</th>
            <th>Anggota Tim <br>(HA-4 Orang)</th>
            <th>Jumlah<bR>(HA)</th>
            
        </tr>
    </thead>
    <tbody> 
       
        @php
            $gtot1=0;
            $gtot2=0;
        @endphp
        @foreach($data as $g)
            <tr>
                <td>
                    <b>{{$g->kode}}</b>
                </td>
                <td colspan="6">
                <b>{{$g->nama}}</b>
                </td>
                
            </tr>
            @php
              $tot1=0;
              $tot2=0;
            @endphp
            @foreach($g->tahaps as $t)
                <tr>
                    <td>{{$t->urut}}</td>
                    <td  colspan="2">{{$t->nama}}</td>

                    <td style="text-align:center;font-weight:bold">
                    {{$t->ha_ketua}}</td>

                    <td style="text-align:center;font-weight:bold">
                    {{$t->ha_anggota}}</td>
                        
                        
                    <td id='jum_{{$t->id}}' style="text-align:center;font-weight:bold">
                    {{$t->ha_ketua+$t->ha_anggota}}

                    </td>
                </tr>
                @php
                    $tot1+=$t->ha_ketua;
                    $tot2+=$t->ha_anggota;
                   
                @endphp
            @endforeach
            <tr bgcolor="#ccc">
                <td>
                    
                </td>
                <td colspan="2">
                    Sub Jumlah
                </td>
                <td style="text-align:center;font-weight:bold">
                    {{$tot1}}</td>

                    <td style="text-align:center;font-weight:bold">
                    {{$tot2}}</td>
                        
                        
                    <td id='jum_{{$t->id}}' style="text-align:center;font-weight:bold">
                    {{$tot1+$tot2}}

                    </td>
            </tr>
            <script>
                $('#tot_{{$g->kode}}').html('{{$tot1}}')
            </script>
            @php
                $gtot1+=$tot1;
                $gtot2+=$tot2;
            @endphp
        @endforeach
        <tr bgcolor="#ccc">
                <td>
                    
                </td>
                <td colspan="2">
                    Jumlah HA yang dianggarkan
                </td>
                <td style="text-align:center;font-weight:bold">
                    {{$gtot1}}</td>

                    <td style="text-align:center;font-weight:bold">
                    {{$gtot2}}</td>
                        
                        
                    <td id='jum_{{$t->id}}' style="text-align:center;font-weight:bold">
                    {{$gtot1+$gtot2}}

                    </td>
            </tr>
    </tbody>
</table>

        <br>
        <table style="font-family: arial; font-size: 12px; width: 760px">
    		
    		<tr style="font-size: 12px">
									
				<td style="padding-left:10px; width: 10%; text-align: center;">
				
				</td>
				
				<td style="padding-left:10px; width: 10%; text-align: center;">
				Surabaya, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>
                <strong>INSPEKTUR</strong>
				<br>
				

				</td>
			</tr>
    		<tr>
    			
    			
    		</tr>
    		<tr style="font-size: 12px">    			
    			
				<td style="padding-left:10px; width: 10%; text-align: left;">
				<br><br><br><br><br>
				
				</td>				
				
    			<td style="padding-left:10px; width: 10%; text-align: center;">
    		 	
    		 	<br>
                 <br>
                 <br>
                 <br>
    		 	<strong><u>Dr. IKHSAN, S.Psi, MM</u></strong> <br>
    		 	Pembina Utama Muda/IV/C<br>
    		 	NIP. 19690809 199501 1 002<br>    		 	<!---
    		 	(..........................................)
    		 	-->
    			
    			</td>
    			
    		</tr>
    </table>
</td>
</tr>
</table>
</body>
</html>