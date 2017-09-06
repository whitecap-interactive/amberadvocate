<?php
/**
 * The Partner Portal List
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package amberadvocate
 */

?>

<table id="partner-table" class="partner-table">
    <tr>
        <th><input type="text" id="partner-name-search" onkeyup="partnerSearch('name')" placeholder="Search for Partner Name" title="Type in a name"></th>
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
    </tr>


<?php
	$partners = get_users( 'blog_id=1&orderby=nicename' );
    foreach ( $partners as $partner ) {
    	$partner_state_name = get_user_meta($partner->ID, 'state', true);
		if ( $post = get_page_by_path( $partner_state_name, OBJECT, 'state' ) ){
			$state_id = $post->ID;
		}    
		else{
			$state_id = 0;
		}	
		$region = rwmb_meta( 'amber_region', $args = array(), $state_id );
    	echo '<tr>' .
    		 '<td class="partner-name"><a href="' . get_author_posts_url( $partner->ID ) . '">' . $partner->user_firstname . ' ' . $partner->user_lastname . '</a></td>'.
    		 '<td class="partner-state"><a href="/states/' . $partner_state_name . '">' . $partner_state_name . '</a></td>' . 
    		 //'<td>State ID: ' . $state_id . '</td>' .
    		 '<td class="partner-region">' . $region . '</td>' .
    		 '</tr>';
    }  
?>
</table>

