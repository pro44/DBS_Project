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
                <h4 class="text-themecolor">Recent Items</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15" onclick="window.location='make-transaction.php'"><i class="fa fa-plus-circle"></i> Add New Item</button>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Info box Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-md-9 col-lg-9">
                <div class="card">
                    <div class="card-header bg-info">
                        <?php $totalCartItems = $obj->getTotalCartItemsBySession(session_id());
                        foreach( $totalCartItems as $val ){
                        if($val['total']==0){@$isEmpty = true;}?>
                        <h5 class="m-b-0 text-white">Your Cart (<?php echo $val['total']; ?> items)</h5>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table product-overview transactionCartTable">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Item Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th style="text-align:center">Total</th>
                                        <th style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cartItems = $obj->getCartItemsBySession(session_id());
                                    foreach( $cartItems as $value ){?>
                                    <tr>
                                        <td width="150"><img src="../kusina/images/items/<?php echo $value['item_image']; ?>" alt="image" width="80"></td>
                                        <td width="550">
                                            <h5 class="font-500"><?php echo $value['item_name']; ?></h5>
                                        </td>
                                        <td id="tempPrice">$<?php echo $value['item_price']; ?></td>
                                        <td width="70">
                                            <input type="number" class="form-control quantity tempQuantity" placeholder="1" value="<?php echo $value['item_quantity']; ?>" min="1" max="10">
                                            <input type="hidden" class="item_id" value="<?php echo $value['item_id']; ?>">
                                        </td>
                                        <td width="150" align="center" class="font-500" class="tempEachTotal">$<?php echo $value['item_price']*$value['item_quantity']; ?></td>
                                        <td align="center">
                                            <a href="#" class="text-inverse dlt-transaction-cart-item" data-toggle="tooltip" title="" data-original-title="Delete" data-url="<?php echo $value['item_id']; ?>"><i class="ti-trash text-dark"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if( @$isEmpty === true){?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td align="center">
                                            <h4>Cart is Empty!</h4>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <hr>
                            <button class="btn btn-danger pull-right checkout-btn <?php if(@$isEmpty === true){echo 'disabled';} ?>" <?php if(@$isEmpty === true){echo 'disabled';} ?>><i class="fa fa fa-shopping-cart"></i> Checkout</button>
                            <button class="btn btn-dark btn-outline" onclick="window.location='make-transaction.php'"><i class="fa fa-arrow-left"></i> Continue shopping</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CART SUMMARY</h5>
                        <hr>
                        <small>Total Price</small>
                        <h2><span class="grandTotal">--</span></h2>
                        <hr>
                        <button class="btn btn-success checkout-btn <?php if(@$isEmpty === true){echo 'disabled';} ?>" <?php if(@$isEmpty === true){echo 'disabled';} ?>>Checkout</button>
                        <button class="btn btn-secondary btn-outline">Cancel</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">For Any Support</h5>
                        <hr>
                        <h4><i class="ti-mobile"></i> 9998979695 (Toll Free)</h4> <small>Please contact with us if you have any questions. We are avalible 24h.</small>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
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
    $(document).ready(function(e) {
        var total = 0;
        var total_items = $(".quantity").parents('tbody').children('tr').length;
        var parent = $(".quantity").parents('tbody');
        var i;
        
        if(total_items == 0){
            $(".grandTotal").html("-");

        }else{
        for (i = 1; i <= total_items; i++) {
            var pricez = parent.children('tr:nth-child(' + i + ')').children('td:nth-child(3)').html();

            var pricez = pricez.split('$');

            var price = pricez[1];

            var quantity = parent.children('tr:nth-child(' + i + ')').children('td:nth-child(4)').children('input').val();

            var sub_total = quantity * price;

            sub_total = parseInt(sub_total);

            parent.children('tr:nth-child(' + i + ')').children('td:nth-child(5)').html("$" + sub_total);

            total = parseInt(total) + parseInt(sub_total);
        }$(".grandTotal").html("$" + total + " + Tax(10%)");

        }

        
        $(".tempQuantity").on('change', function() {
            var newQuantity = $(this).val();
            var item_id = $(this).parents('td').children('.item_id').val();

            var form_data = new FormData(); // Create a FormData object
            form_data.append('item_id', item_id);
            form_data.append('newQuantity', newQuantity);

            $.ajax({
                url: 'updateItemQuantityAjax.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    if (response !== "0") {
                        $.toast({
                            heading: 'Quantity Updated',
                            text: 'Quantity successfully updated',
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            stack: 6
                        });
                    }
                }
            });

            var total = 0;
            var total_items = $(".quantity").parents('tbody').children('tr').length;
            var parent = $(".quantity").parents('tbody');
            var i;

            for (i = 1; i <= total_items; i++) {
                var pricez = parent.children('tr:nth-child(' + i + ')').children('td:nth-child(3)').html();

                var pricez = pricez.split('$');

                var price = pricez[1];

                var quantity = parent.children('tr:nth-child(' + i + ')').children('td:nth-child(4)').children('input').val();

                var sub_total = quantity * price;

                sub_total = parseInt(sub_total);

                parent.children('tr:nth-child(' + i + ')').children('td:nth-child(5)').html("$" + sub_total);

                total = parseInt(total) + parseInt(sub_total);
            }

            $(".grandTotal").html("$" + total + " + Tax(10%)");

        });



        //FINAL ORDER & GENERATE INVOICE
        $(".checkout-btn").click(function() {
            var totalAmount = $(".grandTotal").html();
            var temp = totalAmount.split(' ');
            var temp2 = temp[0];
            var temp3 = temp2.split('$');
            var temp4 = temp3[1];

            temp4 = parseInt(temp4) + parseInt(temp4 * 10 / 100);

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'mr-2 btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false,
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "Do you want to make payment?",
                type: 'info',
                showCancelButton: true,
                confirmButtonText: 'Yes, Checkout!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'POST',
                        data: {
                            total: temp4
                        },
                        url: "make-transaction-invoiceAJAX.php",
                        success: function(response) {
                            swalWithBootstrapButtons.fire(
                                'Transaction Successful!',
                                'Your Transaction has been made.',
                                'success'
                            ).then(function() {
                                window.location = "transaction-invoice.php?invoice_id=heiu87uh8t" + response + "qioefdsdsbiffjnf";
                            })
                        }
                    });

                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Checkout cant be done :)',
                        'error'
                    )
                }

            });


        })


        //FINAL ORDER & GENERATE INVOICE

        //DELETE TRANSACTION-CART-ITEM CODE
        $(".dlt-transaction-cart-item").click(function() {
            var id = $(this).attr('data-url');
            alert(id);

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'mr-2 btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'POST',
                        data: {
                            transaction_cart_item_id: id
                        },
                        url: "delete-transaction-cart-item-ajax.php",
                        success: function(data) {
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'Item has been deleted.',
                                'success'
                            ).then(function() {
                                window.location = "transaction-cart.php";
                            })
                        }
                    });

                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Item is safe :)',
                        'error'
                    )
                }
            })
        });
        //DELETE TRANSACTION-CART-ITEM CODE




    });

</script>