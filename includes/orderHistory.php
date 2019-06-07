<?php
    session_start();
    if(!isset($_SESSION['userEmail'])){
        header('Location: http://amitsl.mtacloud.co.il');
    }

?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Progan Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <!-- our CSS ============================================ -->
    <link rel="stylesheet" href="../css/ourCss/style.css">
    <!-- responsive CSS	============================================ -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- modernizr JS ============================================ -->
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Modal ============================================ -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/css/mdb.min.css" rel="stylesheet">
    <!-- Modal ============================================ -->
    <!-- Bootstrap And JQuery ============================================ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
    <!-- jquery ============================================ -->
    <script src="../js/vendor/jquery-1.12.4.min.js"></script>
     <!-- bootstrap JS ============================================ -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Script for everyone ============================================ -->
    <script src="../js/ourJs/scriptForEveryone.js"></script>
    <script src="../js/ourJs/orderScript.js"></script>
    <!-- Modal Scripts ============================================ -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

</head>

<body>
    <!-- START Include for Header -->
        <?php include "../php/header.php"?> 
        <?php include 'ChromePhp.php'?>
    <!-- END Include for Header -->

    <!-- START Include for Menu -->
         <?php include "../php/menu.php" ?> 
    <!-- END Include for Menu-->
    
<!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 style="text-align:center">היסטוריית מכירות</h2>
                   <input type="text" id="mySearch" class="searchBarStyle" onchange="myFunction()" placeholder="חפש מכירה " title="Type in a category">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="centerTableTr tableBoldText">פרטי המכירה</th>
                                        <th class="centerTableTr tableBoldText">נוצר בתאריך </th>
                                        <th class="centerTableTr tableBoldText">מחיר כולל מע"מ</th>
                                        <th class="centerTableTr tableBoldText">שם הלקוח</th>
                                        <th class="centerTableTr tableBoldText">מספר מכירה</th>
                                    </tr>
                                </thead>
                                <tbody>
                                      <?php
                                        require_once('../php/Database.php');
                                        echo '<div id="isManagerParameterForThatUser" style="display:none;">' .$_SESSION['isManager'] .'</div>';
                                        global $db;
                                        $db->query("SET CHARACTER SET 'hebrew'");
                                        $db->query("SET NAMES 'utf8'");
                                        $sql = "select DISTINCT * from orders o";
                                        $ordersDetails = $db ->query($sql);
                                        while($row = $ordersDetails->fetch_assoc()){
                                            $customerEmail = $row['customerEmail'];
                                            $customerDetails = "select * from customers where email='" .$customerEmail ."'";
                                            $customerDetailsQuery = $db->query($customerDetails);
                                            $customerDetailsQuery = $customerDetailsQuery->fetch_assoc();
                                            echo '<tr>';
                                            echo '<td>';
                                                echo '<button type="button" data-toggle="modal" data-target="#' .$row['orderid'] .'">';
                                                echo 'פרטי הזמנה';
                                                echo '</button>';
                                            echo '</td>';
                                            echo ' <td class="centerTableTr">' .$row['datecreated'] .'</td>';
                                            echo ' <td class="centerTableTr">' .$row['totalOrderPrice'] .'</td>';
                                            echo ' <td class="centerTableTr">' .$customerDetailsQuery['firstName'] .' ' .$customerDetailsQuery['lastName'] .'</td>';
                                            echo ' <td class="centerTableTr">' .$row['orderid'] .'</td>';
                                            echo '</tr> ';
                                        }
                                        echo '</tbody></table></div></div></div></div></div></div>';
                                        //////////End Of table//////////////////////////
                                        $result2 = $db ->query($sql);
                                        
                                        while($row = $result2->fetch_assoc()){
                                            ///////////MODAL//////////////////////////////
                                            $customerIdL = $row['customerEmail'];
                                            $customerDetails = "select * from customers where email='" .$customerIdL ."'";
                                            $customerDetailsQuery = $db->query($customerDetails);
                                            $customerDetailsQuery = $customerDetailsQuery->fetch_assoc();
                                            echo '<div class="modal fade" id="' .$row['orderid'] .'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
                                              echo '<div class="modal-dialog modal-lg" role="document">';
                                                echo '<div class="modal-content">';
                                                  echo '<div class="modal-header">';
                                                    echo '<h4 class="modal-title" id="myModalLabel" style="text-align:center;">';
                                                			echo 'פרטי מכירה ';
                                                			echo $row['orderid'] .'<br>לקוח - ' .$customerDetailsQuery['firstName'] .' ' .$customerDetailsQuery['lastName']
                                                			.' ' .$customerDetailsQuery['phone']
                                                			;
                                                  		echo '</h4>';
                                                  echo '</div>';
                                                  echo '<div class="modal-body" style="text-align:center;">';
                                                     echo '<table DIR="RTL" class="modalTable">';
                                                      echo '<tr>';
                                                        echo '<th class="fontSizeModalTable ">
                                                            #
                                                        </th>';
                                                        echo '<th class="fontSizeModalTable">
                                                            שם
                                                        </th>';
                                                        echo '<th class="fontSizeModalTable">
                                                            מק"ט
                                                        </th>';
                                                        echo '<th class="fontSizeModalTable">
                                                            מחיר מוצר
                                                        </th>';
                                                        echo '<th class="fontSizeModalTable">
                                                            כמות
                                                        </th>';
                                                      $orderQuery = "select * from orderProducts where orderId =" .$row['orderid'];
                                                      $odetails = $db->query($orderQuery);
                                                      $productCounter = 1;
                                                      $totalProductsPrice = 0;
                                                      while ($orderDetail = $odetails->fetch_assoc()){
                                                          $productCounterLoop = $productCounter;
                                                        echo '<tr>';
                                                            echo '<th class="fontSizeModalTable productClassCounter' .$row['orderid'] .'">' .$productCounterLoop .'</th>';
                                                            echo '<th class="fontSizeModalTable" id="productName' .$row['orderid'] .'-' .$productCounter .'">' .$orderDetail['productName'] .'</th>';
                                                            echo '<th class="fontSizeModalTable" id="productId' .$row['orderid'] .'-' .$productCounter .'">' .$orderDetail['productId'] .'</th>';
                                                            echo '<th class="fontSizeModalTable" id="productPrice' .$row['orderid'] .'-' .$productCounter .'">' .$orderDetail['totalPrice'] .'</th>';
                                                            echo '<th class="fontSizeModalTable" id="productQuantity' .$row['orderid'] .'-' .$productCounter .'">' .$orderDetail['quantity'] .'</th>';
                                                        echo '</tr>';
                                                        $totalProductsPrice += $orderDetail['totalPrice'];
                                                        $productCounter += 1;
                                                     }
                                                    echo '</table><br><br>';
                                                    echo '<table DIR="RTL" class="modalTable">';
                                                            echo '<tr>';
                                                            echo '<th class="modalTableButton">מחיר  מוצרים : </th>';
                                                            echo '<th class="modalButtonValue" id="totalProductsPrice' .$row['orderid'] .'">' .$totalProductsPrice ."</th>";
                                                            echo '</tr>';
                                                            
                                                            echo '<tr>';
                                                                echo '<th class="modalTableButton">מחיר סופי:</th>';
                                                                echo '<th class=" modalButtonValue" id="totalOrderPrice' .$row['orderid'] .'">' .$totalProductsPrice*1.17 .'</th>';
                                                            echo '</tr>';
                                                        echo '</table>';
                                                //////END BODY TABLE GOES HERE////////////
                                                  echo '</div>';
                                                  echo '<div class="modal-footer">';
                                                    echo '<button type="button" class="btn btn-default" data-dismiss="modal" style="float: left;display: block; margin: auto;">';
                                                		echo 'סגור';
                                                		echo '</button>';
                                                		echo '<button type="button" class="btn btn-default buttonForManagers" data-dismiss="modal" onclick="deleteOrder(' .$row['orderid'] .')" style="float: left;display: block; margin: auto;">';
                                                		echo 'מחק מכירה';
                                                		echo '</button>'; 
                                                		echo '<div id="hiddenFormForDeleteOrder" style="display:none;"></div>';
                                                        echo '<button type="button" class="btn btn-default buttonForManagers" onclick="updateButton(' .$row['orderid'] .')" id="updateBtnInModal' .$row['orderid'] .'" style="float: left;display: block; margin: auto;">';
                                                		echo 'ערוך';
                                                		echo '</button>';   
                                                	    echo '<div id="hiddenFormForUpdateOrder" style="display:none;"></div>';
                                                		 echo '<button type="button" disabled class="btn btn-default buttonForManagers" onclick="cancelButtun(' .$row['orderid'] .')" id="updateBtnInModalCancel' .$row['orderid'] .'" style="float: left;display: block; margin: auto;">';
                                                		echo 'ביטול';
                                                		echo '</button>';
                                                  echo '</div>';
                                                echo '</div>';
                                              echo '</div>';
                                            echo '</div>';
                                        }
                                    ?>

    <!-- Data Table area End-->

    <!-- Start Footer area-->
    <div class="footer-copyright-area" onload="myFunction()">
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
    <?php
        require_once('../php/Order.php');
        global $order; 
        if(isset($_POST['deleteOrderId'])){
            $orderId = $_POST['deleteOrderId'];
            $order->deleteOrder($orderId);
        }
        if(isset($_POST['orderIdNumber'])){
            $orderId = $_POST['orderIdNumber'];
            $order->updateOrder($orderId);
        }
    ?>
    <!-- End Footer area-->
    <!-- Modal ============================================ -->
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/js/mdb.min.js"></script>
    <!-- Modal ============================================ -->
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
        <!-- Search at Data Table Start-->
    <script src="../js/ourJs/orderScript.js"></script>
    
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

</body>

</html>
