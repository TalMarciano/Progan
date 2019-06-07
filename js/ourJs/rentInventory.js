var productDetailsForUpdate = new Array();
function updateProduct(productId){
    var productName = document.getElementById("productName" + productId);
    var priceDay = document.getElementById("priceDay" + productId);
    var unit = document.getElementById("unit" + productId);
    var productDescription = document.getElementById("productDescription" + productId);
    var vendor = document.getElementById("vendor" + productId);

    productDetailsForUpdate = {
        "productName": productName.innerHTML,
        "priceDay": priceDay.innerHTML,
        "unit": unit.innerHTML,
        "productDescription": productDescription.innerHTML,
        "vendor":vendor.innerHTML, 
        "productId":productId
    }
    console.log(productDetailsForUpdate)
    ////////////////change update btn to save ///////////////
    var updateBtn = document.getElementById("updateProductInRentInventory" + productId);
    updateBtn.innerHTML = 'שמור';
    updateBtn.setAttribute("onClick", "saveChanges(" + productId +")" );
    updateBtn.id = "saveChangesBtn" + productId;
    ////////////////change delete btn to cancel ///////////////
    var deleteBtn = document.getElementById("deleteProductInRentInventory" + productId);
    deleteBtn.innerHTML = 'בטל';
    deleteBtn.setAttribute("onClick", "cancelChanges(" + productId +")" );
    deleteBtn.id = "cancelChangesBtn" + productId;
    deleteBtn.classList.add("btn-danger");
    deleteBtn.classList.remove("btn-default");
    ///////Change to input//////////
    productName.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;padding:0px;margin:auto;\" id=\"productNameToSend" + productId +"\" required value = \"" + productName.innerHTML + "\">";
    priceDay.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;padding:0px;margin:auto;\" id=\"priceDayToSend" + productId +"\" required value = \"" + priceDay.innerHTML + "\">";
    unit.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;padding:0px;margin:auto;\" id=\"unitToSend" + productId +"\" required value = \"" + unit.innerHTML + "\">";
    productDescription.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;padding:0px;margin:auto;\" id=\"productDescriptionToSend" + productId +"\" required value = \"" + productDescription.innerHTML + "\">";
    vendor.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;padding:0px;margin:auto;\" id=\"vendorToSend" + productId +"\" required value = \"" + vendor.innerHTML + "\">";
}
function saveChanges(productId){
    var productNameToSend = document.getElementById("productNameToSend" + productId).value;
    var priceDayToSend = document.getElementById("priceDayToSend" + productId).value
    var unitToSend = document.getElementById("unitToSend" + productId).value
    var productDescriptionToSend = document.getElementById("productDescriptionToSend" + productId).value
    var vendorToSend = document.getElementById("vendorToSend" + productId).value
    ////////////////////
    theForm = document.createElement('form');
    theForm.action = '';
    theForm.method = 'POST';
    ////////////////////
    var productName = document.createElement('input');
    productName.type = 'hidden';
    productName.name = 'productNameForUpdate';
    productName.value = productNameToSend;
    theForm.appendChild(productName);
    ////////////////////
    var priceDay= document.createElement('input');
    priceDay.type = 'hidden';
    priceDay.name = 'priceDay';
    priceDay.value = priceDayToSend;
    theForm.appendChild(priceDay);
     ////////////////////
    var unit= document.createElement('input');
    unit.type = 'hidden';
    unit.name = 'unit';
    unit.value = unitToSend;
    theForm.appendChild(unit);
     ////////////////////
    var productDescription= document.createElement('input');
    productDescription.type = 'hidden';
    productDescription.name = 'productDescription';
    productDescription.value = productDescriptionToSend;
    theForm.appendChild(productDescription);
    ////////////////////
    var vendor= document.createElement('input');
    vendor.type = 'hidden';
    vendor.name = 'vendor';
    vendor.value = vendorToSend;   
    theForm.appendChild(vendor);
    ////////////////////
    var productIdSend= document.createElement('input');
    productIdSend.type = 'hidden';
    productIdSend.name = 'productId';
    productIdSend.value = productId;   
    theForm.appendChild(productIdSend);

    document.getElementById('hiddenFormForUpdateProductFromRentInvet').appendChild(theForm);
    theForm.submit();
}



function cancelChanges(productId){
    /////////change save btn to update //////////////////
    var saveBtn = document.getElementById("saveChangesBtn" + productId);
    saveBtn.innerHTML = 'ערוך';
    saveBtn.setAttribute("onClick", "updateProduct(" + productId +")" );
    saveBtn.id = "updateProductInRentInventory" + productId;
    /////////change cancel btn to delete //////////////////
    var cancelBtn = document.getElementById("cancelChangesBtn" + productId);
    cancelBtn.innerHTML = 'מחק';
    cancelBtn.setAttribute("onClick", "deleteProduct(" + productId +")" );
    cancelBtn.id = "deleteProductInRentInventory" + productId;
    cancelBtn.classList.remove("btn-danger");
    cancelBtn.classList.add("btn-default");
    ////////////////////////////////
    var productName = document.getElementById("productName" + productId);
    var fc = productName.firstChild;
    productName.removeChild(fc);
    productName.innerHTML = productDetailsForUpdate.productName;
    ////////////////////////////////
    var priceDay = document.getElementById("priceDay" + productId);
    fc = priceDay.firstChild;
    priceDay.removeChild(fc);
    priceDay.innerHTML = productDetailsForUpdate.priceDay;
     ////////////////////////////////
    var unit = document.getElementById("unit" + productId);
    fc = unit.firstChild;
    unit.removeChild(fc);
    unit.innerHTML = productDetailsForUpdate.unit;
      ////////////////////////////////
    var productDescription = document.getElementById("productDescription" + productId);
    fc = productDescription.firstChild;
    productDescription.removeChild(fc);
    productDescription.innerHTML = productDetailsForUpdate.productDescription;
       ////////////////////////////////
    var vendor = document.getElementById("vendor" + productId);
    fc = vendor.firstChild;
    vendor.removeChild(fc);
    vendor.innerHTML = productDetailsForUpdate.vendor;
}

function deleteProduct(productId){
    var theForm, newInput1;
    // Start by creating a <form>
    theForm = document.createElement('form');
    theForm.action = '';
    theForm.method = 'POST';
    newInput1 = document.createElement('input');
    newInput1.type = 'hidden';
    newInput1.name = 'deleteProductFromRentInvent';
    newInput1.value = productId;
    theForm.appendChild(newInput1);
    document.getElementById('hiddenFormForDeleteProductFromRentInvet').appendChild(theForm);
    theForm.submit();
}
