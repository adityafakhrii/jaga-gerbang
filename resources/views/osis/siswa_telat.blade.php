@extends('dashboard.layouts.master')
<head>
      
  <title>Siswa Telat Hari Ini | Jaga Gerbang</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    .pilih{
      margin-left: 3px;
    }
  </style>

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
                	
                  <a  href="/siswa-telat/exportexcel" class="btn btn-success btn-sm">
                          	<i class="fa fa-download"></i>
                          	 Export Excel
                	</a>
                  <a  href="/siswa-telat/exportpdf" class="btn btn-danger btn-sm">
                            <i class="fa fa-download"></i>
                             Export PDF
                  </a>
                </div>

                <br>
                @if(auth()->user()->role == 'osis')
              	<div class="row mt">
  		            <div class="col-lg-12">
  		              <h4 class="mb"><i class="fa fa-plus"></i> Masukkan Data Siswa Telat</h4>

  		              <form action="/siswa-telat/create" method="POST" class="form-inline" role="form" style="margin-left: 1%;">
  		              	

  		                <div class="form-group">

  		                  <label class="sr-only" for="search">Nama Siswa</label>
  		                  
                        <select name="kelas_id" id="kelas_id" class="form-control col-lg-3 dynamic" data-dependent="nama" style="cursor: pointer;">
                           <option value="">Pilih Kelas</option>
                           @foreach($siswa as $s)
                           <option value="{{ $s->kelas_id}}">{{ $s->nama_kelas }}</option>
                           @endforeach
                        </select>
                        

                        <select name="siswa_id" id="nama" class="form-control col-lg-3 pilih" style="cursor: pointer;">
                           <option value="">Pilih Nama</option>
                        </select>

                        <input type="hidden" name="pukul_telat" value="{{\Carbon\Carbon::now()}}">
                        <input type="hidden" name="batas_waktu_sanksi" value="{{\Carbon\Carbon::now()->addMinutes(15)}}">
                        
                        {{csrf_field()}}
  		                </div>

  		                
  		                <button type="submit" class="btn btn-theme">Submit</button>
  		              </form> 

  		            </div>

  		          </div> 
                @endif

                
                <br>
          
                <h4><i class="fa fa-users"></i> Data Siswa Telat Hari Ini </h4>

                {{-- <div class="form-group col-sm-3" >
                  <input type="text" name="search" id="search" class="form-control" placeholder="Cari Siswa... " />
                </div> --}}

                {{-- <div class="col-md-3">
                 <div class="form-group">
                  <input type="text" name="serach" id="serach" class="form-control" />
                 </div>
                </div> --}}

                <div class="row mt">
                  <div class="col-lg-12">
                    <form action="/siswa-telat" method="GET" class="form-inline" role="form" style="margin-left: 1%;">
                      <div class="form-group ">
                        <label class="sr-only" for="exampleInputEmail2">Cari Siswa</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" name="search" placeholder="Cari Siswa...">
                      </div>
                      
                      <button type="submit" class="btn btn-theme">Cari</button>
                    </form>
                  </div>
                </div>

                <div class="row mt">
                  <div class="col-lg-12">
                    <form action="/siswa-telat" method="GET" class="form-inline" role="form" style="margin-left: 1%;">
                      <div class="form-group ">
                        <input type="date" class="form-control" id="exampleInputEmail2" name="date">
                      </div>
                      
                      <button type="submit" class="btn btn-theme">Cari Tanggal</button>
                    </form>
                  </div>
                </div>

                <section id="unseen">
                  <table class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th class="sorting" data-sorting_type="asc" >Nama Siswa</span></th>
                        <th class="numeric" style="text-align: center;">Kelas</th>
                        <th class="numeric" style="text-align: center;">Pukul Telat</th>
                        <th class="numeric" style="text-align: center; ">Batas Sanksi</th>
                        <th class="numeric" style="text-align: center;">Ket. Sanksi</th>
                        @if(auth()->user()->role == 'osis')
                        <th style="text-align: center;">Aksi</th>
                        @endif
                      </tr>
                    </thead>
                    <?php $no=1; ?>
                    
                    <tbody>
                      @foreach($data as $row)
                        <tr>
                          <td style="text-align: center;">{{$no++}}</td>
                          <td>{{$row->nama}}</td>
                          <td style="text-align: center;">{{$row->nama_kelas}}</td>
                          <td style="text-align: center;">{{$row->pukul_telat}} WIB</td>
                          <td style="text-align: center;">{{$row->batas_waktu_sanksi}} WIB</td>

                          @if(auth()->user()->role == 'osis')
                          <td style="text-align: center;">
                            @if($row->ket_sanksi == 'belum dikonfirmasi')
                              <div class="" >
                                  <form style="display: inline-block;" action="/siswa-telat/{{$row->id}}/update_sudah" method="POST">
                                    {{csrf_field()}}
                                      <input type="hidden" value="sudah" name="ket_sanksi">
                                      <button type="submit" class="btn btn-info btn-sm" name="ket_sanksi"  onclick="return confirm('Anda Yakin ?')">
                                          <i class="fa fa-check"></i>
                                      </button>
                                  </form>
                                  <form style="display: inline-block;" action="/siswa-telat/{{$row->id}}/update_belum" method="POST">
                                    {{csrf_field()}}
                                      <input type="hidden" value="belum" name="ket_sanksi">
                                      <button type="submit" class="btn btn-theme04 btn-sm" name="ket_sanksi" onclick="return confirm('Anda Yakin ?')">
                                          <i class="fa fa-times"></i>
                                      </button>
                                  </form>
                                </div>
                            @elseif($row->ket_sanksi == 'sudah' or 'belum')
                                    {{$row->ket_sanksi}}
                            @endif
                          </td>
                          @endif

                          @if(auth()->user()->role == 'wakasek')
                          <td align="center">{{$row->ket_sanksi}}</td>
                          @endif


                          @if(auth()->user()->role == 'osis')
                          <td style="text-align: center;">
                              <a href="/siswa-telat/{{$row->id}}/edit" class="btn btn-warning btn-sm">
                                      <i class="fa fa-pencil"></i>
                              </a>
                              <a href="/siswa-telat/{{$row->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini ? ')">
                                      <i class="fa fa-trash-o "></i>
                              </a>
                          </td>
                          @endif
                      </tr>
                      @endforeach
                      
                    </tbody>
                    
                  </table>
                  <center>{{$data->links()}}</center>
                  <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                  <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                  <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />

                </section>

            </div>
          </div>
        </div>
    </section>
</section>

<script>
$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('dynamicdependent.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }

   })
  }
 });

 $('#kelas_id').change(function(){
  $('#nama').val('');
 });
 

});
</script>

@stop