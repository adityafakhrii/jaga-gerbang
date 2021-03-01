@extends('auths.layouts.master')
<title>Jaga Gerbang</title>
@section('content')

<style>
  @media only screen and (max-width: 800px){
    table{
      font-size: 9px;
    }
    h4{
      font-size: 14px;
    }
    ul.top-menu > li > .btn-home{
      font-size: 13px;
    }
  }
</style>

<div id="login-page">
    <header class="header">
      
      <a href="/dashboard" class="logo">
        <img src="{{asset('asset/img/favicon.png')}}" style="width: 40px; margin-top: -3px;" alt="Jaga Gerbang.jpg">
        <b>JAGA <span>GERBANG</span></b>
      </a>
      
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          @if (Route::has('login'))
                    @auth
                       <li><a class="btn-home" href="{{ url('/dashboard') }}">Dashboard</a></li> 
                       @else
                       <li> <a class="btn-home" href="{{ route('login') }}">Login</a></li>
                    @endauth
            @endif
        </ul>
      </div>
    </header>
    <div class="container" >
            <section class="wrapper site-min-height">
                <div class="row mt">
                    <div class="col-lg-12 ">
                        <div class="content-panel" style="border-radius: 5px;margin-top: 1%;">
                            <center>
                                <div class="col-sm-12" >
                                    <h4> 
                                        <i class="fa fa-users"> </i> Data Siswa Telat Hari ini
                                    </h4>
                                    <form class="navbar-form navbar-left" action ="/" method="GET">
                                      <div class="input-group">
                                        <input name="search" type="text" class="form-control" placeholder="Cari disini...">
                                        <span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
                                      </div>
                                    </form>
                                    {{-- <input type="text" name="search" id="search" class="form-control" placeholder="Cari Siswa... " /> --}}<br>
                                </div>
                            </center>
                            
                            <section class="unseen">
                              <table class="table table-bordered table-striped table-condensed" >
                                <thead>
                                  <tr>
                                      <th class="numeric" style="text-align: center;">No</th>
                                      <th class="numeric" style="text-align: center;">Nama Siswa</th>
                                      <th class="numeric" style="text-align: center;">Kelas</th>
                                      <th class="numeric" style="text-align: center;">Pukul Telat</th>
                                      <th class="numeric" style="text-align: center; ">Batas Sanksi</th>
                                      <th class="numeric" style="text-align: center;">Ket. Sanksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $no=1; ?>
                                  @foreach($data as $row)
                                  <tr>
                                      <td style="text-align: center;">{{$no++}}</td>
                                      <td>{{$row->nama}}</td>
                                      <td style="text-align: center;">{{$row->nama_kelas}}</td>
                                      <td style="text-align: center;">{{$row->pukul_telat}} WIB</td>
                                      <td style="text-align: center;">{{$row->batas_waktu_sanksi}} WIB</td>
                                      <td style="text-align: center;">{{$row->ket_sanksi}} </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                          <center>{{$data->links()}}</center>

                            </section>
                            
                        </div>
                    </div>
                </div>
            </section>
    </div>
</div>


{{-- <script>
  $(document).ready(function(){

   fetch_dashboard();

   function fetch_dashboard(query = '')
   {
    $.ajax({
     url:"{{ route('dashboard.action') }}",
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
    fetch_dashboard(query);
   });
  });
</script> --}}
<footer class="site-footer" style="background: transparent;" >
      <div class="text-center">
        <p>
          © Copyright <strong>Aditya Fakhri Riansyah</strong>. All Rights Reserved
        </p>
        <div class="credits">
          Created with <i class="fa fa-heart" aria-hidden="true"></i> and template by <a style="color: #fff;font-weight: bold;" href="https://templatemag.com/">TemplateMag</a>
        </div>
        
      </div>
    </footer>
@stop