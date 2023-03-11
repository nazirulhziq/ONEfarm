<?php

$con=mysqli_connect("localhost","root", "");
$db= mysqli_select_db($con,'onefarm');

if(isset($_POST['updatedata']))
{
   
    $animalID = $_POST['animalID'];
    $animalName = $_POST['animalName'];
    $animalQuantity = $_POST['animalQuantity'];
    $animalCost = $_POST['animalCost'];
    $animalPrice = $_POST['animalPrice'];
    $animalDOB = $_POST['animalDOB'];
    $animalAvail = $_POST['animalAvail'];
    $fname = $_FILES['file']['name'];
                                $temp = $_FILES['file']['tmp_name'];
                                $fsize = $_FILES['file']['size'];
                                $extension = explode('.',$fname);
                                $extension = strtolower(end($extension));  
                                $fnew = uniqid().'.'.$extension;
   
                                $store = "../images/".basename($fnew);                      // the path to store the upload image
    
                    if($extension == 'jpg'||$extension == 'png'||$extension == 'gif' )
                    {        
                                    if($fsize>=1000000)
                                        {
        
        
                                                $error =    '<div class="alert alert-danger alert-dismissible fade show">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <strong>Max Image Size is 1024kb!</strong> Try different Image.
                                                            </div>';
       
                                        }
        
                                    else
                                        {
    $que="UPDATE animal SET animalName='$animalName',animalQuantity='$animalQuantity',animalCost='$animalCost' ,animalPrice='$animalPrice',animalDOB='$animalDOB' , animalimg='$fnew',animalAvail='$animalAvail' WHERE animalID='$animalID'";
    $que_run=mysqli_query($con, $que);
move_uploaded_file($temp, $store);
    if($que_run)
    {

       

        echo '<script> alert("Data Updated"); <script>';
        header ('Location:animalAll.php');
    }

    else
    {
        echo '<script>alert ("Data Not Updated"); <script>';
    }
 }
}
}
?>