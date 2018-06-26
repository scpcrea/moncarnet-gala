<?php
if(!isset($is_advanced)) $is_advanced=false;
?>

<div class="container-fluid">

    <div class="search-bar">
        <fieldset>

            <div class="search-bar__main-area">
                <!-- LOUPE -->
                <button class="search-bar__submit">
                    <?= $this->Html->image('icon_loupe.svg'); ?>
                </button>

                <!-- CHAMP -->
                <div class="search-input">
                    <?=
                    $this->Form->input(
                        'keywords', [
                            'type'  => 'text',
                            'label' => false,
                            'class' => 'search-bar-field',
                            'autocomplete' => "off",
                            'placeholder' => 'Rechercher une adresse...'
                        ]);
                        ?>
                    </div>

                    <div class="search-field">
                        <?= $this->Form->select(
                            'field',

                            ['title' => 'Par nom', 'city'=>'par ville', 'all' => 'Tout'],
                            ['id'=>'field']

                        );
                        ?>
                    </div>

                    <div class="search-loader" id="search-loader">
                        <?= $this->Html->image('icon_search_moncarnet.svg', ['class'=>'search-loader-img','id'=>'search-loader-img']); ?>
                    </div>

                </div>
            </fieldset>
        </div>

        <div id="listeDiv"></div>
    </div>

    <?php $this->append('end-script');?>
    <?= $this->Html->script("jQueryRotate.js")?>

    <script>
    var timer;
    var isLoading=false;

    var rotation = function (){
        $("#search-loader-img").rotate({
            angle:0,
            animateTo:360,
            callback: rotation
        });
    }

    var defaultRotation = function (){
        $("#search-loader-img").rotate({
            angle: 0,
            animateTo:0,
            callback: null
        });
    }

    function searchList(){
        $.ajax({
            url: "/articles/searchList",
            data: {
                keywords: $("#keywords").val(),
                field: $("#field").val(),
                is_advanced: <?= $is_advanced ? '1' : '0' ?>
            },
            dataType: 'html',
            type: 'post',
            success: function (html) {
                $("#listeDiv").html(html);
                jQuery('#listeDiv').slideDown(300);
                stopLoading();
            }
        })
    }

    function startLoading(){
        isLoading=true;
        rotation();
        $("#search-loader").fadeIn(200);
    }

    function stopLoading(){
        $("#search-loader").fadeOut(500, function(){
            $("#search-loader-img").stopRotate();
        });
        isLoading=false;
    }

    function updateResult(){

        if(timer) {
            clearTimeout(timer);
            jQuery('#listeDiv').slideUp(300);
        }

        if(!isLoading){
            startLoading();
        }

        timer = setTimeout(searchList, 2000);
    }

    $(function () {
        $("#keywords").on('input', function () {
            if($("#keywords").val().length>1) updateResult();
        });
        $("#field").change(function () {
            if($("#keywords").val().length>1) searchList();
        });

        <?php if(!is_null($this->request->getQuery('field'))): ?>
        $("#field").val("<?=$this->request->getQuery('field')?>");
        <?php endif; ?>

        <?php if(!is_null($this->request->getQuery('keywords'))): ?>
        $("#keywords").val("<?=$this->request->getQuery('keywords')?>");
        searchList();
        <?php endif; ?>
    })
</script>
<?php $this->end();?>
