<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;

class MonCarnetHelper extends Helper
{
    public $helpers = ['Html'];

    public function makeEdit($title, $url)
    {
        // Utilise le Helper Html pour afficher la sortie
        // des données formatées:

        $link = $this->Html->link($title, $url, ['class' => 'edit']);

        return '<div class="editOuter">' . $link . '</div>';
    }
    public function updateAllMediaDir(){
        $articles = TableRegistry::get('Articles');

        $query = $articles
        ->find('all')
        ->toArray();

        foreach($query as $article)
        {
            if(!is_dir($article->full_media_path)){
                new Folder(WWW_ROOT . 'img/'. $article->full_media_path, true, 0755);
            }
        }
    }

    public function socialIcons($article, $class="zoom", $divClass="social-icons-container"){
        $social_icons="";

        if(!empty($article->website_url))
        {
            $social_icons.= $this->Html->div($divClass,
            $this->Html->link(
                $this->Html->image('social_icon_website.svg', ['alt'=>'Website', 'class'=>$class]),
                $article->website_url,
                ['target'=>'_blank', 'escapeTitle'=>false]
                )
            );
        }

        if(!empty($article->facebook_url))
        $social_icons.= $this->Html->div($divClass,
        $this->Html->link(
            $this->Html->image('social_icon_facebook.svg', ['alt'=>'Facebook', 'class'=>$class]),
            $article->facebook_url,
            ['target'=>'_blank', 'escapeTitle'=>false]
            )
        );

        if(!empty($article->instagram_url))
        $social_icons.= $this->Html->div($divClass,
        $this->Html->link(
            $this->Html->image('social_icon_instagram.svg', ['alt'=>'Instagram', 'class'=>$class]),
            $article->instagram_url,
            ['target'=>'_blank', 'escapeTitle'=>false]
            )
        );

        if(!empty($article->blog_url)){
            $social_icons.= $this->Html->div($divClass,
            $this->Html->link(
                $this->Html->image('social_icon_blog.svg', ['alt'=>'Blog', 'class'=>$class]),
                $article->blog_url,
                ['target'=>'_blank', 'escapeTitle'=>false]
                )
            );
        }

        if(!empty($article->tweeter_url)){
            $social_icons.= $this->Html->div($divClass,
            $this->Html->link(
                $this->Html->image('social_icon_tweeter.svg', ['alt'=>'Blog', 'class'=>$class]),
                $article->tweeter_url,
                ['target'=>'_blank', 'escapeTitle'=>false]
                )
            );
        }

        if(!empty($article->pinterest_url)){
            $social_icons.= $this->Html->div($divClass,
            $this->Html->link(
                $this->Html->image('social_icon_pinterest.svg', ['alt'=>'Pinterest', 'class'=>$class]),
                $article->pinterest_url,
                ['target'=>'_blank', 'escapeTitle'=>false]
                )
            );
        }

        if(!empty($article->youtube_url)){
            $social_icons.= $this->Html->div($divClass,
            $this->Html->link(
                $this->Html->image('social_icon_youtube.svg', ['alt'=>'Youtube', 'class'=>$class]),
                $article->youtube_url,
                ['target'=>'_blank', 'escapeTitle'=>false]
                )
            );
        }

        if(!empty($article->etsy_url)) {
            $social_icons.= $this->Html->div($divClass,
            $this->Html->link(
                $this->Html->image('social_icon_etsy.svg', ['alt'=>'Etsy', 'class'=>$class]),
                $article->etsy_url,
                ['target'=>'_blank', 'escapeTitle'=>false]
                )
            );
        }

        if(!empty($article->tripadvisor_url)){
            $social_icons.= $this->Html->div($divClass,
            $this->Html->link(
                $this->Html->image('social_icon_tripadvisor.svg', ['alt'=>'Tripadvisor', 'class'=>$class]),
                $article->website_url,
                ['target'=>'_blank', 'escapeTitle'=>false]
                )
            );
        }


        return $social_icons;
    }

    public function para($row, $class=""){
        $displayText="";
        if(!empty($row)){
            return $this->Html->para($class, $row);
        }
    }

    public function externLink($row, $class=""){
        if(!empty($row)){
            return $this->Html->link($row, $row, ['target'=>"_blank", 'class'=>$class]);
        }
    }

    public function mail($row, $class=""){
        $displayText="";
        if(!empty($row)){
            return $this->Html->link($row, 'mailto:'.$row, ['target'=>"_blank"]);
        }
    }
    public function linkToArticle($article, $options=[]){
        return $this->Html->link(
            $article->title,
            ['controller'=>'Articles', 'action'=>'view', $article->slug],
            $options
        );
    }

    public function linkToCategory($category, $options=[]){
        return $this->Html->link(
            $category->name,
            ['controller'=>'Categories', 'action'=>'adresses', $category->slug],
            $options
        );
    }

    public function carrouselFromArticles($articles, $class=""){
        $slidesToShow=array();

        foreach($articles as $article){
            array_push($slidesToShow, ['image_url'=>$article->media[0]->file, 'article'=>$article, 'caption'=>true]);
        }

        return $this->_View->element('coupdecoeur-carrousel', ['articles'=>$slidesToShow, 'class'=>$class]);
    }

    public function carrouselFromArticle($article=[], $class=""){
        $slidesToShow=array();

        foreach($article->media as $media){
            array_push($slidesToShow, ['image_url'=>$media->file, 'caption'=>false]);
        }

        return $this->_View->element('coupdecoeur-carrousel', ['articles'=>$slidesToShow, 'class'=>$class]);
    }

    public function carrouselFromRandomArticles($limit=5){
        return $this->carrouselFromArticles($this->randomArticles($limit));
    }

    public function articlesList($articles, $title=null, $subtitle=null){
        return $this->_View->element('articles-list', ['articles'=>$articles, 'title'=>$title, 'subtitle'=>$subtitle]);
    }

    public function randomArticlesList($limit=6, $title=null, $subtitle=null){
        return $this->articlesList($this->randomArticles($limit), $title, $subtitle);
    }

    public function randomArticles($limit=6){
        $articles = TableRegistry::get('Articles');

        $randomArticles = $articles
        ->find('all')
        ->order('rand()')
        ->limit($limit)
        ->where([
        'Articles.focus' => true,
        'Articles.online'=> 1
        ])->toArray();

        return $randomArticles;
    }

}

?>
