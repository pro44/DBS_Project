<?php @$itemsActive = "active";
$addItemActive = "active";?>
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
                <h4 class="text-themecolor">Menu</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Menu</li>
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
                        <h4 class="mb-0 text-white">Add Menu Item</h4>
                    </div>
                    <form id="itemForm">
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Item Name</label>
                                            <input type="text" id="item_name" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Price: $</label>
                                            <input type="number" id="item_price" class="form-control" required="required" placeholder="$">
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Item Description</label>
                                            <textarea maxlength="32" minlength="4" class="form-control" rows="5" id="item_desc" placeholder="Max: 32 characters" required="required"></textarea>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Category</label>
                                            <select class="selectpicker" required="required" id="c_id" data-style="form-control btn-secondary">
                                                <?php foreach( $categories as $value ){ ?>
                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['category_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-actions">
                                            <div class="card-body">
                                                <button type="submit" class="btn btn-success" id="add-review-btn"> <i class="icon-plus"></i> Add</button>
                                                <button type="button" class="btn btn-dark">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">Image (800x800)</label>
                                            <div class="col-sm-12" id="imageDiv">
                                                <input type="file" name="file" accept="image/*" required="required" id="image">
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

        $('.selectpicker').selectpicker();

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
        //-------------

        $('#itemForm').submit(function(e) {
            e.preventDefault();
            
            var item_name = $('#item_name').val();
            var item_price = $('#item_price').val();
            var item_desc = $('#item_desc').val();
            var status = $('#status').val();
            var c_id = $('#c_id').val();
            var file_data = $('#image').prop('files')[0];

            var form_data = new FormData(); // Create a FormData object

            form_data.append('item_name', item_name); // Append all element in FormData  object 
            form_data.append('item_price', item_price);
            form_data.append('item_desc', item_desc);
            form_data.append('c_id', c_id);
            form_data.append('file', file_data);
            $.ajax({
                url: 'add-item-ajax.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    if (response !== 0) {
                        Swal.fire("Done!", "Item Added Successfully", "success");
                        $('#item_name').val('');
                        $('#item_price').val('');
                        $('#item_desc').val('');
                        $('#c_id').val('');
                        $('#imageDiv #image').val('');
                        $('#imageDiv img').prop('src', '');
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    }
                }
            });
            $('#imageDiv #image').val('');
            $('#imageDiv img').prop('src', ''); /* Clear the input type file */
        });
    })

</script>
