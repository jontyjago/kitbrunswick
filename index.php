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
				$contact_subtitle = stripslashes(get_option('contact-subtitle'));
				$contact_id = stripslashes(get_option('contact-id'));
				$skills_id = stripslashes(get_option('skills-id'));
				$about_id = stripslashes(get_option('about-id'));

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
								<?php
									// We only want the about page here, so use the about_id to get the page_id
									$query = new WP_Query( 'page_id='.$about_id );
									if ( $query -> have_posts() ) :

										/* Start the Loop */
										while ( $query -> have_posts() ) : $query -> the_post();

											get_template_part( 'content-about', get_post_format() );

										endwhile;
									endif;
								?>
								<p>&quot;<strong><i>I hated every minute of training, but I said, &apos;Don&apos;t quit. Suffer now and live the rest of your life as a champion.&apos; </i></strong>&quot; - Muhammad Ali
							</div>
						</section>
						
					<!-- Two -->
						<section id="two">
							<div class="container">

								<?php
									// We only want the skills page here, so use the skills_id to get the page_id
									$query = new WP_Query( 'page_id='.$skills_id );
									if ( $query -> have_posts() ) :

										/* Start the Loop */
										while ( $query -> have_posts() ) : $query -> the_post();

											get_template_part( 'content-skills', get_post_format() );

										endwhile;
									endif;
								?>
								
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
								<p><?php echo $contact_subtitle; ?></p>
								
								<?php
									// We only want the contact page here, so use the contact_id to get the page_id
									$query = new WP_Query( 'page_id='.$contact_id );
									if ( $query -> have_posts() ) :

										/* Start the Loop */
										while ( $query -> have_posts() ) : $query -> the_post();

											get_template_part( 'content-contact', get_post_format() );

										endwhile;
									endif;
								?>


							</div>
						</section>
				</div>
<!-- call footer.php which is all the footer stuff, believe it or not -->
<?php get_footer(); ?>