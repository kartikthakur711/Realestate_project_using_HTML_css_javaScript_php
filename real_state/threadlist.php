<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>iDiscuss...Coding_Forum!</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #FCFFCC;
        }

        .container h2 {
            color: #27A82F;
        }

        #carbonads {
            background-color: #FCFFCC;
        }
        .font-weight-bold{
            font-weight: bold;
        }
        
    </style>
</head>

<body>

    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php
    // $catid=$row['category_id']; 
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id=$id";

    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['category_name'];
        $catdesc = $row['category_discription'];
    }
?>
<?php
$method= $_SERVER['REQUEST_METHOD'];
$showAlert=false;
if($method=='POST'){

    // insert thread  into db 
    $th_title=$_POST['title'];
    $th_desc=$_POST['desc'];
    $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '0', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    $showAlert=true;
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" mt-3>
        <strong>Thank You! </strong> Your thread has been added please wait for community to respond......
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}

?>

    <!-- slider starts here -->

    <!-- categeory container starts here -->
    <div class="container ">

        <div class="p-5 mb-4 rounded-3">
            <div class="para-fluid py-5">
                <h4 class="display-5 fw-bold">Welcome to <?php echo $catname; ?> forum...</h4>
                <p class="col-md-8 fs-4"><?php echo $catdesc; ?></p>
                <hr class="my-4">
                <p>This peer to peer forum is for sharing knowledge with each....."No Spam / Advertising / Self-promote in the forums is not allowed
                    These forums define spam as unsolicited advertisement for goods, services an…
                    Providing or asking for information on how to illegally obtain copyright…"</other>
                </p>
                <button class="btn btn-primary btn-success" type="button">Learn More</button>
            </div>
        </div>
    </div>
    <div class="container">

    <div class="container">
        <h1>Start a Discussion</h1>
        <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <div id="titleHelp" class="form-text">Keep your title as short crisp and as possible</div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Ellaborate Your Concern</label>
                <textarea class="form-control" id="desc"  name= "desc" cols="30" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-success mt-3">Submit</button>
        </form>
    </div>
        <h1 class="py-3">Browse Questions</h1>
        <?php
        $id = $_GET['catid'];
        $sql = " SELECT * FROM `threads` WHERE thread_cat_id=$id";

        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;

            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $id = $row['thread_id'];
            $thread_time = $row['timestamp'];


            echo ' <div class="media my-3">
        <img src="img/user-2.png" width="54px" width="54px" class="align-self-start mr-3" alt="...">
        <div class="media-body">
        <p class="font-weight-bold my-0" ><a class="text-dark" href="thread.php?threadid=' . $id . '">Anonymous user at '.$thread_time.'</p>

        <h5 class="mt-0"><a class="text-dark" href="thread.php?threadid=' . $id . '">' . $title . '</a></h5>
        <p>' . $desc . '</p>
        </div>
        </div>';
        }

        if ($noResult) {
            echo '<div class="alert alert-success" role="alert">
        <p class="display-6">No Threads Found...</p>
        
        <hr>
        <p class="mb-0">Be the first person to ask a question....</p>
      </div>';
        }
        ?>
    </div>


    <!--"' use a for loop  to itrate  through categeories'"-->




    <?php include 'partials/_footer.php'; ?>


</body>


</html>