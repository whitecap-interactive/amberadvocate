<?php
/**
 * @package Tribal Database
 */
?>

<?php
$url = get_the_permalink();
$url_with_get_values = add_query_arg( array(
    'org_id' => get_the_ID()
), $url );
?>
<tr>
    <td class="org-name"><a href="<?php echo $url_with_get_values; ?>"><?php the_title(); ?></a></td>
    <td class="org-region"><?php echo rwmb_meta('tribal_region') ?></td>
    <td class="org-state"><?php echo rwmb_meta('tribal_state') ?></td>
</tr>


