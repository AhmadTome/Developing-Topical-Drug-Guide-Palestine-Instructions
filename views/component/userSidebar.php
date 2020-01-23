<nav id="sidebar" style="height: 100%; overflow-y: auto; width: 20%">
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
                    for ($i = 0; $i < count($cats); $i++) {
                        echo '<li>
                                <a class="cat" id=' . $cats[$i]["id"] . ' href="#">' . $cats[$i]["cat_repName"] . '</a>
                             </li>';
                    }

                    ?>

                </ul>
            </li>

            <li class="active">
                <a href="#imagemenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Instruction to use ophthalmic topical drugs</a>
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
    $query = "SELECT * FROM `categories`";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $info = [];
        while ($row = $result->fetch_assoc()) {
            array_push($info, ["cat_repName" => $row["cat_representative"], "id" => $row["id"]]);
        }

        return $info;
    } else
        return [];
}


?>