<div id="disqus_thread"></div>
<script>
    var disqus_config = function () {
        this.page.url = 'http://127.0.0.1/blog/{{ $post->slug }}';
        this.page.identifier = 'blog-{{ $post->slug }}';
    };
    (function () {
        var d = document, s = d.createElement('script');
        s.src = 'https://yncblog.disqus.com/embed.js';
        s.setAttribute('data-timestamp', + new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>
    请启用 JavaScript 查看 <a href="https://disqus.com/?ref_noscript">Disqus 驱动的评论框</a>。
</noscript>