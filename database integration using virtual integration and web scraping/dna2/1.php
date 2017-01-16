<head>
    <link rel="stylesheet" type="text/css" href="2.css">
    <link href="../materialize/css/materialize.css" rel="stylesheet" />
    <style>
        /* unvisited link */


        /* visited link */
        a:visited {
            color: yellow;
        }

        /* mouse over link */
        a:hover {
            color: red;
        }

        /* selected link */
        a:active {
            color: white;
        } 
    </style>
    <script src="../jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".save_result").click(function() {
                var action_link = $(this).attr("href");
                console.log(action_link);
                $.ajax({
                    type: "POST",
                    url: action_link,
                    success: function(response) {
                        console.log(response);
                        alert(response);
                    }
                });
                return false;
            });
        });
    </script>
</head>
<?php
$accesson_numbers = array();
$save_access = array();
?>
<body>

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">&emsp;Query Result for <?php echo $_REQUEST["query"] ?></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../index2.php">Main Page</a></li>
                <li><a href="../saved.php">Saved Results</a></li>
            </ul>
        </div>
    </nav>

    <br>

    <div class="row">
        <div class="col s1"></div>
        <div class= "col s8 push-s1">

            <?php
            include_once('simple_html_dom.php');

            function embl() {
                global $accesson_numbers, $save_access;
                $query = $_REQUEST['query'];
                $res_embl = array();
                for($i=1;$i<5;$i++)
                {
                $html = file_get_html('http://www.ebi.ac.uk/ebisearch/search.ebi?db=nucleotideSequences&t=' . $query . '&page='.$i);
                foreach ($html->find('a') as $e) {
                    //    $count++;

                    $temp = $e->href;
                    $arr = explode(".", $temp);
                    if ($arr[0] == "redirect") {
                        $arr1 = explode("%3A", $temp);
                        $arr2 = explode("%2F", $arr1[1]);
                        if ($arr2[6] != "Non-coding") {
                            $arr3 = explode("&", $arr2[6]);
                            //echo $arr3[0].'<br>';
                            $q = "http://www.ebi.ac.uk/ena/data/view/" . $arr3[0] . "&display=text";
                            $qq = "http://getentry.ddbj.nig.ac.jp/getentry/na/" . $arr3[0] . "?filetype=html";
                            //$qqq="http://www.ncbi.nlm.nih.gov/nuccore/".$arr3[0];
                            $qqq = "http://www.ncbi.nlm.nih.gov/sviewer/?noredirect=1&db=nuccore&val=" . $arr3[0];
                            if (isset($save_access[$arr3[0]])) {
                                continue;
                            }
                            $save_access[$arr3[0]] = true;
                            $accesson_numbers[] = $arr3[0];
                            ?>
                            <div class="card blue-grey darken-1" id="acc_<?php echo $arr3[0]; ?>">
                                <div class="card-content white-text">
                                    <span class="card-title">Accession Number  <?php echo $arr3[0] ?></span>
                                    <p>Nucleotide Sequence By databases namely Genbank, EMBL, DDBJ</p>
                                </div>
                                <div class="card-action">
                                    <a class="waves-effect waves-light btn-large" href="test.php?link=<?php echo $q ?>" id="embl">EMBL</a>
                                    <a class="waves-effect waves-light btn-large" href="test.php?link=<?php echo $qq ?>" id="ddbj">DDBJ</a>
                                    <a class="waves-effect waves-light btn-large" href="<?php echo $qqq; ?>" id="genbank">GENBANK</a>
                                    <a class="waves-effect waves-light btn-large" href="test.php?acc=<?php echo $arr3[0]; ?>">ALL</a>
                                    <a class="waves-effect waves-light btn-large save_result" href="test.php?acc=<?php echo $arr3[0]; ?>&down=1">DOWNLOAD</a>


                                </div>
                            </div>

                            <?php
                            //    array_push($res_embl,$arr3[0]);
                        }
                    }
                }
            }
            }

            function genbank_another() {
                $url_grnbak = "http://www.ncbi.nlm.nih.gov/sviewer/viewer.fcgi?val=946718738&db=nuccore&dopt=genbank&extrafeat=976&fmt_mask=0&retmode=html&withmarkup=on&log$=seqview&maxplex=3&maxdownloadsize=1000000";
                $html = file_get_contents($url_grnbak);
                echo $html;
            }

            function genbank() {
                global $accesson_numbers, $save_access;
                $query = $_REQUEST['query'];
                $res_genbank = array();
                $html = file_get_html('http://www.ncbi.nlm.nih.gov/nuccore/?term=' . $query);

                foreach ($html->find('a') as $e) {
                    //      $count++;

                    $str = $e->href;
                    //echo $str.'<br>';
                    $arr1 = explode("/", $str);
                    if (sizeof($arr1) == 3 && $arr1[1] == "nuccore") {
                        $arr3 = $arr1[2];
                        $arr4 = explode("?", $arr3);
                        if (sizeof($arr4) == 1 && $arr4[0] != "advanced") {

                            //             echo $arr4[0].'<br>';
                            //array_push($res_genbank,$arr4[0]);
                            //  $q="http://www.ncbi.nlm.nih.gov/nuccore/".$arr4[0];
                            $q = "http://www.ebi.ac.uk/ena/data/view/" . $arr4[0] . "&display=text";
                            $qq = "http://getentry.ddbj.nig.ac.jp/getentry/na/" . $arr4[0] . "?filetype=html";
                            //$qqq="http://www.ncbi.nlm.nih.gov/nuccore/".$arr4[0];
                            $qqq = "http://www.ncbi.nlm.nih.gov/sviewer/?noredirect=1&db=nuccore&val=" . $arr4[0];
                            if (isset($save_access[$arr4[0]])) {
                                continue;
                            }
                            $save_access[$arr4[0]] = true;
                            $accesson_numbers[] = $arr4[0];
                            ?>
                            <div class="card blue-grey darken-1" id="acc_<?php echo $arr4[0]; ?>">
                                <div class="card-content white-text">
                                    <span class="card-title">Accession Number <?php echo $arr4[0] ?></span>
                                    <p>Nucleotide Sequence By databases namely Genbank, EMBL, DDBJ</p>
                                </div>
                                <div class="card-action">
                                    <a class="waves-effect waves-light btn-large"  href="test.php?link=<?php echo $q ?>" id="embl">EMBL</a>
                                    <a class="waves-effect waves-light btn-large" href="test.php?link=<?php echo $qq ?>" id="ddbj">DDBJ</a>
                                    <a class="waves-effect waves-light btn-large" href="<?php echo $qqq; ?>" id="genbank">GENBANK</a>
                                    <a class="waves-effect waves-light btn-large" href="test.php?acc=<?php echo $arr4[0]; ?>">ALL</a>
                                    <a class="waves-effect waves-light btn-large save_result" href="test.php?acc=<?php echo $arr4[0]; ?>&down=1">DOWNLOAD</a>

                                </div>
                            </div>
                <?php
            }
        }
    }
}

function ddbj() {
    global $accesson_numbers, $save_access;
    $query = $_REQUEST['query'];
    //$html = file_get_html('http://ddbj.nig.ac.jp/arsa/search?lang=en&cond=quick_search&query='.$query.'&operator=AND');

    for ($i = 1; $i < 5; $i++) {
        $url = "http://ddbj.nig.ac.jp/arsa/searchMore?query=" . $query . "&operator=AND&sortTarget=score&sortOrder=desc&textDisplayFields=PrimaryAccessionNumber,Definition,SequenceLength,MolecularType,Organism&filterQuery=&page=" . $i;
        $html = file_get_html($url);
        //echo $html.'<br>';
        foreach ($html->find('a') as $e) {
            $str = $e->target;

            if (strlen($str) != 0) {
                $q = "http://www.ebi.ac.uk/ena/data/view/" . $str . "&display=text";
                $qq = "http://getentry.ddbj.nig.ac.jp/getentry/na/" . $str . "?filetype=html";
                //$qqq="http://www.ncbi.nlm.nih.gov/nuccore/".$str;
                $qqq = "http://www.ncbi.nlm.nih.gov/sviewer/?noredirect=1&db=nuccore&val=" . $str;

                if (isset($save_access[$str])) {
                    continue;
                }
                $save_access[$str] = true;
                $accesson_numbers[] = $str;
                ?>
                            <div class="card blue-grey darken-1" id="acc_<?php echo $str; ?>">
                                <div class="card-content white-text">
                                    <span class="card-title">Accession Number <?php echo $str ?></span>
                                    <p>Nucleotide Sequence By databases namely Genbank, EMBL, DDBJ</p>

                                </div>
                                <div class="card-action">
                                    <a class="waves-effect waves-light btn-large" href="test.php?link=<?php echo $q ?>" id="embl">EMBL</a>
                                    <a class="waves-effect waves-light btn-large" href="test.php?link=<?php echo $qq ?>" id="ddbj">DDBJ</a>
                                    <a class="waves-effect waves-light btn-large" href="<?php echo $qqq; ?>" id="genbank">GENBANK</a>
                                    <a class="waves-effect waves-light btn-large" href="test.php?acc=<?php echo $str; ?>">ALL</a>
                                    <a class="waves-effect waves-light btn-large save_result" href="test.php?acc=<?php echo $str; ?>&down=1">DOWNLOAD</a>

                                </div>
                            </div>
                <?php
            }
        }
    }
}

ddbj();
embl();
genbank();
//genbank_another();
?>
        </div>
        <div class="col s1 push-s2">
            <ul class="section table-of-contents">
                <li>Total : <?php echo count($accesson_numbers); ?></li>
<?php foreach ($accesson_numbers as $acc_no) { ?>
                    <li><a class="" href="#acc_<?php echo $acc_no ?>"><?php echo $acc_no ?></a></li>
                <?php }
                ?>

            </ul>
        </div>
    </div>


</body>