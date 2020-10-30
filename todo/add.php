<?php 

 require('config.php');


    if(!empty($_POST)){
        $name = $_POST['name'];
        $desc = $_POST['desc'];

        $sql = "INSERT INTO todo (name,description) VALUES(:name,:desc)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':name',$name);
        $stmt->bindValue(':desc',$desc);

        $result = $stmt->execute();

        if ($result) {
            echo "<script>alert('record is added');window.location.href='index.php';</script>";
          }
    }

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
                <form action="add.php" method="post">
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input class="form-control" type="text" name="name" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea class="form-control" name="desc" rows="8" cols="80"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="" value="Add New">
                        <a class="btn btn-warning" href="index.php">Back</a>
                    </div>        

                </form>
            </div>
        </div>  
    </div>
</body>
</html>


