<?php $mvp_feat_layout = get_option('mvp_feat_layout'); if( $mvp_feat_layout == "0" ) { ?>
	<div class="mvp-main-box">
		<section id="mvp-feat1-wrap" class="left relative">
			<div class="mvp-feat1-right-out left relative">
				<div class="mvp-feat1-right-in">
					<div class="mvp-feat1-main left relative">
						<div class="mvp-feat1-left-wrap relative">
							<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'posts_per_page' => '1', 'ignore_sticky_posts'=> 1 )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; ?>
								<a href="<?php the_permalink(); ?>" rel="bookmark">
								<div class="mvp-feat1-feat-wrap left relative">
									<div class="mvp-feat1-feat-img left relative">
										<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
											<?php the_post_thumbnail('mvp-port-thumb'); ?>
										<?php } ?>
										<?php if ( has_post_format( 'video' )) { ?>
											<div class="mvp-vid-box-wrap mvp-vid-marg">
												<i class="fa fa-2 fa-play" aria-hidden="true"></i>
											</div><!--mvp-vid-box-wrap-->
										<?php } else if ( has_post_format( 'gallery' )) { ?>
											<div class="mvp-vid-box-wrap">
												<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
											</div><!--mvp-vid-box-wrap-->
										<?php } ?>
									</div><!--mvp-feat1-feat-img-->
									<div class="mvp-feat1-feat-text left relative">
										<div class="mvp-cat-date-wrap left relative">
											<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
										</div><!--mvp-cat-date-wrap-->
										<?php if(get_post_meta($post->ID, "mvp_featured_headline", true)): ?>
											<h2><?php echo esc_html(get_post_meta($post->ID, "mvp_featured_headline", true)); ?></h2>
										<?php else: ?>
											<h2 class="mvp-stand-title"><?php the_title(); ?></h2>
										<?php endif; ?>
										<p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
									</div><!--mvp-feat1-feat-text-->
								</div><!--mvp-feat1-feat-wrap-->
								</a>
							<?php endwhile; wp_reset_postdata(); ?>
							<div class="mvp-feat1-sub-wrap left relative">
								<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'post__not_in'=>$do_not_duplicate, 'posts_per_page' => '2', 'ignore_sticky_posts'=> 1  )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; ?>
									<a href="<?php the_permalink(); ?>" rel="bookmark">
									<div class="mvp-feat1-sub-cont left relative">
										<div class="mvp-feat1-sub-img left relative">
											<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
												<?php the_post_thumbnail('mvp-large-thumb', array( 'class' => 'mvp-reg-img' )); ?>
												<?php the_post_thumbnail('mvp-mid-thumb', array( 'class' => 'mvp-mob-img' )); ?>
											<?php } ?>
											<?php if ( has_post_format( 'video' )) { ?>
												<div class="mvp-vid-box-wrap mvp-vid-marg">
													<i class="fa fa-2 fa-play" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } else if ( has_post_format( 'gallery' )) { ?>
												<div class="mvp-vid-box-wrap">
													<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } ?>
										</div><!--mvp-feat1-sub-img-->
										<div class="mvp-feat1-sub-text">
											<div class="mvp-cat-date-wrap left relative">
												<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
											</div><!--mvp-cat-date-wrap-->
											<h2><?php the_title(); ?></h2>
										</div><!--mvp-feat1-sub-text-->
									</div><!--mvp-feat1-sub-cont-->
									</a>
								<?php endwhile; wp_reset_postdata(); ?>
							</div><!--mvp-feat1-sub-wrap-->
						</div><!--mvp-feat1-left-wrap-->
						<div class="mvp-feat1-mid-wrap left relative">
							<h3 class="mvp-feat1-pop-head"><span class="mvp-feat1-pop-head"><?php echo esc_html(get_option('mvp_pop_head')); ?></span></h3>
							<div class="mvp-feat1-pop-wrap left relative">
								<?php global $do_not_duplicate; global $post; $pop_days = esc_html(get_option('mvp_pop_days')); $popular_days_ago = "$pop_days days ago"; $recent = new WP_Query(array('posts_per_page' => '5', 'ignore_sticky_posts'=> 1, 'post__not_in' => $do_not_duplicate, 'orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => 'post_views_count', 'date_query' => array( array( 'after' => $popular_days_ago )) )); while($recent->have_posts()) : $recent->the_post(); ?>
									<a href="<?php the_permalink(); ?>" rel="bookmark">
									<div class="mvp-feat1-pop-cont left relative">
										<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
											<div class="mvp-feat1-pop-img left relative">
												<?php the_post_thumbnail('mvp-mid-thumb', array( 'class' => 'mvp-reg-img' )); ?>
												<?php the_post_thumbnail('mvp-small-thumb', array( 'class' => 'mvp-mob-img' )); ?>
												<?php if ( has_post_format( 'video' )) { ?>
													<div class="mvp-vid-box-wrap mvp-vid-box-mid mvp-vid-marg">
														<i class="fa fa-2 fa-play" aria-hidden="true"></i>
													</div><!--mvp-vid-box-wrap-->
												<?php } else if ( has_post_format( 'gallery' )) { ?>
													<div class="mvp-vid-box-wrap mvp-vid-box-mid">
														<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
													</div><!--mvp-vid-box-wrap-->
												<?php } ?>
											</div><!--mvp-feat1-pop-img-->
										<?php } ?>
										<div class="mvp-feat1-pop-text left relative">
											<div class="mvp-cat-date-wrap left relative">
												<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
											</div><!--mvp-cat-date-wrap-->
											<h2><?php the_title(); ?></h2>
										</div><!--mvp-feat1-pop-text-->
									</div><!--mvp-feat1-pop-cont-->
									</a>
								<?php endwhile; wp_reset_postdata(); ?>
							</div><!--mvp-feat1-pop-wrap-->
						</div><!--mvp-feat1-mid-wrap-->
					</div><!--mvp-feat1-main-->
				</div><!--mvp-feat1-right-in-->
				<div class="mvp-feat1-right-wrap left relative">
					<?php if(get_option('mvp_feat_ad')) { ?>
						<div class="mvp-feat1-list-ad left relative">
							<span class="mvp-ad-label"><?php esc_html_e( 'Advertisement', 'zox-news' ); ?></span>
							<?php $mvp_feat_ad = get_option('mvp_feat_ad'); if ($mvp_feat_ad) { echo do_shortcode(html_entity_decode($mvp_feat_ad)); } ?>
						</div><!--mvp-feat1-list-ad-->
					<?php } ?>
					<div class="mvp-feat1-list-wrap left relative">
						<div class="mvp-feat1-list-head-wrap left relative">
							<ul class="mvp-feat1-list-buts left relative">
								<li class="mvp-feat-col-tab"><a href="#mvp-feat-tab-col1"><span class="mvp-feat1-list-but"><?php esc_html_e( 'Latest', 'zox-news' ); ?></span></a></li>
								<?php query_posts(array( 'tax_query' => array( array( 'taxonomy' => 'post_format', 'field' => 'slug', 'terms' => 'post-format-video' )) )); if (have_posts()) : ?>
									<li><a href="#mvp-feat-tab-col2"><span class="mvp-feat1-list-but"><?php esc_html_e( 'Videos', 'zox-news' ); ?></span></a></li>
								<?php endif; wp_reset_query(); ?>
								<?php query_posts(array( 'tax_query' => array( array( 'taxonomy' => 'post_format', 'field' => 'slug', 'terms' => 'post-format-gallery' )) )); if (have_posts()) : ?>
									<li><a href="#mvp-feat-tab-col3"><span class="mvp-feat1-list-but"><?php esc_html_e( 'Galleries', 'zox-news' ); ?></span></a></li>
								<?php endif; wp_reset_query(); ?>
							</ul>
						</div><!--mvp-feat1-list-head-wrap-->
						<div id="mvp-feat-tab-col1" class="mvp-feat1-list left relative mvp-tab-col-cont">
							<?php global $do_not_duplicate; if (isset($do_not_duplicate)) { if(get_option('mvp_feat_ad')) { $mvp_feat_list_num = 10; } else { $mvp_feat_list_num = 13; }; $paged = (get_query_var('page')) ? get_query_var('page') : 1; query_posts(array( 'posts_per_page' => $mvp_feat_list_num, 'post__not_in'=>$do_not_duplicate, 'paged' =>$paged, 'ignore_sticky_posts'=> 1 )); if (have_posts()) : while (have_posts()) : the_post(); ?>
								<a href="<?php the_permalink(); ?>" rel="bookmark">
								<div class="mvp-feat1-list-cont left relative">
									<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
										<div class="mvp-feat1-list-out relative">
											<div class="mvp-feat1-list-img left relative">
												<?php the_post_thumbnail('mvp-small-thumb'); ?>
											</div><!--mvp-feat1-list-img-->
											<div class="mvp-feat1-list-in">
												<div class="mvp-feat1-list-text">
													<div class="mvp-cat-date-wrap left relative">
														<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
													</div><!--mvp-cat-date-wrap-->
													<h2><?php the_title(); ?></h2>
												</div><!--mvp-feat1-list-text-->
											</div><!--mvp-feat1-list-in-->
										</div><!--mvp-feat1-list-out-->
									<?php } else { ?>
										<div class="mvp-feat1-list-text">
											<div class="mvp-cat-date-wrap left relative">
												<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
											</div><!--mvp-cat-date-wrap-->
											<h2><?php the_title(); ?></h2>
										</div><!--mvp-feat1-list-text-->
									<?php } ?>
								</div><!--mvp-feat1-list-cont-->
								</a>
							<?php endwhile; endif; wp_reset_query(); } ?>
						</div><!--mvp-feat-tab-col1-->
						<div id="mvp-feat-tab-col2" class="mvp-feat1-list left relative mvp-tab-col-cont">
							<?php global $do_not_duplicate; if (isset($do_not_duplicate)) { if(get_option('mvp_feat_ad')) { $mvp_feat_list_num = 10; } else { $mvp_feat_list_num = 13; }; $paged = (get_query_var('page')) ? get_query_var('page') : 1; query_posts(array( 'tax_query' => array( array( 'taxonomy' => 'post_format', 'field' => 'slug', 'terms' => 'post-format-video' )), 'posts_per_page' => $mvp_feat_list_num, 'ignore_sticky_posts'=> 1, 'post__not_in'=>$do_not_duplicate, 'paged' =>$paged )); if (have_posts()) : while (have_posts()) : the_post(); ?>
								<a href="<?php the_permalink(); ?>" rel="bookmark">
								<div class="mvp-feat1-list-cont left relative">
									<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
										<div class="mvp-feat1-list-out relative">
											<div class="mvp-feat1-list-img left relative">
												<?php the_post_thumbnail('mvp-small-thumb'); ?>
											</div><!--mvp-feat1-list-img-->
											<div class="mvp-feat1-list-in">
												<div class="mvp-feat1-list-text">
													<div class="mvp-cat-date-wrap left relative">
														<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
													</div><!--mvp-cat-date-wrap-->
													<h2><?php the_title(); ?></h2>
												</div><!--mvp-feat1-list-text-->
											</div><!--mvp-feat1-list-in-->
										</div><!--mvp-feat1-list-out-->
									<?php } else { ?>
										<div class="mvp-feat1-list-text">
											<div class="mvp-cat-date-wrap left relative">
												<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
											</div><!--mvp-cat-date-wrap-->
											<h2><?php the_title(); ?></h2>
										</div><!--mvp-feat1-list-text-->
									<?php } ?>
								</div><!--mvp-feat1-list-cont-->
								</a>
							<?php endwhile; endif; wp_reset_query(); } ?>
						</div><!--mvp-feat-tab-col2-->
						<div id="mvp-feat-tab-col3" class="mvp-feat1-list left relative mvp-tab-col-cont">
							<?php global $do_not_duplicate; if (isset($do_not_duplicate)) { if(get_option('mvp_feat_ad')) { $mvp_feat_list_num = 10; } else { $mvp_feat_list_num = 13; }; $paged = (get_query_var('page')) ? get_query_var('page') : 1; query_posts(array( 'tax_query' => array( array( 'taxonomy' => 'post_format', 'field' => 'slug', 'terms' => 'post-format-gallery' )), 'posts_per_page' => $mvp_feat_list_num, 'ignore_sticky_posts'=> 1, 'post__not_in'=>$do_not_duplicate, 'paged' =>$paged )); if (have_posts()) : while (have_posts()) : the_post(); ?>
								<a href="<?php the_permalink(); ?>" rel="bookmark">
								<div class="mvp-feat1-list-cont left relative">
									<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
										<div class="mvp-feat1-list-out relative">
											<div class="mvp-feat1-list-img left relative">
												<?php the_post_thumbnail('mvp-small-thumb'); ?>
											</div><!--mvp-feat1-list-img-->
											<div class="mvp-feat1-list-in">
												<div class="mvp-feat1-list-text">
													<div class="mvp-cat-date-wrap left relative">
														<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
													</div><!--mvp-cat-date-wrap-->
													<h2><?php the_title(); ?></h2>
												</div><!--mvp-feat1-list-text-->
											</div><!--mvp-feat1-list-in-->
										</div><!--mvp-feat1-list-out-->
									<?php } else { ?>
										<div class="mvp-feat1-list-text">
											<div class="mvp-cat-date-wrap left relative">
												<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
											</div><!--mvp-cat-date-wrap-->
											<h2><?php the_title(); ?></h2>
										</div><!--mvp-feat1-list-text-->
									<?php } ?>
								</div><!--mvp-feat1-list-cont-->
								</a>
							<?php endwhile; endif; wp_reset_query(); } ?>
						</div><!--mvp-feat-tab-col3-->
					</div><!--mvp-feat1-list-wrap-->
				</div><!--mvp-feat1-right-wrap-->
			</div><!--mvp-feat1-right-out-->
		</section><!--mvp-feat1-wrap-->
	</div><!--mvp-main-box-->
<?php } else if( $mvp_feat_layout == "1" ) { ?>
	<section id="mvp-feat2-wrap" class="left relative">
		<div class="mvp-feat2-top left relative">
			<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'posts_per_page' => '1', 'ignore_sticky_posts'=> 1  )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark">
				<div class="mvp-feat2-top-story left relative">
					<div class="mvp-feat2-top-img left relative">
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
							<?php the_post_thumbnail('', array( 'class' => 'mvp-reg-img' )); ?>
							<?php the_post_thumbnail('mvp-port-thumb', array( 'class' => 'mvp-mob-img' )); ?>
						<?php } ?>
					</div><!--mvp-feat2-top-img-->
					<div class="mvp-feat2-top-text-wrap">
						<div class="mvp-feat2-top-text-box">
							<div class="mvp-feat2-top-text left relative">

								<?php if(get_post_meta($post->ID, "mvp_featured_headline", true)): ?>
									<h2><?php echo esc_html(get_post_meta($post->ID, "mvp_featured_headline", true)); ?></h2>
								<?php else: ?>
									<h2 class="mvp-stand-title"><?php the_title(); ?></h2>
								<?php endif; ?>
								<p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
							</div><!--mvp-feat2-top-text-->
						</div><!--mvp-feat2-top-text-box-->
					</div><!--mvp-feat2-top-text-wrap-->
				</div><!--mvp-feat2-top-story-->
				</a>
			<?php endwhile; wp_reset_postdata(); ?>
		</div><!--mvp-feat2-top-->
		<div class="mvp-feat2-bot-wrap left relative">
			<div class="mvp-main-box">
				<div class="mvp-feat2-bot left relative">
					<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'post__not_in'=>$do_not_duplicate, 'posts_per_page' => '4', 'ignore_sticky_posts'=> 1  )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; ?>
						<a href="<?php the_permalink(); ?>" rel="bookmark">
						<div class="mvp-feat2-bot-story left relative">
							<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
								<div class="mvp-feat2-bot-img left relative">
									<?php the_post_thumbnail('mvp-mid-thumb', array( 'class' => 'mvp-reg-img' )); ?>
									<?php the_post_thumbnail('mvp-small-thumb', array( 'class' => 'mvp-mob-img' )); ?>
									<?php if ( has_post_format( 'video' )) { ?>
										<div class="mvp-vid-box-wrap mvp-vid-box-mid mvp-vid-marg">
											<i class="fa fa-2 fa-play" aria-hidden="true"></i>
										</div><!--mvp-vid-box-wrap-->
									<?php } else if ( has_post_format( 'gallery' )) { ?>
										<div class="mvp-vid-box-wrap mvp-vid-box-mid">
											<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
										</div><!--mvp-vid-box-wrap-->
									<?php } ?>
								</div><!--mvp-feat2-bot-img-->
							<?php } ?>
							<div class="mvp-feat2-bot-text left relative">
								<div class="mvp-cat-date-wrap left relative">
									<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
								</div><!--mvp-cat-date-wrap-->
								<h2><?php the_title(); ?></h2>
							</div><!--mvp-feat2-bot-text-->
						</div><!--mvp-feat2-bot-story-->
						</a>
					<?php endwhile; wp_reset_postdata(); ?>
				</div><!--mvp-feat2-bot-->
			</div><!--mvp-main-box-->
		</div><!--mvp-feat2-bot-wrap-->
	</section><!--mvp-feat2-wrap-->
<?php } else if( $mvp_feat_layout == "2" ) { ?>
	<section id="mvp-feat3-wrap" class="left relative">
		<div class="mvp-main-box">
			<div class="mvp-feat3-cont">
				<div class="mvp-feat3-main-wrap left relative">
					<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'posts_per_page' => '1', 'ignore_sticky_posts'=> 1 )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; ?>
						<a href="<?php the_permalink(); ?>" rel="bookmark">
						<div class="mvp-feat3-main-story left relative">
							<div class="mvp-feat3-main-img left relative">
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
									<?php the_post_thumbnail('mvp-port-thumb'); ?>
								<?php } ?>
								<?php if ( has_post_format( 'video' )) { ?>
									<div class="mvp-vid-box-wrap mvp-vid-marg">
										<i class="fa fa-2 fa-play" aria-hidden="true"></i>
									</div><!--mvp-vid-box-wrap-->
								<?php } else if ( has_post_format( 'gallery' )) { ?>
									<div class="mvp-vid-box-wrap">
										<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
									</div><!--mvp-vid-box-wrap-->
								<?php } ?>
							</div><!--mvp-feat3-main-img-->
							<div class="mvp-feat3-main-text">
								<div class="mvp-cat-date-wrap left relative">
									<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
								</div><!--mvp-cat-date-wrap-->
								<?php if(get_post_meta($post->ID, "mvp_featured_headline", true)): ?>
									<h2><?php echo esc_html(get_post_meta($post->ID, "mvp_featured_headline", true)); ?></h2>
								<?php else: ?>
									<h2 class="mvp-stand-title"><?php the_title(); ?></h2>
								<?php endif; ?>
								<p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
							</div><!--mvp-feat3-main-text-->
						</div><!--mvp-feat3-main-story -->
						</a>
					<?php endwhile; wp_reset_postdata(); ?>
				</div><!--mvp-feat3-main-wrap-->
				<div class="mvp-feat3-sub-wrap left relative">
					<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'post__not_in'=>$do_not_duplicate, 'posts_per_page' => '2', 'ignore_sticky_posts'=> 1 )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; ?>
						<a href="<?php the_permalink(); ?>" rel="bookmark">
						<div class="mvp-feat3-sub-story left relative">
							<div class="mvp-feat3-sub-img left relative">
								<?php the_post_thumbnail('mvp-post-thumb', array( 'class' => 'mvp-reg-img' )); ?>
								<?php the_post_thumbnail('mvp-mid-thumb', array( 'class' => 'mvp-mob-img' )); ?>
								<?php if ( has_post_format( 'video' )) { ?>
									<div class="mvp-vid-box-wrap mvp-vid-marg">
										<i class="fa fa-2 fa-play" aria-hidden="true"></i>
									</div><!--mvp-vid-box-wrap-->
								<?php } else if ( has_post_format( 'gallery' )) { ?>
									<div class="mvp-vid-box-wrap">
										<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
									</div><!--mvp-vid-box-wrap-->
								<?php } ?>
							</div><!--mvp-feat3-sub-img-->
							<div class="mvp-feat3-sub-text">
								<div class="mvp-cat-date-wrap left relative">
									<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
								</div><!--mvp-cat-date-wrap-->
								<h2><?php the_title(); ?></h2>
							</div><!--mvp-feat3-sub-text-->
						</div><!--mvp-feat3-sub-story-->
						</a>
					<?php endwhile; wp_reset_postdata(); ?>
				</div><!--mvp-feat3-sub-wrap-->
			</div><!--mvp-feat3-cont-->
		</div><!--mvp-main-box-->
	</section><!--mvp-feat3-wrap-->
<?php } else if( $mvp_feat_layout == "3" ) { ?>
	<section id="mvp-feat4-wrap" class="left relative">
		<div class="mvp-main-box">
			<div class="mvp-feat4-main left relative">
				<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'posts_per_page' => '1', 'ignore_sticky_posts'=> 1 )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; ?>
					<a href="<?php the_permalink(); ?>" rel="bookmark">
					<div class="mvp-feat4-main-story left relative">
						<div class="mvp-feat4-main-img left relative">
							<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
								<?php the_post_thumbnail('mvp-post-thumb', array( 'class' => 'mvp-reg-img' )); ?>
								<?php the_post_thumbnail('mvp-mid-thumb', array( 'class' => 'mvp-mob-img' )); ?>
							<?php } ?>
							<?php if ( has_post_format( 'video' )) { ?>
								<div class="mvp-vid-box-wrap mvp-vid-marg">
									<i class="fa fa-2 fa-play" aria-hidden="true"></i>
								</div><!--mvp-vid-box-wrap-->
							<?php } else if ( has_post_format( 'gallery' )) { ?>
								<div class="mvp-vid-box-wrap">
									<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
								</div><!--mvp-vid-box-wrap-->
							<?php } ?>
						</div><!--mvp-feat4-main-img-->
						<div class="mvp-feat4-main-text left relative">
							<div class="mvp-cat-date-wrap left relative">
								<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
							</div><!--mvp-cat-date-wrap-->
							<h2><?php the_title(); ?></h2>
							<p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
						</div><!--mvp-feat4-main-text-->
					</div><!--mvp-feat4-main-story-->
					</a>
				<?php endwhile; wp_reset_postdata(); ?>
			</div><!--mvp-feat4-main-->
		</div><!--mvp-main-box-->
	</section><!--mvp-feat4-wrap-->
<?php } else if( $mvp_feat_layout == "4" ) { ?>
	<div class="mvp-main-box">
		<section id="mvp-feat5-wrap" class="left relative">
			<div class="mvp-feat5-side-out left relative">
				<div class="mvp-feat5-side-in">
					<div class="mvp-feat5-main-wrap left relative">
						<div class="mvp-feat5-mid-wrap right relative">
							<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'posts_per_page' => '1', 'ignore_sticky_posts'=> 1 )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; ?>
								<a href="<?php the_permalink(); ?>" rel="bookmark">
								<div class="mvp-feat5-mid-main left relative">
									<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
										<div class="mvp-feat5-mid-main-img left relative">
											<?php the_post_thumbnail('mvp-large-thumb', array( 'class' => 'mvp-reg-img' )); ?>
											<?php the_post_thumbnail('mvp-port-thumb', array( 'class' => 'mvp-mob-img' )); ?>
											<?php if ( has_post_format( 'video' )) { ?>
												<div class="mvp-vid-box-wrap mvp-vid-marg">
													<i class="fa fa-2 fa-play" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } else if ( has_post_format( 'gallery' )) { ?>
												<div class="mvp-vid-box-wrap">
													<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } ?>
										</div><!--mvp-feat5-mid-main-img-->
									<?php } ?>
									<div class="mvp-feat5-mid-main-text left relative">
										<div class="mvp-cat-date-wrap left relative">
											<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
										</div><!--mvp-cat-date-wrap-->
										<h2><?php the_title(); ?></h2>
										<p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
									</div><!--mvp-feat5-mid-main-text-->
								</div><!--mvp-feat5-mid-main-->
								</a>
							<?php endwhile; wp_reset_postdata(); ?>
							<div class="mvp-feat5-mid-sub-wrap left relative">
								<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'post__not_in'=>$do_not_duplicate, 'posts_per_page' => '3', 'ignore_sticky_posts'=> 1  )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; ?>
									<a href="<?php the_permalink(); ?>" rel="bookmark">
									<div class="mvp-feat5-mid-sub-story left relative">
										<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
											<div class="mvp-feat5-mid-sub-out right relative">
												<div class="mvp-feat5-mid-sub-img left relative">
													<?php the_post_thumbnail('mvp-mid-thumb', array( 'class' => 'mvp-reg-img' )); ?>
													<?php the_post_thumbnail('mvp-small-thumb', array( 'class' => 'mvp-mob-img' )); ?>
													<?php if ( has_post_format( 'video' )) { ?>
														<div class="mvp-vid-box-wrap mvp-vid-box-mid mvp-vid-marg">
															<i class="fa fa-2 fa-play" aria-hidden="true"></i>
														</div><!--mvp-vid-box-wrap-->
													<?php } else if ( has_post_format( 'gallery' )) { ?>
														<div class="mvp-vid-box-wrap mvp-vid-box-mid">
															<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
														</div><!--mvp-vid-box-wrap-->
													<?php } ?>
												</div><!--mvp-feat5-mid-sub-img-->
												<div class="mvp-feat5-mid-sub-in">
													<div class="mvp-feat5-mid-sub-text left relative">
														<div class="mvp-cat-date-wrap left relative">
															<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
														</div><!--mvp-cat-date-wrap-->
														<h2><?php the_title(); ?></h2>
													</div><!--mvp-feat5-mid-sub-text-->
												</div><!--mvp-feat5-mid-sub-in-->
											</div><!--mvp-feat5-mid-sub-out-->
										<?php } else { ?>
											<div class="mvp-feat5-mis-sub-text left relative">
												<div class="mvp-cat-date-wrap left relative">
													<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
												</div><!--mvp-cat-date-wrap-->
												<h2><?php the_title(); ?></h2>
											</div><!--mvp-feat5-mis-sub-text-->
										<?php } ?>
									</div><!--mvp-feat5-mid-sub-story-->
									</a>
								<?php endwhile; wp_reset_postdata(); ?>
							</div><!--mvp-feat5-mid-sub-wrap-->
						</div><!--mvp-feat5-mid-wrap-->
						<div class="mvp-feat5-small-wrap left relative">
							<h3 class="mvp-feat1-pop-head"><span class="mvp-feat1-pop-head"><?php esc_html_e( 'Latest', 'zox-news' ); ?></span></h3>
							<?php global $do_not_duplicate; if (isset($do_not_duplicate)) { $paged = (get_query_var('page')) ? get_query_var('page') : 1; query_posts(array( 'posts_per_page' => '1', 'post__not_in'=>$do_not_duplicate, 'paged' =>$paged, 'ignore_sticky_posts'=> 1 )); if (have_posts()) : while (have_posts()) : the_post(); $do_not_duplicate[] = $post->ID; ?>
								<a href="<?php the_permalink(); ?>" rel="bookmark">
								<div class="mvp-feat5-small-main left relative">
									<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
										<div class="mvp-feat5-small-main-img left relative">
											<?php the_post_thumbnail('mvp-mid-thumb'); ?>
											<?php if ( has_post_format( 'video' )) { ?>
												<div class="mvp-vid-box-wrap mvp-vid-marg">
													<i class="fa fa-2 fa-play" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } else if ( has_post_format( 'gallery' )) { ?>
												<div class="mvp-vid-box-wrap">
													<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } ?>
										</div><!--mvp-feat5-small-main-img-->
									<?php } ?>
									<div class="mvp-feat5-small-main-text left relative">
										<div class="mvp-cat-date-wrap left relative">
											<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
										</div><!--mvp-cat-date-wrap-->
										<h2><?php the_title(); ?></h2>
										<p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
									</div><!--mvp-feat5-small-main-text-->
								</div><!--mvp-feat5-small-main-->
								</a>
							<?php endwhile; endif; wp_reset_query(); } ?>
							<div class="mvp-feat5-small-sub left relative">
								<?php global $do_not_duplicate; if (isset($do_not_duplicate)) { $paged = (get_query_var('page')) ? get_query_var('page') : 1; query_posts(array( 'posts_per_page' => '6', 'post__not_in'=>$do_not_duplicate, 'paged' =>$paged, 'ignore_sticky_posts'=> 1 )); if (have_posts()) : while (have_posts()) : the_post(); ?>
									<a href="<?php the_permalink(); ?>" rel="bookmark">
									<div class="mvp-feat1-list-cont left relative">
										<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
											<div class="mvp-feat1-list-out relative">
												<div class="mvp-feat1-list-img left relative">
													<?php the_post_thumbnail('mvp-small-thumb'); ?>
												</div><!--mvp-feat1-list-img-->
												<div class="mvp-feat1-list-in">
													<div class="mvp-feat1-list-text">
														<div class="mvp-cat-date-wrap left relative">
															<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
														</div><!--mvp-cat-date-wrap-->
														<h2><?php the_title(); ?></h2>
													</div><!--mvp-feat1-list-text-->
												</div><!--mvp-feat1-list-in-->
											</div><!--mvp-feat1-list-out-->
										<?php } else { ?>
											<div class="mvp-feat1-list-text">
												<div class="mvp-cat-date-wrap left relative">
													<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
												</div><!--mvp-cat-date-wrap-->
												<h2><?php the_title(); ?></h2>
											</div><!--mvp-feat1-list-text-->
										<?php } ?>
									</div><!--mvp-feat1-list-cont-->
									</a>
								<?php endwhile; endif; wp_reset_query(); } ?>
							</div><!--mvp-feat5-small-sub-->
						</div><!--mvp-feat5-small-wrap-->
					</div><!--mvp-feat5-main-wrap-->
				</div><!--mvp-feat5-side-out-->
				<div class="mvp-feat5-side-wrap left relative">
					<?php if(get_option('mvp_feat_ad')) { ?>
						<div class="mvp-feat1-list-ad left relative">
							<span class="mvp-ad-label"><?php esc_html_e( 'Advertisement', 'zox-news' ); ?></span>
							<?php $mvp_feat_ad = get_option('mvp_feat_ad'); if ($mvp_feat_ad) { echo do_shortcode(html_entity_decode($mvp_feat_ad)); } ?>
						</div><!--mvp-feat1-list-ad-->
					<?php } ?>
					<h3 class="mvp-feat1-pop-head"><span class="mvp-feat1-pop-head"><?php echo esc_html(get_option('mvp_pop_head')); ?></span></h3>
					<div class="mvp-feat5-side-list left relative">
						<?php global $do_not_duplicate; global $post; $pop_days = esc_html(get_option('mvp_pop_days')); $popular_days_ago = "$pop_days days ago";  if(get_option('mvp_feat_ad')) { $mvp_feat_list_num = 7; } else { $mvp_feat_list_num = 10; }; $recent = new WP_Query(array('posts_per_page' => $mvp_feat_list_num, 'ignore_sticky_posts'=> 1, 'post__not_in' => $do_not_duplicate, 'orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => 'post_views_count', 'date_query' => array( array( 'after' => $popular_days_ago )) )); while($recent->have_posts()) : $recent->the_post(); ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
							<div class="mvp-feat1-list-cont left relative">
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
									<div class="mvp-feat1-list-out relative">
										<div class="mvp-feat1-list-img left relative">
											<?php the_post_thumbnail('mvp-small-thumb'); ?>
										</div><!--mvp-feat1-list-img-->
										<div class="mvp-feat1-list-in">
											<div class="mvp-feat1-list-text">
												<div class="mvp-cat-date-wrap left relative">
													<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
												</div><!--mvp-cat-date-wrap-->
												<h2><?php the_title(); ?></h2>
											</div><!--mvp-feat1-list-text-->
										</div><!--mvp-feat1-list-in-->
									</div><!--mvp-feat1-list-out-->
								<?php } else { ?>
									<div class="mvp-feat1-list-text">
										<div class="mvp-cat-date-wrap left relative">
											<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
										</div><!--mvp-cat-date-wrap-->
										<h2><?php the_title(); ?></h2>
									</div><!--mvp-feat1-list-text-->
								<?php } ?>
							</div><!--mvp-feat1-list-cont-->
							</a>
						<?php endwhile; wp_reset_postdata(); ?>
					</div><!--mvp-feat5-side-list-->
				</div><!--mvp-feat5-side-wrap-->
			</div><!--mvp-feat5-side-out-->
		</section><!--mvp-feat5-wrap-->
	</div><!--mvp-main-box-->
<?php } else if( $mvp_feat_layout == "5" ) { ?>
	<div class="mvp-main-box">
		<section id="mvp-feat6-wrap" class="left relative">
			<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'posts_per_page' => '1', 'ignore_sticky_posts'=> 1 )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark">
				<div id="mvp-feat6-main" class="left relative">
					<div id="mvp-feat6-img" class="right relative">
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
							<?php the_post_thumbnail('mvp-post-thumb', array( 'class' => 'mvp-reg-img' )); ?>
							<?php the_post_thumbnail('mvp-port-thumb', array( 'class' => 'mvp-mob-img' )); ?>
						<?php } ?>
					</div><!--mvp-feat6-img-->
					<div id="mvp-feat6-text">
						<h3 class="mvp-feat1-pop-head"><span class="mvp-feat1-pop-head"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span></h3>
						<h2><?php the_title(); ?></h2>
						<p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
					</div><!--mvp-feat6-text-->
				</div><!--mvp-feat6-main-->
				</a>
			<?php endwhile; wp_reset_postdata(); ?>
		</section><!--mvp-feat6-wrap-->
		<?php if( shortcode_exists( 'cmcplayer' ) ): ?>
			<div style="margin-bottom: 1em;">
				<?php echo do_shortcode('[cmcplayer player_id="65fcad0cf8aff4c93e004398" qortex="true" show_on_desktop="false" show_on_mobile="true"]'); ?>
			</div>
		<?php endif; ?>
	</div><!--mvp-main-box-->
<?php } ?>