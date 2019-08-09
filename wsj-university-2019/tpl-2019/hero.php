
<style>
    .hero {
        background-image: url(<?php the_field( 'hero_image' ); ?>);
    }
    @media (max-width:768px){
        .hero {
            background-image: url(<?php the_field( 'hero_image_mobile' ); ?>);
        }
    }
</style>


<div class="container-fluid hero">
    <div class="hero__wrapper text-center">
    <div class="hero__headline mb-3">
        
        <h1 class="font__rb pt-0 pt-sm-1 pt-md-5">
            <?php the_field( 'hero_headline' ); ?>
        </h1>
    </div>
    <div class="hero__subheadline ml-auto mr-auto">
        <h3 class="font__rl">
        <?php the_field( 'hero_subheadline' ); ?>
        </h3>
    </div>
    <div class="hero__bodycopy">
        <p class="font__rl">
        <?php the_field( 'hero_bodycopy' ); ?>
        </p>
    </div>
    </div>
</div>