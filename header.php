<?php if (!defined('__TYPECHO_ROOT_DIR__'))
    exit; ?>
<?php function isMSIE()
{
    $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
    return strpos($user_agent, 'trident') || strpos($user_agent, 'msie');
} ?>

<!DOCTYPE HTML>
<html lang="zh">

<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Sitemap -->
    <link rel="sitemap" type="application/xml" title="sitemap" href="<?php $this->options->siteUrl(); ?>sitemap.xml">

    <title><?php $this->archiveTitle([
        'category' => _t('分类 %s 下的文章'),
        'search' => _t('包含关键字 %s 的文章'),
        'tag' => _t('标签 %s 下的文章'),
        'author' => _t('%s 发布的文章')
    ], '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('normalize.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('grid.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">

    <!-- 设置favicon -->
    <link rel="shortcut icon" href="/favicon.ico">

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
    <?php if ($this->options->extraStyle): ?>
        <style>
            <?php $this->options->extraStyle(); ?>
        </style>
    <?php endif; ?>
</head>

<body>

    <?php if (isMSIE()): ?>
        <h1>You are using Microsoft IE browser, some functions will be limited!</h1>
    <?php endif; ?>

    <div id="outbox">
        <div id="header" class="clearfix">
            <div class="container">
                <div class="row">
                    <div class="site-name">
                        <?php if ($this->options->logoUrl): ?>
                            <a id="logo" href="<?php $this->options->siteUrl(); ?>">
                                <img src="/blog_header.png" alt="<?php $this->options->title() ?>" />
                            </a>
                        <?php else: ?>
                            <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
                            <p class="description">
                                <?php 
                                if ($this->options->siteIntroduce) {
                                    $IntroduceLines = array_filter(explode("\n", str_replace("\r\n", "\n", $this->options->siteIntroduce)));
                                    echo $IntroduceLines[array_rand($IntroduceLines)]; 
                                } else {
                                    $this->options->description();
                                }
                                ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div><!-- end .row -->
            </div>
        </div><!-- end #header -->
        <div id="side-btn">
            <input id="side-flag" type="checkbox" />
            <label id="side-control" for="side-flag">≡</label>
        </div>
        <div id="left">
            <div id="left-links">
                <a<?php if ($this->is('index')): ?> class="current" <?php endif; ?>
                    href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                    <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
                    <?php while ($pages->next()): ?>
                        <br />
                        <a<?php if ($this->is('page', $pages->slug)): ?> class="current" <?php endif; ?>
                            href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>">
                            <?php $pages->title(); ?></a>
                        <?php endwhile; ?>

                        <?php
                        if ($this->options->extraSideHtml):
                            print ('<br/>');
                            $this->options->extraSideHtml();
                        endif;
                        ?>
                <button id="dark-btn">更换主题</button>
            </div>

            <?php if ($this->options->showRecentPosts): ?>
                <hr />
                <h4 class="widget-title"><?php $this->options->showRecentPosts(); ?></h3>
                    <ul class="widget-list">
                        <?php \Widget\Contents\Post\Recent::alloc()
                            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
                    </ul>
                <?php endif; ?>

                <?php if ($this->options->showRecentComments): ?>
                    <hr />
                    <h4 class="widget-title"><?php $this->options->showRecentComments(); ?></h3>
                        <ul class="widget-list">
                            <?php \Widget\Comments\Recent::alloc()->to($comments); ?>
                            <?php while ($comments->next()): ?>
                                <li>
                                    <a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>:
                                    <?php $comments->excerpt(35, '...'); ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if ($this->options->showCategory): ?>
                        <hr />
                        <h4 class="widget-title"><?php $this->options->showCategory(); ?></h3>
                            <?php \Widget\Metas\Category\Rows::alloc()->listCategories('wrapClass=widget-list'); ?>
                        <?php endif; ?>

                        <?php if ($this->options->showArchive): ?>
                            <hr />
                            <h4 class="widget-title"><?php $this->options->showArchive(); ?></h3>
                                <ul class="widget-list">
                                    <?php \Widget\Contents\Post\Date::alloc('type=month&format=F Y')
                                        ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
                                </ul>
                            <?php endif; ?>

                            <?php if ($this->options->showOther): ?>
                                <hr />
                                <h3 class="widget-title"><?php $this->options->showOther(); ?></h3>
                                <ul class="widget-list">
                                    <?php if ($this->user->hasLogin()): ?>
                                        <li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?>
                                                (<?php $this->user->screenName(); ?>)</a></li>
                                        <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
                                    <?php else: ?>
                                        <li class="last"><a
                                                href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
                                    <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a>
                                    </li>
                                    <li><a href="http://www.typecho.org">Typecho</a></li>
                                </ul>
                            <?php endif; ?>
                            <hr>
                            <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                                <input type="text" id="s" name="s" class="text" placeholder="<?php _e('输入关键字搜索'); ?>" />
                                <button type="submit" class="submit"></button>
                            </form>
        </div>
        <div id="right">
            <div class="row" <?php if (isMSIE()) {
                echo ' style="line-height: 20px; margin-top: 10px;"';
            } ?>>