<?php if( SessionUtils::get('success') ):?>
    <div class="success"> <?=SessionUtils::get('success')?> </div>
    <?php SessionUtils::remove('success') ?>
    <script>
        setTimeout( () => {
            document.querySelector( '.success' ).remove();
        }, 5000 );
    </script>
<?php endif; ?>