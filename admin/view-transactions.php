<?php @$transactionsActive = "active"; ?>
<!-- ============================================================== -->
<!-- Start Header -->
<!-- ============================================================== -->
<?php include 'header.php'; ?>
<!-- ============================================================== -->
<!-- End Header -->
<!-- ============================================================== -->
<!-- Fetching  Messages Starts -->
<!-- ============================================================== -->
<?php $transactions = $obj->getTransactions();?>
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
                <h4 class="text-themecolor">View All Transactions</h4>
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
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Transactions</h4>
                        <h6 class="card-subtitle">Recent Transactions</h6>
                        <div class="table-responsive" m-t-40"">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Invoice #</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sn = 0; foreach($transactions as $key=>$value): $sn++; ?>
                                    <tr>
                                        <td><?php echo $sn; ?></td>
                                        <td>
                                            Invoice #<?php echo $value['id']; ?>
                                        </td>
                                        <td>
                                            $<?php echo $value['total']; ?>
                                        </td>
                                        <td>
                                            <?php echo $value['invoice_date']; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-success" href="view-transaction-details.php?invoice_id=heiu87uh8t<?php echo $value['id']; ?>qioefdsdsbiffjnf"><i class="ti-eye"></i> View</a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                    <?php if( $sn == 0 ) {?>
                                    <tr style="text-align:center;">
                                        <td></td>
                                        <td></td>
                                        <td>No Messages!</td>
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
    if(isset($_POST['message_id'])){
        extract($_POST);
        $obj->delete("messages", $message_id);
    }

?>
