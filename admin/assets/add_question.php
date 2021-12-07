<?php include "header.php"; ?> 

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
        $("#show").click(function(){
          $("#load_editer").toggle();
         });
         });
   
    // Delete Action code
       $(".delete").click(function(){
       var a = confirm("Confirm to Delete");
         
        if(a) {
              alert( "Delete Success" );
          }

          })
          
        });
      // Delete Action code end
     </script>

</head>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header ">
      <div class="container-fluid ">
        <div class="row mb-2 ">
            <div class="col-sm-6 ">
                <a href= "#add_question_form" button type="button " class="popup-with-form btn btn-primary btn-sm ">Add New Question</button></a>
                <a href= "../forms/add_class_form.html " button type="button " class="btn btn-danger btn-sm ">Delete</button></a>
             </div>
          <div class="col-sm-6 ">
            <ol class="breadcrumb float-sm-right ">
              <li class="breadcrumb-item "><a href="# ">Home</a></li>
              <li class="breadcrumb-item active ">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content ">
      <div class="container-fluid ">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12 ">
              <!-- form start -->
              <table class="table ">
                <thead class="bg-primary ">
                  <tr>
                    <th scope="col ">Select</th>
                    <th scope="col ">id</th>
                    <th scope="col ">Question</th>
                    <th scope="col ">Class Name</th>
                    <th scope="col ">Subject Name</th>
                    <th scope="col ">Status</th>
                    <th scope="col ">Action</th>
                    <th scope="col ">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  </div>
        </div>
                  <th scope="row ">
                    <!-- checkbox -->
                    <input type="checkbox" id="defaultCheck" name="example2">
                </th>
                    <th scope="row ">1</th>
                    <td> 
                      <div>Q1. Which of the following languages <br> is more suited to a structured program?</div>
                        <ul class="list-item ">
                            <li class="list-item ">A. PL/1</li>
                            <li class="list-item ">B. FORTRAN</li>
                            <li class="list-item ">C. BASIC</li>
                            <li class="list-item ">D.PASCAL</li>
                            <li class="list-item ">E. None of the above</li>
                          </ul>
                        </td>
                    <td>MCA</td>
                    <td>Computer Course</td>
                    <td>Uploaded</td> 
                    <td><a href data-toggle="modal" data-target="#exampleModalCenter" button type="button" class="popup-with-form btn btn-primary btn-sm ">Edit &nbsp;<i class='fa fa-edit'></i></button></a></td>
                    <td class="delete"><a href="#" button type="button" class="popup-with-form btn btn-danger btn-sm ">Delete &nbsp;<i class='fa fa-trash-o'></i></button></a></td>
                  </tr>
                  <tr>
                    <th scope="row ">    
                        <!-- checkbox -->
                        <input type="checkbox" id="defaultCheck" name="example2">
                    </th>
                    <th scope="row ">2</th>
                    <td> 
                        <div>Q2. Which of the following computer language is <br> used for artificial intelligence? </div>
                          <ul class="list-item ">
                              <li class="list-item ">A. FORTRAN</li>
                              <li class="list-item ">B. PROLOG</li>
                              <li class="list-item ">C. C</li>
                              <li class="list-item ">D. COBOL</li>
                              <li class="list-item ">E. None of the above</li>
                            </ul>
                          </td>
                      <td>BBA</td>
                      <td>Programing</td>
                      <td>Uploaded</td> 
                      <td class="edit"><a href data-toggle="modal" data-target="#exampleModalCenter" button type="button" class="popup-with-form btn btn-primary btn-sm ">Edit &nbsp;<i class='fa fa-edit'></i></button></a></td>
                    <td class="delete"><a href="#" button type="button" class="popup-with-form btn btn-danger btn-sm ">Delete &nbsp;<i class='fa fa-trash-o'></i></button></a></td>
                  </tr>
                  <tr>
                    <th scope="row ">    
                        <!-- checkbox -->
                        <input type="checkbox" id="defaultCheck" name="example2">
                    </th>
                    <th scope="row ">3</th>
                    <td> 
                        <div>Q3.The brain of any computer system is?</div>
                          <ul class="list-item ">
                              <li class="list-item ">A. ALU</li>
                              <li class="list-item ">B. MEMORY</li>
                              <li class="list-item ">C. CPU</li>
                              <li class="list-item ">D. Control Unit</li>
                              <li class="list-item ">E. None of the above</li>
                            </ul>
                          </td>
                      <td>BCA</td>
                      <td>C language</td>
                      <td>Uploaded</td> 
                      <td class="edit"><a href data-toggle="modal" data-target="#exampleModalCenter" button type="button" class="popup-with-form btn btn-primary btn-sm ">Edit &nbsp;<i class='fa fa-edit'></i></button></a></td>
                    <td class="delete"><a href="#" button type="button" class="popup-with-form btn btn-danger btn-sm ">Delete &nbsp;<i class='fa fa-trash-o'></i></button></a></td>
                  </tr>
                </tbody>
              </table>
            <!-- /.card -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  

         <!-- Start Add Question Form 
    ============================================= -->
    <form action="server.php" method="post" id="add_question_form" class="mfp-hide white-popup-block">
        <section class="content">
         <div class="container-fluid">
           <div class="row">
             <!-- left column -->
             <div class="col-md-12">
               <!-- general form elements -->
               <div class="card card-primary">
                 <div class="card-header">
                   <h4 class="card-title">Add New Question</h4>
                 </div>
                 <!-- /.card-header -->
                 <!-- form start -->
                   <div class="card-body">
                   
                    <div class="form-group row">
                        <label for="colFormLabelSm" class=" col-sm-12" style="position: relative; left: -32px; font-size: 1.5rem;">Question Type</label>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                          <input type="radio" style="transform: scale(0.5);" class="form-control" name="show_answer" id="show_answer" placeholder="yes">
                          <label style="position: relative; top: -32px; left: 100px; margin: 5px; padding: 5px;">Objective</label>
                        </div>
                            <div class="col-sm-3">
                              <input type="radio" style="transform: scale(0.5);" class="form-control" name="show_answer" id="show_answer" placeholder="yes">
                              <label style="position: relative; top: -32px; left: 100px; margin: 5px; padding: 5px;">True/False</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="radio" style="transform: scale(0.5);" class="form-control" name="show_answer" id="show_answer" placeholder="yes">
                                <label style="position: relative; top: -32px; left: 100px; margin: 10px; padding: 10px;">Fill in the blanks</label>
                              </div>
                              <div class="col-sm-3">
                                <input type="radio" style="transform: scale(0.5);" class="form-control" name="show_answer" id="show_answer" placeholder="yes">
                                <label style="position: relative; top: -32px; left: 100px; margin: 5px; padding: 5px;">Subjective</label>
                              </div>
                        </div>


                         <div class="form-group row">
                             <div class="col-sm-1.7">
                                <button type="button" class="btn btn-light" id="que_btn">Question</button>
                             </div>
                             <div class="col-sm-1.7">
                              <button type="button" class="btn btn-light" id="que_btn">Option1</button>
                              </div>
                              <div class="col-sm-1.7">
                              <button type="button" class="btn btn-light" id="que_btn">Option2</button>
                            </div>
                            <div class="col-sm-1.7">
                              <button type="button" class="btn btn-light" id="que_btn">Option3</button>
                              </div>
                             <div class="col-sm-1.7">
                              <button type="button" class="btn btn-light" id="que_btn">Option4</button>
                          </div>
                          <div class="col-sm-1.7">
                          <button type="button" class="btn btn-light" id="que_btn">Option5</button>
                          </div>
                         <div class="col-sm-1.7">
                              <button type="button" class="btn btn-light" id="que_btn">Currect_Answers</button>
                          </div>
                        </div>

 
                         <div class="form-group row">
                            
                             <div class="col-sm-12">
                                 <textarea type="textarea" class="form-control" id="instruction" placeholder="Type your question here*" rows="5"></textarea>    
                             </div>
                         </div>
 
                         <p id="load_editer">Load Editer</p>
                        
                        <div class="form-group row">
                             <div class="col-sm-12">
                                 <button onclick="javascript:setup();" id="show" type="button" class="btn btn-light" style="color: #969a8ee0; font-size: 15px;">Load Editor</button>
                             </div>
                        </div>
                        
                        
                       <div class="form-group row">
                        <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm" style="color: #969a8ee0;font-weight: 450; font-size: 15px; margin-left: 10px;">Explanation (optional)</label>
                       </div>
                        <div class="form-group row">
                        <div class="col-sm-12">
                            <textarea type="textarea" class="form-control" id="instruction" placeholder="Provide explanation in Support of currect Answer*" rows="5"></textarea>    
                        </div>
                    </div>

                    <p id="load_editer">Load Editer</p>
                        
                        <div class="form-group row">
                             <div class="col-sm-12">
                                 <button onclick="javascript:setup();" id="show" type="button" class="btn btn-light" style="color: #969a8ee0; font-size: 15px;">Load Editor</button>
                             </div>
                        </div>

                      <div class="form-group row">

                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm" style="color: #969a8ee0;font-weight: 450; font-size: 15px; margin-left: 10px;">Exam Name</label>
    
                         <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Exam Name
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">AMCS</a>
                              <a class="dropdown-item" href="#">BCS</a>
                              <a class="dropdown-item" href="#">CA</a>
                            </div>
                        </div>

                        </div>

                         <div class="form-group row">
                             <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"style="color: #969a8ee0;font-weight: 450; font-size: 15px; margin-left: 10px;">Hint (Optional)</label>
                            </div>
                         <div class="form-group row">
                             <div class="col-sm-12">
                               <input type="text" class="form-control form-control-sm" id="Attempt_count" placeholder="Hint to help answer currectly*">
                             </div>
                         </div>

                         <div class="form-row">
                            <div class="col-md-4 mb-4">
                              <label for="validationCustom01" style="color: #969a8ee0;font-weight: 450; font-size: 15px; margin-left: 10px;">Marks</label>
                              <input type="number" class="form-control" id="validationCustom01" placeholder="Marks" value="Marks" required>
                              <div class="valid-feedback">
                                
                              </div>
                            </div>

                            <div class="col-md-4 mb-4">
                              <label for="validationCustom02"style="color: #969a8ee0;font-weight: 450; font-size: 15px; margin-left: 10px;">Negative Marks</label>
                              <input type="number" class="form-control" id="validationCustom02" placeholder="without minus sign" value="without minus sign" required>
                              <div class="valid-feedback">
                               
                              </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="validationCustom02" style="color: #969a8ee0; font-weight: 450; font-size: 15px; margin-left: 10px;">Difficulty Level</label>
                                <input type="text" class="form-control" id="validationCustom02" placeholder="difficulty Level" value="" required>
                                <div class="valid-feedback">
                                  
                                </div>
                              </div>
                            </div>
   
                   
                   <!-- /.card-body -->
   
                   <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Save</button>
                     <button type="close" class="btn btn-danger">Close</button>
                   </div>
 
                  </div>
                
               <!-- /.card -->
               </div>
             </div>
           </div>
          </div>
         </section>
     </form>
      <!-- End Add Question Form -->



  <!-- /.content-wrapper -->
  <footer class="main-footer ">
    <div class="float-right d-none d-sm-block ">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://www.examin.com">Examin</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark ">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js "></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js "></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js "></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js "></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js "></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>


<script src="assets/js/jquery-1.12.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/equal-height.min.js"></script>
<script src="assets/js/jquery.appear.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/modernizr.custom.13711.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/count-to.js"></script>
<script src="assets/js/loopcounter.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/bootsnav.js"></script>
<script src="assets/js/main.js"></script>



</body>
</html>
