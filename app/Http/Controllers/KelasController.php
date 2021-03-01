<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data_kelas = \App\Kelas::all();
        // return view('admin.data_kelas',['data_kelas' => $data_kelas]);
        return view('admin.data_kelas');
    }

    public function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = \App\Kelas::where('nama_kelas', 'like', '%'.$query.'%')->get();
      }
      else
      {
       $data = \App\Kelas::all();
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
            <td>'.$row->nama_kelas.'</td>
            <td>
                      <a href="/data-kelas/'.$row->id.'/edit" class="btn btn-warning btn-md">
                        <i class="fa fa-pencil"></i>
                      </a>
                      </a>
                      <a href="/data-kelas/'.$row->id.'/delete" class="btn btn-danger btn-md" onclick="return confirm(Anda yakin ingin menghapus data ini?)">
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
        <td align="center" colspan="3">Data Tidak Ditemukan</td>
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
        \App\Kelas::create($request->all());
        return redirect('/data-kelas')->with('succes','Data Berhasil Ditambahkan');
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
        $data_kelas = \App\Kelas::find($id);
        return view('admin.edit_kelas',['data_kelas' => $data_kelas]);
    }

    public function update(Request $request, $id)
    {
        $data_kelas = \App\Kelas::find($id);
        $data_kelas->update($request->all());
        return redirect('/data-kelas')->with('succes_edit','Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $data_kelas = \App\Kelas::find($id);
        $data_kelas->delete();
        return redirect('/data-kelas')->with('succes_delete','Data Berhasil Dihapus');
    }
}
