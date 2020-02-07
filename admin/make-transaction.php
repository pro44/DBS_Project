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
                <h4 class="text-themecolor">Make a Transaction</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Transaction</li>
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
                        <h4 class="mb-0 text-white">Add an Item to Cart</h4>
                    </div>
                    <form id="transactionForm">
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Category</label>
                                            <select class="selectpicker" required="required" id="c_id" data-style="form-control btn-secondary">
                                                <option>Select Category</option>
                                                <?php foreach( $categories as $value ){ ?>
                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['category_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Item</label>
                                            <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="itemsContent">
                                                <option>Select Category First</option>
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
                                                <button type="submit" class="btn btn-success" id="add-item-to-cart-btn"> <i class="icon-plus"></i> Add to Cart</button>
                                                <button type="button" class="btn btn-dark">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Quantity</label>
                                            <select class="selectpicker" required="required" id="item_quantity" data-style="form-control btn-secondary">
                                                <option>Select Quantity</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                            </select>
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

        $(".select2").select2();

        $("#c_id").on('change', function() {
            var id = this.value;

            var form_data = new FormData(); // Create a FormData object
            form_data.append('c_id', id);

            $.ajax({
                url: 'get-items-ajax.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    if (response !== "0") {
                        $("#itemsContent").html(response);
                    } else {

                    }
                }
            });

        });

        $('#transactionForm').submit(function(e) {
            e.preventDefault();

            var item_id = $('#itemsContent').val();
            var item_quantity = $('#item_quantity').val();

            if( item_id > 0 && item_quantity > 0 ){
            
            var form_data = new FormData(); // Create a FormData object

            form_data.append('item_id', item_id); // Append all element in FormData  object 
            form_data.append('item_quantity', item_quantity);

            $.ajax({
                url: 'make-transaction-ajax.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    if (response !== "0") {
                        $.toast({
                            heading: 'Item Added',
                            text: 'Item added successfully to cart',
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            stack: 6
                        });
                    } else {
                        $.toast({
                            heading: 'Error',
                            text: 'Item was not added to cart.',
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 3500

                        });
                    }
                }
            });
                
            }else{
                 $.toast({
                            heading: 'Error',
                            text: 'Item was not added to cart.',
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 3500
            })}

        });
    });

</script>
