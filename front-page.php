<?php get_header(); ?>

  <section id="rb-front-header-image" class="">
      <?php $query = new WP_Query( array( 'pagename' => 'home' ) ); ?>

      <?php if ( $query->have_posts() ) : while ( have_posts() ) : the_post(); ?>

              <div class="rb-homepage-welcome-msg-bg" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
                <div class="container rb-homepage-welcome-msg">
                  <?php the_content(); ?>
                </div> <!--.container -->
              </div> <!--.rb-homepage-welcome-msg -->
      <?php endwhile; else : ?>
  	    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; wp_reset_postdata(); ?>
  </section>
  <section id="rb-front-courses" class="">
      <div class="container">
          <div class="row">
              <h2 class="text-center">Courses</h2>
          </div>
          <?php $query = new WP_Query( array( 'post_type' => 'front_courses' ) ); ?>

          <div class="row">
              <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                  <div class="col-md-6 rb-individual-course">
                      <a href="<?php the_field('link_to_course'); ?>">
                          <div class="rb-course-overlay">
                              <div class="rb-course-thumbnail"><?php the_post_thumbnail('large'); ?></div>
                              <h3 class="rb-course-overlay-text text-center"><?php the_title(); ?></h3>
                              <span class="text-center"><?php the_content(); ?></span>
                          </div>
                      </a>
                  </div>

                  <?php $counter++;
                      if(counter % 2 == 0) {
                          echo '</div><div class="row">';
                      }
                  ?>
              <?php endwhile; else : ?>
                  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
              <?php endif; wp_reset_postdata(); ?>
          </div>

      </div>
  </section>
  <section id="rb-front-posts" class="">
      <div class="container">

          <h2 class="text-center">Recent Posts</h2>

          <?php $query = new WP_Query( array( 'posts_per_page' => 3 ) ); ?>

          <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>


                  <div class="rb-front-posts row">
                      <div class="col-md-5"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
                      <div class="col-md-7">
                        <div class="rb-front-posts-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                        <div class="rb-front-posts-meta"><?php echo get_the_date(); ?> | <?php the_category( ' | '); ?></div>
                        <div class="rb-front-posts-excerpt"><?php the_excerpt(); ?></div>
                      </div>
                  </div>


          <?php endwhile; else : ?>
              <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
          <?php endif; ?>

          <div class="rb-front-posts-read-more text-right"><a href="/blog">More Videos</a></div>
      </div> <!--container-->
  </section>
  <section id="rb-front-about" class="">
      <?php $query = new WP_Query( array( 'pagename' => 'about' ) ); ?>

      <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

          <div class="container">
              <div class="row">
                  <div class="rb-about-content"><?php the_content(); ?></div>
              </div>

          </div>

      <?php endwhile; else : ?>
  	    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
  </section>

<?php get_footer(); ?>
