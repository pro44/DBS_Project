<?php
include 'connection.php';
$obj = new db();

    $unreadMessages = $obj->getUnread();
    $latestMessages = $obj->getLatestMessages();
?>
         <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                                <div class="notify">
                                <?php foreach( $unreadMessages as $value ){
                                  if( $value['total_unread'] > 0){ ?>
                                    <span class="heartbit"></span>
                                    <span class="point"></span>
                                    <?php } } ?>
                                </div>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 
                                                               <?php foreach( $unreadMessages as $value){ ?>
                                                               <?php if( $value['total_unread'] == 0 ){echo "no";}
                                                                      else{ echo $value['total_unread']; } ?>
                                                                <?php } ?> new messages
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-center" id="latestMessagesContent">
                                           <?php foreach( $latestMessages as $value ){ ?>
                                            <!-- Message -->
                                            <a href="view-message.php?id=<?php echo $value['id']; ?>">
                                                <div class="user-img"> <img src="../assets/images/users/all.png" alt="user" class="img-circle"> <span class="<?php if( $value['is_read'] == 0 ){ echo 'profile-status online pull-right'; }else{ echo 'profile-status busy pull-right';} ?>"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5><?php echo $value['name']; ?></h5> <span class="mail-desc"><?php echo $value['subject']; ?></span> <span class="time"><?php echo $value['date']; ?></span> </div>
                                            </a>
                                            <!-- Message -->
                                            <?php } ?>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="view-messages.php"> <strong>See all messages</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>