<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Panamericanos 2019 Peru</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<body>
<div class="container">
	<div class="card-deck" style="margin-top: 30px">
		<div class="card" style="width:;">
  			<div class="card-body">
  				<?php  
					
					$query = "SELECT * FROM deportes";
					$result = mysqli_query($con, $query);
 				?>
 				<?php
      			while($row = mysqli_fetch_array($result))
      			{
      			?>
			      <tr>
			       <td><?php echo $row["nombre"]; ?></td>
  			</div>

  			<td><input type="button" name="view" value="Vista Previa" id="<?php echo $row["id"]; ?>" class="btn btn-info view_data" /></td>
			      </tr>
			      <?php
			      }
      			?>
			<!-- Modal -->
		<div id="dataModal" class="modal fade">
			<div class="modal-dialog">
			  <div class="modal-content">
			   <div class="modal-header">
			   	<h5 class="modal-title">Personal Detalles</h5>
			    <button type="button" class="close" data-dismiss="modal">&times;</button>

			   </div>
			   <div class="modal-body" id="personal_detalles">
			    
			   </div>
			   <div class="modal-footer">
			    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			   </div>
			  </div>
			</div>
		</div>
	</div>

</div>			
<script>
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#name').val() == "")  
  {  
   alert("Name is required");  
  }  
  else if($('#address').val() == '')  
  {  
   alert("Address is required");  
  }  
  else if($('#designation').val() == '')
  {  
   alert("Designation is required");  
  }
   
  else  
  {  
   $.ajax({  
    url:"insertar.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });
 $(document).on('click', '.view_data', function(){
  //$('#dataModal').modal();
  var personal_id1 = $(this).attr("id");
  $.ajax({
   url:"VistaPrevia.php",
   method:"POST",
   data:{personal_id1:personal_id1},
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
});
</script>
</body>
</html>