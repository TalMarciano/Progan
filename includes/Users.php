<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    /*  if(!isset($_SESSION['userEmail'])){
        header('Location: http://amitsl.mtacloud.co.il');
    }*/

?>
<!DOCTYPE html>
<html lang="">

<head>
    <title>Progan Users</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts ============================================ -->
    <!-- our  CSS JS  ============================================ -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/ourCss/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/css/mdb.min.css" rel="stylesheet">
    
     <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS ============================================ -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- font awesome CSS ============================================ -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- owl.carousel CSS ============================================ -->
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.css">
    <link rel="stylesheet" href="../css/owl.transitions.css">
    <!-- meanmenu CSS ============================================ -->
    <link rel="stylesheet" href="../css/meanmenu/meanmenu.min.css">
    <!-- animate CSS ============================================ -->
    <link rel="stylesheet" href="../css/animate.css">
    <!-- normalize CSS ============================================ -->
    <link rel="stylesheet" href="../css/normalize.css">
    <!-- mCustomScrollbar CSS============================================ -->
    <link rel="stylesheet" href="../css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS	============================================ -->
    <link rel="stylesheet" href="../css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS ============================================ -->
    <link rel="stylesheet" href="../css/notika-custom-icon.css">
    <!-- main CSS ============================================ -->
    <link rel="stylesheet" href="../css/main.css">
    <!-- wave CSS ============================================ -->
    <link rel="stylesheet" href="../css/wave/waves.min.css">
    <link rel="stylesheet" href="../css/responsive.css">


</head>

<body>
    <!-- START Include for Header -->
        <?php include "../php/header.php" ?> 
    <!-- END Include for Header -->
    
    <!-- START Include for Menu -->
         <?php include "../php/menu.php" ?> 
    <!-- END Include for Menu-->
    
<!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 style="text-align:center">
                            משתמשים
                         </h2>
                    <input type="text" id="mySearch" class="searchBarStyle" onchange="myFunction()" placeholder="חפש" title="Type in a category" >
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                        </div>
                        <div class="table-responsive">
                            <table DIR="RTL" id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="centerTableTr tableBoldText">
                                            מספר משתמש
                                        </th>
                                        <th class="centerTableTr tableBoldText">
                                            שם פרטי
                                        </th>
                                        <th class="centerTableTr tableBoldText">
                                            שם משפחה
                                        </th>
                                        <th class="centerTableTr tableBoldText">
                                            מייל
                                        </th>
                                        <th class="centerTableTr tableBoldText">
                                            סוג הרשאה
                                        </th>
                                        <th class="centerTableTr tableBoldText">
                                            פרטים נוספים
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                      <?php
                                        require_once('../php/Database.php');
                                        global $db;
                                        $db->query("SET CHARACTER SET 'hebrew'");
                                        $db->query("SET NAMES 'utf8'");
                                        $sql = "SELECT * FROM users";
                                        $allUsersDetails = $db ->query($sql);
                                        while($row = $allUsersDetails->fetch_assoc()){
                                            $userEmail = $row['email'];
                                            $userDetailsString = "select * from users where email='" .$userEmail ."'";
                                            $userDetails = $db->query($userDetailsString);
                                            $userDetails = $userDetails->fetch_assoc();
                                                echo '<tr>';
                                                    echo ' <td class="centerTableTr">' .$row['userId'] .'</td>';
                                                    echo ' <td class="centerTableTr">' .$row['firstName'] .'</td>';
                                                    echo ' <td class="centerTableTr">' .$row['lastName'] .'</td>';
                                                    echo ' <td class="centerTableTr">' .$row['email'] .'</td>';
                                                    if($row['isManager'] == 1){
                                                        echo ' <td class="centerTableTr">מנהל</td>';
                                                    }
                                                    else{
                                                        echo ' <td class="centerTableTr">עובד</td>';
                                                    }
                                                    echo '<td>';
                                                        echo '<button type="button" data-toggle="modal" data-target="#' .$row['userId'] .'">';
                                                        echo 'עריכה';
                                                        echo '</button>';
                                                    echo '</td>';
                                                echo '</tr> ';
                                            }
                                        echo '</tbody></table></div></div></div></div></div></div>';
                                        echo '<div id="isManagerParameterForThatUser" style="display:none;">' .$_SESSION['isManager'] .'</div>';

                                         //////////End Of table//////////////////////////
                                        $modalQueryCreate = $db ->query($sql);
                                        while($row = $modalQueryCreate->fetch_assoc()){
                                            ///////////MODAL//////////////////////////////
                                                /////////CUSTOMER//////////
                                                $userEmail = $row['email'];
                                                $userDetailsString = "select * from users where email='" .$userEmail ."'";
                                                $userDetails = $db->query($userDetailsString);
                                                $userDetails = $userDetails->fetch_assoc();
                                                echo '<div class="modal" id="' .$row['userId'] .'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">';
                                                  echo '<div class="modal-dialog modal-lg" role="document">';
                                                    echo '<div class="modal-content">';
                                                      echo '<div class="modal-header">';
                                                        echo '<h4 class="modal-title" style="text-align:center;">';
                                                			echo ' פרטי משתמש ';
                                                			echo '<br>' .$row['firstName'] .' ' .$row['lastName'];
                                                  		echo '</h4>';
                                                      echo '</div>';
                                                      echo '<div class="modal-body" style="text-align:center;">';
                                                         echo '<table DIR="RTL" class="modalTable">';
                                                          echo '<tr>';
                                                                echo '<th class="fontSizeModalTable">
                                                                    מספר משתמש 
                                                                </th>';
                                                                echo '<th class="fontSizeModalTable">
                                                                    שם פרטי 
                                                                </th>';
                                                                echo '<th class="fontSizeModalTable">
                                                                    שם משפחה
                                                                </th>';
                                                                echo '<th class="fontSizeModalTable">
                                                                    מייל
                                                                </th>';
                                                                echo '<th class="fontSizeModalTable">
                                                                    סוג הרשאה
                                                                </th>';
                                                                 echo '<th style="display:none;"></th>';
                                                            echo '</tr>';
                                                            //////////
                                                           $userDetailsQuery = "select * from users where email='" .$userEmail ."'";
                                                           $userDetails = $db->query($userDetailsQuery);
                                                          ////////
                                                          while ($u = $userDetails->fetch_assoc()){
                                                            echo '<tr>';
                                                              echo '<th class="fontSizeModalTable" id="userId' .$u['userId'] .'">' .$u['userId'] .'</th>';
                                                              echo '<th class="fontSizeModalTable" id="firstName' .$u['userId'] .'">' .$u['firstName'] .'</th>';
                                                              echo '<th class="fontSizeModalTable" id="lastName' .$u['userId'] .'">' .$u['lastName'] .'</th>';
                                                              echo '<th class="fontSizeModalTable" id="email' .$u['userId'] .'">' .$u['email'] .'</th>';
                                                              if($u['isManager'] == 1)
                                                              echo '<th class="fontSizeModalTable" id="isManagerToChangeToOption'.$u['userId'] .'">מנהל</th>';
                                                              else{
                                                                    echo '<th class="fontSizeModalTable" id="isManagerToChangeToOption'.$u['userId'] .'">עובד</th>';
                                                              }
                                                               echo '<th id="isManager' .$u['userId'] .'" style="display:none;">' .$u['isManager'] .'</th>';
                                                            echo '</tr>';
                                                         }
                                                        echo '</table>';
                                                      echo '</div>';
                                                    //////END BODY TABLE GOES HERE////////////
                                                      echo '<div class="modal-footer">';
                                                        echo '<button type="button" class="btn btn-default" data-dismiss="modal" style="float: left;display: block; margin: auto;">';
                                                		echo 'סגור';
                                                		echo '</button>';
                                                		echo '<button type="button" class="btn btn-default buttonForManagers" data-dismiss="modal" id="deleteBtn' .$row['userId'] .'" onclick="deleteUser(' .$row['userId'] .')" style="float: left;display: block; margin: auto;">';
                                                		echo 'מחק ';
                                                		echo '</button>'; 
                                                		  echo '<button type="button" class="btn btn-default buttonForManagers" id="resetPassBtn' .$row['userId'] .'" onclick="resetpassword(' .$row['userId'] .')" style="float: left;display: block; margin: auto;">';
                                                		echo 'אפס סיסמא ';
                                                		echo '</button>'; 
                                                		 echo '<button type="button" class="btn btn-default buttonForManagers" id="updateBtn' .$row['userId'] .'" onclick="updateUser(' .$row['userId'] .')" style="float: left;display: block; margin: auto;">';
                                                		echo 'עדכן  ';
                                                		echo '</button>'; 
                                                	   echo '</div>';
                                                    echo '</div>';
                                                  echo '</div>';
                                                echo '</div>';
                                        }
                                        	echo '<div id="hiddenFormForResetPass" style="display:none;"></div>';
                                            echo '<div id="hiddenFormForupdateUser" style="display:none;"></div>';
                                            echo '<div id="hiddenFormForDeleteUser" style="display:none;"></div>';
                                    ?>
    <!-- Data Table area End-->
    
    <!-- Button trigger modal -->
    <div class="buttonMargin">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewUser">
      הוספת משתמש חדש
    </button>
    </div>
    <!-- Modal For Add new User -->
    <div class="modal" id="addNewUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
                <h3 class="modal-title" id="exampleModalLabel" style="text-align:center" >יצירת משתמש חדש</h3>
          </div>
          <div class="modal-body">
            <form method="POST" action="" class="formRight">
            <p> <input type="text" name="firstName" pattern= "[A-Za-z א-ת]+" title="אנא הזן אותיות בלבד" required> &nbsp; :שם פרטי </p>
            <p> <input type="text" name="lastName" pattern= "[A-Za-z א-ת]+" title="אנא הזן אותיות בלבד" required> &nbsp;:שם משפחה</p>
            <p> <input type="text" name="userName" pattern= "[A-Za-z א-ת]+" title="אנא הזן אותיות בלבד" required> &nbsp;: שם משתמש</p>
            <p> <input type="email" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="אנא הזן כתובת מייל תקינה" required  >&nbsp; :כתובת מייל</p>
            <p> <select name=isManager>  
                    <option value="1">מנהל</option>  
                    <option value="0">עובד</option>  
                </select>
                &nbsp; :סוג הרשאה
            </p>
            </div>
          <div class="modal-footer">
            <input type="button" value="סגור" data-dismiss="modal">
            <input type="submit" value="שמור" name="register" >
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- END Modal For Add new User -->
    
    <!-- Start Footer area-->
    <div id="footerLoad" class="footer-copyright-area" onload="isManagerData()">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © Amit Salim, Tal Marziano, Chen Rahamim.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->

    <!-- Scripts -->
        <script src="../js/ourJs/usersScript.js"></script>
        <!-- Bootstrap And JQuery ============================================ -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
    <!-- Scripts -->
    
    <!-- Search at Data Table-->
        <script>
            function isExistingCellStartWith(children, length, filter) {
                let td;
                 for (child = 1; child < length; child++) {  
                     td = children[child];
                     if(td.innerHTML.toUpperCase().includes(filter)) {
                         return true
                     }
                }
                return false;
            }
            function myFunction() {
              let input, filter, a, i, j, td, trs, child, table;
              input = document.getElementById("mySearch");
              filter = input.value.toUpperCase();
              table = document.getElementById("data-table-basic");
              trs = table.getElementsByTagName("tr");
              for (i = 1; i < trs.length; i++) {
                    if(isExistingCellStartWith(trs[i].children, trs[i].children.length, filter)) {
                        trs[i].style.display = "";
                    } else {
                        trs[i].style.display = "none";
                    }
                }
            }
        </script>
    <!-- Search at Data Table End-->

    
    <?php
        require_once('../php/User.php');
        global $user;
        if(isset($_POST['register'])){
            //print_r($_POST['register']);
            $invalidRegister = false;
            $userAddedSucessfuly = false;
            $errorAddedUser = false;
            $user->addNewUser();
            if($userAddedSucessfuly){
             echo '<meta http-equiv="refresh" content="0">';
            }
        }
         if(isset($_POST['deleteUserId'])){
            $isDeleted = false;
            $user->deleteUser();
            if($isDeleted){
                echo '<meta http-equiv="refresh" content="0">';
            }
        }
        if(isset($_POST["userIdForReset"])){
            $isPasswordChanges = false;
            $result = $user->resetUserPasswordInUsers();
            if($isPasswordChanges){
                 echo "<script type='text/javascript'>
                    Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'סיסמא שונתה בהצלחה!',
                    text: 'אנא שהמשתמש יבדוק את המייל',
                    showConfirmButton: true,
                    timer: 6000
                });
             </script>";
            }
            else{
                echo "<script type='text/javascript'>
                    Swal.fire({
                      position: 'center',
                      type: 'error',
                      title: 'שינוי הסיסמא נכשל';
                      text: 'אנא נסה שנית ',
                      showConfirmButton: true,
                      timer: 60000
                    });
                    </script>";
                
            }
            var_dump($_POST);
        }
        if(isset($_POST['userIdForUpdate'])){
            $isupdated = false;
            $user->updateUserDetails();
            if($isupdated){
                echo '<meta http-equiv="refresh" content="0">';
            }            
        }
    ?>
</body>
</html>
