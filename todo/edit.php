<?php
    require('config.php');

    $sql = "SELECT * FROM todo WHERE id =".$_GET['id'];
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();


    if(!empty($_POST)){
        $id = $_POST['uid'];
        $name = $_POST['name'];
        $desc = $_POST['desc'];

        $sql = $pdo->prepare("UPDATE todo SET name='$name',description='$desc' WHERE id=$id");
        $res = $sql->execute();

        if ($res) {
            echo "<script>alert('record is already Update');window.location.href='index.php';</script>";
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
        
        <form action="" method="post">
                    <input type="hidden" name="uid" value="<?php echo $result[0]['id'] ?>">
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input class="form-control" type="text" name="name" value="<?php echo $result[0]['name'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea class="form-control" name="desc" rows="8" cols="80"><?php echo $result[0]['description'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="" value="Update">
                        <a class="btn btn-warning" href="index.php">Back</a>
                    </div>        

                </form>
        </div>
        </div>          
    </div>
</body>
</html>