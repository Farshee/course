<html>

<head>
    <title>Sql example</title>
</head>

<body>
    <?php
    require_once('db_connect.php');
    $sql = 'SELECT * FROM  orders';
    $result = $mysqli->query($sql);
    $orders= $result->fetch_all(MYSQLI_ASSOC);
    //print_r($orders);exit;
    if ($result->num_rows > 0) {
        foreach($orders as $key => $row) {
            echo  $row["amount"];
            echo  "<br />";
        }
    } else {
        printf('No record found.<br />');
    }
    $mysqli->close();
    ?>
</body>

</html>