<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package amberadvocate
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="post-entry-header green">
        <?php
            $subhead = rwmb_meta('amber_subhead');
            if (!empty($subhead)) { 
                the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); 
                echo '<h3>' . rwmb_meta('amber_subhead') . '</h3>'; 
            } else { the_title( '<h1 class="entry-title">', '</h1>' ); }
        ?>
    </header><!-- .entry-header -->
    <style type="text/css">
        
    </style>
	<div class="content-channel channel-padding">
        <h3>Cómo usar la lista de información de contacto con los socios:</h3>
        <p>Haga clic en un nombre para ver la información completa de la persona a la derecha de esta lista. Puede ordenar la lista por estado o comenzar a escribir un nombre en la sección “Buscar” para buscar a una persona si no está seguro del nombre completo o de la ortografía.</p>
		<div class="row change-direction">
            <div class="col-sm-7">
                <?php get_sidebar('spanish-partner-table'); ?> 
            </div>
            <div class="col-sm-5">
                 <?php //get_sidebar('portal'); ?>
            </div>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
