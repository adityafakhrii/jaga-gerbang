@extends('dashboard.layouts.master')
    <title>Edit Kelas | Jaga Gerbang</title>

@section('content')
<section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-12">
          	
            <h4><i class="fa fa-edit"></i>  Edit Kelas</h4>
            <div class="form-panel">
				                <form class="cmxform form-horizontal style-form" id="signupForm" method="POST" action="/data-kelas/{{$data_kelas->id}}/update">
				                  {{csrf_field()}}
				                  <div class="form-group ">
				                    <label for="nama_kelas" class="control-label col-lg-2">Nama Kelas</label>
				                    <div class="col-lg-10">
				                      <input class=" form-control" id="nama_kelas" name="nama_kelas" type="text" value="{{$data_kelas->nama_kelas}}">
				                    </div>
				                  </div>
				                      <a href="/data-kelas" class="btn btn-warning">Batal</a>
				                      <button type="submit" class="btn btn-primary">Simpan</button>
	                    		</form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>

      </section>
</section>






							
@stop