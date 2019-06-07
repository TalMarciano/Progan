<?php
    session_start();
    require_once('init.php');
	class Repair{
        public function __construct(){
            
        }
        public function deleteRepair($repairId){
            global $db;
            $deleteRepairQuery = "delete from repair where repairId =" .$repairId; 
            $deleteFromRepair = $db->query($deleteRepairQuery);
            
            $deleteProductsRepairQuery = "delete from repairProducts where repairId =" .$repairId; 
            $deleteFromRepairProducts = $db->query($deleteProductsRepairQuery);
            echo '<meta http-equiv="refresh" content="0">';
        }
        public function updateRepair($repairId){
            /////Status//////////
            $statusIdUpdate = filter_input(INPUT_POST, 'RepairStatusChooser');
            /////Total Repair Price//////////
            $stringForTotalRepairPrice = 'totalRepairPrice' .$repairId;
            $totalPriceUpdate = filter_input(INPUT_POST, $stringForTotalRepairPrice);
            /////Total Products Price//////////
            $stringForProductsPrice = 'totalProductsPrice' .$repairId;
            $productPriceUpdate = filter_input(INPUT_POST, $stringForProductsPrice);
            /////Number of Products//////////
            $numOfProducts = filter_input(INPUT_POST, 'numOfProducts');
            /////Query for Repair//////////
            global $db;
            $updateRepairQuery = "UPDATE repair SET repairStatusId = " .$statusIdUpdate .", estimatePrice = " .$productPriceUpdate .",totalPriceRepair = " .$totalPriceUpdate ." WHERE repairId =" . $repairId; 
            $updateRepair = $db->query($updateRepairQuery);
            /////While for update products Repair//////////
            $currenctProducts = 1;
            while($currenctProducts <= $numOfProducts){
                
                $stringForProductRepairDays = "estimateRepairDays"  .$currenctProducts;
                $currentProductDaysUpdate = filter_input(INPUT_POST, $stringForProductRepairDays);
                
                $stringForEstimateProductPrice = "estimateProductCost" .$currenctProducts;
                $currentProductPriceUpdate = filter_input(INPUT_POST, $stringForEstimateProductPrice);
                
                $updateProductsRepairQuery = "UPDATE repairProducts SET estimateCost = " .$currentProductPriceUpdate .", estimateDaysForRepair = " .$currentProductDaysUpdate ." WHERE repairId =" . $repairId ." AND productNumber = " .$currenctProducts; 
                $updateFromRepairProducts = $db->query($updateProductsRepairQuery);
                $currenctProducts += 1;
            }
            /////Finish and reload page//////////
            echo '<meta http-equiv="refresh" content="0">';
        }
        public function addNewRepair(){
            global $db;
	        if(!$db->get_connection()){
                die("Connection failed!");
	        }
	        else{
	            $db->query("SET CHARACTER SET 'hebrew'");
                $db->query("SET NAMES 'utf8'");
                
                /*get Repairid number from DB and add one for counter */
                $repairId = $db->query("SELECT repairid FROM repair ORDER BY repairid DESC LIMIT 0, 1");
                $repairId = $repairId->fetch_assoc();
                $repairNumberForQuery = $repairId['repairid'] + 1;
                /*Customer Details*/
                $firstName = filter_input(INPUT_POST, 'firstName'); 
                $lastName = filter_input(INPUT_POST, 'lastName'); 
                $phone = filter_input(INPUT_POST, 'phone');
                $customerEmail = filter_input(INPUT_POST, 'customerEmail');
                $customerId = filter_input(INPUT_POST, 'customerId');
                
                /*query for customer details - if good is getting '1' */
                $customerDetailsQuery = "INSERT INTO customers(firstName, lastName, phone,email, customerId, datecreated) 
                    values ('" .$firstName ."','" .$lastName ."','" .$phone ."','" .$customerEmail ."','" .$customerId ."', now())";
                $customerDetaildAdd = $db->query($customerDetailsQuery);

                /*loop for repair products  - if good is getting '1' */
                $countForProduct = 1;
                $productNameString = 'repairProductName' .$countForProduct;
                $repairProductsAddedFlag = 1;
                $totalProductsPriceEstimated = 0;
                $repairProductsAdded = null;
                $estimateTotalRepairDays = 0;
                while(filter_input(INPUT_POST, $productNameString) && $repairProductsAddedFlag){
                    /*define vars*/
                    $productNameString = 'repairProductName' .$countForProduct;
                    $productName = filter_input(INPUT_POST, $productNameString);
                    
                    $productIdString = 'repairProductId' .$countForProduct;
                    $productId = filter_input(INPUT_POST, $productIdString);
                    
                    $productRepairDescription = 'repairDescription' .$countForProduct;
                    $productRepairIssue = filter_input(INPUT_POST, $productRepairDescription); 
                    
                    $estimatePrice = 'estimatePrice' .$countForProduct;
                    $estimateProductIssuePrice = filter_input(INPUT_POST, $estimatePrice);
                    $totalProductsPriceEstimated += $estimateProductIssuePrice;

                    $estimateRepairDays = 'estimateRepairDays' .$countForProduct;
                    $estimateProductDaysForRepair = filter_input(INPUT_POST, $estimateRepairDays);
                    if($estimateTotalRepairDays < $estimateProductDaysForRepair){
                        $estimateTotalRepairDays = $estimateProductDaysForRepair;
                    }
                    
                    /*query for order products - if good is getting '1' */
                    $repairProductsQuery = "INSERT INTO repairProducts(repairId, productName, productIssue, estimateCost, estimateDaysForRepair, productNumber) 
                        values (" .$repairNumberForQuery .",'" .$productName ."','" .$productRepairIssue ."'," .$estimateProductIssuePrice ."," .$estimateProductDaysForRepair ."," .$countForProduct .")";
                    $repairProductsAdded = $db->query($repairProductsQuery);
                    if($repairProductsAdded == ''){
                        $repairProductsAddedFlag = 0;
                    }
                    /*this is in order to know how many products the customer send to repair */
                    $countForProduct += 1;
                    $productNameString = 'repairProductName' .$countForProduct;
                }
                
                /*Add new repair to DB  - if good is getting '1' */
                $comment = filter_input(INPUT_POST, 'comment');
                $comment2 = filter_input(INPUT_POST, 'comment2');
                $commentF = $comment .' '.$comment2;
                $totalRepairPrice = filter_input(INPUT_POST, 'priceForTotalRepair');
                $totalVAT = $totalProductsPriceEstimated*0.17;
                $totalRepairrWithVAT = $totalVAT + $totalProductsPriceEstimated; 
                $newRepairAddQuery = "INSERT INTO repair(repairId, datecreated, customerId, repairStatusId, estimateRepairDays, estimatePrice, totalPriceRepair, repairComment)
                    values(" .$repairNumberForQuery .", now(),'" .$customerId ."',1," .$estimateTotalRepairDays ."," .$totalProductsPriceEstimated ."," .$totalRepairPrice .",'" .$commentF ."')";
                $newRepairAdded = $db->query($newRepairAddQuery);

                global $isRepairAddedSuccessfully;
                global $isCustomerDetailsOK;
                global $isProductsAddedOk;
                
                if($newRepairAdded && $repairProductsAdded && $customerDetaildAdd){
                    $isRepairAddedSuccessfully = TRUE;
                    $isCustomerDetailsOK = TRUE;
                    $isProductsAddedOk = TRUE;
                }
                else if($customerDetaildAdd = 1){
                    $isCustomerDetailsOK = TRUE;
                }else if($repairProductsAdded == 1){
                    $isProductsAddedOk = TRUE;
                }
                else{
                    $isRepairAddedSuccessfully = FALSE;
                }
            }
        }
	}
	
    $repair = new Repair();
?>
