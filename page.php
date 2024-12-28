<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<!-- 在链接页面引入额外css -->
<?php if ($this->is('page', 'links')): ?>
  <style>
    /* Link Card */
    .link-separator {
       background: gray;
       width: 97% !important;
       height: 1px;
    }
    .link-item {
       display: flex;
       flex-direction: row;
       width: auto;
       height: 100px;
    }
    .link-item a {
       color: inherit !important;
    }
    .link-item-avatar {
       flex: 1;
       object-fit: contain;
    }
    .link-item-content {
       flex: 3;
       display: flex;
       flex-direction: column;
       padding-left: 10px;
    }
  </style>
<?php endif; ?>

<div class="col-mb-12 col-8" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline">
            <a itemprop="url"
               href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
        </h1>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->

<!-- 在链接页面引入额外js -->
<?php if ($this->is('page', 'links')): ?>
  <script>
    const linkItems = document.querySelectorAll('.link-item-content');
    linkItems.forEach(item => {
      const links = item.querySelectorAll('a');
      links.forEach(link => {
        link.target = '_blank';
      });
    });
  </script>
<?php endif; ?>

<?php $this->need('footer.php'); ?>
