 <?php

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
                    $message = "<label class='text-success'>Data added Success fully</p>";
                }
            } else {
                $final_data = fileCreateWrite();
                if (file_put_contents('file.json', $final_data)) {
                    $message = "<label class='text-success'>File createed and  data added Success fully</p>";
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
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 </head>

 <body>
     <div class="container" style="width:500px;">
         <h4 align="">User Details</h4><br />
         <?php
            if (isset($error)) {
                echo $error;
            }
            ?>
         <form method="post">

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
             <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
         </form>
     </div>
     <br />
 </body>

 </html>