<?php
session_start();

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    body {
        background-image: url("../images/cover.jpg");
        background-repeat: no-repeat;
        background-size: cover;


    }
    .card {
        border: 1px solid #f8b739;
    }
    .card-login {
        margin-top: 150px;
        padding: 18px;
        max-width: 35rem;
    }

    .card-header {
        color: #fff;
        /*background: #f8b739;*/
        font-family: sans-serif;
        font-size: 20px;
        font-weight: 600 !important;
        margin-top: 10px;
        border-bottom: 0;
    }

    .input-group-prepend span{
        width: 50px;
        background-color: #f8b739;
        color: #fff;
        border:0 !important;
    }

    input:focus{
        outline: 0 0 0 0  !important;
        box-shadow: 0 0 0 0 !important;
    }

    .login_btn{
        width: 130px;
    }

    .login_btn:hover{
        color: #fff;
        background-color: #f8b739;
    }

    .btn-outline-danger {
        color: #fff;
        font-size: 18px;
        background-color: #f8b739;
        background-image: none;
        border-color: #f8b739;
    }

    .form-control {
        display: block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1.2rem;
        line-height: 1.6;
        color: #f8b739;
        background-color: transparent;
        background-clip: padding-box;
        border: 1px solid #f8b739;
        border-radius: 0;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .input-group-text {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding: 0.375rem 0.75rem;
        margin-bottom: 0;
        font-size: 1.5rem;
        font-weight: 700;
        line-height: 1.6;
        color: #495057;
        text-align: center;
        white-space: nowrap;
        background-color: #e9ecef;
        border: 1px solid #ced4da;
        border-radius: 0;
    }
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<div class="container" style="opacity: 0.85;">
    <div class="card card-login mx-auto text-center bg-dark">
        <div class="card-header mx-auto bg-dark">
            <h3 style="color: #f8b739"> Developing Topical Drug Guide Palestine Instructions </h3><br/>
            <span class="logo_title mt-5"> Register Page </span>
            <!--            <h1>--><?php //echo $message?><!--</h1>-->

        </div>
        <div class="card-body" >
            <form action="../database/register.php" method="post">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="name" class="form-control" placeholder="name" required>
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="email" class="form-control" placeholder="Username or email" required>
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="pwd" class="form-control" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <input type="submit" name="btn" value="Sign Up" class="btn btn-outline-danger float-right login_btn">
                </div>
                <div class="row" style="color: white">
                    Did you have an account ? <a href="login.php">&nbsp;&nbsp;LogIn Page !</a>
                </div>
                <p class="text-left" style="color: red">
                    <?php
                    if( isset($_SESSION['Error']) )
                    {
                        echo $_SESSION['Error'];

                        unset($_SESSION['Error']);

                    }
                    ?>
                </p>
            </form>
        </div>
    </div>
</div>