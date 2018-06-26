var App = function () {
  // Fixed Header
  function handleHeader() {
    jQuery(window).scroll(function() {
      if (jQuery(window).scrollTop() > 85)
        jQuery('navbar navbar-inverse navbar-fixed-top header-fixed').addClass('header-fixed-shrink');
      else
        jQuery('navbar navbar-inverse navbar-fixed-top header-fixed').removeClass('header-fixed-shrink');
    });
  }

  //Scroll to content
  function scrollToContent(){
    if ($('#content').length != 0){
      $("#content")[0].scrollIntoView();
    }
  }

  function handleMixitUp(){
  	$('.sorting-grid').mixItUp();
  }

  function handleParallaxBg(){
    jQuery('.parallaxGrid').parallax("50%", 0.4);
  }

  // Equal Height Columns
  function handleEqualHeightColumns() {
    var EqualHeightColumns = function () {
      $(".equal-height-columns").each(function() {
        heights = [];
        $(".equal-height-column", this).each(function() {
          $(this).removeAttr("style");
          heights.push($(this).height()); // write column's heights to the array
        });
        $(".equal-height-column", this).height(Math.max.apply(Math, heights)); //find and set max
      });
    }

    EqualHeightColumns();
    $(window).resize(function() {
      EqualHeightColumns();
    });
    $(window).load(function() {
      EqualHeightColumns();
    });
  }

  //JQuery for active class between pages
  function handleActiveClass() {
    var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/"));
    $("#nav").find("a").each(function(){
        if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
        $(this).parent().addClass("active");
    })
  }

  // JQuery for CookieBar
  function cookieBar() {
    $.cookieBar({
      fixed: true,
      zindex: 9999,
      message: 'En poursuivant votre navigation sur ce site, vous acceptez l\'utilisation de cookies afin de réaliser des statistiques de visites anonymes.',
      acceptText: 'OK',
      policyButton: true,
      policyText: 'En savoir plus',
      policyURL: '/mentions#cookies',
    });
  }

  // Jquery for search engine
  function searchEngine() {
    $("#recherche").keyup(function(){
    var recherche = $(this).val();
    var data = 'motclef=' + recherche;
    if(recherche.length>1){
         $.ajax({
         type : "GET",
         url : "/app/result.php",
         data : data,
         success: function(server_response){
            $("#resultat").html(server_response).show();
         }
         });
    }else
      $("#resultat").hide();
    });
  }

		//handleHeader();
    //initMap();
    //handleEqualHeightColumns();
    //handleMixitUp();
    //handleActiveClass();
    //cookieBar();
    //searchEngine();
    //scrollToContent();
}();
