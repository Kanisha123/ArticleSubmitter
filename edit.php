<!doctype html>

<head>
	<title>Submit Article</title>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
   <link rel="shortcut icon" type="image/png" href="images/krdx.png"/>
    
    <!-- this styles only adds some repairs on idevices  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Google fonts - witch you want to use - (rest you can just remove) -->
   	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Dancing+Script:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    
    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
    <!-- ######### CSS STYLES ######### -->
	
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
    <link rel="stylesheet" href="js/form/sarticle.css" type="text/css" media="all">
    
	<script type="text/javascript" src="js/validation.js" > 
	</script>
</head>

<body>

<div class="site_wrapper">

<header id="header">

	<div class="page_title2">
<div class="container">
	
    <h1>Auto Article Submitter</h1>
    <div class="pagenation">&nbsp; Welcome :
	
	<?php
	
	require('connect.php');
	require('isLogin.php');
	
	$var=$_SESSION['success'];
	// $username = $_POST['Email'];
 //  $password = $_POST['Password'];
	
	$select = "SELECT author_firstName,author_lastName FROM author_details WHERE author_email = :email";
        $statement = $db->prepare($select);
        $statement->bindValue(':email', $var);
        $statement->execute(); 
        $posts = $statement->fetch();

        $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);
        $select1 = "SELECT * FROM article_details WHERE article_id = :id";
        $statement1 = $db->prepare($select1);
        $statement1->bindValue(':id', $id, PDO::PARAM_INT);
        $statement1->execute(); 
        $posts1 = $statement1->fetch();
	// $qry="select Firstname,Lastname from author_mstr where Email='$var'";
	// $result=mysqli_query($con,$qry);
	
// while($row=mysqli_fetch_array($result))
// 	{
// 	echo $row['Firstname'];
// 	echo "&nbsp";
// 	echo $row['Lastname'];
// 	}

			echo $posts['author_firstName'];
			echo "&nbsp";
			echo $posts['author_lastName'];

	?> 
	 </div>
     
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
       
        <li class="dropdown"><a href="home.php"><i class="fa fa-home ">  </i> Home </a></li>
        <li class="dropdown"><a href="submit.php">Submit Your Article</a>
            
        </li>
		
		<li class="dropdown"><a href="myarticle.php" >My Article</a>
        	
        </li>

		<li class="dropdown"><a href="editprofile.php" >Manage Your Profile</a>
        	
        </li>
		
        
       
        	
        </li>
		<li class="dropdown"> <a href="feedback.php">Feedback</a></li>
       <li class="dropdown"> <a href="logout.php">Logout</a></li>
	   
       
                
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
Edit Your Article
</h1>

</div>



<div class="content_fullwidth less2">
<div class="container">



	<div class="reg_form">
        
<form id="sky-form" class="sky-form" method="post" action="process.php" enctype='multipart/form-data'>


            
            <fieldset>					
                
				<section>
				
				<label class="input">
                    	<input type="text" name="Title" maxlength="70" title="Title Of Article" value="<?= $posts1['article_title'] ?>"  />
		</label>		
		</section>
					


					
					<section>
  
		<label class="textarea"> 
                <textarea rows="25" name="Body" id="Body" minlength=""  /><?= $posts1['article_body'] ?></textarea>
              </label>
	
					</section>

                    <section>
                    <label class="label">Article Image :<?= $posts1['article_image'] ?>"</label>
                    <label class="input">
                    <input type="file" name="image" >
                    </section>
                    </label>
            
					
					<input type="hidden" name="id" value="<?= $posts1['article_id'] ?>" />

		   </fieldset>
            <footer>
			
			<div class="fright">
			<button type="submit" name="command" class="button button-secondary" value="Update">Edit</button>

            
                
               
                <button type="submit" name="command"  class="button" value="Delete" onclick="return confirm('Are you sure you wish to delete this post?')">Delete</button>
                </div>
                
            </footer>
        </form>
		
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


