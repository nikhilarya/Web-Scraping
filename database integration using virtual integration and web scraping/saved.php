<link href="materialize/css/materialize.css" rel="stylesheet" /> 
<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">&emsp;Saved Result in Database</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index2.php">Main Page</a></li>
            <li><a href="saved.php">Saved Results</a></li>
        </ul>
    </div>
</nav>
<br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * from `project` GROUP by `acc_no`";
$query = $conn->query($sql);
?>
<div class="row">
    <div class="col s1">
        
    </div>
    <div class= "col s8 push-s1">'
        <?php
        while ($row = $query->fetch_assoc()) {
            ?>
            <div class="card blue-grey darken-1" id="acc_<?php echo $row['acc_no']; ?>">
                <div class="card-content white-text">
                    <span class="card-title">Accession number <?php echo $row['acc_no'] ?></span>
                    <p>
                    <pre>
                        <?php echo $row['seq'] ?>
                    </pre>

                    </p>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="col s1 push-s2">
        <ul class="section table-of-contents">
            <?php 
            $sql2 = "SELECT * from `project` GROUP by `acc_no`";
            $query2 = $conn->query($sql2);
            while ($row = $query2->fetch_assoc()) {  ?>
                    <li><a class="" href="#acc_<?php echo $row['acc_no']; ?>"><?php echo $row['acc_no']; ?></a></li>
            <?php } ?>

        </ul>
    </div>

</div>
