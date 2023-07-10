<?php session_start(); 
include 'includes/dbconnect.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus guide - Home</title>

    <!-- Bootstrap5 -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Favicon -->
    <link rel="shortcut icon" href="asset/baim-hanif-pYWuOMhtc6k-unsplash.jpg" type="image/x-icon">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Animate.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</head>

<body>
    <header class="bg-dark fixed-top">

        <nav class="container navbar navbar-expand-lg  py-3 navbar-dark bg-dark">
            <div class="container-md container-fluid">
                <a href="index.php" class="navbar-brand fs-5">Campus <span class="navlogo fs-5">Guide</span></a>

                <button type="button" class="navbar-toggler  spanFlex" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-label="Toggle Navigation">
                    <span class="navbar-toggler-icon"></span>
                    <!-- <span class="bx bx-x bx-md" id="spanX"></span> -->
                    <!-- <div class="x"><span></span><span></span><span></span></div> -->
                </button>

                <div class="collapse navbar-collapse" id="navMenu">
                    <ul class="nav navbar-nav mx-auto">
                        <li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-hover" data-bs-toggle="dropdown" style="cursor: pointer;">Latest Gists</a>
                            <div class="dropdown-menu">
                                <a href="jamb.php" class="dropdown-item">JAMB news</a>
                                <a href="post-utme.php" class="dropdown-item">POST-UTME</a>
                                <a href="university-gists.php" class="dropdown-item">Univerities gists</a>
                                <a href="uniport-gists.php" class="dropdown-item">Uniport gists</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="ask-a-question.php" class="nav-link">Ask Question</a></li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-bs-toggle="dropdown" style="cursor: pointer;">Past Questions</a>
                            <div class="dropdown-menu">
                                <a href="uniport-past-questions.php" class="dropdown-item">Uniport past questions</a>
                                <a href="jamb-past-questions.php" class="dropdown-item">JAMB Past questions</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="events.php" class="nav-link">Events</a></li>
                        <li class="nav-item"><a href="accommodation.php" class="nav-link">Accommodation</a></li>
                    </ul>

                    <form class="d-flex">
                        <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>                    
                </div>
            </div>
        </nav>
    </header>
    <!-- Header Section -->