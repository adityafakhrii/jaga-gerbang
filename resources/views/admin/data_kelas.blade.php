@extends('dashboard.layouts.master')
    <title>Data Kelas | Jaga Gerbang</title>

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
              <h3 style="margin-left: 10px;"><i class="fa fa-home"></i> Data Kelas</h3>
	            <button style="float: right;margin-top: -40px; margin-right: 25px;" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">
	               Tambah Data
	            </button>
              <div class="form-group" style="float: right;margin-right: 25px;">
                <input type="text" name="search" id="search" class="form-control" placeholder="Cari Kelas..."/>
              </div>

              
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="col-sm-1">No</th>
                    <th>Nama Kelas</th>
                    <th>Aksi</th>
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
	                      <h4 class="modal-title" id="myModalLabel">Tambah Data Kelas</h4>
	                    </div>
	                    <div class="modal-body">
	                      	<div class="form">
				                <form class="cmxform form-horizontal style-form" id="signupForm" method="POST" action="/data-kelas/create">
				                  {{csrf_field()}}
				                  <div class="form-group ">
				                    <label for="nama_kelas" class="control-label col-lg-3">Nama Kelas</label>
				                    <div class="col-lg-8">
				                      <input class=" form-control" id="nama_kelas" name="nama_kelas" type="text">
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
     url:"{{ route('data-kelas.action') }}",
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
