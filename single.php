<?php
get_header();
?>

<?php
if (have_posts()) :
  while (have_posts()) : the_post(); ?>

  <article class="post">
    single.php
    <h2>
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h2>
    <p class="post-info">
      <?php the_time( 'F jS, Y g:i a' ) ?> | <a href="<?php echo get_author_posts_url( get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
      <?php
      // required variables
        $categories = get_the_category(  );
        $separator = ", ";
        $output = "";

        if ($categories) {
          echo "| Category: ";
          foreach ($categories as $category) {
            $output .= '<a href="' . get_category_link($category->term_id).'">' . $category->cat_name . '</a>' . $separator;
          }
          echo trim($output, $separator);
        }
      ?>
    </p>
    <?php the_post_thumbnail('banner') ?>
    <!-- alternative the_content function is for all content -->
    <p>
      <?php the_content(); ?>
    </p>

  </article>


  <?php endwhile;
  else :
  echo "<p>No content</p>";
endif;
  ?>

<?php
get_footer();
?>
