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
    <link rel="stylesheet" href="../../css/cards-gallery.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />

    <style>
        body {
            overflow: hidden;
            height: 100%;
        }
        #content {
            float:right;
            margin: 0 0 0 2em;
            max-height: 100%;
            overflow: auto;
        }
    </style>
</head>
<body>
<div class="wrapper d-flex align-items-stretch" >

    <?php include '../component/userSidebar.php'; ?>
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5" style="background-color: white !important;">


        <section class="body-sign col-xs-12 col-lg-offset-4">
            <div class="center-sign">

                <div class="panel panel-sign">
                    <div class="panel-title-sign mt-xl text-left">
                        <h2 class="title text-uppercase text-bold m-none text-center"> How to use ophthalmic ointment & gel.&nbsp;&nbsp;</h2>
                    </div>
                </div>
            </div>

            <div class="row col-sm-12">
               <span class="col-sm-12 text-center">
                   <img src="../../images/o1.jpg" >
               </span>

            </div>
            <div class="row col-sm-12">
              <span class="col-sm-6 pull-right">
                   <img src="../../images/o2.jpg" >
               </span>

            </div>

        </section>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../../js/popper.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>

</body>
</html>
<script>
    baguetteBox.run('.cards-gallery', { animation: 'slideIn'});

</script>
