@extends('dashboard.layouts.master')
    <title>Edit Seksi OSIS | Jaga Gerbang</title>

@section('content')
<section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-12">
            <h4><i class="fa fa-edit"></i> Edit Seksi OSIS</h4>
            <div class="form-panel">
				                <form class="cmxform form-horizontal style-form" id="signupForm" method="POST" action="/data-seksi/{{$data_seksi->id}}/update">
				                  {{csrf_field()}}
				                  <div class="form-group ">
				                    <label for="nama_seksi" class="control-label col-lg-2">Nama Seksi</label>
				                    <div class="col-lg-10">
				                      <input class=" form-control" id="nama_seksi" name="nama_seksi" type="text" value="{{$data_seksi->nama_seksi}}">
				                    </div>
				                  </div>
				                  <div class="form-group ">
				                    <label for="jumlah_anggota" class="control-label col-lg-2">Jumlah Anggota</label>
				                    <div class="col-lg-10">
				                      <input class=" form-control" id="jumlah_anggota" name="jumlah_anggota" type="text" value="{{$data_seksi->jumlah_anggota}}">
				                    </div>
				                  </div>
				                  <div class="form-group ">
				                    <label for="bidang" class="control-label col-lg-2">Bidang</label>
				                    <div class="col-lg-10">
				                      <input class=" form-control" id="bidang" name="bidang" type="text" value="{{$data_seksi->bidang}}">
				                    </div>
				                  </div>
				                      <a href="/data-seksi" class="btn btn-warning">Batal</a>
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