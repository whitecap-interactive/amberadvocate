<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package amberadvocate
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="content-channel channel-padding">

				<?php
				if ( have_posts() ) : ?>

					<header class="entry-header green">
						<h1>Partner Resources</h1>
						<?php
							//the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->
					<table id="partner-table" class="partner-table">
					    <tr>
					        <th><input type="text" id="partner-name-search" onkeyup="partnerSearch('name')" placeholder="Search for Doc Name" title="Type in a name"></th>
					        <th>
					            <select id="partner-state-search" onchange="partnerSearch('state')">
					                <option value="">Select a State</option>
					                <option value="AL">Alabama</option>
					                <option value="AK">Alaska</option>
					                <option value="AZ">Arizona</option>
					                <option value="AR">Arkansas</option>
					                <option value="CA">California</option>
					                <option value="CO">Colorado</option>
					                <option value="CT">Connecticut</option>
					                <option value="DE">Delaware</option>
					                <option value="DC">District Of Columbia</option>
					                <option value="FL">Florida</option>
					                <option value="GA">Georgia</option>
					                <option value="HI">Hawaii</option>
					                <option value="ID">Idaho</option>
					                <option value="IL">Illinois</option>
					                <option value="IN">Indiana</option>
					                <option value="IA">Iowa</option>
					                <option value="KS">Kansas</option>
					                <option value="KY">Kentucky</option>
					                <option value="LA">Louisiana</option>
					                <option value="ME">Maine</option>
					                <option value="MD">Maryland</option>
					                <option value="MA">Massachusetts</option>
					                <option value="MI">Michigan</option>
					                <option value="MN">Minnesota</option>
					                <option value="MS">Mississippi</option>
					                <option value="MO">Missouri</option>
					                <option value="MT">Montana</option>
					                <option value="NE">Nebraska</option>
					                <option value="NV">Nevada</option>
					                <option value="NH">New Hampshire</option>
					                <option value="NJ">New Jersey</option>
					                <option value="NM">New Mexico</option>
					                <option value="NY">New York</option>
					                <option value="NC">North Carolina</option>
					                <option value="ND">North Dakota</option>
					                <option value="OH">Ohio</option>
					                <option value="OK">Oklahoma</option>
					                <option value="OR">Oregon</option>
					                <option value="PA">Pennsylvania</option>
					                <option value="RI">Rhode Island</option>
					                <option value="SC">South Carolina</option>
					                <option value="SD">South Dakota</option>
					                <option value="TN">Tennessee</option>
					                <option value="TX">Texas</option>
					                <option value="UT">Utah</option>
					                <option value="VT">Vermont</option>
					                <option value="VA">Virginia</option>
					                <option value="WA">Washington</option>
					                <option value="WV">West Virginia</option>
					                <option value="WI">Wisconsin</option>
					                <option value="WY">Wyoming</option>
					            </select>	                                          
					        </th>
					        <th>
					            <select id="partner-region-search" onchange="partnerSearch('region')">
					                <option value="">Region</option>
					                <option value="1">1</option>
					                <option value="2">2</option>
					                <option value="3">3</option>
					                <option value="4">4</option>
					                <option value="5">5</option>
					                <option value="na">N/A</option>
					            </select>
					        </th>
					        <th>
					        	Upload Date
					        </th>
					        <th>
					        	Submitted By
					        </th>
					    </tr>
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'partner-resources' );

						endwhile;
						?>
					</table>
					<?php
					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
