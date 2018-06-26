<?php
use Cake\I18n\Time;
?>

<link rel="canonical" href="<?= isset($url) ? $url : $this->Url->build(META_URL, true) ?>" />
<meta property="og:site_name" content="<?= META_URL ?>">
<meta property="og:title" content="<?= isset($title) ? $title : META_TITLE ?>">
<meta property="og:description" content="<?= isset($description) ? $description : META_DESCRIPTION ?>">
<meta property="og:type" content="article">
<meta property="article:author" content="Groupe SCP">
<meta property="article:publisher" content="<?= META_URL ?>">
<meta property="og:locale" content="fr_FR">
<meta property="og:url" content="<?= isset($url) ? $url : $this->Url->build(META_URL, true) ?> ">
<meta property="article:published_time" content="<?= isset($created) ? $created->i18nFormat(META_I18N_FORMAT) : Time::now()->i18nFormat(META_I18N_FORMAT) ?>">
<meta property="article:modified_time" content="<?= isset($updated) ? $updated->i18nFormat(META_I18N_FORMAT) : Time::now()->i18nFormat(META_I18N_FORMAT) ?>">

<?php
$tags = explode(', ', isset($tag_list) ? $tag_list : META_TAG_LIST);
foreach($tags as $tag) {
    echo $this->Html->meta('article:tag', $tag);
}
?>

<meta property="article:section" content="<?= isset($section) ? $section : META_SECTION ?>">
<meta property="og:image" content="<?= isset($image) ? $image : META_IMAGE ?>">
<meta property="og:image:width" content="<?= isset($image) ? getimagesize($image)[0] : 500 ?>">
<meta property="og:image:height" content="<?= isset($image) ? getimagesize($image)[1] : 300 ?>">
<meta property="og:updated_time" content="<?= isset($updated) ? $updated->i18nFormat(META_I18N_FORMAT) : Time::now()->i18nFormat(META_I18N_FORMAT) ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= isset($title) ? $title : META_TITLE ?>">
<meta name="twitter:description" content="<?= isset($description) ? $description : META_DESCRIPTION ?>">
<meta name="twitter:creator" content="@scp_cap">
<meta name="twitter:domain" content="<?= META_URL ?>">
<meta name="twitter:site" content="@scp_cap">
<meta name="twitter:image" content="<?= isset($image) ? $image : META_IMAGE ?>">
<meta name="parsely-title" content="<?= isset($title) ? $title : META_TITLE ?>">
<meta name="parsely-type" content="post">
<meta name="parsely-author" content="Groupe SCP">
<meta name="parsely-source" content="<?= META_URL ?>">
<meta name="parsely-link" content="<?= isset($url) ? $url : $this->Url->build(META_URL, true) ?>" />
<meta name="parsely-pub-date" content="<?= isset($created) ? $created->i18nFormat(META_I18N_FORMAT) : Time::now()->i18nFormat(META_I18N_FORMAT) ?>">
<meta name="parsely-tags" content="<?= isset($tag_list) ? $tag_list : META_TAG_LIST?>">
<meta name="parsely-section" content="<?= isset($section) ? $section : META_SECTION ?>">
<meta name="parsely-image-url" content="<?= isset($image) ? $image : $this->Url->build(META_IMAGE, true) ?>">
