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
                                        <th class="centerTableTr">שמור</th>
                                        <th class="centerTableTr">מחיר מכירה</th>
                                        <th class="centerTableTr">מחיר עלות</th>
                                        <th class="centerTableTr">תקופת אחריות</th>
                                        <th class="centerTableTr">כמות</th>
                                        <th class="centerTableTr">תיאור המוצר</th>
                                        <th class="centerTableTr">שם הספק</th>
                                        <th class="centerTableTr">מק"ט</th>
                                        <th class="centerTableTr">שם המוצר</th>
                                        <input type="text" id="mySearch" onchange="myFunction()" placeholder="Search.." title="Type in a category">
                                        <input type="text" placeholder="Search.." name="search2" onchange="myFunction()">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <button onclick="myFunction()">&#x2705</button> </td>
                                        <td class="centerTableTr">London</td>
                                        <td class="centerTableTr">47</td>
                                        <td class="centerTableTr">2011/03/21</td>
                                        <td class="centerTableTr">$356,250</td>
                                    </tr>
                                    <tr>
                                        <td> <button onclick="myFunction()">&#x2705</button> </td>
                                        <td class="centerTableTr">London</td>
                                        <td class="centerTableTr">21</td>
                                        <td class="centerTableTr">2009/02/27</td>
                                        <td class="centerTableTr">$103,500</td>
                                    </tr>
                                    <tr>
                                        <td> <button onclick="myFunction()">&#x2705</button> </td>
                                        <td class="centerTableTr">San Francisco</td>
                                        <td class="centerTableTr">30</td>
                                        <td class="centerTableTr">2010/07/14</td>
                                        <td class="centerTableTr">$86,500</td>
                                    </tr>
                                    <tr>
                                        <td> <button onclick="myFunction()">&#x2705</button> </td>
                                        <td class="centerTableTr">Edinburgh</td>
                                        <td class="centerTableTr">51</td>
                                        <td class="centerTableTr">2008/11/13</td>
                                        <td class="centerTableTr">$183,000</td>
                                    </tr>
                                    <tr>
                                        <td> <button onclick="myFunction()">&#x2705</button> </td>
                                        <td class="centerTableTr">Singapore</td>
                                        <td class="centerTableTr">29</td>
                                        <td class="centerTableTr">2011/06/27</td>
                                        <td class="centerTableTr">$183,000</td>
                                    </tr>
                                    <tr>
                                        <td> <button onclick="myFunction()">&#x2705</button> </td>
                                        <td class="centerTableTr">New York</td>
                                        <td class="centerTableTr">27</td>
                                        <td class="centerTableTr">2011/01/25</td>
                                        <td class="centerTableTr">$112,000</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="centerTableTr">Office</th>
                                        <th class="centerTableTr">Age</th>
                                        <th class="centerTableTr">Start date</th>
                                        <th class="centerTableTr">Salary</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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