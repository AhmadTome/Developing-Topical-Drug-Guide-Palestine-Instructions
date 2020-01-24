<nav id="sidebar" style="height: 100%; overflow-y: auto;">
    <div class="p-4 pt-5">
        <a href="#" class="img logo rounded-circle mb-5"
           style="background-image: url(../../images/logo.jpg); width:200px; height:180px;"></a>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                   class="dropdown-toggle">Categories</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">

                    <?php
                    $cats = getcats();
                    $cat = [];
                    for ($i = 0; $i < count($cats); $i++) {
                        $cat_name = $cats[$i]["cat_repName"];

                        if(in_array($cat_name,$cat)){
                            continue ;
                        }else{
                            array_push($cat,$cat_name);
                        }
                        $ele_parent = ' <li>
                                    <a href='.'#'.$cat_name.' data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" >
                                        '. $cat_name .'
                                    </a>
                            <ul class="collapse list-unstyled" id='.$cat_name.'>
                                ';
                        $ele_parentfollow = '</ul>
                        </li>';
                        $sub_cat = '' ;
                        for ($j = 0 ; $j < count($cats) ; $j++){

                            if($cats[$j]["cat_repName"] == $cat_name){
                                $sub_cat = $sub_cat. '<li>
                                    <a class="drug_name" id='. $cats[$j]["id"] .'  href="#">'. $cats[$j]["name"] .'</a>
                                </li>';
                            }
                        }

                        echo $ele_parent . $sub_cat . $ele_parentfollow ;

                    }

                    ?>

                </ul>
            </li>

            <li class="active">

                <a href="#imagemenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" >
                    Direction for topical drugs uses
                </a>
                <ul class="collapse list-unstyled" id="imagemenu">
                    <li>
                        <a class="cat" href="../user/eye_doc.php">How to use eye drops</a>
                    </li>

                    <li>
                        <a class="cat" href="../user/o_doc.php">How to use ophthalmic ointment & gel.</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="../user/references.php">References</a>
            </li>


            <li>
                <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hover-black"
                   onclick="document.location.href = '../../helper/kill_session.php';">
                    <p>Logout</p>
                </a>
            </li>
        </ul>


    </div>
</nav>

<script>
    $(document).ready(function () {

        $('.drug_name').on('click',function () {
            alert($(this).attr('id'))
        });


    })
</script>

<?php

function getcats()
{

    $servername = "localhost";
    $username = "drug_guide";
    $password = "";

// Create connection
//$conn = mysqli_connect($servername, $username, $password);
    $conn = mysqli_connect($servername, "root", $password, $username, "3306");
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, "utf8");
    $query = "SELECT c.id as cat_id ,c.cat_representative , d.id , d.name , d.description FROM categories c inner join drug d on c.id = d.cat_id ";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $info = [];
        while ($row = $result->fetch_assoc()) {
            array_push($info, ["cat_repName" => $row["cat_representative"]
                , "id" => $row["id"], "name" => $row["name"], "description" => $row["description"], "cat_id" => $row["cat_id"]]);
        }

        return $info;
    } else
        return [];
}


?>