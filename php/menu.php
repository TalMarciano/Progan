<?php
    
    echo '<div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul class="mobile-menu-nav">
                                    <li><a data-target="#Charts" href="dashboard.php">לוח בקרה</a>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#sellMobile">מכירה</a>
                                        <ul id="sellMobile" class="collapse dropdown-header-top">
                                            <li><a href="orderHistory.php">הסטוריית מכירות</a></li>
                                            <li><a href="newOrder.php">מכירה חדשה</a></li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#repairMobile" href="#">תיקון</a>
                                        <ul id="repairMobile" class="collapse dropdown-header-top">
                                            <li><a href="acollectedRepairs.php">תיקונים שנאספו</a></li>
                                            <li><a href="completedRepairs.php">תיקונים שהושלמו</a></li>
                                            <li><a href="TreatmentRepairs.php">תיקונים בטיפול</a></li>
                                            <li><a href="newRepair.php">תיקון חדש</a></li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#rentMobile" href="#">השכרה</a>
                                        <ul id="rentMobile" class="collapse dropdown-header-top">
                                            <li><a href="rentCompleted.php">השכרות שהושלמו</a></li>
                                            <li><a href="openRent.php">השכרות בפועל</a></li>
                                            <li><a href="newRent.php">השכרה חדשה</a></li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#stockMobile" href="#">מלאי</a>
                                        <ul id="stockMobile" class="collapse dropdown-header-top">
                                            <li><a href="rentInventory.php">מלאי השכרות</a></li>
                                            <li><a href="PdroductInventory.php">מלאי מוצרים</a></li>
                                        </ul>
                                    </li>
                                    <li><a data-target="#customersMobile" href="customers.php">לקוחות</a>
                                        <ul id="customersMobile" class="collapse dropdown-header-top">
                                        </ul>
                                    </li>
                                    <li><a data-target="#usersMobile" href="Users.php">משתמשים</a>
                                        <ul id="usersMobile" class="collapse dropdown-header-top">
    									</ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu end -->
        <!-- Main Menu area start-->
        <div class="main-menu-area mg-tb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <ul id="centerNavBar" class="nav nav-tabs notika-menu-wrap menu-it-icon-pro" style="display:inline-block; text-align:center;">
                            <li><a href="Users.php">משתמשים</a>
                            </li>
                            <li><a href="customers.php">לקוחות</a>
                            </li>
                            <li><a data-toggle="tab" href="#stock">מלאי</a>
                            </li>
                            <li><a data-toggle="tab" href="#rent">השכרה</a>
                            </li>
                            <li><a data-toggle="tab" href="#repair">תיקון</a>
                            </li>
                            <li><a data-toggle="tab" href="#sell">מכירה</a>
                            </li>
    						<li><a href="dashboard.php">לוח בקרה</a>
                            </li>
                        </ul>
                        <div class="tab-content custom-menu-content">
                            <div id="Home" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                            </div>
                            <div id="sell" class="tab-pane notika-tab-menu-bg animated flipInX">
                                <ul class="notika-main-menu-dropdown">
                                    <li><a href="orderHistory.php">הסטוריית מכירות</a>
                                    </li>
                                    <li><a href="newOrder.php">מכירה חדשה</a>
                                    </li>
                                </ul>
                            </div>
    						<div id="repair" class="tab-pane notika-tab-menu-bg animated flipInX">
                                <ul class="notika-main-menu-dropdown">
                                    <li><a href="collectedRepairs.php">תיקונים שנאספו</a>
                                    </li>
                                    <li><a href="completedRepairs.php">תיקונים שהושלמו</a>
                                    </li>
                                    <li><a href="TreatmentRepairs.php">תיקונים בטיפול</a>
                                    </li>
    								<li><a href="newRepair.php">תיקון חדש</a>
                                    </li>
                                </ul>
                            </div>
    						<div id="rent" class="tab-pane notika-tab-menu-bg animated flipInX">
                                <ul class="notika-main-menu-dropdown">
                                    <li><a href="rentCompleted.php">השכרות שהושלמו</a>
                                    </li>
                                    <li><a href="openRent.php">השכרות בפועל</a>
                                    </li>
    								<li><a href="newRent.php">השכרה חדשה</a>
                                    </li>
                                </ul>
                            </div>
    						<div id="stock" class="tab-pane notika-tab-menu-bg animated flipInX">
                                <ul class="notika-main-menu-dropdown">
                                    <li><a href="ProductInventory.php">מלאי מוצרים</a>
                                    </li>
                                    <li><a href="rentInventory.php">מלאי השכרות</a>
                                </ul>
                            </div>
    						<div id="customers" class="tab-pane notika-tab-menu-bg animated flipInX">
                                <ul class="notika-main-menu-dropdown">
                                </ul>
                            </div>
    						<div id="users" class="tab-pane notika-tab-menu-bg animated flipInX">
                                <ul class="notika-main-menu-dropdown">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Menu area End-->' 
        
        
?>