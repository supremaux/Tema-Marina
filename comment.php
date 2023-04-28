<?php
/**
 * O modelo para exibir comentários.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#comments
 *
 * @package Marina
 * @since 1.0.0
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			printf(
				/* translators: 1: número de comentários, 2: título do post */
				esc_html( _nx( '%1$s comentário em &ldquo;%2$s&rdquo;', '%1$s comentários em &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'marina' ) ),
				number_format_i18n( get_comments_number() ),
				'<span>' . get_the_title() . '</span>'
			);
			?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size'=> 80,
					'reply_text' => __( 'Responder', 'marina' ),
				) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_pagination( array(
			'prev_text' => __( 'Anterior', 'marina' ),
			'next_text' => __( 'Próximo', 'marina' ),
		) );
		?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// Se os comentários estiverem fechados e houver comentários, deixe uma mensagem
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comentários estão fechados.', 'marina' ); ?></p>
	<?php endif; ?>

	<?php
		// Formulário de comentários padrão do WordPress
		comment_form();
	?>

</div><!-- #comments -->
