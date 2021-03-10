<?php

?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="icons/avatars/png/assistant.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <?php
              echo "<p>".$fname."&nbsp ".$lname."
              </br><small>".$qualification."&nbsp (Age : ".$age."yrs)</small></p>";
              ?>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
              <a href="Assistant_dashboard.php">
                <i class="fa fa-dashboard"></i> <span> Dashboard</span>
              </a>
            </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i> <span>CKD Prediction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="prediction.php"><i class="fa fa-circle-o"></i> Prediction</a></li>
            <li><a href="Patient_reports_for_assistant.php"><i class="fa fa-circle-o"></i> Patient Report</a></li>
          </ul>
        </li>
        <li>
          <a href="Stage_calculation.php">
            <i class="fa fa-bar-chart"></i> <span>CKD Stage Calculation</span>
          </a>
        </li>
        <!-- <li>
          <a href="Make_Appoinment.php">
            <i class="fa fa-phone"></i> <span>Make Appointment</span>
          </a>
        </li> -->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-phone"></i> <span>Appointment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Make_Appoinment.php"><i class="fa fa-circle-o"></i> Make Appointment</a></li>
            <li><a href="View_Appointment.php"><i class="fa fa-circle-o"></i> View Appointment</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>