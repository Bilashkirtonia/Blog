<?php include"../database/session.php";
     Session::checkSession();
?> 
 
<header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo"><b>DASH<span>IO</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a href="user_profile.php">
            <i class="fa-solid fa-user"></i>
              </a>
          </li>
          <?php if(Session::get('userRole') == 0){?>
          <li class="dropdown">
            <a href="add_user.php">
            <i class="fa-solid fa-user-plus"></i>
            
              </a>
          </li>
          
          <li class="dropdown">
            <a href="user_list.php">
            <i class="fa-solid fa-list"></i>
              
              </a>
          </li>
          <?php }?>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <?php 
            $query = "SELECT * FROM contact where status = 1"; 
            $result = $db->select($query);
            if($result){
              $count = mysqli_num_rows($result);
            }else{
              echo "0";
            }
            
           
            ?>
            <a href="inbox.php">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">
                <?php echo $count;?>
              </span>
              </a>
           
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning"></span>
              </a>
            
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <?php
        if(isset($_GET['action']) && $_GET['action'] == 'logout'){
          Session::destroy();
          header('Location:../index.php');
        }
      
      ?>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="?action=logout">Logout</a></li>
        </ul>
      </div>
    </header>