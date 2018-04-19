
     <!-- Optionally, you can add icons to the links -->
    <li><a href="<?php echo site_url("Dashboard");?>" ><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
    <li><a href="<?php echo site_url("Batik");?>" ><i class="fa fa-plane"></i><span>Batik</span></a></li>
    <li><a href="<?php echo site_url("Citilink");?>" ><i class="fa fa-rocket"></i><span>Citilink</span></a></li>
    <?php
    if($type==1){
    ?>
        <li><a href="<?php echo site_url("Users");?>" ><i class="fa fa-users"></i><span>Manage Users</span></a></li>
    <?php    
    }
    ?>
