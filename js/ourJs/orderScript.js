////////////// VARs ///////////
var totalProductsPrice, 
    classes,
    totalOrderPrice,
    currentProduct, 
    countForProductString, 
    stringForTotalProductsPrice, 
    stringFortotalOrderPrice;
    
var saveForCanceltotalProductsPrice, 
    saveForCanceltotalOrderPrice, 
    saveForCancelcurrentProduct; 
var productsSaverForCancel = new Array();

//////////////  form  ///////////
var theForm = document.createElement('form');
theForm.action = '';
theForm.method = 'POST';

console.log('bla')

function deleteOrder(orderId){
    var theForm, newInput1;
    // Start by creating a <form>
    theForm = document.createElement('form');
    theForm.action = '';
    theForm.method = 'POST';
    newInput1 = document.createElement('input');
    newInput1.type = 'hidden';
    newInput1.name = 'deleteOrderId';
    newInput1.value = orderId;
    theForm.appendChild(newInput1);
    document.getElementById('hiddenFormForDeleteOrder').appendChild(theForm);
    theForm.submit();
}
function cancelButtun(orderId){
    /////change cancel button to disable/////
    var stringForCancelBtn = "updateBtnInModalCancel" + orderId;
    var button = document.getElementById(stringForCancelBtn);
    button.disabled = true;    
    
    ////change save button to edit button/////
    var stringForUpdateButton = "updateSaveChanges" + orderId;
    var updateBtn = document.getElementById(stringForUpdateButton);
    updateBtn.innerHTML = 'ערוך';
    updateBtn.id = "updateBtnInModal" + orderId;
    updateBtn.setAttribute("onClick", "updateButton(" + orderId +")" );
    
    ////////VARS FOR BACK //////////////
    var stringFortotalOrderPrice = "totalOrderPrice" + orderId;
    var totalPrice = document.getElementById(stringFortotalOrderPrice);
    fc = totalPrice.firstChild;
    totalPrice.removeChild(fc);
    totalPrice.innerHTML = saveForCanceltotalOrderPrice;
    ///////
    var stringForProductsPrice = "totalProductsPrice" + orderId;
    var productsPrice = document.getElementById(stringForProductsPrice);
    fc = productsPrice.firstChild;
    productsPrice.removeChild(fc);
    productsPrice.innerHTML = saveForCanceltotalProductsPrice;
    ///////
    var currentProduct = 1;
    while (currentProduct <= classes.length){
        var productPriceString = "productPrice" + orderId + "-" + currentProduct;
        var productPrice = document.getElementById(productPriceString);
        fc = productPrice.firstChild;
        productPrice.removeChild(fc);
        productPrice.innerHTML = productsSaverForCancel[currentProduct-1].price;

        var stringForProductQuantity = "productQuantity" + orderId + "-" + currentProduct;
        var quantity = document.getElementById(stringForProductQuantity);
        fc = quantity.firstChild;
        quantity.removeChild(fc);
        quantity.innerHTML = productsSaverForCancel[currentProduct-1].quantity;
        currentProduct++;
    }
}

function saveChangesBtn(orderId){
    theForm.appendChild(totalOrderPrice);
    theForm.appendChild(totalProductsPrice);
    currentProduct = 1;
    while(currentProduct <= classes.length){
        var stringForProductCost =  "productPrice" + orderId + "-" + currentProduct;
        var cost = document.getElementById(stringForProductCost);
        theForm.appendChild(cost);
        var stringForProductQuantity = "productQuantity" + orderId + "-" + currentProduct;
        var quantity = document.getElementById(stringForProductQuantity);
        theForm.appendChild(quantity);
        currentProduct += 1;
    }
    document.getElementById('hiddenFormForUpdateOrder').appendChild(theForm);
    theForm.submit();
}

function updateButton(orderId) {
     ////////////// Declare  ///////////
    countForProductString = "productClassCounter" + orderId;
    classes = document.getElementsByClassName(countForProductString);

    stringForTotalProductsPrice =  "totalProductsPrice" + orderId;
    totalProductsPrice = document.getElementById(stringForTotalProductsPrice);
    
    stringFortotalOrderPrice =  "totalOrderPrice" + orderId;
    totalOrderPrice = document.getElementById(stringFortotalOrderPrice);
    
    /////SAVING THE values //////////////
    saveForCanceltotalProductsPrice = totalProductsPrice.innerHTML
    saveForCanceltotalOrderPrice = totalOrderPrice.innerHTML;
    /////////////////////////////////////
    
    var stringForUpdateButton = "updateBtnInModal" + orderId;
    var updateBtn = document.getElementById(stringForUpdateButton);
    updateBtn.innerHTML = 'שמור';
    updateBtn.id = "updateSaveChanges" + orderId;
    updateBtn.setAttribute("onClick", "saveChangesBtn(" + orderId +")" );
    var stringForCancelId = "updateBtnInModalCancel" + orderId; 
    var cancelBtn = document.getElementById(stringForCancelId);
    cancelBtn.disabled = false;
    
    // Start by creating a <form>
    currentProduct = 1;
    while(currentProduct <= classes.length){
        var stringForProductQuantity = "productQuantity" + orderId + "-" + currentProduct;
        var quantity = document.getElementById(stringForProductQuantity);
        var stringForProductCost = "productPrice" + orderId + "-" + currentProduct;
        var cost = document.getElementById(stringForProductCost);
        /////SAVING THE values of the products //////////////
        productsSaverForCancel[currentProduct - 1] = {
            quantity: quantity.innerHTML,
            price: cost.innerHTML
        };
        console.log(productsSaverForCancel[currentProduct - 1]);
        /////Turns the values to inputs//////////////
        quantity.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;width:50%;padding:0px;margin:auto;\" name=\"productQuantity" + currentProduct +"\"  id=\"" + stringForProductQuantity +"\" required value = \"" + quantity.innerHTML + "\">";
        cost.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;width:50%;padding:0px;margin:auto;\" name=\"productPrice" + currentProduct +"\" id=\"" + stringForProductCost +"\" required value = \"" + cost.innerHTML + "\">";

        currentProduct += 1;
    }
    //////////TOTAL REPAIR PRICE //////////////
    totalProductsPrice.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;width:50%;padding:0px;margin:auto;\" name=\"totalProductsPrice" + orderId +"\" required value = \"" + totalProductsPrice.innerHTML + "\">";
    //////////TOTAL REPAIR PRICE //////////////
    
    totalOrderPrice.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;width:50%;padding:0px;margin:auto;\" name=\"totalOrderPrice" + orderId +"\" required value = \"" + totalOrderPrice.innerHTML + "\">";
    //////////STATUS  DONT FORGET TO UPDATE STATUSES!!!!!!!!!!!!!!!!!!!!!selected!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//////////////

    //////////NOW SENDING THE FORM //////////////
    ///////////
    newNumOfProducts = document.createElement('input');
    newNumOfProducts.type = 'hidden';
    newNumOfProducts.name = 'numOfProducts';
    newNumOfProducts.value = classes.length;
    ///////////
    var orderIdNum = document.createElement('input');
    orderIdNum.type = 'hidden';
    orderIdNum.name = 'orderIdNumber';
    orderIdNum.value = orderId;
    ///////////
    theForm.appendChild(newNumOfProducts);
    theForm.appendChild(orderIdNum);
}
