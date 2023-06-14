

function updateUserStatus(){
	jQuery.ajax({
		url:'update_user_stats.php',
		success:function(){
			
		}
	});
}


setInterval(function(){
	updateUserStatus();
},3000);

