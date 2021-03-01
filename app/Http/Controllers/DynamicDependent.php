<?php

//DynamicDepdendent.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DynamicDependent extends Controller
{
    function index()
    {
     $country_list = DB::table('data_siswa')
         ->groupBy('kelas_id')
         ->join('kelas','data_siswa.kelas_id','=','kelas.id')
         ->get();
     return view('dynamic_dependent')->with('country_list', $country_list);
    }

    function fetch(Request $request)
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
}
?>