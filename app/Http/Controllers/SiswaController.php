<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kelas = \App\Kelas::all();
        return view('admin.data_siswa',compact('kelas'));
    }

    public function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        $data = DB::table('data_siswa')
                ->join('kelas','data_siswa.kelas_id','=','kelas.id')
                ->where('nama', 'like', '%'.$query.'%')
                ->orWhere('nis', 'like', '%'.$query.'%')
                ->orWhere('nama_kelas', 'like', '%'.$query.'%')
                ->get();
       // $data = \App\Data_siswa::where('nama', 'like', '%'.$query.'%')->orWhere('nis', 'like', '%'.$query.'%')->get();
      }
      else
      {
       $data = \App\Data_siswa::orderBy('nama','asc')->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
        $no=1;
       foreach($data as $row)
       {
        $output .= '
        <tr>
            <td>'.$no++.'</td>
            <td>'.$row->nis.'</td>
            <td>'.$row->nama.'</td>
            <td>'.$row->kelas->nama_kelas.'</td>
            <td>

                      <a href="/data-siswa-smkn2/'.$row->id.'/edit" class="btn btn-warning btn-md">
                        <i class="fa fa-pencil"></i>
                      </a>
                      </a>
                      <a href="/data-siswa-smkn2/'.$row->id.'/delete" class="btn btn-danger btn-md" onclick="return confirm(Anda yakin ingin menghapus data ini?)">
                        <i class="fa fa-trash-o "></i>
                      </a>
            </td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">Data Tidak Ditemukan</td>
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

    public function create(Request $request)
    {
        \App\Data_siswa::create($request->all());
        return redirect('/data-siswa-smkn2')->with('succes','Data Berhasil Ditambahkan');
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_siswa = \App\Data_siswa::find($id);
        $kelas = \App\Kelas::all();
        return view('admin.edit_siswa',compact('data_siswa','kelas'));
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
        $data_siswa = \App\Data_siswa::find($id);
        $data_siswa->update($request->all());
        return redirect('/data-siswa-smkn2')->with('succes_edit','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_siswa = \App\Data_siswa::find($id);
        $data_siswa->delete();
        return redirect('/data-siswa-smkn2')->with('succes_delete','Data Berhasil Dihapus');
    }
}
