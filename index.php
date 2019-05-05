<html lang="he">
<head>
    <!-- bootstrap 4.0.0, than JQuery-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- for swal - the popup in the sign in form -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <!-- OUR CSS than JS -->
    <link rel="stylesheet" href="css/ourCss/style.css">
    <script src="js/ourJs/login_index.js"></script>
 


</head>
<body>
 <div class="container py-5">
    <div class="row">
        <div class="col-md-12">
		<div class="col-md-12 text-center mb-5">
            <img src="images/logo.png" style="max-width:50%; max-hight:50%">
			</div>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <!-- form card login -->
                    <div class="card rounded-0" id="login-form">
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                                <div class="form-group">
                                    <h5 class="centerText">שם משתמש</h5>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="username" required="">
                                </div>
                                <div class="form-group">
                                    <h5 class="centerText">סיסמא</h5>
                                    <input type="password" name="pass" class="form-control form-control-lg rounded-0" required="">
                        
                                </div>
                                <div>
                                    <label class="custom-control custom-checkbox">
                                    </label>
									<label class="custom-control custom-checkbox">
                                     <a href="javascript:void('forgot-form-link');" class="forgot-form-link floatRight">שכחתי סיסמא</a>
                                    </label>
                                </div>
                                <input type="submit" class="btn btn-success btn-lg" name="btnLogin" value="כניסה">
                            </form>
                        </div>
                    </div>
                    <!-- /form card login end-->
					    				
					<!-- form card forgot -->
                    <div class="card rounded-0" id="forgot-form">
                        <div class="card-header">
                            <h2 class="mb-0 centerText">איפוס סיסמא</h2>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                                <div class="form-group">
                                    <h5 style="text-align:center;">אימייל</h5>
                                    <input type="email" class="form-control form-control-lg rounded-0" id="pwd1" required="" autocomplete="new-password">
               
                                </div>
								<div>
								<label class="custom-control custom-checkbox">
                                    </label>
									<label class="custom-control custom-checkbox">
                                     <a href="javascript:void('login-form-link');" class="login-form-link floatRight">כניסה</a>
                                    </label>
								</div>
                                <button type="submit" class="btn btn-success btn-lg" name="btnForgot">אפס סיסמא</button>
                            </form>
                        </div>
                    </div>
                    <!-- /form card forgot end -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>  
	</body>
	</html>
	
<?php
    if($_POST['btnLogin']){
        require_once("php/User.php");
        global $user;
        $isSignInSuccess;
        $user = $user->checkUser();
        if($isSignInSuccess){
            echo "<script type='text/javascript'>
                    Swal.fire({
                      position: 'top-end',
                      type: 'success',
                      title: 'Login Successful!',
                      text: 'Loading your account...',
                      showConfirmButton: false,
                      timer: 1500
                    });
                    window.location.href='includes/dashboard.php';
                 </script>";
        }
        else{
            echo "<script type='text/javascript'>
                    Swal.fire({
                      position: 'center',
                      type: 'error',
                      title: 'Login Failed!',
                      text: 'Try again...',
                      showConfirmButton: false,
                      timer: 1500
                    });
                    </script>";
        }
    }
?>