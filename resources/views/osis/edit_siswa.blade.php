@extends('dashboard.layouts.master')
    <title>Edit Ket. Sanksi Siswa | Jaga Gerbang</title>
@section('content')

<style type="text/css">
  @media only screen and (max-width: 800px){
    table{
      font-size: 10px;
    }
    .form-group{
      width: 99%;
    }
    .form-control{
      margin-top: 10px;
    }
    .btn-theme04{
      margin-top: -10px;
    }
  }
</style>

<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-12 mt">

            <div class="content-panel">

                <div class="row mt">
                  <div class="col-lg-12">
                    <h4 class="mb"><i class="fa fa-edit"></i> Edit Keterangan Sanksi Siswa Telat</h4>
                    <form action="/siswa-telat/{{$siswa_telat->id}}/update" method="POST" class="form-inline" role="form" style="margin-left: 1%;">
                      {{csrf_field()}}
                      <div class="form-group ">
                        <label class="sr-only" for="exampleInputEmail2">Nama Siswa</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" name="nama" value="{{$siswa_telat->data_siswa->nama}}" disabled="">
                        <label class="sr-only" for="ket_sanksi">Keterangan Sanksi</label>
                        <select name="ket_sanksi" type="text" class="form-control" style="cursor: pointer;" id="ket_sanksi">
                            <option value="sudah">Sudah</option>
                            <option value="belum">Belum</option>
                            <option value="belum dikonfirmasi">Belum Dikonfirmasi</option>
                          
                          
                        </select>
                      </div>
                      
                      <button type="submit" class="btn btn-theme">Submit</button>
                      <a href="/siswa-telat" class="btn btn-warning">Batal</a>
                    </form>
                  </div>
                </div> 


            </div>
          </div>
        </div>
    </section>
</section>

@stop