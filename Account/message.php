<?php
if(isset($_POST['status']))
{
	?>
	<script>
		Swal.fire({
		  icon: 'error',
		  title: 'Wrong Email or Password',
		  showConfirmButton: false,
		  timer: 1500
		})
	</script>
	<?php
	unset($_SESSION['status']);
}
?>