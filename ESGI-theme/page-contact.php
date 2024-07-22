<?php
/*
Template Name: Contact
*/
get_header(); ?>

<section class="contact">
    <h1>Contacts.</h1>
    <p>A desire for a big big party or a very select congress? Contact us.</p>
    <div class="info">
        <div class="location">
            <h2>Location</h2>
            <p>242 Rue du Faubourg Saint-Antoine<br>75020 Paris FRANCE</p>
        </div>
        <div class="contact-details">
            <div class="manager">
                <h2>Manager</h2>
                <p>+33 1 53 31 25 23<br>info@company.com</p>
            </div>
            <div class="ceo">
                <h2>CEO</h2>
                <p>+33 1 53 31 25 25<br>ceo@company.com</p>
            </div>
        </div>
    </div>
    <div class="image">
        <img src="<?php echo get_template_directory_uri(); ?>/images/png/10.png" alt="Event image">
    </div>
    <div class="form-container">
        <h2>Write us here</h2>
        <p>Go! Don't be shy.</p>
        <form action="#">
            <input type="text" name="subject" placeholder="Subject">
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="phone" placeholder="Phone no.">
            <textarea name="message" placeholder="Message"></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
</section>

<?php get_footer(); ?>