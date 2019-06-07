window.addEventListener("load", function(){
    var isManagerParameter = document.getElementById("isManagerParameterForThatUser");
    var buttons = document.getElementsByClassName("buttonForManagers");
    if(isManagerParameter.innerHTML == 0){
        for(i= 0; i< buttons.length; i++){
            buttons[i].disabled = true;
        }
    }
    
});

////////////Search function////////////////
function isExistingCellStartWith(children, length, filter) {
    let td;
     for (child = 1; child < length; child++) {  
         td = children[child];
         if(td.innerHTML.toUpperCase().includes(filter)) {
             return true
         }
    }
    return false;
}

function myFunction() {
  let input, filter, a, i, j, td, trs, child, table;
  input = document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("data-table-basic");
  trs = table.getElementsByTagName("tr");
  for (i = 1; i < trs.length; i++) {
        if(isExistingCellStartWith(trs[i].children, trs[i].children.length, filter)) {
            trs[i].style.display = "";
        } else {
            trs[i].style.display = "none";
        }
    }
}
////////////Search function////////////////


