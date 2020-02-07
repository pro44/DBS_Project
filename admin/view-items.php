<?php @$itemsActive = "active";
@$viewItemsActive = "active"; ?>
<?php include 'header.php'; ?>
<!-- ============================================================== -->
<!-- End Header -->
<!-- ============================================================== -->
<!-- Fetching  ITEMS Starts -->
<!-- ============================================================== -->
<?php
    if(isset($_GET['c_id'])){
        $c_id = $_GET['c_id'];
    }
    $items = $obj->getItemsByCategory($c_id);
?>
<!-- ============================================================== -->
<!-- Fetching  ITEMS Ends -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<?php include 'left-sidebar.php'; ?>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- MENU ITEMS PAGE CONTENT STARTS  -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
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
                <h4 class="text-themecolor">Menu Items</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Menu</li>
                    </ol>
                    <button type="button" onclick="window.location='add-item.php'" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Info box Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <?php $sn=0; foreach( $items as $value){ $sn++;?>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="product-img">
                            <img src="../kusina/images/items/<?php echo $value['item_image']; ?>" style="border-radius:50%;">
                            <div class="pro-img-overlay"><a href="update-item.php?id=<?php echo $value['id']; ?>&c_id=<?php echo $value['c_id']; ?>" class="bg-info"><i class="ti-marker-alt"></i></a> <a href="#" class="bg-danger dlt-item" data-url="<?php echo $value['id']; ?>&<?php echo $c_id; ?>"><i class="ti-trash"></i></a></div>
                        </div>
                        <div class="product-text">
                            <span class="pro-price
                            <?php if( $sn==1 || $sn==5 || $sn==9 || $sn==13 || $sn==17 || $sn==21 ||
                                      $sn==25 || $sn==29 || $sn==33 || $sn==37 || $sn==41 || $sn==45 ||
                                     $sn==49 || $sn==53 || $sn==57 || $sn==60 ){echo 'bg-primary'; }else
                                    
                                    if( $sn==2 || $sn==6 || $sn==10 || $sn==14 || $sn==18 || $sn==22 ||
                                      $sn==26 || $sn==30 || $sn==34 || $sn==38 || $sn==42 || $sn==46 ||
                                       $sn==50 || $sn==54 || $sn==57 || $sn==61 ){echo 'bg-success'; }else
                                        
                                    if( $sn==3 || $sn==7 || $sn==11 || $sn==15 || $sn==19 || $sn==23 ||
                                      $sn==27 || $sn==31 || $sn==35 || $sn==39 || $sn==43 || $sn==47 || 
                                       $sn==51 || $sn==55 || $sn==58 || $sn==62 ){echo 'bg-info'; }else
                                        
                                    if( $sn==4 || $sn==8 || $sn==12 || $sn==16 || $sn==20 || $sn==24 ||
                                      $sn==28 || $sn==32 || $sn==36 || $sn==40 || $sn==44 || $sn==48 ||
                                       $sn==52 || $sn==56 || $sn==59 || $sn==63 ){echo 'bg-dark'; }
    
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         ?>">$<?php echo $value['item_price']; ?></span>
                            <h5 class="card-title m-b-0"><?php echo $value['item_name']; ?></h5>
                            <small class="text-muted db"><?php echo $value['item_desc']; ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->

<!-- ============================================================== -->
<!-- MENU ITEMS PAGE CONTENT ENDS  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<?php include 'footer.php'; ?>
<!-- ============================================================== -->
<!-- End footer -->

<?php
    if(isset($_POST['item_id'])){
        extract($_POST);
        $obj->delete("items", $item_id);
    }

?>
