<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projectlaravel</title>
    <link rel="icon" href="images/icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bungee+Shade&family=Corinthia:wght@400;700&family=Lobster&family=Merriweather+Sans:ital,wght@0,700;1,600;1,700&family=Patrick+Hand&family=Readex+Pro&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../public/pro/css/bootstrap.css">
    <link rel="stylesheet" href="../public/pro/css/bootstrap-icons.css">
    <script src="../public/pro/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../public/pro/css/style.css">
</head>

<body class="bg-light">
    <main class="container-fluid">
        <div class="col-md-2 mt-1">
            <button class="btn btn-secondary " type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"><i class="bi bi-list "></i></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel" style="background-color: rgba(243, 151, 228, 0.993)">
                <h1 class="text-center">Profile</h1><br>
                    <div class="row col-md-12 ">
                   <div> <h5 class="col-m-4 ">NAME</h5></div>
                    <div><button type="submit" class="btn btn-primary col-md-4  w-25">Follow</button></div>
                    </div>
            </div>
        </div>
        <div class="card border-0 col-md-6 m-auto p-4 bg-light" style="width: 18rem; border-radius: 50%;">
            <img src="pro/images/img.jpg" class="card-img-top w-50 border-5 m-auto" alt="..."style="border-radius: 50%;">
            <div class="card-body">
                <h5 class="card-title text-center">{{return view('user.index',['data' => $data]);}}</h5>
            </div>
        </div>   
        <div class="card border-0 col-md-6 m-auto mt-4">
            <img src="pro/images/ice.jpg" class="card-img-top m-auto" alt="..." style="height:200px">
            <div class="card-body ">
                <h5 class="card-title"> {{return view('blog.index',['data' => $data]);}}</h5>
                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <div class="me-1 ">
                <i class="bi bi-heart"></i>
                <i class="bi bi-chat-right-text"></i>
                </div>
            </div>
        </div> 
            <form class="card col-md-6 m-auto mt-4 bg-light border-0">
                <label for="exampleFormControlTextarea1" class="form-label">{{return view('comment.index',['data' => $data]);}}</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
                <button type="submit" class="btn btn-primary w-25 m-auto mt-3 mb-3">Submit</button>
              </form>
    </main>
    </body>
    
    </html>