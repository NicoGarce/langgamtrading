<body class="bg-primary" style="background-color: #306c76;">
    <section class="h-75">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100 ">
                <div class="col col-xl-10">
                    <div class="card border-0 shadow-lg" style="border-radius: 1rem;">
                        <div class="row g-0">

                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src=".\assets\storepic.png" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>

                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="post">
                                        <div class="d-flex align-items-center mb-3 pb-1 justify-content-center">
                                            <span class="h1 fw-bold mb-0">LANGGAM TRADING</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;">Sign into your account</h5>
                                        <?php

                                        require_once('login_function.php');
                                        $login->login();

                                        ?>
                                        <div class="form-outline mb-4">
                                            <input type="text" name="username" id="username"
                                                placeholder="Enter Username" class="form-control form-control-lg" required/>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" name="password" id="password"
                                                placeholder="Enter Password" class="form-control form-control-lg" required/>
                                        </div>
                                        <div class="form-outline mb-4">
                                                <select class="form-control" id="branch" name="branch" required>
                                                    <option value="0" class="text-muted">Select Branch</option>
                                                    <option value="1">Langgam Trading</option>
                                                    <option value="2">NOAC Materials Trading Corporation</option>   
                                                    <option value="3">Branch 3</option>
                                                </select>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg w-100 shadow" name="submit"
                                                type="submit">Login</button>
                                        </div>

                                        <p class="" style="color: #393f81;">Don't have an account? <a
                                                href="includes/signup.php" style="color: #393f81;">Register here</a></p>
                                        <div class="d-flex justify-content-center">
                                            <a href="#!" class="small text-muted">Terms of use.</a>
                                            <a href="#!" class="small text-muted">Privacy policy</a>
                                        </div>
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