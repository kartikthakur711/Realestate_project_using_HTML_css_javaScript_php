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

       
    </style>
</head>

<body>

    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>

    <!-- slider starts here -->

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/2400x700/?motivational,google" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x700/?pyhton,programmers" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x700/?coding,microsoft" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- categeory container starts here -->
    <div class="container my-4">
        <h2 class="text-center my-3">Welcome to iDiscuss - Browse Categories</h2>
        <div class="row">
<!-- fetch all the categeory -->
<?php 
$sql="SELECT * FROM `categories`";
$result= mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
// echo $row['category_id'];
// echo $row['category_name'];
$cat= $row['category_name'];
$desc= $row['category_discription'];
$id= $row['category_id'];
echo '<div class="col-md-4 my-4">
    <div class="card" style="width: 18rem;">
        <img src="https://source.unsplash.com/800x500/?coding,microsoft' .$cat.' coding ,python" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><a href="threadlist.php?catid=' .$id.'">' .$cat.'</a></h5>
            <p class="card-text">'. substr($desc,0,50).'......</p>
            <a href="threadlist.php?catid=' .$id.'" class="btn btn-primary" >View Threads</a>
        </div>
    </div>
</div>';
}


?>
            <!-- use a for loop  to itrate  through categeories-->


            
        </div>
    </div>
    <?php include 'partials/_footer.php'; ?>


</body>


</html>