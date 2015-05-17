<?php
/**
 * The template used for displaying sections.
 *
 * @package Odin
 * @since 2.2.0
 */

global $odin_general_opts;
$parallax_options= get_option( 'parallax_tab' );
$sobre_options= get_option( 'sobre_tab' );
$logo = wp_get_attachment_url($sobre_options['logo'], 'full');
$depois ='';
$antes = '';
$entre = '';

$parallax_1 = wp_get_attachment_url($parallax_options['parallax_1'], 'full');
switch ($post->post_name) {
   case 'sobre':
		
        $background = 	$parallax_1;
		$antes = '<div style="background-image:url('.$background.');" class="secao-background"></div>
		<svg height="210" width="500">
		  <polygon id="triangulo_laranja" points=""/>
		  <polygon id="triangulo_sobre" points=""  />
		  <polygon id="poligono_branco" points=""  />
		</svg><header class="entry-header"><h1 class="entry-title">'.get_the_title($post->ID).'</h1></header><!-- .entry-header -->';
		
		$entre .="<div id='cabecalho_sobre'> <img src='".$logo."'/><h1>Quinta Essentia</h1></div> ";
         break;
	case 'projetos':
		$antes = '<header class="entry-header"><h1 class="entry-title">'.get_the_title($post->ID).'</h1></header><!-- .entry-header -->';
	  	break;
	case 'midia':
	
     	$parallax_2 = wp_get_attachment_url($parallax_options['parallax_2'], 'full');
	 	$entre = '';
		$depois = 
		'<svg id="svg_midia" height="400" width="500">
		 		<polygon id="triangulo_amarelo" points=""/>
		</svg>
			<div id="parallax_midia" style="background-image:url('.$parallax_2.');" class="secao-background"></div>
		<svg id="svg_disco">
			<polygon id="poligono_disco" points=""/>
		</svg>';
         break;
	 case 'discografia':
	  	$entre = '';
	  	$antes = '<header class="entry-header"><h1 class="entry-title">'.get_the_title($post->ID).'</h1></header><!-- .entry-header -->';
	 	$depois = '';
	     break;
		
	case 'social':
	  	$entre = '';
	  	$antes = '<svg height="400" width="500">
	 		<polygon id="poligono_social" points=""/>
 			<polygon id="triangulo_social" points=""/>
		</svg><header class="entry-header"><h1 class="entry-title">'.get_the_title($post->ID).'</h1></header><!-- .entry-header -->';
	 	$depois = '<svg id="svg_social_depois" height="400" width="500">
	 		<polygon id="poligono_social_depois" points=""/></svg>';
	     break;
	}
?>
<article id="<?php echo $post->post_name ?>" <?php post_class('row'); ?>>
	<?php echo $antes;?>
	
	
	<div  style='background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID));?>);' class="secao-interno col-md-12"  >
		
		<div class="conteudo-secao">
			<?php echo $entre;?>

			<?php
			the_content();
			?>
			<div class="clearfix"></div>
			
		</div>
	</div>
	
</article><!-- #post-## -->
<div class="depois"><?php echo $depois;?>
</div>
<div class="clearfix"></div>


