// Short Code for Products for home page
 function products_loop() {
    ob_start();
?>
<!-- start here -->
<div role="tabpanel">
  <!-- Nav tabs -->
                                   
  <ul class="nav nav-tabs product-nav-tabs" role="tablist">
    <li role="presentation" class="active">
      <a href="#all" aria-controls="all" role="tab" data-toggle="tab">All</a>
    </li>
      <?php $args = array(
        'hide_empty' => false
        );  ?>
       <?php $terms = get_terms( 'product_category', $args  );  

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
          foreach ( $terms as $term ) { ?>
        <li role="presentation">
          <a href="#<?php echo $term->slug; ?>" aria-controls="cotton-towels" role="tab" data-toggle="tab"><?php echo $term->name; ?></a>
        </li>
     <?php }}  wp_reset_postdata();?>
   <!--  <li role="presentation">
      <a href="#cotton-bath-robe" aria-controls="cotton-bath-robe" role="tab" data-toggle="tab">Cotton Bath Robe</a>
    </li>
    <li role="presentation">
      <a href="#cotton-kitchen-towels" aria-controls="cotton-kitchen-towels" role="tab" data-toggle="tab">Cotton Kitchen Towels</a>
    </li>
    <li role="presentation">
      <a href="#cotton-bath-rug" aria-controls="cotton-bath-rug" role="tab" data-toggle="tab">Cotton bath Rug</a>
    </li>
    <li role="presentation">
      <a href="#cotton-sheets" aria-controls="cotton-sheets" role="tab" data-toggle="tab">Cotton sheets</a>
    </li>
    <li role="presentation">
      <a href="#cottons-cloths" aria-controls="cottons-cloths" role="tab" data-toggle="tab">Cottons Cloths</a>
    </li>     -->
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="all">
      <div class="row product-area">
<?php 
     $products = array( 'post_type' => 'product', 'posts_per_page' => -1);

     $products_query = new WP_Query($products);
  
?>

<?php if($products_query->have_posts()): while($products_query-> have_posts()): $products_query->the_post(); ?>
<?php $thumbnail = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID())); ?>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 pro-box">
          <div class="inner-pro-box">
            <div class="pro-img-box">
              <img class="img-responsive" src="<?php echo $thumbnail; ?>" alt="">
              <div class="pro-overlay">
                <a href="#" class="btn btn-default">Quick View</a>
              </div>
            </div>
            <div class="pro-caption">
              <h2><?php the_title(); ?></h2>
              <ul class="list-inline list-unstyled color-list">
                <li class="orange"></li>
                <li class="maroon"></li>
                <li class="light-magentaish"></li>
                <li class="green"></li>
                <li class="see-green"></li>
                <li class="yellow"></li>
              </ul>
            </div>
          </div>
        </div>
<?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>
     <?php $args = array(
        'hide_empty' => false
        );  ?>

  <?php $terms = get_terms( 'product_category', $args ); //taxonomy name

  if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
  foreach ( $terms as $term ) { ?>

    <div role="tabpanel" class="tab-pane" id="<?php echo $term->slug; ?>">
      <div class="row product-area">
        
        <?php $all_courses = array(
          'post_type' => 'product',
          'posts_per_page' => -1, //get limit
          'tax_query' => array(               
            array(
                'taxonomy' => 'product_category', //taxonomy name
                'field' => 'slug',
                'terms' => $term->slug,
              ),
            ),
          );
        $all_courses_query = new WP_Query( $all_courses );
             
        if ( $all_courses_query->have_posts() ) : ?>
           <?php while ( $all_courses_query->have_posts() ) : $all_courses_query->the_post(); ?>
        <?php $thumbnail = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID())); ?>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 pro-box">
          <div class="inner-pro-box">
            <div class="pro-img-box">
              <img class="img-responsive" src="<?php echo $thumbnail; ?>" alt="">
              <div class="pro-overlay">
                <a href="#" class="btn btn-default">Quick View</a>
              </div>
            </div>
            <div class="pro-caption">
            <h2><?php the_title(); ?></h2>
              <ul class="list-inline list-unstyled color-list">
                <li class="orange"></li>
                <li class="maroon"></li>
                <li class="light-magentaish"></li>
                <li class="green"></li>
                <li class="see-green"></li>
                <li class="yellow"></li>
              </ul>
            </div>
          </div>
        </div>
      <?php endwhile; endif; ?>
      </div>
    </div>
      <?php }}  ?> 
    <!-- <div role="tabpanel" class="tab-pane" id="cotton-bath-robe"></div> -->
    <!-- <div role="tabpanel" class="tab-pane" id="cotton-kitchen-towels">4</div> -->
    <!-- <div role="tabpanel" class="tab-pane" id="cotton-bath-rug">5</div> -->
    <!-- <div role="tabpanel" class="tab-pane" id="cotton-sheets">6</div> -->
    <!-- <div role="tabpanel" class="tab-pane" id="cottons-cloths">7</div> -->
  </div>
</div>
<!-- end here --> 
    <?php $myvariable = ob_get_clean();
    return $myvariable; ?>
<?php }   
add_shortcode( '3payramids_products_loop', 'products_loop' );


<script>
  jQuery(document).ready(function($){     
   $( ".nav-tabs li" ).first().addClass( "active" );
   $( ".tab-content .tab-pane" ).first().addClass( "active" );

    
});
</script>
