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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Progan Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <!-- Google Fonts ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- OUR CSS ============================================ -->
    <link rel="stylesheet" href="../css/ourCss/style.css">
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
    <!-- responsive CSS	============================================ -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- modernizr JS ============================================ -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    
</head>

<body>
    <!-- START Include for Header -->
   <?php include "../php/header.php" ?> 
    <!-- END Include for Header -->
    <!-- START Include for Menu -->
     <?php include "../php/menu.php" ?> 
    <!-- END Include for Menu-->
    
    <!-- Start Status area -->
    <?php
        require_once('../php/Database.php');
        require_once('../php/User.php');
        global $user;
        global $db;
        
        $db->query("SET CHARACTER SET 'hebrew'");
        $db->query("SET NAMES 'utf8'");
    ?>
    
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <i class='fas fa-users' style='font-size:48px; color:#009999'></i>
						<div class="website-traffic-ctn">
						    
						<?php
                            $result = $db ->query('SELECT COUNT(customerId) AS NumberOfCustomers FROM customers');
                            $row = $result->fetch_assoc();
                            echo '<h2><span class="counter" style="text-align:right; padding-left:90px;">' .$row['NumberOfCustomers']. '</span></h2>';
                        ?>
                        
                            <p style="text-align:right; padding-left: 50px;">סך הלקוחות</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <i class='fas fa-shopping-basket' style='font-size:48px;color:green'></i>
						<div class="website-traffic-ctn">
						    
						<?php
                            $result = $db ->query('SELECT COUNT(rentId) AS NumberOfRents FROM rents');
                            $row = $result->fetch_assoc();
                            echo '<h2><span class="counter" style="text-align:right; padding-left:90px;">' .$row['NumberOfRents']. '</span></h2>';
                        ?>
                        
                            <p style="text-align:right; padding-left: 50px;">סך ההשכרות</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <i class="material-icons" style="font-size:48px;color:blue">build</i>
						<div class="website-traffic-ctn">
						    
						<?php
                            $result = $db ->query('SELECT COUNT(repairId) AS NumberOfRepairs FROM repair');
                            $row = $result->fetch_assoc();
                            echo '<h2><span class="counter" style="text-align:right; padding-left:90px;">' .$row['NumberOfRepairs']. '</span></h2>';
                        ?>
                        
                            <p style="text-align:right; padding-left: 50px;">סך התיקונים</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <i class='fas fa-shopping-cart' style='font-size:48px;color:#cc0000'></i>
						<div class="website-traffic-ctn">
						    
						<?php
                            $result = $db ->query('SELECT COUNT(orderid) AS NumberOfOrders FROM orders');
                            $row = $result->fetch_assoc();
                            echo '<h2><span class="counter" style="text-align:right; padding-left:90px;">' .$row['NumberOfOrders']. '</span></h2>';
                        ?>
                        
                            <p style="text-align:right; padding-left: 50px;">סך המכירות</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Status area-->
    <!-- Start Sale Statistic area-->
    <div class="sale-statistic-area" style="text-align:center; ">
        <div class="container">
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                    <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                           <canvas id="canvas" width="210" height="210"
                               style="background-color:">
                           </canvas>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                    <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                        <div class="past-day-statis">
                            <h2>השכרות לפי סטטוס</h2>
                        </div>
						<div class="dash-widget-visits"></div>
                        <div class="past-statistic-an">
                            <div class="past-statistic-ctn">
                                <?php
                                    $result = $db ->query('SELECT COUNT(rentid) AS NumberOfRentsByStatus FROM rents WHERE rentStatusId=1');
                                    $row = $result->fetch_assoc();
                                    echo '<h3><span class="counter">' .$row['NumberOfRentsByStatus']. '</span></h3>';
                                ?>
                                <p>השכרות בפועל</p>
                            </div>
                            <div class="past-statistic-graph">
                                <div <i class='fas fa-thermometer-empty' style='font-size:48px;color:#cc0000'> </div>
                            </div>
                        </div>
                        <div class="past-statistic-an">
                            <div class="past-statistic-ctn">
                                <?php
                                    $result = $db ->query('SELECT COUNT(rentid) AS NumberOfRentsByStatus FROM rents WHERE rentStatusId=2');
                                    $row = $result->fetch_assoc();
                                    echo '<h3><span class="counter">' .$row['NumberOfRentsByStatus']. '</span></h3>';
                                ?>
                                <p>השכרות שהושלמו</p>
                            </div>
                            <div class="past-statistic-graph">
                                <div <i class='fas fa-thermometer-full' style='font-size:48px;color:#009900'></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                    <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                        <div class="past-day-statis">
                            <h2>תיקונים לפי סטטוס</h2>
                        </div>
						<div class="dash-widget-visits"></div>
                        <div class="past-statistic-an">
                            <div class="past-statistic-ctn">
                                <?php
                                    $result = $db ->query('SELECT COUNT(repairid) AS NumberOftreatRepair FROM repair WHERE repairStatusId=1');
                                    $row = $result->fetch_assoc();
                                    echo '<h3><span class="counter">' .$row['NumberOftreatRepair']. '</span></h3>';
                                ?>
                                <p>תיקונים בטיפול</p>
                            </div>
                            <div class="past-statistic-graph">
                                <div <i class='fas fa-thermometer-empty' style='font-size:48px;color:#cc0000'> </div>
                            </div>
                        </div>
                        <div class="past-statistic-an">
                            <div class="past-statistic-ctn">
                                <?php
                                    $result = $db ->query('SELECT COUNT(repairid) AS NumberOftreatRepair FROM repair WHERE repairStatusId=2');
                                    $row = $result->fetch_assoc();
                                    echo '<h3><span class="counter">' .$row['NumberOftreatRepair']. '</span></h3>';
                                ?>
                                <p>תיקונים שהושלמו</p>
                            </div>
                            <div class="past-statistic-graph">
                                <div <i class='fas fa-thermometer-half' style='font-size:48px;color:#ffcc00'></div>
                            </div>
                        </div>
                        <div class="past-statistic-an">
                            <div class="past-statistic-ctn">
                                <?php
                                    $result = $db ->query('SELECT COUNT(repairid) AS NumberOftreatRepair FROM repair WHERE repairStatusId=3');
                                    $row = $result->fetch_assoc();
                                    echo '<h3><span class="counter">' .$row['NumberOftreatRepair']. '</span></h3>';
                                ?>
                                <p>תיקונים שנאספו</p>
                            </div>
                            <div class="past-statistic-graph">
                                <div <i class='fas fa-thermometer-full' style='font-size:48px;color:#009900'></div>
                            </div>
                        </div>
                    </div>
                </div>
                        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
            <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                <?php
                    $userMail = $_SESSION['userEmail'];
                    $queryForUserDetails = "SELECT firstName, lastName, email FROM users where email = '" .$userMail ."'";
                    $result = $db ->query($queryForUserDetails);
                    while ($row = $result->fetch_assoc()){
                        echo '<p> שלום ' .$row['firstName']. " ". $row['lastName'].'</p>';
                    }
                ?>
                        <p>!ברוך הבא</p>
                        <p>על מנת לשנות את הססמא</p>
                        <button type="button" class="btn btn-info" data-toggle="collapse" id="openModalForUpdatePassword" data-target="#modalForChangePassword">שינוי ססמא</button>
                        <button type="submit" class="btn btn-info" name="logout" id="logoutBtn"> התנתק</button>

                </div>
            </div>
        </div>
    </div>


    <!-- End Sale Statistic area-->
    <!-- Start Email Statistic area-->
    <div class="notika-email-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="recent-items-wp notika-shadow sm-res-mg-t-30">
                        <div class="rc-it-ltd">
                            <div class="recent-items-ctn">
                                <div class="recent-items-title">
                                  <h2><i class='far fa-user-circle' style='font-size:23px;color:#3366ff'></i>&nbsp&nbspמשתמשים   </h2>
                                  <p> </p>
                                </div>
                            </div>
                            <div class="recent-items-inn">
                                <table class="table table-inner table-vmiddle">
                                    <thead>
                                        <tr>
                                            <th> נוצר בתאריך</th>
                                            <th>שם המשתמש</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                         $result = $db ->query('SELECT firstName, lastName, dateCreated FROM users');
                                         while($row = $result->fetch_assoc()){
                                            echo '<tr>';
                                            echo ' <td>' .$row['dateCreated'].'</td>';
                                           echo ' <td>' .$row['firstName']. " ". $row['lastName'].'</td>';
                                       echo '</tr> ';
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
							<div id="recent-items-chart"></div>
                        </div>
                    </div>
                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="recent-items-wp notika-shadow sm-res-mg-t-30">
                        <div class="rc-it-ltd">
                            <div class="recent-items-ctn">
                                <div class="recent-items-title">
                                  <h2><i class='fas fa-shopping-basket' style='font-size:20px;color:green'></i>&nbsp&nbspמוצרים להשכרה   </h2>
                                  <p> </p>
                                </div>
                            </div>
                            <div class="recent-items-inn">
                                <table class="table table-inner table-vmiddle">
                                    <thead>
                                        <tr>
                                            <th> כמות </th>
                                            <th>שם המוצר</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                         $result = $db ->query('SELECT productName, unit FROM rentInventory');
                                         while($row = $result->fetch_assoc()){
                                            echo '<tr>';
                                            echo ' <td>' .$row['unit'].'</td>';
                                            echo ' <td>' .$row['productName'].'</td>';
                                       echo '</tr> ';
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
							<div id="recent-items-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="recent-items-wp notika-shadow sm-res-mg-t-30">
                        <div class="rc-it-ltd">
                            <div class="recent-items-ctn">
                                <div class="recent-items-title">
                                  <h2><i class='fas fa-shopping-cart' style='font-size:20px;color:#cc0000;'></i>&nbsp&nbspמכירות מהשבוע האחרון   </h2>
                                  <p> </p>
                                </div>
                            </div>
                            <div class="recent-items-inn">
                                <table class="table table-inner table-vmiddle">
                                    <thead>
                                        <tr>
                                            <th>מספר מכירה</th>
                                            <th>שם הלקוח</th>
                                            <th style="width: 60px">סה"כ בש"ח</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                         $result = $db ->query('select orderid, firstName, lastName, totalOrderPrice from orders o join customers c on 
                                         o.customerEmail=c.email where o.datecreated between date_sub(now(),INTERVAL 1 WEEK) and now()');
                                         while($row = $result->fetch_assoc()){
                                            echo '<tr>';
                                           echo '<td class="f-500 c-cyan">' .$row['orderid'] .'</td>';
                                           echo ' <td>' .$row['firstName']. " ". $row['lastName'].'</td>';
                                           echo ' <td class="f-500 c-cyan">' .$row['totalOrderPrice'] .'</td>';
                                       echo '</tr> ';
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
							<div id="recent-items-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Email Statistic area-->
    <div id=calendar style="height:620px;">
        <div  style ="height: 500px;float: left;width: 80%;margin: 0.5% 0%;padding: 0px;height:90%;">
            <iframe src="https://calendar.google.com/calendar/embed?src=teaesmq2n1tcophfpll6lkg3vk%40group.calendar.google.com&ctz=Asia%2FJerusalem" style="margin: auto;float:right; border-width: 0;width: 75%; height: 100%;"}></iframe>
        </div>
        <div style ="width: 20%;margin: auto;clear: both;height:10%;">
             <button id="authorize_button" class="btn btn-info" style="display: none;margin:2% auto;">הזדהה בגוגל קאלאנדר</button>
             <button id="signout_button" class="btn btn-info"  style="display:none;margin:2% auto;">התנתק מגוגל קאלאנדר</button>
             <button type="button" class="btn btn-info" id="addNewEventToCalanderButton" data-toggle="collapse" style="margin:auto;" data-target="#modalForAddNewEvent">הוספת אירוע</button>
        </div>
    </div>
        <!-- Start clock Script-->

<script>
    
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
drawClock();

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>
    <!--End clock Script-->
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
    
<!-- Modal for change password-->
        <!-- Modal -->
          <div class="modal" id="modalForChangePassword" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" style="text-align:center;">שינוי סיסמא</h4>
                </div>
                <div class="modal-body">
                    <table dir="rtl">
                        <tr>
                            <th  class="modalTableButton">אנא הזן סיסמא חדשה:</th>
                            <th> 
                                <input class="" style="width:100%;" type="password" name="passwordInputChange" id="password1">
                            </th>
                        </tr>
                        <tr>
                            <th  class="modalTableButton">אנא הזן שוב את הסיסמא:</th>
                            <th> 
                                <input class="modalButtonValue" type="password" name="passwordInputForValidate" id="password2">
                            </th>
                        </tr>
                    </table>
                </div>
                <div id="hiddenFormForUpdatePassword" style="display:none;"></div>
                <div id="hiddenFormForLogout" style="display:none;"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="closeModalForChangePassword" data-dismiss="modal">סגור</button>
                    <button type="button" class="btn btn-default" id="updateUserPassword" data-dismiss="modal">עדכן</button>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- Modal for change password-->
   
<!-- Modal for Add new Event calander--><!-- Modal -->
<div class="modal" id="modalForAddNewEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" style="text-align:center;">  
                הוספת אירוע חדש ליומן פרוגן
            </h4>
        </div>
        <div class="modal-body" style="text-align:center;">
                <table DIR="RTL" class="modalTable">
                    <tr>
                        <th class="fontSizeModalTable">
                            תיאור
                        </th>
                        <th class="fontSizeModalTable">
                            <input type="text" id="eventSummery">
                        </th>
                    <tr>
                        <th class="fontSizeModalTable productClassCounter500001" >
                            מיקום האירוע
                        </th>
                        <th class="fontSizeModalTable"> 
                            <input type="text" id="eventLocation">
                        </th>
                    </tr>
                    <tr>
                        <th class="fontSizeModalTable productClassCounter500001" >
                            תיאור האירוע
                        </th>
                        <th class="fontSizeModalTable"> 
                            <input type="text" id="eventDescription">
                        </th>
                    </tr>
                    <tr>
                        <th class="fontSizeModalTable productClassCounter500001" >
                            תאריך האירוע
                        </th>
                        <th class="fontSizeModalTable"> 
                            <input type="text" id="eventDate">
                        </th>
                    </tr>
                    <tr>
                        <th class="fontSizeModalTable productClassCounter500001" >
                            שעת תחילת האירוע
                        </th>
                        <th class="fontSizeModalTable"> 
                            <input type="text" id="eventStartTime">
                        </th>
                    </tr>
                    <tr>
                        <th class="fontSizeModalTable productClassCounter500001" >
                            שעת סיום האירוע
                        </th>
                        <th class="fontSizeModalTable"> 
                            <input type="text" id="eventEndTime">
                        </th>
                    </tr>
                    </table>
                    </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-default" data-dismiss="modal" id="closeEventToCalanderButton" style="margin: auto;">
                                סגור
                            </button>
                             <button type="button"  class="btn btn-default" data-dismiss="modal" id="addEventToGoogleCalander" onclick="addEventToCalander()" style="margin: auto;">
                                הוסף אירוע
                            </button>
                    </div>
                </div>
            </div>
        </div>
<!-- Modal for Add new Event calander-->


   <?php
    //////////////////////////////////////////////////////////change password - check query/////////////////////////////////////////////////////
        if(isset($_POST['passwordInputChange'])){
            $email = $_SESSION['userEmail'];
            $user->updateUserPasswordDashboard($email);
           }
        if(isset($_POST['logout'])){
            $user->logout();
            echo '<meta http-equiv="refresh" content="0">';
        }   
    ?>
    
    <!-- End Footer area-->
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="../js/ourJs/dashboardScript.js"></script>
    <script src="../js/ourJs/googleCalanderApi.js"></script>
    <script src="https://apis.google.com/js/api.js"></script>
    
    <script async defer src="https://apis.google.com/js/api.js"
    onload="this.onload=function(){};handleClientLoad()"
    onreadystatechange="if (this.readyState === 'complete') this.onload()">
    
</script>



</body>

</html>
