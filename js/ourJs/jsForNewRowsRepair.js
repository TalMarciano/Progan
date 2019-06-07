var intForRows = 2;
var addNewRow = document.getElementById("addNewRow");
addNewRow.addEventListener("click", function(){
        //var html = $('#data-table-basic tr:last').html();
        //$('#data-table-basic tr:last').after("<tr>" + html + "</tr>");
        var productsTable = document.getElementById("data-table-basic");
        // Create an empty <tr> element and add it to the 1st position of the table:
        var row = productsTable.insertRow(-1);
        // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
    
        // Add some text to the new cells:
        cell1.innerHTML = "<a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a>";
        cell1.style.padding = "25px";
        cell2.innerHTML = "<input type=\"text\" class=\"form-control\" name=\"estimateRepairDays" + intForRows + "\">";
        cell3.innerHTML = "<input type=\"text\" class=\"form-control\" name=\"estimatePrice" + intForRows + "\">";
        cell4.innerHTML = "<input type=\"text\" class=\"form-control\" name=\"repairDescription" + intForRows + "\">";
        cell5.innerHTML = "<input type=\"text\" class=\"form-control\" name=\"repairProductId" + intForRows + "\">";
        cell6.innerHTML = "<input type=\"text\" class=\"form-control\" name=\"repairProductName" + intForRows + "\">";
        intForRows++;
});
$(function(){
   $(document).on('click', '.remove', function() {
       if(intForRows > 2){
            document.getElementById("data-table-basic").deleteRow(-1);
            intForRows--;
       }
    });
});  

