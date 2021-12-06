
    <?php
     require_once 'header.php';
     require_once 'includes/functions.php';
     $student_id = $_SESSION['student']['id'];  

     $msg = "";
      if(isset($_POST['submit']))
      {
        $current_pwd = md5(get_safe_value($conn,$_POST['previousPass']));       
        
        $new_pass = get_safe_value($conn,$_POST['newPass']);
        $confirm_new_pass = get_safe_value($conn,$_POST['conformPass']);
        


        $selCredentials = $conn->query("SELECT * FROM student_details WHERE id = '$student_id'");
        $result = $selCredentials->fetch_assoc();        

        if($current_pwd != $result['password']){            
             $msg = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button>Current password not matched</div>";

        }
        elseif(empty($new_pass) || empty($confirm_new_pass))
        {

           $msg = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button>Please enter new password and confirm new password fields</div>";
        }
        elseif ($new_pass != $confirm_new_pass) {
          $msg = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button>new password and confirm new passwrod not matched</div>";
        }
        else{
            $new_pass = md5($new_pass);

            $sql= $conn->prepare("UPDATE student_details SET password=? WHERE id='$student_id'");
            $sql->bind_param('s',$new_pass);
            $sql->execute();
            if($conn->affected_rows==1){
             $msg = "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>×</button>Password updated successfully</div>";
            }
        }


}
    ?>
<head>
    <?php head();?>


        <!-----------Validation for form -------------->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          
        <script>
            $(document).ready(function(){
                $(".submit").click(function(){
                   var previousPass = $("#previousPass").val();
                   var newPass = $("#newPass").val();
                   var conformPass = $("#conformPass").val();

                   if(previousPass == ""){
                       $(".previousPassError").html("Please Enter Previous Password");
                       $("#name").addClass("FieldError");
                       $("#previousPass").focus();
                       return false;
                   }
                   else if(newPass == ""){
                       $(".AllError").html("");
                       $(".InputField").removeClass("FieldError");
                        $(".newPassError").html("Enter New Password");
                        $("#newPass").addClass("FieldError");
                        $("#newPass").focus();
                         return false;
                   }
                   else if(previousPass == newPass){
                       $(".AllError").html("");
                       $(".InputField").removeClass("FieldError");
                        $(".newPassError").html("Previous Password & New Password are same, Please change it!.");
                        $("#newPass").addClass("FieldError");
                        $("#newPass").focus();
                         return false;
                   }
                   else if(conformPass == ""){
                       $(".AllError").html("");
                       $(".InputField").removeClass("FieldError");
                        $(".conformPassError").html("Enter Conform Password");
                        $("#conformPass").addClass("FieldError");
                        $("#conformPass").focus();
                         return false;
                   }
                   else if(newPass !== conformPass){
                      $(".AllError").html("");
                       $(".InputField").removeClass("FieldError");
                        $(".conformPassError").html("Conform Password is not mached");
                        $("#conformPass").addClass("FieldError");
                        $("#conformPass").focus();
                         return false; 
                   }
                   else{
                       //alert("Success");
                   }
                });
            });
        </script>
      <!-- Jquery Link -->
      <script src='js/jquery-3.5.1.js'></script> 
      <!-- Header File Include -->
          <script type='text/javascript'>
           $.get('header.html',function(response){ 
            $('#header').html(response); 
           });
          </script>

            <!-------Start Contact Form------->


            <div class="container" id="userProfile">
                <h4><?=$msg;?>Password Change</h4>
              <form action="" method="post">

                <div class="form-group row">
                        <div class="col-sm-4">
                            <input type="password" id="previousPass" class="InputField" name="previousPass" placeholder="Previous Password..">
                            <span class="previousPassError AllError" style="color: red;"></span>
                        </div>
                        <div class="col-sm-4">
                            <input type="password" id="newPass" class="InputField" name="newPass" placeholder="New Password..">
                            <span class="newPassError AllError" style="color: red;"></span>
                        </div>
                        <div class="col-sm-4">
                            <input type="password" id="conformPass" class="InputField" name="conformPass" placeholder="Conform Password..">
                            <span class="conformPassError AllError" style="color: red;"></span>
                        </div>
                 </div>

            
            
                <input type="submit" class="submit" name="submit" value="Update">
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

</body>

</html>