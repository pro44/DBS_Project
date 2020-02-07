<?php @$itemsActive = "active"; ?>
<!-- ============================================================== -->
<!-- Start Header -->
<!-- ============================================================== -->
<?php include 'header.php'; ?>
<!-- ============================================================== -->
<!-- End Header -->
<!-- ============================================================== -->
<?php if( isset($_GET['id']) && isset($_GET['c_id']) ){
                $id = $_GET['id'];
                $c_id = $_GET['c_id'];
                $item = $obj->getSingleData("items","id",$id);
                $selectedCategory = $obj->getSingleData("categories","id",$c_id);    
                $notSelectedCategories = $obj->getNotSelectedCategories($c_id);
              }
        ?>
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
                <h4 class="text-themecolor">Items</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Items</li>
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
                        <h4 class="mb-0 text-white">Update Item</h4>
                    </div>
                    <form id="updateItemForm">
                        <?php foreach( $item as $value ){ ?>
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Item Name</label>
                                            <input type="text" id="item_name" class="form-control" placeholder="Name" value="<?php echo $value['item_name']; ?>">
                                            <input type="hidden" id="id" value="<?php echo $value['id']; ?>">
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Price: $</label>
                                            <input type="number" id="item_price" class="form-control" required="required" value="<?php echo $value['item_price']; ?>" placeholder="$">
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Item Description</label>
                                            <textarea maxlength="32" minlength="4" class="form-control" rows="5" id="item_desc" placeholder="Max: 32 characters" required="required"><?php echo $value['item_desc']; ?></textarea>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Category</label>
                                            <select class="selectpicker" data-style="form-control btn-secondary" required="required" id="c_id">
                                                <?php foreach($selectedCategory as $k=>$val ){ ?>
                                                <optgroup label="Selected">
                                                    <option value="<?php echo $val['id']; ?>"><?php echo $val['category_name']; ?></option>
                                                </optgroup>
                                                <?php } ?>
                                                <optgroup label="Not Selected">
                                                <?php foreach($notSelectedCategories as $k=>$val ){ ?>
                                                    <option value="<?php echo $val['id'] ?>"><?php echo $val['category_name']; ?></option>
                                                <?php } ?>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <!--/span-->
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="selectpicker" required="required" id="status" data-style="form-control btn-secondary">
                                                <?php if( $value['status'] == 1 ){ ?>
                                                <option value="1" selected>Active</option>
                                                <option value="0">In-active</option>
                                                <?php }else{ ?>
                                                <option value="0" selected>In-active</option>
                                                <option value="1">Active</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">Image (800x900)</label>
                                            <div class="col-sm-12" id="imageDiv">
                                                <input type="hidden" id="oldImg" value="<?php echo $value['item_image']; ?>">
                                                <input type="file" name="file" id="image">
                                                <img src="../kusina/images/items/<?php echo $value['item_image']; ?>" class="img-responsive" id="tempImg">
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
                                                <button type="submit" class="btn btn-success" id="update-item-btn"><i class="fas fa-check"></i> Update</button>
                                                <button type="button" class="btn btn-dark">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
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

        $('#updateItemForm').submit(function(e) {
            e.preventDefault();


            var id = $('#id').val();
            var item_name = $('#item_name').val();
            var item_price = $('#item_price').val();
            var item_desc = $('#item_desc').val();
            var c_id = $('#c_id').val();
            var status = $('#status').val();
            var oldImg = $('#oldImg').val();
            var file_data = $('#image').prop('files')[0];
            
            var form_data = new FormData(); // Create a FormData object

            form_data.append('id', id);
            form_data.append('item_name', item_name); // Append all element in FormData  object 
            form_data.append('item_price', item_price);
            form_data.append('item_desc', item_desc);
            form_data.append('c_id', c_id);
            form_data.append('status', status);
            form_data.append('oldImg', oldImg);
            form_data.append('file', file_data);
            $.ajax({
                url: 'UpdateItemAjax.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    if (response !== "0") {
                        Swal.fire("Done!", "Item Updated Successfully", "success");
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    }
                }
            });
            //$('#imageDiv #image').val('');
            //$('#imageDiv img').prop('src', ''); /* Clear the input type file */
        });
    })

</script>
