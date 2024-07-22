<?php get_header(); ?>

<main id="site-content">

<div>
    <h1>A really professional structure<br> for all your events!</h1>
    
    <div class="image-1">
        <img class="png-1" src="<?php echo get_template_directory_uri(); ?>/images/png/1.png" alt="About Us Image">
    </div>
    <section class="about-us">
        <div class="about-details">
            <h2>About Us</h2>
            <p class="pg">Specializing in the creation of exceptional events for private and corporate<br> clients, we design, plan and manage every project from conception to<br> execution. </p>
        </div>
    </section>

    <section class="who">

        <section class="who-image">
            <img src="<?php echo get_template_directory_uri(); ?>/images/png/2.png" alt="Our Services Image">
        </section>

        <section class="who-details">
            
            <article class="who-are">
                <div class="who-are-details">
                    <h2>Who We Are ?</h2>
                    <p class="pg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse<br> eu convallis elit, at convallis magna.</p>
                </div>
            </article>

            <article class="our-vision">
                <div class="our-vision-details">
                    <h2>Our vision</h2>
                    <p class="pg"> Nullam faucibus interdum massa. Duis eget leo mattis, pulvinar nisi<br> et, consequat lectus. Suspendisse commodo magna orci, id luctus<br> risus porta pharetra. Fusce vehicula aliquet urna non ultricies.</p>
                </div>
            </article>
                
            <article class="our-mission">
                <div class="our-mission-details">
                    <h2>Our mission</h2>
                    <p class="pg">Vivamus et viverra neque, ut pharetra ipsum. Aliquam eget<br> consequat libero, quis cursus tortor. Aliquam suscipit eros sit amet<br> velit malesuada dapibus. Fusce in vehicula tellus. Donec quis lorem ut<br> magna tincidunt egestas. </p>
                </div>
            </article>

        </section> 
        
    </section>

    <section class="our-services">
        <h2>Our Services</h2>
        <?php get_template_part('template-parts/services-list'); ?>
    </section>

    <section class="our-partners">
        <h2>Our Partners</h2>
        <?php get_template_part('template-parts/partners-list'); ?>
    </section>


</div>

</main>

<?php get_footer(); ?>