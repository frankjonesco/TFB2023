<hr>
<div class="flex items-center text-xl font-bold">
    <i class="fa-solid fa-share-nodes mr-3"></i>
    Share:
    <ul class="ml-6 flex">
        <li class="mr-2">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&display=popup" target="_blank">
                <button class="rounded-xs" style="background:#1877f2 !important;">
                    <i class="fa-brands fa-facebook-f mr-1"></i>
                    Share on Facebook
                </button>
            </a>
        </li>
        <li class="mr-2">
            <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false" target="_blank">
                <button class="rounded-xs" style="background:#1da1f2 !important;">
                    <i class="fa-brands fa-twitter mr-1"></i>
                    Share on Twitter
                </button>
            </a>
        </li>
        <li class="mr-2">
            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{urlencode(url()->current())}}&title={{$article->title}}&summary={{truncate(strip_tags($article->body), 160)}}&source=" target="_blank">
                <button class="rounded-xs" style="background:#0a66c2 !important;">
                    <i class="fa-brands fa-linkedin mr-1"></i>
                    Share on Linkedin
                </button>
            </a>
        </li>
        <li class="mr-2">
            <a href="https://www.xing.com/spi/shares/new?url={{urlencode(url()->current())}}" target="_blank">
                <button class="rounded-xs" style="background:#126567 !important;">
                    <i class="fa-brands fa-xing mr-1"></i>
                    Share on Xing
                </button>
            </a>
        </li>
    </ul>
</div>
