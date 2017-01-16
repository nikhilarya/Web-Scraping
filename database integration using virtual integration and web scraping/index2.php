
<?php 
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
    <section id="home-sec">
        <div class="overlay text-center">
            <h1 >INTEGRATED BIOLOGICAL DATABASE ( CONSISTS OF EMBL,GENBANK and DDBJ )</h1>
            <hr class="hr-set"/>

            <p>Provides Interactive User-interface for searching nucleotide sequence of different species</p>
        </div>
    </section>
    <!--HOME SECTION END-->
    <section id="query" >
        <div class="container">
            <div class="row">
             <form action = 'dna2/1.php' type="POST">
<div class="col-md-8">

        <input type="text" class="form-control input-cls"  name="query"  />

</div>
                <div class="col-md-4">
                    <input type="submit" class="btn btn-info btn-lg btn-set"  value="SEARCH" />
                </div>
                </form>
            </div>
        </div>
    </section>
     <!--SEARCH SECTION END-->
    <section id="services-sec">
        <div class="container">
           
            <div class="row text-center" >
<div class="col-md-4">
    <i class="fa fa-database fa-5x icon-custom-1 color-1"></i>
    <h3>GENBANK</h3>
    <p>
        The GenBank sequence database is an open access, annotated collection of all publicly available nucleotide sequences and their protein translations. This database is produced and maintained by the National Center for Biotechnology Information (NCBI) as part of the International Nucleotide Sequence Database Collaboration (INSDC).
    </p>

</div>
                <div class="col-md-4">
                     <i class="fa fa-database fa-5x icon-custom-1 color-1"></i>
    <h3>EMBL </h3>
                     <p>
        The European Molecular Biology Laboratory (EMBL) is a molecular biology research institution supported by 21 member states,[2] three prospect and two associate member states. EMBL was created in 1974 and is an intergovernmental organisation funded by public research money from its member states. Research at EMBL is conducted by approximately 85 independent groups covering the spectrum of molecular biology.
    </p>
                </div>
                <div class="col-md-4">
                     <i class="fa fa-database fa-5x icon-custom-1 color-1"></i>
    <h3>DDBJ</h3>
                     <p>
        The DNA Data Bank of Japan (DDBJ) is a biological database that collects DNA sequences.[1][2] It is located at the National Institute of Genetics (NIG) in the Shizuoka prefecture of Japan. It is also a member of the International Nucleotide Sequence Database Collaboration or INSDC. It exchanges its data with European Molecular Biology Laboratory at the European Bioinformatics Institute and with GenBank at the National Center for Biotechnology Information.
    </p>
                </div>
            </div>
        </div>
    </section>
    <!--SERVICES SECTION END-->
	   <section id="clients-sec">
        <div class="container">
            <div class="row">
<div class="col-md-12">
    <img src="assets/img/clients.png" alt="" class="img-rounded img-responsive" />
</div>

               
            </div>
        </div>
    </section>
    <!--CLIENTS SECTION END-->
    <div id="testimonial-sec">

   
        <div class="container">
              <div class="row ">
            <div class="col-md-12">
                <div id="carousel-example" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example" data-slide-to="1"></li>
                        <li data-target="#carousel-example" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="container center">
                                <div class="col-md-6 col-md-offset-3 slide-custom">
                                   
                                    <h4><i class="fa fa-quote-left"></i> This is good website for compairing the different nucleotide sequence from different existing databases. <i class="fa fa-quote-right"></i></h4>
                                     <div class="user-img pull-right">
						<img src="assets/img/user.gif" alt="" class="img-u image-responsive"  />
					</div>
                                    <h5 class="pull-right"><strong class="c-black">Lorem Dolor</strong></h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="container center">
                                <div class="col-md-6 col-md-offset-3 slide-custom">
                                    <h4> <i class="fa fa-quote-left"></i> It is an awesome website for searching nucleotide sequence for different species. <i class="fa fa-quote-right"></i></h4>
                                         <div class="user-img pull-right">
						<img src="assets/img/user2.png" alt="" class="img-u image-responsive"  />
					</div>
                                    <h5 class="pull-right"><strong class="c-black">Faucibus luctus</strong></h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="container center">
                                <div class="col-md-6 col-md-offset-3 slide-custom">
                                    <h4><i class="fa fa-quote-left"></i>This website helps me a lot to do the comparative study among the differnet nucleotide sequences of different species.<i class="fa fa-quote-right"></i></h4>
                                        <div class="user-img pull-right">
						<img src="assets/img/user.gif" alt="" class="img-u image-responsive"  />
					</div>
                                    <h5 class="pull-right"><strong class="c-black">Sed ultricies</strong></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
         </div>
    <!--TESTIMONIAL SECTION END-->
    <section id="features-sec"  >
        <div class="container">
           
            <div class="row text-center" >
<div class="col-md-3">
    <i class="fa fa-comments-o fa-3x icon-custom-2 color-2"></i>
    <h4>Integrated</h4>
    <p>
        It uses virtual integration for integrating the three existing databases. 
    </p>

</div>
                <div class="col-md-3">
                     <i class="fa fa-rocket fa-3x icon-custom-2 color-2"></i>
    <h4>Modernized</h4>
                     <p>
        It contains most updated nucleotide sequences of different species. 
    </p>
                </div>
                <div class="col-md-3">
                     <i class="fa fa-bars fa-3x icon-custom-2 color-2"></i>
    <h4>Fast Response</h4>
                     <p>
        It uses virtual integration . That makes it very fast . 
    </p>
                </div>
                <div class="col-md-3">
                     <i class="fa fa-table fa-3x icon-custom-2 color-2"></i>
    <h4>Customizable</h4>
                     <p>
       Whenever new sequence will be inserted into the three main databases it will show those immediately.
    </p>
                </div>
            </div>
        </div>
    </section>
     <!--FEATURES SECTION END-->
    <section id="clients-sec">
        <div class="container">
            <div class="row">
<div class="col-md-12">
    <img src="assets/img/clients.png" alt="" class="img-rounded img-responsive" />
</div>

               
            </div>
        </div>
    </section>
    <!--CLIENTS SECTION END-->
    

    <div class="copy-txt">
         <div class="container">
        <div class="row">

            </div>
                   </div>
    </div>
     
</body>
</html>
