<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location: ../login.php');
}
?>
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

    <?php include '../component/sidebar.html'; ?>
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="add_catigories.php">Add new Categories</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="add_drug.php">Add new Drug</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


                <?php
                    $cats = getcats();
                ?>
        <section class="body-sign col-xs-12 col-lg-offset-4">
            <div class="center-sign">

                <div class="panel panel-sign">
                    <div class="panel-title-sign mt-xl text-left">
                        <h2 class="title text-uppercase text-bold m-none"> Add a new drug &nbsp;&nbsp;</h2>
                    </div>
                    <p class="text-left" style="color: white; background-color: red; width: 100%; font-size: 18px;">
                        <?php
                        if( isset($_SESSION['Error']) )
                        {
                            echo $_SESSION['Error'];

                            unset($_SESSION['Error']);

                        }
                        ?>
                    </p>

                    <p class="text-left" style="color: white; background-color: green; width: 100%; font-size: 18px;">
                        <?php
                        if( isset($_SESSION['added_correctly']) )
                        {
                            echo $_SESSION['added_correctly'];

                            unset($_SESSION['added_correctly']);

                        }
                        ?>
                    </p>
                    <div class="panel-body">
                        <form name="loginForm" action="../../database/AddDrug.php" method="post" accept-charset="utf-8"
                              onsubmit="return validateForm()">


                            <div class="form-group mb-lg">
                                <label class="pull-left">Categories Items :</label>
                                <select class="form-control" id="categories" name="categories">
                                    <option disabled selected>--- Select the category ---</option>
                                    <?php

                                        for($i = 0 ; $i < count($cats) ; $i++){
                                            echo '<option value='. $cats[$i]["id"] .'>'. $cats[$i]["cat_repName"] .'</option>';
                                        }

                                    ?>
                                </select></div>

                            <div class="form-group mb-lg">
                                <label class="pull-left">Drug Name :</label>
                                <input name="name" type="text" class="form-control input-lg text-left"
                                       placeholder="Enter The Categories Name : ..." required/>
                            </div>

                            <div class="form-group mb-lg">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="text-left">Drug Description :</label>
                                        <textarea name="description" id="description" style="text-align: left">
                                        </textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row pull-right">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary hidden-xs">Add New Drug</button>
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
<script src="../../js/tiny.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'preview',
        toolbar: 'code',
        toolbar_drawer: 'floating',
        tinycomments_mode: 'embedded',
        directionality: 'ltr'
    });
</script>
</body>
</html>

<script>
    function validateForm() {

        var content = tinymce.get('description').getContent();
        while(content.search("'") > 0){
            content = content.replace("'","");
        }

        tinymce.get('description').setContent(content);
        console.log(content)
    }
</script>


<?php

function getcats(){

    $servername = "localhost";
    $username = "drug_guide";
    $password = "";

// Create connection
//$conn = mysqli_connect($servername, $username, $password);
    $conn = mysqli_connect($servername, "root",$password, $username,"3306");
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn,"utf8");
    $query = "SELECT * FROM `categories`";
    $result = $conn->query($query);
      if ($result->num_rows > 0) {
        $info = [];
          while ($row = $result->fetch_assoc()) {
              array_push($info, ["cat_repName" => $row["cat_representative"],"id" => $row["id"]]);
          }

          return $info;
    } else
        return [];
}



?>