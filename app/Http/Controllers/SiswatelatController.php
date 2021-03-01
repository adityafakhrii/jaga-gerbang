<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SiswatelatExport;
use App\Exports\DatasiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;
use Hash;

class SiswatelatController extends Controller
{
    // SELECT * FROM `data_siswa` where created_at between '2019/09/25' and '2019/09/26'

  // SELECT data_siswa.nama,COUNT(data_siswa.nama) FROM `data_siswa` JOIN siswa_telat ON data_siswa.id=siswa_telat.siswa_id GROUP by data_siswa.id
    
    public function index(Request $request)
    {

        if ($request->has('search')){
        $search = $request->get('search');
        $kelas = \App\Kelas::all();
        $siswa = DB::table('data_siswa')
                ->join('kelas','data_siswa.kelas_id','=','kelas.id')
                ->get();
        $data = DB::table('siswa_telat')
                ->join('data_siswa','siswa_telat.siswa_id','=','data_siswa.id')
                ->join('kelas','data_siswa.kelas_id','=','kelas.id')
                ->select('siswa_telat.*','data_siswa.nama','kelas.nama_kelas')
                ->where('siswa_telat.created_at','=',date('Y-m-d'))
                ->where('nama','like','%'.$search.'%')
                ->paginate(10);
        }elseif($request->has('date')){
        $date = $request->get('date');
        $kelas = \App\Kelas::all();
        $siswa = DB::table('data_siswa')
                ->join('kelas','data_siswa.kelas_id','=','kelas.id')
                ->get();
        $data = DB::table('siswa_telat')
                ->join('data_siswa','siswa_telat.siswa_id','=','data_siswa.id')
                ->join('kelas','data_siswa.kelas_id','=','kelas.id')
                ->select('siswa_telat.*','data_siswa.nama','kelas.nama_kelas')
                ->where('siswa_telat.created_at','=',$date)
                ->paginate(10);
        }else{

        $kelas = \App\Kelas::all();

        $siswa = DB::table('data_siswa')
         ->groupBy('kelas_id')
         ->join('kelas','data_siswa.kelas_id','=','kelas.id')
         ->get();

        $data = DB::table('siswa_telat')
                ->join('data_siswa','siswa_telat.siswa_id','=','data_siswa.id')
                ->join('kelas','data_siswa.kelas_id','=','kelas.id')
                ->select('siswa_telat.*','data_siswa.nama','kelas.nama_kelas')
                ->where('siswa_telat.created_at','=',date('Y-m-d'))
                ->orderBy('pukul_telat','asc')
                ->paginate(10);
        }
        return view('osis.siswa_telat',compact('data','kelas','siswa'));
        
    }

    public function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('data_siswa')
       ->where($select, $value)
       ->groupBy($dependent)
       ->get();
     $output = '<option value="">Pilih '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->id.'">'.$row->$dependent.'</option>';
     }
     echo $output;
    }

    public function data_siswa(Request $request){

      
        // if ($request->has('date_1','date_2')) {
        //     $data_siswa = \App\Data_siswa::select('data_siswa.*',DB::raw("data_siswa.nama,kelas.nama_kelas,count(data_siswa.nama) as total"))
        //           ->join('siswa_telat','data_siswa.id','=','siswa_telat.siswa_id')
        //           ->join('kelas','data_siswa.kelas_id','=','kelas.id')
        //           ->groupBy('data_siswa.nama','data_siswa.kelas_id')
        //           ->where('data_siswa.created_at','between', $request->date_1 and $request->date_1)
        //           ->paginate(10);
        // }else{
        if ($request->has('search')) {
        $search = $request->get('search');
        $data_siswa = \App\Data_siswa::select('data_siswa.*',DB::raw("data_siswa.nama,kelas.nama_kelas,count(data_siswa.nama) as total"))
                  ->join('siswa_telat','data_siswa.id','=','siswa_telat.siswa_id')
                  ->join('kelas','data_siswa.kelas_id','=','kelas.id')
                  ->groupBy('data_siswa.nama','data_siswa.kelas_id')
                  ->where('nama','like','%'.$search.'%')
                  ->paginate(10);
        }else{ 
        $data_siswa = \App\Data_siswa::select('data_siswa.*',DB::raw("data_siswa.nama,kelas.nama_kelas,count(data_siswa.nis) as total"))
                  ->join('siswa_telat','data_siswa.id','=','siswa_telat.siswa_id')
                  ->join('kelas','data_siswa.kelas_id','=','kelas.id')
                  ->groupBy('data_siswa.nis')
                  ->paginate(10);
              }
           
        
      return view('osis.data_siswa',compact('data_siswa'));
        
    }


    public function search_siswa(Request $request){
        
        return view('osis.data_siswa',compact('data_siswa'));
    }

    

    public function create(Request $request)
    {

        $data_siswa_telat = new \App\Siswa_telat;
        $data_siswa_telat->siswa_id = $request->siswa_id;
        $data_siswa_telat->pukul_telat = $request->pukul_telat;
        $data_siswa_telat->batas_waktu_sanksi = $request->batas_waktu_sanksi;
        $data_siswa_telat->save();


        // $siswa = \App\Data_siswa::findOrFail($request->nama);
        // if($siswa != null){
        // $data = new\App\Siswa_telat();
        // $data->siswa_id = $request->siswa_id;
        // $data->pukul_telat = $request->pukul_telat;
        // $data->batas_waktu_sanksi = $request->batas_waktu_sanksi;
        // $data->save();   
        // }
        // else{
        // $siswa = new\App\Data_siswa();
        // $siswa->nama = $request->nama;
        // $siswa->kelas_id = $request->kelas->nama_kelas;
        // $siswa->save();  
        // }
        
        return redirect('/siswa-telat')->with('succes','Data Berhasil Ditambahkan');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }



    public function edit($id)
    {
        $siswa_telat = \App\Siswa_telat::find($id);
        return view('osis.edit_siswa',compact('siswa_telat'));
    }

    public function update(Request $request, $id)
    {
        $data_siswa = \App\Siswa_telat::find($id);
        $data_siswa->update($request->all());
        return redirect('/siswa-telat')->with('succes_edit','Data Berhasil Diubah');
    }



    public function update_sudah(Request $request, $id)
    {

        $data_siswa_telat = \App\Siswa_telat::where('id',$id);
        $data_siswa_telat->update(['ket_sanksi'=> 'sudah']);
        return redirect('/siswa-telat')->with('succes_konfir','Data Berhasil Diubah');
    }

    public function update_belum(Request $request, $id)
    {

        $data_siswa_telat = \App\Siswa_telat::where('id',$id);
        $data_siswa_telat->update(['ket_sanksi'=> 'belum']);
        return redirect('/siswa-telat')->with('succes_konfir','Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $data_siswa_telat = \App\Siswa_telat::find($id);
        $data_siswa_telat->delete();
        return redirect('/siswa-telat')->with('succes_delete','Data Berhasil Dihapus');
    }

    public function delete($id)
    {
        $data_siswa = \App\Data_siswa::find($id);
        $data_siswa->delete();
        return redirect('/data-siswa')->with('succes_delete','Data Berhasil Dihapus');
    }

    public function exportExcel() 
    {
        return Excel::download(new SiswatelatExport, 'JAGA GERBANG - Data Siswa Telat Tanggal '. date('d-m-Y').'.xlsx');
    }

    public function exportPdf()
    {
        $data_siswa_telat = DB::table('siswa_telat')
                ->join('data_siswa','siswa_telat.siswa_id','=','data_siswa.id')
                ->join('kelas','data_siswa.kelas_id','=','kelas.id')
                ->select('siswa_telat.*','data_siswa.nama','kelas.nama_kelas')
                ->where('siswa_telat.created_at','=',date('Y-m-d'))
                ->paginate(5);
        $seksi = \App\Seksiosis::all();
        $pdf = PDF::loadView('export.siswatelat_pdf',compact('data_siswa_telat','seksi'));
        return $pdf->download('JAGA GERBANG - Data Siswa Telat Tanggal '. date('d-m-Y').'.pdf');
    }

    public function datasiswa_exportExcel() 
    {
        return Excel::download(new DatasiswaExport, 'JAGA GERBANG - Rekap Data Total Siswa Telat.xlsx');
    }
    
    public function datasiswa_exportPdf()
    {
        $data_siswa = \App\Data_siswa::select(DB::raw("data_siswa.nama,kelas.nama_kelas,count(siswa_telat.siswa_id) as total"))
                  ->join('siswa_telat','data_siswa.id','=','siswa_telat.siswa_id')
                  ->join('kelas','data_siswa.kelas_id','=','kelas.id')
                  ->groupBy('data_siswa.nama','data_siswa.kelas_id')
                  ->get();
        $pdf = PDF::loadView('export.datarekap_siswatelat_pdf',compact('data_siswa'));
        return $pdf->download('JAGA GERBANG - Rekap Data Total Siswa Telat.pdf');
    }

public function search(Request $request){
        // check if ajax request is coming or not

        if($request->ajax()) {
            // select country name from database 
            $data = \App\Data_siswa::select(DB::raw("data_siswa.nama,kelas.nama_kelas,count(siswa_telat.siswa_id) as total"))
                  ->join('siswa_telat','data_siswa.id','=','siswa_telat.siswa_id')
                  ->join('kelas','data_siswa.kelas_id','=','kelas.id')
                  ->groupBy('data_siswa.nama','data_siswa.kelas_id')
                  ->where('nama','like','%'.$request->nama.'%')
                  ->get();
            // declare an empty array for output
            $output = '';
            // if searched countries count is larager than zero
            if (count($data)>0) {
                // concatenate output to the array
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                // loop through the result array
                foreach ($data as $row){
                    // concatenate output to the array
                    $output .= '<li class="list-group-item">'.$row->nama.'</li>';
                }
                // end of output
                $output .= '</ul>';
            }
            else {
                // if there's no matching results according to the input
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
            // return output result array
            return $output;
        }
    }




    // <!-- $siswa = \App\Data_siswa::findOrFail($request->nama);
    //     if($siswa != null){
    //     $data = new\App\Siswa_telat();
    //     $data->siswa_id = $request->siswa_id;
    //     $data->pukul_telat = $request->pukul_telat;
    //     $data->batas_waktu_sanksi = $request->batas_waktu_sanksi;
    //     $data->save();   
    //     }
    //     else{
    //     $siswa = new\App\Data_siswa();
    //     $siswa->nama = $request->nama;
    //     $siswa->kelas_id = $request->kelas->nama_kelas;
    //     $siswa->save();  
    //     }
        
    //     return redirect('/siswa-telat')->with('succes','Data Berhasil Ditambahkan'); -->
}
