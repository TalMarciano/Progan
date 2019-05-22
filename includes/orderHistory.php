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
                            <h2 style="text-align:center">היסטוריית מכירות</h2>
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
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="centerTableTr">פרטי המכירה</th>
                                        <th class="centerTableTr">נוצר בתאריך </th>
                                        <th class="centerTableTr">מחיר כולל</th>
                                        <th class="centerTableTr">שם הלקוח</th>
                                        <th class="centerTableTr">מספר מכירה</th>
                                        <input type="text" id="mySearch" onchange="myFunction()" placeholder="חפש מכירה " title="Type in a category">
                                    </tr>
                                </thead>
                                <tbody>
                                      <?php
                                        require_once('../php/Database.php');
                                        global $db;
                                        $db->query("SET CHARACTER SET 'hebrew'");
                                        $db->query("SET NAMES 'utf8'");
                                        $sql = "select * from orders o JOIN customers oc ON o.customerEmail=oc.email";
                                        $result = $db ->query($sql);
                                        while($row = $result->fetch_assoc()){
                                            echo '<tr>';
                                            echo '<td> <a  data-toggle="modal" href="#'  .$row['orderid']  .'"> check </a></td>';
                                            echo ' <td class="centerTableTr">' .$row['dateCreated'] .'</td>';
                                            echo ' <td class="centerTableTr">' .$row['totalOrderPrice'] .'</td>';
                                            echo ' <td class="centerTableTr">' .$row['firstName'].' '.$row['lastName'] .'</td>';
                                            echo ' <td class="centerTableTr">' .$row['orderid'] .'</td>';
                                            echo '</tr> ';
                                        }
                                        echo '</tbody></table></div></div></div></div></div></div>';
                                        $result2 = $db ->query($sql);
                                        while($row = $result2->fetch_assoc()){
                                        ///////////MODAL//////////////////////////////
                                                echo '<!-- Modal: modalOrder -->';
                                                echo '<div class="modal fade" id="' .$row['orderid'] .'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                                                  echo '<div class="modal-dialog" role="document">';
                                                    echo '<div class="modal-content">';
                                                      echo '<!--Header-->';
                                                       echo '<h4 class="modal-title" style="text-align:center;" id="myModalLabel">';
                                                         echo $row['orderid'] .'<br>' .$row['firstName'] .' ' .$row['lastName'] .'<br>' .$row['customerEmail'] .'</h4>';
                                                         echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                                     echo '<!--Body-->';
                                                      echo '<div class="modal-body">';
                                                        echo '<table class="table table-hover">';
                                                          echo '<thead>';
                                                            echo '<tr>';
                                                            echo '<th>כמות</th>';
                                                              echo '<th>מחיר</th>';
                                                              echo '<th>קוד מוצר</th>';
                                                              echo '<th>שם מוצר</th>';
                                                              echo '<th>#</th>';
                                                            echo '</tr>';
                                                          echo '</thead>';
                                                          echo '<tbody>';
                                                          $orderQuery = "select * from orders o JOIN orderProducts op ON op.orderId=o.orderid Join products p on p.productid = op.productId where o.orderid = " .$row['orderid'];
                                                          $odetails = $db->query($orderQuery);
                                                          $productCounter = 0;
                                                          while ($orderDetail = $odetails->fetch_assoc()){
                                                            echo '<tr>';
                                                              echo '<th scope="row">' .$orderDetail['quantity'] .'</th>';
                                                              echo '<th>' .$orderDetail['totalPrice'] .'</th>';
                                                              echo '<th>' .$orderDetail['productId'] .'</th>';
                                                              echo '<th>' .$orderDetail['productName'] .'</th>';
                                                              echo '<td>' .$productCounter + 1 .'</td>';
                                                            echo '</tr>';
                                                            $productCounter += 1;
                                                          }
                                                          echo '</tbody>';
                                                        echo '</table>';
                                                      echo '</div>';
                                                      echo '<h4 style="text-align:center;" class="modal-title">מחיר סופי ';
                                                        echo '<span>' .$row['totalOrderPrice'] .'</span>';
                                                      echo '</h4>';
                                                      echo '<!--Footer-->';
                                                      echo '<div class="modal-footer">';
                                                 			  echo '<button style="margin:auto" type="button" class="btn btn-outline-primary" data-dismiss="modal">סגור</button>';
                                                      echo '</div></div></div></div><!-- Modal: modalCart -->';
                                              //////////////////////////////////////// 
                                        }
                                        ?>

    <!-- Data Table area End-->
   
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
    

</body>

</html>
