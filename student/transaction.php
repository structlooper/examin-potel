    <?php 
    require_once 'header.php';
    ?>

<head>
  <?php head();?>

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">




                     <div class="container mt-3 exam_table">
                        <h3>Transaction History</h3>
                        <table class="table table-bordered" id="student_data">
                            <thead class="table_data">
                                <tr>
                                    <th>S.N.</th>
                                    <th>Credit</th>
                                    <th>Debit</th>
                                    <th>Balance</th>
                                    <th>Date & Time</th>
                                    <th>Payment Through</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <tr>
                                    <td>1</td>
                                    <td>100.00</td>
                                    <td></td>
                                    <td>100.00</td>
                                    <td>22-11-2020 12:55:14 PM</td>
                                    <td>Administrator</td>
                                    <td>money </td>
                                </tr>

 

                            </tbody>
                        </table>
                    </div>


                </div>












                
            
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
    </script>
     
       
        <!--For Table data Search-->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

        <script>
        $(document).ready(function() {
            $('#student_data').DataTable(); 
        } );
            </script>
        <!--For Table data Search End-->

    <!--Bootstrap Class CDN Link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>



</body>

</html>