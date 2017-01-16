<head>
<link rel="stylesheet" type="text/css" href="2.css">
<style>
/* unvisited link */
a:link {
    color: white;
}

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

</head>
<body>

<div class= "c">
<font color="white">
<table border="20">
<?php 
  include_once('simple_html_dom.php');
  function embl()
    {
        $query=$_REQUEST['query'];
        $res_embl=array();
      $html = file_get_html('http://www.ebi.ac.uk/ebisearch/search.ebi?db=nucleotideSequences&t='.$query.'&page=1');
      foreach($html->find('a') as $e) 
        {
        //    $count++;
          
            $temp = $e->href;
            $arr = explode(".",$temp);
            if($arr[0]=="redirect")
            {
                $arr1 = explode("%3A",$temp);
                $arr2 = explode("%2F",$arr1[1]);
                if($arr2[6]!="Non-coding")
                {
                    $arr3 = explode("&",$arr2[6]);
                    //echo $arr3[0].'<br>';
                    $q="http://www.ebi.ac.uk/ena/data/view/".$arr3[0]."&display=text";
                    $qq="http://getentry.ddbj.nig.ac.jp/getentry/na/".$arr3[0]."?filetype=html";
                    //$qqq="http://www.ncbi.nlm.nih.gov/nuccore/".$arr3[0];
                    $qqq="http://www.ncbi.nlm.nih.gov/sviewer/?noredirect=1&db=nuccore&val=".$arr3[0];
                    ?>
                    <tr>
                      <td><font color='Red'>  AccessionNumber:<?php echo $arr3[0]; ?></font></td>

                        <td><a href="test.php?link=<?php echo $q ?>" id="embl">EMBL</a></td>
                        <td> <a href="test.php?link=<?php echo $qq ?>" id="ddbj">DDBJ</a></td>
                        <td> <a href="<?php echo $qqq; ?>" id="genbank">GENBANK</a></td> 
                         <td> <a href="test.php?acc=<?php echo $arr3[0]; ?>">ALL</a></td>  
                         <td> <a href="test.php?acc=<?php echo $str; ?>&down=1">DOWNLOAD</a></td>
                         </tr>

                    <?php
                //    array_push($res_embl,$arr3[0]);
                }

            }
        
        }

    }
    function genbank_another() {
        $url_grnbak = "http://www.ncbi.nlm.nih.gov/sviewer/viewer.fcgi?val=946718738&db=nuccore&dopt=genbank&extrafeat=976&fmt_mask=0&retmode=html&withmarkup=on&log$=seqview&maxplex=3&maxdownloadsize=1000000";
        $html=file_get_contents($url_grnbak);
        echo $html;
    }
    
    function genbank()
    {
        $query=$_REQUEST['query'];
        $res_genbank=array();
        $html = file_get_html('http://www.ncbi.nlm.nih.gov/nuccore/?term='.$query);

        foreach($html->find('a') as $e) 
        {
        //      $count++;
            
            $str=$e->href;
            //echo $str.'<br>';
            $arr1=explode("/",$str);
            if(sizeof($arr1)==3 && $arr1[1]=="nuccore")
            {
                $arr3=$arr1[2];
                $arr4 = explode("?",$arr3);
                    if(sizeof($arr4)==1 && $arr4[0]!="advanced")
                    {   
                        
           //             echo $arr4[0].'<br>';
                        //array_push($res_genbank,$arr4[0]);
                      //  $q="http://www.ncbi.nlm.nih.gov/nuccore/".$arr4[0];
                        $q="http://www.ebi.ac.uk/ena/data/view/".$arr4[0]."&display=text";
                        $qq="http://getentry.ddbj.nig.ac.jp/getentry/na/".$arr4[0]."?filetype=html";
                        //$qqq="http://www.ncbi.nlm.nih.gov/nuccore/".$arr4[0];
                        $qqq="http://www.ncbi.nlm.nih.gov/sviewer/?noredirect=1&db=nuccore&val=".$arr4[0];

                        ?>
                        <tr> <td> <font color='Red'>  AccessionNumber:<?php echo $arr4[0]; ?> </font></td>
                           <td>     <a href="test.php?link=<?php echo $q ?>">EMBL</a></td>
                            <td>     <a href="test.php?link=<?php echo $qq  ?>">DDBJ</a></td>
                             <td>    <a href="<?php echo $qqq; ?>">GENBANK</a></td>
                              <td> <a href="test.php?acc=<?php echo $arr4[0]; ?>">ALL</a></td>  
                              <td> <a href="test.php?acc=<?php echo $str; ?>&down=1>">DOWNLOAD</a></td>  
                        </tr>
                        <?php
                        
                    }
            }
            
        }
    }
    function ddbj()
    {
        $query=$_REQUEST['query'];
        //$html = file_get_html('http://ddbj.nig.ac.jp/arsa/search?lang=en&cond=quick_search&query='.$query.'&operator=AND');
        
        for ($i=1; $i<5; $i++) {
            $url = "http://ddbj.nig.ac.jp/arsa/searchMore?query=".$query."&operator=AND&sortTarget=score&sortOrder=desc&textDisplayFields=PrimaryAccessionNumber,Definition,SequenceLength,MolecularType,Organism&filterQuery=&page=".$i;
            $html = file_get_html($url);
        //echo $html.'<br>';
        foreach($html->find('a') as $e) 
        {
            $str=$e->target;

            if(strlen($str)!=0)
            {
                $q="http://www.ebi.ac.uk/ena/data/view/".$str."&display=text";
                $qq="http://getentry.ddbj.nig.ac.jp/getentry/na/".$str."?filetype=html";
                //$qqq="http://www.ncbi.nlm.nih.gov/nuccore/".$str;
                $qqq="http://www.ncbi.nlm.nih.gov/sviewer/?noredirect=1&db=nuccore&val=".$str;

                ?>
                  <tr>  <td> <font color='Red'>AccessionNumber:<?php echo $str; ?></font></td>
                        <td><a href="test.php?link=<?php echo $q  ?>">EMBL</a></td>
                         <td><a href="test.php?link=<?php echo $qq  ?>">DDBJ</a></td>
                        <td> <a href="<?php echo $qqq; ?>">GENBANK</a></td>
                        <td> <a href="test.php?acc=<?php echo $str; ?>">ALL</a></td>
                        <td> <a href="test.php?acc=<?php echo $str; ?>&down=1">DOWNLOAD</a></td>
                         </tr>
                <?php
            }
            
        }
    }

}
ddbj();
   embl();
    genbank();
   
//genbank_another();


?></table></font>
</div>
<div class ='a'>
<div class='dna'>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
</div>
<div class='dna'>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
</div>

</div>



<div class ='b'>
<div class='dna'>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
  <div class='protein'>
    <b></b>
    <b></b>
  </div>
</div>
</div>
</body>