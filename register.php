
<?php
include_once('template.php');
include_once('config/function.php');
require_once('config/koneksi.php');
top();
?>
<div class="section section-signup" style="background-image: url('assets/img/bg8.jpg'); background-size: cover; background-position: top center; min-height: 700px;" filter-color="orange">
                <div class="container">
                    <div class="row">
                        <div class="card card-signup" data-background-color="orange">
                            <form class="form" method="POST" action="prosesr.php">
                                <div class="header text-center">
                                    <h4 class="title title-up">Sign Up</h4>
                                    <?php
                                    if(isset($_GET['p'])){
                                      ?>
                                      <div class="alert alert-danger" role="alert">
                                          <div class="container">
                                              <div class="alert-icon">
                                                  <i class="now-ui-icons objects_support-17"></i>
                                              </div>
                                              <strong>Gagal!</strong> Nim atau email sudah ada
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">
                                                      <i class="now-ui-icons ui-1_simple-remove"></i>
                                                  </span>
                                              </button>
                                          </div>
                                      </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if(isset($_GET['s'])){
                                      ?>
                                      <div class="alert alert-success" role="alert">
                                          <div class="container">
                                              <div class="alert-icon">
                                                  <i class="now-ui-icons ui-1_check"></i>
                                              </div>
                                              Berhasil mendaftar!
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">
                                                      <i class="now-ui-icons ui-1_simple-remove"></i>
                                                  </span>
                                              </button>
                                          </div>
                                      </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="card-body">
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons users_single-02"></i>
                                        </span>
                                        <input type="number" placeholder="ex 1511xxxx" class="form-control" name="nim" onBlur="checkAvailabilityNIM()" required/>
                                    </div>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons ui-1_email-85"></i>
                                        </span>
                                        <input name="email" type="email" class="form-control" placeholder="Email" onBlur="checkAvailabilityEmail()" required>
                                    </div>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons text_caps-small"></i>
                                        </span>
                                        <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
                                    </div>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                        </span>
                                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons tech_mobile"></i>
                                        </span>
                                        <input name="phone" type="number" class="form-control" placeholder="No. Telepon" required>
                                    </div>
                                    <div class="input-group form-group-no-border datepicker-container">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons ui-1_calendar-60"></i>
                                        </span>
                                            <input name="ttl" type="date" class="form-control">
                                    </div>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons location_pin"></i>
                                        </span>
                                        <input name="tempat" type="text" class="form-control" placeholder="Tempat Lahir" required>
                                    </div>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons ui-1_email-85"></i>
                                        </span>
                                        <select class="form-control" name="level" data-datepicker-color="primary">
                                          <?php
                                          $sql    =   'SELECT * FROM userg WHERE userg_id!=1 AND status=1';
                                          $query  = mysqli_query($con, $sql);
                                          $no=0;
                                          while ($row = mysqli_fetch_array($query))
                                          {
                                              ?>
                                                <option value="<?php echo $row['userg_id']; ?>" style="color:black"><?php echo $row['nama']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- If you want to add a checkbox to this form, uncomment this code -->
                                    <!-- <div class="checkbox">
           <input id="checkboxSignup" type="checkbox">
            <label for="checkboxSignup">
            Unchecked
            </label>
             </div> -->
                                </div>
                                <div class="footer text-center">
                                    <button class="btn btn-neutral btn-round" type="submit">Daftar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col text-center">
                        <a href="login.php" class="btn btn-round btn-primary btn-lg" target="_blank">Halaman Login</a>
                    </div>
                </div>
            </div>
<?php bot(); ?>
