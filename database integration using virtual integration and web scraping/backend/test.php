
<?php
include_once('simple_html_dom.php');
$link=$_GET['link'];
//echo $link;
if(isset($_GET['display']))
{
	$html=file_get_contents($link."&display=text");

	//echo $link."&display=text";
	?>
	<pre>
	<?php echo $html; ?>
	</pre>
	<?php
	//echo $html;

}
else
{
	if(strpos($link,'ncbi'))
	{
		$html=file_get_contents("$link");
		echo $html;
		/*$ss="recordbody genbank";
		 $html=file_get_html("$link");
		 foreach($html->find('div[class=\'$ss\']') as $e)
    	echo $e->innertext . '<br>';*/
		/*$ss="recordbody genbank";
		$html=file_get_html("$link");
		echo $html->find('div[class="$ss"]')->plaintext;*/
	}
	else
	{
		$html=file_get_contents("$link");
		echo $html;
	}
	//echo $link;
}
?>

