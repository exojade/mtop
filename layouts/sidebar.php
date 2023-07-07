<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #244D07">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" class="text-center">
      <img src="resources/mariphil.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MARIPHIL INC</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 text-center">
        <div class="image" style="display:block;">
          <?php if($_SESSION["mariphil"]["profile_image"] == ""): ?>
            <img style="width: 6rem;" src="resources/default.jpg" class="img-circle elevation-2" alt="User Image">
          <?php else: ?>
            <img style="width: 6rem;" src="<?php echo($_SESSION["mariphil"]["profile_image"]); ?>" class="img-circle elevation-2" alt="User Image">
          <?php endif; ?>
          
        </div>
        <div class="info" style="display:block;">
          <a href="#" class="d-block"><?php echo($_SESSION["mariphil"]["fullname"]); ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
 

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
<?php $role = $_SESSION["mariphil"]["role"]; 
// dump($role);
?>

<?php if($role=="APPLICANT"): ?>
  <li class="nav-item">
      <a href="index" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Dashboard
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <?php $scholar = query("select * from scholars where scholar_id = ?", $_SESSION["mariphil"]["userid"]); ?>
  <?php if($scholar[0]["current_status"] == "APPLICANT"): ?>
    <li class="nav-item">
      <a href="profile?action=fill" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          Profile
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
  <?php else: ?>
    <li class="nav-item">
      <a href="scholars?action=details&id=<?php echo($_SESSION["mariphil"]["userid"]); ?>" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          Profile
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
  <?php endif; ?>
<?php endif; ?>
<?php if($role=="SPONSOR"): ?>
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
      <a href="sponsor?action=no_sponsor" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          List of No Sponsor
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
  <li class="nav-item">
      <a href="sponsor?action=my_sponsored" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          My Scholars
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
<?php endif; ?>
<?php if($role=="VALIDATOR"): ?>
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
      <a href="scholars?action=applicants_list" class="nav-link">
        <i class="nav-icon fas fa-plus"></i>
        <p>
          Applicants
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
<?php endif; ?>

<?php if($role=="FACILITATOR"): ?>
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
      <a href="scholars?action=my_scholars_list" class="nav-link">
        <i class="nav-icon fas fa-graduation-cap"></i>
        <p>
          My Scholars
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="scholars?action=scholars_list" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
          All Scholars
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
  <li class="nav-item">
      <a href="scholars?action=vacant_applicants" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
        List of No Facilitator
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
  <li class="nav-item">
      <a href="forms?action=list" class="nav-link">
        <i class="nav-icon fas fa-file"></i>
        <p>
          Forms
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
<?php endif; ?>




<?php if($role=="admin"): ?>
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
      <a href="forms?action=list" class="nav-link">
        <i class="nav-icon fas fa-file"></i>
        <p>
          Forms
          <span class="right badge badge-danger"></span>
        </p>
      </a>
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
<?php endif; ?>

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


  <div class="modal fade" id="changePassword">
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
                <input type="hidden" name="user_id" value="<?php echo($_SESSION["mariphil"]["userid"]) ?>">
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
      </div>