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
                <h4 class="text-themecolor">Contact Information</h4>
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
                        <h4 class="mb-0 text-white">Update Contact Page Information</h4>
                    </div>
                    <form id="updateContactPageInfoForm">
                        <?php $contactPageInfo = $obj->getMultiData("contact_info"); ?>
                        <?php foreach( $contactPageInfo as $value ){ ?>
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input type="text" id="email" class="form-control" placeholder="Email" value="<?php echo $value['email']; ?>">
                                            <input type="hidden" id="id" value="<?php echo $value['id']; ?>">
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Website</label>
                                            <input type="text" id="website" class="form-control" required="required" placeholder="Website" value="<?php echo $value['website']; ?>">
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address:</label>
                                            <textarea class="form-control" rows="5" id="address" placeholder="Max: 250 characters"><?php echo $value['address']; ?></textarea>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Phone</label>
                                            <input type="text" id="phone" class="form-control" required="required" placeholder="Format: + XXXX XXXX XX" value="<?php echo $value['phone']; ?>">
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
                        <?php } ?>
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

        $('#updateContactPageInfoForm').submit(function(e) {
            e.preventDefault();


            var id = $('#id').val();
            var email = $('#email').val();
            var website = $('#website').val();
            var phone = $('#phone').val();
            var address = $('#address').val();

            var form_data = new FormData(); // Create a FormData object

            form_data.append('id', id);
            form_data.append('email', email); // Append all element in FormData  object 
            form_data.append('website', website);
            form_data.append('phone', phone);
            form_data.append('address', address);
            $.ajax({
                url: 'UpdateContactPageInfoAjax.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    if (response !== "0") {
                        Swal.fire("Done!", "Contact Page Inforamtion Updated Successfully", "success");
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
    })

</script>
