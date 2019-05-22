<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Progan Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/ourCss/style.css" rel="stylesheet">
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
                            <h2 style="text-align:center">מלאי</h2>
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



    
    
<!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2 style="text-align:center">מלאי מוצרים להשכרות</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                    
        
<!-- Button trigger modal -->
<span class="buttonMargin" class= "textRight">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
הוספת מוצר חדש
</button>
</span>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            
            <h3 class="modal-title" id="exampleModalLabel" style="text-align:center" >
                הוספת מוצר חדש
                </h3>
          </div>
          <div class="modal-body">
            <form method="POST" class="formRight">
            
            <p> <input type="text" name="productName"> &nbsp; :שם מוצר </p>
            <p> <input type="text" name="productId" > &nbsp; :מק"ט</p>
            <p> <input type="text" name="vendor" > &nbsp; :ספק </p>
            <p> <input type="text" name="productDescription" > &nbsp; :תיאור מוצר </p>
            <p> <input type="text" name="unit" > &nbsp; :יח' זמינות להשכרה </p>
            <p> <input type="text" name="priceD" > &nbsp; :מחיר השכרה ליום </p>

            </div>
          <div class="modal-footer">
            <input type="button" value="סגור" data-dismiss="modal">
            <input type="submit" value="שמור" name="register" >
          </div>
        </form>
     </div>
      </div>
    </div>
     
    
                                <thead>
                                    <tr>
                                        <th class="centerTableTr">מחיר השכרה ליום</th>
                                        <th class="centerTableTr">יח' זמינות להשכרה</th>
                                        <th class="centerTableTr">תיאור המוצר</th>
                                        <th class="centerTableTr">שם הספק</th>
                                        <th class="centerTableTr">מק"ט</th>
                                        <th class="centerTableTr">שם המוצר</th>
                                        <input type="text" id="mySearch" onchange="myFunction()" placeholder="חפש מוצר" title="Type in a category">
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php

                                        require_once('../php/Database.php');
                                        global $db;
                                        $db->query("SET CHARACTER SET 'hebrew'");
                                        $db->query("SET NAMES 'utf8'");
                                        $result = $db ->query('select * from rentInventory');
                                        
                                        //print_r($result);
                                        //$result = $result->fetch_assoc();  //for testing
                                        
                                        
                                        while($row = $result->fetch_assoc()){
                                            echo '<tr>';
                                            echo '<td class="centerTableTr">' .$row['priceDay'] .'</td>';
                                            echo ' <td class="centerTableTr">' .$row['unit'] .'</td>';
                                            echo ' <td class="centerTableTr">' .$row['productDescription'] .'</td>';
                                            echo ' <td class="centerTableTr">' .$row['vendor'] .'</td>';
                                            echo ' <td class="centerTableTr">' .$row['productId'] .'</td>';
                                            echo ' <td class="centerTableTr">' .$row['productName'] .'</td>';
                                       echo '</tr> ';
                                        }
                                    ?>
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
    
    
     
          
        <?php
        require_once('../php/Database.php');
    global $db;
    $db->query("SET CHARACTER SET 'hebrew'");
    $db->query("SET NAMES 'utf8'");
		        if(!$db->get_connection()){
                    die("Connection failed!");
		        }
		        else{
               //     $rentId = filter_input(INPUT_POST, 'rentId'); 
                    $productId = filter_input(INPUT_POST, 'productId'); 
                    $productName = filter_input(INPUT_POST, 'productName');
                    $priceD = filter_input(INPUT_POST, 'priceDay');
                    $vendor = filter_input(INPUT_POST, 'vendor');
                    $productDescription = filter_input(INPUT_POST, 'productDescription');
                    $unit = filter_input(INPUT_POST, 'unit');


           /*         if(User::checkUserName($email)){
        		        echo "<script type='text/javascript'>Swal.fire('Failed to register', 'Email is invalid.', 'error')</script>";
                    }
          
                    else if(User::checkNameAndLastName($firstName, $lastName)){
        		        echo "<script type='text/javascript'>Swal.fire('Failed to register', 'Name or Last name is invalid.', 'error')</script>";
                    }
*/
               //    else{
                        $sql = "INSERT INTO rentInventory(productName, productId, vendor, productDescription, unit, priceDay) 
                        values ('" .$productName ."','" .$productId ."', '".$vendor ."','" .$productDescription."',".$unit ."," .$priceDay .")";
                        echo $sql; 
                        $result = $db->query($sql);
	                	Print_r ($result);
                        if(!$result ){
                            global $errorAddedUser;
                            $errorAddedUser = TRUE;
                            $invalidRegister = TRUE;
                        }
                        else{
                            $invalidRegister = FALSE;
                            global $userAddedSucessfuly;
                            $userAddedSucessfuly = TRUE;
                    }
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
