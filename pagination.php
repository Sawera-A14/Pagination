<?php
require_once('connection.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   <div class="container">
   <h1 style="text-align: center; text-transform: uppercase;" class="mt-5">IT Abbreviations</h1>
    <a class="btn btn-primary" href="insert.php" role="button">Add New</a>

    <!-- fetching information from table -->

    <!-- conditions -->
    <?php
    $c = 0;
    if(isset($_GET['page']))
    {
        $c = $_GET['page'];
    }
    if($c == 0 || $c == 1)
    {
        $c = 0;
    }
    else
    {
        $c = ($c*5)-5;
    }


    ?>

    <table class="table mt-3" border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Term</th>
                <th>Abbrev</th>
            </tr>
        </thead>
    <?php
    $fetch = mysqli_query($con,"SELECT * from abbrev limit $c,5");
    while($show = mysqli_fetch_array($fetch))
    {
        echo "<tr>
        <td>$show[0]</td>
        <td>$show[1]</td>
        <td>$show[2]</td>
        </tr>";
    }
    ?>
     </table>


     <?php
        $look = mysqli_query($con,"SELECT * from abbrev");
        $row = mysqli_num_rows($look);
        $div = ceil($row/5);

        for($i = 1; $i <= $div; $i++ )
        {
            echo "<a class='btn btn-primary' href='pagination.php?page=$i'>$i</a>";
        }
   ?>
   </div>
</body>
</html>