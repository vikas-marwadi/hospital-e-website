<?php include('../MySQL/server.php'); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Detail</title>
    <link rel="stylesheet" type="text/css" href="../CSS/stylesheet.css?<?php echo time(); ?>">
<body>
    <p><abbr title="Logout"><a href="login.php"><img src="../Images/logout.png" width="100px" height="60px" id="img2" align="right"></a></abbr></p><br>
    <center><div class="container">
    <form autocomplete="off" action="personal.php" method="post" enctype="multipart/form-data">
        <h1 class="heading">Personal Details</h1>
        <table align="center" width="70%">
            <?php include('../MySQL/errors.php'); 
                $un=$_SESSION['username'];
                $cont=$_SESSION['phone'];
                $fn = $_SESSION['name'];
            ?>

            <tr>
                <td class="label" align="right"><label >Hospital Name: </label></td>
                <td class="input"><input type="text" required name="hospital_name" value="<?php echo "CHARUSAT Hospital"; ?>"></td>
            </tr>
            <tr>
                <td class="label" align="right"><label >Hospital City: </label></td>
                <td class="input"><input type="text" required name="hospital_city" value="<?php echo "Anand"; ?>"></td>
            </tr>
            <tr>
                <td class="label"><label >Username: </label></td>
                <td class="input"><input type="text" required name="username" readonly  value="<?php echo "$un"; ?>"></td>
            </tr>
            <tr>
                <td class="label"><label >Full Name: </label></td>
                <td class="input"><input type="text" required name="" readonly  value="<?php echo "$fn"; ?>"></td>
            </tr>

            <tr>
                <td class="label"><label >Contact no.: </label></td>
                <td><input type="tel" pattern="[0-9]{10}" maxlength="10" minlength="10" readonly  required name="" value="<?php echo "$cont"; ?>"></td>
            </tr>

            <tr>
                <td class="label"><label >Gender: </label></td>
                <td class="input">
                   <table width="70%">
                       <tr>
                           <td class="label">
                                <input type="radio" required name="gender" value="male">Male
                                <input type="radio" required name="gender" value="female">Female
                                <input type="radio" required name="gender" value="Other">Other
                           </td>
                       </tr>
                   </table>
                </td>
            </tr>

            <tr>
                <td class="label"><label >Guardian's Name: </label></td>
                <td class="input"><input type="text" required name="guardian_name"></td>
            </tr>

            <tr>
                <td class="label"><label >Guardian's Contact : </label></td>
                <td><input type="tel" pattern="[0-9]{10}" maxlength="10" minlength="10" required name="guardian_no"></td>
            </tr>

            <tr>
                <td class="label"><label>Permant Address :</label></td>
                <td><textarea type="text2" required name="permanent_address"></textarea></td>
            </tr>

            <tr>
                <td class="label"><label>Local Address :</label></td>
                <td><textarea type="text" name="local_address"></textarea></td>
            </tr>

             <tr>
                <td class="label"><label>Aadhar Number :</label></td>
                <td><input type="tel" pattern="[0-9]{12}" maxlength="12" minlength="12" required name="aadhar_no"></td>
            </tr>

             <tr>
                <td class="label"><label>Date of Birth :</label></td>
                <td><input type="date" required name="dob"></td>
             </tr>

              <tr>
                <td class="label"><label>Height :</label></td>
                <td align="left"><input type="number" name="height"> cm</td>
             </tr>

              <tr>
                <td class="label"><label>Weight :</label></td>
                <td align="left"><input type="number" required name="weight"> Kg</td>
             </tr>

            <tr>
                <td class="label"><label>Blood Group :</label></td>
                <td>
                    <table style="width: 400px">
                        <tr>
                            <td><input type="radio" name="blood_group" value="O-" required>O-</td>
                            <td><input type="radio" name="blood_group" value="O+">O+</td>
                            <td><input type="radio" name="blood_group" value="A-">A-</td>
                            <td><input type="radio" name="blood_group" value="A+">A+</td>
                        </tr>


                        <tr>
                            <td><input type="radio" name="bgrp" value="B-">B-</td>
                            <td><input type="radio" name="bgrp" value="B+">B+</td>
                            <td><input type="radio" name="bgrp" value="AB-">AB-</td>
                            <td><input type="radio" name="bgrp" value="AB+">AB+</td>
                        </tr>

                    </table>
                </td>
            </tr>
            <tr>
                <td class="label"></td>
                <td></td>
            </tr>
            <tr>
                <td class="label"></td>
                <td></td>
            </tr>
            <tr>
                <td class="label"></td>
                <td>
                  <table width="250px">
                      <td><button type="reset">Reset</button></td>
                       <td><button type="submit" name="submit">Submit</button></td>
                  </table>
                </td>
            </tr>
        </table>
    </form>
</div></center>
</body>
</html>