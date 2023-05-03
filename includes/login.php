<?php

require_once('storeclass.php');
$store->login();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/langgamtrading/css/main.css">
    <script src="/langgamtrading/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Langgam Trading</title>
</head>
<body class="bg-primary">
    <section class="h-75">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100 ">
                <div class="col col-xl-10">
                    <div class="card border-0 shadow-lg" style="border-radius: 1rem;">
                        <div class="row g-0">
                            
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src=".\assets\storepic.png"
                                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>

                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">

                            <form method="post">

                                <div class="d-flex align-items-center mb-3 pb-1 ">
                                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                    <span class="h1 fw-bold mb-0">LANGGAM TRADING</span>
                                </div>

                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                <div class="form-outline mb-4">
                                    <input type="text" name="username" id="username" placeholder="Username"class="form-control form-control-lg" />
                                    <label class="form-label">Enter Username</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="password" placeholder="********"class="form-control form-control-lg" />
                                    <label class="form-label">Password</label>
                                </div>

                                <div class="pt-1 mb-4">
                                    <button class="btn btn-dark btn-lg w-100 shadow" name="submit" type="submit">Login</button>
                                </div>

                                <a class="small text-muted" href="#!">Forgot password?</a>
                                <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="includes/signup.php"
                                style="color: #393f81;">Register here</a></p>
                                <a href="#!" class="small text-muted">Terms of use.</a>
                                <a href="#!" class="small text-muted">Privacy policy</a>
                                
                            </form>

                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>