    <?php
     require_once 'header.php';
     
    ?>
<head>
    <?php head();?>
        <!-----------Validation for form -------------->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
     <!--SweetAlert CDN-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
  <!--SweetAlert CDN-->
    <script>
        $(document).ready(function(){
              $(".submit").click(function(){
                  var fname = $("#fname").val();
                  var lname = $('#lname').val();
                  var email = $("#email").val();
                  var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;    // Mail Formate for email validation
                  var userName = $("#userName").val();
                  var ContactNo = $("#mobile").val();
                  var Address = $("#Address").val();
                  var country = $('#country').val();
                  var state = $('#state').val();
                  var city = $('#city').val();

                  if(fname == ""){
                    $(".nameError").html("Please Enter First Name");
                    $("#fname").addClass("FieldError");
                    $("#fname").focus();
                    return false;
                  }
                  else if(lname == ""){
                    $(".lastnameError").html("Please Enter Last Name");
                    $("#lname").addClass("FieldError");
                    $("#lname").focus();
                    return false;
                  }
                  else if (userName == ""){
                        $(".usernameError").html("");
                       $(".InputField").removeClass("FieldError");
                        $(".userNameError").html("Please Enter User Name");
                        $("#userName").addClass("FieldError");
                        $("#userName").focus();
                         return false;
                    }
                  else if(mailformat.test(email) == false){
                      $(".AllError").html("");
                       $(".InputField").removeClass("FieldError");
                        $(".emailError").html("Enter your valid email id");
                        $("#email").addClass("FieldError");
                        $("#email").focus();
                         return false;
                     }                
                    else if(Address == ""){
                        $(".addressError").html("");
                        $(".InputField").removeClass("FieldError");
                        $(".addressError").html("Please Enter Address no");
                        $("#Address").addClass("FieldError");
                        $("#Address").focus();
                         return false;
                    }
                    else if(country == ""){
                        $(".countryError").html("");
                        $(".InputField").removeClass("FieldError");
                        $(".countryError").html("Please Enter country name");
                        $("#country").addClass("FieldError");
                        $("#country").focus();
                         return false;
                    }
                     else if(state == ""){
                        $(".stateError").html("");
                        $(".InputField").removeClass("FieldError");
                        $(".stateError").html("Please Enter state name");
                        $("#state").addClass("FieldError");
                        $("#state").focus();
                         return false;
                    }
                     else if(city == ""){
                        $(".cityError").html("");
                        $(".InputField").removeClass("FieldError");
                        $(".cityError").html("Please Enter City no");
                        $("#city").addClass("FieldError");
                        $("#city").focus();
                         return false;
                    }
                  // else{
                  //   alert();
                  //   }
                   });
                 });
   </script>

            <!-------Start Contact Form------->
            <?php 
              //Fetch this student details and show on form fields...
            $selStudentData = $conn->query("SELECT * FROM student_details WHERE id = '$student_id'");
              if(mysqli_num_rows($selStudentData) > 0 )
              {
                $Profile_Data = $selStudentData->fetch_assoc(); 
              }else{
                echo "No Data Found";
              }

            ?>

            <div class="container" id="userProfile">
                <h4>
                <?php 
                   if(isset($_GET['message']) && $_GET['message'] == "success"){
                    echo "Profile Updated";
                  }else{
                    echo "User Profile";  
                  }
                ?>
                  
                </h4>

              <form id="profile-form" method="post" action="profile-update.php" enctype="multipart/form-data">

                <div class="form-group row">
                        <label class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-4">
                            <input type="text"  id="fname" class="InputField" name="fname" value="<?=$Profile_Data['student_fname'];?>" >
                            <span class="nameError AllError" style="color: red;"></span>
                        </div>

                        <label class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-4">
                            <input type="text"  id="lname" class="InputField" name="lname" value="<?=$Profile_Data['student_lname'];?>" >
                            <span class="lastnameError AllError" style="color: red;"></span>
                        </div>

                        
                 </div>

                 <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email Id</label>
                        <div class="col-sm-4">
                            <input type="text" id="email" class="InputField" name="email" value="<?=$Profile_Data['student_email'];?>" disabled>
                            <span class="emailError AllError" style="color: red;"></span>
                        </div>

                           <label class="col-sm-2 col-form-label">Mobile No.</label>
                           <div class="col-sm-4">
                               <input type="text" id="mobile" class="InputField" name="mobile" value="<?=$Profile_Data['contact'];?>" disabled>
                               <span class="contactError AllError" style="color: red;"></span>
                           </div>
                </div>



                <div class="form-group row">
                   <!--    <label class="col-sm-2 col-form-label">Mobile No.</label>
                   <div class="col-sm-4">
                       <input type="text" id="mobile" class="InputField" name="mobile" value="<?=$Profile_Data['contact'];?>">
                       <span class="contactError AllError" style="color: red;"></span>
                   </div> -->
                   <label class="col-sm-2 col-form-label">Date of Birth</label>
                   <div class="col-sm-4">
                       <input type="date" id="dob" class="InputField" name="dob" value="<?=$Profile_Data['student_dob'];?>">
                       <span class="addressError AllError" style="color: red;"></span>
                   </div>
                </div>


                <div class="form-group row">

                      <label class="col-sm-2 col-form-label">Gender</label>
                   <div class="col-sm-4">                      
                        <label> <input type="radio" name="gender" value="male" class=""  <?php if($Profile_Data['gender'] == "male"){ echo "checked";}?>> male </label>

                        
                       <label> <input type="radio" name="gender" value="female" class="" <?php if($Profile_Data['gender'] == "female"){ echo "checked";}?>> female </label>
                   </div>



                   <label class="col-sm-2 col-form-label">Address</label>
                   <div class="col-sm-4">
                       <input type="text" id="Address" class="InputField" name="address" value="<?=$Profile_Data['student_address'];?>">
                       <span class="addressError AllError" style="color: red;"></span>
                   </div>
                </div>
                <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Country</label>
                   <div class="col-sm-4">
                       <input type="text" id="country" class="InputField" name="country" value="<?=$Profile_Data['country'];?>">
                       <span class="countryError AllError" style="color: red;"></span>
                   </div>
                   <label class="col-sm-2 col-form-label">State</label>
                   <div class="col-sm-4">
                       <input type="text" id="state" class="InputField" name="state" value="<?=$Profile_Data['state'];?>">
                       <span class="stateError AllError" style="color: red;"></span>
                   </div>
                </div>

                <div class="form-group row">
                   <label class="col-sm-2 col-form-label">City</label>
                   <div class="col-sm-4">
                       <input type="text" id="city" class="InputField" name="city" value="<?=$Profile_Data['city'];?>">
                       <span class="cityError AllError" style="color: red;"></span>
                   </div>

                    <label class="col-sm-2 col-form-label">Upload Photo</label>
                   <div class="col-sm-4">
                     <input type="file" class="InputField" id="imgfile" name="profile_pic" accept="image/*">
                       
                   </div>
                             
                </div>
            
                <input type="submit" class="submit" value="Update" name="update">
              </form>
            </div>
            

            <!-------End Contact Form------->



        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  
    <!-----For Toggle Menu------->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
     
    <!-----For Toggle SideBar Menu------->
        <script>
       $(document).ready(function(){
        $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
        $("#MenuIcon").click(function(){
        $(".ShowMenu").toggle();
        });
       });
</script>

<?php 
 //Call sweet alert popup on getting message on registration from save-register.php..
if(isset($_GET['msg']) && $_GET['msg']=="success"){ ?>
 <script>

  swal({
    title: "<?php echo $_GET['msg']; ?>",
    text: "Profile Updated Succfully",
    icon: "<?php echo 'success' ?>",
    button: "OK",
  });
  $('.swal-button--confirm').click(function(){
    window.location.href = 'profile.php';
  });

</script>

<?php }?>
</body>

</html>