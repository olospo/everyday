<?php /* Template Name: Contact */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<section class="contact hero single">
  <div class="container">
    <div class="content ten columns">
      <h1>Let's connect</h1>
    </div>
  </div>  
</section>

<section class="contact form">
  <div class="container">
    <div class="content one-half column">
      <h2>How can we help?</h2>
      <p>We’d love to learn more and discover what we can design together.</p>
      <form action="#" method="POST" class="contact-form">
        <label>Your name</label>
        <input type="text" name="name" required>
        <label>Email</label>
        <input type="email" name="email" required>
        <label>Company name</label>
        <input type="text" name="company" required>
        <label>How did you hear about us?</label>
        <input type="text" name="hear">
        <label>How can we work together?</label>
        <textarea name="message" required></textarea>
        <button type="submit">Submit</button>
      </form>
    </div>
    <div class="bg one-half column"></div>
  </div>
</section>


<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>