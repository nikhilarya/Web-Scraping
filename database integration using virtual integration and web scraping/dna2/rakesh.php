    <?php 
      include_once('simple_html_dom.php');
      function embl()
        {
            $query=$_REQUEST['query'];
           // $res_embl=array();
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
                        ?>
                            <a href="test.php?link=<?php echo $q ?>"><?php echo $arr3[0] ?></a>
                            <br>
                        <?php
                       // array_push($res_embl,$arr3[0]);
                    }

                }
            
            }

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
                            
                            
                          //  $q="http://www.ncbi.nlm.nih.gov/nuccore/".$arr4[0];
                            $q="http://www.ncbi.nlm.nih.gov/nuccore/".$arr4[0];
                            ?>
                            <a href="<?php echo $q ?>"><?php echo $arr4[0] ?></a>
                            <br>
                            <?php
                            }
                        }
                }
                
            }
        
        function ddbj()
        {
            $query=$_REQUEST['query'];
            
            
                $url = "http://ddbj.nig.ac.jp/arsa/searchMore?query=".$query."&operator=AND&sortTarget=score&sortOrder=desc&textDisplayFields=PrimaryAccessionNumber,Definition,SequenceLength,MolecularType,Organism&filterQuery=&page=3";
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

    ddbj();
    echo '<br>';
    genbank();
    echo '<br>';
       embl();
       echo '<br>';
        
       



    ?>