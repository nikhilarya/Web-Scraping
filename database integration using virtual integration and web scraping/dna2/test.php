
<?php
include_once('simple_html_dom.php');

//echo $link;
if (isset($_GET['acc'])) {
    if (isset($_GET['down'])) {
        $str = $_GET['acc'];
        $q = "http://www.ebi.ac.uk/ena/data/view/" . $str . "&display=text";
        $qq = "http://getentry.ddbj.nig.ac.jp/getentry/na/" . $str . "?filetype=html";
        //$qqq="http://www.ncbi.nlm.nih.gov/nuccore/".$str;
        $qqq = "http://www.ncbi.nlm.nih.gov/sviewer/?noredirect=1&db=nuccore&val=" . $str;
        $html = file_get_contents($q);
        $html1 = file_get_contents($qq);
        //$ans=$html.$html1;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bio";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $html = mysqli_escape_string($conn, $html);
        $html1 = mysqli_escape_string($conn, $html1);
        $sql = "INSERT INTO `project`(`acc_no`, `source`, `seq`) VALUES ('$str','embl','$html');";
        $conn->query($sql);
        $sql1 = "INSERT INTO `project`(`acc_no`, `source`, `seq`) VALUES ('$str','ddbj','$html');";
        $conn->query($sql1);
        //echo "Data has been successfully downloaded";
        //return "Success";
        echo "1";
        exit();
    } else {
        ?>
        <html>
            <body style="background-color: #fcfcfc;">
                <link href="../materialize/css/materialize.css" rel="stylesheet" />
                <nav>
                    <div class="nav-wrapper">
                        <a href="#" class="brand-logo">&emsp; Nucleotide Sequence</a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a href="../index2.php">Main Page</a></li>
                            <li><a href="../saved.php">Saved Results</a></li>
                        </ul>
                    </div>
                </nav>
                <br>
                <div class="container">
                    <pre class="language-css">
                        <?php
                        $str = $_GET['acc'];
                        $q = "http://www.ebi.ac.uk/ena/data/view/" . $str . "&display=text";
                        $qq = "http://getentry.ddbj.nig.ac.jp/getentry/na/" . $str . "?filetype=html";
                        //$qqq="http://www.ncbi.nlm.nih.gov/nuccore/".$str;
                        $qqq = "http://www.ncbi.nlm.nih.gov/sviewer/?noredirect=1&db=nuccore&val=" . $str;
                        $html = file_get_contents($q);
                        $html1 = file_get_contents($qq);
                        $ans = $html . $html1;
                        echo $ans;
                        ?>
                    </pre>
                </div>
            </body>
        </html>
        <?php
    }
} else {
    ?>
    <html>
        <body style="background-color: #fcfcfc;">
            <link href="../materialize/css/materialize.css" rel="stylesheet" />
            <nav>
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo">&emsp; Nucleotide Sequence</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="../index2.php">Main Page</a></li>
                        <li><a href="../saved.php">Saved Results</a></li>
                    </ul>
                </div>
            </nav>
            <br>
            <div class="container">
                <pre class="language-css">
                    <?php
                    $link = $_GET['link'];
                    if (isset($_GET['display'])) {
                        $html = file_get_contents($link . "&display=text");

                        //echo $link."&display=text";
                        ?>
                        <pre>
                            <?php echo $html; ?>
                        </pre>
                        <?php
                        //echo $html;
                    } else {
                        if (strpos($link, 'ncbi')) {
                            $html = file_get_html("$link");

                            foreach ($html->find('pre') as $e) {
                                echo '<pre>' . $e->innertext . '</pre>';
                            }

                            /* $ss="recordbody genbank";
                              $html=file_get_html("$link");
                              foreach($html->find('div[class=\'$ss\']') as $e)
                              echo $e->innertext . '<br>'; */
                            /* $ss="recordbody genbank";
                              $html=file_get_html("$link");
                              echo $html->find('div[class="$ss"]')->plaintext; */
                        } else {
                            $html = file_get_contents("$link");
                            echo $html;
                        }
                        //echo $link;
                    }
                    ?>
                </pre>
            </div>
        </body>
    </html>
<?php }
?>
            

