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
                <h4 class="text-themecolor">Basic Information</h4>
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
                        <h4 class="mb-0 text-white">Update Basic Information</h4>
                    </div>
                    <form id="updateBasicInfoForm">
                        <?php $basicInfo = $obj->getMultiData("basic_info"); ?>
                        <?php foreach( $basicInfo as $value ){ ?>
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Name</label>
                                            <input type="text" id="name" class="form-control" placeholder="Name" value="<?php echo $value['name']; ?>">
                                            <input type="hidden" id="id" value="<?php echo $value['id']; ?>">
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Title</label>
                                            <input type="text" id="title" class="form-control" required="required" placeholder="Title" value="<?php echo $value['title']; ?>">
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Twitter</label>
                                            <input type="text" id="twitter" class="form-control" placeholder="Username" value="<?php echo $value['twitter']; ?>">                                            
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Facebook</label>
                                            <input type="text" id="facebook" class="form-control" required="required" placeholder="username" value="<?php echo $value['facebook']; ?>">
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Footer Description</label>
                                            <textarea maxlength="255" minlength="4" class="form-control" rows="5" id="footer_desc" placeholder="Max: 250 characters" required="required"><?php echo $value['footer_desc']; ?></textarea>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Instagram</label>
                                            <input type="text" id="instagram" class="form-control" required="required" placeholder="Username" value="<?php echo $value['instagram']; ?>">
                                        </div>
                                    </div>

                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-actions">
                                            <div class="card-body">
                                                <button type="submit" class="btn btn-success" id="update-chef-btn"><i class="fas fa-check"></i> Update</button>
                                                <button type="button" class="btn btn-dark">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">Image (85x24)</label>
                                            <div class="col-sm-12" id="imageDiv">
                                                <input type="hidden" id="oldImg" value="<?php echo $value['image']; ?>">
                                                <input type="file" name="file" id="image">
                                                <img src="../kusina/logo/<?php echo $value['image']; ?>" class="img-responsive" id="tempImg">
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



        $("#image").change(function(e) {

            $("#imageDiv img").hide();

            for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

                var file = e.originalEvent.srcElement.files[i];

                var img = document.createElement("img");
                var reader = new FileReader();
                reader.onloadend = function() {
                    img.src = reader.result;
                }
                reader.readAsDataURL(file);
                $("#image").after(img);
            }
        });

        $('#updateBasicInfoForm').submit(function(e) {
            e.preventDefault();


            var id = $('#id').val();
            var name = $('#name').val();
            var title = $('#title').val();
            var twitter = $('#twitter').val();
            var facebook = $('#facebook').val();
            var instagram = $('#instagram').val();
            var footer_desc = $('#footer_desc').val();
            var oldImg = $('#oldImg').val();
            var file_data = $('#image').prop('files')[0];

            var form_data = new FormData(); // Create a FormData object

            form_data.append('id', id);
            form_data.append('name', name); // Append all element in FormData  object 
            form_data.append('title', title);
            form_data.append('twitter', twitter);
            form_data.append('facebook', facebook);
            form_data.append('instagram', instagram);
            form_data.append('footer_desc', footer_desc);
            form_data.append('oldImg', oldImg);
            form_data.append('file', file_data);
            $.ajax({
                url: 'UpdateBasicInfoAjax.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    if (response !== "0") {
                        Swal.fire("Done!", "Basic Inforamtion Updated Successfully", "success");
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
