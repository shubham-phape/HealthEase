$(document).ready(function(){  
	// code to get all records from table via select box
	$("#details").change(function() {    
		var id = $(this).find(":selected").val();
		var dataString = 'pid='+ id;
		//window.alert(dataString);  
		$.ajax({
			url: "getPid.php",
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(pData) {
			   if(pData) {
					$("#age").val(pData.age);
				}  
			//window.alert(pData.age);  

			} 
		});
 	}) 
});