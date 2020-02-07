<?php @$tablesActive = "active"; ?>
<!-- ============================================================== -->
<!-- Start Header -->
<!-- ============================================================== -->
<?php include 'header.php'; ?>
<!-- ============================================================== -->
<!-- End Header -->
<!-- ============================================================== -->
<!-- Fetching  Categories Starts -->
<!-- ============================================================== -->
<?php $tables = $obj->getMultiData("tables");?>
<!-- ============================================================== -->
<!-- Fetching  Categories Ends -->
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
                <h4 class="text-themecolor">Menu Categories</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="mb-0 text-white">Add Table</h4>
                    </div>
                    <form id="tableForm">
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row pt-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Table Number</label>
                                            <input type="text" required="required" id="table_no" class="form-control" placeholder="Table Number">
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Table Capacity</label>
                                            <input type="number" min="2" max="20" required="required" id="table_capacity" class="form-control" placeholder="Table Capacity">
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-actions">
                                            <div class="card-body">
                                                <button type="submit" class="btn btn-success" id="add-table-btn"> <i class="icon-plus"></i> Add</button>
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
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Tables</h4>
                        <div class="table-responsive">
                            <table class="table color-table success-table">
                                <thead>
                                    <tr>
                                        <th>Table #</th>
                                        <th>Capacity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="CategoriesContent">
                                    <?php $sn = 0; foreach($tables as $key=>$value): $sn++; ?>
                                    <tr>
                                        <td>
                                            <?php echo $value['table_no']; ?>
                                        </td>
                                        <td>
                                            <?php echo $value['table_capacity']; ?>
                                        </td>
                                        <td>
                                            <a class="dlt-table btn btn-danger" data-url="<?php echo $value['id']; ?>" href="#"><i class="ti-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                    <?php if( $sn == 0 ) {?>
                                    <tr style="text-align:center;">
                                        <td></td>
                                        <td>No Categories!</td>
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

        $('#tableForm').submit(function(e) {
            e.preventDefault();

            var table_no = $('#table_no').val();
            var table_capacity = $('#table_capacity').val();
            
            var form_data = new FormData(); // Create a FormData object

            form_data.append('table_no', table_no);
            form_data.append('table_capacity', table_capacity);

            $.ajax({
                url: 'add-table-ajax.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    if (response !== "0") {
                        Swal.fire("Done!", "Table Added Successfully", "success").then(function(){
                            window.location="tables.php";
                        });
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


<?php
    if(isset($_POST['table_id'])){
        extract($_POST);
        $obj->delete("tables", $table_id);
    }
?>
