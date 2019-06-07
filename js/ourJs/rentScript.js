window.addEventListener("load", function(){
    var isManagerParameter = document.getElementById("isManagerParameterForThatUser");
    var buttons = document.getElementsByClassName("buttonForManagers");
    console.log(buttons);
    if(isManagerParameter.innerHTML === 0){
        for(i= 0; i< buttons.length; i++){
            buttons[i].disabled = true;
        }
    }
    
});
////////////// VARs ///////////
var rentStatusChooser, totalProductsPrice, totalRentPrice, classes,currentProduct, countForProductString, stringForRentStatusId, stringForTotalProductsPrice, stringFortotalRentPrice;
var saveForCancelrentStatusChooser , saveForCanceltotalProductsPrice, saveForCanceltotalRentPrice, saveForCancelcurrentProduct; 
var productsSaverForCancel = new Array();
//////////////  form  ///////////
var theForm = document.createElement('form');
theForm.action = '';
theForm.method = 'POST';

function cancelButtun(repairId){
    
    var id = "#" + repairId;
    /////change cancel button to disable/////
    var stringForCancelBtn = "updateBtnInModalCancel" + repairId;
    var button = document.getElementById(stringForCancelBtn);
    button.disabled = true;
    
    ////change save button to edit button/////
    var stringForUpdateButton = "updateSaveChanges" + repairId;
    var updateBtn = document.getElementById(stringForUpdateButton);
    updateBtn.innerHTML = 'ערוך';
    updateBtn.id = "updateBtnInModal" + repairId;
    updateBtn.setAttribute("onClick", "updateButton(" + repairId +")" );
    
    /////////////GET all the elements and change them back to normal
    var stringForRentStatusId = "rentStatusId" + repairId;
    var status = document.getElementById(stringForRentStatusId)
    var fc = status.firstChild;
    status.removeChild(fc);
    
    ///////////////CHANGER THE STRING HERE//////////////
    var stringForStatusBack = saveForCancelrentStatusChooser;
    status.innerHTML = stringForStatusBack;
        ////////////
    
    var stringFortotalRentPrice = "totalRentPrice" + repairId;
    var totalPrice = document.getElementById(stringFortotalRentPrice);
    fc = totalPrice.firstChild;
    totalPrice.removeChild(fc);
    totalPrice.innerHTML = saveForCanceltotalRentPrice;
        ////////////
        
    var stringFortotalRentPrice1 = "totalProductsPrice" + repairId;
    var totalProductsPrice = document.getElementById(stringFortotalRentPrice1);
    fc = totalProductsPrice.firstChild;
    totalProductsPrice.removeChild(fc);
    totalProductsPrice.innerHTML = saveForCancelTotalProductsPrice;
    ////////////
    var currentProduct = 1;
    while (currentProduct <= classes.length){
        var stringDays = "daysForRent" + repairId + "-" + currentProduct;
        var days = document.getElementById(stringDays);
        fc = days.firstChild;
        days.removeChild(fc);
        days.innerHTML = productsSaverForCancel[currentProduct-1].DaysForRent;

        var stringForProductPrice = "productCostPerDay" + repairId + "-" + currentProduct;
        var price = document.getElementById(stringForProductPrice);
        fc = price.firstChild;
        price.removeChild(fc);
        price.innerHTML = productsSaverForCancel[currentProduct-1].ProductCostForRent;
        
        currentProduct++;
    }
}

function init(repairId){
    ////////////// Save the currenct before change values  ///////////
    saveForCancelTotalProductsPrice = totalProductsPrice.firstChild.value;
    saveForCanceltotalRentPrice = totalRentPrice.firstChild.value;

    var x = 0;
    while(x<classes.length){
        var forSting = x + 1;
        var stringForProductCost =   "ProductCostForCancelSaver" + repairId + "-" + forSting;
        var cost = document.getElementById(stringForProductCost);
        var stringForProductRepairDays = "daysForRentForCancelSaver" + repairId + "-" + forSting;
        var days = document.getElementById(stringForProductRepairDays);
        productsSaverForCancel[x] = {
            DaysForRent: days.value,
            ProductCostForRent: cost.value
        };
        x++;
    }
}

function updateButton(rentId) {
     ////////////// Declare  ///////////
    countForProductString = "productClassCounter" + rentId;
    classes = document.getElementsByClassName(countForProductString);
    
    stringForRentStatus =  "rentStatusId" + rentId;
    rentStatusChooser = document.getElementById(stringForRentStatus);
    saveForCancelrentStatusChooser = rentStatusChooser.innerHTML;

    stringForTotalProductsPrice =  "totalProductsPrice" + rentId;
    totalProductsPrice = document.getElementById(stringForTotalProductsPrice);
    
    stringFortotalRentPrice =  "totalRentPrice" + rentId;
    totalRentPrice = document.getElementById(stringFortotalRentPrice);
    
    var stringForUpdateButton = "updateBtnInModal" + rentId;
    var updateBtn = document.getElementById(stringForUpdateButton);
    updateBtn.innerHTML = 'שמור';
    updateBtn.id = "updateSaveChanges" + rentId;
    updateBtn.setAttribute("onClick", "saveChangesBtn(" + rentId +")" );
    var stringForCancelId = "updateBtnInModalCancel" + rentId; 
    var cancelBtn = document.getElementById(stringForCancelId);
    cancelBtn.disabled = false;
    
    // Start by creating a <form>
    
    currentProduct = 1;
    while(currentProduct <= classes.length){
        var stringForProductCost2 = "ProductCostForCancelSaver" + rentId + "-" + currentProduct;
        var stringForProductCost =  "productCostPerDay" + rentId + "-" + currentProduct;
        var cost = document.getElementById(stringForProductCost);
        cost.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;width:50%;padding:0px;margin:auto;\" name=\"ProductPricePerDay" + currentProduct +"\" id=\"" + stringForProductCost2 +"\" required value = \"" + cost.innerHTML + "\">";
        var stringForProductRentDays2 = "daysForRentForCancelSaver" + rentId + "-" + currentProduct;
        var stringForProductRepairDays = "daysForRent" + rentId + "-" + currentProduct;
        var days = document.getElementById(stringForProductRepairDays);
        days.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;width:50%;padding:0px;margin:auto;\" name=\"RentDays" + currentProduct +"\"  id=\"" + stringForProductRentDays2 +"\" required value = \"" + days.innerHTML + "\">";
        currentProduct += 1;
    }
    //////////TOTAL REPAIR PRICE //////////////
    
    totalProductsPrice.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;width:50%;padding:0px;margin:auto;\" name=\"totalProductsPrice" + rentId +"\" required value = \"" + totalProductsPrice.innerHTML + "\">";
    //////////TOTAL REPAIR PRICE //////////////
    
    totalRentPrice.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;width:50%;padding:0px;margin:auto;\" name=\"totalRentPrice" + rentId +"\" required value = \"" + totalRentPrice.innerHTML + "\">";
    //////////STATUS  DONT FORGET TO UPDATE STATUSES!!!!!!!!!!!!!!!!!!!!!selected!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//////////////

    if(saveForCancelrentStatusChooser == "בטיפול"){
        rentStatusChooser.innerHTML = "<select name=\"rentStatusChooser\" style=\"margin: auto; display: block;\"><option selected value=\"1\">בטיפול</option><option  value=\"2\">הושלם</option></select>";
    }
    else{
        rentStatusChooser.innerHTML = "<select name=\"rentStatusChooser\" style=\"margin: auto; display: block;\"><option value=\"1\">בטיפול</option><option value=\"2\">הושלם</option></select>";
    }
    //////////NOW SENDING THE FORM //////////////
    ///////////
    newNumOfProducts = document.createElement('input');
    newNumOfProducts.type = 'hidden';
    newNumOfProducts.name = 'numOfProducts';
    newNumOfProducts.value = classes.length;
    ///////////
    var rentIdNum = document.createElement('input');
    rentIdNum.type = 'hidden';
    rentIdNum.name = 'rentIdNumber';
    rentIdNum.value = rentId;
    ///////////
    theForm.appendChild(newNumOfProducts);
    theForm.appendChild(rentIdNum);
    init(rentId);
}


function saveChangesBtn(repairId){
//$(#repairId).modal("hide");
    theForm.appendChild(rentStatusChooser);
    theForm.appendChild(totalProductsPrice);
    theForm.appendChild(totalRentPrice);
    currentProduct = 1;
    while(currentProduct <= classes.length){
        var stringForProductCost =  "productCostPerDay" + repairId + "-" + currentProduct;
        var cost = document.getElementById(stringForProductCost);
        theForm.appendChild(cost);
        var stringForProductRepairDays = "daysForRentForCancelSaver" + repairId + "-" + currentProduct;
        var days = document.getElementById(stringForProductRepairDays);
        theForm.appendChild(days);
        currentProduct += 1;
    }
    document.getElementById('hiddenFormForUpdateeRepair').appendChild(theForm);
    theForm.submit();
}
function deleteRent(rentId){
    var theForm, newInput1;
    // Start by creating a <form>
    theForm = document.createElement('form');
    theForm.action = '';
    theForm.method = 'POST';
    newInput1 = document.createElement('input');
    newInput1.type = 'hidden';
    newInput1.name = 'deleteRentId';
    newInput1.value = rentId;
    theForm.appendChild(newInput1);
    document.getElementById('hiddenFormForDeleteRepair').appendChild(theForm);
    theForm.submit();
}
