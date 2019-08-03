
<html>
<head>
<script>
 
function validation(){
	var year = document.counter.year.value;
	var mon = document.counter.month.value;
	var day = document.counter.day.value;
	
	if(year==""){
		window.alert("Enter the year");	
        return false;		
	}
	if(mon==""){
		window.alert("Enter the month");	
        return false;		
	}
	if(day==""){
		window.alert("Enter the day");	
        return false;		
	}
var current_year = new Date().getFullYear();
var current_month = new Date().getMonth();
var current_day = new Date().getDate();
var month = mon-1;

if(year<current_year){
	
	window.alert("Enter Valid Year");
	return false;
	
}

else if(year==current_year && month < current_month){
	
	window.alert("Enter Valid Month");
	return false;
}
else if(year==current_year && month == current_month && day <= current_day){
	window.alert("Enter Valid Day");
    return false;	
}
	
}
</script>
</head>

<div>
<h1>Add Competitions</h1>
<br>
<br>
<hr>
<br>
<br>
<form name = "counter" method="post" onsubmit="return validation()" action="Competition.php">
<h2>Competition Name</h2>
<input type = "text" name ="number">
<br>
<h2>Date of competition</h2>
<p>Date</p>
<input type = "Number" name ="day">
<p>Month</p>
<input type = "Number" name ="month">
<p>Year</p>
<input type = "Number" name ="year"><br><br>
<input type = "submit" value = "submit">
</form>
</div>
</html>