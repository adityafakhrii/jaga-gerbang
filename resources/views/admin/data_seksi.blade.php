@extends('dashboard.layouts.master')
    <title>Data Seksi OSIS | Jaga Gerbang</title>

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
              <h4><i class="fa fa-users"></i> Data Seksi OSIS</h4>
             
              	<!-- Button trigger modal -->
	            <button style="float: right;margin-top: -40px; margin-right: 28px;" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">
	               Tambah Data
	            </button>
	            <div class="form-group col-md-2" style="float: right;margin-right: 13px;">
	                <input type="text" name="search" id="search" class="form-control" placeholder="Cari Seksi / Bidang..."/>
	            </div>

            	

              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th class="col-md-2">Nama Seksi</th>
                    <th>Jumlah Anggota</th>
                    <th>Bidang</th>
                    <th class="col-md-2">Aksi</th>
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
	                      <h4 class="modal-title" id="myModalLabel">Tambah Data Seksi</h4>
	                    </div>
	                    <div class="modal-body">
	                      	<div class="form">
				                <form class="cmxform form-horizontal style-form" id="signupForm" method="POST" action="/data-seksi/create">
				                  {{csrf_field()}}

				                  <div class="form-group ">
				                    <label for="nama_seksi" class="control-label col-lg-3">Nama Seksi</label>
				                    <div class="col-lg-8">
				                      <input class=" form-control" id="nama_seksi" name="nama_seksi" type="text">
				                    </div>
				                  </div>

				                  <div class="form-group ">
				                    <label for="jumlah_anggota" class="control-label col-lg-3">Jumlah Anggota</label>
				                    <div class="col-lg-8">
				                      <input class=" form-control" id="jumlah_anggota" name="jumlah_anggota" type="text">
				                    </div>
				                  </div>

				                  <div class="form-group ">
				                    <label for="bidang" class="control-label col-lg-3">Bidang</label>
				                    <div class="col-lg-8">
				                      <input class="form-control " id="bidang" name="bidang" type="text">
				                    </div>
				                  </div>

				                  <div class="form-group ">
				                    <label for="username" class="control-label col-lg-3">Username</label>
				                    <div class="col-lg-8">
				                      <input class=" form-control" id="username" name="username" type="text">
				                    </div>
				                  </div>

				                  <div class="form-group ">
				                    <label for="password" class="control-label col-lg-3">Password</label>
				                    <div class="col-lg-8">
				                      <input class=" form-control" id="password" name="password" type="password">
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

   fetch_seksiosis_data();

   function fetch_seksiosis_data(query = '')
   {
    $.ajax({
     url:"{{ route('data-seksi.action') }}",
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
    fetch_seksiosis_data(query);
   });
  });
</script>
@stop