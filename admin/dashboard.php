<?php
    $invoicesTotal = $obj->getTotal("invoices");
    $reviewsTotal = $obj->getTotal("reviews");
    $messagesUnreadForData = $obj->getTotalUnreadForData();
    $messagesTotal = $obj->getTotal("messages");
?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Dashboard</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="icon-plus"></i> &nbsp;Transaction</button>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Info box Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <?php foreach( $messagesUnreadForData as $val ){ ?>
                        <div class="row p-t-10 p-b-10">
                            <!-- Column -->
                            <div class="col p-r-0">
                                <h1 class="font-light"><?php echo $val['unread']; ?></h1>
                                <h6 class="text-muted">Unread</h6>
                            </div>
                            <!-- Column -->

                            <div class="col text-right align-self-center">
                                <div data-label="<?php foreach( $messagesTotal as $value ){
    $percent = floor(100 - $val['unread']/$value['totalz']*100);
    if( $percent < 5 ){$percent = 5;}
    else if($percent > 10 && $percent < 15){$percent = 10;}
    else if($percent > 15 && $percent < 20){$percent = 15;}
    else if($percent > 20 && $percent < 25){$percent = 20;}
    else if($percent > 25 && $percent < 30){$percent = 25;}
    else if($percent > 30 && $percent < 35){$percent = 30;}
    else if($percent > 35 && $percent < 40){$percent = 35;}
    else if($percent > 40 && $percent < 45){$percent = 40;}
    else if($percent > 45 && $percent < 50){$percent = 45;}
    else if($percent > 50 && $percent < 55){$percent = 50;}
    else if($percent > 55 && $percent < 60){$percent = 55;}
    else if($percent > 60 && $percent < 65){$percent = 60;}
    else if($percent > 65 && $percent < 70){$percent = 65;}
    else if($percent > 70 && $percent < 75){$percent = 70;}
    else if($percent > 75 && $percent < 80){$percent = 75;}
    else if($percent > 80 && $percent < 85){$percent = 80;}
    else if($percent > 85 && $percent < 90){$percent = 85;}
    else if($percent > 90 && $percent < 95){$percent = 90;}
    else if($percent > 95 && $percent < 100){$percent = 95;}
    else if($percent == 100){$percent = 100;}
}  ?>" class="css-bar m-b-0 css-bar-primary css-bar-<?php echo $percent; ?>"><i class="mdi mdi-email"></i></div>
                            </div>

                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <?php foreach( $reviewsTotal as $val ){ ?>
                        <div class="row p-t-10 p-b-10">
                            <!-- Column -->
                            <div class="col p-r-0">
                                <h1 class="font-light"><?php echo $val['totalz']; ?></h1>
                                <h6 class="text-muted">Reviews</h6>
                            </div>
                            <!-- Column -->
                            <div class="col text-right align-self-center">
                                <div data-label="100%" class="css-bar m-b-0 css-bar-danger css-bar-100"><i class="mdi mdi-check-circle"></i></div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <?php foreach( $unreadMessages as $val ){ ?>
                        <div class="row p-t-10 p-b-10">
                            <!-- Column -->
                            <div class="col p-r-0">
                                <h1 class="font-light"><?php echo $val['total_unread']; ?></h1>
                                <h6 class="text-muted">Orders</h6>
                            </div>
                            <!-- Column -->
                            <div class="col text-right align-self-center">
                                <div data-label="100%" class="css-bar m-b-0 css-bar-warning css-bar-100"><i class="mdi mdi-briefcase-check"></i></div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <?php foreach( $invoicesTotal as $val ){ ?>
                        <div class="row p-t-10 p-b-10">
                            <!-- Column -->
                            <div class="col p-r-0">
                                <h1 class="font-light"><?php echo $val['totalz']; ?></h1>
                                <h6 class="text-muted">Invoices</h6>
                            </div>
                            <!-- Column -->
                            <div class="col text-right align-self-center">
                                <div data-label="100%" class="css-bar m-b-0 css-bar-info css-bar-100"><i class="mdi mdi-receipt"></i></div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!--row-->
        <!-- ============================================================== -->
        <!-- charts -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex m-b-40 align-items-center no-block">
                            <h5 class="card-title ">PRODUCT SALES</h5>
                            <div class="ml-auto">
                                <ul class="list-inline font-12">
                                    <li><i class="fa fa-circle text-cyan"></i> Iphone</li>
                                    <li><i class="fa fa-circle text-primary"></i> IMac</li>
                                </ul>
                            </div>
                        </div>
                        <div id="morris-area-chart2" style="height: 400px;"></div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-lg-4 col-md-12">
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ORDER STATS</h5>
                                <div id="morris-donut-chart" class="ecomm-donute"></div>
                                <ul class="list-inline m-t-30 text-center mb-1 d-flex">
                                    <li class="list-inline-item p-r-20">
                                        <h5 class="text-muted"><i class="fa fa-circle" style="color: #fb9678;"></i> Order</h5>
                                        <h4 class="m-b-0">8500</h4>
                                    </li>
                                    <li class="list-inline-item p-r-20">
                                        <h5 class="text-muted"><i class="fa fa-circle" style="color: #01c0c8;"></i> Pending</h5>
                                        <h4 class="m-b-0">3630</h4>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="text-muted"> <i class="fa fa-circle" style="color: #4F5467;"></i> Delivered</h5>
                                        <h4 class="m-b-0">4870</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- charts -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
