<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('站点 LOGO 地址'),
        _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO')
    );

    $form->addInput($logoUrl);
    
    $showRecentPosts = new \Typecho\Widget\Helper\Form\Element\Text(
        'showRecentPosts',
        null,
        '最新文章',
        _t('显示最新文章'),
        _t('填写字符修改标题，留空为不显示')
    );
    
    $showRecentComments = new \Typecho\Widget\Helper\Form\Element\Text(
        'showRecentComments',
        null,
        '最近回复',
        _t('显示最近回复'),
        _t('填写字符修改标题，留空为不显示')
    );
    $showCategory = new \Typecho\Widget\Helper\Form\Element\Text(
        'showCategory',
        null,
        '分类',
        _t('显示分类'),
        _t('填写字符修改标题，留空为不显示')
    );
    $showArchive = new \Typecho\Widget\Helper\Form\Element\Text(
        'showArchive',
        null,
        '归档',
        _t('显示归档'),
        _t('填写字符修改标题，留空为不显示')
    );
    $showOther = new \Typecho\Widget\Helper\Form\Element\Text(
        'showOther',
        null,
        '其它',
        _t('显示其它杂项'),
        _t('填写字符修改标题，留空为不显示')
    );
    $form->addInput($showRecentPosts);
    $form->addInput($showRecentComments);
    $form->addInput($showCategory);
    $form->addInput($showArchive);
    $form->addInput($showOther);
}

/*
function themeFields($layout)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('站点LOGO地址'),
        _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO')
    );
    $layout->addItem($logoUrl);
}
*/
