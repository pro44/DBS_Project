<?php @$TransactionsActive = "active"; ?>
<!-- ============================================================== -->
<!-- Start Header -->
<!-- ============================================================== -->
<?php include 'header.php'; ?>
<!-- ============================================================== -->
<!-- End Header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<?php include 'left-sidebar.php'; ?>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- TRANSACTIONS PAGE CONTENT STARTS  -->
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
                <h4 class="text-themecolor">Invoice</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                    <button type="button" onclick="window.location='make-transaction.php'" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> New Transaction</button>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <?php if( isset( $_GET['invoice_id'] ) && ( $_GET['invoice_id'] != "0" && $_GET['invoice_id'] != "" ) ){
                    $temp = $_GET['invoice_id'];
                    $invoice_id = substr($temp, 10, 1);

                    $invoiceDetails = $obj->getCurrentInvoiceDetails($invoice_id);
                    $invoiceProductsDetails = $obj->getInvoiceProducts($invoice_id);
                    
        }?>
        <?php foreach( $invoiceDetails as $value ){ ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body printableArea">
                    <h3><b>INVOICE</b> <span class="pull-right">#<?php echo $value['id']; ?></span></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <?php $info = $obj->getInfoForInvoice(); 
                                foreach( $info as $val ){?>
                                <address>
                                    <h3> &nbsp;<b class="text-danger"><?php echo $val['name']; ?></b></h3>
                                    <p class="text-muted m-l-5"><?php echo $val['address']; ?></p>
                                </address>
                                <?php } ?>
                            </div>
                            <div class="pull-right text-right">
                                <p><b>Invoice Date :</b> <i class="ti-calendar"></i> <?php echo $value['invoice_date']; ?></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Item Name</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">Unit Cost</th>
                                            <th class="text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sn=0; $subTotal=0; foreach( $invoiceProductsDetails as $valzz ){ $sn++; ?>
                                        <tr>
                                            <td class="text-center"><?php echo $sn; ?></td>
                                            <td><?php echo $valzz['item_name']; ?></td>
                                            <td class="text-right"><?php echo $valzz['item_quantity']; ?></td>
                                            <td class="text-right">$<?php echo $valzz['item_price']; ?></td>
                                            <td class="text-right">$<?php echo $valzz['item_price']*$valzz['item_quantity']; ?></td>
                                        </tr>
                                        <?php $subTotal+= $valzz['item_price']*$valzz['item_quantity']; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <p>Sub - Total amount: $<?php echo $subTotal; ?></p>
                                <p>Tax (10%) : $<?php echo $subTotal/10; ?> </p>
                                <hr>
                                <h3><b>Total :</b>$<?php echo $value['total']; ?></h3>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="text-right">
                                <button class="btn btn-success disabled" type="submit"> <b><i class="ti-check"></i></b> Transaction </button>
                                <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<!-- TRANSACTIONS PAGE CONTENT ENDS  -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<?php include 'footer.php'; ?>
<!-- ============================================================== -->
<!-- End footer -->
<script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });

</script>
