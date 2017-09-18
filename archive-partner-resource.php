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

			

 
				<?php

				if ( have_posts() ) : ?>

					<header class="post-entry-header green">
						<h1>Partner Resources</h1>
						<?php
							//the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->
					
					<div class="content-channel channel-padding">

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'partner-resources' );

						endwhile;
						?>
					
					<?php
					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
				<?php

					/*Create our own loop after the real loop so we can sort by User Meta State Name*/
					$args = array( 'post_type' => 'partner-resource');

					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
					 
					 	$files[] = rwmb_meta( 'amber_file_advanced',  $post_id = get_the_ID() );
					 	
						if ( !empty( $files ) ) {

			        		$doc_state = rwmb_meta( 'amber_state_select',  $post_id = $files["ID"] ); 
				        	//echo $doc_state . '<br/>';
				        	$doc_region = rwmb_meta( 'amber_region_select',  $post_id = $files["ID"] );
				        	$doc_topic = rwmb_meta( 'amber_topic_select',  $post_id = $files["ID"] );
				        	$doc_date = rwmb_meta( 'amber_submitted_date',  $post_id = $files["ID"] );
				        	$doc_submitter = rwmb_meta( 'amber_uploaded_by_text',  $post_id = $files["ID"] ); 
				        	$doc_url_array = rwmb_meta( 'amber_file_advanced' );
				        	$document_id = $files["ID"];
				        	foreach ( $doc_url_array as $docs ) {
						        $doc_url = $docs['url'];
						    }
							$title = get_the_title();
						}

						$docArray[] = array("state"=>$doc_state,"region"=>$doc_region, "topic"=>$doc_topic, "url"=>$doc_url, "date"=>$doc_date, "submitter"=>$doc_submitter, "title"=>$title);	
					endwhile;

					/*echo '<pre>';
					var_dump($files);
					echo '</pre>';*/
					usort($docArray, create_function('$a, $b', 'return strnatcasecmp($a["state"], $b["state"]);'));
					/*echo '<pre>';
					var_dump($docArray);
					echo '</pre>';*/
					?>
					<table id="partner-table" class="partner-table">				    
						<tr>
					    	<th>
					    		<button id="reset-button"><i class="fa fa-refresh" aria-hidden="true"></i></button>
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
					        <th class="partner-state-header">
					            <select id="partner-state-search" onchange="partnerSearch('state')">
					                <option value="">Select a State</option>
					                <option value="AMBER Alert Staff/Associates">AMBER Alert Staff/Associates</option>
									<option value="Internation Centre for Missing and Exploited Children">Internation Centre for Missing and Exploited Children</option>
									<option value="National Criminal Justice Training Center Staff/Associates">National Criminal Justice Training Center Staff/Associates</option>
									<option value="National Center for Missing and Exploited Children">National Center for Missing and Exploited Children</option>
									<option value="US Department of Justice Officials/Staff">US Department of Justice Officials/Staff</option>
									<option value="Alabama">Alabama</option>
									<option value="Alaska">Alaska</option>
									<option value="American Samoa">American Samoa</option>
									<option value="Arizona">Arizona</option>
									<option value="Arkansas">Arkansas</option>
									<option value="California">California</option>
									<option value="Colorado">Colorado</option>
									<option value="Connecticut">Connecticut</option>
									<option value="Delaware">Delaware</option>
									<option value="District of Columbia">District of Columbia</option>
									<option value="Federated States of Micronesia">Federated States of Micronesia</option>
									<option value="Florida">Florida</option>
									<option value="Georgia">Georgia</option>
									<option value="Guam">Guam</option>
									<option value="Hawaii">Hawaii</option>
									<option value="Idaho">Idaho</option>
									<option value="Illinois">Illinois</option>
									<option value="Indiana">Indiana</option>
									<option value="Iowa">Iowa</option>
									<option value="Kansas">Kansas</option>
									<option value="Kentucky">Kentucky</option>
									<option value="Louisiana">Louisiana</option>
									<option value="Maine">Maine</option>
									<option value="Marshall Islands">Marshall Islands</option>
									<option value="Maryland">Maryland</option>
									<option value="Massachusetts">Massachusetts</option>
									<option value="Michigan">Michigan</option>
									<option value="Minnesota">Minnesota</option>
									<option value="Mississippi">Mississippi</option>
									<option value="Missouri">Missouri</option>
									<option value="Montana">Montana</option>
									<option value="Nebraska">Nebraska</option>
									<option value="Nevada">Nevada</option>
									<option value="New Hampshire">New Hampshire</option>
									<option value="New Jersey">New Jersey</option>
									<option value="New Mexico">New Mexico</option>
									<option value="New York">New York</option>
									<option value="North Carolina">North Carolina</option>
									<option value="North Dakota">North Dakota</option>
									<option value="Northern Mariana Islands">Northern Mariana Islands</option>
									<option value="Ohio">Ohio</option>
									<option value="Oklahoma">Oklahoma</option>
									<option value="Oregon">Oregon</option>
									<option value="Palau">Palau</option>
									<option value="Pennsylvania">Pennsylvania</option>
									<option value="Puerto Rico">Puerto Rico</option>
									<option value="Rhode Island">Rhode Island</option>
									<option value="South Carolina">South Carolina</option>
									<option value="South Dakota">South Dakota</option>
									<option value="Tennessee">Tennessee</option>
									<option value="Texas">Texas</option>
									<option value="Utah">Utah</option>
									<option value="Vermont">Vermont</option>
									<option value="Virgin Islands">Virgin Islands</option>
									<option value="Virginia">Virginia</option>
									<option value="Washington">Washington</option>
									<option value="West Virginia">West Virginia</option>
									<option value="Wisconsin">Wisconsin</option>
									<option value="Wyoming">Wyoming</option>
									<option value="Alberta">Alberta</option>
									<option value="British Columbia">British Columbia</option>
									<option value="Manitoba">Manitoba</option>
									<option value="New Brunswick">New Brunswick</option>
									<option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
									<option value="Nova Scotia">Nova Scotia</option>
									<option value="Northwest Territories">Northwest Territories</option>
									<option value="Nunavut">Nunavut</option>
									<option value="Ontario">Ontario</option>
									<option value="Prince Edward Island">Prince Edward Island</option>
									<option value="Quebec">Quebec</option>
									<option value="Saskatchewan">Saskatchewan</option>
									<option value="Yukon">Yukon</option>
									<option value="Aguascalientes">Aguascalientes</option>
									<option value="Baja California">Baja California</option>
									<option value="Baja California Sur">Baja California Sur</option>
									<option value="Campeche">Campeche</option>
									<option value="Chiapas">Chiapas</option>
									<option value="Chihuahua">Chihuahua</option>
									<option value="Coahuila">Coahuila</option>
									<option value="Colima">Colima</option>
									<option value="Mexico City">Mexico City</option>
									<option value="Durango">Durango</option>
									<option value="Guanajuato">Guanajuato</option>
									<option value="Guerrero">Guerrero</option>
									<option value="Hidalgo">Hidalgo</option>
									<option value="Jalisco">Jalisco</option>
									<option value="México">México</option>
									<option value="Michoacán">Michoacán</option>
									<option value="Morelos">Morelos</option>
									<option value="Nayarit">Nayarit</option>
									<option value="Nuevo León">Nuevo León</option>
									<option value="Oaxaca">Oaxaca</option>
									<option value="Puebla">Puebla</option>
									<option value="Querétaro">Querétaro</option>
									<option value="Quintana Roo">Quintana Roo</option>
									<option value="San Luis Potosí">San Luis Potosí</option>
									<option value="Sinaloa">Sinaloa</option>
									<option value="Sonora">Sonora</option>
									<option value="Tabasco">Tabasco</option>
									<option value="Tamaulipas">Tamaulipas</option>
									<option value="Tlaxcala">Tlaxcala</option>
									<option value="Veracruz">Veracruz</option>
									<option value="Yucatán">Yucatán</option>
									<option value="Zacateca">Zacateca</option>
					            </select>	                                          
					        </th>
					        <th>
					        	<select id="partner-topic-search" onchange="partnerSearch('topic')">
					                <option value="">Topic</option>
					                <option value="AMBER Alert Plan">AMBER Alert Plan</option>
					                <option value="Operational Checklist or Tool">Operational Checklist or Tool</option>
					                <option value="Program Publication">Program Publication</option>
					                <option value="Map or Diagram">Map or Diagram</option>
					                <option value="Model Policy or Procedure">Model Policy or Procedure</option>
					                <option value="Other">Other</option>
					            </select>
					        </th>
					        <th>
					        	<input type="text" id="partner-name-search" onkeyup="partnerSearch('name')" placeholder="Search for Doc Name" title="Type in a name">
					        </th>
					        <th>
					        	Upload Date
					        </th>
					        <th>
					        	Submitted By
					        </th>
					    </tr>
					    <?php

							if ($docArray) {
								foreach ($docArray as $doc) {
									echo '<tr>';
									echo '<td></td>';
									echo '<td class="partner-region">';
									echo $doc['region'];
									echo '</td>';
									echo '<td class="partner-state">';
									echo $doc['state'];
									echo '</td>';
									echo '<td class="partner-topic">';
									echo $doc['topic'];
									echo '</td>';
									echo '<td class="partner-name"><a target="_blank" href="' . esc_url( $doc['url'] ) . '" rel="bookmark">' . $doc['title'] . '</a></td>';
									echo '<td>';
									echo $doc['date'];
									echo '</td>';
									echo '<td>';
									echo $doc['submitter'];
									echo '</td>';
									echo '</tr>';
								}
								
								
							}else{
								the_title( '<tr><td>', ' - No Attachment Found</td></tr>' );
							}
			    		?>
			  		</table> 
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_sidebar('questions');
get_footer();
