<!doctype html>
<link  rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
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
        <!-- style CSS ============================================ -->
    <link rel="stylesheet" href="../css/ourCss/style.css">
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
    
    <!-- Form Element area Start-->
    <form method="POST" action="">
    <div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="basic-tb-hd">
                            <h1 class="centerText">תיקון חדש</h2><br>
                            <h2 id="test">פרטי הלקוח</p>
                        </div>
                        <div class="cmp-tb-hd bcs-hd">
                        </div>
                        <div class="row">
                            <div class= "textRight" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="nk-int-st">
                                        שם פרטי<input type="text" name = "firstName" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class= "textRight" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="nk-int-st">
                                        שם משפחה<input type="text" name = "lastName" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class= "textRight" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="nk-int-st">
                                        מספר טלפון<input type="text" name = "phone"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class= "textRight" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="nk-int-st">
                                        אי-מייל <input type="text" name = "customerEmail"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class= "textRight" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="nk-int-st">
                                        תעודת זהות<input type="text" name = "customerId" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                 </div>
                </div>
            </div>
            
             <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list mg-t-30">
                        <div class="basic-tb-hd">
                        </div>
                    </div>
                </div>
            </div>

<script>
function addRowHandlers() {
    var table = document.getElementById("data-table-basic");
    var rows = table.getElementsByTagName("tr");
    for (i = 1; i < rows.length; i++) {
        var row = table.rows[i];
        row.onclick = function(myrow){
                          return function() { 
                             var cell = myrow.getElementsByTagName("td")[0];
                             var id = cell.innerHTML;
                             alert("id:" + id);
                      };
                  }(row);
    }
}
</script>

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
                                        <th><a href="javascript:void(0);" style="font-size:30px;" id="addMore" title="Add More Person"><span class="glyphicon glyphicon-plus"></span></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a></td>
                                        <td><input type="text" class="form-control" name="estimateRepairDays"></td>
                                        <td><input type="text" class="form-control" name="estimatePrice"></td>
                                        <td><input type="text" class="form-control" name="repairDescription"></td>
                                        <td><input type="text" class="form-control" name="repairProductId"></td>
                                        <td><input type="text" class="form-control" name="repairProductName"></td>
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
    
<!-- Data Table area End-->
    
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list mg-t-30">
                        <div class="cmp-tb-hd">

                            <h2 class="centerText">פרטי התיקון </p>
                        </div>
                        <div class="row">
                            <div class="textRight" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="nk-int-st">
                                        סה"כ מחיר לתיקון<input type="text" name="totalPriceRepair" class="form-control">
                                    </div>
                                </div>
                            </div>
                             <div class="textRight" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="nk-int-st">
                                        הערות<input type="text" name="repairComment" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                <input class="marginAndFloat" type="submit" value="שמור תיקון" name="addRepair">
                     
                    </div>
                </div>
            </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    </form>
    <!-- Form Element area End-->
    <!-- Datepicker area Start-->
    <!-- Datepicker area End-->
    <!-- Color Picker area Start-->
    <!-- Color Picker area End-->
    <!-- Summernote area Start-->
    <!-- Summernote area End-->
    <!-- Dropzone area Start-->
    <!-- Dropzone area End-->
    
<?php
      if($_POST['addRepair']){
            require_once('../php/Database.php');
            global $db;
            $db->query("SET CHARACTER SET 'hebrew'");
            $db->query("SET NAMES 'utf8'");
            if(!$db->get_connection()){
                die("Connection failed!");
            }
            else{
                $firstName = filter_input(INPUT_POST, 'firstName'); 
                $lastName = filter_input(INPUT_POST, 'lastName'); 
                $phone = filter_input(INPUT_POST, 'phone');
                $customerEmail = filter_input(INPUT_POST, 'customerEmail');
                $customerId = filter_input(INPUT_POST, 'customerId');
                $repairProductName = filter_input(INPUT_POST, 'repairProductName');
                $repairProductId = filter_input(INPUT_POST, 'repairProductId');
                $repairDescription = filter_input(INPUT_POST, 'repairDescription');
                $estimatePrice = filter_input(INPUT_POST, 'estimatePrice');
                $estimateRepairDays = filter_input(INPUT_POST, 'estimateRepairDays');
                $totalPriceRepair = filter_input(INPUT_POST, 'totalPriceRepair');
                $repairComment = filter_input(INPUT_POST, 'repairComment');
                $repairStatusId = filter_input(INPUT_POST, '1');
                /*if(User::checkUserName($email)){
    		        echo "<script type='text/javascript'>Swal.fire('Failed to register', 'Email is invalid.', 'error')</script>";
                }
      
                else if(User::checkNameAndLastName($firstName, $lastName)){
    		        echo "<script type='text/javascript'>Swal.fire('Failed to register', 'Name or Last name is invalid.', 'error')</script>";
                }
    
               else{*/
                    //$repairid = $db->query("SELECT orderid FROM orders ORDER BY orderid DESC LIMIT 0, 1");
                    //echo $orderid['orderid'];
                    
                    $sql1 = "INSERT INTO customers(firstName, lastName, phone, email, customerId, dateCreated) 
                    values ('" .$firstName ."','" .$lastName ."','" .$phone ."','" .$customerEmail ."','" .$customerId ."', now())";
                    echo $sql1 .' This is after sql query '; 
                    $result1 = $db->query($sql1);
                   	Print_r ($result1); 
                   	$sql2 = "INSERT INTO repair(repairProductName, repairProductId, repairDescription, estimatePrice, estimateRepairDays, totalPriceRepair, repairComment, customerId, dateCreated) 
                    values ('".$repairProductName ."'," .$repairProductId. ",'".$repairDescription."',".$estimatePrice.", ".$estimateRepairDays.", ".$totalPriceRepair.", '".$repairComment."', '" .$customerId ."', now())";
                    echo $sql2; 
                    $result2 = $db->query($sql2);
                   	Print_r ($result2); 
                   	$sql3 = "INSERT INTO repairStatuses(repairStatus, customerId, productId) 
                    values ('1','".$customerId."','".$repairProductId."')";
                    echo $sql3; 
                    $result3 = $db->query($sql3);
                   	Print_r ($result3); 
            
                    if(!$result1 || !$result2 || !$result3){
                        global $errorAddedUser;
                        $errorAddedUser = TRUE;
                        $invalidRegister = TRUE;
                    }
                    else{
                        $invalidRegister = FALSE;
                        global $userAddedSucessfuly;
                        $userAddedSucessfuly = TRUE;
                       // echo '<meta http-equiv="refresh" content="0">'; //for reload page
                }
                
              /*  while($row = $result3->fetch_assoc()){
                                            echo '<tr>';
                                            if ($row['repairStatus'] == 1){
                                                echo '<td class="centerTableTr">בטיפול</td>';
                                            }
                                            else if ($row['repairStatus'] == 2){
                                                echo '<td class="centerTableTr">הושלם</td>'
                                            }
                                            else{
                                                    echo '<td class="centerTableTr">נאסף</td>';

                                            }
                                           echo '<td class="centerTableTr">' .$row['email'] .'</td>';
                                           echo ' <td class="centerTableTr">' .$row['userName'] .'</td>';
                                           echo ' <td class="centerTableTr">' .$row['lastName'] .'</td>';
                                          echo ' <td class="centerTableTr">' .$row['firstName'] .'</td>';
                                       echo '</tr> ';
                                        }*/
                                        
          } 
            }
      //}
      

          
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

<!--- START SCRIPT TO ADD ROW IN TABLE-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
<script>
$(function(){
    $('#addMore').on('click', function() {
              var data = $("#data-table-basic tr:eq(1)").clone(true).appendTo("#data-table-basic");
              data.find("input").val('');
     });
     $(document).on('click', '.remove', function() {
         var trIndex = $(this).closest("tr").index();
            if(trIndex>0) {
             $(this).closest("tr").remove();
           } else {
             alert("Sorry!! Can't remove first row!");
           }
      });
});      
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
<!--- END SCRIPT TO ADD ROW IN TABLE-->

</html>


