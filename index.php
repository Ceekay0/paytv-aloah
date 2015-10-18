<?php get_header(); ?>
			
			<div id="content">

				<div id="inner-content" class="wrap clearfix">

									<!-- HERO THUMBS -->
				<!-- <div id="hero-thumbs" class="ninecol clearfix"> -->
					<?php $hero_query = new WP_Query( 'post_type=hero_thumb&posts_per_page=3'); $hero_i = 0; ?>
					<?php while($hero_query->have_posts()): $hero_query->the_post(); ?>
	  					<div class="hero-content threecol clearfix <?php $hero_i++ ;
	  					/**	switch ($hero_i) {
	  							case 1 :
	  								echo 'last';
	  								break;
	  							case 2 :
	  								echo '';
	  								break;
	  							case 3 : 
	  								echo 'first';
	  								break; } **/?>
	  								">
	  				<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
	  				<?php the_content();?>
	  					<?php $key="url"; if (get_post_meta($post->ID, $key, true) != '') {; ?>
	  					<a class="twitterbtn hero-more" href="<?php echo get_post_meta($post->ID, $key, true); ?>"><?php _e('Click here', 'bonestheme'); ?></a> 
	  					<?php } ?>
	  					</div>
					<?php endwhile; ?>
				<!-- </div> -->
				<!-- HERO THUMBS END -->
			
				    <div id="main" class="eightcol last clearfix" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						    <header class="article-header">
							
							    <h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p class="byline vcard"><?php
                    printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', '));
                  ?></p>
						
						    </header> <!-- end article header -->
					
						    <section class="entry-content clearfix">
							    <?php the_content(''); ?>
						    </section> <!-- end article section -->
						
						    <footer class="article-footer">
    							<p class="tags clearfix"><?php the_tags('<span class="tags-title">' . __('Tags:', 'bonestheme') . '</span> ', ', ', ''); ?></p>
    							
    							<?php $pos = strpos($post->post_content, '<!--more-->'); 
    								if($pos==''){ ?>
    								<p class="comment-count clearfix"> <a class="comment-link" href="<?php the_permalink(); ?>#comments">
    									<?php if(get_comments_number()>=1) comments_number( 'no responses', 'one response', '% responses' ); 
    											// elseif('open' != $post->comment_status) _e('Comments Off','bonestheme'); 
    											elseif(get_comments_number() == 0) _e('No Comments','bonestheme'); ?></a></p>
    										<?php }
    									else{ ?><p class="more clearfix"> <a class="more-link" title="<?php _e('Read more about','bonestheme'); ?> <?php the_title(); ?>" href="<?php the_permalink() ?>#more-<?php echo $id; ?>">
    									<?php _e('Continue reading','bonestheme'); ?></a> </p><?php } ?>
						    </footer> <!-- end article footer -->
						    
						    <?php // comments_template(); // uncomment if you want to use them ?>
					
					    </article> <!-- end article -->
					
					    <?php endwhile; ?>	
					
					        <?php if (function_exists('bones_page_navi')) { ?>
					            <?php bones_page_navi(); ?>
					        <?php } else { ?>
					            <nav class="wp-prev-next">
					                <ul class="clearfix">
					        	        <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
					        	        <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
					                </ul>
					            </nav>
					        <?php } ?>		
					
					    <?php else : ?>
					    
					        <article id="post-not-found" class="hentry clearfix">
					            <header class="article-header">
					        	    <h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
					        	</header>
					            <section class="entry-content">
					        	    <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
					        	</section>
					        	<footer class="article-footer">
					        	    <p><?php _e("This is the error message in the index.php template.", "bonestheme"); ?></p>
					        	</footer>
					        </article>
					
					    <?php endif; ?>
			
				    </div> <!-- end #main -->
    
				    <?php get_sidebar(); ?>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
