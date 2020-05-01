<?php 
    include ('db.php');
 
    if (isset($_POST['search'])) {
    
    $name = htmlspecialchars($_POST['search']);   

    $sql = "SELECT * FROM `tasks` WHERE name  LIKE '%$name%' ";  

    $rows = $db->query($sql);   
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
      
    <center> <h1>To-Do-List</h1></center>
        <div class="row" style="margin-top: 70px;"> 
        
        <div class="col-md-10 col-md-offset-1"> 
          <table class="table">
            <button type="button" class="btn btn-success" data-target="#myModal" data-toggle="modal">Add Task</button>
            <button type="button" class="btn btn-default float-md-right" onclick="print()">Print</button> 
 <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="add.php" method="post"> 
            <div class="form-group">
                <label for=""> Task Name</label>
                <input type="text" class="form-control" name="task"  id="" required> 
            </div>
                <input type="submit" class="btn btn-success" name="send" value="Add Task"  id="" required>
         </form>
      </div> 

    </div>
  </div>
</div>
            <div class="col-md-12 text-center">
              <p>Search</p>
              <form action="search.php" method="post" class="form-group">
                <input type="text" placeholder="Search" name="search" class="form-control">
              </form>
            </div>

<?php if (mysqli_num_rows($rows) < 1 ): ?>

    <h2 class="text-danger text-center">Nothing Found</h2>
    <a href="index.php" class="btn btn-warning">Back</a>

<?php else: ?>

                <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Task</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php  while($row = $rows->fetch_assoc()): ?> 

                    <th scope="row"><?php echo $row['id']; ?></th>
                    <td class="col-md-10"><?php echo $row['name']; ?></td> 
                    <td><a href="update.php?id=<?php echo $row['id']?>" class="btn btn-success">Edit</a></td> 
                    <td><a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a></td> 
                    </tr> 
                        <?php endwhile; ?>
                    
                </tbody>

                </table>
                 
                <?php endif ; ?>
            </div>
        </div>
    </div> 
</body>
</html>