@extends('dashboard.layouts.master')
    <title>Edit Siswa | Jaga Gerbang</title>
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
                    <h4 class="mb"><i class="fa fa-edit"></i> Edit Siswa Telat</h4>
                    <form action="/data-siswa-smkn2/{{$data_siswa->id}}/update" method="POST" class="form-inline" role="form" style="margin-left: 1%;">
                      {{csrf_field()}}
                      <div class="form-group ">
                        <label class="sr-only" for="exampleInputEmail2">Nama Siswa</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" name="nama" value="{{$data_siswa->nama}}">
                        <select name="kelas_id" type="text" class="form-control" style="cursor: pointer;">
                          @foreach($kelas as $kls)
                            <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                      
                      <button type="submit" class="btn btn-theme">Submit</button>
                      <a href="/data-siswa-smkn2" class="btn btn-warning">Batal</a>
                    </form>
                  </div>
                </div> 


            </div>
          </div>
        </div>
    </section>
</section>

@stop