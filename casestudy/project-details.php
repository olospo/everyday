<ul>
  <?php $date = get_field( 'project_date' ); ?>
  <?php if ( $date ) { ?>
    <li><?php echo $date; ?></li>
  <?php } ?>
  <?php $industries = get_the_terms(get_the_ID(), 'industry'); if ($industries && !is_wp_error($industries)) {
    foreach ($industries as $industry) { echo '<li>' . esc_html($industry->name) . '</li>'; }
  } ?>
  <?php $types = get_the_terms(get_the_ID(), 'specialty');
  if ($types && !is_wp_error($types)) { foreach ($types as $type) {
    echo '<li>' . esc_html($type->name) . '</li>'; }
  } ?>
  <?php $link = get_field( 'site_url' ); if ( $link ) { ?>
    <li><a href="<?php echo $link; ?>">View Site</a></li>
  <?php } ?>
</ul>