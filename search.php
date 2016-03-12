<?php

get_header();

?>

	<main class="spine-search-index">

		<?php

		get_template_part( 'parts/headers' );
		?>
		<section class="row single gutter pad-ends">
			<div class="column one">
				<h1 class="search-results-head">Search Results for <span class="search-term"><?php echo get_search_query(); ?></span></h1>
			</div>
		</section>
		<?php
		get_template_part( 'parts/archive-layout', get_post_type() );

		/* @type WP_Query $wp_query */
		global $wp_query;

		$big = 99164;
		$args = array(
			'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'       => 'page/%#%',
			'total'        => $wp_query->max_num_pages, // Provide the number of pages this query expects to fill.
			'current'      => max( 1, get_query_var( 'paged' ) ), // Provide either 1 or the page number we're on.
		);
		?>
		<footer class="main-footer archive-footer">
			<section class="row side-right pager prevnext gutter">
				<div class="column one">
					<?php echo paginate_links( $args ); ?>
				</div>
				<div class="column two">
					<!-- intentionally empty -->
				</div>
			</section><!--pager-->
		</footer>

		<?php get_template_part( 'parts/footers' ); ?>

	</main>
<?php

get_footer();
