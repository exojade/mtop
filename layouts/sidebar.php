<aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="#" class="brand-link" class="text-center">
      <img src="resources/panabologo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MTOP v2</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 text-center">
        <div class="image" style="display:block;">
            <img style="width: 6rem;" src="resources/default.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" style="display:block;">
          <a href="#" class="d-block"><?php echo($_SESSION["mtop"]["fullname"]); ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
 

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        

  <li class="nav-item">
      <a href="index" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Dashboard
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="mtop_profile?action=list" class="nav-link">
        <i class="nav-icon fas fa-motorcycle"></i>
        <p>
          MTOP
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>


  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Transaction
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add from Vacant MTOP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="award" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Award</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="pages/charts/uplot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>uPlot</p>
                </a>
              </li> -->
            </ul>
          </li>

  <li class="nav-item">
      <a href="users?action=users_list" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          Users
        </p>
      </a>
  </li>


  <li class="nav-item">
      <a href="scholars?action=applicants_list" class="nav-link">
        <i class="nav-icon fas fa-plus"></i>
        <p>
          Applicants
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="scholars?action=denied_list" class="nav-link">
        <i class="nav-icon fas fa-times"></i>
        <p>
          Denied Applicants
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="scholars?action=scholars_list" class="nav-link">
        <i class="nav-icon fas fa-graduation-cap"></i>
        <p>
          Scholars
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>


<li class="nav-item">
      <a href="email?action=list" class="nav-link">
        <i class="nav-icon fas fa-key"></i>
        <p>
          Email
          <span class="right badge badge-danger"></span>
        </p>
        <span class="badge badge-danger right">2</span>
      </a>
  </li>

<li class="nav-item">
      <a href="#" data-toggle="modal" data-target="#changePassword"  class="nav-link">
        <i class="nav-icon fas fa-key"></i>
        <p>
          Change Password
          <span class="right badge badge-danger"></span>
          
        </p>
      </a>
  </li>
               
<li class="nav-item">
      <a href="logout" class="nav-link">
        <i class="nav-icon fas fa-share"></i>
        <p>
          Logout
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  
       
          
       
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- <div class="modal fade" id="changePassword">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Change Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="generic_form_trigger" data-url="profile">
                <input type="hidden" name="action" value="changePassword">
                <input type="hidden" name="user_id" value="<?php echo($_SESSION["mtop"]["userid"]) ?>">
                <div class="form-group">
                  <label>Current Password</label>
                  <input name="current_password" required type="password" class="form-control"  placeholder="---">
                </div>

                <div class="form-group">
                  <label>New Password</label>
                  <input name="new_password" required type="password" class="form-control"  placeholder="---">
                </div>

                <div class="form-group">
                  <label>Repeat New Password</label>
                  <input name="repeat_password" required type="password" class="form-control"  placeholder="---">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          </div>
        </div>
      </div> -->