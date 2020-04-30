<?php 
    include ('db.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM `tasks`  WHERE id = '$id' ";
    $rows = $db->query($sql);
    $row =  $rows->fetch_assoc(); 
    if (isset($_POST['send'])) {
        $task = $_POST['task'];
        $update = "UPDATE `tasks`  SET NAME ='$task' ";
        $db->query($update);
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row"> </div>
            <center> <h1>Update To-Do-List</h1></center> 
 
    
          <form  method="post"> 
            <div class="form-group">
                <label for=""> Task Name</label>
                <input type="text" class="form-control" name="task" value="<?php echo $row['name'];?>"  id="" required>
                 
            </div>
                <input type="submit" class="btn btn-success" name="send" value="Update Task"  id="" required>
         </form>
       

             
        </div>
        
    </div>
    
</body>
</html>