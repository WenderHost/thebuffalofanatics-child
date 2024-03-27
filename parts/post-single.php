<?php get_header(); ?>
<?php global $author; $userdata = get_userdata($author); ?>
<article id="mvp-article-wrap" itemscope itemtype="http://schema.org/NewsArticle">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php the_permalink(); ?>"/>
		<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( empty($mvp_post_temp) && $mvp_post_layout == '6' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '6' ) || ( empty($mvp_post_temp) && $mvp_post_layout == '7' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '7' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '6' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '7' ) || $mvp_post_temp == "temp7" || $mvp_post_temp == "temp8" ) { ?>
			<div id="mvp-vid-wide-wrap" class="left relative">
				<div class="mvp-main-box">
					<div class="mvp-vid-wide-cont left relative">
						<div class="mvp-vid-wide-top left relative">
							<div class="mvp-vid-wide-out left relative">
								<div class="mvp-vid-wide-in">
									<div class="mvp-vid-wide-left left relative">
										<?php if(get_post_meta($post->ID, "mvp_video_embed", true)) { ?>
											<div id="mvp-video-embed-wrap" class="left relative">
												<div id="mvp-video-embed-cont" class="left relative">
													<span class="mvp-video-close fa fa-times" aria-hidden="true"></span>
													<div class="mvp-video-embed left relative">
														<?php echo html_entity_decode(get_post_meta($post->ID, "mvp_video_embed", true)); ?>
													</div><!--mvp-video-embed-->
												</div><!--mvp-video-embed-cont-->
											</div><!--mvp-video-embed-wrap-->
											<div class="mvp-post-img-hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
												<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
												<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
												<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
												<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
											</div><!--mvp-post-img-hide-->
										<?php } else { ?>
											<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
												<div id="mvp-post-feat-img" class="left relative mvp-post-feat-img-wide2" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
													<?php the_post_thumbnail(''); ?>
													<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
													<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
													<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
													<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
												</div><!--mvp-post-feat-img-->
											<?php } ?>
										<?php } ?>
									</div><!--mvp-vid-wide-left-->
								</div><!--mvp-vid-wide-in-->
								<div class="mvp-vid-wide-right left relative">
									<div class="mvp-vid-wide-text left relative">
										<div class="mvp-cat-date-wrap left relative">
											<a class="mvp-post-cat-link" href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>"><span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><a>
										</div><!--mvp-cat-date-wrap-->
										<h1 class="mvp-post-title mvp-vid-wide-title left entry-title" itemprop="headline"><?php the_title(); ?></h1>
										<?php if ( has_excerpt() ) { ?>
											<span class="mvp-post-excerpt left"><?php the_excerpt(); ?></span>
										<?php } ?>
									</div><!--mvp-vid-wide-text-->
									<?php $socialbox = get_option('mvp_social_box'); if ($socialbox == "true") { ?>
										<?php if ( function_exists( 'mvp_SocialSharingVid' ) ) { ?>
											<?php mvp_SocialSharingVid(); ?>
										<?php } ?>
									<?php } ?>
								</div><!--mvp-vid-wide-right-->
							</div><!--mvp-vid-wide-out-->
						</div><!--mvp-vid-wide-top-->
						<div class="mvp-vid-wide-bot left relative">
							<h4 class="mvp-widget-home-title">
								<span class="mvp-widget-home-title"><?php esc_html_e( "More Videos", 'zox-news' ); ?></span>
							</h4>
							<div class="mvp-vid-wide-more-wrap left relative">
								<ul class="mvp-vid-wide-more-list left relative">
									<?php global $post; query_posts(array( 'tax_query' => array( array( 'taxonomy' => 'post_format', 'field' => 'slug', 'terms' => 'post-format-video' )), 'posts_per_page' => '4', 'post__not_in' => array($post->ID) )); if (have_posts()) : while (have_posts()) : the_post(); ?>
										<a href="<?php the_permalink(); ?>" rel="bookmark">
										<li>
											<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
												<div class="mvp-vid-wide-more-img left relative">
													<?php the_post_thumbnail('mvp-mid-thumb', array( 'class' => 'mvp-reg-img' )); ?>
													<?php the_post_thumbnail('mvp-small-thumb', array( 'class' => 'mvp-mob-img' )); ?>
													<?php if ( has_post_format( 'video' )) { ?>
														<div class="mvp-vid-box-wrap mvp-vid-marg">
															<i class="fa fa-2 fa-play" aria-hidden="true"></i>
														</div><!--mvp-vid-box-wrap-->
													<?php } ?>
												</div><!--mvp-vid-wide-more-img-->
											<?php } ?>
											<div class="mvp-vid-wide-more-text left relative">
												<p><?php the_title(); ?></p>
											</div><!--mvp-vid-wide-more-text-->
										</li>
										</a>
									<?php endwhile; endif; wp_reset_query(); ?>
								</ul>
							</div><!--mvp-vid-wide-more-wrap-->
						</div><!--mvp-vid-wide-bot-->
					</div><!--mvp-vid-wide-cont-->
				</div><!--mvp-main-box-->
			</div><!--mvp-vid-wide-wrap-->
		<?php } ?>
		<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( empty($mvp_post_temp) && $mvp_post_layout == '4' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '4' ) || ( empty($mvp_post_temp) && $mvp_post_layout == '5' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '5' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '4' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '5' ) || $mvp_post_temp == "temp5" || $mvp_post_temp == "temp6" ) { ?>
			<?php $mvp_featured_img = get_option('mvp_featured_img'); $mvp_show_hide = get_post_meta($post->ID, "mvp_featured_image", true); if ($mvp_featured_img == "true") { if ($mvp_show_hide !== "hide") { ?>
				<?php if(get_post_meta($post->ID, "mvp_video_embed", true)) { ?>
					<div class="mvp-main-body-max">
						<div id="mvp-video-embed" class="left relative mvp-video-embed-wide">
							<?php echo html_entity_decode(get_post_meta($post->ID, "mvp_video_embed", true)); ?>
						</div><!--mvp-video-embed-->
					</div><!--mvp-main-body-max-->
				<?php } else { ?>
					<div class="mvp-main-body-max">
						<div id="mvp-post-feat-img-wide" class="left relative">
							<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
								<div id="mvp-post-feat-img" class="left relative mvp-post-feat-img-wide2" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
									<?php the_post_thumbnail('', array( 'class' => 'mvp-reg-img' )); ?>
									<?php the_post_thumbnail('mvp-port-thumb', array( 'class' => 'mvp-mob-img' )); ?>
									<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
									<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
									<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
									<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
								</div><!--mvp-post-feat-img-->
							<?php } ?>
							<div id="mvp-post-feat-text-wrap" class="left relative">
								<div class="mvp-post-feat-text-main">
									<div class="mvp-post-feat-text left relative">
										<h3 class="mvp-post-cat left relative"><a class="mvp-post-cat-link" href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>"><span class="mvp-post-cat left"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span></a></h3>
										<h1 class="mvp-post-title mvp-post-title-wide left entry-title" itemprop="headline"><?php the_title(); ?></h1>
										<?php if ( has_excerpt() ) { ?>
											<span class="mvp-post-excerpt left"><?php the_excerpt(); ?></span>
										<?php } ?>
									</div><!--mvp-post-feat-text-->
								</div><!--mvp-post-feat-text-main-->
							</div><!--mvp-post-feat-text-wrap-->
							<?php global $post; if(get_post_meta($post->ID, "mvp_photo_credit", true)): ?>
								<span class="mvp-feat-caption"><?php echo wp_kses_post(get_post_meta($post->ID, "mvp_photo_credit", true)); ?></span>
							<?php endif; ?>
						</div><!--mvp-post-feat-img-wide-->
					</div><!--mvp-main-body-max-->
				<?php } ?>
			<?php } else { ?>
				<div class="mvp-post-img-hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
					<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
					<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
					<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
					<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
				</div><!--mvp-post-img-hide-->
			<?php } ?>
			<?php } else { ?>
				<div class="mvp-post-img-hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
					<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
					<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
					<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
					<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
				</div><!--mvp-post-img-hide-->
			<?php } ?>
		<?php } ?>
		<div id="mvp-article-cont" class="left relative">
			<div class="mvp-main-box">
				<div id="mvp-post-main" class="left relative">
					<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( empty($mvp_post_temp) && empty($mvp_post_layout) ) || ( empty($mvp_post_temp) && $mvp_post_layout == '0' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '0' ) || ( empty($mvp_post_temp) && $mvp_post_layout == '1' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == "1" ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '0' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '1' ) || $mvp_post_temp == "temp1" || $mvp_post_temp == "temp2" ) { ?>
					<header id="mvp-post-head" class="left relative">
						<div style="margin-bottom: 1em;"><?php echo do_shortcode('[cmcplayer player_id="65fcad0cf8aff4c93e004398" qortex="true" show_on_desktop="false" show_on_mobile="true"]'); ?></div>
						<h3 class="mvp-post-cat left relative"><a class="mvp-post-cat-link" href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>"><span class="mvp-post-cat left"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span></a></h3>
						<h1 class="mvp-post-title left entry-title" itemprop="headline"><?php the_title(); ?></h1>
						<?php if ( has_excerpt() ) { ?>
							<span class="mvp-post-excerpt left"><?php the_excerpt(); ?></span>
						<?php } ?>
						<?php $author_info = get_option('mvp_author_info'); if ($author_info == "true") { ?>
							<div class="mvp-author-info-wrap left relative">
								<div class="mvp-author-info-thumb left relative">
									<?php echo get_avatar( get_the_author_meta('email'), '46' ); ?>
								</div><!--mvp-author-info-thumb-->
								<div class="mvp-author-info-text left relative">
									<div class="mvp-author-info-date left relative">
										<p><?php esc_html_e( 'Published', 'zox-news' ); ?></p> <span class="mvp-post-date"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span> <p><?php esc_html_e( 'on', 'zox-news' ); ?></p> <span class="mvp-post-date updated"><time class="post-date updated" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time></span>
										<meta itemprop="dateModified" content="<?php the_modified_date('Y-m-d g:i a'); ?>"/>
									</div><!--mvp-author-info-date-->
									<div class="mvp-author-info-name left relative" itemprop="author" itemscope itemtype="https://schema.org/Person">
										<p><?php esc_html_e( 'By', 'zox-news' ); ?></p> <span class="author-name vcard fn author" itemprop="name"><?php the_author_posts_link(); ?></span> <?php $authortwit = get_the_author_meta('twitter'); if ( ! empty ( $authortwit ) ) { ?><a href="<?php echo esc_url(the_author_meta('twitter')); ?>" class="mvp-twit-but" target="_blank"><span class="mvp-author-info-twit-but"><i class="fa fa-twitter fa-2"></i></span></a><?php } ?>
									</div><!--mvp-author-info-name-->
								</div><!--mvp-author-info-text-->
							</div><!--mvp-author-info-wrap-->
						<?php } ?>
					</header>
					<?php } ?>
					<div class="mvp-post-main-out left relative">
						<div class="mvp-post-main-in">
							<div id="mvp-post-content" class="left relative">
								<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( empty($mvp_post_temp) && $mvp_post_layout == '2' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '2' ) || ( empty($mvp_post_temp) && $mvp_post_layout == '3' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '3' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '2' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '3' ) || $mvp_post_temp == "temp3" || $mvp_post_temp == "temp4" ) { ?>
									<header id="mvp-post-head" class="left relative">
										<h3 class="mvp-post-cat left relative"><a class="mvp-post-cat-link" href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>"><span class="mvp-post-cat left"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span></a></h3>
										<h1 class="mvp-post-title left entry-title" itemprop="headline"><?php the_title(); ?></h1>
										<?php if ( has_excerpt() ) { ?>
											<span class="mvp-post-excerpt left"><?php the_excerpt(); ?></span>
										<?php } ?>
										<?php $author_info = get_option('mvp_author_info'); if ($author_info == "true") { ?>
											<div class="mvp-author-info-wrap left relative">
												<div class="mvp-author-info-thumb left relative">
													<?php echo get_avatar( get_the_author_meta('email'), '46' ); ?>
												</div><!--mvp-author-info-thumb-->
												<div class="mvp-author-info-text left relative">
													<div class="mvp-author-info-date left relative">
														<p><?php esc_html_e( 'Published', 'zox-news' ); ?></p> <span class="mvp-post-date"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span> <p><?php esc_html_e( 'on', 'zox-news' ); ?></p> <span class="mvp-post-date updated"><time class="post-date updated" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time></span>
														<meta itemprop="dateModified" content="<?php the_modified_date('Y-m-d'); ?>"/>
													</div><!--mvp-author-info-date-->
													<div class="mvp-author-info-name left relative" itemprop="author" itemscope itemtype="https://schema.org/Person">
														<p><?php esc_html_e( 'By', 'zox-news' ); ?></p> <span class="author-name vcard fn author" itemprop="name"><?php the_author_posts_link(); ?></span> <?php $authortwit = get_the_author_meta('twitter'); if ( ! empty ( $authortwit ) ) { ?><a href="<?php echo esc_url(the_author_meta('twitter')); ?>" class="mvp-twit-but" target="_blank"><span class="mvp-author-info-twit-but"><i class="fa fa-twitter fa-2"></i></span></a><?php } ?>
													</div><!--mvp-author-info-name-->
												</div><!--mvp-author-info-text-->
											</div><!--mvp-author-info-wrap-->
										<?php } ?>
									</header>
								<?php } ?>
								<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( empty($mvp_post_temp) && $mvp_post_layout == '4' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '4' ) || ( empty($mvp_post_temp) && $mvp_post_layout == '5' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '5' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '4' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '5' ) || $mvp_post_temp == "temp5" || $mvp_post_temp == "temp6" ) { ?>
									<?php if(get_post_meta($post->ID, "mvp_video_embed", true)) { ?>
									<header id="mvp-post-head" class="left relative">
										<h3 class="mvp-post-cat left relative"><a class="mvp-post-cat-link" href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>"><span class="mvp-post-cat left"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span></a></h3>
										<h1 class="mvp-post-title left entry-title" itemprop="headline"><?php the_title(); ?></h1>
										<?php if ( has_excerpt() ) { ?>
											<span class="mvp-post-excerpt left"><?php the_excerpt(); ?></span>
										<?php } ?>
										<?php $author_info = get_option('mvp_author_info'); if ($author_info == "true") { ?>
											<div class="mvp-author-info-wrap left relative">
												<div class="mvp-author-info-thumb left relative">
													<?php echo get_avatar( get_the_author_meta('email'), '46' ); ?>
												</div><!--mvp-author-info-thumb-->
												<div class="mvp-author-info-text left relative">
													<div class="mvp-author-info-date left relative">
														<p><?php esc_html_e( 'Published', 'zox-news' ); ?></p> <span class="mvp-post-date"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span> <p><?php esc_html_e( 'on', 'zox-news' ); ?></p> <span class="mvp-post-date updated"><time class="post-date updated" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time></span>
														<meta itemprop="dateModified" content="<?php the_modified_date('Y-m-d'); ?>"/>
													</div><!--mvp-author-info-date-->
													<div class="mvp-author-info-name left relative" itemprop="author" itemscope itemtype="https://schema.org/Person">
														<p><?php esc_html_e( 'By', 'zox-news' ); ?></p> <span class="author-name vcard fn author" itemprop="name"><?php the_author_posts_link(); ?></span> <?php $authortwit = get_the_author_meta('twitter'); if ( ! empty ( $authortwit ) ) { ?><a href="<?php echo esc_url(the_author_meta('twitter')); ?>" class="mvp-twit-but" target="_blank"><span class="mvp-author-info-twit-but"><i class="fa fa-twitter fa-2"></i></span></a><?php } ?>
													</div><!--mvp-author-info-name-->
												</div><!--mvp-author-info-text-->
											</div><!--mvp-author-info-wrap-->
										<?php } ?>
									</header>
									<?php } ?>
								<?php } ?>
								<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( empty($mvp_post_temp) && empty($mvp_post_layout) ) || ( empty($mvp_post_temp) && $mvp_post_layout == '0' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '0' ) || ( empty($mvp_post_temp) && $mvp_post_layout == '1' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '1' ) || ( empty($mvp_post_temp) && $mvp_post_layout == '2' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '2' ) || ( empty($mvp_post_temp) && $mvp_post_layout == '3' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '3' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '0' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '1' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '2' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '3' ) || $mvp_post_temp == "temp1" || $mvp_post_temp == "temp2" || $mvp_post_temp == "temp3" || $mvp_post_temp == "temp4" ) { ?>
								<?php $mvp_featured_img = get_option('mvp_featured_img'); $mvp_show_hide = get_post_meta($post->ID, "mvp_featured_image", true); if ($mvp_featured_img == "true") { if ($mvp_show_hide !== "hide") { ?>
									<?php if(get_post_meta($post->ID, "mvp_video_embed", true)) { ?>
										<div id="mvp-video-embed-wrap" class="left relative">
											<div id="mvp-video-embed-cont" class="left relative">
												<span class="mvp-video-close fa fa-times" aria-hidden="true"></span>
												<div id="mvp-video-embed" class="left relative">
													<?php echo html_entity_decode(get_post_meta($post->ID, "mvp_video_embed", true)); ?>
												</div><!--mvp-video-embed-->
											</div><!--mvp-video-embed-cont-->
										</div><!--mvp-video-embed-wrap-->
										<div class="mvp-post-img-hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
											<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
											<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
											<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
											<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
										</div><!--mvp-post-img-hide-->
									<?php } else { ?>
										<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
											<div id="mvp-post-feat-img" class="left relative mvp-post-feat-img-wide2" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
												<?php the_post_thumbnail(''); ?>
												<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
												<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
												<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
												<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
											</div><!--mvp-post-feat-img-->
											<?php global $post; if(get_post_meta($post->ID, "mvp_photo_credit", true)): ?>
												<span class="mvp-feat-caption"><?php echo wp_kses_post(get_post_meta($post->ID, "mvp_photo_credit", true)); ?></span>
											<?php endif; ?>
										<?php } ?>
									<?php } ?>
								<?php } else { ?>
									<div class="mvp-post-img-hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
										<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
										<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
										<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
										<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
									</div><!--mvp-post-img-hide-->
								<?php } ?>
								<?php } else { ?>
									<div class="mvp-post-img-hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
										<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
										<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
										<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
										<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
									</div><!--mvp-post-img-hide-->
								<?php } ?>
								<?php } ?>
								<div id="mvp-content-wrap" class="left relative">
									<div class="mvp-post-soc-out right relative">
										<?php $socialbox = get_option('mvp_social_box'); if ($socialbox == "true") { ?>
											<?php if ( function_exists( 'mvp_SocialSharing' ) ) { ?>
												<?php mvp_SocialSharing(); ?>
											<?php } ?>
										<?php } ?>
										<div class="mvp-post-soc-in">
											<div id="mvp-content-body" class="left relative">
												<div id="mvp-content-body-top" class="left relative">
													<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( empty($mvp_post_temp) && $mvp_post_layout == '4' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '4' ) || ( empty($mvp_post_temp) && $mvp_post_layout == '5' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '5' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '4' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '5' ) || $mvp_post_temp == "temp5" || $mvp_post_temp == "temp6" ) { ?>
														<?php if(get_post_meta($post->ID, "mvp_video_embed", true)) { } else { ?>
															<?php $author_info = get_option('mvp_author_info'); if ($author_info == "true") { ?>
																<div class="mvp-author-info-wrap left relative">
																	<div class="mvp-author-info-thumb left relative">
																		<?php echo get_avatar( get_the_author_meta('email'), '46' ); ?>
																	</div><!--mvp-author-info-thumb-->
																	<div class="mvp-author-info-text left relative">
																		<div class="mvp-author-info-date left relative">
																			<p><?php esc_html_e( 'Published', 'zox-news' ); ?></p> <span class="mvp-post-date"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span> <p><?php esc_html_e( 'on', 'zox-news' ); ?></p> <span class="mvp-post-date updated"><time class="post-date updated" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time></span>
																			<meta itemprop="dateModified" content="<?php the_modified_date('Y-m-d'); ?>"/>
																		</div><!--mvp-author-info-date-->
																		<div class="mvp-author-info-name left relative" itemprop="author" itemscope itemtype="https://schema.org/Person">
																			<p><?php esc_html_e( 'By', 'zox-news' ); ?></p> <span class="author-name vcard fn author" itemprop="name"><?php the_author_posts_link(); ?></span> <?php $authortwit = get_the_author_meta('twitter'); if ( ! empty ( $authortwit ) ) { ?><a href="<?php echo esc_url(the_author_meta('twitter')); ?>" class="mvp-twit-but" target="_blank"><span class="mvp-author-info-twit-but"><i class="fa fa-twitter fa-2"></i></span></a><?php } ?>
																		</div><!--mvp-author-info-name-->
																	</div><!--mvp-author-info-text-->
																</div><!--mvp-author-info-wrap-->
															<?php } ?>
														<?php } ?>
													<?php } ?>
													<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( empty($mvp_post_temp) && $mvp_post_layout == '6' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '6' ) || ( empty($mvp_post_temp) && $mvp_post_layout == '7' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '7' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '6' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '7' ) || $mvp_post_temp == "temp7" || $mvp_post_temp == "temp8" ) { ?>
														<?php $author_info = get_option('mvp_author_info'); if ($author_info == "true") { ?>
															<div class="mvp-author-info-wrap left relative">
																<div class="mvp-author-info-thumb left relative">
																	<?php echo get_avatar( get_the_author_meta('email'), '46' ); ?>
																</div><!--mvp-author-info-thumb-->
																<div class="mvp-author-info-text left relative">
																	<div class="mvp-author-info-date left relative">
																		<p><?php esc_html_e( 'Published', 'zox-news' ); ?></p> <span class="mvp-post-date"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span> <p><?php esc_html_e( 'on', 'zox-news' ); ?></p> <span class="mvp-post-date updated"><time class="post-date updated" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time></span>
																		<meta itemprop="dateModified" content="<?php the_modified_date('Y-m-d'); ?>"/>
																	</div><!--mvp-author-info-date-->
																	<div class="mvp-author-info-name left relative" itemprop="author" itemscope itemtype="https://schema.org/Person">
																		<p><?php esc_html_e( 'By', 'zox-news' ); ?></p> <span class="author-name vcard fn author" itemprop="name"><?php the_author_posts_link(); ?></span> <?php $authortwit = get_the_author_meta('twitter'); if ( ! empty ( $authortwit ) ) { ?><a href="<?php echo esc_url(the_author_meta('twitter')); ?>" class="mvp-twit-but" target="_blank"><span class="mvp-author-info-twit-but"><i class="fa fa-twitter fa-2"></i></span></a><?php } ?>
																	</div><!--mvp-author-info-name-->
																</div><!--mvp-author-info-text-->
															</div><!--mvp-author-info-wrap-->
														<?php } ?>
													<?php } ?>
													<div id="mvp-content-main" class="left relative">
														<?php the_content(); ?>
														<?php wp_link_pages(); ?>
													</div><!--mvp-content-main-->
													<div id="mvp-content-bot" class="left">
														<?php $mvp_show_gallery = get_post_meta($post->ID, "mvp_post_gallery", true); if ($mvp_show_gallery == "show") { ?>
															<section class="mvp-post-gallery-wrap left relative">
																<div class="mvp-post-gallery-top left relative flexslider">
																	<ul class="mvp-post-gallery-top-list slides">
																		<?php $images = get_attached_media('image', $post->ID); foreach($images as $image) { ?>
																			<li>
    																			<?php echo wp_get_attachment_image($image->ID, 'mvp-post-thumb'); ?>
																				<div class="mvp-post-gallery-text">
																					<p><?php echo wp_get_attachment_caption($image->ID); ?></p>
																				</div>
																			</li>
																		<?php } ?>
																	</ul>
																</div><!--mvp-post-gallery-top-->
																<div class="mvp-post-gallery-bot left relative flexslider">
																	<ul class="mvp-post-gallery-bot-list slides">
																		<?php $images = get_attached_media('image', $post->ID); foreach($images as $image) { ?>
																			<li>
    																			<?php echo wp_get_attachment_image($image->ID, 'mvp-small-thumb'); ?>
																			</li>
																		<?php } ?>
																	</ul>
																</div><!--mvp-post-gallery-bot-->
															</section><!--mvp-post-gallery-wrap-->
														<?php } ?>
														<div class="mvp-post-tags">
															<span class="mvp-post-tags-header"><?php esc_html_e( 'Related Topics:', 'zox-news' ); ?></span><span itemprop="keywords"><?php the_tags('','','') ?></span>
														</div><!--mvp-post-tags-->
														<div class="posts-nav-link">
															<?php posts_nav_link(); ?>
														</div><!--posts-nav-link-->
														<?php $mvp_prev_next = get_option('mvp_prev_next'); if ($mvp_prev_next == "true") { ?>
															<div id="mvp-prev-next-wrap" class="left relative">
																<?php $nextPost = get_next_post(TRUE, ''); if($nextPost) { $args = array( 'posts_per_page' => 1, 'include' => $nextPost->ID ); $nextPost = get_posts($args); foreach ($nextPost as $post) { setup_postdata($post); ?>
																	<div class="mvp-next-post-wrap right relative">
																		<a href="<?php the_permalink(); ?>" rel="bookmark">
																		<div class="mvp-prev-next-cont left relative">
																			<div class="mvp-next-cont-out left relative">
																				<div class="mvp-next-cont-in">
																					<div class="mvp-prev-next-text left relative">
																						<span class="mvp-prev-next-label left relative"><?php esc_html_e( "Up Next", 'zox-news' ); ?></span>
																						<p><?php the_title(); ?></p>
																					</div><!--mvp-prev-next-text-->
																				</div><!--mvp-next-cont-in-->
																				<span class="mvp-next-arr fa fa-chevron-right right"></span>
																			</div><!--mvp-prev-next-out-->
																		</div><!--mvp-prev-next-cont-->
																		</a>
																	</div><!--mvp-next-post-wrap-->
																<?php wp_reset_postdata(); } } ?>
																<?php $prevPost = get_previous_post(TRUE, ''); if($prevPost) { $args = array( 'posts_per_page' => 1, 'include' => $prevPost->ID ); $prevPost = get_posts($args); foreach ($prevPost as $post) { setup_postdata($post); ?>
																	<div class="mvp-prev-post-wrap left relative">
																		<a href="<?php the_permalink(); ?>" rel="bookmark">
																		<div class="mvp-prev-next-cont left relative">
																			<div class="mvp-prev-cont-out right relative">
																				<span class="mvp-prev-arr fa fa-chevron-left left"></span>
																				<div class="mvp-prev-cont-in">
																					<div class="mvp-prev-next-text left relative">
																						<span class="mvp-prev-next-label left relative"><?php esc_html_e( "Don't Miss", 'zox-news' ); ?></span>
																						<p><?php the_title(); ?></p>
																					</div><!--mvp-prev-next-text-->
																				</div><!--mvp-prev-cont-in-->
																			</div><!--mvp-prev-cont-out-->
																		</div><!--mvp-prev-next-cont-->
																		</a>
																	</div><!--mvp-prev-post-wrap-->
																<?php wp_reset_postdata(); } } ?>
															</div><!--mvp-prev-next-wrap-->
														<?php } ?>
														<?php $author = get_option('mvp_author_box'); if ($author == "true") { ?>
															<div id="mvp-author-box-wrap" class="left relative">
																<div class="mvp-author-box-out right relative">
																	<div id="mvp-author-box-img" class="left relative">
																		<?php echo get_avatar( get_the_author_meta('email'), '60' ); ?>
																	</div><!--mvp-author-box-img-->
																	<div class="mvp-author-box-in">
																		<div id="mvp-author-box-head" class="left relative">
																			<span class="mvp-author-box-name left relative"><?php the_author_posts_link(); ?></span>
																			<div id="mvp-author-box-soc-wrap" class="left relative">
																				<?php $mvp_email = get_option('mvp_author_email'); if ($mvp_email == "true") { ?>
																					<a href="mailto:<?php the_author_meta('email'); ?>"><span class="mvp-author-box-soc fa fa-envelope></span></a>
																				<?php } ?>
																				<?php $authordesc = get_the_author_meta( 'facebook' ); if ( ! empty ( $authordesc ) ) { ?>
																					<a href="<?php the_author_meta('facebook'); ?>" alt="Facebook" target="_blank"><span class="mvp-author-box-soc fab fa-facebook-square"></span></a>
																				<?php } ?>
																				<?php $authordesc = get_the_author_meta( 'twitter' ); if ( ! empty ( $authordesc ) ) { ?>
																					<a href="<?php the_author_meta('twitter'); ?>" alt="Twitter" target="_blank"><span class="mvp-author-box-soc fab fa-twitter-square"></span></a>
																				<?php } ?>
																				<?php $authordesc = get_the_author_meta( 'pinterest' ); if ( ! empty ( $authordesc ) ) { ?>
																					<a href="<?php the_author_meta('pinterest'); ?>" alt="Pinterest" target="_blank"><span class="mvp-author-box-soc fab fa-pinterest-square"></span></a>
																				<?php } ?>
																				<?php $authordesc = get_the_author_meta( 'instagram' ); if ( ! empty ( $authordesc ) ) { ?>
																					<a href="<?php the_author_meta('instagram'); ?>" alt="Instagram" target="_blank"><span class="mvp-author-box-soc fab fa-instagram"></span></a>
																				<?php } ?>
																				<?php $authordesc = get_the_author_meta( 'linkedin' ); if ( ! empty ( $authordesc ) ) { ?>
																					<a href="<?php the_author_meta('linkedin'); ?>" alt="LinkedIn" target="_blank"><span class="mvp-author-box-soc fab fa-linkedin-square"></span></a>
																				<?php } ?>
																			</div><!--mvp-author-box-soc-wrap-->
																		</div><!--mvp-author-box-head-->
																	</div><!--mvp-author-box-in-->
																</div><!--mvp-author-box-out-->
																<div id="mvp-author-box-text" class="left relative">
																	<p><?php the_author_meta('description'); ?></p>
																</div><!--mvp-author-box-text-->
															</div><!--mvp-author-box-wrap-->
														<?php } ?>
														<div class="mvp-org-wrap" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
															<div class="mvp-org-logo" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
																<?php if(get_option('mvp_logo')) { ?>
																	<img src="<?php echo esc_url(get_option('mvp_logo')); ?>"/>
																	<meta itemprop="url" content="<?php echo esc_url(get_option('mvp_logo')); ?>">
																<?php } else { ?>
																	<img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav.png" alt="<?php bloginfo( 'name' ); ?>" />
																	<meta itemprop="url" content="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav.png">
																<?php } ?>
															</div><!--mvp-org-logo-->
															<meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">
														</div><!--mvp-org-wrap-->
													</div><!--mvp-content-bot-->
												</div><!--mvp-content-body-top-->
												<div class="mvp-cont-read-wrap">
													<?php $mvp_cont_read = get_option('mvp_cont_read'); if ($mvp_cont_read == "true") { ?>
														<div class="mvp-cont-read-but-wrap left relative">
															<span class="mvp-cont-read-but"><?php esc_html_e( 'Continue Reading', 'zox-news' ); ?></span>
														</div><!--mvp-cont-read-but-wrap-->
													<?php } ?>
													<?php $mvp_post_ad = get_option('mvp_post_ad'); if ($mvp_post_ad) { ?>
														<div id="mvp-post-bot-ad" class="left relative">
															<span class="mvp-ad-label"><?php esc_html_e( 'Advertisement', 'zox-news' ); ?></span>
															<?php $mvp_post_ad = get_option('mvp_post_ad'); if ($mvp_post_ad) { echo do_shortcode(html_entity_decode($mvp_post_ad)); } ?>
														</div><!--mvp-post-bot-ad-->
													<?php } ?>
													<?php $mvp_related = get_option('mvp_related_posts'); if ($mvp_related == "true") { ?>
														<div id="mvp-related-posts" class="left relative">
															<h4 class="mvp-widget-home-title">
																<span class="mvp-widget-home-title"><?php esc_html_e( 'You may like', 'zox-news' ); ?></span>
															</h4>
															<?php mvp_RelatedPosts(); ?>
														</div><!--mvp-related-posts-->
													<?php } ?>
													<?php if ( comments_open() ) { ?>
														<?php $disqus_id = get_option('mvp_disqus_id'); if ($disqus_id) { if (isset($disqus_id)) {  ?>
															<div id="mvp-comments-button" class="left relative mvp-com-click">
																<span class="mvp-comment-but-text"><?php comments_number(__( 'Comments', 'zox-news'), esc_html__('Comments', 'zox-news'), esc_html__('Comments', 'zox-news')); ?></span>
															</div><!--mvp-comments-button-->
															<?php $disqus_id2 = esc_html($disqus_id); mvp_disqus_embed($disqus_id2); ?>
														<?php } } else { ?>
															<div id="mvp-comments-button" class="left relative mvp-com-click">
																<span class="mvp-comment-but-text"><?php comments_number(__( 'Click to comment', 'zox-news'), esc_html__('1 Comment', 'zox-news'), esc_html__('% Comments', 'zox-news'));?></span>
															</div><!--mvp-comments-button-->
															<?php comments_template(); ?>
														<?php } ?>
													<?php } ?>
												</div><!--mvp-cont-read-wrap-->
											</div><!--mvp-content-body-->
										</div><!--mvp-post-soc-in-->
									</div><!--mvp-post-soc-out-->
								</div><!--mvp-content-wrap-->
						<?php $mvp_more_posts = get_option('mvp_more_posts'); if ($mvp_more_posts == "true") { ?>
							<div id="mvp-post-add-box">
								<div id="mvp-post-add-wrap" class="left relative">
									<?php global $post; $mvp_more_num = esc_html(get_option('mvp_more_num')); $category = get_the_category(); $current_cat = $category[0]->cat_ID; $recent = new WP_Query(array( 'cat' => $current_cat, 'posts_per_page' => $mvp_more_num, 'ignore_sticky_posts'=> 1, 'post__not_in' => array( $post->ID ) )); while($recent->have_posts()) : $recent->the_post(); ?>
										<div class="mvp-post-add-story left relative">
											<div class="mvp-post-add-head left relative">
												<h3 class="mvp-post-cat left relative"><a class="mvp-post-cat-link" href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>"><span class="mvp-post-cat left"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span></a></h3>
												<h1 class="mvp-post-title left"><?php the_title(); ?></h1>
												<?php if ( has_excerpt() ) { ?>
													<span class="mvp-post-excerpt left"><?php the_excerpt(); ?></span>
												<?php } ?>
												<?php $author_info = get_option('mvp_author_info'); if ($author_info == "true") { ?>
													<div class="mvp-author-info-wrap left relative">
														<div class="mvp-author-info-thumb left relative">
															<?php echo get_avatar( get_the_author_meta('email'), '46' ); ?>
														</div><!--mvp-author-info-thumb-->
														<div class="mvp-author-info-text left relative">
															<div class="mvp-author-info-date left relative">
																<p><?php esc_html_e( 'Published', 'zox-news' ); ?></p> <span class="mvp-post-date"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span> <p><?php esc_html_e( 'on', 'zox-news' ); ?></p> <span class="mvp-post-date"><?php the_time(get_option('date_format')); ?></span>
															</div><!--mvp-author-info-date-->
															<div class="mvp-author-info-name left relative">
																<p><?php esc_html_e( 'By', 'zox-news' ); ?></p> <span class="author-name vcard fn author" itemprop="name"><?php the_author_posts_link(); ?></span> <?php $authortwit = get_the_author_meta('twitter'); if ( ! empty ( $authortwit ) ) { ?><a href="<?php echo esc_url(the_author_meta('twitter')); ?>" class="mvp-twit-but" target="_blank"><span class="mvp-author-info-twit-but"><i class="fa fa-twitter fa-2"></i></span></a><?php } ?>
															</div><!--mvp-author-info-name-->
														</div><!--mvp-author-info-text-->
													</div><!--mvp-author-info-wrap-->
												<?php } ?>
											</div><!--mvp-post-add-head-->
											<div class="mvp-post-add-body left relative">
												<?php $mvp_featured_img = get_option('mvp_featured_img'); $mvp_show_hide = get_post_meta($post->ID, "mvp_featured_image", true); if ($mvp_featured_img == "true") { if ($mvp_show_hide !== "hide") { ?>
													<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
														<div class="mvp-post-add-img left relative">
															<?php the_post_thumbnail(''); ?>
														</div><!--mvp-post-feat-img-->
														<?php global $post; if(get_post_meta($post->ID, "mvp_photo_credit", true)): ?>
															<span class="mvp-feat-caption"><?php echo wp_kses_post(get_post_meta($post->ID, "mvp_photo_credit", true)); ?></span>
														<?php endif; ?>
													<?php } ?>
												<?php } } ?>
												<div class="mvp-post-add-cont left relative">
													<div class="mvp-post-add-main right relative">
														<?php the_content(); ?>
													</div><!--mvp-post-add-main-->
													<div class="mvp-post-add-link">
														<a href="<?php the_permalink(); ?>" rel="bookmark"><span class="mvp-post-add-link-but"><?php esc_html_e( "Continue Reading", 'zox-news' ); ?></span></a>
													</div><!--mvp-post-add-link-->
												</div><!--mvp-post-add-cont-->
											</div><!--mvp-post-add-body-->
										</div><!--mvp-post-add-story-->
									<?php endwhile; wp_reset_postdata(); ?>
								</div><!--mvp-post-add-wrap-->
							</div><!--mvp-post-add-box-->
						<?php } ?>
							</div><!--mvp-post-content-->
						</div><!--mvp-post-main-in-->
						<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( empty($mvp_post_temp) && empty($mvp_post_layout) ) || ( empty($mvp_post_temp) && $mvp_post_layout == '0' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '0' ) || ( empty($mvp_post_temp) && $mvp_post_layout == '2' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '2' ) || ( empty($mvp_post_temp) && $mvp_post_layout == '4' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '4' ) || ( empty($mvp_post_temp) && $mvp_post_layout == '6' ) || ( $mvp_post_temp == "def" && $mvp_post_layout == '6' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '0' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '2' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '4' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == '6' ) || $mvp_post_temp == "temp1" || $mvp_post_temp == "temp3" || $mvp_post_temp == "temp5" || $mvp_post_temp == "temp7" ) { ?>
							<?php get_sidebar(); ?>
						<?php } ?>
					</div><!--mvp-post-main-out-->
				</div><!--mvp-post-main-->
			<?php $mvp_trend_posts = get_option('mvp_trend_posts'); if ($mvp_trend_posts == "true") { ?>
				<div id="mvp-post-more-wrap" class="left relative">
					<h4 class="mvp-widget-home-title">
						<span class="mvp-widget-home-title"><?php echo esc_html(get_option('mvp_pop_head')); ?></span>
					</h4>
					<ul class="mvp-post-more-list left relative">
						<?php global $post; $mvp_trend_post_num = get_option('mvp_trend_post_num'); $pop_days = esc_html(get_option('mvp_pop_days')); $popular_days_ago = "$pop_days days ago"; $recent = new WP_Query(array('posts_per_page' => $mvp_trend_post_num, 'ignore_sticky_posts'=> 1, 'post__not_in' => array( $post->ID ), 'orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => 'post_views_count', 'date_query' => array( array( 'after' => $popular_days_ago )) )); while($recent->have_posts()) : $recent->the_post(); ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
							<li>
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
									<div class="mvp-post-more-img left relative">
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
									</div><!--mvp-post-more-img-->
								<?php } ?>
								<div class="mvp-post-more-text left relative">
									<div class="mvp-cat-date-wrap left relative">
										<span class="mvp-cd-cat left relative"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span><span class="mvp-cd-date left relative"><?php printf( esc_html__( '%s ago', 'zox-news' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
									</div><!--mvp-cat-date-wrap-->
									<p><?php the_title(); ?></p>
								</div><!--mvp-post-more-text-->
							</li>
							</a>
						<?php endwhile; wp_reset_postdata(); ?>
					</ul>
				</div><!--mvp-post-more-wrap-->
			<?php } ?>
			</div><!--mvp-main-box-->
		</div><!--mvp-article-cont-->
	<?php setCrunchifyPostViews(get_the_ID()); ?>
	<?php endwhile; endif; ?>
</article><!--mvp-article-wrap-->
<?php get_footer(); ?>