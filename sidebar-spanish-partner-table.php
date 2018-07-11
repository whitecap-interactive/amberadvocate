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
                <option value="CART">CART Program Member</option>
                <option value="NCMEC">NCMEC</option>
                <option value="ICMEC">ICMEC</option>
                <option value="International Partner-AMBER Alert/Missing Persons">International Partner-AMBER Alert/Missing Persons</option>
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
    </tr></thead>
    <tbody>










<?php
    /*Taken From Partner Resources*/
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




   






<?php
	/*$partners = get_users( 'blog_id=1&role=partner&exclude=1' );*/
    $partners = $docArray;
    usort($partners, create_function('$a, $b', 'return strnatcasecmp($a->last_name, $b->last_name);'));
    foreach ( $partners as $partner ) {
    	$partner_state_name = get_user_meta($partner->ID, 'state', true);

        $partner_role = get_user_meta($partner->ID, 'partner_role', true);

        if ($partner_role == 'AMBER Alert Coordinator/Co-Coordinator and Missing Person Clearinghouse Manager') { $partner_role_abbr = 'AAC and CHM'; }
        else if ($partner_role == 'AMBER Alert Coordinator/Co-Coordinator') { $partner_role_abbr = 'AAC'; }
        else if ($partner_role == 'Missing Person Clearinghouse Manager' || $partner_role == 'Missing Person Clearinghouse Manager/Coordinator') { $partner_role_abbr = 'CHM'; }
        else if ($partner_role == 'NCMEC Partner') { $partner_role_abbr = 'NCMEC'; }
        else if ($partner_role == 'ICMEC Partner') { $partner_role_abbr = '(ICMEC)'; }
        else if ($partner_role == 'International Partner-AMBER Alert/Missing Persons') { $partner_role_abbr = 'International Partner'; }
        else if ($partner_role == 'US-DOJ-OJJDP Partner') { $partner_role_abbr = 'USDOJ'; }
        else if ($partner_role == 'CART Program Member') { $partner_role_abbr = 'CART'; }
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
