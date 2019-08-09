<?php 
    if( wsju_page_slug() == 'students' ) {
        $buttonColor = "bgcolor__stu";
    } else if (wsju_page_slug() == 'professors'){
        $buttonColor = "bgcolor__pro";
    } else if (wsju_page_slug() == 'universities'){
        $buttonColor = "bgcolor__uni";
    } 
?>

<section class="module__1">
    <div class="container pt-2 pb-5">
        <div class="row section-name__wrapper pt-5 pb-1">
        <h2 class="section-name text-center font__rb mr-auto ml-auto mb-4">
            <?php the_field( 'module_1_title' ); ?>
        </h2>
        </div>
        <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="icons-wrapper">
            <img class="mod1__icon mt-5 mb-4" src="<?php the_field( 'module_1_icon_1' ); ?>" height="100" alt="Unlimited access to WSJ.com and the WSJ App" title="WSJ App">
            <p class="font__rl mod1__bodycopy text-center mb-4">
                <?php the_field( 'module_1_bodycopy_1' ); ?>
            </p>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="icons-wrapper">
            <img class="mod1__icon mt-5 mb-4" src="<?php the_field( 'module_1_icon_2' ); ?>" height="100" alt="Exclusive events, offers and complimentary e-books" title="WSJ+">
            <p class="font__rl mod1__bodycopy text-center mb-4">
                <?php the_field( 'module_1_bodycopy_2' ); ?>
            </p>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="icons-wrapper">
            <img class="mod1__icon mt-5 mb-4" src="<?php the_field( 'module_1_icon_3' ); ?>" height="100" alt="Curated WSJ newsletters, including The 10-Point" title="WSJ newsletters">
            <p class="font__rl mod1__bodycopy text-center mb-4">
                <?php the_field( 'module_1_bodycopy_3' ); ?>
            </p>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="icons-wrapper">
            <img class="mod1__icon mt-5 mb-4" src="<?php the_field( 'module_1_icon_4' ); ?>" height="100" alt="<?php the_field( 'module_1_bodycopy_4' ); ?>" title="<?php the_field( 'module_1_bodycopy_4' ); ?>">
            <p class="font__rl mod1__bodycopy text-center mb-4">
                <?php the_field( 'module_1_bodycopy_4' ); ?>
            </p>
            </div>
        </div>
        </div>
        <?php if( wsju_page_slug() == 'students' || wsju_page_slug() == 'professors' || wsju_page_slug() == 'universities' ): ?>
        <div class="row mt-5">

        <a href="<?php the_field( 'module_1_button_url' ); ?>" target="_self" class="ml-auto mr-auto" id="<?php echo wsju_link_id( 'membership', 'button' ); ?>" onclick="utag.link({'event_name' : 'wsjedu_search school here'})">
            <button type="button" class="<?php echo $buttonColor; ?> cta btn font__rm text-center mb-4 text-white">
                <p><?php the_field( 'module_1_button_text' ); ?></p>
                <div class="js-button-hover-bg"></div>
            </button>
        </a>
        
        </div>
        <?php endif; ?>
    </div>

</section>