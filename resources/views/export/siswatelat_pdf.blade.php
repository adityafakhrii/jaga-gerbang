<body style="    
	color: #797979;
    font-family: 'Ruda', sans-serif;
    font-size: 13px;">

	
	<section id="container">
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="col-lg-12 mt">
          <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="invoice-body" style="font-weight: 900px;">
                <div class="pull-left" style="float: left;">
                  <h1 style="
                  @import url(http://fonts.googleapis.com/css?family=Ruda:400,700,900);
                  font-size: 36px;
                  font-family: 'Ruda', sans-serif;
				    font-weight: 500;
				    line-height: 1.1px;
				    color: inherit;"><b>JAGA <span style="color: #48cfad;margin-left: 60px;">GERBANG</span></b></h1>
            <h3 style="margin-top: -20px;">Data Siswa Telat Harian</h3>
                  <address style="margin-bottom: 20px;
				    font-style: normal;">
	                <strong>SMKN 2 SUKABUMI</strong><br>
	                Jl. Pelabuhan II, Cikondang, Kec. Citamiang, Cipoho<br>
	                Kota Sukabumi, Jawa Barat - 43141<br>
	                <abbr title="Phone">Telp. (0266) 221589</abbr> 
	                <abbr title="Phone" style="margin-left: 115px">  Email : info@smkn2smi.sch.id </abbr> 
	              </address>
                </div>
                <!-- /pull-left -->
                
                <!-- /pull-right -->
                <div class="clearfix"></div>
                <br>
                <br>
                <br>
                <div class="row" style="margin-top: 100px;">
	                  <div class="col-md-9">
	                    <address style="float: left;">
		                  <strong style="margin-right: 90px">Petugas hari ini :</strong> {{auth()->user()->name}} <br>
		                  <strong style="margin-right: 90px"> Jumlah siswa :</strong> {{ $data_siswa_telat->count() }} Siswa <br>
		                </address>
	                  </div>
	                  <!-- /col-md-9 -->
	                  <div class="col-md-3">
	                    <br>

	                    <address style="float: right; margin-top: -15px;">
		                  	<strong style="margin-left: -95px;margin-right: 40px;">Hari :</strong><?php
		                      echo date('l');
		                    ?>
		                        	<br>

		               		<strong style="margin-left: -95px;margin-right: 40px;">Tanggal : </strong> <?php
				                echo  date('d M Y');
				              ?>
		                </address>
		
	                   

	                    <br>
	                    <br>
	                    <div class="well well-small green" style="
	                    	background-color: #48cfad;
						    border: none;
						    height: 2px;
						    width: auto;
	   						margin-bottom: 20px">
	                  	</div>
	                  <!-- /invoice-body -->
                </div>
                <!-- /col-lg-10 -->
                <table border="" class="table" style="width: 100%;
				    max-width: 100%;
				    margin-bottom: 20px;
					background-color: transparent;
					border-spacing: 0;
  					border-collapse: collapse;
				    ">
                  <thead>
                    <tr>
                      <th style="width:50px;text-align: center;">NO</th>
                      <th style="width:150px;">NAMA SISWA</th>
                      <th style="width:150px;text-align: center;">KELAS</th>
                      <th class="text-right" style="text-align: center">PUKUL TELAT</th>
                      <th class="text-right" style="text-align: center"> KET. SANKSI </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; ?>
                    @foreach($data_siswa_telat as $siswa)
                    <?php $no++; ?>
                    <tr>
                      <td class="text-center" style="text-align: center;">{{$no}}</td>
                      <td>{{$siswa->nama}}</td>
                      <td class="text-right">{{$siswa->nama_kelas}}</td>
                      <td class="text-right" style="text-align: center">{{$siswa->pukul_telat}} WIB</td>
                      <td class="text-right" style="text-align: center">{{$siswa->ket_sanksi}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <br>
                <br>
              </div>
              
      </section>
    </section>
</section>
	
</body>