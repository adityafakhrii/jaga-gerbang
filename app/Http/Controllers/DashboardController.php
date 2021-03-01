<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index()
    {
        $seksiosis = \App\Seksiosis::all();
        return view('dashboard.index',['seksiosis' => $seksiosis]);
    }

    public function home(Request $request)
    {
        
        if ($request->has('search')){
          $data = DB::table('siswa_telat')
                ->join('data_siswa','siswa_telat.siswa_id','=','data_siswa.id')
                ->join('kelas','data_siswa.kelas_id','=','kelas.id')
                ->select('siswa_telat.*','data_siswa.nama','kelas.nama_kelas')
                ->where('siswa_telat.created_at','=',date('Y-m-d'))
                ->where('nama','like','%'.$request->search.'%')
                ->paginate(5);
        }else{
         $data = DB::table('siswa_telat')
                ->join('data_siswa','siswa_telat.siswa_id','=','data_siswa.id')
                ->join('kelas','data_siswa.kelas_id','=','kelas.id')
                ->select('siswa_telat.*','data_siswa.nama','kelas.nama_kelas')
                ->where('siswa_telat.created_at','=',date('Y-m-d'))
                ->paginate(5);
        }
        return view('welcome',compact('data'));
    }

    
    public function action(Request $request)
    {
        {
          
         if($request->ajax())
         {
          $output = '';
          $query = $request->get('query');
          if($query != '')
          {
           $data = \App\Siswa_telat::where('', 'like', '%'.$query.'%')->get();
          }
          else
          {
           $data = DB::table('siswa_telat')
                ->join('data_siswa','siswa_telat.siswa_id','=','data_siswa.id')
                ->join('kelas','data_siswa.kelas_id','=','kelas.id')
                ->select('siswa_telat.*','data_siswa.nama','kelas.nama_kelas')
                ->paginate(5);
          }
          $total_row = $data->count();
          if($total_row > 0)
          {
            $no=1;
           foreach($data as $row)
           {
            $output .= '
            <tr>
                <td style="text-align: center;">'.$no++.'</td>
                <td>'.$row->nama.'</td>
                <td style="text-align: center;">'.$row->nama_kelas.'</td>
                <td style="text-align: center;">'.$row->pukul_telat.' WIB</td>
                <td style="text-align: center;">'.$row->batas_waktu_sanksi.' WIB</td>
                <td style="text-align: center;">'.$row->ket_sanksi.' </td>
            </tr>
            ';
           }
          }
          else
          {
           $output = '
           <tr>
            <td align="center" colspan="7">Data Tidak Ditemukan</td>
           </tr>
           ';
          }
          $data = array(
           'table_data'  => $output,
           'total_data'  => $total_row
          );

          echo json_encode($data);
         }
        }
    }

   
    public function store()
    {
        //
    }

    public function show($id)
    {
       
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
}
