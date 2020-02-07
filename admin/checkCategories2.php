<?php
include 'connection.php';
$obj = new db();
    $categories = $obj->getMultiData("categories");?>
    
<?php $sn = 0; foreach($categories as $key=>$value): $sn++; ?>
                                    <tr>
                                        <td><?php echo $sn; ?></td>
                                        <td>
                                            <?php echo $value['category_name']; ?>
                                        </td>
                                        <td>
                                            <a class="dlt-category btn btn-outline-danger" data-url="<?php echo $value['id']; ?>" href="#"><i class="ti-trash"></i> Delete</a>
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