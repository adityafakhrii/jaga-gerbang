@extends('dashboard.layouts.master')
<head>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  
  <title>Seluruh Siswa Telat | Jaga Gerbang</title>

</head>
    

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
            @if(Session::has('succes'))
                <div class="alert alert-success"><b>Sukses !</b> Data berhasil ditambahkan</div>
            @elseif(Session::has('succes_delete'))
                <div class="alert alert-danger"><b>Sukses !</b> Data berhasil dihapus</div>
            @elseif(Session::has('succes_edit'))
                <div class="alert alert-warning"><b>Sukses !</b> Data berhasil diubah</div>
            @elseif(Session::has('succes_konfir'))
                <div class="alert alert-info"><b>Sukses !</b> Data berhasil dikonfirmasi</div>    
            @elseif(Session::has('truncate'))
                <div class="alert alert-danger"><b>Sukses !</b> Seluruh data pada hari ini berhasil direset</div>
            @endif
            <div class="content-panel">
                
                <div class="right" style="float: right;margin-right: 1.5%;">
                  <a  href="/data-siswa/exportexcel" class="btn btn-success btn-sm">
                            <i class="fa fa-download"></i>
                             Export Excel
                  </a>
                  <a  href="/data-siswa/exportpdf" class="btn btn-danger btn-sm">
                            <i class="fa fa-download"></i>
                             Export PDF
                  </a>
                </div>

                <br>

              	
                
                <br>
          
                <h4><i class="fa fa-users"></i> Seluruh Data Siswa Telat</h4>

                <div class="row mt">
                  <div class="col-lg-12">
                    <form action="/data-siswa" method="GET" class="form-inline" role="form" style="margin-left: 1%;">
                      <div class="form-group ">
                        <label class="sr-only" for="exampleInputEmail2">Cari Siswa</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" name="search" placeholder="Cari siswa...">
                      </div>
                      
                      <button type="submit" class="btn btn-theme">Cari</button>
                    </form>
                  </div>
                </div>

                {{-- <div class="row mt">
                  <div class="col-lg-12">
                    <form action="/data-siswa" method="GET" class="form-inline" role="form" style="margin-left: 1%;">
                      <div class="form-group ">
                        <label class="sr-only" for="exampleInputEmail2">Cari Siswa</label>
                        <input type="date" class="form-control" id="exampleInputEmail2" name="date_1" >
                        <input type="date" class="form-control" id="exampleInputEmail2" name="date_2" >
                      </div>
                      
                      <button type="submit" class="btn btn-theme">Cari</button>
                    </form>
                  </div>
                </div> --}}

                <section id="unseen">
                  <table class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr>
                        <th style="text-align: center;">No</th>
                        <th>Nama Siswa</th>
                        <th class="numeric" style="text-align: center;">Kelas</th>
                        <th class="numeric" style="text-align: center;">Total Telat</th>
                      </tr>
                    </thead>
                    <?php $no=1; ?>
                    
                    <tbody>
                      @foreach($data_siswa as $row)
                        <tr>
                          <td style="text-align: center;">{{$no++}}</td>
                          <td>{{$row->nama}}</td>
                          <td style="text-align: center;">{{$row->nama_kelas}}</td>
                          <td style="text-align: center;">{{$row->total}}</td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                    
                  </table>
                  <center>{{$data_siswa->links()}}</center>

                </section>

            </div>
          </div>
        </div>
    </section>
</section>
@stop