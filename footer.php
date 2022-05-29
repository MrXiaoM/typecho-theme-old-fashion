<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

            </div><!-- end .row -->
    </div><!-- end #container -->
    
    <div id="footer" role="contentinfo">
        &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
        <?php _e('Powered by <a href="http://www.typecho.org">Typecho</a>.'); ?>.
</div><!-- end #footer -->
    
    <?php $this->footer(); ?>
</div><!-- end outbox -->

</body>
</html>
