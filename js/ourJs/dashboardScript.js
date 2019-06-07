
$("#closeModalForChangePassword" ).click(function() {
    $("#modalForChangePassword").hide();
});

$("#openModalForUpdatePassword" ).click(function() {
    $("#modalForChangePassword").show();
});

$("#addNewEventToCalanderButton" ).click(function() {
    $("#modalForAddNewEvent").show();
});

$("#closeEventToCalanderButton" ).click(function() {
    $("#modalForAddNewEvent").hide();
});


$("#updateUserPassword" ).click(function() {
    var pass1 = document.getElementById("password1").value; 
    var pass2 = document.getElementById("password2").value; 
    if(pass1 !== '' && pass1.length >= 6 && pass1 == pass2){
        var theForm = document.createElement('form');
        theForm.action = '';
        theForm.method = 'POST';
        var password =  document.getElementById("password1"); 
        theForm.appendChild(password);
        document.getElementById('hiddenFormForUpdatePassword').appendChild(theForm);
        theForm.submit();
    }
});
$("#logoutBtn" ).click(function() {
    var logout = document.createElement('input');
    logout.type = 'hidden';
    logout.name = 'logout';
    logout.value = 'logout';
    var theForm = document.createElement('form');
    theForm.action = '';
    theForm.method = 'POST';
    theForm.appendChild(logout);
    document.getElementById('hiddenFormForLogout').appendChild(theForm);
    theForm.submit();
    
});
