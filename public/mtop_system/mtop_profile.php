<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="AdminLTE_new/dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo($mtop["firstname"] . " " . $mtop["lastname"]); ?></h3>

                <p class="text-muted text-center"><?php echo($mtop["MTOP_NO"]); ?></p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Mayor's Permit Expiration</strong>
                
                <p class="text-muted">
                  <?php echo($mtop["mp_expiration_date"]); ?>
                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Franchise Expiration</strong>
                
                <p class="text-muted">
                  <?php echo($mtop["expiration_date"]); ?>
                </p>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
           
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#new_transaction" data-toggle="tab">New Transaction</a></li>
                  <li class="nav-item"><a class="nav-link" href="#transaction" data-toggle="tab">Transaction Logs</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Printable Forms</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="profile">

                
                  <form id="mtop_profile" class="generic_form_trigger" data-url="mtop_profile"> 
                  <input type="hidden" value="update_mtop" name="action">
                  <input type="hidden" value="<?php echo($_GET["mtop"]) ?>" name="mtop">
                  <button id="update_btn_mtop" class="btn btn-primary" type="button">Update</button>
                  <button id="save_btn_mtop" style="display: none;" class="btn btn-success" type="submit">Save</button>
                  <button id="cancel_btn_mtop" style="display: none;" class="btn btn-danger " type="button">Cancel</button>
                  <br>
                  <br>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input name="firstname" value="<?php echo($mtop["firstname"]); ?>" readonly type="text" class="form-control"  placeholder="---">
                      </div>
                    </div>  

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input name="lastname" value="<?php echo($mtop["lastname"]); ?>" readonly type="text" class="form-control"  placeholder="---">
                      </div>
                    </div>  
                  </div>

                  <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" readonly class="form-control" rows="2" placeholder="---"><?php echo($mtop["address"]); ?></textarea>
                  </div>


                  <div class="form-group">
                      <label>Gender</label>
                      <select name="Gender" id="gender_select" disabled class="form-control">
                        <option value="<?php echo($mtop["Gender"]); ?>"><?php echo($mtop["Gender"]); ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Make</label>
                        <input name="make" value="<?php echo($mtop["make"]); ?>" readonly type="text" class="form-control"  placeholder="---">
                      </div>
                    </div>  

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Motor Number</label>
                        <input name="motor_no" value="<?php echo($mtop["motor_no"]); ?>" readonly type="text" class="form-control" placeholder="---">
                      </div>
                    </div>  
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Plate Number</label>
                        <input name="plate_no" value="<?php echo($mtop["plate_no"]); ?>" readonly type="text" class="form-control" placeholder="---">
                      </div>
                    </div>  

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Chassis / Serial Number</label>
                        <input name="chassis_no" value="<?php echo($mtop["chassis_no"]); ?>" readonly type="text" class="form-control" placeholder="---">
                      </div>
                    </div>  


                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Route</label>
                        <input name="route" value="<?php echo($mtop["route"]); ?>" readonly type="text" class="form-control" placeholder="---">
                      </div>
                    </div>  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Cert of Reg Number</label>
                        <input name="reg_no" value="<?php echo($mtop["reg_no"]); ?>" readonly type="text" class="form-control" placeholder="---">
                      </div>
                    </div>  
                  </div>
                  


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Mayor's Expiration Date</label>
                        <input name="mp_expiration_date" value="<?php echo($mtop["mp_expiration_date"]); ?>" readonly type="date" class="form-control" placeholder="---">
                      </div>
                    </div>  

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Franchise Expiration Date</label>
                        <input name="expiration_date" value="<?php echo($mtop["expiration_date"]); ?>" readonly type="date" class="form-control" placeholder="---">
                      </div>
                    </div>   
                  </div>
                  <div class="form-group">
                        <label>Note</label>
                        <textarea name="care_of" readonly class="form-control" rows="3" placeholder="---"><?php echo($mtop["care_of"]); ?></textarea>
                  </div>

                  </form>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="transaction">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script>
$("#update_btn_mtop").click(function() {
  $("#save_btn_mtop").show(); //Showing submit_text
  $("#cancel_btn_mtop").show(); //Showing submit_text
  $("#update_btn_mtop").hide(); //Showing submit_text
  $("#mtop_profile :input").prop('readonly', false); //Making all inputs to disabled
  $("#mtop_profile #gender_select").prop('disabled', false); //Making all inputs to disabled
});

$("#cancel_btn_mtop").click(function() {
  $("#save_btn_mtop").hide(); //Showing submit_text
  $("#cancel_btn_mtop").hide(); //Showing submit_text
  $("#update_btn_mtop").show(); //Showing submit_text
  $("#mtop_profile :input").prop('readonly', true); //Making all inputs to disabled
  $("#mtop_profile #gender_select").prop('disabled', true); //Making all inputs to disabled
});
  </script>

  <?php require("layouts/footer.php") ?>