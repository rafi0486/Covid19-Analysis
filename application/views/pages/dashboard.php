<?php
    header("Refresh: 300;url='".base_url()."'");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Covid19</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?=  base_url("assets/theme/")?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=  base_url("assets/theme/")?>assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?=  base_url("assets/theme/")?>assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?=  base_url("assets/theme/")?>assets/images/favicon.png" />
    <style>
        .card .card-body{
            padding:.4em !important;
        }
        .content-wrapper{
                        padding:1.4em !important;

        }
        .grid-margin{
            margin-bottom: .4rem !important;
        }
    </style>
  </head>
  <body class="sidebar-icon-only">
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="<?=base_url()?>"><img src="<?=  base_url("assets/theme/")?>assets/images/logo.svg?v=1" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="<?=base_url()?>"><img src="<?=  base_url("assets/theme/")?>assets/images/logo-mini.svg?v=1" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
<!--            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>-->
          </div>
          <ul class="navbar-nav navbar-nav-right">
            
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <!--
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
                <span class="count-symbol bg-warning"></span>
              </a>
               
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                    <p class="text-gray mb-0"> 1 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                    <p class="text-gray mb-0"> 15 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face3.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                    <p class="text-gray mb-0"> 18 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">4 new messages</h6>
              </div>
              
            </li>
                  -->
            <!--
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count-symbol bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Notifications</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi mdi-calendar"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                    <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="mdi mdi-settings"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                    <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="mdi mdi-link-variant"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                    <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">See all notifications</h6>
              </div>
            </li>
            -->
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-format-line-spacing"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>">
                <span class="menu-title">Home</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
         
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
<!--            <div class="row" id="proBanner">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                  <p>Covid19 - Summary</p>
                  
                </span>
              </div>
            </div>-->
              <?php
              foreach ($dash as $world){
                  
                  ?>
              <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> <?=$world['title']?>  </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                      <span></span>Source (<a target="_blank" href="https://www.worldometers.info/coronavirus">worldometers</a>)<i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="<?=  base_url("assets/theme/")?>assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-1">Total Cases <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-2"><?=  number_format($world['today']->total_cases)?></h2>
                    <h6 class="card-text"><?php
                        echo "Last Day :".number_format($world['today']->new_cases)."";
                        $daydif=$world['today']->new_cases-$world['prevday']->new_cases;
                            echo "<br/>";
                        echo "Prev. Day :".number_format($world['prevday']->new_cases)."<br/>";

                        echo "Change:";
                        if($daydif>0){
                            echo "      +".number_format($daydif)." ";
                        }else{
                            echo " ".number_format($daydif)." ";
                        }
                                               // echo "<br/>";

                        $perinc=round(((($daydif)/$world['prevday']->new_cases)*100),2);
                       
                           echo "($perinc%)<br/>";
                        
                                            
                        
                        $totaldif=$world['today']->total_cases-$world['today']->new_cases;
                        $perinc=round(((($world['today']->total_cases-$totaldif)/$world['today']->total_cases)*100),2);
                       
                           echo number_format($perinc,2)."% of Total";
                        
                    ?>
                    </h6>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="<?=  base_url("assets/theme/")?>assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-1">Active Cases <i class="mdi mdi-hospital mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-2"><?=  number_format($world['today']->active_cases)?></h2>
                    <h6 class="card-text"><?php
                       
                        $totaldif=$world['today']->total_cases-$world['today']->active_cases;
                        $perinc=round(((($world['today']->total_cases-$totaldif)/$world['today']->total_cases)*100),0);
                     
                           echo number_format($perinc)."% of Total";
                        
                    ?>
                    </h6>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="<?=  base_url("assets/theme/")?>assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-1">Recovered <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-2"><?=  number_format($world['today']->total_recovered)?></h2>
                    <h6 class="card-text"><?php
                        
                        
                        $totaldif=$world['today']->total_cases-$world['today']->total_recovered;
                        $perinc=round(((($world['today']->total_cases-$totaldif)/$world['today']->total_cases)*100),0);
                      
                           echo $perinc."% of Total";
                        
                    ?>
                    </h6>
                  </div>
                </div>
              </div>
                <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="<?=  base_url("assets/theme/")?>assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-1">Total Deaths <i class="mdi mdi-file-excel-box mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-2"><?= number_format($world['today']->total_deaths)?></h2>
                    <h6 class="card-text"><?php
                       echo "Last Day: ".$world['today']->new_deaths."<br/>";
                        $totaldif=$world['today']->total_cases-$world['today']->total_deaths;
                        $perinc=round(((($world['today']->total_cases-$totaldif)/$world['today']->total_cases)*100),0);
                      
                           echo "$perinc% of Total";
                        
                    ?>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
              <?php
              }
              
              ?>
            
              
            <div class="row">
                <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active float-right" aria-current="page">
                      <span></span>Source (<a target="_blank" href="https://covidout.in">covidout.in</a>)<i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
             
                <div class="col-lg-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Cumulative Trend</h4>
                    <p>From 30 January 2020 to Today</p>
                    <canvas id="cumulateTrend" style="max-height:250px"></canvas>
                  </div>
                </div>
              </div>
             <div class="col-lg-5 grid-margin stretch-card" >
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Cumulative Trend</h4>
                    <p>Last 7 Days</p>
                    <canvas id="cumulateTrend7Days" style="max-height:250px"></canvas>
                  </div>
                </div>
              </div>
            </div>
<!--
            <div class="row">
              
              <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Traffic Sources</h4>
                    <canvas id="traffic-chart" style="max-height:250px;"> </canvas>
                    <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Recent Tickets</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Assignee </th>
                            <th> Subject </th>
                            <th> Status </th>
                            <th> Last Update </th>
                            <th> Tracking ID </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <img src="assets/images/faces/face1.jpg" class="mr-2" alt="image"> David Grey </td>
                            <td> Fund is not recieved </td>
                            <td>
                              <label class="badge badge-gradient-success">DONE</label>
                            </td>
                            <td> Dec 5, 2017 </td>
                            <td> WD-12345 </td>
                          </tr>
                          <tr>
                            <td>
                              <img src="assets/images/faces/face2.jpg" class="mr-2" alt="image"> Stella Johnson </td>
                            <td> High loading time </td>
                            <td>
                              <label class="badge badge-gradient-warning">PROGRESS</label>
                            </td>
                            <td> Dec 12, 2017 </td>
                            <td> WD-12346 </td>
                          </tr>
                          <tr>
                            <td>
                              <img src="assets/images/faces/face3.jpg" class="mr-2" alt="image"> Marina Michel </td>
                            <td> Website down for one week </td>
                            <td>
                              <label class="badge badge-gradient-info">ON HOLD</label>
                            </td>
                            <td> Dec 16, 2017 </td>
                            <td> WD-12347 </td>
                          </tr>
                          <tr>
                            <td>
                              <img src="assets/images/faces/face4.jpg" class="mr-2" alt="image"> John Doe </td>
                            <td> Loosing control on server </td>
                            <td>
                              <label class="badge badge-gradient-danger">REJECTED</label>
                            </td>
                            <td> Dec 3, 2017 </td>
                            <td> WD-12348 </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Recent Updates</h4>
                  
                  </div>
                </div>
              </div>
            </div>

-->
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Latest Cases</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> City </th>
                            <th> Status </th>
                            <th> Conf. Date </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($latest as $row){
                                   // var_dump($row);
                                    ?>
                            
                            <tr>
                            <td> <?=$row->case_id?> </td>
                            <td> <?php
                                if($row->city){
                                    echo $row->city.",".$row->state;
                                }else{
                                    echo $row->state;
                                }
                                
                                if($row->transmission_type=="Imported"){
                                    echo ' <i class="mdi mdi-airplane-landing"></i>';
                                }else if($row->transmission_type=="Local"){
                                    echo ' <i class="mdi mdi-home-map-marker"></i>';
                                }
                            
                                
                                if($row->nationality=="Indian"){
                                    echo ' <i class="mdi mdi-flag badge-gradient-success"></i>';
                                }
                            
                            ?></td>
                            <td> <?=$row->status?>
                            </td>
                            <td> <?=$row->confirmed_on?></td>
                            
                          </tr>
                            <?php
                                }
                            ?>
     
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <!--<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>-->
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                  <span>Inspired by&nbsp;</span><a target="_blank" href="https://co.vid19.sg/">Upcode</a>
              </span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?=  base_url("assets/theme/")?>assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?=  base_url("assets/theme/")?>assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?=  base_url("assets/theme/")?>assets/js/off-canvas.js"></script>
    <script src="<?=  base_url("assets/theme/")?>assets/js/hoverable-collapse.js"></script>
    <script src="<?=  base_url("assets/theme/")?>assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    
    <script src="<?=  base_url("assets/theme/")?>assets/js/chart.js"></script>
    <script src="<?=  base_url("assets/theme/")?>assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
    <script>
        var coloR = [];

         var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
         };

         
      var options = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }],
   xAxes: [{
                display: false  
            }]
    },
    tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
    legend: {
      display: false,
      scaleLabel: {
							display: true,
							labelString: 'Value'
						}
    },
    elements: {
      point: {
        radius: 3
      }
    },
     responsive: true,
    maintainAspectRatio: false

  };
 
       var data = {
    labels: <?=json_encode(array_column($cumulatetrend,'label'))?>,
    datasets: [{
      label: '# of cases',
      data: <?=json_encode(array_column($cumulatetrend,'val'))?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)'
      ],
      borderWidth: 1,
      fill: true
    }]
  };   
   var data7days = {
    labels: <?=json_encode(array_column($last7cumulatetrend,'label'))?>,
    datasets: [{
      label: '# of cases',
      data: <?=json_encode(array_column($last7cumulatetrend,'val'))?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)'
      ],
      borderWidth: 1,
      fill: true
    }]
  };   
     if ($("#cumulateTrend").length) {
        var cumulateTrendCanvas = $("#cumulateTrend").get(0).getContext("2d");
        var cumulateTrend = new Chart(cumulateTrendCanvas, {
          type: 'line',
          data: data,
          options: options
        });
      }
  
     if ($("#cumulateTrend7Days").length) {
        var cumulateTrendCanvas7Days = $("#cumulateTrend7Days").get(0).getContext("2d");
        var cumulateTrend7Days = new Chart(cumulateTrendCanvas7Days, {
          type: 'line',
          data: data7days,
          options: options
        });
      }
       if ($("#traffic-chart").length) {
       
    var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						5,10,15
					],
					backgroundColor: [
						'red','green','yellow'
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Red',
					'Orange',
					'Yellow'
				]
			},
			options: {
				responsive: true,
                                    maintainAspectRatio: false,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'Chart.js Doughnut Chart'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};

               var ctx = $("#traffic-chart").get(0).getContext("2d");

            var myDoughnutChart = new Chart(ctx, config);  
    }
    
       
    </script>
  </body>
</html>
</body>

</html>


