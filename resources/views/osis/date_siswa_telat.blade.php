@extends('dashboard.layouts.master')
<head>
      
  <title>Siswa Telat | Jaga Gerbang</title>

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

              	<div class="row mt">
  		            <div class="col-lg-12">
  		              <h4 class="mb"><i class="fa fa-plus"></i> Masukkan Data Siswa Telat</h4>

  		              <form action="/siswa-telat/create" method="POST" class="form-inline" role="form" style="margin-left: 1%;">
  		              	{{csrf_field()}}

  		                <div class="form-group ">

  		                  <label class="sr-only" for="search">Nama Siswa</label>
  		                  {{-- <input type="text" class="form-control" id="exampleInputEmail2" name="nama_siswa" placeholder="Nama Siswa" required> --}}

                        <input type="text" name="nama" id="country" placeholder="Masukkan" class="typeahead form-control" autocomplete="off">
                        {{-- <select name="siswa_id" id="nama_siswa">
                          @foreach($siswa as $row)
                            <option value="{{$row->id}}">{{$row->nama}}</option>
                          @endforeach
                        </select> --}}
                        <input type="hidden" name="pukul_telat" value="{{\Carbon\Carbon::now()}}">
                        <input type="hidden" name="batas_waktu_sanksi" value="{{\Carbon\Carbon::now()->addMinutes(15)}}">
                        <select name="kelas_id" type="text" class="form-control" style="cursor: pointer;" required>
                          @foreach($kelas as $kls)
                            <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
                          @endforeach
                          
                        </select>
  		                </div>

  		                
  		                <button type="submit" class="btn btn-theme">Submit</button>
  		              </form>
                <div id="country_list" class="col-lg-3"></div> 

  		            </div>

  		          </div> 

                
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
                        <label class="sr-only" for="exampleInputEmail2">Lihat Berdasar Tanggal</label>
                        <input type="date" class="form-control" id="exampleInputEmail2" name="date" placeholder="Cari Siswa...">
                      </div>
                      
                      <button type="submit" class="btn btn-theme">Cari</button>
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
                        <th style="text-align: center;">Hapus</th>
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
                          <td style="text-align: center;">

                            @if($row->ket_sanksi == 'belum dikonfirmasi')
                              <div class="" >
                                  <form style="display: inline-block;" action="/siswa-telat/{{$row->id}}/update_sudah" method="POST">
                                    {{csrf_field()}}
                                      <input type="hidden" value="sudah" name="ket_sanksi">
                                      <button type="submit" class="btn btn-info btn-sm" name="ket_sanksi">
                                          <i class="fa fa-check"></i>
                                      </button>
                                  </form>
                                  <form style="display: inline-block;" action="/siswa-telat/{{$row->id}}/update_belum" method="POST">
                                    {{csrf_field()}}
                                      <input type="hidden" value="belum" name="ket_sanksi">
                                      <button type="submit" class="btn btn-theme04 btn-sm" name="ket_sanksi">
                                          <i class="fa fa-times"></i>
                                      </button>
                                  </form>
                                </div>
                            @elseif($row->ket_sanksi == 'sudah' or 'belum')
                                    {{$row->ket_sanksi}}
                            @endif
                          </td>
                          <td style="text-align: center;">
                             <a href="/siswa-telat/{{$row->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini ? ')">
                                      <i class="fa fa-trash-o "></i>
                              </a>
                          </td>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script type="text/javascript">
            // jQuery wait till the page is fullt loaded
            $(document).ready(function () {
                // keyup function looks at the keys typed on the search box
                $('#country').on('keyup',function() {
                    // the text typed in the input field is assigned to a variable 
                    var query = $(this).val();
                    // call to an ajax function
                    $.ajax({
                        // assign a controller function to perform search action - route name is search
                        url:"{{ route('search') }}",
                        // since we are getting data methos is assigned as GET
                        type:"GET",
                        // data are sent the server
                        data:{'country':query},
                        // if search is succcessfully done, this callback function is called
                        success:function (data) {
                            // print the search results in the div called country_list(id)
                            $('#country_list').html(data);
                        }
                    })
                    // end of ajax call
                });

                // initiate a click function on each search result
                $(document).on('click', 'li', function(){
                    // declare the value in the input field to a variable
                    var value = $(this).text();
                    // assign the value to the search box
                    $('#country').val(value);
                    // after click is done, search results segment is made empty
                    $('#country_list').html("");
                });
            });
        </script>
@stop