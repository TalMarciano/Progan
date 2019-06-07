function deleteProduct(productId){
     var theForm, newInput1;
     var idForWix = document.getElementById("productIdForWix" + productId);
     alert(idForWix.innerHTML);
    // Start by creating a <form>
    theForm = document.createElement('form');
    theForm.action = '';
    theForm.method = 'POST';
    newInput1 = document.createElement('input');
    newInput1.type = 'hidden';
    newInput1.name = 'deleteProductId';
    newInput1.value = idForWix.innerHTML;
    theForm.appendChild(newInput1);
    document.getElementById('hiddenFormForDeleteProduct').appendChild(theForm);
    theForm.submit();
}
function updateProduct(productid){
    var productId = document.getElementById("productId" + productid);
    var productName = document.getElementById("productName" + productid);
    var images = document.getElementById("images" + productid);
    var salePrice = document.getElementById("salePrice" + productid);
    var regularPrice = document.getElementById("regularPrice" + productid);
    var longDescription = document.getElementById("longDescription" + productid);
    var shortDescription = document.getElementById("shortDescription" + productid);
    
    var productIdValue = productId.value;
    var productNameValue = productName.value;
    var imagesValue = images.value;
    var salePriceValue = salePrice.value;
    var regularPriceValue = regularPrice.value;
    var longDescriptionValue =longDescription.value ;
    var shortDescriptionValue = shortDescription.value;
    
    theForm = document.createElement('form');
    theForm.action = '';
    theForm.method = 'POST';
    
    /////////////
     var idForWix = document.getElementById("productIdForWix" + productid);
    productIdForWixHidden = document.createElement('input');
    productIdForWixHidden.type = 'hidden';
    productIdForWixHidden.name = 'productIdForWixValue';
    productIdForWixHidden.value = idForWix.innerHTML;
        theForm.appendChild(productIdForWixHidden);
    /////////////
    productIdHidden = document.createElement('input');
    productIdHidden.type = 'hidden';
    productIdHidden.name = 'productIdValue';
    productIdHidden.value = productIdValue;
        theForm.appendChild(productIdHidden);

    /////////////
    productNameHidden = document.createElement('input');
    productNameHidden.type = 'hidden';
    productNameHidden.name = 'productNameValue';
    productNameHidden.value = productNameValue;
        theForm.appendChild(productNameHidden);

    /////////////
    imagesHidden = document.createElement('input');
    imagesHidden.type = 'hidden';
    imagesHidden.name = 'imagesValue';
    imagesHidden.value = imagesValue;
        theForm.appendChild(imagesHidden);

    /////////////
    salePriceHidden = document.createElement('input');
    salePriceHidden.type = 'hidden';
    salePriceHidden.name = 'salePriceValue';
    salePriceHidden.value = salePriceValue;
        theForm.appendChild(salePriceHidden);

    /////////////
    regularPriceHidden = document.createElement('input');
    regularPriceHidden.type = 'hidden';
    regularPriceHidden.name = 'regularPriceValue';
    regularPriceHidden.value = regularPriceValue;
        theForm.appendChild(regularPriceHidden);

    /////////////
    longDescriptionHidden = document.createElement('input');
    longDescriptionHidden.type = 'hidden';
    longDescriptionHidden.name = 'longDescriptionValue';
    longDescriptionHidden.value = longDescriptionValue;
        theForm.appendChild(longDescriptionHidden);

    /////////////
    shortDescriptionHidden = document.createElement('input');
    shortDescriptionHidden.type = 'hidden';
    shortDescriptionHidden.name = 'shortDescriptionValue';
    shortDescriptionHidden.value = shortDescriptionValue;
        theForm.appendChild(shortDescriptionHidden);

    ///////////////////
    document.getElementById('hiddenFormForUpdateProduct').appendChild(theForm);
    theForm.submit();
}
