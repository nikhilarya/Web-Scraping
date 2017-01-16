<?php 
	include_once('simple_html_dom.php');
	function embl()
    {
        $query=$_REQUEST['query'];
        $res_embl=array();
    	$html = file_get_html('http://www.ebi.ac.uk/ebisearch/search.ebi?db=nucleotideSequences&t='.$query.'&page=1');
    	foreach($html->find('a') as $e) 
        {
        //		$count++;
        	
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
                    ?>
                        <a href="test.php?link=<?php echo $q ?>"><?php echo $arr3[0] ?></a>
                        <br>
                    <?php
                    array_push($res_embl,$arr3[0]);
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
           // echo $str.'<br>';
            $arr1=explode("/",$str);
            if(sizeof($arr1)==3 && $arr1[1]=="nuccore")
            {
                $arr3=$arr1[2];
                $arr4 = explode("?",$arr3);
                    if(sizeof($arr4)==2)
                    {
                        $arr5=explode("=",$arr4[1]);
                        if(sizeof($arr5)==2 && $arr5[1]=="genbank")
                        {
                        ///echo $arr4[0].'<br>';
                        array_push($res_genbank,$arr4[0]);
                      //  $q="http://www.ncbi.nlm.nih.gov/nuccore/".$arr4[0];
                        $q="http://www.ncbi.nlm.nih.gov/sviewer/viewer.fcgi?val=".$arr4[0]."&db=nuccore&dopt=genbank&extrafeat=976&fmt_mask=0&retmode=html&withmarkup=on&log$=seqview&maxplex=3&maxdownloadsize=1000000"
                        ?>
                        <a href="test.php?link=<?php echo $q ?>"><?php echo $arr4[0] ?></a>
                        <br>
                        <?php
                        }
                    }
            }
            
        }
    }
    function ddbj()
    {
        $query=$_REQUEST['query'];
        //$html = file_get_html('http://ddbj.nig.ac.jp/arsa/search?lang=en&cond=quick_search&query='.$query.'&operator=AND');
        
        for ($i=1; $i<10; $i++) {
            $url = "http://ddbj.nig.ac.jp/arsa/searchMore?query=h1n1&operator=AND&sortTarget=score&sortOrder=desc&textDisplayFields=PrimaryAccessionNumber,Definition,SequenceLength,MolecularType,Organism&filterQuery=&page=".$i;
            $html = file_get_html($url);
        //echo $html.'<br>';
        foreach($html->find('a') as $e) 
        {
            $str=$e->target;

            if(strlen($str)!=0)
            {
                $q="http://getentry.ddbj.nig.ac.jp/getentry/na/".$str."?filetype=html";
                ?>
                    <a href="test.php?link=<?php echo $q; ?>"><?php echo $str; ?></a>
                    <br>
                <?php
            }
            
        }
    }

}
   embl();
    genbank();
   ddbj();
//genbank_another();


?>