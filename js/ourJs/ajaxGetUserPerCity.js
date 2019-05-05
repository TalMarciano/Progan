var data = Array();
$('#v-pills-My-Favorites').ready(function(){
    var xhr = new XMLHttpRequest(); 
    xhr.open("GET", "../php/ajaxGetUsersPerCity.php", true);
    xhr.setRequestHeader('Content-type', 'application/json');
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            var json = JSON.parse(xhr.responseText);
            for(var i = 0; i < json.length; i++){
                $row = JSON.parse(json[i]) ;
                data[i] =  {y: parseInt($row['CountPerCity']), label: $row['city']};
            }
        }
    }
    xhr.send();
});
setTimeout(function(){
    var chart = new CanvasJS.Chart("chartContainerColumns", {
    animationEnabled: true,
    theme: "light1",
    title: {
	    text: "Number of users per city"
    },
    axisY: {
	    title: "Users",
	    includeZero: true
	},
	axisX: {
		title: "City"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.0#\"\"",
		dataPoints: data
		
	}]
    });
    chart.render();
},3000);