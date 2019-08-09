<?php 
    if( wsju_page_slug() == 'students' ) {
        $buttonColor = "bgcolor__stu";
    } else if (wsju_page_slug() == 'professors'){
        $buttonColor = "bgcolor__pro";
    } else if (wsju_page_slug() == 'universities'){
        $buttonColor = "bgcolor__uni";
    } 

    $i = 0
?>

<?php if( have_rows('two_column_modules') ): ?>

    <?php while( have_rows('two_column_modules') ): the_row(); 
        $i++;
        $layout = get_sub_field('layout');
        $title = get_sub_field('title');
        $bodycopy = get_sub_field('bodycopy');
        $button_text = get_sub_field('button_text');
        $button_url = get_sub_field('button_url');
        $blankOrSelf = get_sub_field('open_new_or_self');
        $image = get_sub_field('image');
        $image_size = get_sub_field('image_size');
        $background_color = get_sub_field('background_color');

        if( $background_color == 'White' ) {
            $bgcolor = "bgcolor__white";
        } else if ( $background_color == 'White Smoke' ) {
            $bgcolor = "bgcolor__lgrey";
        } else if ( $background_color == 'Island Spice' ){
            $bgcolor = "bgcolor__ivory";
        } 

        if( $layout == 'Position Text on the Right' ){ 
            $displayLeft =  "";
            $displayRight =  "display:none";
        } else {
            $displayLeft =  "display:none";
            $displayRight =  "";
        }
    ?>

    <section class="two-col-mod__<?php echo $i; ?> <?php echo $bgcolor; ?>">

        <div class="container">
          <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mod__img" style="<?php echo $displayLeft; ?>; background-image:url(<?php echo $image; ?>); background-size:<?php echo $image_size; ?>"></div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mod__texts pt-5 pb-5">
              <h2 class="mod__title font__rb mt-4 pb-1">
                <?php echo $title; ?>
              </h2>
              <p class="mod__bodycopy font__rl">
                <?php echo $bodycopy; ?>
              </p>
              
              <?php if ($button_url && $button_text) : ?>
                <a href="<?php echo $button_url; ?>" id="<?php echo wsju_link_id( 'two-column-module', $title ); ?>" target="<?php echo $blankOrSelf; ?>">
                    <button type="button" class="<?php echo $buttonColor; ?> cta btn mt-4 mb-4 font__rm text-center text-white">
                        <p><?php echo $button_text; ?></p>
                        <div class="js-button-hover-bg"></div>
                    </button>
                </a>
              <?php endif; ?>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mod__img" style="<?php echo $displayRight; ?>; background-image:url(<?php echo $image; ?>); background-size:<?php echo $image_size; ?>"></div>
          </div>
        </div>
    </section>

    <?php endwhile; ?>


<?php endif; ?>
