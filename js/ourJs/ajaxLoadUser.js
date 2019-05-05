
var address1 = document.getElementById("address1");
var city = document.getElementById("city");
var country = document.getElementById("country");
var phone = document.getElementById("phone");
var email = document.getElementById("email");
var fullName = document.getElementById("fullName");
var firstNameEdit = document.getElementById("firstNameEdit");
var lastNameEdit = document.getElementById("lastNameEdit");
var emailEdit = document.getElementById("emailEdit");
var xhr = new XMLHttpRequest(); 
xhr.open("GET", "../php/ajaxReq.php", true);
xhr.setRequestHeader('Content-type', 'application/json');
xhr.onreadystatechange = function(){
    //console.log('ready State: ' + xhr.readyState);
    if(xhr.readyState < 4){
        address1.innerHTML = 'Loading..';
        city.innerHTML = 'Loading..';
        country.innerHTML = 'Loading..';
        phone.innerHTML = 'Loading..';
        fullName.innerHTML = 'Loading..';
        email.innerHTML = 'Loading..';
    }
    if(xhr.readyState == 4 && xhr.status == 200){
        var json = JSON.parse(xhr.responseText);
        //console.log(json);
       // console.log(typeof json);
        address1.innerHTML = json.Address1;
        city.innerHTML = json.City;
        country.innerHTML = json.Country;
        phone.innerHTML = json.Phone;
        email.innerHTML = json.email;
        fullName.innerHTML = json.firstName +' ' + json.lastName;
        emailEdit.innerHTML = json.email;
        lastNameEdit.innerHTML = json.lastName;
        firstNameEdit.innerHTML = json.firstName;
        $('#address1Edit').attr('placeholder','');
        $('#address1Edit').attr('placeholder','New Text Here');
        window['city'] = json.City;
    }
}
xhr.send();