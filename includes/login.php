<body class="bg-primary" style="background-color: #306c76;">
    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col col-xl-8">
                <div class="card card-bg rounded-4 shadow-lg">
                    <div class="row">
                        <div class="col-12 col-md-8 col-lg-8 mx-auto">
                            <div class="card-body text-white">
                                <form method="post">
                                    <div class="d-flex justify-content-center mx-auto mb-3 pt-5 pb-1">
                                        <span class="h3 fw-bold mb-0 font">LANGGAM TRADING</span>
                                    </div>

                                    <h6 class="fw-normal pb-2 text-center font" style="letter-spacing: 1px;">Sign into your account</h6>
                                    <?php $login->Login(); ?>
                                    <div class="d-flex justify-content-center">
                                        <div class="card bg-primary rounded-4">
                                            <div class="card-body">
                                                <div class="mb-4 font">
                                                    <input type="text" name="username" id="username" placeholder="Enter Username" class="form-control rounded-3" required />
                                                </div>

                                                <div class="mb-4 font">
                                                    <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control rounded-3" required />
                                                </div>
                                                <div class="mb-4 font">
                                                    <select class="form-control form-control-sm rounded-3" id="branch" name="branch" required>
                                                        <option value="0" class="text-muted">Select Branch</option>
                                                        <option value="1">Langgam Trading</option>
                                                        <option value="2">NOAC Materials Trading Corporation</option>
                                                        <option value="3">Branch 3</option>
                                                    </select>
                                                </div>
                                                <div class="pt-1 mb-3 font col-lg-9 d-flex justify-content-center mx-auto">
                                                    <button class="btn btn-light w-100 shadow rounded-5" name="submit" type="submit">Login</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="text-white text-center pb-5" style="font-size: 14px;">Don't have an account? <a href="includes/signup.php" class="text-white">Register here</a></p>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

