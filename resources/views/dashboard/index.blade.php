@extends('dashboard.layouts.master')
    <title>Dashboard | Jaga Gerbang</title>

@section('content')
<section id="main-content">
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Selamat Datang <b>{{auth()->user()->name}} !</b></h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="row">
            	<div class="col-md-4 col-sm-3 mb">
	                <div class="darkblue-panel pn">
	                  <div class="darkblue-header">
	                    <h5 style="font-size: 20px;margin-top: 20px;">JUMLAH SISWA SMKN 2</h5>
	                  </div>
	                  <h1 class="mt"><i class="fa fa-users fa-3x" style="margin-top: -15px;"></i></h1>
	                  <br>
	                  <footer>
	                    <div class="centered">
	                      <h5 style="font-size: 20px;margin-top: -5px;"><i class="fa fa-users"></i> {{ $seksiosis = \App\Data_siswa::count() }} Siswa</h5>
	                    </div>
	                  </footer>
	                </div>
	            </div>
	            <div class="col-md-4 col-sm-3 mb">
	                <div class="darkblue-panel pn">
	                  <div class="darkblue-header">
	                    <h5 style="font-size: 20px;margin-top: 20px;">JUMLAH SEKSI BIDANG OSIS</h5>
	                  </div>
	                  <h1 class="mt"><i class="fa fa-users fa-3x" style="margin-top: -15px;"></i></h1>
	                  <br>
	                  <footer>
	                    <div class="centered">
	                      <h5 style="font-size: 20px;margin-top: -5px;"><i class="fa fa-users"></i> {{ $seksiosis = \App\Seksiosis::count() }} Sekbid</h5>
	                    </div>
	                  </footer>
	                </div>
	            </div>
	            <div class="col-md-4 col-sm-3 mb">
	                <div class="darkblue-panel pn">
	                  <div class="darkblue-header">
	                    <h5 style="font-size: 20px;margin-top: 20px;">JUMLAH KELAS</h5>
	                  </div>
	                  <h1 class="mt"><i class="fa fa-home fa-3x" style="margin-top: -15px;"></i></h1>
	                  <br>
	                  <footer>
	                    <div class="centered">
	                      <h5 style="font-size: 20px;margin-top: -5px;"><i class="fa fa-home"></i> {{ $kelas = \App\Kelas::count() }} Kelas</h5>
	                    </div>
	                  </footer>
	                </div>
	            </div>
	            <div class="col-md-4 col-sm-3 mb">
	                <div class="darkblue-panel pn">
	                  <div class="darkblue-header">
	                    <h5 style="font-size: 20px;margin-top: 20px;">SISWA TELAT HARI INI</h5>
	                  </div>
	                  <h1 class="mt"><i class="fa fa-users fa-3x" style="margin-top: -15px;"></i></h1>
	                  <br>
	                  <footer>
	                    <div class="centered">
	                      <h5 style="font-size: 20px;margin-top: -5px;"><i class="fa fa-users"></i> {{ $data_siswa_telat = \App\Siswa_telat::where('created_at','=',date('Y-m-d'))->count() }} Siswa</h5>
	                    </div>
	                  </footer>
	                </div>
	            </div>
	            
            </div>
          </div>
        </div>
      </section>
      <!-- /wrapper -->
</section>

<script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Selamat datang {{auth()->user()->name}} di JAGA GERBANG !',
        // (string | mandatory) the text inside the notification
        text: 'JAGA GERBANG adalah website untuk memudahkan OSIS mendata dan membuat laporan siswa yang telat. ',
        // (string | optional) the image to display on the left
        image: '{{asset('asset/img/admin.png')}}',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 10000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
@stop