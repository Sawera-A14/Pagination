<?php
require_once("connection.php");
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
  

    <!-- insertion form -->
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <form  method="post" class="mt-5">

                    <!-- first field -->
                    <div class="form-group">
                      <label for="">Term</label>
                      <input type="text" class="form-control" name="term"  aria-describedby="helpId" placeholder="Enter term in capital">
                    </div>

                    <!-- abbrev field -->
                    <div class="form-group">
                      <label for="">Abbreviation</label>
                      <input type="text" class="form-control" name="abbr"  aria-describedby="helpId" placeholder="Enter term in capital">
                    </div>

                    <input name="ins" class="btn btn-primary" type="submit" value="Insert">

                </form>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
    
    <!-- insertion query -->
    <?php
    if(isset($_POST['ins']))
    {
        $g_term = $_POST['term'];
        $g_abbr = $_POST['abbr']; 

        if(empty($g_term) || empty($g_abbr))
        {
            echo "<p class='mt-3' style='color:red; margin-left:35%; text-transform:capitalize;'>fields should not be empty</p>";
        }else
        {
        $insq = mysqli_query($con,"INSERT into abbrev(words,forms) values('$g_term','$g_abbr')");
        if($insq)
        {
            header('location:pagination.php');
        }
    }
    }
    ?>

</body>
</html>

