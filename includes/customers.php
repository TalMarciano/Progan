<!DOCTYPE html>
<?php
     //Enable error reporting.
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION['userEmail'])){
        header('Location: http://amitsl.mtacloud.co.il');
    }

?>

<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Progan Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/ourCss/style.css">
    <!-- Google Fonts ============================================ -->
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
    <!-- style CSS ============================================ -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style2.css">
    <!-- responsive CSS	============================================ -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- modernizr JS ============================================ -->
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Script for everyone ============================================ -->
    <script src="../js/ourJs/scriptForEveryone.js"></script>        
    <!-- customerScript ============================================ -->
    <script src="../js/ourJs/customerScript.js"></script>    
    <!-- Modal Scripts ============================================ -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <!-- Modal ============================================ -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/css/mdb.min.css" rel="stylesheet">
    <!-- Modal ============================================ -->
</head>

<body>
    <!-- START Include for Header -->
        <?php include "../php/header.php" ?> 
    <!-- END Include for Header -->
    
    <!-- START Include for Menu -->
         <?php include "../php/menu.php" ?> 
    <!-- END Include for Menu-->
    
    <!-- Breadcomb area Start-->
    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <h2 style="text-align:center;margin: auto;">לקוחות</h2>
                        </div>
                        <input type="text" class="searchBarStyle" id="mySearch" onchange="myFunction()" placeholder="חפש לקוח" title="Type in a category">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcomb area End-->
    
<!-- Search at Data Table Start-->
<!-- Search at Data Table End-->

    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <!-- button trigger the modal -->
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="centerTableTr tableBoldText"> פרטים נוספים </th>
                                        <th class="centerTableTr">מייל </th>
                                        <th class="centerTableTr">מספר טלפון </th>
                                        <th class="centerTableTr">תעודת זהות </th>
                                        <th class="centerTableTr">שם משפחה</th>
                                        <th class="centerTableTr">שם פרטי</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php

                                        require_once('../php/Database.php');
                                        global $db;
                                        echo '<div id="isManagerParameterForThatUser" style="display:none;">' .$_SESSION['isManager'] .'</div>';
                                        $db->query("SET CHARACTER SET 'hebrew'");
                                        $db->query("SET NAMES 'utf8'");
                                        $result = $db ->query('select * from customers');
                                        
                                        //print_r($result);
                                        //$result = $result->fetch_assoc();  //for testing
                                        
                                        
                                        while($row = $result->fetch_assoc()){
                                            echo '<tr>';
                                            echo '<td>';
                                            echo '<button type="button" data-toggle="modal" data-target="#' .$row['customerId'] .'">';
                                            echo 'עריכה';
                                            echo '</button>';
                                            echo '</td>';
                                           echo '<td class="centerTableTr">' .$row['email'] .'</td>';
                                           echo ' <td class="centerTableTr">' .$row['phone'] .'</td>';
                                           echo ' <td class="centerTableTr">' .$row['customerId'] .'</td>';
                                           echo ' <td class="centerTableTr">' .$row['lastName'] .'</td>';
                                          echo ' <td class="centerTableTr">' .$row['firstName'] .'</td>';
                                       echo '</tr> ';
                                        }
                                        
                                         echo '</tbody> </table> </div>';
                                         //////////End Of table//////////////////////////
                                         $sql = 'select * from customers';
                                        $modalQueryCreate = $db ->query($sql);
                                        while($row = $modalQueryCreate->fetch_assoc()){
                                            ///////////MODAL//////////////////////////////
                                                /////////CUSTOMER//////////
                                                $customerId = $row['customerId'];
                                                $customerDetailsString = "select * from customers where customerId='" .$customerId ."'";
                                                $customerDetails = $db->query($customerDetailsString);
                                                $customerDetails = $customerDetails->fetch_assoc();
                                                echo '<div class="modal" id="' .$row['customerId'] .'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">';
                                                  echo '<div class="modal-dialog modal-lg" role="document">';
                                                    echo '<div class="modal-content">';
                                                      echo '<div class="modal-header">';
                                                        echo '<h4 class="modal-title" id="myModalLabel" style="text-align:center;">';
                                                			echo ' פרטי לקוח ';
                                                			echo '<br>' .$row['firstName'] .' ' .$row['lastName'];
                                                  		echo '</h4>';
                                                      echo '</div>';
                                                      echo '<div class="modal-body" style="text-align:center;">';
                                                         echo '<table DIR="RTL" class="modalTable">';
                                                          echo '<tr>';
                                                                echo '<th class="fontSizeModalTable">
                                                                    שם פרטי 
                                                                </th>';
                                                                echo '<th class="fontSizeModalTable">
                                                                    שם משפחה
                                                                </th>';
                                                                echo '<th class="fontSizeModalTable">
                                                                    תעודת זהות 
                                                                </th>';
                                                                echo '<th class="fontSizeModalTable">
                                                                    טלפון
                                                                </th>';
                                                                echo '<th class="fontSizeModalTable">
                                                                    מייל
                                                                </th>';
                                                            echo '</tr>';
                                                            //////////
                                                           $customerDetailsQuery = "select * from customers where customerId='" .$customerId ."'";
                                                           $customerDetails = $db->query($customerDetailsQuery);
                                                          ////////
                                                            echo '<tr>';
                                                              echo '<th class="fontSizeModalTable" id="firstName' .$row['customerId'] .'">' .$row['firstName'] .'</th>';
                                                              echo '<th class="fontSizeModalTable" id="lastName' .$row['customerId'] .'">' .$row['lastName'] .'</th>';
                                                              echo '<th class="fontSizeModalTable" id="customerId' .$row['customerId'] .'">' .$row['customerId'] .'</th>';
                                                              echo '<th class="fontSizeModalTable" id="phone' .$row['customerId'] .'">' .$row['phone'] .'</th>';                                                              
                                                              echo '<th class="fontSizeModalTable" id="email' .$row['customerId'] .'">' .$row['email'] .'</th>';
                                                            echo '</tr>';
                                                        echo '</table>';
                                                      echo '</div>';
                                                     
                                                    //////END BODY TABLE GOES HERE////////////
                                                      echo '<div class="modal-footer">';
                                                        echo '<button type="button" class="btn btn-default" data-dismiss="modal" style="float: left;display: block; margin: auto;">';
                                                		echo 'סגור';
                                                		echo '</button>';
                                                		echo '<div id="hiddenFormForResetPass" style="display:none;"></div>';
                                                		echo '<div id="hiddenFormForupdateCustomer" style="display:none;"></div>';
                                                		echo '<div id="hiddenFormForDeleteCustomer" style="display:none;"></div>';
                                                		echo '<button type="button" class="btn btn-default buttonForManagers" data-dismiss="modal" id="deleteBtn' .$row['customerId'] .'" onclick="deleteCustomer(' .$row['customerId'] .')" style="float: left;display: block; margin: auto;">';
                                                		echo 'מחק ';
                                                		echo '</button>'; 
                                                		 echo '<button type="button" class="btn btn-default buttonForManagers" id="updateBtn' .$row['customerId'] .'" onclick="updateCustomer(' .$row['customerId'] .')" style="float: left;display: block; margin: auto;">';
                                                		echo 'עדכן  ';
                                                		echo '</button>'; 
                                                	   echo '</div>';
                                                    echo '</div>';
                                                  echo '</div>';
                                                echo '</div>';
                                        }
                                    ?>

    <!-- Data Table area End-->
    <!-- Button trigger modal -->
                 
<!-- Button trigger modal -->
<div class="buttonMargin">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewCustomer">
  הוספת לקוח חדש
</button>
</div>

<!-- Modal -->
<div class="modal" id="addNewCustomer"      tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
<!--<div class="modal fade" id="addNewCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLabel" style="text-align:center" >יצירת לקוח חדש</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="" class="formRight">
        <p> <input type="text" name="firstName" id="firstName" pattern= "[A-Za-z א-ת]+" title="אנא הזן אותיות בלבד" required    > &nbsp; :שם פרטי </p>
        <p> <input type="text" name="lastName" id="lastName"  pattern= "[A-Za-z א-ת]+" title="אנא הזן אותיות בלבד" required   > &nbsp;:שם משפחה</p>
        <p> <input type="text" name="customerId" id="id" pattern= "[0-9]{8,9}" title="אנא הזן מספרים בלבד" required > &nbsp;:תעודת זהות</p>
        <p> <input type="tel" name="phone" id="phone"  pattern="05?[0-9]-?[0-9]{7}" title="אנא הזן מספר סלולרי תקין" required > &nbsp;:מספר טלפון</p>
        <p> <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="אנא הזן כתובת מייל תקינה" required  >&nbsp; :כתובת מייל</p>
        </div>
      <div class="modal-footer">
        <input type="button" value="סגור" data-dismiss="modal">
        <input type="submit" value="שמור" name="addCustomer" >
      </div>
    </form>
  </div>
  </div>
</div>

<?php
    if(isset($_POST['addCustomer'])){
        require_once('../php/Customer.php');
        global $customer;
        $customer->addNewCustomer();
        $isCustomerAddedSuccessfully;
        if($isCustomerAddedSuccessfully){
            //echo "<script type='text/javascript'> $(window).load(function(){ $('#customerAdded').modal('show'); }); </script>";
        }
        else{
           // echo "<script type='text/javascript'> $(window).load(function(){ $('#errorCustomerAdd').modal('show'); }); </script>";
        }
    }
    if(isset($_POST['deleteCustomerId'])){
        require_once('../php/Customer.php');
        global $customer;
        echo 'inside tje delete';
        $result = $customer->deleteCustomer();
    }
    if(isset($_POST['customerIdForUpdate'])){
        require_once('../php/Customer.php');
        global $customer;
        $result = $customer->updateCustomer();
    }
    
?>

    <!-- Start Footer area-->
    <div class="footer-copyright-area">
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
        
    <!--Bootstrap JS-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!--AJAX JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
        
        
    <!-- jquery ============================================ -->
    <script src="../js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS ============================================ -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- wow JS ============================================ -->
    <script src="../js/wow.min.js"></script>
    <!-- price-slider JS ============================================ -->
    <script src="../js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS ============================================ -->
    <script src="../js/owl.carousel.min.js"></script>
    <!-- scrollUp JS ============================================ -->
    <script src="../js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS ============================================ -->
    <script src="../js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS ============================================ -->
    <script src="../js/counterup/jquery.counterup.min.js"></script>
    <script src="../js/counterup/waypoints.min.js"></script>
    <script src="../js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS ============================================ -->
    <script src="../js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jvectormap JS ============================================ -->
    <script src="../js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../js/jvectormap/jvectormap-active.js"></script>
    <!-- sparkline JS ============================================ -->
    <script src="../js/sparkline/jquery.sparkline.min.js"></script>
    <script src="../js/sparkline/sparkline-active.js"></script>
    <!-- flot JS ============================================ -->
    <script src="../js/flot/jquery.flot.js"></script>
    <script src="../js/flot/jquery.flot.resize.js"></script>
    <script src="../js/flot/jquery.flot.pie.js"></script>
    <script src="../js/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../js/flot/jquery.flot.orderBars.js"></script>
    <script src="../js/flot/curvedLines.js"></script>
    <script src="../js/flot/flot-active.js"></script>
    <!-- knob JS ============================================ -->
    <script src="../js/knob/jquery.knob.js"></script>
    <script src="../js/knob/jquery.appear.js"></script>
    <script src="../js/knob/knob-active.js"></script>
    <!--  wave JS ============================================ -->
    <script src="../js/wave/waves.min.js"></script>
    <script src="../js/wave/wave-active.js"></script>
    <!--  Chat JS ============================================ -->
	<script src="../js/chat/moment.min.js"></script>
    <script src="../js/chat/jquery.chat.js"></script>
    <!--  todo JS ============================================ -->
    <script src="../js/todo/jquery.todo.js"></script>
    <!-- plugins JS ============================================ -->
    <script src="../js/plugins.js"></script>
    <!-- main JS ============================================ -->
    <script src="../js/main.js"></script>


</body>

</html>
