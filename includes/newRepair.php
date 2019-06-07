<?php
    session_start();
  /*  if(!isset($_SESSION['userEmail'])){
        header('Location: http://amitsl.mtacloud.co.il');
    }*/

?>
<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Progan Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- OUR CSS ============================================ -->
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
    <!-- Bootstrap And JQuery ============================================ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
        <!-- jquery ============================================ -->
    <script src="../js/vendor/jquery-1.12.4.min.js"></script>
     <!-- bootstrap JS ============================================ -->
    <script src="../js/bootstrap.min.js"></script>

</head>

<body>
    <!-- START Include for Header -->
   <?php include "../php/header.php" ?> 
    <!-- END Include for Header -->
    <!-- START Include for Menu -->
     <?php include "../php/menu.php" ?> 
    <!-- END Include for Menu-->
    
    <!-- START BODY-->
    <form method="POST" action="">
        <div class="form-element-area">
            <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-element-list">
                                <div class="basic-tb-hd">
                                    <h1 class="centerText">תיקון חדש</h1><br>
                                    <h2 id="test">פרטי הלקוח</h2>
                                </div>
                                <!--Start Customer Details-->
                                <div class="row">
                                    <!--Element in Row-->
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 textRight" style="float:right;padding:0px;">
                                        <div class="form-group ic-cmp-int float-lb floating-lb" style="margin:10px auto;text-align:center;">
                                          שם פרטי
                                            <input type="text" name = "firstName" pattern= "[A-Za-z א-ת]+" title="אנא הזן אותיות בלבד" required class="form-control">
                                        </div>
                                    </div>
                                    <!--Element in Row-->
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 textRight" style="float:right;padding:0px;">
                                        <div class="form-group ic-cmp-int float-lb floating-lb" style="margin: 10px auto;text-align:center;">
                                          שם משפחה
                                            <input type="text" name = "lastName" pattern= "[A-Za-z א-ת]+" title="אנא הזן אותיות בלבד" required class="form-control">
                                        </div>
                                    </div>
                                    <!--Element in Row-->
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 textRight" style="float:right;padding:0px;">
                                        <div class="form-group ic-cmp-int float-lb floating-lb" style="margin:10px auto;text-align:center;">
                                            טלפון
                                            <input type="text" name = "phone"  pattern="05?[0-9]-?[0-9]{7}" title="אנא הזן מספר סלולרי תקין" required class="form-control">
                                        </div>
                                    </div>
                                    <!--Element in Row-->
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 textRight" style="float:right;padding:0px;">
                                        <div class="form-group ic-cmp-int float-lb floating-lb" style="margin:10px auto;text-align:center;">
                                            תעודת זהות
                                            <input type="text" name = "customerId"   pattern= "[0-9]{8,9}" title="אנא הזן מספרים בלבד" required class="form-control">
                                        </div>
                                    </div>
                                    <!--Element in Row-->
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 textRight" style="float:right;padding:0px;">
                                        <div class="form-group ic-cmp-int float-lb floating-lb" style="margin:10px auto;text-align:center;">
                                            אי-מייל
                                            <input type="text" name = "customerEmail"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="אנא הזן כתובת מייל תקינה" required class="form-control">
                                        </div>
                                    </div>
                                    <!--Element in Row-->
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 textRight" style="float:right;padding:0px;">
                                        <div class="form-group ic-cmp-int float-lb floating-lb" style="margin:10px auto; text-align:center;">
                                            היכן נקנה
                                            <input type="text" name = "comment" pattern= "[A-Za-z א-ת]+" title="אנא הזן אותיות בלבד"   class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <!--END Customer Details-->
        <!-- Data Table area Start-->
                <div class = "row">
                    <div class="data-table-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="data-table-list">
                                        <div class="basic-tb-hd">
                                            <h2 style="text-align:center">מוצרים</h2>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="data-table-basic" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="centerTableTr"></th>
                                                        <th class="centerTableTr" >מספר ימים משוער לתיקון</th>
                                                        <th class="centerTableTr" >מחיר משוער</th>
                                                        <th class="centerTableTr" >פירוט הבעיה</th>
                                                        <th class="centerTableTr" >מק"ט</th>
                                                        <th class="centerTableTr" >שם המוצר</th>
                                                        <th><a href="#!" style="font-size:30px;" id="addNewRow" ><span class="glyphicon glyphicon-plus"></span></a></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="productsTable">
                                                    <tr>
                                                        <td style="padding:25px;"><a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a></td>
                                                        <td><input type="text" class="form-control" name="estimateRepairDays1" pattern= "[0-9]+" title="אנא הזן מספרים בלבד" required></td>
                                                        <td><input type="text" class="form-control" name="estimatePrice1" pattern= "[0-9]+" title="אנא הזן מספרים בלבד" required></td>
                                                        <td><input type="text" class="form-control" name="repairDescription1"  pattern= "[A-Za-z א-ת]+" title="אנא הזן אותיות בלבד" required ></td>
                                                        <td><input type="text" class="form-control" name="repairProductId1" pattern= "[0-9]+" title="אנא הזן מספרים בלבד" required></td>
                                                        <td><input type="text" class="form-control" name="repairProductName1"  pattern= "[A-Za-z 0-9 א-ת]+" title="אנא הזן אותיות בלבד" required ></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- Repair details -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-element-list">
                                <div class="basic-tb-hd">
                                    <h2 id="test">פרטי תיקון</h2>
                                </div>
                                <div class="row">
                                    <!--Element in Row-->
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 textRight" style="float:right;padding:0px;">
                                        <div class="form-group ic-cmp-int float-lb floating-lb" style="margin:10px auto;text-align:center;">
                                            סה"כ מחיר לתיקון
                                            <input type="text" name = "priceForTotalRepair"  pattern= "[0-9]+" title="אנא הזן מספרים בלבד" required class="form-control">
                                        </div>
                                    </div>
                                    <!--Element in Row-->
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 textRight" style="float:right;padding:0px;">
                                        <div class="form-group ic-cmp-int float-lb floating-lb" style="margin:10px auto;text-align:center;">
                                            הערות
                                            <input type="text" name = "comment2"   pattern= "[A-Za-z א-ת]+" title="אנא הזן אותיות בלבד" class="form-control">
                                        </div>
                                    </div>
                                    <input style="display:block;margin:auto;"type="submit" value="שמור תיקון" name="addRepair">
                                </div>
                            </div>
                        </div>
                    </div>
            <!--END Customer Details-->
            </div>
        </div>   
    </form>
    <!-- END BODY-->
    
    <!-- PHP SEND FORM-->
        <?php
            session_start();
            if($_POST['addRepair']){
                require_once('../php/Repair.php');
                $isRepairAddedSuccessfully = false;
                $isCustomerDetailsOK = FALSE;
                $isProductsAddedOk = false;
                global $repair;
                $repair->addNewRepair();
                if($isRepairAddedSuccessfully && $isCustomerDetailsOK){ 
                /*order added */
                echo "<script type='text/javascript'> $(window).load(function(){ $('#repairAddedSuccessfully').modal('show'); }); </script>";

                }else if (!$isCustomerDetailsOK){
                /*Detaild issues*/
                echo "<script type='text/javascript'> $(window).load(function(){ $('#invalidCustomerDetails').modal('show'); }); </script>";

                }else if (!$isRepairAddedSuccessfully || !$isProductsAddedOk){
                /*Product issues*/
                echo 'inside last if<br>' ;
                echo "<script type='text/javascript'> $(window).load(function(){ $('#invalidProductsOrder').modal('show'); }); </script>";

                }
            }
        ?>
    <!-- PHP SEND FORM-->
    
<!--Modal for order added-->
    <div class="modal fade" id="repairAddedSuccessfully" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style ="text-align:center;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                הזמנה נוספה בהצלחה
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            הזמנתך נוספה בהצלחה
           <br>
            כעת אתה יכול לראות את ההזמנה בעמוד היסטוריית המכירות
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin:auto;display:block;">
                סגור
            </button>
          </div>
        </div>
      </div>
    </div>
    
<!--Modal for Repair added-->
    
<!--Modal for Customer details invalid - Repair did not added successfully-->
    <div class="modal fade" id="invalidCustomerDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style ="text-align:center;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                מצטערים אך הזמנתך לא נוספה בהצלחה
                </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            נראה כי היתה בעיה עם פרטי הלקוח
            <br>
            אנא נסה שנית
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin:auto;display:block;">
                סגור
            </button>
          </div>
        </div>
      </div>
    </div>
    
<!--Modal for Customer details invalid - Repair did not added successfully-->

<!--Modal for error added the order products were invalid-->
    <div class="modal fade" id="invalidProductsOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"style ="text-align:center;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                מצטערים אך הזמנתך לא נוספה בהצלחה
                </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            נראה כי היתה בעיה עם המוצרים שהוזנו או כלל ההזמנה
            <br> 
            אנא נסה שנית
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin:auto;display:block;">
                סגור
            </button>
          </div>
        </div>
      </div>
    </div>
<!--Modal for error added the order products were invalid-->

    
    
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

    <!-- wow JS ============================================ -->
    <script src="../js/wow.min.js"></script>
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
    <!--Script to add new rows with count ids-->
    <script src="../js/ourJs/jsForNewRowsRepair.js">></script>

</body>
</html>
