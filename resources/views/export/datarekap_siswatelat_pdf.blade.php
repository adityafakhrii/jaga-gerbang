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
            color: inherit;"><b>JAGA <span style="color: #48cfad;">GERBANG</span></b></h1>
            <h3 style="margin-top: -20px;">Rekap Data Total Siswa Telat</h3>
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
                      <strong style="margin-right: 90px">Jumlah siswa :</strong> {{ $data_siswa->count() }} Siswa <br>
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
                      <th class="text-left" style="width:180px;text-align: center;">NAMA SISWA</th>
                      <th style="width:270px;text-align: center;">KELAS</th>
                      <th class="text-right" style="text-align: center">TOTAL TELAT</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; ?>
                    @foreach($data_siswa as $row)
                        <tr>
                          <td style="text-align: center;">{{$no++}}</td>
                          <td>{{$row->nama}}</td>
                          <td style="text-align: center;">{{$row->nama_kelas}}</td>
                          <td style="text-align: center;">{{$row->total}} Kali</td>
                          
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