<?php if (!defined('__TYPECHO_ROOT_DIR__'))
   exit; ?>
<?php $this->need('header.php'); ?>

<!-- 在链接页面引入额外css -->
<?php if ($this->is('page', 'links')): ?>
   <style>
      /* Link Card */
      #linkItemsArea {
         width: 100%;
         display: grid;
         grid-template-columns: 1fr 1fr;
         gap: 10px;
      }

      @media screen and (max-width: 700px) {
         #linkItemsArea {
            grid-template-columns: 1fr;
         }
      }

      .link-item {
         height: 100px;
         overflow: hidden;
         border: 1px solid black;
      }

      .link-item a {
         color: inherit !important;
      }

      .link-item-avatar {
         float: left;
         width: auto;
         height: auto;
         max-height: 100%;
         margin-right: 10px;
      }

      .link-item-content {
         height: 100%;
      }
   </style>
<?php endif; ?>

<div class="col-mb-12 col-8" id="main" role="main">
   <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
      <h1 class="post-title" itemprop="name headline">
         <a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
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
      let linkItemsHTML = "";
      for (const JsonItem of JSON.parse(`<?php $this->options->siteOutLinks() ?>`)) {
         linkItemsHTML += `<div class="link-item"><img class="link-item-avatar" src="${JsonItem.avatar}"><div class="link-item-content"><a href="${JsonItem.url}" target="_blank"><h2>${JsonItem.title}</h2></a><p>${JsonItem.description}</p></div></div>`;
      }
      document.getElementById('linkItemsArea').innerHTML = linkItemsHTML;
   </script>
<?php endif; ?>

<?php $this->need('footer.php'); ?>