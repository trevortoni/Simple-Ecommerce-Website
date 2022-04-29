 <?php
    include "includes/db.php";
    $user =$_SESSION['customer_email'];
    $get_customer = "SELECT * FROM  customers WHERE customer_email = '$user' ";
    $run_customer = mysqli_query($con,$get_customer);
    $row_customer = mysqli_fetch_array($run_customer);

    $id =  $row_customer['customer_id'];
    $fname =  $row_customer['customer_fname'];
    $lname =  $row_customer['customer_lname'];
    $email =  $row_customer['customer_email'];
    $pass =  $row_customer['customer_pass'];
    $county =  $row_customer['customer_county'];
    $city =  $row_customer['customer_city'];
    $contact =  $row_customer['customer_contact'];
    $address =  $row_customer['customer_address'];

 ?>
 
 <!-- Update Account Form -->
                <div class="register_form_container">
                    <form action="" method="post" >

                        <div class="register_form_header">
                            <h1>Update Account</h1>
                        </div>
             
                        <div class="register_form_input_control_box">

                            <div class="register_input_control">
                                <label for="customer_fname">First Name</label>
                                <input type="text" name="customer_fname" value="<?php echo $fname ?>" placeholder="Enter your first name" required>
                                <!-- <span id="error" style="background-color:cadetblue;height:20px"></span> -->
                            </div>

                            <div class="register_input_control">
                                <label for="customer_lname">Last Name</label>
                                <input type="text" name="customer_lname" value="<?php echo $lname ?>" placeholder="Enter your last name" required>
                            </div>

                            <div class="register_input_control">
                                <label for="customer_email">Email</label>
                                <input type="email" name="customer_email" value="<?php echo $email ?>" placeholder="Enter email" required>
                            </div>

                            <div class="register_input_control">
                                <label for="customer_pass">Password</label>
                                <input type="password" name="customer_pass" value="<?php echo $pass ?>" placeholder="Enter password" required>
                            </div>

                            <div class="register_input_control">
                                <label for="customer_county">County</label>
                                <select style="height:40px" type="text" name="customer_county" placeholder="Enter county of residence" required>
                                    <option> <?php echo $county; ?> </option>
                                    <option value='Baringo'>Baringo</option>
                                    <option value='Bomet'>Bomet</option>
                                    <option value='Bungoma'>Bungoma</option>
                                    <option value='Busia'>Busia</option>
                                    <option value='Elgeyo-Marakwet'>Elgeyo-Marakwet</option>
                                    <option value='Embu'>Embu</option>
                                    <option value='Garissa'>Garissa</option>
                                    <option value='Homa Bay'>Homa Bay</option>
                                    <option value='Isiolo'>Isiolo</option>
                                    <option value='Kajiado'>Kajiado</option>
                                    <option value='Kakamega'>Kakamega</option>
                                    <option value='Kericho'>Kericho</option>
                                    <option value='Kiambu'>Kiambu</option>
                                    <option value='Kilifi'>Kilifi</option>
                                    <option value='Kirinyaga'>Kirinyaga</option>
                                    <option value='Kisii'>Kisii</option>
                                    <option value='Kisumu'>Kisumu</option>
                                    <option value='Kitui'>Kitui</option>
                                    <option value='Kwale'>Kwale</option>
                                    <option value='Laikipia'>Laikipia</option>
                                    <option value='Lamu'>Lamu</option>
                                    <option value='Machakos'>Machakos</option>
                                    <option value='Makueni'>Makueni</option>
                                    <option value='Mandera'>Mandera</option>
                                    <option value='Marsabit'>Marsabit</option>
                                    <option value='Meru'>Meru</option>
                                    <option value='Migori'>Migori</option>
                                    <option value='Mombasa'>Mombasa</option>
                                    <option value="Murang'a">Murang'a</option>
                                    <option value='Nairobi City'>Nairobi City</option>
                                    <option value='Nakuru'>Nakuru</option>
                                    <option value='Nandi'>Nandi</option>
                                    <option value='Narok'>Narok</option>
                                    <option value='Nyamira'>Nyamira</option>
                                    <option value='Nyandarua'>Nyandarua</option>
                                    <option value='Nyeri'>Nyeri</option>
                                    <option value='Samburu'>Samburu</option>
                                    <option value='Siaya'>Siaya</option>
                                    <option value='Taita-Taveta'>Taita-Taveta</option>
                                    <option value='Tana River'>Tana River</option>
                                    <option value='Tharaka-Nithi'>Tharaka-Nithi</option>
                                    <option value='Trans Nzoia'>Trans Nzoia</option>
                                    <option value='Turkana'>Turkana</option>
                                    <option value='Uasin Gishu'>Uasin Gishu</option>
                                    <option value='Vihiga'>Vihiga</option>
                                    <option value='West Pokot'>West Pokot</option>
                                    <option value='wajir'>Wajir</option>
                                </select>
                            </div>

                            <div class="register_input_control">
                                <label for="customer_city">Town/City</label>
                                <input type="text" name="customer_city" value="<?php echo $city ?>" placeholder="Enter city of residence" required>
                            </div>

                            <div class="register_input_control">
                                <label for="customer_contact">Contact details</label>
                                <input type="text" name="customer_contact" value="<?php echo $contact ?>" placeholder="Enter phone number" required>
                            </div>

                            <div class="register_input_control">
                                <label for="customer_address">Address</label>
                                <input type="text" name="customer_address" value="<?php echo $address ?>" placeholder="Enter your address" required>
                            </div>

                            <!-- <div class="register_input_control">
                                <label for="customer_image">Profile Image(optional)</label>
                                <input type="file" name="customer_image" accept=".png,.jpeg,.jpg" required>
                            </div> -->

                        </div>

                        <div class="register_button_container">
                            <button class="register_button" type="submit" name="update" value="Update Account">Update</button>
                        </div>

                        <h3><a href="customer_login.php">Already registered? Login Here</a></h3>

                        <div id="alert_box"> </div>

                    </form>
                </div>
                <!-- Update Account form end-->
<?php

if (isset($_POST['update'])) {

    $ip = getIp();

    //text data
    $customer_id = $id;
    $customer_fname = htmlspecialchars($_POST['customer_fname']);
    $customer_lname = htmlspecialchars($_POST['customer_lname']);
    $customer_email = htmlspecialchars($_POST['customer_email']);
    $customer_pass =  htmlspecialchars($_POST['customer_pass']);
    $customer_county = $_POST['customer_county'];
    $customer_city = htmlspecialchars($_POST['customer_city']);
    $customer_contact = htmlspecialchars($_POST['customer_contact']);
    $customer_address = htmlspecialchars($_POST['customer_address']);

    //image data
    // $customer_image = $_FILES['customer_image']['name'];
    // $customer_image_tmp = $_FILES['customer_image']['tmp_name'];

    // move_uploaded_file($customer_image_tmp, "customer/customer_images/$customer_image");

    //Form validation section

        if( $customer_fname == "" ){
            echo "
                <div class='register_input_control'>
                    <span id='error' style=' background-color:cadetblue;height:20px;color:red; '>Firstname is required!</span>
                </div>

                <script>alert('fill all fields')</script>;
               ";
        }

        $update_customer = "UPDATE customers SET customer_fname= ?,customer_lname= ?,customer_email= ?,customer_pass= ?,customer_county= ?,customer_city= ?,customer_contact= ?,customer_address= ?
         WHERE customer_id = ? ";

        $stmt = mysqli_prepare($con,$update_customer);

        mysqli_stmt_bind_param($stmt,'ssssssssi',$customer_fname,$customer_lname ,$customer_email, $customer_pass, $customer_county, $customer_city, $customer_contact, $customer_address,$customer_id);

        mysqli_stmt_execute($stmt);

        $execval = mysqli_stmt_execute($stmt);

        if($execval){

            echo"<script>alert('Account update successful')</script>";
            echo"<script>window.open('my_account.php','_self')</script>";
        }

        else{

            echo"<script>alert('Account update not successful')</script>";
            echo"<script>window.open('my_account.php','_self')</script>";
        }
    
        // mysqli_close($con);

}

?>