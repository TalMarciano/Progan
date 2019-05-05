$('#v-pills-purchase-History-tab').ready(function(){
    var xhr = new XMLHttpRequest(); 
    xhr.open("GET", "../php/ajaxGetUserOrders.php", true);
    xhr.setRequestHeader('Content-type', 'application/json');
    xhr.onreadystatechange = function(){
        if(xhr.readyState < 4){
       
        }
        if(xhr.readyState == 4 && xhr.status == 200){
            //console.log(typeof xhr.responseText);
            var json = JSON.parse((xhr.responseText));
            //console.log(typeof json);
            //console.log(json);
            $tBody = $('#tbody');
            $arrayForOrders = Array();
            $fOrderIdNeeded = true;
            for(var i = 0; i < json.length; i++){
                $row = JSON.parse(json[i]);
                $arrayForOrders.push($row.orderId);
                for(var j = 0; j < $arrayForOrders.length-1; j++){
                    if($row.orderId == $arrayForOrders[j]){
                        $fOrderIdNeeded = false;
                    }
                }
                if($fOrderIdNeeded){
                    $str ="<tr><th scope=\"row\">" + $row.orderId + "</th>";
                    $str += "<td>" + $row.dateCreated + "</td>" + "<td>" + $row.totalPrice + "</td>" + "<td>" + $row.orderStatusName + "</td>"; 
                    $str += "<td><p class=\"collapse_btn\"><button class=\"btn btn-sm button-my-purchase\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapseRow"+ $row.orderId +" \"aria-expanded=\"false\" aria-controls=\"collapseRow"+ $row.orderId +"\">More</button></p></td>";
                    $str += "<tr><td class=\"collapse_wrapper\" colspan=\"5\">";
                    $str += "<div class=\"collapse\" id=\"collapseRow" + $row.orderId +"\">";
                    $str += "<div class=\"card card-body\">";
                    $str += "<table class=\"table\"><thead><tr>"
                    $str += "<th scope=\"col\">Item ID</th><th scope=\"col\">Item Name</th><th scope=\"col\">Quantity</th><th scope=\"col\">Price</th></tr></thead><tbody>";
                    for(var j = 0; j < json.length; j++){
                        $inJson = JSON.parse(json[j]);
                        if($row.orderId == $inJson.orderId){
                            $str += "<tr><th scope=\"row\">" + $inJson.orderId + "</th>";
                            $str += "<td>" + $inJson.productName + "</td>";
                            $str += "<td>" + $inJson.quantity + "</td>";
                            $str += "<td>₪" + $inJson.price + "</td></tr>";
                        }
                    }
                    
                    $str += "</tbody></div></div></td></tr></tr>";
                    //console.log($str);
                    $tBody.append($str);
                }
                $fOrderIdNeeded = true; 
            }
        }
    }
    xhr.send();

});