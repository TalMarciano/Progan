<?php
    session_start();
    require_once('init.php');
	class Order{
        public function __construct(){
        }
        public function updateOrder($orderId){
            global $db;
            $numOfProducts = filter_input(INPUT_POST, 'numOfProducts');
            echo 'num of products' .$numOfProducts;
            $stringForTotalProductsPrice = 'totalProductsPrice' .$orderId;
            $totalProductsPrice = filter_input(INPUT_POST, $stringForTotalProductsPrice);
            $stringForTotalOrderPrice = 'totalOrderPrice' .$orderId;
            $totalOrderPrice = filter_input(INPUT_POST, $stringForTotalOrderPrice);
            $updateOrderQuery = "update orders SET totalProductsPrice = " .$totalProductsPrice .", totalOrderPrice = " .$totalOrderPrice .", VAT =" .$totalProductsPrice*0.17 ." WHERE orderId = " .$orderId;
            echo '<br>query order  =' .$updateOrderQuery; 
            $updateOrder = $db->query($updateOrderQuery);
            echo '<br>result =' .$updateOrder; 
            $currenctProducts = 1;
            while ($currenctProducts <= $numOfProducts){
                $stringForProductsPrice = 'productPrice' .$currenctProducts;
                $productsPrice = filter_input(INPUT_POST, $stringForProductsPrice);
                $stringForProductsQuantity = 'productQuantity' .$currenctProducts;
                $productsQuantity = filter_input(INPUT_POST, $stringForProductsQuantity);
                $updateOrderProductQuery = "UPDATE orderProducts SET quantity = " .$productsQuantity .", totalPrice =" .$productsPrice ." WHERE orderId = " .$orderId ." AND productNumber = " .$currenctProducts;
                echo '<br>query =' .$updateOrderProductQuery; 
                $updateOrderProducts = $db->query($updateOrderProductQuery);
                echo '<br>result =' .$updateOrderProducts; 
                $currenctProducts += 1;
            }
           // echo '<meta http-equiv="refresh" content="0">';
        }
        
        public function deleteOrder($orderId){
            global $db;
            $deleteOrderQuery = "delete from orders where orderid =" .$orderId; 
            $deleteFromOrder = $db->query($deleteOrderQuery);
            $deleteOrderProductsQuery = "delete from orderProducts where orderId =" .$orderId; 
            $deleteFromRepairProducts = $db->query($deleteOrderProductsQuery);
            echo '<meta http-equiv="refresh" content="0">';
            
        }
        public function addNewOrder(){
            global $db;
            global $customer; 
	        if(!$db->get_connection()){
                die("Connection failed!");
	        }
	        else{
	            $db->query("SET CHARACTER SET 'hebrew'");
                $db->query("SET NAMES 'utf8'");
                
                /*get orderid number from DB and add one for counter */
                $orderid = $db->query("SELECT orderid FROM orders ORDER BY orderid DESC LIMIT 0, 1");
                $orderid = $orderid->fetch_assoc();
                $orderNumberForQuery = $orderid['orderid'] + 1;

                /*Customer Details*/
                $firstName = filter_input(INPUT_POST, 'firstName'); 
                $lastName = filter_input(INPUT_POST, 'lastName'); 
                $phone = filter_input(INPUT_POST, 'phone');
                $customerEmail = filter_input(INPUT_POST, 'customerEmail');
                $customerId = filter_input(INPUT_POST, 'customerId');
                
                $customerDetaildAdd = true;
                /*query for customer details - if good is getting '1' */
                $isNeedToAddCustomer = $customer->checkIfUserExist($customerEmail);
                if(!$isNeedToAddCustomer){
                     /*query for customer details - if good is getting '1' */
                    $customerDetailsQuery = "INSERT INTO customers(firstName, lastName, phone,email, customerId, datecreated) 
                    values ('" .$firstName ."','" .$lastName ."','" .$phone ."','" .$customerEmail ."','" .$customerId ."', now())";
                    $customerDetaildAdd = $db->query($customerDetailsQuery);

                }
                /*loop for order products  - if good is getting '1' */
                $countForProduct = 1;
                $productName = 'productName' .$countForProduct;
                $orderProductsAddedFlag = 1;
                $totalProductsPrice = 0;
                $orderProductsAdded = null;
                while(filter_input(INPUT_POST, $productName) && $orderProductsAddedFlag){
                    /*define vars*/
                    $productNameString = 'productName' .$countForProduct;
                    $productName = filter_input(INPUT_POST, $productNameString);
                    
                    $productIdString = 'productId' .$countForProduct;
                    $productId = filter_input(INPUT_POST, $productIdString);

                    $totalPriceString = 'totalPrice' .$countForProduct;
                    $totalPrice = filter_input(INPUT_POST, $totalPriceString);
                    
                    $quantityString = 'quantity' .$countForProduct;
                    $quantity = filter_input(INPUT_POST, $quantityString);
                    
                    $totalProductsPrice += $totalPrice * $quantity;

                    /*query for order products - if good is getting '1' */
                    $orderProductsQuery = "INSERT INTO orderProducts(orderid,productName, productId, totalPrice, quantity,productNumber) 
                        values (" .$orderNumberForQuery .",'" .$productName ."'," .$productId ."," .$totalPrice ."," .$quantity ."," .$countForProduct .")";
                    $orderProductsAdded = $db->query($orderProductsQuery);
                    if($orderProductsAdded == ''){
                        $orderProductsAddedFlag = 0;
                    }
                    /*this is in order to know how many products the customer bought */
                    $countForProduct += 1;
                    $productName = 'productName' .$countForProduct;
                }
                
                /*Add new order to DB  - if good is getting '1' */
                $comment = filter_input(INPUT_POST, 'comment');
                $totalVAT = $totalProductsPrice*0.17;
                $totalOrderWithVAT = $totalVAT + $totalProductsPrice; 
                $newOrderAddQuery = "INSERT INTO orders(orderid, datecreated, totalProductsPrice, VAT, totalOrderPrice, customerEmail, comment)
                    values(" .$orderNumberForQuery .", now()," .$totalProductsPrice ."," .$totalVAT ."," .$totalOrderWithVAT .",'" .$customerEmail ."','" .$comment ."')";
                $newOrderAdded = $db->query($newOrderAddQuery);
                global $isOrderAddedSuccessfully;
                global $isCustomerDetailsOK;
                global $isProductsAddedOk;
                if($newOrderAdded && $orderProductsAdded && $customerDetaildAdd){
                    $isOrderAddedSuccessfully = TRUE;
                    $isCustomerDetailsOK = TRUE;
                }
                else if($customerDetaildAdd){
                    $isCustomerDetailsOK = TRUE;
                }else if($orderProductsAdded == ''){
                    $isProductsAddedOk = FALSE;
                }
                else{
                    $isOrderAddedSuccessfully = FALSE;
                }
            }
        }
	}
	
    $order = new Order();
?>
