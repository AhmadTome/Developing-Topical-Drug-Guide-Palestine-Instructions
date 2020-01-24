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
<body>

<div class="wrapper d-flex align-items-stretch" >

    <?php include '../component/userSidebar.php'; ?>
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5" style="background-color: white !important;">


        <section class="body-sign col-xs-12 col-lg-offset-4">
            <div class="center-sign">

                <div class="panel panel-sign">
                    <div class="panel-title-sign mt-xl text-left">
                        <h2 class="title text-uppercase text-bold m-none"> List of The Drugs &nbsp;&nbsp;</h2>
                    </div>
                    <p class="text-left" style="color: white; background-color: red; width: 100%; font-size: 18px;">
                        <?php
                        if (isset($_SESSION['Error'])) {
                            echo $_SESSION['Error'];

                            unset($_SESSION['Error']);

                        }
                        ?>
                    </p>

                    <p class="text-left" style="color: white; background-color: green; width: 100%; font-size: 18px;">
                        <?php
                        if (isset($_SESSION['added_correctly'])) {
                            echo $_SESSION['added_correctly'];

                            unset($_SESSION['added_correctly']);

                        }
                        ?>
                    </p>

                    <div class="panel-body">
                        Please Select one of the categories on the left side
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../../js/popper.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/main.js"></script>

</body>
</html>
<script>
    $(document).ready(function () {
        $('.drug_name').on('click',function () {
            var id = $(this).attr('id');

            $.ajax({
                url: "../../database/getCategories.php",
                type: "get",
                data: {"id": id},
                success: function (data) {
                    $('.panel-body').empty();
                    data = JSON.parse(data)

                    console.log(data)

                    $('.panel-body').append('<div class="card">' +
                        '                            <div class="card-header">' +
                        '                                Name of the Drug is <b>'+ data[0]["name"] +
                        '                            </b></div>' +
                        '                            <div class="card-body">' +
                        '                               ' + data[0]['description']+
                        '                            </div>' +
                        '                        </div><br>');




                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }


            });
        });

    })
</script>

