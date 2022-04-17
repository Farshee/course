 <?php
    session_start();
    echo $_SESSION['id'];
    if ($_SESSION['id']!='1') {
        echo 'Please login! you are not allowed';
        header('Refresh: 2; URL = login.php');
    }else{

    if (isset($_POST["submit"])) {
        if (empty($_POST["name"])) {
            $error = "<label class='text-danger'>Enter Name</label>";
        } else if (empty($_POST["gender"])) {
            $error = "<label class='text-danger'>Enter Gender</label>";
        } else if (empty($_POST["designation"])) {
            $error = "<label class='text-danger'>Enter Designation</label>";
        } else if (empty($_POST["education"])) {
            $error = "<label class='text-danger'>Enter Education</label>";
        } else if (empty($_POST["age"])) {
            $error = "<label class='text-danger'>Enter age</label>";
        } else {
            if (file_exists('file.json')) {
                $final_data = fileWriteAppend();
                if (file_put_contents('file.json', $final_data)) {
                    $message = "<label class='text-success'>Data added Successfully</p>";
                }
            } else {
                $final_data = fileCreateWrite();
                if (file_put_contents('file.json', $final_data)) {
                    $message = "<label class='text-success'>File createed and  data added Successfully</p>";
                }
            }
        }
    }
    function fileWriteAppend()
    {
        $current_data = file_get_contents('file.json');
        $array_data = json_decode($current_data, true);
        $extra = array(
            'name'               =>     $_POST['name'],
            'gender'          =>     $_POST["gender"],
            'age'          =>     $_POST["age"],
            'education'     =>     $_POST["education"],
            'designation'     =>     $_POST["designation"],
            'DOB'     =>     $_POST["dob"]

        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        return $final_data;
    }
    function fileCreateWrite()
    {
        $file = fopen("file.json", "w");
        $array_data = array();
        $extra = array(
            'name'               =>     $_POST['name'],
            'gender'          =>     $_POST["gender"],
            'age'          =>     $_POST["age"],
            'education'     =>     $_POST["education"],
            'designation'     =>     $_POST["designation"],
            'dob'     =>     $_POST["dob"]

        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        fclose($file);
        return $final_data;
    }
    ?>
 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
     <title>Data add in JSON File</title>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
     <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
 </head>

 <body>
     <div class="container" style="width:500px;display:none;" id="form1"">
         <h4 align="">User Details</h4><br />
         
         <form method=" post">

         <label>Name</label>
         <input type="text" name="name" class="form-control" /><br />
         <label>Gender</label>
         <input type="radio" name="gender" value="Male" />Male
         <input type="radio" name="gender" value="Female" /> Female<br />
         <label>Age</label>
         <input type="number" name="age" class="form-control" /><br />
         <label>Education</label>
         <input type="text" name="education" class="form-control" /><br />
         <label>Designation</label>
         <input type="text" name="designation" class="form-control" /><br />
         <label>DOB</label>
         <input type="date" name="dob" class="form-control" /><br />
         <input type="submit" name="submit" value="submit" class="btn btn-info" /><br />
         <button type="button" class="btn btn-danger" id="cancel">cancel</button>
         </form>
     </div>
     <br />
     <?php
        if (file_exists('file.json')) {
            $string = file_get_contents("file.json");
            $json_a = json_decode($string, true);
        }

        if (isset($message)) {
            echo $message;
        }

        if (isset($error)) {
            echo $error;
        }
        ?>
     <div class="container mt-4" id="table1">
         <button type="button" class="btn btn-success" id="add">Add</button>
         <a class="btn btn-danger" href="logout.php" tite="Logout"> Logout </a>
             <table id="example" class="table table-striped table-bordered" style="width:100%">
                 <thead>
                     <tr>
                         <th>Name</th>
                         <th>Age</th>
                         <th>Gender</th>
                         <th>Education</th>
                         <th>Designation</th>
                         <th>DOB</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        if (file_exists('file.json')) {
                            foreach ($json_a as $key => $value) { ?>
                             <tr>

                                 <td><?php echo $value['name']; ?></td>
                                 <td><?php echo $value['age']; ?></td>
                                 <td><?php echo $value['gender']; ?></td>
                                 <td><?php echo $value['education']; ?></td>
                                 <td><?php echo $value['designation']; ?></td>
                                 <td><?php echo $value['DOB']; ?></td>

                             </tr>
                     <?php }
                        } ?>
                 </tbody>

             </table>
     </div>
     <script>
         $(document).ready(function() {
             $('#example').DataTable();
             $("#add").click(function() {
                 $("#form1").show();
                 $("#table1").hide();
             });
             $("#cancel").click(function() {
                 $("#table1").show();
                 $("#form1").hide();
             });
         });
     </script>
 </body>

 </html>
 <?php } ?>