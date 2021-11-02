<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>iDiscuss coding forums</title>
    </head>
    <body>
         <?php include 'partials/_dbconnect.php'; ?>
        <?php include 'partials/_header.php'; ?>
       

         
       
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://source.unsplash.com/2400x700/?coding,code" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://source.unsplash.com/2400x700/?apple,microsoft" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://source.unsplash.com/2400x700/?code,apple" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="container my-3">
            <h2 class="text-centre my-3">Welcome to iDiscuss - categories</h2>
            <div class="row">
                <?php
             /*   $select_query = "SELECT * FROM 'categories'";
                $select_query_result1 = mysqli_query($conn, $select_query);
                while($row = mysqli_fetch_assoc($select_query_result1)){
                    $cat = $row['category_name'];*/
                         $sql = "SELECT * FROM `categories`"; 
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result)){
             $id = $row['category_id'];
             $cat= $row['category_name'];
             $disc = $row['category_discription'];
           
             echo   '<div class="col-md-4 my-2">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="https://source.unsplash.com/500x400/?' . $cat . ',coding,python" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><a href="threadlist.php?catid=' . $id . '"> '  . $cat . '</a></h5>
                            <p class="card-text">' . $disc . '..>>> <a href="threadlist.php?catid=' . $id . '">more</a> </p>
                            <a href="threadlist.php?catid=' . $id . '"class="btn btn-primary">View Thread</a>
                        </div>
                    </div>
                </div>';
         }
                ?>
                
            </div>
        </div>
        

        <?php include 'partials/_footer.php';
        ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>