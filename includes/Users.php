<?php
	$host="localhost";
	$user="amitsl_amitsl_p";
	$password="amit1234";
	$DB="amitsl_progan";
	
	//create connection
	header('Content-Type: text/html; charset=utf-8');
	$conn=new mysqli($host,$user,$password,$DB);
	$conn->query("SET NAMES 'utf8'");

	//check
	if ($conn->connect_error){
    		die("Connection failed: ".$conn->connect_error);}
    		else
    
                    $firstName=$_POST['firstName'];
                	//$namel=iconv('UTF-8','UTF-8//IGNORE',$name);
                	$lastName = $_POST['lastName'];
                	$email=$_POST['email'];
                	$userStatusId=$_POST['userStatusId'];
                	$phone=$_POST['phone'];


    $sql="select * from users";
	$result=$database->query($sql);
	if (isset($result))
    		print_r($result);
	else
    		echo "No data retrieved";

    $sql= "select * from users";
    $result = $database -> query($sql);
    print_r($result);
?>

<!doctype html>
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
    <!-- responsive CSS	============================================ -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- modernizr JS ============================================ -->
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
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
                            <h2 style="text-align:center">משתמשים</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcomb area End-->
    
        <!-- Search at Data Table Start-->
<script>
    function isExistingCellStartWith(children, length, filter) {
        let td;
         for (child = 1; child < length; child++) {  
             td = children[child];
             if(td.innerHTML.toUpperCase().startsWith(filter)) {
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
    
<!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="centerTableTr">סוג הרשאה</th>
                                        <th class="centerTableTr">מייל</th>
                                        <th class="centerTableTr">שם משתמש</th>
                                        <input type="text" id="mySearch" onchange="myFunction()" placeholder="חפש משתמש" title="Type in a category">
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="centerTableTr">מנהל</td>
                                        <td class="centerTableTr">ami@gmail.com</td>
                                        <td class="centerTableTr">עמי מרציאנו</td>

                                    </tr>
                                    <tr>
                                        <td class="centerTableTr">מנהל</td>
                                        <td class="centerTableTr">ami@gmail.com</td>
                                        <td class="centerTableTr">עמי מרציאנו</td
                                    </tr>
                                    <tr>
                                        <td class="centerTableTr">מנהל</td>
                                        <td class="centerTableTr">ami@gmail.com</td>
                                        <td class="centerTableTr">עמי מרציאנו</td
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->

<!-- Button trigger modal -->
<div class="buttonMargin">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  הוספת משתמש חדש
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLabel" style="text-align:center" >יצירת משתמש חדש</h5>
      </div>
      <div class="modal-body">
        <form class="formRight">
        <p> <input type="text" id="firstName"> &nbsp; :שם פרטי </p>
        <p> <input type="text" id="lastName"> &nbsp;:שם משפחה</p>
        <p> <input type="text" id="userName"> &nbsp;:שם משתמש</p>
        <p> <input type="email" id="email">&nbsp; :כתובת מייל</p>
        <p> <select name=select1>  
                <option value="1">מנהל</option>  
                <option value="2">עובד</option>  
            </select>
            &nbsp; :סוג הרשאה
        </p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">סגור</button>
        <button type="button" class="btn btn-primary">שמור</button>
      </div>
    </div>
  </div>
</div>


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
        

        
        
    <!-- jquery ============================================ -->
    <script src="../js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS ============================================ -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- wow JS ============================================ -->
    <script src="../js/wow.min.js"></script>
    <!-- price-slider JS ============================================ -->
    <script src="js/jquery-price-slider.js"></script>
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
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
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