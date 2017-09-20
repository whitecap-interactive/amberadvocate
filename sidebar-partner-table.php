<?php
/**
 * The Partner Portal List
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package amberadvocate
 */

?>
<div class="partner-table-container">
<table id="partner-table" class="partner-table">
    <thead><tr>
        <th class="name-search"><input type="text" id="partner-name-search" onkeyup="partnerSearch('name')" placeholder="Search for Partner Name" title="Type in a name"></th>
        <th class="role-select">
            <select id="partner-role-search" onchange="partnerSearch('role')">
                <option value="">Role</option>
                <option value="AAC and CHM">AAC and CHM</option>
                <option value="AAC">AAC</option>
                <option value="CHM">CHM</option>
                <option value="NCMEC">NCMEC</option>
                <option value="ICMEC">ICMEC</option>
                <option value="USDOJ">USDOJ</option>
                <option value="AA/NCJTC-STAFF">AA/NCJTC-STAFF</option>
                <option value="AA/NCJTC-ASSOC">AA/NCJTC-ASSOC</option>
                <option value="OTHER">OTHER</option>
            </select>
        </th>
        <th class="state-select">
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
        <!-- <th>
            <select id="partner-region-search" onchange="partnerSearch('region')">
                <option value="">Region</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="na">N/A</option>
            </select>
        </th> -->
    </tr></thead>
    <tbody>


<?php
	$partners = get_users( 'blog_id=1&role=partner&exclude=1' );
    usort($partners, create_function('$a, $b', 'return strnatcasecmp($a->last_name, $b->last_name);'));
    foreach ( $partners as $partner ) {
    	$partner_state_name = get_user_meta($partner->ID, 'state', true);

        $partner_role = get_user_meta($partner->ID, 'partner_role', true);

        if ($partner_role == 'AMBER Alert Coordinator/Co-Coordinator and Missing Person Clearinghouse Manager') { $partner_role_abbr = 'AAC and CHM'; }
        else if ($partner_role == 'AMBER Alert Coordinator/Co-Coordinator') { $partner_role_abbr = 'AAC'; }
        else if ($partner_role == 'Missing Person Clearinghouse Manager') { $partner_role_abbr = 'CHM'; }
        else if ($partner_role == 'NCMEC Partner') { $partner_role_abbr = 'NCMEC'; }
        else if ($partner_role == 'ICMEC Partner') { $partner_role_abbr = '(ICMEC)'; }
        else if ($partner_role == 'US-DOJ-OJJDP Partner') { $partner_role_abbr = 'USDOJ'; }
        else if ($partner_role == 'AATTAP-NCJTC Staff') { $partner_role_abbr = 'AA/NCJTC-STAFF'; }
        else if ($partner_role == 'AATTAP-NCJTC Associate') { $partner_role_abbr = 'AA/NCJTC-ASSOC'; }
        else if ($partner_role == 'OTHER-NCJTC Partner') { $partner_role_abbr = 'OTHER'; }
        else { $partner_role_abbr = ''; }


		if ( $post = get_page_by_path( $partner_state_name, OBJECT, 'state' ) ){
			$state_id = $post->ID;
		}    
		else{
			$state_id = 0;
		}	
		$region = rwmb_meta( 'amber_region', $args = array(), $state_id );
    	echo '<tr>' .
    		 '<td class="partner-name"><a href="' . get_author_posts_url( $partner->ID ) . '">' . $partner->user_firstname . ' ' . $partner->user_lastname . '</a></td>'.
    		 '<td class="partner-role">' . $partner_role_abbr . '</td>' .
             '<td class="partner-state"><a href="/states/' . $partner_state_name . '">' . $partner_state_name . '</a></td>' . 
    		 //'<td>State ID: ' . $state_id . '</td>' .
    		 // '<td class="partner-region">' . $region . '</td>' .
    		 '</tr>';
    }  
?>
</tbody>
</table>
</div>
