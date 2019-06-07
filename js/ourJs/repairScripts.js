////////////// VARs ///////////
var repairStatusChooser, totalProductsPrice, totalRepairPrice, classes,currentProduct, countForProductString, stringForRepairStatus, stringForTotalProductsPrice, stringForTotalRepairPrice;
var saveForCancelrepairStatusChooser , saveForCanceltotalProductsPrice, saveForCanceltotalRepairPrice, saveForCancelcurrentProduct; 
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
    
    ////add code here to back to normal/////
   /* var child = document.getElementById("estimateDaysForCancelSaver200006-1");
    var parent = document.getElementById("estimateDaysForRepair200006-1");
    parent.removeChild(child);
    parent.innerHTML = productsSaverForCancel[0].estimateDaysForRepair;*/
    
    var stringForRepairStatus = "repairStatusId" + repairId;
    var status = document.getElementById(stringForRepairStatus)
    var fc = status.firstChild;
    status.removeChild(fc);
    ///////////////CHANGER THE STRING HERE//////////////
    var stringForStatusBack = saveForCancelRepairStatusChooser;
    status.innerHTML = stringForStatusBack;
        ////////////
    
    var stringForTotalRepairPrice = "totalRepairPrice" + repairId;
    var totalPrice = document.getElementById(stringForTotalRepairPrice);
    fc = totalPrice.firstChild;
    totalPrice.removeChild(fc);
    totalPrice.innerHTML = saveForCancelTotalRepairPrice;
        ////////////
        
    var stringForTotalRepairPrice1 = "totalProductsPrice" + repairId;
    var totalProductsPrice = document.getElementById(stringForTotalRepairPrice1);
    fc = totalProductsPrice.firstChild;
    totalProductsPrice.removeChild(fc);
    totalProductsPrice.innerHTML = saveForCancelTotalProductsPrice;
    ////////////
    var currentProduct = 1;
    while (currentProduct <= classes.length){
        var stringDays = "estimateDaysForRepair" + repairId + "-" + currentProduct;
        var days = document.getElementById(stringDays);
        fc = days.firstChild;
        days.removeChild(fc);
        days.innerHTML = productsSaverForCancel[currentProduct-1].estimateDaysForRepair;

        var stringForProductPrice = "estimateProductCost" + repairId + "-" + currentProduct;
        var price = document.getElementById(stringForProductPrice);
        fc = price.firstChild;
        price.removeChild(fc);
        price.innerHTML = productsSaverForCancel[currentProduct-1].estimateProductCost;
        
        currentProduct++;
    }
}

function init(repairId){
    ////////////// Save the currenct before change values  ///////////
    saveForCancelTotalProductsPrice = totalProductsPrice.firstChild.value;
    saveForCancelTotalRepairPrice = totalRepairPrice.firstChild.value;

    var x = 0;
    while(x<classes.length){
        var forSting = x + 1;
        var stringForProductCost =   "ProductCostForCancelSaver" + repairId + "-" + forSting;
        var cost = document.getElementById(stringForProductCost);
        var stringForProductRepairDays = "estimateDaysForCancelSaver" + repairId + "-" + forSting;
        var days = document.getElementById(stringForProductRepairDays);
        productsSaverForCancel[x] = {
            estimateDaysForRepair: days.value,
            estimateProductCost: cost.value
        };
        x++;
    }
}

function updateButton(repairId) {
     ////////////// Declare  ///////////
    countForProductString = "productClassCounter" + repairId;
    classes = document.getElementsByClassName(countForProductString);
    
    stringForRepairStatus =  "repairStatusId" + repairId;
    repairStatusChooser = document.getElementById(stringForRepairStatus);

    saveForCancelRepairStatusChooser = repairStatusChooser.innerHTML;

    stringForTotalProductsPrice =  "totalProductsPrice" + repairId;
    totalProductsPrice = document.getElementById(stringForTotalProductsPrice);
    
    stringForTotalRepairPrice =  "totalRepairPrice" + repairId;
    totalRepairPrice = document.getElementById(stringForTotalRepairPrice);
    
    var stringForUpdateButton = "updateBtnInModal" + repairId;
    var updateBtn = document.getElementById(stringForUpdateButton);
    updateBtn.innerHTML = 'שמור';
    updateBtn.id = "updateSaveChanges" + repairId;
    updateBtn.setAttribute("onClick", "saveChangesBtn(" + repairId +")" );
    var stringForCancelId = "updateBtnInModalCancel" + repairId; 
    var cancelBtn = document.getElementById(stringForCancelId);
    cancelBtn.disabled = false;
    
    // Start by creating a <form>
    
    currentProduct = 1;
    while(currentProduct <= classes.length){
        var stringForProductCost2 = "ProductCostForCancelSaver" + repairId + "-" + currentProduct;
        var stringForProductCost =  "estimateProductCost" + repairId + "-" + currentProduct;
        var cost = document.getElementById(stringForProductCost);
        cost.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;width:50%;padding:0px;margin:auto;\" name=\"estimateProductCost" + currentProduct +"\" id=\"" + stringForProductCost2 +"\" required value = \"" + cost.innerHTML + "\">";
        var stringForProductRepairDays2 = "estimateDaysForCancelSaver" + repairId + "-" + currentProduct;
        var stringForProductRepairDays = "estimateDaysForRepair" + repairId + "-" + currentProduct;
        var days = document.getElementById(stringForProductRepairDays);
        days.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;width:50%;padding:0px;margin:auto;\" name=\"estimateRepairDays" + currentProduct +"\"  id=\"" + stringForProductRepairDays2 +"\" required value = \"" + days.innerHTML + "\">";
        currentProduct += 1;
    }
    //////////TOTAL REPAIR PRICE //////////////
    
    totalProductsPrice.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;width:50%;padding:0px;margin:auto;\" name=\"totalProductsPrice" + repairId +"\" required value = \"" + totalProductsPrice.innerHTML + "\">";
    //////////TOTAL REPAIR PRICE //////////////
    
    totalRepairPrice.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;width:50%;padding:0px;margin:auto;\" name=\"totalRepairPrice" + repairId +"\" required value = \"" + totalRepairPrice.innerHTML + "\">";
    //////////STATUS  DONT FORGET TO UPDATE STATUSES!!!!!!!!!!!!!!!!!!!!!selected!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//////////////
    
    if(saveForCancelRepairStatusChooser == "בטיפול"){
        repairStatusChooser.innerHTML = "<select name=\"RepairStatusChooser\" style=\"margin: auto; display: block;\"><option selected value=\"1\">בטיפול</option><option  value=\"2\">הושלם</option><option value=\"3\">נאסף</option></select>";
    }
    else if(saveForCancelRepairStatusChooser == "הושלם"){
        repairStatusChooser.innerHTML = "<select name=\"RepairStatusChooser\" style=\"margin: auto; display: block;\"><option selected value=\"1\">בטיפול</option><option selected  value=\"2\">הושלם</option><option value=\"3\">נאסף</option></select>";
    }
    else{
        repairStatusChooser.innerHTML = "<select name=\"RepairStatusChooser\" style=\"margin: auto; display: block;\"><option value=\"1\">בטיפול</option><option value=\"2\">הושלם</option><option selected  value=\"3\">נאסף</option></select>";
    }
    //////////NOW SENDING THE FORM //////////////
    ///////////
    newNumOfProducts = document.createElement('input');
    newNumOfProducts.type = 'hidden';
    newNumOfProducts.name = 'numOfProducts';
    newNumOfProducts.value = classes.length;
    ///////////
    var repairIdNum = document.createElement('input');
    repairIdNum.type = 'hidden';
    repairIdNum.name = 'repairIdNumber';
    repairIdNum.value = repairId;
    ///////////
    theForm.appendChild(newNumOfProducts);
    theForm.appendChild(repairIdNum);
    init(repairId);
}


function saveChangesBtn(repairId){
//$(#repairId).modal("hide");
    theForm.appendChild(repairStatusChooser);
    theForm.appendChild(totalProductsPrice);
    theForm.appendChild(totalRepairPrice);
    currentProduct = 1;
    while(currentProduct <= classes.length){
        var stringForProductCost =  "estimateProductCost" + repairId + "-" + currentProduct;
        var cost = document.getElementById(stringForProductCost);
        theForm.appendChild(cost);
        var stringForProductRepairDays = "estimateDaysForRepair" + repairId + "-" + currentProduct;
        var days = document.getElementById(stringForProductRepairDays);
        theForm.appendChild(days);
        currentProduct += 1;
    }
    document.getElementById('hiddenFormForUpdateeRepair').appendChild(theForm);
    theForm.submit();
    //alert();
}
function deleteRepair(repairId) {
    var theForm, newInput1;
    // Start by creating a <form>
    theForm = document.createElement('form');
    theForm.action = '';
    theForm.method = 'POST';
    newInput1 = document.createElement('input');
    newInput1.type = 'hidden';
    newInput1.name = 'deleteRepairId';
    newInput1.value = repairId;
    theForm.appendChild(newInput1);
    document.getElementById('hiddenFormForDeleteRepair').appendChild(theForm);
    theForm.submit();
}

