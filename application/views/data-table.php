<!DOCTYPE html>
<html>
<head>
	<title>DataTables AJAX Pagination with Search and Sort in CodeIgniter</title>

	<!-- Datatable CSS -->
	<link href='<?php echo base_url()?>assets/css/bootstrap.css' rel='stylesheet' type='text/css'>
	<link href='<?php echo base_url()?>assets/css/dataTables.bootstrap4.min.css' rel='stylesheet' type='text/css'>

	<!-- jQuery Library -->
	<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>

	<!-- Datatable JS -->
	<script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/dataTables.bootstrap4.min.js"></script>

</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<!-- Table -->
				<table id='empTable' class="table table-striped " style="width:100%">

				  <thead>
				    <tr>
				      <th>Name</th>
				      <th>Email</th>
				      <th>Gender</th>
				      <th>Salary</th>
				      <th>City</th>
				    </tr>
				  </thead>

				</table>
			</div>
		</div>
	</div>
	

	<!-- Script -->
	<script type="text/javascript">
	$(document).ready(function(){
	   	$('#empTable').DataTable({
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	'ajax': {
	          'url':'<?php echo base_url()?>user-list'
	      	},
	      	'columns': [
	         	{ data: 'name' },
	         	{ data: 'email' },
	         	{ data: 'gender' },
	         	{ data: 'salary' },
	         	{ data: 'city' },
	      	]
	   	});
	});
	</script>
</body>
</html>






