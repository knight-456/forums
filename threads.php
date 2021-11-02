<?php ?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>iDiscuss coding forums</title>
        <style>
            #quesid{
                min-height: 433px;
            }
        </style>
    </head>
    <body>
        <?php include 'partials/_header.php'; ?>
        <?php include 'partials/_dbconnect.php'; ?>
        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE threads_id =$id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['threads_title'];
            $discription = $row['threads_desc'];
            $id1 = $row["threads_id"];



            echo

            '<div class="container my-4" id="quesid">
            <div class="jumbotron">
                <h1 class="display-4">' . $title . '</h1>
                <p class="lead">' . $discription . '</p>
                <hr class="my-4">
                <p>This is a peer to peer forum for sharing konwledge to each other.No Spam / Advertising / Self-promote in the forums.Remain respectful of other members at all times. Do not cross post questions. Do not post “offensive” posts, links or images. Do not post copyright-infringing material
                </p>
                <a class="btn btn-success btn-lg" href="#" role="button"><b> Posted by: Jashwant Rana</b></a>
            </div>

        </div>';
        }
        ?>
        <?php
        $id = $_GET['threadid'];
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == 'POST') {
            // Insert into comment db
            $th_comment = $_POST['comment'];


            // $th_title = str_replace("<", "&lt;", $th_title);
            //$th_title = str_replace(">", "&gt;", $th_title); 
            //$th_desc = str_replace("<", "&lt;", $th_desc);
            //$th_desc = str_replace(">", "&gt;", $th_desc); 
            //$sno = $_POST['sno']; 
            $sql = "INSERT INTO `comments` (`comments_content`, `threads_id`,`timestamp`) VALUES ('$th_comment', '$id', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            if ($showAlert) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your comment has been added
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                  </div>';
            }
        }
        ?>

        <div>
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo'<form action=" .  $_SERVER["REQUEST_URI"] . " method="post">
                <div class="form-group">
                    <h2>Post a Comment</h2>



                    <input type="hidden" name="sno" value="">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Type your Comment</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Post Comment</button>
                </div>
            </form>';
            }
                ?>
        </div>

            <div>
                <h1 class="py-2">Discussions</h1>
                <?php
                $id = $_GET['threadid'];
                $sql = "SELECT * FROM `comments` WHERE threads_id=$id";
                $result = mysqli_query($conn, $sql);
                $noResult = true;
                while ($row = mysqli_fetch_assoc($result)) {
                    $noResult = false;
                    $id = $row['comments_id'];
                    $th_content = $row['comments_content'];

                    $thread_time = $row['timestamp'];
                    //$thread_user_id = $row['thread_user_id']; 
                    //$sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
                    //$result2 = mysqli_query($conn, $sql2);
                    //$row2 = mysqli_fetch_assoc($result2);




                    echo '<div class="media my-3">
            <img src="img/user_image.jpg" width="54px" class="mr-3" alt="userdefaultimage">
            <div class="media-body">
              <p class = "font-weight-bold my-0">Anonymus User</p>  
             ' . $th_content . '
                 </div>' . '<div class="font-weight-bold my-0"> Asked by: at ' . $thread_time . '</div>' .
                    '</div>';
                }
                // echo var_dump($noResult);
                if ($noResult) {
                    echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">No Comments Found</p>
                        <p class="lead"> Be the first to comment</p>
                    </div>
                 </div> ';
                }
                ?>


            </div>

            <div class="my-0" id="quesid">
                <?php include 'partials/_footer.php';
                ?></div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>


