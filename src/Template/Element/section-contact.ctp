<section class="side-contact">

  <div class="contact-head">
    <?= $article->title ?>
  </div>

  <div class="contact-body">
    <?php if(!empty($article->title) || !empty($article->phone_number) || !empty($article->phone_number_2) || $this->MonCarnet->para($article->mail_adress)): ?>
      <?= $this->MonCarnet->para($article->title); ?>
      <?= $this->MonCarnet->para($article->phone_number); ?>
      <?= $this->MonCarnet->para($article->phone_number_2); ?>
      <?= $this->MonCarnet->mail($article->mail_adress); ?>
    <?php endif; ?>
    <?php if(!empty($article->adress) || !empty($article->zip_code) || !empty($article->city) ) : ?>
      <?= $this->MonCarnet->para($article->adress); ?>
      <?= $this->MonCarnet->para($article->zip_code.' '.$article->city); ?>b
    <?php endif; ?>
  </div>

  <div class="contact-more-infos">
    <?php if(!empty($article->additionnal_informations) ): ?>
      <?= $this->MonCarnet->para($article->additionnal_informations); ?>
    <?php endif; ?>
  </div>

  <div class="social-networks">
    <?php if(!empty($article->website_url) || !empty($article->facebook_url) || !empty($article->instagram_url) ): ?>
      <?= $this->MonCarnet->socialIcons($article, "zoom", "item-icon"); ?>
    <?php endif; ?>
  </div>

  <div class="contact-buttons">
    <?php if(!empty($article->website_url)): ?>
      <?= $this->MonCarnet->externLink($article->website_url); ?>
    <?php endif; ?>
  </div>

</section>
