<?php @$chefsActive = "active"; ?>
<!-- ============================================================== -->
<!-- Start Header -->
<!-- ============================================================== -->
<?php include 'header.php'; ?>
<!-- ============================================================== -->
<!-- End Header -->
<!-- ============================================================== -->
<!-- Fetching  Messages Starts -->
<!-- ============================================================== -->
<?php $chefs = $obj->getMultiData("chefs");?>
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
                <h4 class="text-themecolor">Chefs</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Chefs</li>
                    </ol>
                    <button onclick="window.location='add-chef.php'" type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="icon-plus"></i> &nbsp;Add Chef</button>
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
                    <div class="card-body">
                        <h4 class="card-title">Chefs</h4>
                        <h6 class="card-subtitle">Our Master Chefs</h6>
                        <div class="table-responsive">
                            <table class="table color-table success-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sn = 0; foreach($chefs as $key=>$value): $sn++; ?>
                                    <tr>
                                        <td><?php echo $sn; ?></td>
                                        <td>
                                            <?php echo $value['name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $value['title']; ?>
                                        </td>
                                        <td>
                                            <img src="../kusina/images/chefs/<?php echo $value['image']; ?>" class="img-responsive" width="70">
                                        </td>
                                        <td>
                                            <a class="btn btn-warning" href="update-chef.php?id=<?php echo $value['id']; ?>"><i class="icon-note"></i> Update</a>
                                            <a class="btn btn-danger dlt-chef" data-url="<?php echo $value['id']; ?>" href="#"><i class="ti-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                    <?php if( $sn == 0 ) {?>
                                    <tr style="text-align:center;">
                                        <td></td>
                                        <td></td>
                                        <td>No Chefs!</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
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

<?php
    if(isset($_POST['chef_id'])){
        extract($_POST);
        $obj->delete("chefs", $chef_id);
    }

?>
