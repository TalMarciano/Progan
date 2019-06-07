<?php
    session_start();
    require_once('init.php');
	class Rent{
        public function __construct(){
            
        }
        public function deleteRent($rentId){
            global $db;
            $deleteRepairQuery = "delete from rents where rentid =" .$rentId; 
            $deleteFromRepair = $db->query($deleteRepairQuery);

            $deleteProductsRepairQuery = "delete from rentProducts where rentId =" .$rentId; 
            $deleteFromRepairProducts = $db->query($deleteProductsRepairQuery);
            echo '<meta http-equiv="refresh" content="0">';
        }
        public function updateRent($rentId){
            /////Status//////////
            $statusIdUpdate = filter_input(INPUT_POST, 'rentStatusChooser');
            /////Total Rent Price//////////
            $stringForTotalRepairPrice = 'totalRentPrice' .$rentId;
            $totalPriceUpdate = filter_input(INPUT_POST, $stringForTotalRepairPrice);
            /////Number of Products//////////
            $numOfProducts = filter_input(INPUT_POST, 'numOfProducts');
            /////Query for Repair//////////
            global $db;
            $updateRentQuery = "UPDATE rents SET rentStatusId = " .$statusIdUpdate .", totalRentPrice = " .$totalPriceUpdate ." WHERE rentId =" . $rentId; 
            $updateRents = $db->query($updateRentQuery);
            /////While for update products Repair//////////
            $currenctProducts = 1;
            while($currenctProducts <= $numOfProducts){
                
                $stringForProductRentDays = "RentDays"  .$currenctProducts;
                $currentProductDaysUpdate = filter_input(INPUT_POST, $stringForProductRentDays);
                
                $stringForEstimateProductPrice = "ProductPricePerDay" .$currenctProducts;
                $currentProductPriceUpdate = filter_input(INPUT_POST, $stringForEstimateProductPrice);
                
                $updateProductsRentQuery = "UPDATE rentProducts SET productPricePerDay = " .$currentProductPriceUpdate .", productDaysOfRent = " .$currentProductDaysUpdate ." WHERE rentId =" .$rentId ." AND productNumber = " .$currenctProducts; 
                $updateFromRentProducts = $db->query($updateProductsRentQuery);
                $currenctProducts += 1;

            }
            /////Finish and reload page//////////
            echo '<meta http-equiv="refresh" content="0">';

            
        }
        
        
        public function addNewRent(){
            global $db;
            global $customer;
	        if(!$db->get_connection()){
                die("Connection failed!");
	        }
	        else{
	            $db->query("SET CHARACTER SET 'hebrew'");
                $db->query("SET NAMES 'utf8'");
                
                $rentId = $db->query("SELECT rentid FROM rents ORDER BY rentId DESC LIMIT 0, 1");
                $rentId = $rentId->fetch_assoc();
                $rentNumberForQuery = $rentId['rentid'] + 1;
                /*Customer Details*/
                $firstName = filter_input(INPUT_POST, 'firstName'); 
                $lastName = filter_input(INPUT_POST, 'lastName'); 
                $phone = filter_input(INPUT_POST, 'phone');
                $customerEmail = filter_input(INPUT_POST, 'customerEmail');
                $customerId = filter_input(INPUT_POST, 'customerId');
                $customerDetaildAdd = true;
                $isNeedToAddCustomer = null;
                //////////NEED TO ADD IN ORDER AND REPAIR ////////////
                $isNeedToAddCustomer = $customer->checkIfUserExist($customerEmail);
                if(!$isNeedToAddCustomer){
                     /*query for customer details - if good is getting '1' */
                    $customerDetailsQuery = "INSERT INTO customers(firstName, lastName, phone,email, customerId, datecreated) 
                    values ('" .$firstName ."','" .$lastName ."','" .$phone ."','" .$customerEmail ."','" .$customerId ."', now())";
                    $customerDetaildAdd = $db->query($customerDetailsQuery);

                }
                 /*loop for repair products  - if good is getting '1' */
                $countForProduct = 1;
                $productNameString = 'productName' .$countForProduct;
                $rentProductsAddedFlag = 1;
                $totalProductsPriceForRent = 0;
                $rentProductsAdded = null;
                $estimateTotalRentDays = 0;
                while(filter_input(INPUT_POST, $productNameString) && $rentProductsAddedFlag){
                    /*define vars*/
                    $productNameString = 'productName' .$countForProduct;
                    $productName = filter_input(INPUT_POST, $productNameString);
                    
                    $productIdString = 'productId' .$countForProduct;
                    $productId = filter_input(INPUT_POST, $productIdString);
                    
                    $productVendorString = 'productVendor' .$countForProduct;
                    $productVendor = filter_input(INPUT_POST, $productVendorString); 
                    
                    $productPricePerDayString= 'productPricePerDay' .$countForProduct;
                    $productPricePerDay = filter_input(INPUT_POST, $productPricePerDayString);
                    $totalProductsPriceForRent += $productPricePerDay;

                    $productDaysForRentString = 'productDaysOfRent' .$countForProduct;
                    $productDaysForRent = filter_input(INPUT_POST, $productDaysForRentString);
                    
                    /*query for rent products - if good is getting '1' */
                    $rentProductsQuery = "insert into rentProducts (rentId, productId, productName, vendorName, productPricePerDay, productDaysOfRent,productNumber) 
                        Values (" .$rentNumberForQuery ."," .$productId .",'" .$productName  ."','" .$productVendor ."'," .$productPricePerDay ."," .$productDaysForRent ."," .$countForProduct.")";
                    $rentProductsAdded = $db->query($rentProductsQuery);
                    if($rentProductsAdded == ''){
                        $rentProductsAddedFlag = 0;
                    }
                    /*this is in order to know how many products the customer send to repair */
                    $countForProduct += 1;
                    $productNameString = 'productName' .$countForProduct;
                }
                /*Add new repair to DB  - if good is getting '1' */
                $comment = filter_input(INPUT_POST, 'comment');
                $comment2 = filter_input(INPUT_POST, 'comment2');
                $commentF = $comment .' '.$comment2;
                $totalRentPrice = filter_input(INPUT_POST, 'priceForTotalRent');
                $totalVAT = $totalRentPrice*0.17;
                $totalRepairrWithVAT = $totalVAT + $totalRentPrice; 
                $newRentAddQuery = "insert into rents (rentId,datecreated, customerId,rentStatusId,totalRentPrice,rentComment) 
                    values (" .$rentNumberForQuery .",now(),'" .$customerId ."',1, "  .$totalRepairrWithVAT .",'" .$commentF ."')";
                $newRentAdded = $db->query($newRentAddQuery);
                global $isRentAddedSuccessfully;
                global $isCustomerDetailsOK;
                global $isProductsAddedOk;
                
                if($newRentAdded && $rentProductsAdded && $customerDetaildAdd){
                    $isRentAddedSuccessfully = true;
                    $isCustomerDetailsOK = true;
                    $isProductsAddedOk = true;
                }
                else if(!$customerDetaildAdd){
                    $isCustomerDetailsOK = false;
                }else if(!$rentProductsAdded){
                    $isProductsAddedOk = false;
                }
                else{
                    $isRentAddedSuccessfully = FALSE;
                }
               
               
                
            }
        }
    }
	
	
    $rent = new Rent();
?>
