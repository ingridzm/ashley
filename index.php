
<?php
//If the form is submitted
if(isset($_POST['submit'])) {

	//Check to make sure that the name field is not empty
	if(trim($_POST['contactname']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['contactname']);
	}

	//Check to make sure that the phone field is not empty
	if(trim($_POST['phone']) == '') {
		$hasError = true;
	} else {
		$phone = trim($_POST['phone']);
	}

	//Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!filter_var( trim($_POST['email'], FILTER_VALIDATE_EMAIL ))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	//Check to make sure comments were entered
	if(trim($_POST['message']) == '') {
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['message']));
		} else {
			$comments = trim($_POST['message']);
		}
	}

	//If there is no error, send the email
	if(!isset($hasError)) {
		$emailTo = 'laurieandingrid@xtra.co.nz'; // Put your own email address here
		$body = "Name: $name \n\nEmail: $email \n\nPhone Number: $phone \n\nComments:\n $comments";
		$headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
}
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<!--<!head-->
	<?php include("includes/head.inc.php");?>
<!--<!head end-->




	<body data-spy="scroll" data-target="#scrollTarget" data-offset="150">
		<!-- Primary Page Layout 
		================================================== -->
		<!-- globalWrapper -->
		<div id="globalWrapper" class="localscroll">

			<!--<!head-->
				<?php include("includes/nav.inc.php");?>
			<!--<!head end-->


			<!--<!slider-->
				<?php include("includes/slider.inc.php");?>
			<!--<!slider end-->
			
				
				

				<!--<!works-->
				<?php include("includes/works.inc.php");?>
			<!--<!works end-->


			<!--<!services-->
				<?php include("includes/services.inc.php");?>
				<!--<!services end-->



				<!-- about-->	
					<?php include("includes/about.inc.php");?>
				<!-- about end-->	
				

				
								
			<!-- banner -->	
				<div id="paralaxSlice1" data-stellar-background-ratio="0.5">
					<div class="maskParent">
						<div class="paralaxMask"></div>
						<div class="paralaxText container">
							<i class="icon-megaphone "></i>
							<blockquote class="bigTitle">I will never stop learning or having curiousity<br/>
								<small></small></blockquote>
						</div>
					</div>
				</div>



				



					<section class="slice"  id="contactSlice" >
						<div class="container">
							<div class="row">

							<div class="col-sm-12">
								<h1>Contact</h1>
								 <h2 class="subTitle">I am keen to get industry experience and work with a great team. Can you help?</h2>
							</div>
							
								<div class="col-sm-6 address">
									<h4>Address:</h4>
									<address>
										200 Howard Road<br/>
										RD5 Papakura<br/>
										Auckland 2585<br/>
									</address>
									<h4>Phone:</h4>
									<address>
										027 292 2905<br/>
									</address>
								</div>
								
    <div class="row">
     <div class="col-sm-6 address">
        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform">
          <fieldset>
            <legend>Send Me a Message</legend>

            <?php if(isset($hasError)) { //If errors are found ?>
              <p class="alert alert-danger">Please check if you've filled all the fields with valid information and try again. Thank you.</p>
            <?php } ?>

            <?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
              <div class="alert alert-success">
                <p><strong>Message Successfully Sent!</strong></p>
                <p>Thank you for using our contact form, <strong><?php echo $name;?></strong>! Your email was successfully sent and we&rsquo;ll be in touch with you soon.</p>
              </div>
            <?php } ?>

            <div class="form-group">
              <label for="name">Your Name<span class="help-required">*</span></label>
              <input type="text" name="contactname" id="contactname" value="" class="form-control required" role="input" aria-required="true" />
            </div>

            <div class="form-group">
              <label for="phone">Your Phone Number<span class="help-required">*</span></label>
              <input type="text" name="phone" id="phone" value="" class="form-control required" role="input" aria-required="true" />
            </div>


            <div class="form-group">
              <label for="email">Your Email<span class="help-required">*</span></label>
              <input type="text" name="email" id="email" value="" class="form-control required email" role="input" aria-required="true" />
            </div>

    


            

            <div class="form-group">
              <label for="message">Message<span class="help-required">*</span></label>
              <textarea rows="8" name="message" id="message" class="form-control required" role="textbox" aria-required="true"></textarea>
            </div>

            <div class="actions">
              <input type="submit" value="Send" name="submit" id="submitButton" class="btn btn-primary" title="Click here to submit your message!" />
              <input type="reset" value="Clear Form" class="btn btn-danger" title="Remove all the data from the form." />
            </div>
          </fieldset>
        </form>
      </div><!-- col -->
    </div><!-- row -->
							</div>
						</div>
					</section>


					<!-- content -->
					<footer>
						<p></p>
					</footer>

					</div>
					<!-- global wrapper -->
		<!-- End Document 
		================================================== -->
		<script type="text/javascript" src="js-plugin/respond/respond.min.js"></script>
		<script type="text/javascript" src="js-plugin/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript" src="js-plugin/jquery-ui/jquery-ui-1.8.23.custom.min.js"></script>
		<!-- third party plugins  -->
		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="js-plugin/easing/jquery.easing.1.3.js"></script>

		<script type="text/javascript" src="js-plugin/flexslider/jquery.flexslider-min.js"></script>

		<script type="text/javascript" src="js-plugin/isotope/jquery.isotope.min.js"></script>
		
		<script type="text/javascript" src="js-plugin/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script type="text/javascript" src="js-plugin/parallax/js/jquery.scrollTo-1.4.3.1-min.js"></script>
		<script type="text/javascript" src="js-plugin/parallax/js/jquery.localscroll-1.2.7-min.js"></script>
		<script type="text/javascript" src="js-plugin/parallax/js/jquery.stellar.min.js"></script>
		<!-- <script type="text/javascript" src="js-plugin/smoothscroll/SmoothScroll.js"></script> -->
		<script type="text/javascript" src="js-plugin/pageSlide/jquery.pageslide-custom.js"></script>
		<script type="text/javascript" src="js-plugin/jquery.sharrre-1.3.4/jquery.sharrre-1.3.4.min.js"></script>
		<script type="text/javascript" src="js-plugin/owl.carousel/owl-carousel/owl.carousel.min.js"></script>
<!--contact form-->

		
		<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.pack.js" type="text/javascript"></script>
		<script src="js/bootstrap-contact.js" type="text/javascript"></script>

		<!-- Custom  -->
		<script type="text/javascript" src="js/custom.js"></script>
	</body>
	</html>
