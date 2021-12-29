<?php 
    @require('database.php');


    
    if(isset($_POST['create']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['disc']) && isset($_POST['image']) && isset($_POST['image2'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $disc = $_POST['disc'];
        $image = $_POST['image'];
        $image2 = $_POST['image2'];
        
        $sql = 'INSERT into cards (`name`, `price`  , `disc`  , `image` , `image2`) values ("'. $name .'", "'. $price .'" , "'. $disc .'" , "'. $image .'" , "'. $image2 .'")';

        if($conn->query($sql) === true){
            header('location:form.php');
        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
    else {
        // echo '<p style="color: red;">Please Enter Name And Price</p>';
    }

    $sql1 = "SELECT * FROM cards";
    $result = $conn->query($sql1);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Form</title>
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body class="bg-light">
  <div class="row">
<div class="col-lg-4 col-md-4 col-sm-12">
    <div class="bg-info mx-auto p-3 mt-5">
        <form action="./form.php" method="POST">
        <h6 class="text-white text-center">Create Card</h6>
        <hr class="bg-white">
  <div class="form-group text-white">
    <label for="Name">Name</label>
    <input type="text" required class="form-control" name="name" id="Name">
  </div>
  <div class="form-group text-white">
    <label for="disc">Description</label>
    <input type="text" required class="form-control" name="disc" id="disc">
  </div>
  <div class="form-group text-white">
    <label for="Price">Price</label>
    <input type="number" required class="form-control" name="price" id="Price">
  </div>
  <div class="form-group text-white">
    <label for="image">image</label>
    <input type="file" required class="form-control-file bg-white text-dark p-1" name="image" id="image">
  </div>
  <div class="form-group text-white">
    <label for="himage">Hover image</label>
    <input type="file" required class="form-control-file bg-white text-dark p-1" name="image2" id="himage">
  </div>
  <hr class="bg-white">
  <div class="text-center">
  <button type="submit" name="create" class="btn btn-danger w-50">Create</button>
  </div>
        </form>
        
    </div>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12 my-auto">
      <div class="message">
        <p>Record Deleted</p>
      </div>
<div class="container">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $key = 1;
        while($res = mysqli_fetch_array($result)){


    ?>
    <tr>
      <th scope="row"><?php echo $key; ?></th>
      <td><?php echo $res['name']; ?></td>
      <td><?php echo $res['price']; ?></td>
      <td><?php echo $res['disc']; ?></td>
      <td><img src="images/<?php echo $res['image']; ?>" width="50" alt="" /></td>
      <td><a href="delete.php?id=<?php echo $res['id']; ?>" class="btn btn-outline-secondary mr-2">Delete</a><button class="btn btn-outline-secondary">Update</button></td>
    </tr>
   <?php 
   $key++;
        }
   ?>
  </tbody>
</table>
</div>
</div>
</div>

<script src="./asset/js/bootstrap.bundle.js"></script>
<script>$(".message").hide()</script>
</body>
</html>