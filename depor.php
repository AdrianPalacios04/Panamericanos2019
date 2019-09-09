<?php
include("conexion.php")
?>
<!DOCTYPE html>
<html>
<head>
	<title>Panamericanos 2019</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	<center> 
		<?php
				$query = "SELECT * FROM deportes";
				$result = mysqli_query($con, $query);
 				?>
 				<?php
      			while($row = mysqli_fetch_array($result))
      			{
      			?>
		<div class="card-deck" style="width: 40rem;margin-top: 30px ">
		  <div class="card">
		  		<div class="card-header">
    			<h2><?php echo $row["nombre"];?></h2>
  				</div>
		    <div class="card-body">
		      <?php  
                $query1 = "SELECT * FROM imagen WHERE id_imagen=1";  
                $result1 = mysqli_query($con, $query1);  
                while($row1 = mysqli_fetch_array($result1))  
                { 
                     echo '<img src="data:image/jpeg;base64,'.base64_encode($row1['name'] ).'" height="200" width="500" class="img-thumnail" />    
                     ';  
        			}         
                ?>  
		    </div>
		    <input type="button" name="view" value="Información" id="<?php echo $row["id"]; ?>" class="btn btn-info view_data" />
		  </div>
		</div>
		<?php
			}
		
      	?>

      	<div id="dataModal" class="modal fade">
			<div class="modal-dialog">
			  <div class="modal-content">
			   <div class="modal-header">
			   	<h5 class="modal-title"></h5>
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
	</center>
	</div>
	<script>
$(document).ready(function(){
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