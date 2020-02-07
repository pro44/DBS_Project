<?php @$settingsActive = "active"; ?>
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
<!-- CHEF PAGE CONTENT STARTS  -->
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
                <h4 class="text-themecolor">Open Hours</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Settings</li>
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
                        <h4 class="mb-0 text-white">Update Open Hours</h4>
                    </div>
                    <form id="updateOpenHoursForm">
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Monday ( From <i class="icon-clock"></i>  &nbsp;--&nbsp; To <i class="icon-clock"></i> )</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group clockpicker">
                                                        <input type="text" id="mon_from" required="required" class="form-control" value="09:30">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="icon-clock"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group clockpicker">
                                                        <input type="text" id="mon_to" required="required" class="form-control" value="09:30">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="icon-clock"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Thursday ( From <i class="icon-clock"></i>  &nbsp;--&nbsp; To <i class="icon-clock"></i> )</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group clockpicker">
                                                        <input type="text" id="thurs_from" required="required" class="form-control" value="09:30">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="icon-clock"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group clockpicker">
                                                        <input type="text" id="thurs_to" required="required" class="form-control" value="09:30">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="icon-clock"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Tuesday ( From <i class="icon-clock"></i>  &nbsp;--&nbsp; To <i class="icon-clock"></i> )</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group clockpicker">
                                                        <input type="text" id="tues_from" required="required" class="form-control" value="09:30">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="icon-clock"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group clockpicker">
                                                        <input type="text" id="tues_to" class="form-control" value="09:30">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="icon-clock"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Friday ( From <i class="icon-clock"></i>  &nbsp;--&nbsp; To <i class="icon-clock"></i> )</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group clockpicker">
                                                        <input type="text" id="fri_from" required="required" class="form-control" value="09:30">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="icon-clock"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group clockpicker">
                                                        <input type="text" id="fri_to" required="required" class="form-control" value="09:30">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="icon-clock"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Wednesday ( From <i class="icon-clock"></i>  &nbsp;--&nbsp; To <i class="icon-clock"></i> )</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group clockpicker">
                                                        <input type="text" id="wed_from" required="required" class="form-control" value="09:30">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="icon-clock"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group clockpicker">
                                                        <input type="text" id="wed_to" required="required" class="form-control" value="09:30">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="icon-clock"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Saturday ( From <i class="icon-clock"></i>  &nbsp;--&nbsp; To <i class="icon-clock"></i> )</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group clockpicker">
                                                        <input type="text" id="sat_from" required="required" class="form-control" value="09:30">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="icon-clock"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group clockpicker">
                                                        <input type="text" id="sat_to" required="required" class="form-control" value="09:30">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="icon-clock"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-actions">
                                            <div class="card-body">
                                                <button type="submit" class="btn btn-success" id="update-contact-page-info-btn"><i class="fas fa-check"></i> Update</button>
                                                <button type="button" class="btn btn-dark">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                            </div>
                        </div>
                    </form>
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
<!-- CHEF PAGE CONTENT ENDS  -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<?php include 'footer.php'; ?>
<!-- ============================================================== -->
<!-- End footer -->

<script>
    $(document).ready(function(e) {
       
        $('.clockpicker').clockpicker({
            donetext: 'Done',
        }).find('input').change(function() {
            console.log(this.value);
        });

        $('#updateOpenHoursForm').submit(function(e) {
            e.preventDefault();
            
            var mon_from = $('#mon_from').val();
            var mon_to = $('#mon_to').val();
            var tues_from = $('#tues_from').val();
            var tues_to = $('#tues_to').val();
            var wed_from = $('#wed_from').val();
            var wed_to = $('#wed_to').val();
            var thurs_from = $('#thurs_from').val();
            var thurs_to = $('#thurs_to').val();
            var fri_from = $('#fri_from').val();
            var fri_to = $('#fri_to').val();
            var sat_from = $('#sat_from').val();
            var sat_to = $('#sat_to').val();
            
            var form_data = new FormData(); // Create a FormData object

            form_data.append('mon_from', mon_from); // Append all element in FormData  object 
            form_data.append('mon_to', mon_to);
            form_data.append('tues_from', tues_from);
            form_data.append('tues_to', tues_to);
            form_data.append('wed_from',wed_from);
            form_data.append('wed_to',wed_to);
            form_data.append('thurs_from',thurs_from);
            form_data.append('thurs_to',thurs_to);
            form_data.append('fri_from',fri_from);
            form_data.append('fri_to',fri_to);
            form_data.append('sat_from',sat_from);
            form_data.append('sat_to',sat_to);
            $.ajax({
                url: 'UpdateOpenHoursAjax.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    if (response !== "0") {
                        Swal.fire("Done!", "Open Hours Updated Successfully", "success");
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    }
                }
            });
            
        });
    });

</script>
