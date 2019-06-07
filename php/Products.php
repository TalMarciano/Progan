<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require('init.php');
    class Products {
            public function __construct(){
            }
            public function updateProductToRentInventory(){
                global $db;
                if(!$db->get_connection()){
                    die("Connection failed!");
                }
                else{
                    $productId = filter_input(INPUT_POST, 'productId');
                    $vendor = filter_input(INPUT_POST, 'vendor');
                    $productDescription = filter_input(INPUT_POST, 'productDescription');
                    $unit = filter_input(INPUT_POST, 'unit');
                    $priceDay = filter_input(INPUT_POST, 'priceDay');
                    $productNameForUpdate = filter_input(INPUT_POST, 'productNameForUpdate');
                    $sql = "update rentInventory set priceDay = " .$priceDay .", unit = " .$unit  .", productDescription ='" .$productDescription ."', vendor ='" .$vendor ."', productName ='" .$productNameForUpdate ."' 
                    where productId = " .$productId;
                    $result = $db->query($sql);
                    if($result == 1){
                        return 1;
                    }
                    else{
                        return 0;
                    }
                }
             }
            public function deleteProductFromRentInvent(){
                global $db;
                if(!$db->get_connection()){
                    die("Connection failed!");
                }
                else{
                    $productId = filter_input(INPUT_POST, 'deleteProductFromRentInvent');
                    $sql = "delete from rentInventory where productId =" .$productId;
                    $result = $db->query($sql);
                    if($result == 1){
                        return 1;
                    }
                    else{
                        return 0;
                    }
                }
                
            }
            public function addNewProductToRentInventory(){
                global $db;
                $db->query("SET CHARACTER SET 'hebrew'");
                $db->query("SET NAMES 'utf8'");
                if(!$db->get_connection()){
                    die("Connection failed!");
                }
                else{
                    $productId = filter_input(INPUT_POST, 'productId'); 
                    $productName = filter_input(INPUT_POST, 'productName');
                    $priceDay = filter_input(INPUT_POST, 'priceDay');
                    $vendor = filter_input(INPUT_POST, 'vendor');
                    $productDescription = filter_input(INPUT_POST, 'productDescription');
                    $unit = filter_input(INPUT_POST, 'unit');
                    $sql = "INSERT INTO rentInventory(productName, productId, vendor, productDescription, unit, priceDay) 
                        values ('" .$productName ."'," .$productId .",'" .$vendor ."','" .$productDescription ."'," .$unit ."," .$priceDay .")";
                    $result = $db->query($sql);
                    if($result == 1){
                        return 1;
                    }
                    else{
                        return 0;
                    }
                }
            }
            
            public function deleteProductFromWix(){
                $productId = filter_input(INPUT_POST, 'deleteProductId');
                $urlForDeleteProductId = 'https://progangar.wixsite.com/mysite/_functions/removeProduct/' .$productId;
                $result = file_get_contents($urlForDeleteProductId);
                echo '<meta http-equiv="refresh" content="0">';
            }
            public function updateProductFromWix(){
                $productIdForWix = filter_input(INPUT_POST, 'productIdForWixValue');
                $productId = filter_input(INPUT_POST, 'productIdValue');
                $shortDescription = filter_input(INPUT_POST, 'shortDescriptionValue');
                $longDescription = filter_input(INPUT_POST, 'longDescriptionValue');
                $regularPrice = filter_input(INPUT_POST, 'regularPriceValue');
                $salePrice = filter_input(INPUT_POST, 'salePriceValue');
                $images = filter_input(INPUT_POST, 'imagesValue');
                $productName = filter_input(INPUT_POST, 'productNameValue');
                
                $urlForUpdateProduct = 'https://progangar.wixsite.com/mysite/_functions/updateProduct/' .$productIdForWix .'/' .$productId .'/' .$productName .'/' .$shortDescription .'/' .$longDescription .'/' .$regularPrice .'/' .$salePrice .'/' .$images;
                $urlForUpdateProduct = str_replace(' ', '',$urlForUpdateProduct);
                $result = file_get_contents($urlForUpdateProduct);
                echo '<meta http-equiv="refresh" content="0">';

             /*   $json = '{
                "_id":"' .$productIdForWix .'",
                "productId":"' .$productId.'",
                "name":"' .$productName.'",
                "shortDescription":"' .$shortDescription .'",
                "description":"' .$longDescription.'",
                "regularPrice":"' .$regularPrice.'",
                "salePrice":"' .$salePrice.'",
                "images":"' .$images .'"}';*/
                
               /* echo $json;
               
                $options = array(
                      'http' => array(
                        'method'  => 'POST',
                        'header'  => 'Content-type: application/json', 
                         'content' => $json
                        )
                    );
                echo 'the options = ';    
                var_dump($options);
                
                $context  = stream_context_create( $options );
                $result = file_get_contents( $urlForDeleteProductId, false, $context );
                echo 'the result = ' . $result;
                $response = json_decode( $result );
                var_dump($response);*/
                
            }
            
            
        }
        $products = new Products();
?>
