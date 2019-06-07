
function resetpassword(customerId){
    var customerIdForReset = document.createElement('input');
    customerIdForReset.type = 'hidden';
    customerIdForReset.name = 'customerIdForReset';
    customerIdForReset.value = customerId;
    var theForm = document.createElement('form');
    theForm.action = '';
    theForm.method = 'POST';
    theForm.appendChild(customerIdForReset);
    document.getElementById('hiddenFormForResetPass').appendChild(theForm);
    theForm.submit();
}

function saveChanges(customerId){
    /////////////
    var customerIdInput = document.createElement('input');
    customerIdInput.type = 'hidden';
    customerIdInput.name = 'customerIdForUpdate';
    customerIdInput.value = customerId;
    /////////////
    var firstName = document.getElementById("firstNameToUpdate" + customerId);
    var firstnameSend = document.createElement('input');
    firstnameSend.type = 'hidden';
    firstnameSend.name = 'firstName';
    firstnameSend.value = firstName.value;
    /////////////
    var lastName = document.getElementById("lastNameToUpdate" + customerId);
    var lastNameSend = document.createElement('input');
    lastNameSend.type = 'hidden';
    lastNameSend.name = 'lastName';
    lastNameSend.value = lastName.value;
       /////////////
    var phone = document.getElementById("phoneToUpdate" + customerId);    
    var phoneSend = document.createElement('input');
    phoneSend.type = 'hidden';
    phoneSend.name = 'phone';
    phoneSend.value = phone.value;
     /////////////
    var email = document.getElementById("emailToUpdate" + customerId);
    var emailSend = document.createElement('input');
    emailSend.type = 'hidden';
    emailSend.name = 'email';
    emailSend.value = email.value;
    /////////////
    var theForm = document.createElement('form');
    theForm.action = '';
    theForm.method = 'POST';
    /////////////
    theForm.appendChild(firstName);
    theForm.appendChild(lastName);
    theForm.appendChild(customerIdInput);
    theForm.appendChild(phone);
    theForm.appendChild(email);
    ///////////
    document.getElementById('hiddenFormForupdateCustomer').appendChild(theForm);
    theForm.submit();
}
function cancelChanges(customerId){
    ///////////
    var resetBtnToChange = document.getElementById("cancelBtn" + customerId);
    resetBtnToChange.innerHTML = 'מחק';
    resetBtnToChange.id = "deleteBtn" + customerId;
    resetBtnToChange.classList.remove("btn-danger");
    resetBtnToChange.classList.add("btn-default");
    resetBtnToChange.setAttribute("onClick", "deleteCustomer(" + customerDetailsBefore.email +")" );  
    ///////////
    /////////////
    var firstName = document.getElementById("firstName" + customerId);
    var fc = firstName.firstChild;
    firstName.removeChild(fc);
    firstName.innerHTML = customerDetailsBefore.firstName;
    ////////////
    /////////////
    var lastName = document.getElementById("lastName" + customerId);
    fc = lastName.firstChild;
    lastName.removeChild(fc);
    lastName.innerHTML = customerDetailsBefore.lastName;
    /////////////
    var email = document.getElementById("email" + customerId);
    fc = email.firstChild;
    email.removeChild(fc);
    email.innerHTML = customerDetailsBefore.email;
    /////////////
    var phone = document.getElementById("phone" + customerId);
    fc = phone.firstChild;
    phone.removeChild(fc);
    phone.innerHTML = customerDetailsBefore.phone;
    /////////////
    var saveBtn = document.getElementById("updateSaveChanges" + customerId);
    saveBtn.innerHTML = 'ערוך';
    saveBtn.id = "updateBtn" + customerId;
    saveBtn.setAttribute("onClick", "updateCustomer(" + customerId + ")" );
}

function updateCustomer(customerId){
    var firstName = document.getElementById("firstName" + customerId);
    var lastName = document.getElementById("lastName" + customerId);
    var email = document.getElementById("email" + customerId);
    var phone = document.getElementById("phone" + customerId);

    customerDetailsBefore= {
        customerId: customerId,
        firstName: firstName.innerHTML,
        lastName: lastName.innerHTML,
        email: email.innerHTML,
        phone: phone.innerHTML
    };
    console.log(customerDetailsBefore);
    /////////
    var updateBtn = document.getElementById("updateBtn" + customerId);
    updateBtn.innerHTML = 'שמור';
    updateBtn.setAttribute("onclick", "saveChanges(" + customerId + ")" );
    updateBtn.id = "updateSaveChanges" + customerId;

    //////////
    firstName.innerHTML = "<input type=\"text\" class=\"form-control\"  style =\"text-align:center;width:50%;padding:0px;margin:auto;\" id=\"firstNameToUpdate" + customerId + "\" name=\"firstName\" value =\"" + firstName.innerHTML + "\">";
    lastName.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;width:50%;padding:0px;margin:auto;\"id=\"lastNameToUpdate" + customerId + "\" name=\"lastName\" value =\"" +lastName.innerHTML + "\">";
    phone.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;width:90%;padding:0px;margin:auto;\" id=\"phoneToUpdate" + customerId + "\" name=\"phone\" value =\"" +phone.innerHTML + "\">";
    email.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;width:90%;padding:0px;margin:auto;\" id=\"emailToUpdate" + customerId + "\" name=\"email\" value =\"" +email.innerHTML + "\">";
    /////////
    var resetBtnToChange = document.getElementById("deleteBtn" + customerId);
    resetBtnToChange.innerHTML = 'ביטול';
    resetBtnToChange.id = "cancelBtn" + customerId;
    resetBtnToChange.classList.add("btn-danger");
    resetBtnToChange.classList.remove("btn-default");
    resetBtnToChange.setAttribute("onClick", "cancelChanges(" + customerId +")" );  
    
}

function deleteCustomer(customerId){
    var theForm, newInput1;
    // Start by creating a <form>
    theForm = document.createElement('form');
    theForm.action = '';
    theForm.method = 'POST';
    newInput1 = document.createElement('input');
    newInput1.type = 'hidden';
    newInput1.name = 'deleteCustomerId';
    newInput1.value = customerId;
    theForm.appendChild(newInput1);
    document.getElementById('hiddenFormForDeleteCustomer').appendChild(theForm);
    theForm.submit();
}
