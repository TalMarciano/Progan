var userDetailsBefore = new Array();

function resetpassword(userId){
    var userIdForReset = document.createElement('input');
    userIdForReset.type = 'hidden';
    userIdForReset.name = 'userIdForReset';
    userIdForReset.value = userId;
    var theForm = document.createElement('form');
    theForm.action = '';
    theForm.method = 'POST';
    theForm.appendChild(userIdForReset);
    document.getElementById('hiddenFormForResetPass').appendChild(theForm);
    alert(theForm);
    theForm.submit();
}

function saveChanges(userId){
    var firstName = document.getElementById("firstNameToUpdate" + userId);
    var lastName = document.getElementById("lastNameToUpdate" + userId);
    var email = document.getElementById("emailToUpdate" + userId);
    var isManager = document.getElementById("isManagerToUpdate" + userId);
    alert(isManager.value);
    alert(email.value);
    alert(lastName.value);
    alert(firstName.value);
    ////////////
    var isManagerToSend = document.createElement('input');
    isManagerToSend.type = 'hidden';
    isManagerToSend.name = 'isManagerSelectedSend';
    isManagerToSend.value = isManager.value;
    /////////////
    var userIdInput = document.createElement('input');
    userIdInput.type = 'hidden';
    userIdInput.name = 'userIdForUpdate';
    userIdInput.value = userId;
    /////////////
    var theForm = document.createElement('form');
    theForm.action = '';
    theForm.method = 'POST';
    /////////////
    theForm.appendChild(firstName);
    theForm.appendChild(lastName);
    theForm.appendChild(email);
    theForm.appendChild(isManagerToSend);
    theForm.appendChild(userIdInput);
    ///////////
    document.getElementById('hiddenFormForupdateUser').appendChild(theForm);
    alert(document.getElementById('hiddenFormForupdateUser'));
    theForm.submit();
}
function cancelChanges(userId){
    ///////////
    var resetBtnToChange = document.getElementById("cancelBtn" + userId);
    resetBtnToChange.innerHTML = 'אפס סיסמא';
    resetBtnToChange.id = "resetPassBtn" + userId;
    resetBtnToChange.classList.remove("btn-danger");
    resetBtnToChange.classList.add("btn-default");
    resetBtnToChange.setAttribute("onClick", "resetpassword(" + userDetailsBefore[0].email +")" );  
    ///////////
    /////////////
    var firstName = document.getElementById("firstName" + userId);
    var fc = firstName.firstChild;
    firstName.removeChild(fc);
    firstName.innerHTML = userDetailsBefore[0].firstName;
    ////////////
    /////////////
    var lastName = document.getElementById("lastName" + userId);
    var fc = lastName.firstChild;
    lastName.removeChild(fc);
    lastName.innerHTML = userDetailsBefore[0].lastName;
    /////////////
    var email = document.getElementById("email" + userId);
    var fc = email.firstChild;
    email.removeChild(fc);
    email.innerHTML = userDetailsBefore[0].email;
    /////////////
    var isManager = document.getElementById("isManagerToChangeToOption" + userId);
    var fc = isManager.firstChild;
    isManager.removeChild(fc);
    if(userDetailsBefore[0].isManager == 1){
        isManager.innerHTML = 'מנהל';
    }
    else{
        isManager.innerHTML = 'עובד';
    }
    ////////////
    var saveBtn = document.getElementById("updateSaveChanges" + userId);
    saveBtn.innerHTML = 'ערוך';
    saveBtn.id = "updateBtn" + userId;
    saveBtn.setAttribute("onClick", "updateUser(" + userId +")" );
}

function updateUser(userId){
    var firstName = document.getElementById("firstName" + userId);
    var lastName = document.getElementById("lastName" + userId);
    var email = document.getElementById("email" + userId);
    var isManagerToChange = document.getElementById("isManagerToChangeToOption" + userId);
    var isManager = document.getElementById("isManager" + userId);
    userDetailsBefore[0] = {
        userId: userId,
        firstName: firstName.innerHTML,
        lastName: lastName.innerHTML,
        email: email.innerHTML,
        isManager: isManager.innerHTML
    };
    /////////
    var updateBtn = document.getElementById("updateBtn" + userId);
    updateBtn.innerHTML = 'שמור';
    updateBtn.id = "updateSaveChanges" + userId;
    updateBtn.setAttribute("onClick", "saveChanges(" + userId +")" );    
    //////////
    firstName.innerHTML = "<input type=\"text\" class=\"form-control\"  style =\"text-align:center;width:50%;padding:0px;margin:auto;\" id=\"firstNameToUpdate" + userId + "\" name=\"firstName\" value =\"" + firstName.innerHTML + "\">";
    lastName.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;width:50%;padding:0px;margin:auto;\"id=\"lastNameToUpdate" + userId + "\" name=\"lastName\" value =\"" +lastName.innerHTML + "\">";
    email.innerHTML = "<input type=\"text\" class=\"form-control\" style =\"text-align:center;width:90%;padding:0px;margin:auto;\" id=\"emailToUpdate" + userId + "\" name=\"email\" value =\"" +email.innerHTML + "\">";
    if(isManager.innerHTML == 1){
        isManagerToChange.innerHTML =  "<select name=\"isManagerSelected\" id=\"isManagerToUpdate" + userId + "\" style=\"margin: auto; display: block;\"> <option selected value=\"1\">מנהל</option><option value=\"0\">עובד</option></select>";
    }
    else{
        isManagerToChange.innerHTML = "<select name=\"isManagerSelected\" id=\"isManagerToUpdate" + userId + "\" style=\"margin: auto; display: block;\"> <option value=\"1\">מנהל</option><option selected value=\"0\">עובד</option></select>";
    }
    
    /////////
    var resetBtnToChange = document.getElementById("resetPassBtn" + userId);
    resetBtnToChange.innerHTML = 'ביטול';
    resetBtnToChange.id = "cancelBtn" + userId;
    resetBtnToChange.classList.add("btn-danger");
    resetBtnToChange.classList.remove("btn-default");
    resetBtnToChange.setAttribute("onClick", "cancelChanges(" + userId +")" );  
}

function deleteUser(userId){
    var theForm, newInput1;
    // Start by creating a <form>
    theForm = document.createElement('form');
    theForm.action = '';
    theForm.method = 'POST';
    newInput1 = document.createElement('input');
    newInput1.type = 'hidden';
    newInput1.name = 'deleteUserId';
    newInput1.value = userId;
    theForm.appendChild(newInput1);
    document.getElementById('hiddenFormForDeleteUser').appendChild(theForm);
    theForm.submit();
}
