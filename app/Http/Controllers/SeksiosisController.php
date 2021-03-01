<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Http\Request;

class SeksiosisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_seksi = \App\Seksiosis::all();
        return view('admin.data_seksi',['data_seksi' => $data_seksi]);
    }

   
    public function create(Request $request)
    {
        

        //insert ke tabel user
        $user = new \App\User;
        $user->role = 'osis';
        $user->name = $request->nama_seksi;
        $user->username = $request->username;
        $user->password = Hash::make($request->get('password'));
        $user->remember_token = str_random(60);
        $user->save();


        //insert ke tabel seksi osis
        $request->request->add(['user_id' => $user->id]);
        $data_seksi = \App\Seksiosis::create($request->all());
        return redirect('/data-seksi')->with('succes','Data Berhasil Ditambahkan');
    }

    public function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = \App\Seksiosis::where('nama_seksi', 'like', '%'.$query.'%')->orWhere('bidang', 'like', '%'.$query.'%')->get();
      }
      else
      {
       $data = \App\Seksiosis::all();
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
            <td>'.$row->nama_seksi.'</td>
            <td>'.$row->jumlah_anggota.'</td>
            <td>'.$row->bidang.'</td>
            <td>
                      <a href="/data-seksi/'.$row->id.'/edit" class="btn btn-warning btn-md">
                        <i class="fa fa-pencil"></i>
                      </a>
                      </a>
                      <a href="/data-seksi/'.$row->id.'/delete" class="btn btn-danger btn-md" onclick="return confirm(Anda yakin ingin menghapus data ini?)">
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


    public function store(Request $request)
    {
       
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
        $data_seksi = \App\Seksiosis::find($id);
        return view('admin.edit_seksi',['data_seksi' => $data_seksi]);
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
        $data_seksi = \App\Seksiosis::find($id);
        $data_seksi->update($request->all());
        return redirect('/data-seksi')->with('succes_edit','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_seksi = \App\Seksiosis::find($id);
        $data_seksi->delete();
        return redirect('/data-seksi')->with('succes_delete','Data Berhasil Dihapus');
    }
}
