<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 05/08/14
 * Time: 17:52
 */ ?>
<div id="triangulo-close-modal"></div>
<?php if ( have_posts() ) : ?>

<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
	<div id="modal-quinta" class="row modal-<?php echo get_post_type();?>">
	
		<div id="container-modal-titulo" class="col-sm-12">
			
			<div id="fundo-modal-titulo" class="col-sm-12">
					<div class="col-sm-6" id="tiangulo-modal"></div>
					<h1 class="col-sm-6"><?php the_title(); ?></h1>
				
			</div>
			<?php if (has_post_thumbnail()){?>
			<div class="col-sm-8">
			<?php 		
			}
			else{?>
			<div class="col-sm-12">	
			<?php } 
			?>
				<div id="info" class="modal-eventos">
					<?php $data_invert = get_post_meta( $post->ID , 'agenda-event-date' , true );
					$data_explo = explode("/", $data_invert);
					echo
					'<span class="data-evento">' .
					date('d/m/y', $data_invert)
					. '</span>'; 
					echo '<span > <div id="horario">' .get_post_meta( $post->ID , 'agenda_horario_inic' , true ). '</div>'; 
					echo '<div id="endereco" >' .get_post_meta( $post->ID , 'agenda_endereco' , true ). '</div></span>';?>
					<?php the_content();?>
				</div>
			</div>
			<?php if (has_post_thumbnail()){?>
			
			<div class=" imagem-modal col-sm-4 ">
				<?php the_post_thumbnail('thumb-eventos');?>
			</div>
			
			<?php 	}?>	
		</div>
	</div>
	
<?php endwhile; ?>
<?php endif; ?>
