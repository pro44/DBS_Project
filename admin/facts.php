<?php @$factsActive = "active"; ?>
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
        <!-- FACTS PAGE CONTENT STARTS  -->
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
                        <h4 class="text-themecolor">Facts</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Facts</li>
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
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Facts</h4>
                            </div>
                            <?php $facts = $obj->getMultiData("facts"); ?>
                            <?php foreach( $facts as $value ){  ?>
                            <div class="card-body">
                                <form id="factsForm" method="post" action="#">
                                    <div class="form-body">
                                        <h3 class="card-title">Update Facts</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Years of Experience</label>
                                                    <input type="number" id="years" value="<?php echo $value['years']; ?>" class="form-control" placeholder="Years of Experience">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Happy Customers</label>
                                                    <input type="number" id="customers" value="<?php echo $value['customers']; ?>" class="form-control" placeholder="Happy Customers">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Finished Projects</label>
                                                    <input type="number" id="projects" value="<?php echo $value['projects']; ?>" class="form-control" placeholder="Finished Projects">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Working Days</label>
                                                    <input type="number" id="days" value="<?php echo $value['days']; ?>" class="form-control" placeholder="Working Days">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="reset" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
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
        <!-- FACTS PAGE CONTENT ENDS  -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <?php include 'footer.php'; ?>
        <!-- ============================================================== -->
        <!-- End footer -->
   
       <script>
        $(document).ready(function(e){
            $('#factsForm').submit(function(e){
                e.preventDefault();
                var years       =   $('#years').val();
                var customers   =   $('#customers').val();
                var projects    =   $('#projects').val();
                var days        =   $('#days').val();
                $.ajax({
                            url: "updateFacts.php",
                            type: 'post',
                            data:{ years : years, customers : customers, projects : projects, days : days },
                            success: function (response) {
                                if(response !== 0){
                                    Swal.fire("Done!", "Facts Updated Successfully", "success");
                                }else{
                                    Swal.fire({
                                        type: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong!'
                                    })
                                }
                            }
                    })
            });
        })
    </script>