var dataProducts = Array();
var value = null;
$('city').ready(function(){
    value = window['city'];
},3000);
$('#v-pills-My-Favorites').ready(function(){
var xhr = new XMLHttpRequest(); 
xhr.open("POST", "../php/ajaxGetProductPerCity.php", true);
xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
xhr.onreadystatechange = function(){
    if(xhr.readyState == 4 && xhr.status == 200){
        var json = JSON.parse(xhr.responseText);
        for(var i = 0; i < json.length; i++){
            $row = JSON.parse(json[i]) ;
            dataProducts[i] =  {y: parseInt($row['countPerProduct']), label: $row['ProductName']};
        }
    }
}
xhr.send("value="+value);
});
setTimeout(function(){
    var chart = new CanvasJS.Chart("chartContainerPie", {
	animationEnabled: true,
	title: {
		text: "Products that bought in your city"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.0\"\"",
		indexLabel: "{label} {y}",
		dataPoints: dataProducts
	}]
});
chart.render();
},3000); 