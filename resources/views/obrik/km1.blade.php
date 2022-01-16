<html>
<head>
	
</head>

<body width="780px">



<table style="min-width: 760px; max-width: 900px" border="0" cellpadding="0" cellspacing="0"
       style="empty-cells:show; ">
	<tbody>
	<tr style="width: 20%">
		<td>
		<span style="display: block; float:right; margin-right: 10px; ">	
		<img src="{{asset('img/logosby.jpg')}}" width="90px">			
		</span>	
		</td>
		<td align="center">
			<span >
				<div style="font-family: arial; font-size: 24px;align-content:middle; ">
					PEMERINTAH KOTA SURABAYA <br>
                </div> 
				<div style="font-family: arial; font-size: 40px;">
					<strong >INSPEKTORAT</strong><br>
                </div>
				<div style="font-family: arial; font-size: 18px;">
					
		
                Jl. Sedap Malem 5 - 7 Surabaya 60275<br>
                </div>
                <div style="font-family: arial; font-size: 12px;">
				  Telp 5350223, 5343051 s/d 57 Pswt 336 s/d 339 & 5312144 Pswt 555 s/d 557 Fax 5319098
                </div>
            </span>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<hr>
		</td>
	</tr>

	</tbody>
</table>

<table style="font-family: arial; width: 760px; " border="0" cellpadding="0" cellspacing="0"
       style="empty-cells:show;  ">
    <tr   style="font-size: 14px">
        <td colspan="14" align="center">

				<B style="text-align: center;font-size:21px"><u>SURAT PERINTAH TUGAS</u></B><br>					
                	
				<?php echo  "Nomor : 700/…………-200/436.6/2021" ?>
				<br><br>
			
        </td>
	
    </tr>
    <tr>
	<td colspan="14" style="text-align: left;">
    	<table cellpadding="0px" style="font-size: 12px; ">
    		<tr style="font-size: 12px;">
				
				<td style="padding-left:50px; width: 30px; text-align: left;">
				<table style="width:700px;font-size: 12px;font-family: arial; ">
					<tr >
						<td style="width: 100px; vertical-align:top; padding-bottom: 3px;" >
						<strong>Dasar:</strong> 
						</td>
						<td style="width: 5px;vertical-align:top; padding-bottom: 3px;" > a.</td>
						<td style="width: 500px; padding-bottom: 3px;">
                        Peraturan Walikota Surabaya Nomor 46 tahun 2016 tentang :    Kedudukan Susunan Organisasi Uraian Tugas dan Fungsi serta  Tata Kerja  Inspektorat Kota Surabaya.
						</td> 
						
					</tr>
					<tr style="margin-top: 9px">
						<td style="width: 45px;margin-top: 3px">
    
						</td>
						<td style="width: 5px">b.</td>
						<td style="width: 200px">
                        Program Kerja Pengawasan Tahun 2021 Nomor : 700/07/436.6/2021, tanggal 4 Januari  2021. <br>
						</td> 
						
					</tr>
				</table>
				</td>
				

			</tr>

            <tr style="font-size: 12px;">
                <td style="text-align:center">
                
                <div style="font-size: 20px;margin-top:20px">
            
                    MENUGASKAN:
                </div>
                </td>
            </tr>
            <tr style="font-size: 12px;">
				
				<td style="padding-left:50px; width: 30px; text-align: left;">
				<table style="width:700px;font-size: 12px;font-family: arial; ">
                    @php
                      $i=0;
                      $arr=array('', 'Anggota','Ketua Tim','Pengendali Teknis','Pembantu Penanggung Jawab');  
       
                    @endphp
                    @foreach($ops as $p)
                    @php
                      $i++;
                    @endphp
					<tr >
						<td style="width: 100px; vertical-align:top; padding-bottom: 3px;" >
						@if($i==1)
                        <strong>Kepada:</strong> 
                        @endif
						</td>
						<td style="width: 5px;vertical-align:top; padding-top: 4px;" > {{$i}}.</td>
						<td style="width: 400px; padding-bottom: 3px;">
                        <table style="font-size: 12px;font-family: arial; ">
                            <tr>
                                <td style="width:100px">
                                Nama 
                                </td>

                                <td>:</td>
                                <td>
                                {{$p->nama}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                Jabatan
                                </td>
                                <td>:</td>
                                <td>
                                {{$p->jabatan}}
                                </td>
                            </tr>
                        </table>
                        
						</td> 
						<td >

                    {{$arr[$p->sebagai]}}
                        </td>
					</tr>
					@endforeach
				</table>
				</td>
				
			</tr>



            <tr style="font-size: 12px;">
				
				<td style="padding-left:50px; width: 30px; text-align: left;">
				<table style="width:700px;font-size: 12px;font-family: arial; ">
					<tr >
						<td style="width: 100px; vertical-align:top; padding-bottom: 3px;" >
						<strong>Untuk:</strong> 
						</td>
						<td style="width: 550px; padding-bottom: 3px;">
                        Melaksanakan 
                        {{ $o->nama_grup_1 }} <br>pada {{$o->nama}}
						</td> 
						
					</tr>
					
				</table>
				</td>
				

			</tr>

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