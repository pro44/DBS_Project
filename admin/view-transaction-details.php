<?php @$transactionsActive = "active"; ?>
<!-- ============================================================== -->
<!-- Start Header -->
<!-- ============================================================== -->
<?php include 'header.php'; ?>
<!-- ============================================================== -->
<!-- End Header -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<?php include 'left-sidebar.php'; ?>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- SINGLE TRANSACTION DETAILS PAGE CONTENT STARTS  -->
<?php if( isset( $_GET['invoice_id'] ) && ( $_GET['invoice_id'] != "0" && $_GET['invoice_id'] != "" ) ){
                    $temp = $_GET['invoice_id'];
                    $invoice_id = substr($temp, 10, 1);
                    $transactionDateTotal = $obj->getSingleData("invoices","id",$invoice_id);
                    $transactionDetails = $obj->getSingleTransactionDetails($invoice_id);
}?>
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
       <?php foreach( $transactionDateTotal as $value ){ ?>
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">                
                <h4 class="text-themecolor">Invoice #<?php echo $invoice_id; ?> ($<?php echo $value['total']; ?>)</h4>     
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Transactions</li>
                    </ol>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table product-overview">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach( $transactionDetails as $value ){ ?>
                                    <tr>
                                        <td><img src="../kusina/images/items/<?php echo $value['item_image']; ?>" alt="iPhone" width="80"> </td>
                                        <td><?php echo $value['item_name']; ?></td>
                                        <td>$<?php echo $value['item_price']; ?></td>
                                        <td><?php echo $value['item_quantity']; ?></td>
                                        <td><?php echo $value['item_price']*$value['item_quantity']; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <h5 class="text-themecolor">Invoice Date: <strong><?php echo $value['invoice_date']; ?></strong></h5>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    <?php } ?>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- SINGLE TRANSACTION DETAILS PAGE CONTENT STARTS  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<?php include 'footer.php'; ?>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
