<?php
    session_start();
    /*  if(!isset($_SESSION['userEmail'])){
        header('Location: http://amitsl.mtacloud.co.il');
    }*/

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
   <!--  //<script src="../js/ourJs/scriptForEveryone.js"></script> -->
    <!-- Modal Scripts ============================================ -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
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
                            <h2 style="text-align:center;margin:auto;">מלאי</h2>
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
                            <h2 style="text-align:center"> מלאי מוצרים למכירה</h2>
                            <input type="text" style="display: block;margin: auto;" id="mySearch" onchange="myFunction()" placeholder=" חפש מוצר" title="Type in a category">
                        </div>
                        <div class="table-responsive">
                            <table dir="rtl" id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="centerTableTr">שם המוצר</th>
                                        <th class="centerTableTr">מק"ט</th>
                                        <th class="centerTableTr">תיאור המוצר</th>
                                        <th class="centerTableTr">כמות</th>
                                        <th class="centerTableTr">תקופת אחריות</th>
                                        <th class="centerTableTr">מחיר עלות</th>
                                        <th class="centerTableTr">מחיר מכירה</th>
                                        <th class="centerTableTr"> פרטים נוספים</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        echo '<div id="isManagerParameterForThatUser" style="display:none;">' .$_SESSION['isManager'] .'</div>';
                                        $urlForAllProducts = 'https://progangar.wixsite.com/mysite/_functions/getTheProducs';
                                        $resultFromSite = json_decode(file_get_contents($urlForAllProducts, true));
                                        $productCounter = 0;
                                        $res = $resultFromSite->items;
                                        foreach($res as $key => $value){
                                            //var_dump($value);
                                            echo '<tr>';
                                             echo   '<td class="centerTableTr">' .$value->name .'</td>';
                                                echo '<td class="centerTableTr">' .$value->itemId .'</td>';
                                                echo '<td class="centerTableTr">' .$value->shortDescription .'</td>';
                                                echo '<td class="centerTableTr">' .$value->inventory .'</td>';
                                                echo '<td class="centerTableTr">' .$value->warranty .'</td>';
                                                echo '<td class="centerTableTr">' .$value->salePrice .'</td>';
                                                echo '<td class="centerTableTr">' .$value->regularPrice .'</td>';
                                                echo '<td>';
                                                    echo '<button type="button" data-toggle="modal" data-target="#' .$value->itemId .'">';
                                                        echo 'לעריכה';
                                                        echo '</button>';
                                                echo '</td>';
                                            echo '</tr>';
                                        }
                                        echo '</tbody></table></div></div></div></div></div></div>';
                                        $resForModal = $resultFromSite->items;
                                        /////////////////////Modal Create for each Product//////////////
                                        foreach($res as $key => $value){
                                            echo '<div class="modal" id="' .$value->itemId .'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static>';
                                              echo '<div class="modal-dialog modal-lg" role="document">';
                                                echo '<div class="modal-content">';
                                                  echo '<div class="modal-header">';
                                                    echo '<h4 class="modal-title" id="myModalLabel" style="text-align:center;">';
                                                  echo ' פרטי מוצר ';
                                                  echo $value->name;
                                                  echo '</h4>';
                                                  echo '</div>';
                                                  echo '<div class="modal-body" style="text-align:center;">';
                                                     echo '<div id="productIdForWix'.$value->itemId .'" style="display:none;">' .$value->_id .'</div>';
                                                     echo '<table DIR="RTL" class="modalTable tableBorder" ">';
                                                     /////////////////
                                                      echo '<tr>';
                                                            echo '<th class="fontSizeModalTable tableBorder">
                                                                מ"קט 
                                                            </th>';
                                                            echo '<th class="fontSizeModalTable tableBorder">';
                                                                  echo '<input class="classForInputProductsTableEdir" type="text" id="productId'.$value->itemId  .'" value="' .$value->itemId .'">';
                                                            echo '</th>';
                                                        echo '</tr>';
                                                     /////////////////
                                                       echo '<tr>';
                                                            echo '<th class="fontSizeModalTable tableBorder">
                                                                שם מוצר
                                                            </th>';
                                                            echo '<th class="fontSizeModalTable tableBorder">';
                                                              echo '<input class="classForInputProductsTableEdir" type="text" id="productName'.$value->itemId .'" value="' .$value->name .'">';
                                                             echo '</th>';
                                                        echo '</tr>';
                                                        ////////////////
                                                       echo '<tr>';
                                                            echo '<th class="fontSizeModalTable tableBorder">
                                                                תיאור קצר
                                                            </th>';
                                                            echo '<th class="fontSizeModalTable tableBorder">';
                                                              echo '<input class="classForInputProductsTableEdir" type="text" id="shortDescription'.$value->itemId .'" value="' .preg_replace("/[^a-zA-Z]/", "", $value->shortDescription) .'">';
                                                            echo '</th>';
                                                        echo '</tr>';
                                                        ////////////////
                                                       echo '<tr>';
                                                            echo '<th class="fontSizeModalTable tableBorder">
                                                                תיאור ארוך
                                                            </th>';
                                                            echo '<th class="fontSizeModalTable tableBorder">';
                                                              echo '<input class="classForInputProductsTableEdir" type="text" id="longDescription'.$value->itemId .'" value="' .$value->description .'">';
                                                             echo '</th>';
                                                        echo '</tr>';
                                                        ////////////////
                                                       echo '<tr>';
                                                            echo '<th class="fontSizeModalTable tableBorder">
                                                                מחיר רגיל
                                                            </th>';
                                                            echo '<th class="fontSizeModalTable tableBorder">';
                                                              echo '<input class="classForInputProductsTableEdir" type="text" id="regularPrice' .$value->itemId .'" value="' .$value->regularPrice .'">';
                                                             echo '</th>';
                                                        echo '</tr>';
                                                        ////////////////
                                                       echo '<tr>';
                                                            echo '<th class="fontSizeModalTable tableBorder">
                                                                מחיר מכירה
                                                            </th>';
                                                            echo '<th class="fontSizeModalTable tableBorder">';
                                                              echo '<input class="classForInputProductsTableEdir" type="text" id="salePrice' .$value->itemId .'" value="' .$value->salePrice .'">';
                                                             echo '</th>';
                                                        echo '</tr>';
                                                    ////////////////
                                                       echo '<tr>';
                                                            echo '<th class="fontSizeModalTable tableBorder">
                                                                    תמונות
                                                                </th>';
                                                            echo '<th class="fontSizeModalTable tableBorder">';
                                                                 echo '<input class="classForInputProductsTableEdir" type="text" id="images' .$value->itemId .'" value="' .$value->images .'">';
                                                            echo '</th>';
                                                        echo '</tr>';
                                                    echo '</table><br><br>';
                                           
                                                //////END BODY TABLE GOES HERE////////////
                                                  echo '</div>';
                                                  echo '<div class="modal-footer">';
                                                    echo '<button type="button" class="btn btn-default" data-dismiss="modal" style="float: left;display: block; margin: auto;">';
                                                echo 'סגור';
                                                echo '</button>';
                                                echo '<button type="button" class="btn btn-default buttonForManagers" data-dismiss="modal" onclick="deleteProduct(' .$value->itemId .')" style="float: left;display: block; margin: auto;">';
                                                echo 'מחק מוצר';
                                                echo '</button>'; 
                                                    echo '<button type="button" class="btn btn-default buttonForManagers" onclick="updateProduct(' .$value->itemId .')" style="float: left;display: block; margin: auto;">';
                                                echo 'שמור';
                                                echo '</button>';   
                                                  echo '<div id="hiddenFormForDeleteProduct" style="display:none;"></div>';
                                                echo '<div id="hiddenFormForUpdateProduct" style="display:none;"></div>';
                                                  echo '</div>';
                                                echo '</div>';
                                              echo '</div>';
                                            echo '</div>';     
                                        }
                                        /////////////////////Modal Create for each Product//////////////
                                        
                                        
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
        
<?php
    if($_POST['deleteProductId']){
        require_once('../php/Products.php');
        global $products;
        $result = $products->deleteProductFromWix();
        
    }
    if($_POST['productIdValue']){
        echo 'inside the if';
        require_once('../php/Products.php');
        global $products;
        $products->updateProductFromWix();
        echo '<br> after the function';
     
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
    <script src="../js/ourJs/productInventoryScript.js"></script>
    <script src="../js/ourJs/scriptForEveryone.js"></script> 


</body>

</html>
