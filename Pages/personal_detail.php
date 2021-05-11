<?php include('../MySQL/server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Detail</title>
    <link rel="stylesheet" type="text/css" href="../CSS/personal_detail_css.css?<?php echo time(); ?>">
</head>
<body>
    <p><abbr title="Back"><a href="profile.php"><img src="../Images/back.jpg" width="100px" height="60px" id="img1" ></a></abbr>
    <abbr title="Logout"><a href="login.php"><img src="../Images/logout.png" width="100px" height="60px" id="img2" align="right"></a></abbr></p>
    <center><div class="container">
    <form autocomplete="off">
        <h1 class="heading"><u>Personal Details</u></h1>
        <table align="center" width="40%">
            <table width="50%">

                <?php
                    $un=$_SESSION['username'];
                    $fn = $_SESSION['name'];
                    $cont=$_SESSION['phone'];
                    $db=mysqli_connect("localhost","root","","registration");
                    $query="SELECT * FROM personal_detail WHERE username='$un' ";
                    $run=mysqli_query($db,$query); 
                    while($row=mysqli_fetch_array($run)) 
                    {
                ?>
                
                <tr>
                    <td class="label" align="right"><label >Patient Name: </label></td>
                    <td align="right"><?php echo "$fn" ?></td>
                </tr>

                <tr>
                    <td class="label" align="right"><label >Patient Contact : </label></td>
                    <td align="right"><?php  echo "+91 $cont"?></td>
                </tr>

                <tr>
                    <td class="label" align="right"><label >Guardian's Name: </label></td>
                    <td align="right"><?php echo $row['guardian_name']; ?></td>
                </tr>

                <tr>
                    <td class="label" align="right"><label >Guardian Contact : </label></td>
                    <td align="right"><?php echo $row['guardian_no']; ?></td>
                </tr>

                <tr>
                    <td class="label" align="right"><label>DOB :</label></td>
                    <td align="right"><?php echo $row['dob']; ?></td>
                </tr>
            
                <tr>
                    <td  class="label" align="right"><label>Permanent Address :</label></td>
                    <td align="right"><?php echo $row['permanent_address']; ?></td>
                </tr>

                <tr>
                    <td  class="label" align="right"><label>Local Address :</label></td>
                    <td align="right"><?php echo $row['local_address']; ?></td>
                </tr>

                <tr>
                    <td  class="label" align="right"><label>Aadhar Number :</label></td>
                    <td align="right"><?php echo $row['aadhar_no']; ?></td>                    
                </tr>
            </table>
        <p><u><h1> Body Info</h1></u></p>
        <table width="40%">
            <tr>
                <td class="label" align="left"><label>Height :<?php echo $row['height']; ?> Feet</label></td>
                <td class="label" align="right" colspan="2"><label>Weight :<?php echo $row['weight']; ?> Kg</label></td>
            </tr>
            <tr>
                <td class="label" align="left"><label >Gender: <?php echo $row['gender']; ?></label></td>
                <td class="label" align="right"><label>Blood Group : <?php echo $row['blood_group']; ?></label></td>
            </tr>

            <tr>
                   <td align="center" colspan="2"><button type="submit" class="button">OK</button></td>
            </tr>

                <?php 
                } 
                ?>

        </table>
    </form>
</div></center>
</body>
</html>