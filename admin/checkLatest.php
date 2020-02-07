<?php
<?php
include 'connection.php';
$obj = new db();

    $latestMessages = $obj->getLatestMessages();

    foreach( $latestMessages as $value ){ ?>
     
     
     
      <a href="view-message.php?id=<?php echo $value['id']; ?>">
          <div class="user-img">
              <img src="../assets/images/users/all.png" alt="user" class="img-circle"><span class="<?php if( $value['is_read'] == 0 ){ echo 'profile-status online pull-right'; }else{ echo 'profile-status busy pull-right';} ?>"></span>
          </div>
          <div class="mail-contnet">
              <h5><?php echo $value['name']; ?></h5>
            <span class="mail-desc"><?php echo $value['subject']; ?></span>
            <span class="time"><?php echo $value['date']; ?></span>
        </div>
      </a>
<?php
    } ?>