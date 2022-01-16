<html>
<head>
	
</head>

<body width="780px">


<h3>INSPEKTORAT KOTA SURABAYA</h3>

<table style="font-family: arial; width: 760px; " border="0" cellpadding="0" cellspacing="0"
       style="empty-cells:show;  ">
    <tr   style="font-size: 14px">
        <td colspan="14" align="center">

				<B style="text-align: center;font-size:16px">LAPORAN SUPERVISI PELAKSANAAN PENGAWASAN</B>				
                	
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
                Tanggal kunjungan reviu
                </td>
                <td>
                    :
                </td>
                <td>
                {{$o->tanggal}}
                </td>
            </tr>
            <tr>
                <td>
                Nama pengawas audit
                </td>
                <td>
                    :
                </td>
                <td>
                {{$o->personil_nama}}
                </td>
            </tr>
            <tr>
                <td>
                Jabatan atasan langsung pengawas audit
                </td>
                <td>
                    :
                </td>
                <td>
                Sekretaris Inspektorat Kota Surabaya
                </td>
            </tr>
        </table>
    </td>
    </tr>
    <tr>
        <td colspan="14">
        <b>KEMAJUAN PENGAWASAN</b>
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

                                {{$o->jum_selesai}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2.
                            </td>
                            <td>Nomor Program audit sedang dilaksanakan </td>
                            <td>:</td>
                            <td>

                            {{$o->jum_sedang}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                3.
                            </td>
                            <td>Jumlah program audit yang belum dikerjakan </td>
                            <td>:</td>
                            <td>
                            {{$o->jum_belum}}
                            </td>
                        </tr>   
                        <tr>
                            <td>
                                4.
                            </td>
                            <td>Prosentase realisasi pencapaian target </td>
                            <td>:</td>
                            <td>
                            {{$o->persen_capaian}} %
                            </td>
                        </tr>
                        <tr>
                            <td>
                                5.
                            </td>
                            <td>Prosentase realisasi pencapaian target seharusnya </td>
                            <td>:</td>
                            <td>
                                {{$o->persen_target}}%
                            </td>
                        </tr>
                    </table>
                    </li>
                    <li>
                    Masalah penting yang dijumpai dalam audit :
                    <br>
                    {{$o->masalah}}
                            
                    </li>
                    <li>
                    Instruksi kepada ketua tim audit :
                    <br>
                    {{$o->instruksi}} 
                            
                    </li>
                </ol>
                
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