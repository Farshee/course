<?php
$string = file_get_contents("https://jsonplaceholder.typicode.com/posts");
$json_a = json_decode($string, true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1px solid black">
        <thead>
            <tr>
                <th>title</th>
                <th>body</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($json_a as $key => $value) { ?>
                <tr>

                    <td><?php echo $value['title']; ?></td>
                    <td><?php echo $value['body']; ?></td>

                </tr>
            <?php } ?>
        </tbody>

    </table>
</body>

</html>