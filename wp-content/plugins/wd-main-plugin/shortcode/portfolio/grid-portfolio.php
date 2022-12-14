<ul class="wd-portfolio-grid <?php echo esc_attr($ajzaa_portfolio_hover_style); ?> large-block-grid-<?php echo esc_attr($ajzaa_portfolio_columns_desktop); ?> medium-block-grid-<?php echo esc_attr($ajzaa_portfolio_columns_tablet); ?> small-block-grid-<?php echo esc_attr($ajzaa_portfolio_columns_mobile); ?>" data-padding="<?php echo esc_attr($padding_items) ?>">
<?php 
$overlay_width = '';
if ($ajzaa_static_html_item_position == "before"){ ?>
  <li class="static-html-item wd-portfolio-grid-item <?php echo esc_attr($ajzaa_static_html_item_width) ?>">
    <div class="static-html-item-container" style="background-color: <?php echo esc_attr($ajzaa_static_html_item_bg_color); ?>">

      <?php 
       echo $ajzaa_static_html_item ;
       ?>
    </div>
  </li>
<?php } ?>

    <?php 
    global $wp_query;
    $temp = $wp_query;
    $wp_query = null;
    $wp_query = new WP_Query();

    if( count($ajzaa_category_array) == 1 )
    {
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      $wp_query -> query(array( 
                          'post_type' => 'portfolio', 
                          'posts_per_page' => $portfolio_items_to_show,
                          'paged'          => $paged
                        ) );


    }
    if( count($ajzaa_category_array) > 1 ) {

      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      $wp_query -> query(array( 
                          'post_type' => 'portfolio', 
                          'posts_per_page' => $portfolio_items_to_show,
                          'paged'          => $paged,
                          'tax_query' => array( 
                                                 'relation' => 'AND',
                                                 array( 
                                                        'taxonomy' => 'portfolio_categories', 
                                                        'field' => 'slug',
                                                        'terms' => $ajzaa_category_array
                                                      ) 
                                              ) 
                        ) );
    }
    while ($wp_query->have_posts()) : $wp_query->the_post();  ?>
    <?php 
     ?>
      <li class="wd-portfolio-grid-item
      <?php

          $terms = get_the_terms( get_the_ID(), 'portfolio_categories' );
          if ( $terms && ! is_wp_error( $terms ) ) {
            foreach ( $terms as $term ) {
              $term_filter = str_replace(' ', '-', $term->name);
              echo strtolower($term_filter) . " ";
            }
          ?>
          <?php }
       echo esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
            <?php
            switch ($ajzaa_portfolio_hover_style) {
              case 'style-1':
                ?>
                <div class="wd-portfolio-grid-item-image">
                  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php $thumb = get_post_thumbnail_id(); $img_url = wp_get_attachment_url( $thumb,'full' ); $image = ajzaa_resize( $img_url, 946, 802, true, true, true ); ?>
                    <img src="<?php echo esc_attr($image) ?>" alt="<?php the_title(); ?>"/>
                    <div class="overlay-color" data-overlaycolor="<?php echo esc_attr($overlay_color) ?>">
                      <span><i class="ion-ios-plus-empty"></i></span>
                    </div>
                  </a>
                </div>
                <div class="wd-portfolio-grid-item-text-container">
                  <div class="wd-portfolio-grid-item-text">

                    <<?php echo esc_attr($portfolio_title_tag); ?> class="portfolio-title">
                    <a href="<?php the_permalink(); ?>" style="<?php echo esc_attr($custom_portfolio_title_inline_style); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    </<?php echo esc_attr($portfolio_title_tag); ?>>
                  </div>

                  <div class="wd-portfolio-grid-item-tags" style="<?php echo esc_attr($custom_portfolio_tags_inline_style); ?>">
                    <?php
                    $terms = get_the_terms( get_the_ID(), 'portfolio_categories' );
					
                    if ( $terms && ! is_wp_error( $terms ) ) {
                      foreach ( $terms as $term ) {
                        echo esc_attr($term->name) . "<span> ,</span>";
                      }
                    ?>
                    <?php } ?>
                  </div>
                </div>
              <?php
                break;
                case 'style-2':
                ?>
                    <div class="wd-portfolio-grid-item-image">
                      <?php $thumb = get_post_thumbnail_id(); $img_url = wp_get_attachment_url( $thumb,'full' ); $image = ajzaa_resize( $img_url, 946, 802, true, true, true ); ?>
                      <img src="<?php echo esc_attr($image) ?>" alt="<?php the_title(); ?>"/>
                    </div>
                      <div class="overlay-color" data-overlaycolor="<?php echo esc_attr($overlay_color) ?>" style="height: calc(100% - <?php echo esc_attr($padding_items) ?>px); width: calc(100% - <?php echo esc_attr($overlay_width); ?>px);">
                        <div class="wd-portfolio-grid-item-text-container">
                          <div class="wd-portfolio-grid-item-text">
                            <<?php echo esc_attr($portfolio_title_tag); ?> class="portfolio-title">
                            <a href="<?php the_permalink(); ?>" style="<?php echo esc_attr($custom_portfolio_title_inline_style); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                            </<?php echo esc_attr($portfolio_title_tag); ?>>
                          </div>

                          <div class="wd-portfolio-grid-item-tags" style="<?php echo esc_attr($custom_portfolio_tags_inline_style); ?>">
                            <?php
                            $terms = get_the_terms( get_the_ID(), 'portfolio_categories' );
                            if ( $terms && ! is_wp_error( $terms ) ) {
                            foreach ( $terms as $term ) {
                            echo esc_attr($term->name) . "<span> ,</span>";
                            }
                            ?>
                            <?php } ?>
                          </div>
                          
                          <?php if ($ajzaa_portfolio_view == "yes"){ ?>
                            <a class="view" href="<?php echo esc_attr($image); ?>" data-lightbox="example-1"><i class="ion-ios-plus-empty"></i></a>
                          <?php } ?>
                          <?php if ($ajzaa_portfolio_link == "yes"){ ?>
                            <a class="link" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
                          <?php } ?>
                        </div>
                      </div>
              <?php
                break;

                case 'style-3':
                ?>
                <?php $thumb = get_post_thumbnail_id(); $img_url = wp_get_attachment_url( $thumb,'full' ); $image = ajzaa_resize( $img_url, 946, 802, true, true, true ); ?>
                <img src="<?php echo esc_attr($image) ?>" alt="<?php the_title(); ?>"/>
                <div class="overlay-color" data-overlaycolor="<?php echo esc_attr($overlay_color) ?>" style="width: calc(100% - <?php echo esc_attr($overlay_width); ?>px);bottom: <?php esc_attr($padding_items); ?>;">
                  <div class="wd-portfolio-grid-item-text-container">
                    <div class="large-12">
                      <div class="large-9 column">
                        <div class="wd-portfolio-grid-item-text">
                          <<?php echo esc_attr($portfolio_title_tag); ?> class="portfolio-title">
                            <a href="<?php the_permalink(); ?>" style="<?php echo esc_attr($custom_portfolio_title_inline_style); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                          </<?php echo esc_attr($portfolio_title_tag); ?>>
                        </div>

                        <div class="wd-portfolio-grid-item-tags" style="<?php echo esc_attr($custom_portfolio_tags_inline_style); ?>">
                          <?php
                          $terms = get_the_terms( get_the_ID(), 'portfolio_categories' );
                          if ( $terms && ! is_wp_error( $terms ) ) {
                          foreach ( $terms as $term ) {
                          echo esc_attr($term->name) . "<span> ,</span>";
                          }
                          ?>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="large-3 column text-right">
                        
                        <?php if ($ajzaa_portfolio_view == "yes"){ ?>
                          <a class="view" href="<?php echo esc_attr($image); ?>" data-lightbox="example-1"><i class="ion-ios-plus-empty"></i></a>
                        <?php } ?>
                        <?php if ($ajzaa_portfolio_link == "yes"){ ?>
                          <a class="link" href="<?php the_permalink(); ?>"><i class="ion-ios-redo-outline"></i></a>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
                break;

              default:
                ?>
                <div class="wd-portfolio-grid-item-image">
                  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php $thumb = get_post_thumbnail_id(); $img_url = wp_get_attachment_url( $thumb,'full' ); $image = ajzaa_resize( $img_url, 946, 802, true, true, true ); ?>
                    <img src="<?php echo esc_attr($image) ?>" alt="<?php the_title(); ?>"/>
                    <div class="overlay-color" data-overlaycolor="<?php echo esc_attr($overlay_color) ?>">
                      <span><i class="ion-ios-plus-empty"></i></span>
                    </div>
                  </a>
                </div>
                <div class="wd-portfolio-grid-item-text-container">
                  <div class="wd-portfolio-grid-item-text">

                    <<?php echo esc_attr($portfolio_title_tag); ?> class="portfolio-title">
                    <a href="<?php the_permalink(); ?>" style="<?php echo esc_attr($custom_portfolio_title_inline_style); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    </<?php echo esc_attr($portfolio_title_tag); ?>>
                  </div>

                  <div class="wd-portfolio-grid-item-tags" style="<?php echo esc_attr($custom_portfolio_tags_inline_style); ?>">
                    <?php
                    $terms = get_the_terms( get_the_ID(), 'portfolio_categories' );
                    if ( $terms && ! is_wp_error( $terms ) ) {
                      foreach ( $terms as $term ) {
                        echo esc_attr($term->name) . "<span> ,</span>";
                      }
                    ?>
                    <?php } ?>
                  </div>
                </div>
                <?php
                break;
            }
             ?>
      </li>
      <?php endwhile;
      ?>
      
      
    <?php if ($ajzaa_static_html_item_position == "after"){ ?>
      <li class="static-html-item wd-portfolio-grid-item <?php echo esc_attr($ajzaa_static_html_item_width) ?>">
      <div style="static-html-item-container" style="background-color: <?php echo esc_attr($ajzaa_static_html_item_bg_color); ?>">
        <?php echo esc_attr($ajzaa_static_html_item) ; ?>
      </div>
      </li>
    <?php } ?>
    </ul>
    <?php
    if($load_more_style == "load_more_link") { ?>
    <div class="load-more-container">
      <a href="#" class="load-more">View More</a>
    </div>
    <?php }





?>


  <?php 
    $wp_query = null; $wp_query = $temp;
    wp_reset_query();
  ?>