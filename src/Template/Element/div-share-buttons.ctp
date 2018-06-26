<?php
    if(!isset($share_text)) $share_text=META_TITLE;
    if(!isset($image)) $image="";
    if(!isset($page_url)) $page_url="";
    if(!isset($title)) $title=$share_text;
 ?>
 <strong>Partager :</strong>
<div class="share-buttons">
    <ul>
        <li>
            <a href= <?= $this->SocialShare->href('facebook', $page_url, ['image'=>$image_url, 'text'=>urlencode(h($share_text)), 'title'=>urlencode(h($title))]) ?> target="_blank" >
                <button class="btn-share btn-facebook facebook-share">
                    <svg class="icon-facebook" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-facebook"></use></svg>
                </button>
            </a>
        </li>
        <li>
            <a href= <?= $this->SocialShare->href('twitter', $page_url, ['image'=>urlencode($image_url), 'text'=>urlencode(h($share_text)), 'title'=>urlencode(h($title))]) ?> target="_blank" >
                <button class="btn-share btn-twitter twitter-share" aria-label="Partager sur Twitter">
                    <svg class="icon-twitter" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-twitter"></use></svg>
                </button>
            </a>
        </li>
        <li>
            <a href= <?= $this->SocialShare->href('gplus', $page_url, ['image'=>$image_url, 'text'=>urlencode(h($share_text)), 'title'=>urlencode(h($title))]) ?> target="_blank" >
                <button class="btn-share btn-googleplus googleplus-share" aria-label="Partager sur Google+" >
                    <svg class="icon-googleplus" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-googleplus"></use></svg>
                </button>
            </a>
        </li>
        <li>
            <a href= <?= $this->SocialShare->href('linkedin', $page_url, ['image'=>$image_url, 'text'=>urlencode(h($share_text)), 'title'=>urlencode(h($title))]) ?> target="_blank" >
                <button class="btn-share btn-linkedin linkedin-share" aria-label="Partager sur LinkedIn">
                    <svg class="icon-linkedin" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-linkedin"></use></svg>
                </button>
            </a>
        </li>
    </ul>
</div>
