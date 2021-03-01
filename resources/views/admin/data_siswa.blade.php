@extends('dashboard.layouts.master')
<head>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  
  <title>Data Siswa SMKN 2 Sukabumi | Jaga Gerbang</title>

</head>
    

@section('content')

<section id="main-content">
    <section class="wrapper site-min-height">
       
        <div class="row">
          <div class="col-md-12 mt">
            @if(Session::has('succes'))
                    <div class="alert alert-success"><b>Sukses !</b> Data berhasil ditambahkan</div>
            @elseif(Session::has('succes_delete'))
                <div class="alert alert-danger"><b>Sukses !</b> Data berhasil dihapus</div>
            @elseif(Session::has('succes_edit'))
                <div class="alert alert-warning"><b>Sukses !</b> Data berhasil diubah</div>
            @endif
            <div class="content-panel">
              <h3 style="margin-left: 10px;"><i class="fa fa-home"></i> Data Siswa SMKN 2</h3>
              @if(auth()->user()->role == 'admin')
              <button style="float: right;margin-top: -40px; margin-right: 25px;" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">
                 Tambah Siswa
              </button>
              @endif
              <div class="form-group" style="float: right;margin-right: 25px;">
                <input type="text" name="search" id="search" class="form-control" placeholder="Cari NIS, Nama Atau Kelas"/>
              </div>

              
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="col-sm-1">No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    @if(auth()->user()->role == 'admin')
                    <th>Aksi</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </section>

</section>


  <!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Siswa</h4>
                      </div>
                      <div class="modal-body">
                          <div class="form">
                        <form class="cmxform form-horizontal style-form" id="signupForm" method="POST" action="/data-siswa-smkn2/create">
                          {{csrf_field()}}
                          <div class="form-group ">
                            <label for="nis" class="control-label col-lg-3">NIS</label>
                            <div class="col-lg-8">
                              <input class=" form-control" id="nis" name="nis" type="text" placeholder="Masukkan NIS">
                            </div>
                            <label for="nama" class="control-label col-lg-3">Nama Siswa</label>
                            <div class="col-lg-8">
                              <input class=" form-control" id="nama" name="nama" type="text" placeholder="Masukkan Nama Siswa">
                            </div>
                            <label for="kelas_id" class="control-label col-lg-3">Kelas</label>
                            <div class="col-lg-8">
                              <select name="kelas_id" id="kelas_id" class="input-lg">
                                @foreach($kelas as $k)
                                <option value="{{$k->id}}">{{$k->nama_kelas}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                           </div>
                        </form>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
<script>
  $(document).ready(function(){

   fetch_kelas_data();

   function fetch_kelas_data(query = '')
   {
    $.ajax({
     url:"{{ route('data-siswa-smkn2.action') }}",
     method:'GET',
     data:{query:query},
     dataType:'json',
     success:function(data)
     {
      $('tbody').html(data.table_data);
      $('#total_records').text(data.total_data);
     }
    })
   }

   $(document).on('keyup', '#search', function(){
    var query = $(this).val();
    fetch_kelas_data(query);
   });
  });
</script>
@stop