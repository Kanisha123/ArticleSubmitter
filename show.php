<?php
// $atitle = "";
// $abody = "";

 if($_GET['command'] === "query")
 {
    require('connect.php'); 

        $title = filter_input(INPUT_GET, 'typeahead', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if($title==="" || empty($title))
        {
            header("Location: index.php");
        }
        $select = "SELECT * FROM article_details WHERE article_title = :title";
        $statement = $db->prepare($select);
        $statement->bindValue(':title', $title);
        $statement->execute(); 
        $posts = $statement->fetch();
        // $atitle = $posts['article_title'];
        // $abody = $posts['article_body'];
        if(empty($posts))
        {

 
?>
<script>
alert("No Result Found");
window.location.href="index.php";
</script>

<?php
}
}
else
{
        require('connect.php'); 

        $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);
        $select = "SELECT * FROM article_details WHERE article_id = :id";
        $statement = $db->prepare($select);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute(); 
        $posts = $statement->fetch();
        // $atitle = $posts['article_title'];
        // $abody = $posts['article_body'];
    }
?>
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
    <link rel="stylesheet" type="text/css" href="form.css">
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
    <script type="text/javascript" src="auto.js" > 
    </script>
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
	
	
    
	<div id="trueHeader">
    
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
       
        
       
		  <li class="dropdown"><a href="about-us.html">About us</a>
        	
        </li>
		
       
       
                
        </ul>
        
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
<?= $posts['article_title'] ?>
</h1>

</div>



<div class="content_fullwidth less2">
<div class="container">

<div id="show">
    <p>
        <?= $posts['article_body'] ?>
    </p>
</div>
	
</div>
 <div class="divider_line11">
<h1>
Comment
</h1>


</div>
<div class="container">
    <div class="form-style-8">

  <form method="post" action="insert.php"> 
    <input type="text" name="name" placeholder="Full Name" />
    <textarea placeholder="Message" onkeyup="adjust_textarea(this)" name="comment"></textarea>
    <input type="hidden" name="id" value="<?= $posts['article_id'] ?>" />
    <input type="submit" value="Send Message" />
  </form>
  <?php
  require('connect.php'); 

        $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);
        $select = "SELECT * FROM article_comment WHERE article_id = :id AND hide = 'N' ORDER BY comment_id DESC";
        $statement1 = $db->prepare($select);
        $statement1->bindValue(':id', $id, PDO::PARAM_INT);
        $statement1->execute(); 
        $posts1 = $statement1->fetchAll();
  ?>
  <hr style="border-bottom: 1px solid grey;" />
  <table>
    <?php foreach($posts1 as $post): ?>
      <tr><td style="font-weight: bold;text-transform: capitalize;"><?= $post['name'] ?><small style="padding-left: 10px;"><a href="editcomment.php?id=<?= $post['comment_id'] ?>">edit</a></small></td></tr>
      <tr><td style="border-bottom: 2px solid grey;width: 1000px;"><?= $post['comment'] ?></td></tr>
      <?php endforeach ?>
  </table>


</div>
</div>
</div><!-- end content area -->

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
            <li><a href="www.elitewholesalearticles.com"><i class="fa fa-angle-right"> </i>	www.elitewholesalearticles.com </a></li>
            <li><a href="www.toparticlesubmission.com"><i class="fa fa-angle-right"> </i>	www.toparticlesubmission.com</a></li>
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


