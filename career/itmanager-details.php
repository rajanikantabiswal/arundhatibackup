<?php
$statusMsg='';
if(isset($_FILES["file"]["name"])){
   $email = $_POST['email'];
    $name = $_POST['name'];
    $mobile = $_POST['mbl'];
    $qualification = $_POST['qual'];
  $link = $_POST['link'];
    $message = $_POST['message'];
$fromemail =  $email;
$subject="Uploaded file attachment";
$email_message = '<h2>Career Request Submitted From AJPL</h2>
                    <p><b>Name:</b> '.$name.'</p>
                    <p><b>Email:</b> '.$email.'</p>
                    <p><b>Mobile:</b> '.$mobile.'</p>
                    <p><b>Qualification:</b> '.$qualification.'</p>
                    <p><b>Linkedin Link:</b> '.$link.'</p>
                    <p><b>Message:</b><br/>'.$message.'</p>';
$email_message.="Please find the attachment";
$semi_rand = md5(uniqid(time()));
$headers = "From: ".$fromemail;
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
 
    $headers .= "\nMIME-Version: 1.0\n" .
    "Content-Type: multipart/mixed;\n" .
    " boundary=\"{$mime_boundary}\"";
 
if($_FILES["file"]["name"]!= ""){  
	$strFilesName = $_FILES["file"]["name"];  
	$strContent = chunk_split(base64_encode(file_get_contents($_FILES["file"]["tmp_name"])));  
	
	
    $email_message .= "This is a multi-part message in MIME format.\n\n" .
    "--{$mime_boundary}\n" .
    "Content-Type:text/html; charset=\"iso-8859-1\"\n" .
    "Content-Transfer-Encoding: 7bit\n\n" .
    $email_message .= "\n\n";
 
 
    $email_message .= "--{$mime_boundary}\n" .
    "Content-Type: application/octet-stream;\n" .
    " name=\"{$strFilesName}\"\n" .
    //"Content-Disposition: attachment;\n" .
    //" filename=\"{$fileatt_name}\"\n" .
    "Content-Transfer-Encoding: base64\n\n" .
    $strContent  .= "\n\n" .
    "--{$mime_boundary}--\n";
}
$toemail="pranatipriyambadamohanty@gmail.com , singhswagatika23@gmail.com";	
 
if(mail($toemail, $subject, $email_message, $headers)){
  
         echo   "mail sent"; 
        }else{
          echo  "error";
        }
}
   ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head> 

  <title>Career || Arundhati jewellers</title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- Font -->
  <link rel="stylesheet" href="fonts/fonts.css" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="stylesheets/bootstrap.min.css" />

  <!-- swiper slider -->
  <link rel="stylesheet" href="stylesheets/swiper-bundle.min.css" />

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <!-- Theme Style -->
  <link rel="stylesheet" type="text/css" href="stylesheets/shortcodes.css" />
  <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
  <link rel="stylesheet" type="text/css" href="stylesheets/jquery.fancybox.min.css">

  <!-- Favicon and Touch Icons  -->
  <!--<link rel="shortcut icon" href="images/favicon.png">-->
  <!--<link rel="apple-touch-icon-precomposed" href="images/favicon.png">-->
  <!-- Colors -->
  <link rel="stylesheet" type="text/css" href="stylesheets/colors/color1.css" id="colors">
  <!-- Responsive -->
  <link rel="stylesheet" type="text/css" href="stylesheets/responsive.css" />

</head>

<body>
  <a id="scroll-top" ></a>

      <!-- popup apply job -->
      <div class="wd-popup-job-apply">
        <div class="modal-menu__backdrop"></div>
        <div class="content">
            <h6>Apply For This Job</h6>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden">
                <label class="label-text">Name<span>*</span></label>
                <input type="text" placeholder="Name" name="name" value="" required>
                <label class="label-text">Mobile<span>*</span></label>
                <input type="text" placeholder="Mobile" name="mbl" value="" required>
                <label class="label-text">Email<span>*</span></label>
                <input type="email" placeholder="Email" name="email" value="" required>
                <label class="label-text">Qualification<span>*</span></label>
                <input type="text" placeholder="Qualification" name="qual" value="" required>
                <label class="label-text">Upload Your CV<span>*</span></label>
                <div class="group-seclect-file">
                    <div class="group-file">
                      <div class="inner center">
                        <input class="custom-file" type="file" name="file" value="" required="">
                        <i class="icon-file-pdf"></i>
                      </div>
                    </div>
                </div>
                <label class="label-text">Linkedin Profile<span>*</span></label>
                <input type="text" name="link" value="" placeholder="share your linkedin profile link" required>
              <textarea placeholder="Message" name="message"></textarea>
              <input type="submit" name="submit" value="submit Your Resume">
              
            </form>
        </div>
    </div>
<!-- end -->
  <div class="menu-mobile-popup">
    <div class="modal-menu__backdrop"></div>
    <div class="widget-filter">

      <div class="mobile-header">
        <div id="logo" class="logo">
          <a href="https://arundhatijewellers.com">
            <img class="site-logo"  src="https://arundhatijewellers.com/assets/img/hero/Logo.png" alt="Image" style="width:70px;"/>
          </a>
        </div>
      <a class="title-button-group"><i class="icon-close"></i></a>

      </div>

      <div class="tf-tab">
          <div class="content-tab">        
          </div>
      </div>
 
        

      <div class="header-customize-item button">
        <a href="#">Whatsapp Now</a>
      </div>

      <div class="mobile-footer">
        <div class="icon-infor d-flex aln-center">
          <div class="icon">
              <span class="icon-call-calling"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
          </div>
          <div class="content">
              <p>Need help?</p>
              <h6><a href="tel:1800 345 0018 ">1800 345 0018</a></h6>
          </div>
      </div>
        <div class="wd-social d-flex aln-center">
          <ul class="list-social d-flex aln-center">
              <li><a href="#"><i class="icon-facebook"></i></a></li>
              <li><a href="#"><i class="icon-linkedin2"></i></a></li>
              <li><a href="#"><i class="icon-twitter"></i></a></li>
              <li><a href="#"><i class="icon-instagram1"></i></a></li>
              <li><a href="#"><i class="icon-youtube"></i></a></li>
          </ul>
      </div>
      </div>
    </div>
    
  </div>

   <!-- Boxed -->
   <div class="boxed"> 
  <!-- HEADER -->
  <header id="header" class="header header-default">
    <div class="tf-container ct2">
      <div class="row">
        <div class="col-md-12">
          <div class="sticky-area-wrap">
            <div class="header-ct-left">
              <div id="logo" class="logo">
                <a href="https://arundhatijewellers.com">
                  <img class="site-logo" src="https://arundhatijewellers.com/assets/img/hero/Logo.png" alt="Image" style="width:110px;"/>

                </a>
              </div>
             
            </div>
            <div class="header-ct-center">
              <div class="nav-wrap">
                <nav id="main-nav" class="main-nav">
                  <ul id="menu-primary-menu" class="menu">
                    <!-- <li class="menu-item menu-item-has-children">
                      <a href="#">Home </a>
                    </li> -->
                  </ul>
                </nav>
              </div>
            </div>
            <div class="header-ct-right">
              <div class="header-customize-item help">
                <a href="#"><img src="https://www.freeiconspng.com/thumbs/phone-icon/phone-icon-clip-art--royalty--7.png" style="height:30px;"></a>
              </div>
              <div class="header-customize-item help">
                <a href=""><img src="https://assets.stickpng.com/images/58485698e0bb315b0f7675a8.png" style="height:30px;"></a>
              </div>
              <div class="header-customize-item button">
                <a href="career-list.php">Back To Career Page</a>
              </div>
            </div>
            <div class="nav-filter">
              <div class="nav-mobile"><span></span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- END HEADER -->

  <section class="single-job-thumb">
          <img src="images/review/singlejob.jpg" alt="images">
  </section>

  <section class="form-sticky fixed-space">
    <div class="tf-container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wd-job-author2">
            <div class="content-left">
              <div class="thumb">
                <img src="https://www.pngall.com/wp-content/uploads/5/Profile-Male-PNG.png" alt="logo">
              </div>
              <div class="content">
                <a href="#" class="category">Arundhati Jewellers Pvt. Ltd</a>
                <h6><a href="#">IT Manager<span class="icon-bolt"></span></a></h6>
                <ul class="job-info">
                  <li><span class="icon-map-pin"></span>
                    <span>Bhubaneswar , Odisha</span></li>
                    <li><span class="icon-calendar"></span>
                      <span>1 days ago</span></li>
                </ul>
                <ul class="tags">
                  <li><a href="#">Full-time</a></li>
                  <li><a href="#">Odisha</a></li>
                </ul>
              </div>
            </div>
            <div class="content-right">
              <div class="top">
                <a href="#" class="share"><i class="icon-share2"></i></a>
                <a href="#" class="wishlist"><i class="icon-heart"></i></a>
                <a class="btn" href="https://arundhatijewellers.com/shop/career/"><i class="icon-send"></i>Apply Now</a>
              </div>
              <div class="bottom">

                <div class="gr-rating">
                  <p>32 days left to apply</p>
                  <ul class="list-star">
                    <li class="icon-star-full"></li>
                    <li class="icon-star-full"></li>
                    <li class="icon-star-full"></li>
                    <li class="icon-star-full"></li>
                    <li class="icon-star-full"></li>
                  </ul>
                </div>
                <div class="price">
                  <span class="icon-dollar"></span>
                  <!-- <p>$83,000 - $110,000 <span class="year">/year</span></p> -->
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="inner-jobs-section">
    <div class="tf-container">
      <div class="row">
        <div class="col-lg-8">
          <article class="job-article tf-tab single-job">
            <ul class="menu-tab">
              <li class="ct-tab active">About</li>
            </ul>
            <div class="content-tab">
              <div class="inner-content">
                <h5>Company Overview</h5>
                <p>Arundhati jewellers Pvt. Ltd. is a highly committed team of over 500 employees in seven 
                  different cities of Odisha are working round the clock to create golden smiles to more 
                  than two million satisfied customers. Arundhati Jewellers is known for artistic designs 
                  and timeless aesthetics. 
                </p>
                <p class="mg-19">Arundhati Jewellers is the first jeweler retailer to be awarded in western
                   Odisha with the prestigious ISO 9001:2008 certifications, Life member of Gems and 
                   Jeweler Federation, Business Excellence award followed by a series of achievements, 
                   rewards and recognitions.
                </p>
                <h6>ABOUT ROLE & RESPONSIBILITIES:</h6>
                <ul class="list-dot">
                  <li> Devising and establishing IT policies and systems to support the implementation of strategies set by top management.</li>
                  <li> Oversee all technology operations (e.g. network security, Email Server, Data Security) and evaluate them according to established goals.</li>
                  <li> Analyse the business requirements of all departments to determine their technology needs.	</li>
                  <li> Inspect the use of technological equipment and software to ensure functionality and efficiency.</li>
                  <li> Assist in building relationships with vendors and creating cost-efficient contracts.</li>
                  <li> Served as a communication bridge between top management, business units, and IT and hereof provided independent advice on key decision making and issue resolution. </li>
                  <li> Advised on critical decisions regarding managing IT project portfolio as a whole and specific key IT projects. </li>
                  <li> Running regular checks on network and data security.</li>
                  <li> Identifying and acting on opportunities to improve and update software and systems.</li>
                  <li> Developing and implementing IT policy and best practice guides for the organisation.</li>
                  <li>Conducting regular system audits.</li>
                  <li>Running and sharing regular operation system reports with seniors.</li>
                  <li>Overseeing and determining timeframes for major IT projects including system updates, upgrades, migrations and outages.</li>
                  <li>Managing and reporting on allocation of IT budget.t.</li>
                  <li>Providing direction for IT team members.</li>
                  <li>Identifying opportunities for team training and skills advancement.</li>
                  <li>Deploying ERP solutions and ensuring seamless system integration.</li>
                  <li>Running diagnostic tests and resolving issues to enhance performance.</li>
                  <li>Providing ERP end-user training and technical support.</li>
                  <li>Documenting ERP processes and preparing deployment progress updates.</li>
                </ul>
                <h6>QUALIFICATION :</h6>
                <ul class="list-dot mg-bt-15">
                  <li>Basic academic Qualification BCA, BSC-IT, B. Tech, MCA.</li>
                  <li>Candidates with minimum 3 Years’ Experience in the Jewellery & Retail Industry.</li>
                  <li>Proficient in functional accounting software, ERP, Oracle, SQL Data Structure.</li>
                  <li>Strong attention to detail and accuracy.</li>
                  <li>Excellent communication and interpersonal skills.</li>
                  <li>Ability to work independently and as part of a team.</li>
                  <li>Strong organizational and time management skills.</li>
                </ul>
               
                <div class="post-navigation d-flex aln-center">
              </div>
            </div>
          </article>
        </div>
        <div class="col-lg-4">
          <div class="cv-form-details po-sticky job-sg">
            <div class="map-content">
      
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3743.006579477663!2d85.83723771491987!3d20.258561886420644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a19a7481b75e527%3A0xd2c044abea9d064e!2sArundhati%20Corporate%20Office!5e0!3m2!1sen!2sin!4v1688113369439!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              
          </div>
          <h6>Contact Details</h6>
            <ul class="list-infor">
              <li><div class="category">Website</div><div class="detail"><a href="#">arundhatijewellers.com</a></div></li>
              <li><div class="category">Email</div><div class="detail">hr@arundhatijewellers.com</div></li>
              <li><div class="category">Human Resource</div><div class="detail">Shyam Sundar Mahapatra</div></li>
              <li><div class="category">Address</div><div class="detail">6th Floor, Odisha Co-operative Housing Building, Janpath Rd, near Ram Mandir, UNIT- 9 , Bhubaneswar</div></li>
              <li><div class="category">Mobile No</div><div class="detail">7682845529</div></li>
            </ul>
            
            <div class="wd-social d-flex aln-center">
              <span>Socials:</span>
              <ul class="list-social d-flex aln-center">
                  <li><a href="#"><i class="icon-facebook"></i></a></li>
                  <li><a href="#"><i class="icon-linkedin2"></i></a></li>
                  <li><a href="#"><i class="icon-twitter"></i></a></li>
                  <li><a href="#"><i class="icon-instagram1"></i></a></li>
                  <li><a href="#"><i class="icon-youtube"></i></a></li>
              </ul>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer" style="padding-top: 0px!important;background-color:#f06292;">
    <div class="bottom">
        <div class="tf-container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="bt-left">
                        <div class="copyright text-light">©2023 Arundhati Jewellers Pvt.Ltd. All Rights Reserved.</div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <ul class="menu-bottom d-flex aln-center">
                        <li><a href="#" class="text-light">Terms & Conditions</a> </li>
                        <li><a href="#" class="text-light">Privacy Policy</a> </li>
                        <li><a href="#" class="text-light">Sitemap</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  </footer>
  
  </div><!-- /.boxed --> 



<script src="javascript/jquery.min.js"></script>
<script src="javascript/swiper-bundle.min.js"></script>
<script src="javascript/bootstrap.min.js"></script>
<script src="javascript/jquery.fancybox.js"></script>
<script src="javascript/plugin.min.js"></script>
<script src='javascript/wow.min.js'></script>
<script src='javascript/swiper.js'></script>
<script src='javascript/jquery.nice-select.min.js'></script>
<script src="javascript/jquery.cookie.js"></script>
<script src="javascript/main.js"></script>
</body>
</html>