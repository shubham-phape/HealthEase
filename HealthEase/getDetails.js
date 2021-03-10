$(document).ready(function(){  
	// code to get all records from table via select box
	$("#details").change(function() {    
		var id = $(this).find(":selected").val();
		var dataString = 'pid='+ id;
		//window.alert(dataString);  
		$.ajax({
			url: "getDetails.php",
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(pData) {
			   if(pData) {
			   	console.log(pData.sc);
					if (pData.gender == 0) {
						$("#gender").val("Female");
					}
					else{
						$("#gender").val("Male");	
					}
					$("#age").val(pData.age);
					$("#race").val(pData.race);
					$("#sc").val(pData.sc); 
				}  
			//window.alert("hi");  

			} 
		});
 	}) 
});

