<?php
      include 'connect.php';
      session_start();
      $id = $_SESSION['id'];
      if ($result = $mysqli->query("SELECT fname,lname,qualification,TIMESTAMPDIFF(YEAR, dob, CURDATE()) AS age,yoe from doctor_details WHERE id='".$id."'")) {
      while ($object = $result->fetch_object()) {
      $fname = $object->fname;
      $lname = $object->lname;
      $qualification = $object->qualification;
      $yoe = $object->yoe;
      $age = $object->age;
      }
      }
      ?>
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>H</b>E</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Health</b>Ease</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="icons/avatars/png/doctor.png" class="user-image" alt="User Image">
                  <span class="hidden-xs">Doctor</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="icons/avatars/png/doctor.png" class="img-circle" alt="User Image">
                    <?php
                    echo "<p>
                      ".$fname."&nbsp ".$lname."
                      <small>".$qualification."&nbsp (".$yoe."yrs)</small>
                    </p>";
                    ?>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <!-- <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div> -->
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>