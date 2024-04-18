

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/feather/feather.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                
              </div>
              <!-- <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6> -->
              <?php 
								if($this->session->flashdata('error') !='')
									{
										echo '<div class="alert alert-danger" role="alert">';
										echo $this->session->flashdata('error');
										echo '</div>';
									}
									?>
								<form method="post" action="<?php echo base_url('register/proses'); ?>">
                <div class="form-group">
                  <h3>Registrasi</h3>
                  <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                  <input type="full_name" class="form-control form-control-lg" id="full_name" name="full_name" placeholder="Full Name" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="email" required="required">
                </div>
                <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <select type="select" class="form-control" name="level" required="required">
                                    <option value="user">user</option></select>
                                </div>
                            </div>
                
            
                <div class="mb-4">
                  <div class="form-check">
                    <!-- <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label> -->
                  </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="<?= base_url('login'); ?>" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url(); ?>assets/js/off-canvas.js"></script>
  <script src="<?= base_url(); ?>assets/js/hoverable-collapse.js"></script>
  <script src="<?= base_url(); ?>assets/js/template.js"></script>
  <script src="<?= base_url(); ?>assets/js/settings.js"></script>
  <script src="<?= base_url(); ?>assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
