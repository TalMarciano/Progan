<?php
        require('init.php');
        session_start();
        class Products {
            private $productId;
            private $productTypeId;
            private $productName;
            private $productDescription;
            private $productQuantity;
            private $productPrice;
            private $productImages;
            public function __construct(){
                $this->productImages = array();
            }
            public function getId(){
                return $this->productId;
            }
            public function getProductType(){
                return $this->productTypeId;
            }
            public function getName(){
                return $this->productName;
            }
            public function getDescription(){
                return $this->productDescription;
            }
            public function getQuantity(){
                return $this->productQuantity;
            }
            public function getPrice(){
                return $this->productPrice;
            }
            public function getProductImages(){
                return $this->productImages;
            }
            public static function getAllProductIdName(){
                global $db;
                $sql = "select * from productTypeId";
                $result = $db->query($sql);
                $allTypes= null;
                $i = 0;
                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                        $allTypes[$i] = $row;
                        $i += 1;
                    }
                    return $allTypes;
                }
                
            }
            private function setProductImages($id){
                global $db;
                $sql = "select * from productImages where productid = " .$id;
                $result = $db->query($sql);
                $i = 0;
                while($row = $result->fetch_assoc()){
                    $this->productImages[$i] = $row['location'];
                    $i += 1;
                }
            }
            public static function getProductsByType($typeId){
                global $db;
                $sql = "select * from products where productTypeid=" .$typeId;
                $resultSet = $db->query($sql);
                $productsById = array();
                $i = 0;
                if($resultSet->num_rows > 0){
                    while ($row = $resultSet->fetch_assoc()) {
                        $p = new Products();
                        $p->instantation($row);
                        $p->setProductImages($p->getId());
                        $productsById[$i] = $p;
                        $i += 1;
                    }
                }
                return $productsById;           
            }
            private function hasAttribute($attribute){
                $object_properties = get_object_vars($this);
                return array_key_exists($attribute, $object_properties);
            }
            private function instantation($product_array){
                foreach($product_array as $attribute=>$value){
                    if($result = $this->hasAttribute($attribute)){
                        $this->$attribute = $value;
                    }
                }
            }
        }
        $products = new Products();
?>