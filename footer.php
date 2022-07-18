<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

            </div><!-- end .row -->
    </div><!-- end #container -->
    
    <div id="footer" role="contentinfo">
        &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
	<?php _e('Powered by <a href="http://www.typecho.org">Typecho</a>.'); ?>
        <br/>
        正在使用 <a href="https://github.com/MrXiaoM/typecho-theme-old-fashion" target="_blank">看起来好像有点复古的主题</a>
</div><!-- end #footer -->
    
    <?php $this->footer(); ?>
</div><!-- end outbox -->

<?php if ($this->options->extraScript): ?>
    <script>
        <?php $this->options->extraScript(); ?>
    </script>
<?php endif; ?>
<?php if ($this->options->extraHtml): ?>
    <?php $this->options->extraHtml(); ?>
<?php endif; ?>
</body>
</html>
