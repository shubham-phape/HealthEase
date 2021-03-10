<aside class="main-sidebar">
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="icons/avatars/png/doctor.png" class="img-circle" alt="User Image">
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
              <a href="ReportForDoctor.php">
                <i class="fa fa-bar-chart"></i> <span>Patient Reports</span>
              </a>
            </li>
          </ul>
        </section>
</aside>