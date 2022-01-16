<?php

namespace App\Http\Controllers;


use App\Ijin    ;
use App\Perusahaan ;
use Illuminate\Http\Request;
use DB;
use File;

class IjinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Ijin::all();
        $perusahaan=Perusahaan::all();
        $kab= DB::table('master_kab')
        ->select('kode','nama')
        ->orderBy('nama')
        ->get();
        $minj=array();
        $min1= DB::table('master_mineral')
        ->select('kode_jenis','nama_jenis')
        ->distinct()->get();
        foreach($min1 as $m)
        {
            $min2= DB::table('master_mineral')
                ->select('kode','nama_mineral')
                ->where('kode_jenis',$m->kode_jenis)
                ->get();
            $mins=array();
            foreach($min2 as $m2)
            {
                array_push($mins,$m2);
            }
            $m->mins=$mins;
            array_push($minj,$m);
        }
        return view('ijin.index',compact('data','perusahaan','kab','minj'));

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ijin $ijin)
    {
        $d=$ijin;
        return view('ijin.show',compact('d'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function petasebaran(Request $request)
    {
        $data=Ijin::all();
        return view('ijin.petasebaran',compact('data'));

    }

    public function daftardesa(Request $request)
    {   
        $kab= DB::table('master_kab')
                    ->select('nama')
                    ->where('kode',$request['kode'])
                    ->first();
        //return $kab->nama;
        $kabnama=substr($kab->nama,5);
        $md=array();
        $md1= DB::table('master_desa')
                    ->select('kecamatan')
                    ->where('kabupaten','like',$kabnama)
                    ->distinct()->get();
        foreach($md1 as $m)
        {
            $md2= DB::table('master_desa')
            ->select('desa')
            ->where('kecamatan',$m->kecamatan)
            ->get();
            $dk=array();
            foreach($md2 as $m2)
            {
                array_push($dk,$m2);
            }
            $m->desa=$dk;
            array_push($md,$m);
        }   
        
        return json_encode($md);
        
    }

    public function tambahijin(Request $request)
    {
        try{
       
        $p=new Ijin;
        
        $p->perusahaan_id = $request['perusahaan_id'];
        $p->jenis = $request['jenis'];
        $p->status = $request['status'];
        $p->wiup = $request['wiup'];
        $p->komoditas = $request['komoditas'];

        $p->jenis_komoditas = $request['jenis_komoditas'];
        $p->desa = $request['desa'];
        $p->wkt='';
        $p->kecamatan = $request['kecamatan'];
        $p->kabupaten = $request['kabupaten'];
        $p->propinsi = $request['propinsi'];
        
        $p->save();

        }
         catch(\Exception $e){
             return response()->json(array(
                'status'=>'error        ',           
                'msg'=>$e->getMessage()),200);
            
         }
        
       $id=$p->id;
       if ($id)
        {
        return response()->json(array(
            'id'=>$id,
            'status'=>'success',           
            'msg'=>'Sukses menambah data perizinan.'),200);
        }
        else
        {
            return response()->json(array(
                'status'=>'fail',
                'msg'=>'Gagal menambah data perizinan'
            ),200);
        }
        
    }


    public function updateijin(Request $request)
    {
        try{
         $id=$request['id'];
        $p=Ijin::find($id);
        
        $p->perusahaan_id = $request['perusahaan_id'];
        $p->jenis = $request['jenis'];
        $p->status = $request['status'];
        $p->wiup = $request['wiup'];
        $p->komoditas = $request['komoditas'];

        $p->jenis_komoditas = $request['jenis_komoditas'];
        $p->desa = $request['desa'];
        $p->kecamatan = $request['kecamatan'];
        $p->kabupaten = $request['kabupaten'];
        $p->propinsi = $request['propinsi'];
        
        if ($p->save())
        {
        return response()->json(array(
            'id'=>$id,
            'status'=>'success',           
            'msg'=>'Sukses mengupdate  data perizinan.'),200);
        }
        else
        {
            return response()->json(array(
                'status'=>'fail',
                'msg'=>'Gagal mengupdate data perizinan'
            ),200);
        }
       
        }
         catch(\Exception $e){
             return response()->json(array(
                'status'=>'error        ',           
                'msg'=>$e->getMessage()),200);
            
         }
        
        
    }



   
    public function updateijinpenetapan(Request $request)
    {
        try{
         $id=$request['id'];
        $p=Ijin::find($id);
        
        $p->penetapan_no = $request['penetapan_no'];
        $p->penetapan_oleh = $request['penetapan_oleh'];
        $p->penetapan_pejabat = $request['penetapan_pejabat'];
        $p->penetapan_luas = $request['penetapan_luas'];
        $p->penetapan_awal = $request['penetapan_awal'];
        $p->penetapan_akhir = $request['penetapan_akhir'];
        
        
        if ($p->save())
        {
        return response()->json(array(
            'id'=>$id,
            'status'=>'success',           
            'msg'=>'Sukses mengupdate  data penetapan.'),200);
        }
        else
        {
            return response()->json(array(
                'status'=>'fail',
                'msg'=>'Gagal mengupdate data penetapan'
            ),200);
        }
       
        }
         catch(\Exception $e){
             return response()->json(array(
                'status'=>'error        ',           
                'msg'=>$e->getMessage()),200);
            
         }
        
        
    }



    public function updateijinexplorasi(Request $request)
    {
        try{
         $id=$request['id'];
        $p=Ijin::find($id);
        
        $p->explorasi_no = $request['explorasi_no'];
        $p->explorasi_oleh = $request['explorasi_oleh'];
        $p->explorasi_pejabat = $request['explorasi_pejabat'];
        $p->explorasi_luas = $request['explorasi_luas'];
        $p->explorasi_awal = $request['explorasi_awal'];
        $p->explorasi_akhir = $request['explorasi_akhir'];
        
        
        if ($p->save())
        {
        return response()->json(array(
            'id'=>$id,
            'status'=>'success',           
            'msg'=>'Sukses mengupdate  data explorasi.'),200);
        }
        else
        {
            return response()->json(array(
                'status'=>'fail',
                'msg'=>'Gagal mengupdate data explorasi'
            ),200);
        }
       
        }
         catch(\Exception $e){
             return response()->json(array(
                'status'=>'error        ',           
                'msg'=>$e->getMessage()),200);
            
         }
        
        
    }




    public function updateijinproduksi(Request $request)
    {
        try{
         $id=$request['id'];
        $p=Ijin::find($id);
        
        $p->produksi_no = $request['produksi_no'];
        $p->produksi_oleh = $request['produksi_oleh'];
        $p->produksi_pejabat = $request['produksi_pejabat'];
        $p->produksi_luas = $request['produksi_luas'];
        $p->produksi_awal = $request['produksi_awal'];
        $p->produksi_akhir = $request['produksi_akhir'];
        
        
        if ($p->save())
        {
        return response()->json(array(
            'id'=>$id,
            'status'=>'success',           
            'msg'=>'Sukses mengupdate data produksi.'),200);
        }
        else
        {
            return response()->json(array(
                'status'=>'fail',
                'msg'=>'Gagal mengupdate data produksi'
            ),200);
        }
       
        }
         catch(\Exception $e){
             return response()->json(array(
                'status'=>'error        ',           
                'msg'=>$e->getMessage()),200);
            
         }
        
        
    }




    public function isi_tab_1(Request $request)
    {
        $id=$request['id'];
        $d=Ijin::find($id);

        $perusahaan=Perusahaan::all();
        $kab= DB::table('master_kab')
        ->select('kode','nama')
        ->orderBy('nama')
        ->get();
        $minj=array();
        $min1= DB::table('master_mineral')
        ->select('kode_jenis','nama_jenis')
        ->distinct()->get();
        foreach($min1 as $m)
        {
            $min2= DB::table('master_mineral')
                ->select('kode','nama_mineral')
                ->where('kode_jenis',$m->kode_jenis)
                ->get();
            $mins=array();
            foreach($min2 as $m2)
            {
                array_push($mins,$m2);
            }
            $m->mins=$mins;
            array_push($minj,$m);
        }
        return view('ijin.isi_tab_1',compact('d','perusahaan','kab','minj'));

        }

    public function isi_tab_2(Request $request)
    {
        $id=$request['id'];
        $d=Ijin::find($id);

        $dir_penetapan=public_path('DOKUMEN_IJIN')."/".$id."/penetapan";
        $files_penetapan = array();
        if(file_exists($dir_penetapan)){
        if ($handle = opendir($dir_penetapan)) {

            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    array_push($files_penetapan,$entry);
                }
            }
            closedir($handle);
        }
        }
        

        return view('ijin.isi_tab_2',compact('d','files_penetapan'));

    }

    
    public function isi_tab_3(Request $request)
    {
        $id=$request['id'];
        $d=Ijin::find($id);

        $dir_rkabexp=public_path('DOKUMEN_IJIN')."/".$id."/rkabexp";
        $files_rkabexp = array();
        if(file_exists($dir_rkabexp)){
        if ($handle = opendir($dir_rkabexp)) {

            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    array_push($files_rkabexp,$entry);
                }
            }
            closedir($handle);
        }
        }

        $dir_laporanexp=public_path('DOKUMEN_IJIN')."/".$id."/laporanexp";
        $files_laporanexp = array();
        if(file_exists($dir_laporanexp)){
        if ($handle = opendir($dir_laporanexp)) {

            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    array_push($files_laporanexp,$entry);
                }
            }
            closedir($handle);
        }
        }
        

        return view('ijin.isi_tab_3',compact('d','files_rkabexp','files_laporanexp'));

    }



    public function isi_tab_4(Request $request)
    {
        $id=$request['id'];
        $d=Ijin::find($id);

        $dir_rkabprod=public_path('DOKUMEN_IJIN')."/".$id."/rkabprod";
        $files_rkabprod = array();
        if(file_exists($dir_rkabprod)){
        if ($handle = opendir($dir_rkabprod)) {

            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    array_push($files_rkabprod,$entry);
                }
            }
            closedir($handle);
        }
        }

        $dir_reklamasi=public_path('DOKUMEN_IJIN')."/".$id."/reklamasi";
        $files_reklamasi = array();
        if(file_exists($dir_reklamasi)){
        if ($handle = opendir($dir_reklamasi)) {

            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    array_push($files_reklamasi,$entry);
                }
            }
            closedir($handle);
        }
        }
        

        $dir_pascatambang=public_path('DOKUMEN_IJIN')."/".$id."/pascatambang";
        $files_pascatambang = array();
        if(file_exists($dir_pascatambang)){
        if ($handle = opendir($dir_pascatambang)) {

            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    array_push($files_pascatambang,$entry);
                }
            }
            closedir($handle);
        }
        }

        $dir_lingkungan=public_path('DOKUMEN_IJIN')."/".$id."/lingkungan";
        $files_lingkungan = array();
        if(file_exists($dir_lingkungan)){
        if ($handle = opendir($dir_lingkungan)) {

            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    array_push($files_lingkungan,$entry);
                }
            }
            closedir($handle);
        }
        }
        
        
        return view('ijin.isi_tab_4',compact('d','files_rkabprod','files_reklamasi','files_pascatambang','files_lingkungan'));

    }




    public function ajaxupload(Request $request){
        //dd('disini');
        $data = $request->file('file');
        $filename = $data->getClientOriginalName();
        $path =public_path('DOKUMEN_IJIN/');
        $path2=$path . "/".$request['id'];
        @mkdir($path2);
        $path3=$path2 . "/" . $request['folder'];
        @mkdir($path3);

       $newfile = $path3 . "/". $filename; // get previous image from folder

       if (File::exists($newfile)) { // unlink or remove previous image from folder
           @unlink($newfile);

       }else{
//                dd('File is not exists.');
           $pp='nofileexist';

       }

       $upload_success = $data->move($path3, $filename);

       return $filename." terupload";

    }
}

