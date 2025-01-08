<?php if (!defined('__TYPECHO_ROOT_DIR__'))
    exit; ?>

</div><!-- end .row -->
</div><!-- end #container -->

<div id="footer" role="contentinfo">
    &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
    <?php _e('<a href="https://github.com/MrXiaoM/typecho-theme-old-fashion">Old Fasion</a> Theme. Powered by <a href="http://www.typecho.org">Typecho</a>.'); ?>
</div><!-- end #footer -->

<?php $this->footer(); ?>
</div><!-- end outbox -->

<!-- 侧边栏 -->
<script>
    const sideBtn = document.getElementById('side-btn');
    sideBtn.addEventListener('click', () => {
        const sideFlag = document.getElementById('side-flag');
        const left = document.getElementById('left');
        var checked = sideFlag.checked;
        if (checked) {
            sideBtn.style.left = '245px';
            left.style.left = '0px';
        } else {
            sideBtn.style.left = '0px';
            left.style.left = '-245px';
        }
    });
</script>

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