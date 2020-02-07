<?php @$messagesActive = "active"; ?>
        <!-- ============================================================== -->
        <!-- Start Header -->
        <!-- ============================================================== -->
        <?php include 'header.php'; ?>
        <!-- ============================================================== -->
        <!-- End Header -->
        <!-- ============================================================== -->
        <!-- Fetching  Messages Starts -->
        <!-- ============================================================== -->
        <?php $messages = $obj->getMessages();?>
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
                        <h4 class="text-themecolor">Messages</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Messages</li>
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
                                <h4 class="card-title">Messages</h4>
                                <h6 class="card-subtitle">Recent Messages</h6>
                                <div class="table-responsive">
                                    <table class="table color-table success-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Subject</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $sn = 0; foreach($messages as $key=>$value): $sn++; ?>
                                            <tr>
                                                <td><?php echo $sn; ?></td>
                                                <td>
                                                    <?php echo $value['name']; ?>
                                                    <?php if($value['is_read'] == 0){ ?>
                                                        <span class="badge badge-success"><h6 class="mt-0 mb-0">New</h6></span>
                                                    <?php } ?>
                                                    </td>
                                                <td>
                                                    <?php echo $value['subject']; ?>
                                                </td>
                                                <td>                                                
                                                    <a class="btn btn-outline-success" href="view-message.php?id=<?php echo $value['id']; ?>"><i class="ti-eye"></i> View</a>                                       
                                                    <a class="dlt-message btn btn-outline-danger" data-url="<?php echo $value['id']; ?>" href="#"><i class="ti-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                            <?php if( $sn == 0 ) {?>
                                                <tr style="text-align:center;">
                                                <td></td><td></td>
                                                <td>No Messages!</td>
                                                <td></td><td></td>
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