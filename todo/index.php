<?php
    require('config.php');

    $sql = "SELECT * FROM todo ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
            <a href="add.php" type="button" class="btn btn-success">Create</a>
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               <?php 
                    
                    foreach($result as $row){
                     

                ?>

                 <tr>
                    <th scope="row"></th>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                    <td><?php echo date('d-m-Y',strtotime($row['time']))?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-primary">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-warning">Delete</a>
                    </td>
                </tr>

                <?php
                    }
                   
                ?>
                
            </tbody>
            </table>
            </div>
            </div>          
    </div>
</body>
</html>