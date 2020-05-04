<footer class="footer container">

        <div class="footer--col details">
            <?php dynamic_sidebar('footer-col-1'); ?>
            <!-- <hr class="dotted"> -->

        </div>
        <div class="footer--col subscribe">
            <?php dynamic_sidebar('footer-col-2'); ?>
        </div>
        <div class="footer--col social">
            <?php dynamic_sidebar('footer-col-3'); ?>

        </div>
</footer>

<?php if ( is_front_page() ) : ?>
    <div role="dialog" aria-live="polite" aria-label="cookieconsent" aria-describedby="cookieconsent:desc" class="cc-window cc-banner cc-type-info cc-theme-block cc-invisible" style=""><span id="cookieconsent:desc" class="cc-message">GoGoPLastics makes use of cookies. The cookie is for Google Analytics. We only use this to finetune our marketing.</span><div class="cc-compliance"><a aria-label="dismiss cookie message" role="button" tabindex="0" class="cc-btn cc-dismiss">I understand!</a></div></div>
<?php endif;?>

</div> <!-- End of .wrapper -->

		<?php wp_footer(); ?>

	</body>
</html>
