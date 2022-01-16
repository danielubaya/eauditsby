<?php

namespace App\Http\Controllers;


use App\Obrik;
use App\Personil;
use DB;
use File;
use Storage;

use Illuminate\Http\Request;

class ObrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
       // $data=Obrik::all();
       $data=Array();

        /*
        $rs=DB::Select("Select obriks.*,
        g1.nama as nama_grup_1,
        g2.nama as nama_grup_2
        from obriks inner join obrik_grups g1 on obriks.kode_grup_1=g1.kode 
        inner join obrik_grups g2  on obriks.kode_grup_2=g2.kode ");
        */

        $rs1=DB::Select("select distinct o.kode_grup_1, g.nama 
        from obriks o inner join obrik_grups g 
        on o.kode_grup_1=g.kode order by kode_grup_1    
        ");
        foreach($rs1 as $r)
        {
            $rs2=DB::Select("select distinct o.kode_grup_2,g.id, g.nama 
            from obriks o inner join obrik_grups g 
            on o.kode_grup_2=g.kode 
            where o.kode_grup_1='".$r->kode_grup_1  ."'
            order by g.id
            ");
            $data2=[];
            foreach($rs2 as $r2)
            {
               
                $rs3=DB::Select("select o.* 
                from obriks o
                where o.kode_grup_1='".$r->kode_grup_1  ."'
                and o.kode_grup_2='".$r2->kode_grup_2 ."'
                order by o.id
                ");
                $data3=[];
                foreach($rs3 as $r3)
                {
                    array_push($data3,$r3);
                }
                $r2->obrik=$data3;
                array_push($data2,$r2);
            }
            $r->grup2=$data2;
            array_push($data,$r);
        }
        return view('obrik.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function show(obrik $obrik)
    {
        $arr=DB::Select("Select obriks.*,
        g1.nama as nama_grup_1,
        g2.nama as nama_grup_2
        from obriks inner join obrik_grups g1 on obriks.kode_grup_1=g1.kode 
        inner join obrik_grups g2  on obriks.kode_grup_2=g2.kode 
        where obriks.id=".$obrik->id."
        ");
        $d=$arr[0];
        
       // dd($d);
        return view('obrik.show',compact('d'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function edit(perusahaan $perusahaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, perusahaan $perusahaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(perusahaan $perusahaan)
    {
        //
    }


    public function isi_tab_1(Request $request)
    {
        $id=$request['id'];
        $o=Obrik::find($id);
        $ps=DB::Select('Select * from personils order by nama');

        $ops=DB::Select("Select p.*,sebagai 
        from (personils p inner join obrik_personil op 
        on p.id=op.personil_id) 
        inner join obriks o on op.obrik_id=o.id
        where o.id=$id order by sebagai desc
        ");

        return view('obrik.isi_tab_1',compact('o','ps','ops'));

    }




    public function isi_tab_2(Request $request)
    {
        $id=$request['id'];
        $o=Obrik::find($id);
        $data=array();
        $rs1=DB::Select("select *  
        from tahap_grups order by kode 
        ");
        foreach($rs1 as $r)
        {
            $rs2=DB::Select("Select t.*,
            (select ha_ketua from obrik_tahap
             where obrik_id=$id and tahap_id=t.id) as ha_ketua,

            (select ha_anggota from obrik_tahap
            where obrik_id=$id and tahap_id=t.id) as ha_anggota
            from tahaps t where
            t.grup_kode='".$r->kode."' 
            ");
            $data2=array();
            foreach($rs2 as $r2)
            {
                array_push($data2,$r2);
            }
            $r->tahaps=$data2;
            array_push($data,$r);
        }
        return view('obrik.isi_tab_2',compact('o','data'));

    }

    public function isi_tab_3(Request $request)
    {
        $id=$request['id'];
        $o=Obrik::find($id);
        $ps=DB::Select("Select p.* from personils p 
        inner join obrik_personil op on p.id=op.personil_id
        where op.obrik_id=$id
        order by nama");

        $ops=DB::Select("Select op.* ,
        (select nama from personils
        where id=op.rencana_personil_1) as rencana_personil_1_nama,
        (select nama from personils
        where id=op.rencana_personil_2) as rencana_personil_2_nama,

        (select nama from personils
        where id=op.realisasi_personil_1) as realisasi_personil_1_nama,
        (select nama from personils
        where id=op.realisasi_personil_2) as realisasi_personil_2_nama

        from obrik_program op inner join 
        obriks o on op.obrik_id=o.id
        where o.id=$id order by op.id 
        ");

        return view('obrik.isi_tab_3',compact('o','ps','ops'));

    }



    public function isi_tab_4(Request $request)
    {
        $id=$request['id'];
        $o=Obrik::find($id);
        $ps=DB::Select("Select p.* from personils p 
        inner join obrik_personil op on p.id=op.personil_id
        where op.obrik_id=$id
        order by nama");

        $ops=DB::Select("Select os.* ,
        (select nama from personils
        where id=os.personil_id) as personil_nama
        from obrik_supervisi os inner join 
        obriks o on os.obrik_id=o.id
        where o.id=$id order by os.id 
        ");

        return view('obrik.isi_tab_4',compact('o','ps','ops'));

    }

    public function isi_tab_7(Request $request)
    {
        $id=$request['id'];
        $o=Obrik::find($id);
        $data=array();
        $rs1=DB::Select("select *  
        from tahap_grups order by kode 
        ");
        foreach($rs1 as $r)
        {
            $rs2=DB::Select("Select t.*,
            (select ha_ketua from obrik_tahap
             where obrik_id=$id and tahap_id=t.id) as ha_ketua,

            (select ha_anggota from obrik_tahap
            where obrik_id=$id and tahap_id=t.id) as ha_anggota
            from tahaps t where
            t.grup_kode='".$r->kode."' 
            ");
            $data2=array();
            foreach($rs2 as $r2)
            {
                array_push($data2,$r2);
            }
            $r->tahaps=$data2;
            array_push($data,$r);
        }
        return view('obrik.isi_tab_7',compact('o','data'));

    }

    


    public function tambahPersonil(Request $request)
    {
        try{
            DB::table('obrik_personil')->insert([
                ['obrik_id' => $request['obrik_id'],
                 'personil_id' => $request['personil_id'], 
                 'sebagai' => $request['sebagai'], 
                ],
            ]);
        
            return response()->json(array(
                'status'=>'success',           
                'msg'=>'Sukses menambah data personil.'  ),200);
            
        }
         catch(\Exception $e){
             return response()->json(array(
                'status'=>'error',           
                'msg'=>$e->getMessage()),200);          
         }
    }


    public function tambahProgram(Request $request)
    {
        try{
            DB::table('obrik_program')->insert([
                ['obrik_id' => $request['obrik_id'],
                 'nama_program' => $request['program'], 
                 'rencana_personil_1' => $request['personil1'], 
                 'rencana_personil_2' => $request['personil2'], 
                 'rencana_waktu' => $request['waktu'], 
                ],
            ]);
        
            return response()->json(array(
                'status'=>'success',           
                'msg'=>'Sukses menambah data program.'  ),200);
            
        }
         catch(\Exception $e){
             return response()->json(array(
                'status'=>'error',           
                'msg'=>$e->getMessage()),200);          
         }
    }

    public function siapRealisasiProgram(Request $request)
    {
        $obrik_id=$request['obrik_id'];
        $program_id=$request['program_id'];

        $ps=DB::Select("Select p.* from personils p 
        inner join obrik_personil op on p.id=op.personil_id
        where op.obrik_id=$obrik_id
        order by nama");

        $rs=DB::Select("Select op.* ,
        (select nama from personils
        where id=op.rencana_personil_1) as rencana_personil_1_nama,
        (select nama from personils
        where id=op.rencana_personil_2) as rencana_personil_2_nama,

        (select nama from personils
        where id=op.realisasi_personil_1) as realisasi_personil_1_nama,
        (select nama from personils
        where id=op.realisasi_personil_2) as realisasi_personil_2_nama

        from obrik_program op inner join 
        obriks o on op.obrik_id=o.id
        where op.id=$program_id 
        ");
        $ops=$rs[0];
        return view('obrik.siapRealisasiProgram',compact('ps','ops'));
    }

    public function simpanNoKartuPenugasan(Request $request)
    {
        try{
            $o = Obrik::find($request['obrik_id']);
            $o->no_kartu_penugasan = $request['no_kartu'];
            $o->save();
            return response()->json(array(
                'status'=>'success',           
                'msg'=>'Sukses simpan data kartu penugasan.'  ),200);
            
        }
         catch(\Exception $e){
             return response()->json(array(
                'status'=>'error',           
                'msg'=>$e->getMessage()),200);          
         }
    }

    public function simpanHAketua(Request $request)
    {
        try{
            DB::table('obrik_tahap')->updateOrInsert(
                ['obrik_id' => $request['obrik_id'],
                 'tahap_id' => $request['tahap_id']], 
                ['ha_ketua' => $request['nilai']]);
        
            return response()->json(array(
                'status'=>'success',           
                'msg'=>'Sukses simpan data HA ketua.'  ),200);
            
        }
         catch(\Exception $e){
             return response()->json(array(
                'status'=>'error',           
                'msg'=>$e->getMessage()),200);          
         }
    }

    public function simpanHAanggota(Request $request)
    {
        try{
            DB::table('obrik_tahap')->updateOrInsert(
                ['obrik_id' => $request['obrik_id'],
                 'tahap_id' => $request['tahap_id']], 
                ['ha_anggota' => $request['nilai']]);
        
            return response()->json(array(
                'status'=>'success',           
                'msg'=>'Sukses simpan data HA anggota.'  ),200);
            
        }
         catch(\Exception $e){
             return response()->json(array(
                'status'=>'error',           
                'msg'=>$e->getMessage()),200);          
         }
    }


    public function updateRealisasiProgram(Request $request)
    {
        try{
            DB::table('obrik_program')
            ->where('id', $request['id'])
            ->update(['realisasi_personil_1' =>  $request['personil1'],
                      'realisasi_personil_2' =>  $request['personil2'],
                      'realisasi_waktu' =>  $request['waktu'],
                       ]);
            return response()->json(array(
                'status'=>'success',           
                'msg'=>'Sukses simpan realisasi.'  ),200);
            
        }
         catch(\Exception $e){
             return response()->json(array(
                'status'=>'error',           
                'msg'=>$e->getMessage()),200);          
         }
    }


    public function tambahSupervisi(Request $request)
    {
        $arr=explode("-",$request['tanggal']);
        $tgl=$arr[2]."-".$arr[1]."-".$arr[0];
        try{
            DB::table('obrik_supervisi')->insert([
                ['obrik_id' => $request['obrik_id'],
                'personil_id'=> $request['personil_id'],
                'tanggal'=> $tgl,
                'jum_selesai'=> $request['jum_selesai'],
                'jum_sedang'=> $request['jum_sedang'],
                'jum_belum'=> $request['jum_belum'],
                'persen_capaian'=> $request['persen_capaian'],
                'persen_target'=> $request['persen_target'],
                'masalah'=> $request['masalah'],
                'instruksi'=> $request['instruksi']
                ],
            ]);
        
            return response()->json(array(
                'status'=>'success',           
                'msg'=>'Sukses menambah data supervisi  .'  ),200);
            
        }
         catch(\Exception $e){
             return response()->json(array(
                'status'=>'error',           
                'msg'=>$e->getMessage()),200);          
         }
    }

   

    public function km1($id)
    {
        //$d=Obrik::find($id);
        
        $arr=DB::Select("Select obriks.*,
        g1.nama as nama_grup_1,
        g2.nama as nama_grup_2
        from obriks inner join obrik_grups g1 on obriks.kode_grup_1=g1.kode 
        inner join obrik_grups g2  on obriks.kode_grup_2=g2.kode 
        where obriks.id=".$id."
        ");
        $o=$arr[0];
        
        $ops=DB::Select("Select p.*,sebagai 
        from (personils p inner join obrik_personil op 
        on p.id=op.personil_id) 
        inner join obriks o on op.obrik_id=o.id
        where o.id=$id order by sebagai desc
        ");

        return view('obrik.km1',compact('o','ops'));

    }

    public function km2($id)
    {
        //$d=Obrik::find($id);
        
        $arr=DB::Select("Select obriks.*,
        g1.nama as nama_grup_1,
        g2.nama as nama_grup_2
        from obriks inner join obrik_grups g1 on obriks.kode_grup_1=g1.kode 
        inner join obrik_grups g2  on obriks.kode_grup_2=g2.kode 
        where obriks.id=".$id."
        ");
        $o=$arr[0];
        
        $data=array();
        $rs1=DB::Select("select *  
        from tahap_grups order by kode 
        ");
        foreach($rs1 as $r)
        {
            $rs2=DB::Select("Select t.*,
            (select ha_ketua from obrik_tahap
             where obrik_id=$id and tahap_id=t.id) as ha_ketua,

            (select ha_anggota from obrik_tahap
            where obrik_id=$id and tahap_id=t.id) as ha_anggota
            from tahaps t where
            t.grup_kode='".$r->kode."' 
            ");
            $data2=array();
            foreach($rs2 as $r2)
            {
                array_push($data2,$r2);
            }
            $r->tahaps=$data2;
            array_push($data,$r);
        }
       
        return view('obrik.km2',compact('o','data'));

    }



    public function km3(Request $request)
    {
        $id=$request['id'];
        $arr=DB::Select("Select obriks.*,
        g1.nama as nama_grup_1,
        g2.nama as nama_grup_2
        from obriks inner join obrik_grups g1 on obriks.kode_grup_1=g1.kode 
        inner join obrik_grups g2 on obriks.kode_grup_2=g2.kode 
        where obriks.id=".$id."
        ");
        $o=$arr[0];

        $ops=DB::Select("Select op.* ,
        (select nama from personils
        where id=op.rencana_personil_1) as rencana_personil_1_nama,
        (select nama from personils
        where id=op.rencana_personil_2) as rencana_personil_2_nama,

        (select nama from personils
        where id=op.realisasi_personil_1) as realisasi_personil_1_nama,
        (select nama from personils
        where id=op.realisasi_personil_2) as realisasi_personil_2_nama

        from obrik_program op inner join 
        obriks o on op.obrik_id=o.id
        where o.id=$id order by op.id 
        ");

        return view('obrik.km3',compact('o','ops'));

    }
   


    public function km4(Request $request)
    {
        $id=$request['id'];

        $arr=DB::Select("Select os.* ,
        o.*,
        g1.nama as nama_grup_1,
        g2.nama as nama_grup_2,

        (select nama from personils
        where id=os.personil_id) as personil_nama
        from obrik_supervisi os inner join 
        obriks o on os.obrik_id=o.id
        inner join obrik_grups g1 on o.kode_grup_1=g1.kode 
        inner join obrik_grups g2  on o.kode_grup_2=g2.kode 
        where os.id=$id  
        ");
        $o=$arr[0];
        return view('obrik.km4',compact('o'));

    }



}
