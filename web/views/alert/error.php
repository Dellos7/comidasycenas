<?php if( SessionUtils::get('error') ):?>
    <div class="error"> <?=SessionUtils::get('error')?> </div>
    <?php SessionUtils::remove('error') ?>
<?php endif; ?>