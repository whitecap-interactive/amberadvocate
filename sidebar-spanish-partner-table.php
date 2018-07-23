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
            <!-- email column -->
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

    /*Create our own loop after the real loop so we can sort by User Meta State Name*/
    $args = array( 'post_type' => 'spanish-partner');

    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();

        //as of PHP 7 you can use
        //$var = $array["key"] ?? "default-value";
        // which is synonymous to:
        //$var = isset($array["key"]) ? $array["key"] : "default-value";
        //$ss_name = rwmb_meta( 'amber_ss_name_text' ) ?? "";
        $ss_id = get_the_ID();
        $ss_name = get_the_title();
        $ss_email = rwmb_meta( 'amber_ss_email_text' ) ?? "";
        $ss_state = rwmb_meta( 'amber_ss_state_select' ) ?? "";
        $ss_contact_array[] = array("post_id" => $ss_id, "name"=>$ss_name, "email"=>$ss_email, "state"=>$ss_state);   

    endwhile;

    usort($ss_contact_array, create_function('$a, $b', 'return strnatcasecmp($a["name"], $b["name"]);'));
    
    $partners = $ss_contact_array;
    foreach ( $partners as $partner ) {
    	echo '<tr>' .
    		 '<td class="partner-name"><a href="' . get_permalink( $partner['post_id'] ) . '">' . $partner['name'] . '</a></td>'.
    		 '<td class="partner-role">' . $partner['email'] . '</td>' .
             '<td class="partner-state">' . $partner['state'] . '</td>' . 
    		 '</tr>';
    }  
?>
</tbody>
</table>
</div>
