<section class="quote-block">
  <div class="container">
    <div class="content">
      <div class="copy">
        <blockquote>
        <?php the_sub_field( 'copy' ); ?>
        </blockquote>
        <?php if ( have_rows( 'atrribution' ) ) : while ( have_rows( 'atrribution' ) ) : the_row(); ?>
        <cite><?php the_sub_field( 'name' ); ?></cite><br />
        <span><?php the_sub_field( 'title' ); ?></span>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
</section>