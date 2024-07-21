<?php
get_header();
?>
<main id="site-content" class="main-layout">
    
    <div class="error-404 not-found">
        <div class="container">
            <h1>404 Error.</h1>
            <p>The page you were looking for couldn't be found.</p>
            <p>Maybe try a search?</p>
            
            <div class="search-form-404">
                <?php get_search_form(); ?>
            </div>
            
            <div class="contact-info">
                <div class="contact-manager">
                    <h3>Manager</h3>
                    <p>+33 1 53 31 25 23</p>
                    <p>info@esgi.com</p>
                </div>
                <div class="contact-ceo">
                    <h3>CEO</h3>
                    <p>+33 1 53 31 25 25</p>
                    <p>ceo@company.com</p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
?>