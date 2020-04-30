<?php 
    include ('db.php');

    $page = (isset($_GET['page']) ? $_GET['page']:1);

    $perpage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 5 );

    $start = ($page >1 ) ?($page *$perpage) - $perpage :0;

    $sql = "SELECT * FROM `tasks` LIMIT ".$start." , ".$perpage." ";

    
    $total_record = $db->query("SELECT * FROM `tasks`")->num_rows;
    $total_pages = ceil($total_record / $perpage);
    $rows = $db->query($sql);

   /* echo "page = ".$page."<br>";
    echo "perpage = ".$perpage."<br>";
    echo "start = ".$start."<br>";
    
    echo"total_record = ".$total_record."<br>"; 
    echo"total_pages = ".$total_pages."<br>"; */
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
            
 
                <table class="table">
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
                 <center class="align-items-center">
                   
  <ul class="pagination justify-content-center">
    
  
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <?php for($i=1; $i<=$total_pages; $i++): ?>
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $i;?>&per-page=<?php echo $perpage;?>"><?php echo $i; ?></a>
    </li> 
    
    <?php endfor; ?>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
    
  </ul>
</nav>
                 </center>
            </div>
        </div>
    </div> 
</body>
</html>