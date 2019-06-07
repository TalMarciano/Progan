<!DOCTYPE html>
<?php
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
    if(!isset($_SESSION['userEmail'])){
        header('Location: http://amitsl.mtacloud.co.il');
    }

?>
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
    <!-- Script for everyone ============================================ -->
    <script src="../js/ourJs/scriptForEveryone.js"></script>
    <script src="../js/ourJs/rentInventory.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> 

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
                            <table dir = "rtl" id="data-table-basic" class="table table-striped">
                            <!-- Button trigger modal -->
                                <button type="button" style="float:left;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                הוספת מוצר חדש  
                                </button>
                                <input type="text" id="mySearch" style ="float:right;" onchange="myFunction()" placeholder="חפש מוצר" title="Type in a category">
                            <thead>
                            <tr>
                                <th class="centerTableTr">שם המוצר</th>
                                <th class="centerTableTr">מק"ט</th>
                                <th class="centerTableTr">שם הספק</th>
                                <th class="centerTableTr">תיאור המוצר</th>
                                <th class="centerTableTr">יח' זמינות להשכרה</th>
                                <th class="centerTableTr">מחיר השכרה ליום</th>
                                <th class="centerTableTr"></th>
                                <th class="centerTableTr"></th>

                            </tr>
                            </thead>
                            <tbody>
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
                                            echo ' <td class="centerTableTr" id="productName' .$row['productId'] .'">' .$row['productName'] .'</td>';
                                            echo ' <td class="centerTableTr" id="productId' .$row['productId'] .'">' .$row['productId'] .'</td>';
                                            echo ' <td class="centerTableTr" id="vendor' .$row['productId'] .'">' .$row['vendor'] .'</td>';
                                            echo ' <td class="centerTableTr" id="productDescription' .$row['productId'] .'">' .$row['productDescription'] .'</td>';
                                            echo ' <td class="centerTableTr" id="unit' .$row['productId'] .'">' .$row['unit'] .'</td>';
                                            echo '<td class="centerTableTr" id="priceDay' .$row['productId'] .'">' .$row['priceDay'] .'</td>';
                                            echo '<td class="centerTableTr"><button type="button" class="buttonForManagers btn btn-primary waves-effect" id="updateProductInRentInventory' .$row['productId']  .'" onclick="updateProduct(' .$row['productId'] .')">ערוך</button></td>';   
                                            echo '<td class="centerTableTr"><button type="button" class="buttonForManagers btn btn-primary waves-effect" id="deleteProductInRentInventory' .$row['productId']  .'" onclick="deleteProduct(' .$row['productId'] .')">מחק</button></td>';   
                                        echo '</tr> ';
                                        
                                }
                                echo '</tbody></table>';
                                echo '<div id="isManagerParameterForThatUser" style="display:none;">' .$_SESSION['isManager'] .'</div>';
                        		echo '<div id="hiddenFormForDeleteProductFromRentInvet" style="display:none;"></div>';
                        		echo '<div id="hiddenFormForUpdateProductFromRentInvet" style="display:none;"></div>';
                        		

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
    <?php
        require_once('../php/Products.php');
        global $products;    
        if(isset($_POST['productNameForUpdate'])){
            $result = $products->updateProductToRentInventory();
            if($result == 1){
                echo '<meta http-equiv="refresh" content="0">';
            }
            else{
                 echo "<script type='text/javascript'>
                    Swal.fire({
                      position: 'center',
                      type: 'error',
                      title: 'הייתה בעיה ',
                      text: 'אנא נסה שנית או פנה לממונים',
                      showConfirmButton: true,
                      timer: 60000
                    });
                    </script>"; 
            }
        }
        //////////this is for new product//////////////
        if(isset($_POST['saveProduct'])){
            $result = $products->addNewProductToRentInventory();
            $isProductAdd = false;
            echo $isProductAdd;
            if($isProductAdd == 1){
                echo '<meta http-equiv="refresh" content="0">';
            }
            else{ 
                 echo "<script type='text/javascript'>
                    Swal.fire({
                      position: 'center',
                      type: 'error',
                      title: 'הייתה בעיה ',
                      text: 'אנא נסה שנית או פנה לממונים',
                      showConfirmButton: true,
                      timer: 60000
                    });
                    </script>";   
            }
                
        }
        //////////this is for new product//////////////

        if(isset($_POST['deleteProductFromRentInvent'])){
            $result = $products->deleteProductFromRentInvent();
            $isProductDeleted = false;
            if($result == 1){
                echo '<meta http-equiv="refresh" content="0">';
            }
            else{ 
                 echo "<script type='text/javascript'>
                    Swal.fire({
                      position: 'center',
                      type: 'error',
                      title: 'הייתה בעיה ',
                      text: 'אנא נסה שנית או פנה לממונים',
                      showConfirmButton: true,
                      timer: 60000
                    });
                    </script>";   
            }
        }
        
    ?>
    
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
          <div class="modal-body" style="text-align: right">
            <form method="POST" class="formRight">
            
            <p> <input type="text" name="productName" pattern= "[A-Za-z 0-9 א-ת]+" title="אנא הזן אותיות או ספרות בלבד" required > &nbsp; :שם מוצר </p>
            <p> <input type="text" name="productId"  pattern= "[0-9]+" title="אנא הזן מספרים בלבד" required > &nbsp; :מק"ט</p>
            <p> <input type="text" name="vendor"  pattern= "[A-Za-z א-ת]+" title="אנא הזן אותיות בלבד" required  > &nbsp; :ספק </p>
            <p> <input type="text" name="productDescription"  pattern= "[A-Za-z 0-9 א-ת]+" title="אנא הזן אותיות או ספרות בלבד" required> &nbsp; :תיאור מוצר </p>
            <p> <input type="text" name="unit"  pattern= "[0-9]+" title="אנא הזן מספרים בלבד" required  > &nbsp; :יח' זמינות להשכרה </p>
            <p> <input type="text" name="priceDay"   pattern="[0-9]+" title="אנא הזן מספרים בלבד" required > &nbsp; :מחיר השכרה ליום </p>

            </div>
          <div class="modal-footer">
            <input type="button" value="סגור" data-dismiss="modal">
            <input type="submit" value="שמור" name="saveProduct" >
          </div>
        </form>
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

</body>

</html>
