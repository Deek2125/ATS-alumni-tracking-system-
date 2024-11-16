<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('admin/db_connect.php');
ob_start();
$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach ($query as $key => $value) {
    if (!is_numeric($key)) {
        $_SESSION['system'][$key] = $value;
    }
}
ob_end_flush();
include('header.php');
?>
<style>
    /* Header Styling */
    header.masthead {
        position: relative;
        width: 100%;
        height: 10vh;
        background: url('admin/assets/uploads/alumnitracking.jpg') no-repeat center center;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Semi-transparent overlay */
    header.masthead::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6); /* Black overlay with 60% opacity */
        z-index: 1;
    }

    /* Title styling */
    header.masthead h1 {
        position: relative;
        z-index: 2; /* Ensure text is above the overlay */
        color: white;
        font-family: "Georgia", serif;
        font-size: 3.5rem;
        text-align: center;
        font-weight: bold;
    }

    /* Ensure no additional background repeats elsewhere */
    body {
        margin: 0;
        padding: 0;
        background: white; /* Neutral background for the rest of the page */
    }
</style>
<body id="page-top">
    <!-- Navigation -->
    <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white"></div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="./">
                <font face="Georgia, serif">
                    <font color="#00FFFF">A</font>lumni
                    <font color="#00FFFF">E</font>dition
                </font>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home"><font face="Georgia, serif"><strong><font color="#FFB6C1">Home</font></strong></font></a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=alumni_list"><font face="Georgia, serif"><strong><font color="#FFB6C1">Alumni</font></strong></font></a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=gallery"><font face="Georgia, serif"><strong><font color="#FFB6C1">Gallery</font></strong></font></a></li>
                    <?php if (isset($_SESSION['login_id'])) : ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=careers"><font face="Georgia, serif"><strong><font color="#FFB6C1">Jobs</font></strong></font></a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=forum"><font face="Georgia, serif"><strong><font color="#FFB6C1">Forums</font></strong></font></a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about"><font face="Georgia, serif"><strong><font color="#FFB6C1">About</font></strong></font></a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="http://localhost/chatapp/users.php"><strong><font color="#FFB6C1">Chat</font></strong></a></li>
                    <?php if (!isset($_SESSION['login_id'])) : ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#" id="login"><font face="Georgia, serif"><strong><font color="#FFB6C1">Login</font></strong></font></a></li>
                    <?php else : ?>
                    <li class="nav-item">
                        <div class="dropdown mr-4">
                            <a href="#" class="nav-link js-scroll-trigger" id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-angle-down"></i></a>
                            <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
                                <a class="dropdown-item" href="index.php?page=my_account" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a>
                                <a class="dropdown-item" href="admin/ajax.php?action=logout2"><i class="fa fa-power-off"></i> Log out</a>
                            </div>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
   
    <?php 
    $page = isset($_GET['page']) ? $_GET['page'] : "home";
    include $page.'.php';
    ?>

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-righ t"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>
  <div id="preloader"></div>

    <footer class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0 text-black"><font face="Serif"><b>Get in touch with us</b></font></h2>
                    <hr class="divider my-4" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                    <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                    <div class="text-black"><?php echo $_SESSION['system']['contact'] ?></div>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                    <a class="d-block" style="color:black" href="mailto:<?php echo $_SESSION['system']['email'] ?>"><?php echo $_SESSION['system']['email'] ?></a>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="small text-center text-muted">Copyright ©Deekshitha - <?php echo $_SESSION['system']['name'] ?> | <a href="https://vvce.ac.in/" target="_blank">VVCE</a></div>
        </div>
    </footer>
    <?php include('footer.php') ?>
</body>
<script type="text/javascript">
    $('#login').click(function() {
        uni_modal("Login", 'login.php');
    });
</script>
<?php $conn->close(); ?>
</html>
