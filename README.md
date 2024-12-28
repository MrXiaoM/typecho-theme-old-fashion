# Old Fasion Theme (Runoneall 改)

- 适配Typecho 1.2.1版本, 修复部分bug
- 移除jQuery依赖，使用原生JavaScript
- 将搜索框移到侧边栏下方, 避免遮挡文章标题
- 新增友链支持
- 默认展示全部文章
- 默认截取文章前150字, 优化性能
- 简短footer
- 将侧边栏链接居中
- 一些小的css调整

# 友链写法
新增links独立页面

```html
!!! <!-- 使用!!!开头(必须) -->

<hr class="link-separator">
<div class="link-item">
<img class="link-item-avatar" src="这里是头像地址">
<div class="link-item-content">
<a href="这里是友链地址">
<h2>这里是友链标题</h2></a><p>这里是友链介绍</p>
</div></div>

!!! <!-- 使用!!!结束(必须) -->
```