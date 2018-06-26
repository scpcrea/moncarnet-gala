<div class="col-md-12 col-sm-12 col-xs-12 second-single-col">
                
        <div class="row">
            <?php if(!empty($article->title) || !empty($article->phone_number) || !empty($article->phone_number_2) || $this->MonCarnet->para($article->mail_adress)): ?>
                <div class="col-md-4 col-sm-4 col-xs-12 coupdecoeur-titre">
                    Contact
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12 coupdecoeur-detail">
                    <?= $this->MonCarnet->para($article->title); ?>
                    <?= $this->MonCarnet->para($article->phone_number); ?>
                    <?= $this->MonCarnet->para($article->phone_number_2); ?>
                    <?= $this->MonCarnet->mail($article->mail_adress); ?>
                </div>
                <hr>
            <?php endif; ?>
                           
            <?php if(!empty($article->adress) || !empty($article->zip_code) || !empty($article->city) ) : ?>
                <div class="col-md-4 col-sm-4 col-xs-12 coupdecoeur-titre">
                    Adresse
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12 coupdecoeur-detail">
                    <?= $this->MonCarnet->para($article->adress); ?>
                    <?= $this->MonCarnet->para($article->zip_code.' '.$article->city); ?>
                </div>
                <hr>
            <?php endif; ?>


            <?php if(!empty($article->website_url)): ?>                        
                <div class="col-md-4 col-sm-4 col-xs-12 coupdecoeur-titre">
                    Site
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12 coupdecoeur-detail">
                    <?= $this->MonCarnet->externLink($article->website_url); ?>
                </div>
                <hr>
            <?php endif; ?>         


            <?php if(!empty($article->website_url) || !empty($article->facebook_url) || !empty($article->instagram_url) ): ?>
                <div class="col-md-5 col-sm-5 col-xs-12 title-identity">
                    Réseaux sociaux
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12 identity_social">
                    <div class="col-md-12 item-social-icons">
                    <?= $this->MonCarnet->socialIcons($article, "zoom", "item-icon"); ?>
                  </div>                      
                </div>  
                <hr>    
            <?php endif; ?>


            <?php if(!empty($article->additionnal_informations) ): ?>
                <?= $this->MonCarnet->para($article->additionnal_informations); ?>
                <hr>    
            <?php endif; ?>

        </div>                    
</div>