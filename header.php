<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>Campus guide - Home</title>
</head>

<body>
    <header class="bg-dark fixed-top">
        <!-- <div class="container-md d-flex bg-dark text-light p-3 justify-content-between">
            <a href="" class=" h1 navbar-brand">Campus <span class="navlogo">Guide</span></a>
            <div class="d-flex">
                <form action="" role="search" class="me-2">
                    <input type="search" class="form-control">
                </form>
                <button type="button" class="btn btn-outline-success ">Search</button>
            </div>
        </div> -->

        <nav class="container navbar navbar-expand-lg  py-3 navbar-dark bg-dark">
            <div class="container-md container-fluid">
                <a href="" class=" navbar-brand">Campus <span class="navlogo">Guide</span></a>

                <button type="button" class="navbar-toggler  spanFlex" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-label="Toggle Navigation">
                    <span class="navbar-toggler-icon"></span>
                    <!-- <span class="bx bx-x bx-md" id="spanX"></span> -->
                    <!-- <div class="x"><span></span><span></span><span></span></div> -->
                </button>

                <div class="collapse navbar-collapse" id="navMenu">
                    <ul class="nav navbar-nav mx-auto">
                        <li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
                        <li class="nav-item"><a href="latest-gists.php" class="nav-link">Latest Gists</a>
                        <!-- <ul class="dropmenu">
                            li.drop
                        </ul> -->
                        </li>
                        <li class="nav-item"><a href="ask-a-question.php" class="nav-link">Ask Question</a></li>
                        <li class="nav-item"><a href="past-questions.php" class="nav-link">Past Questions</a></li>
                        <li class="nav-item"><a href="events.php" class="nav-link">Events</a></li>
                        <li class="nav-item"><a href="accommodation.php" class="nav-link">Accommodation</a></li>
                    </ul>

                    <!-- <div class="d-flex">
                        <form action="" role="search" class="me-2">
                            <input type="search" class="form-control">
                        </form>
                        <button type="button" class="btn btn-outline-success ">Search</button>
                    </div> -->
                    <form class="d-flex">
                        <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                    
                </div>
            </div>
        </nav>
    </header>
    <!-- Header Section -->