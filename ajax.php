<!doctype html>
  <head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
   <link rel="shortcut icon" type="image/png" href="images/krdx.png"/>
    
    <!-- Favicon --> 

    <!-- this styles only adds some repairs on idevices  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Google fonts - witch you want to use - (rest you can just remove) -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Dancing+Script:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
   
    
    <!-- ######### CSS STYLES ######### -->
    <link rel="stylesheet" type="text/css" href="search.css">
    <link rel="stylesheet" href="homestyle.css" type="text/css">
    
    <link rel="stylesheet" href="css/reset.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    
    <!-- font awesome icons -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    
    <!-- simple line icons -->
    <link rel="stylesheet" type="text/css" href="css/simpleline-icons/simple-line-icons.css" media="screen" />
    
    <!-- animations -->
    <link href="js/animations/css/animations.min.css" rel="stylesheet" type="text/css" media="all" />
    
    <!-- responsive devices styles -->
    <link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css" />
    
    <!-- shortcodes -->
    <link rel="stylesheet" media="screen" href="css/shortcodes.css" type="text/css" /> 
    

    <link rel = "stylesheet" media = "screen" href = "js/style-switcher/color-switcher.css" />
    
    <!-- mega menu -->
    <link href="js/mainmenu/bootstrap.min.css" rel="stylesheet">
    <link href="js/mainmenu/menu.css" rel="stylesheet">
    
    <!-- forms -->
    <link rel="stylesheet" href="js/form/sky-forms2.css" type="text/css" media="all">
    
    <script type="text/javascript" src="js/validation.js" > 
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="typeahead.min.js"></script>
    <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
    </script>
    <style type="text/css">
.bs-example{
	font-family: sans-serif;
	position: relative;
	margin: 50px;
}
.typeahead, .tt-query, .tt-hint {
	border: 2px solid #CCCCCC;
	border-radius: 8px;
	font-size: 24px;
	height: 30px;
	line-height: 30px;
	outline: medium none;
	padding: 8px 12px;
	width: 396px;
}
.typeahead {
	background-color: #FFFFFF;
}
.typeahead:focus {
	border: 2px solid #0097CF;
}
.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
	color: #999999;
}
.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 422px;
}
.tt-suggestion {
	font-size: 24px;
	line-height: 24px;
	padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}
</style>
  </head>
  <body>
    <div class="site_wrapper">
    <header id="header">

    <div class="page_title2">
    <div class="container">
    
    <h1>Auto Article Submitter</h1>

    <div class="pagenation">&nbsp; <a href="index.php">Home</a> <i>/</i> <a href="register.php">Create New Account</a> <i>/</i> <a href="logg.html">Login</a> </div>

</div>
</div>
    
</header>
<!-- Top header bar -->
 <!-- <div id="trueHeader"> -->
    
    <div class="wrapper">
            
    <!-- Navigation Menu -->
    <div class="container">
    
    <nav class="menu_main2">
        
    <div class="navbar yamm navbar-default">
    
     <div class="navbar-header">
      <div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse" data-target="#navbar-collapse-1"> <span>Menu</span>
        <button type="button"> <i class="fa fa-bars"></i></button>
        </div>
      </div>
      
      <div id="navbar-collapse-1" class="navbar-collapse collapse">
      
        <ul class="nav navbar-nav three">
       
        <li class="dropdown yamm-fw"><a href="index.php"  class="dropdown-toggle active"><i class="fa fa-home">  </i> Home </a></li>
        
        <li class="dropdown"><a href="register.php">Create New Account</a>
        </li>
       
        <li class="dropdown"><a href="logg.html">Log In</a>
            
        </li>
          <li class="dropdown"><a href="about-us.html">About us</a>
            
        </li>
        
       
       
                
        </ul>

        <!-- <div class="search-container"> -->
        <!-- <form action="#" class="search-container"> -->
      <input type="text" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Type your Query">
      <!-- <button type="submit"></button> -->
    <!-- </form> -->
        <!-- </div> -->
      </div>
      
      </div>
      
      </nav><!-- end Navigation Menu --> 
      
<!-- end search bar --> 
       
     </div>
     
    </div>
    
    </div>
<!-- end page title --> 
 <div class="divider_line11">
<h1>
Articles
</h1>

</div>

<div class="content_fullwidth less2">
<div class="container">

<?php
        require('connect.php'); 

        $select = "SELECT * FROM article_details ORDER BY article_id DESC ";

        $statement = $db->prepare($select);
        $statement->execute(); 
        $posts = $statement->fetchAll();
?>
<div id="hello">
<?php foreach($posts as $post): ?>
<div class="kanisha">

    <div class="image">
        <img src="upload/<?= $post['article_image'] ?>" alt="<?= $post['article_image'] ?>">
    </div>

    
    <p>
                <h5 id="color"><a href="show.php?id=<?= $post['article_id'] ?>"><?= $post['article_title']?></a></h5>
                <small id="small">
                
                <?php $date = date_create($post['article_date']) ?>
                <?= date_format($date, "F d, Y, h:m a") ?>
                </small>
    </p>
    <div id="me">
    <?php if(strlen($post['article_body']) > 200) : ?>
                    <?= substr( $post['article_body'], 0, 200) ?>
                    <div id="part">
                        <a href="show.php?id=<?= $post['article_id'] ?>"> Read More </a>
                    </div>
                    
                <?php else : ?>
                    <?= $post['article_body'] ?>
                <?php endif ?> 

            </div>
</div>
<?php endforeach ?> 
</div>  
</div>
</div><!-- end content area -->





    <div class="row">
      <div class=".col-md-6">
        <div class="jumbotron">
        <h1>Ajax Search Box using Node and MySQL <small>Codeforgeek Tutorial</small></h1>
         <button type="button" class="btn btn-primary btn-lg">Visit Tutorial</button>
      </div>
  </div>
  <div class=".col-md-6">
    <div class="panel panel-default">
    <div class="bs-example">
        <input type="text" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Type your Query">
    </div>
  </div>
  </div>
  </div>

<div class="clearfix marb12"></div>

<footer class="footer">

<div class="top_footer empty"></div><!-- end footer top section -->

<div class="clearfix"></div>

<div class="container">

    <div class="one_third animate" data-anim-type="fadeIn" data-anim-delay="100">
        <ul class="faddress">
            <li><img src="images/footer-logo.png" alt="" /></li>
            <li><i class="fa fa-map-marker fa-lg"></i>&nbsp; 202-948 Chancellor Drive<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Winnipeg, Canada, MB R3T 2K1</li>
            <li><i class="fa fa-phone"></i>&nbsp; +1 (204)952-3494</li>
    
            <li><a href="mailto:krunalprajapati50@gmail.com"><i class="fa fa-envelope"></i>&nbsp; kanishapatel003@yahoo.com</a></li>
            <li><img src="images/footer-wmap.png" alt="" /></li>
        </ul>
  </div><!-- end address -->
    
    <div class="one_third animate" data-anim-type="fadeIn" data-anim-delay="300">
    <div class="qlinks">
    
      <h4 class="lmb">Useful Links For Article </h4>
        
        <ul>
    
    





            <li><a href="www.articlesinaclick.com"><i class="fa fa-angle-right"> </i>www.articlesinaclick.com </a></li>
            <li><a href="www.articalsubmitauto.com"><i class="fa fa-angle-right"> </i>www.articalsubmitauto.com</a></li>
            <li><a href="www.elitewholesalearticles.com"><i class="fa fa-angle-right"> </i> www.elitewholesalearticles.com </a></li>
            <li><a href="www.toparticlesubmission.com"><i class="fa fa-angle-right"> </i> www.toparticlesubmission.com</a></li>
            <li><a href="www.squidoo.com"><i class="fa fa-angle-right"> </i>www.squidoo.com </a></li>
           
        </ul>
        
    </div>
  </div><!-- end links -->
        
    <div class="one_third last animate" data-anim-type="fadeIn" data-anim-delay="500">
    <div class="siteinfo">
    
      <h4 class="lmb">What Can You Receive?</h4>
        
        <p>Article Submission</p>
        <br/>
        <p>Personal Profile </p>
    <br/>
         <p> Web Marketing</p>  
<br/>
<p> Automized Process</p>    
  </div>
    </div><!-- end site info -->
    
    

</div><!-- end footer -->

<div class="clearfix"></div>

<div class="copyright_info">
<div class="container">

  <div class="clearfix divider_dashed10"></div>
    
    <div class="one_half animate" data-anim-type="fadeInRight">
    
        Copyright © 2015 ibrainsoftways.com. All rights reserved.  <a href="#">Terms of Use</a> | <a href="#">Privacy Policy</a>
        
    </div>
    
    
</div>
</div><!-- end copyright info -->

<div class="clearfix"></div>

</footer>


<a href="#" class="scrollup">Scroll</a><!-- end scroll to top of the page-->


<!-- ######### JS FILES ######### -->
<!-- get jQuery from the google apis -->
<script type="text/javascript" src="js/universal/jquery.js"></script>


<!-- animations -->
<script src="js/animations/js/animations.min.js" type="text/javascript"></script>

<!-- mega menu -->
<script src="js/mainmenu/bootstrap.min.js"></script> 
<script src="js/mainmenu/customeUI.js"></script> 

    




<!-- scroll up -->
<script src="js/scrolltotop/totop.js" type="text/javascript"></script>


  </body>
</html>
