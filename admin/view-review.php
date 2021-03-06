<?php @$reviewsActive = "active"; ?>
<!-- ============================================================== -->
<!-- Start Header -->
<!-- ============================================================== -->
<?php include 'header.php'; ?>
<!-- ============================================================== -->
<!-- End Header -->
<!-- ============================================================== -->
<!-- Fetching  Messages Starts -->
<!-- ============================================================== -->
<?php if( isset($_GET['id']) ){
                $id = $_GET['id'];
                $review = $obj->getSingleData("reviews","id",$id);
              }
        ?>
<!-- ============================================================== -->
<!-- Fetching  Messages Ends -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<?php include 'left-sidebar.php'; ?>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- MESSAGES PAGE CONTENT STARTS  -->
<!-- ============================================================== -->
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
                <h4 class="text-themecolor">Reviews</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Reviews</li>
                    </ol>
                    <button type="button" class="dlt-review btn btn-danger d-none d-lg-block m-l-15" data-url="<?php echo $id; ?>"><i class="ti-trash"></i> &nbsp;Delete</button>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="row">
                        <?php foreach( $review as $value ){ ?>
                        <div class="card-body p-t-0">
                            <div class="card b-all shadow-none">
                                <div class="card-body">
                                    <h3 class="card-title m-b-0"><?php echo $value['position'] ?></h3>
                                </div>
                                <div>
                                    <hr class="m-t-0">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex m-b-40">
                                        <div>
                                            <a href="javascript:void(0)"><img src="../kusina/images/review_images/<?php echo $value['image']; ?>" alt="review" width="40" class="img-circle"></a>
                                        </div>
                                        <div class="p-l-10">
                                            <h4 class="m-b-0"><?php echo $value['name'] ?></h4>
                                        </div>
                                    </div>
                                    <p><?php echo $value['review'] ?></p>
                                </div>
                                <div>
                                    <hr class="m-t-0">
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- MESSAGES PAGE CONTENT ENDS  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<?php include 'footer.php'; ?>
<!-- ============================================================== -->
<!-- End footer -->
