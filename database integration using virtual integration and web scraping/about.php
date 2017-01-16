include_once('Circular.php'); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>BIOLOGICAL DATABASE INTEGRATION</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLE CSS -->
     <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body > 
   
        <div class="navbar navbar-inverse navbar-fixed-top " >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><strong style=""></strong> BI<i class="fa fa-globe"></i>LOGICAL <small >DATABASE INTEGRATION</small></a>
            </div>
            <div class="navbar-collapse collapse move-me">
               x <ul class="nav navbar-nav navbar-right set-links">
                    <li><a href="index2.php" class="active-menu-item">HOME</a></li>
                     <li><a href="about.php">ABOUT</a></li>
                    
                     
                    
                </ul>
            </div>

        </div>
    </div>
    <!--MENU SECTION END-->
    <section class="headline-sec">
        <div class="overlay ">
            <h3 >ABOUT US <i class="fa fa-angle-double-right "></i></h3>

        </div>
    </section>
    <!--HOME SECTION END-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8" >
                        <h2><strong>Name of the Developers</strong></h2>
                        <p>
                            <h3>Arunaditya chanda(2013je0498)</h3>
                            <h3>Rakesh Kumar(2013je0585)</h3>   
                            <h3>Projjal Kundu(2013je0463)</h3>
                            <h3>Vedika Loyia(2013je0486)</h3>
                            <h3>Rohit Kumar(2013je0231)</h3>
                            <h3>Devaki Srinivas(2013je0422)</h3>
                            
                            </p> 
                        <p>
                         
                            </p> 
                </div>
                <div class="col-md-4 p-top-row " >
                    <img src="assets/img/about1.jpg" class="img-responsive img-rounded" alt="" />
                </div>
            </div>
             <div class="row p-top-row">
                
                
            </div>
             <div class="row p-top-row">
                 
                <div class="col-md-8" >
                        <h3><strong>Project Description</strong></h3>
                        Existing databases which we are integrating: Genbank, EMBL and DDBJ.
Downloading Databases:  We will write a python code using ftp module to automatically download the data from existing database .
Converting the downloaded database into proper format: 
For converting the downloaded database into the proper format and inserting into the local database, we will use php code for parsing the loaded database and automatically we will insert the data into the local database by just running the php parsing script in the localhost web-server.
Database integration :
After downloading the database from different sources we will keep them into different tables in the local database. The data integration system comprises of three modules namely System access module , Query processing module and Database access module. The system access module allows clients to communicate with the data integration system and is responsible for returning query results to clients . The query processing object is responsible for determining which databases need to be contacted in order to perform a query and the database access module will access the database from different databases. Another method of data integration could be we will create a new table which will contain the common attributes of all the tables that are obtained from the original biological databases and we will integrate all the unique attributes of the original databases with the created table. In this case the data redundancy will be minimum. 
 

                </div>
                <div class="col-md-4 p-top-row " >
                    <img src="assets/img/about3.jpg" class="img-responsive img-rounded" alt="" />
                </div>
            </div>
        </div>
    </section>
  
    <div class="copy-txt">
         <div class="container">
        <div class="row">

            </div>
                   </div>
    </div>
     <!-- COPY TEXT SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
