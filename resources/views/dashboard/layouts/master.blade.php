<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  <!-- Favicons -->
  <link href="{{asset('asset/img/favicon.png')}}" rel="icon">
  <link href="{{asset('asset/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{asset('asset/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!--external css-->
  <link href="{{asset('asset/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('asset/css/style-responsive.css')}}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;display: block;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;padding: 5px 5px 8px 5px;font: 10px arial, san serif;text-align: left;}</style>


</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    @include('dashboard.layouts.includes._header')
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    @include('dashboard.layouts.includes._sidebar')
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    @yield('content')
    <!--main content end-->
    <!--footer start-->
    @include('dashboard.layouts.includes._footer')
    <!--footer end-->
  </section>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{asset('asset/lib/jquery/jquery.min.js')}}"></script>

  <script src="{{asset('asset/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{asset('asset/lib/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{asset('asset/lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('asset/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <script src="{{asset('asset/lib/jquery.sparkline.js')}}"></script>
  <!--common script for all pages-->
  <script src="{{asset('asset/lib/common-scripts.js')}}"></script>
  <script type="text/javascript" src="{{asset('asset/lib/gritter/js/jquery.gritter.js')}}"></script>
  <script type="text/javascript" src="{{asset('asset/lib/gritter-conf.js')}}"></script>
  <!--script for this page-->
  <script src="{{asset('asset/lib/sparkline-chart.js')}}"></script>
  <script src="{{asset('asset/lib/zabuto_calendar.js')}}"></script>

  <div id="ascrail2000" class="nicescroll-rails" style="width: 3px; z-index: 1001; background: rgb(64, 64, 64); cursor: default; position: absolute; top: 0px; left: 207px; height: 640px; display: block; opacity: 0;">
    <div style="position: relative; top: 0px; float: right; width: 3px; height: 563px; background-color: rgb(78, 205, 196); background-clip: padding-box; border-radius: 10px;">
      
    </div>
  </div>
  <div id="ascrail2000-hr" class="nicescroll-rails" style="height: 3px; z-index: 1001; background: rgb(64, 64, 64); top: 637px; left: 0px; position: absolute; cursor: default; display: none; width: 207px; opacity: 0;">
    <div style="position: relative; top: 0px; height: 3px; width: 210px; background-color: rgb(78, 205, 196); background-clip: padding-box; border-radius: 10px;">
      
    </div>
  </div>

  <script type="text/javascript" src="{{asset('asset/lib/gritter/js/jquery.gritter.js')}}"></script>
  <script type="text/javascript" src="{{asset('asset/lib/gritter-conf.js')}}"></script>
  <script type="text/javascript" language="javascript" src="{{asset('asset/lib/advanced-datatable/js/jquery.js')}}"></script>
  



  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>

</body>
</html>