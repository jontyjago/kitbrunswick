<!-- call header.php which contains everything above the body tag -->
<?php get_header(); ?>

	<body>
		<div id="wrapper">

			<?php
				// the get_option function returns the values we enter in KB Options
				// the variable can then be used where needed thoughout the page
				$tagline = stripslashes(get_option('tagline'));
				$about = stripslashes(get_option('about-title'));
				$skills = stripslashes(get_option('skills-title'));
				$testimonial = stripslashes(get_option('testimonial-title'));
				$accomplishments = stripslashes(get_option('accomplishments-title'));
				$contact = stripslashes(get_option('contact-title'));
			?>

			<!-- Header -->
				<section id="header" class="skel-layers-fixed">
					<header>
						<span class="image avatar"><img src="<?php echo get_template_directory_uri() . '/images/kb.jpg';?>" alt="" /></span>
						<h1 id="logo"><a href="http://www.kitbrunswick.com">Kit Brunswick</a></h1>
						<p><?php echo $tagline; ?></p>
					</header>
					<nav id="nav">
						<ul>
							<li><a href="#one" class="active"><?php echo $about; ?></a></li>
							<li><a href="#two"><?php echo $skills; ?></a></li>
							<li><a href="#three"><?php echo $testimonial; ?></a></li>
							<li><a href="#four"><?php echo $accomplishments; ?></a></li>
							<li><a href="#five"><?php echo $contact; ?></a></li>
						</ul>
					</nav>
					<ul class="icons">
							<li><a href="http://www.twitter.com/KitBrunswick" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="http://www.facebook.com/kit.brunswick" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="http://uk.linkedin.com/pub/kit-brunswick/2b/33b/929" class="icon fa-linkedin-square"><span class="label">Linked In</span></a></li>
							<li><a href="#five" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul>
					<footer>
						<p>KitBrunswick.com</p>
					</footer>
				</section>

			<!-- Main -->
				<div id="main">

					<!-- One -->
						<section id="one">
							<div class="container">
								<header class="major">
									<h2><?php echo $about; ?></h2>
									<p>For as long as I can remember I have always been the obsessive competitor, the fanatic, the one who when told he can&apos;t, will ensure he will, be it with academic qualifications, leadership commitments or personal development.<br />
								</header>
								<p>I have long been drawn to better understand what makes people compete and what makes great sportsmen, great leaders and great people. How do you inspire ? How do you coach ? How do you bring out the best… in yourself and others ? Through active participation and study I’m working to understand how the psychology, the chemistry, the environment and the very fibres of people can be tuned and transformed to make people the very best they can be.</p>
								<p>&quot;<strong><i>I hated every minute of training, but I said, &apos;Don&apos;t quit. Suffer now and live the rest of your life as a champion.&apos; </i></strong>&quot; - Muhammad Ali
							</div>
						</section>
						
					<!-- Two -->
						<section id="two">
							<div class="container">
								<h3><?php echo $skills; ?></h3>
								<p>I am fascinated by everything to do with sport, sports performance, motivation, teams, leadership and bringing the best out in myself and others.<br>
								I am a <strong>registered Massage Therapist with an ITEC Level 3</strong> and have worked with both recreational and international athletes specialising in post injury rehabilitation methods.<br>
								If you&apos;re troubled by an injury or just stiffness and discomfort, I can help you get back on the track, field, court, dojo or even just back into the office, ensuring you&apos;re performing at your best.</p>
								<ul class="feature-icons">
									<li class="fa-wrench">Health &amp; Rehabilitation</li>
									<li class="fa-thumbs-up">Sports Massage</li>
									<li class="fa-trophy">Leadership &amp; Sport Education</li>
									<li class="fa-coffee">Nutrition</li>
									<li class="fa-bolt">Motivation</li>
									<li class="fa-users">Group &amp; 1-on-1 Training</li>
								</ul>
								&quot;<i>Individual commitment to a group effort - that is what makes a team work, a company work, a society work, a civilization work.</i>&quot; - <strong>Vince Lombardi</strong>
							</div>
						</section>

					<!-- Three -->
						<section id="three">
							<div class="container">
								<h3><?php echo $testimonial; ?></h3>
								<p>&quot;<i>The purpose of life is to contribute in some way to making things better.</i>&quot; - <strong>Robert F. Kennedy</strong></p>
								<p>Here&apos;s some feedback from some people with whom I have worked.</p>
								<div class="features">

								<?php
									// Here we trigger a new Wordpress query to return all records of
									// type Testimonial
									$args = array(
   										'post_type' => 'testimonial',
 									);

							 		$query = new WP_Query($args);

									if ( $query -> have_posts() ) :

										// Loop through the available records
										while ( $query -> have_posts() ) : $query -> the_post();

											// the HTML to show testimonials kept in a separate file
											get_template_part( 'content-testimonial', get_post_format() );

										endwhile;
									endif; ?>
								</div>
							</div>
						</section>
						

					<!-- Four -->
						<section id="four">
							<div class="container">
								<h3><?php echo $accomplishments; ?></h3>
								<p>&quot;<i>So early in my life, I had learned that if you want something, you had better make some noise.</i>&quot; - <strong>Malcolm X</strong></p>
								<div class="features">

								<?php
									// as per the Testimonial query and loop
									$args = array(
   										'post_type' => 'accomplishment',
 									);

							 		$query = new WP_Query($args);

									if ( $query -> have_posts() ) :

										/* Start the Loop */
										while ( $query -> have_posts() ) : $query -> the_post();

											get_template_part( 'content-accomplishment', get_post_format() );

										endwhile;
									endif; ?>

								</div>
							</div>
						</section>
						
					<!-- Five -->
						<section id="five">
							<div class="container">
								<h3><?php echo $contact; ?></h3>
								<p>I&apos;m happy to hear from anyone with similar interests or who would like to work with me to help them in the sport, their health or their everyday life. If you want to get in touch, please send me your details, together with any questions, via the message form below.</p>
								<form method="post" action="#">
									<div class="row uniform">
										<div class="6u 12u(3)"><input type="text" name="cf-name" id="cf-name" placeholder="Name" /></div>
										<div class="6u 12u(3)"><input type="email" name="cf-email" id="cf-email" placeholder="Email" /></div>
									</div>
									<div class="row uniform">
										<div class="12u"><input type="text" name="cf-subject" id="cf-subject" placeholder="Subject" /></div>
									</div>
									<div class="row uniform">
										<div class="12u"><textarea name="message" id="cf-message" placeholder="cf-Message" rows="6"></textarea></div>
									</div>
									<div class="row uniform">
										<div class="12u">
											<ul class="actions">
												<li><input type="submit" class="special" value="Send" /></li>
												<li><input type="reset" value="Reset" /></li>
											</ul>
										</div>
									</div>
								</form>
							</div>
						</section>
				</div>
<!-- call footer.php which is all the footer stuff, believe it or not -->
<?php get_footer(); ?>