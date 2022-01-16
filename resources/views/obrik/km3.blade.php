<html>
<head>
	
</head>

<body width="780px">


<h3>INSPEKTORAT KOTA SURABAYA</h3>

<table style="font-family: arial; width: 760px; " border="0" cellpadding="0" cellspacing="0"
       style="empty-cells:show;  ">
    <tr   style="font-size: 14px">
        <td colspan="14" align="center">

				<B style="text-align: center;font-size:16px">PROGRAM AUDIT / EVALUASI</B>				
                	
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
                Periode yang diaudit/ evaluasi
                </td>
                <td>
                    :
                </td>
                <td>
                Bulan Januari s.d  Desember 2020
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
            <th rowspan="2" style="text-align:center">No</th>
            <th rowspan="2" style="text-align:center">Uraian<br>Tujuan dan Prosedur<br> Audit</th>
            <th colspan="2" style="text-align:center">Rencana</th>
            <th colspan="2" style="text-align:center">Realisasi</th>
            </th>
            <th rowspan="2" style="text-align:center">Ref<br> KKA</th>
            <th rowspan="2" style="text-align:center">Ket</th>
           
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
                    <ul style="padding-inline-start:16px">
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
                    <ul style="padding-inline-start:16px">
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
                
            </tr>
        @endforeach
       
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