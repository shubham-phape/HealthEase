<?php

?>
<section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="icons/avatars/png/assistant.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <?php echo "<p>".$fname."&nbsp ".$lname."</br>
                      <small>".$address."</small></p>"; ?>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="Patient_dashboard.php">
                <i class="fa fa-dashboard"></i> <span> Dashboard</span>
              </a>
            </li>
            <li>
              <a href="Lab_Report.php">
                <i class="fa fa-file"></i> <span> Lab Reports</span>
              </a>
            </li>
            <li>
              <a href="ckd_report.php">
                <i class="fa fa-file-text"></i> <span>CKD Report</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cutlery"></i> <span>Diet</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="diet_breakfast.php"><i class="fa fa-circle-o"></i> Breakfast Diet</a></li>
                <li><a href="diet_lunch.php"><i class="fa fa-circle-o"></i> Lunch Diet</a></li>
                <li><a href="diet_dinner.php"><i class="fa fa-circle-o"></i> Dinner Diet</a></li>
                <li><a href="diet_progress.php"><i class="fa fa-circle-o"></i> Track  Diet  Progress</a></li>

              </ul>
            </li>
            
          </ul>
</section>