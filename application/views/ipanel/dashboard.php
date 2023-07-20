        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <style type="text/css">
          .box{
            min-height: 130px;
          }
    

        </style>
        <script src="<?= base_url();?>assets/ipanel/dist/js/baseurl.js"></script> 
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
        <!--  <script src="<?= base_url();?>assets/ipanel/dist/js/dashboard.js"></script> -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"></h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
              <!--   <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <h6 class="text-white">Dashboard</h6>
                            </div>
                        </div>
                    </div> -->

                      <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                               <!--  <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Site Analysis</h4>
                                        <h5 class="card-subtitle">Overview of Latest Month</h5>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <!-- column -->
                                    <div class="col-lg-9">
                                       <div id="chart" style="width:100%; height:300px;"></div> 
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-user m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5"><?= ($usercount)? $usercount : '0' ?></h5>
                                                   <small class="font-light">Total Users</small>
                                                </div>
                                            </div>
                                             <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5"><?= ($totalshop)? $totalshop : '0' ?></h5>
                                                   <small class="font-light">Total Shop</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-tag m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5"><?= ($totalorders)? $totalorders : '0' ?></h5>
                                                   <small class="font-light">Total Orders</small>
                                                </div>
                                            </div>
                                             <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-table m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5"><?= ($pedingorders)? $pedingorders : '0' ?></h5>
                                                   <small class="font-light">Pending Orders</small>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <!-- column -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                     

                
                
          </div>
      </div>
      

<script type="text/javascript">

    google.charts.load('current', { packages: ['line'] });
    google.charts.setOnLoadCallback(drawLineChart);

    function drawLineChart() {
        $.ajax({
            url: "<?= base_url()?>ipanel/dashboard/getdata",
            dataType: "json",
            type: "GET",
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                var arrSales = [['Month', 'collection']];    // Define an array and assign columns for the chart.

                // Loop through each data and populate the array.
                $.each(data, function (index, value) {
                    arrSales.push([value.Month, value.amount]);
                });
              
              console.log(arrSales);
              
                // Set chart Options.
                var options = {
                    vAxis: {format:'decimal'},

                    chart: {
                        title: 'Monthly Overview',
                        subtitle:'collection',
                        format: 'none'
                    },
                    axes: {
                        x: {
                            0: { side: 'bottom'}   // Use "top" or "bottom".
                        },

                    }
                };

                // Create DataTable and add the array to it.
                var figures = google.visualization.arrayToDataTable(arrSales)

                // Define the chart type (LineChart) and the container (a DIV in our case).
                var chart = new google.charts.Line(document.getElementById('chart'))

                // Draw the chart with Options.
                chart.draw(figures, google.charts.Line.convertOptions(options));
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert('Got an Error');
            }
        });
    }
</script>