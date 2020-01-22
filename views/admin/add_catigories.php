<html lang="en">
<head>
    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>

<div class="wrapper d-flex align-items-stretch">

    <?php include '../component/sidebar.html';?>
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="#">Add new Categories</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Add new Drug</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section class="body-sign col-xs-12 col-lg-offset-4">
            <div class="center-sign">

                <div class="panel panel-sign">
                    <div class="panel-title-sign mt-xl text-left">
                        <h2 class="title text-uppercase text-bold m-none"> Create a new categories &nbsp;&nbsp;</h2>
                    </div>
                    <div class="panel-body">
                        <form name="loginForm" action="../database/register.php" method="post" accept-charset="utf-8" onsubmit="return validateForm()">
                            <div class="form-group mb-lg">
                                <label class="pull-left">Categories Name :</label>
                                <input  name="cat_name" type="text" class="form-control input-lg text-left" placeholder="Enter The Categories Name : ..." required/>
                            </div>

                            <div class="form-group mb-lg">
                                <label class="pull-left">Categories Name Representative:</label>
                                <input  name="cat_representative" type="text" class="form-control input-lg text-left" placeholder="Enter The Categories Name Representative ..." required/>
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

                            <p class="text-left" style="color: green">
                                <?php
                                if( isset($_SESSION['added_correctly']) )
                                {
                                    echo $_SESSION['added_correctly'];

                                    unset($_SESSION['added_correctly']);

                                }
                                ?>
                            </p>
                            <div class="row pull-right">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary hidden-xs">Add New Categories </button>
                                </div>
                            </div>

                            <input type="text" name="hiddenInput" value="lecturer" style="display: none;">

                            <!-- <p class="text-center">Do you have account ?  <a href="sign_in.php">login</a> -->

                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

<script src="../../js/jquery.min.js"></script>
<script src="../../js/popper.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/main.js"></script>

</body>
</html>