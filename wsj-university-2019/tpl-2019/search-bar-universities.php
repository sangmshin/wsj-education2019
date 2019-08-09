<section class="search-bar bgcolor__uni">
    <div class="container text-white text-center">
        <div class="row">
        <div class="col searchform__wrapper wrapper pt-3 pb-3 pt-sm-4 pb-sm-4">
            <p class="font__rl mb-0 mb-sm-0 mb-md-0 mr-sm-0 mr-md-4 mr-lg-4">
                <?php the_field( 'search_bar_copy' ); ?>
            </p>


            <!-- SEARCH BY REGION -->
      
            <?php get_template_part( 'tpl-2019/search-by-region' ); ?>

            <!-- SEARCH BY REGION -->
        
        
        </div>
        </div>
    </div>
</section>