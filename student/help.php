    <?php 
    require_once 'header.php';
    require_once 'includes/functions.php';
    $student_id = $_SESSION['student']['id'];

    $msg = NULL;
    if(isset($_POST['submit_help'])){
  
    
    $name = get_safe_value($conn,$_POST['name']);
    $email = get_safe_value($conn,$_POST['email']);
    $contact_no = get_safe_value($conn,$_POST['contact_no']);
    $subject = get_safe_value($conn,$_POST['subject']);

    $date_create = date("Y-m-d H:i:s");

    
     $sql= $conn->prepare("INSERT student_help SET student_id=?,name=?,email=?,contact=?, message=?, date_create=?");
      $sql->bind_param('isssss',$student_id,$name,$email,$contact_no,$subject,$date_create);
      $sql->execute();
      if($conn->affected_rows==1){
       $msg = "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>×</button>Your Query has been submitted successfully</div>";
      }
  }

    ?>

<head>
  <?php head();?>

      <!--jquery funtion calling-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
       $(document).ready(function(){
         $(".submit").click(function(){
            var name = $("#name").val();
            var email = $("#email").val();
            var contact = $("#contact_no").val();
            var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            
           if(name == ""){
               alert("Please Enter Your Name");
               $("#name").focus();
               return false;
            }
          else if(mailformat.test(email) == false){
              alert("Enter your valid email id");
              $("#email").focus();
              return false;
          } 
          else if(contact.length !="10"){
              alert("Enter Valid contact no");
              $("#contact_no").focus();
              return false;
             }
             else{
               alert("Success");
             }
         });
       });
      </script>
</head>
          <!-------Start Contact Form------->


            <div class="container" id="contact-form">
                <h4><?=$msg;?>Contact Form</h4>
              <form action="" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your name..">
            
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Your email..">

                <label for="contact">Contact No</label>
                <input type="number" id="contact_no" name="contact_no" placeholder="Your contact No..">
            
            
                <label for="subject">Subject</label>
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:100px"></textarea>
            
                <input type="submit" class="submit" value="Submit" name="submit_help">
              </form>
            </div>  

            <!-------End Contact Form------->
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Menu Toggle Script -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Menu Toggle Script -->

    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        $("#MenuIcon").click(function(){
        $(".ShowMenu").toggle();
        });
    </script>


    <!--Bootstrap Class CDN Link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>

</html>