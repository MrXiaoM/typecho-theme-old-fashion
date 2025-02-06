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
    function changeSideStatus() {
        const sideBtn = document.getElementById('side-btn');
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
    }
</script>

<!-- 暗色主题 -->
<script>
    function changeDarkMode() {
        const head = document.getElementsByTagName('head')[0];
        const darkStyle = document.getElementById('dark-style');
        if (darkStyle) {
            head.removeChild(darkStyle);
            document.cookie = 'colorScheme=light; path=/; expires=0';
        } else {
            const link = document.createElement('link');
            link.id = 'dark-style';
            link.rel = 'stylesheet';
            link.href = "<?php $this->options->themeUrl('style/dark.css'); ?>";
            head.appendChild(link);
            document.cookie = 'colorScheme=dark; path=/; expires=0';
        }
    }
    function isDarkMode() {
        const cookies = document.cookie.split(';');
        for (let i = 0; i < cookies.length; i++) {
            let cookie = cookies[i].trim();
            if (cookie.startsWith("colorScheme=")) {
                const value = cookie.substring("colorScheme=".length);
                return value === "dark";
            }
        }
        return false;
    }
    if (isDarkMode()) {
        changeDarkMode();
    }
</script>

<?php if ($this->options->extraScript): ?>
    <script>
        <?php $this->options->extraScript(); ?>
    </script>
<?php endif; ?>
<?php if ($this->options->extraHtml): ?>
    <?php $this->options->extraHtml(); ?>
<?php endif; ?>

<!-- 代码高亮 -->
<script src="<?php $this->options->themeUrl('script/highlight.js'); ?>"></script>
<script>hljs.highlightAll();</script>

</body>

</html>