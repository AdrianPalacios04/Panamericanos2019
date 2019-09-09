    <?php  
//select.php  
if(isset($_POST["personal_id1"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "heroku");
 $query = "SELECT * FROM deportes WHERE id = '".$_POST["personal_id1"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
        <tr>  
            <td width="30%"><label>Descripción</label></td>  
            <td width="70%">'.$row["descripcion"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Historia</label></td>  
            <td width="70%">'.$row["historia"].'</td>  
        </tr>     
     ';
    }
    $output .= '</table></div>';
    echo $output;
}
?>
