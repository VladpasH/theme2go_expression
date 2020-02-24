/*
    CTS GmbH
    copyright 2017
*/

var navi = $( '.main-nav' ),
    menuButton = $( '#mobile-button' ),
    hotdog = $( '#menu-button .hotdog' ),
    navLink = navi.find( '.main-nav li > a' );


$(document).ready(function() {

    smoothScrolling();

    /***********************************************************************************************
     * Toggle empty class for input fields when their value changed, so we can work with :valid and
     * :invalid in css because css sees only the initial state of the value attribute
     * @see: http://stackoverflow.com/questions/16952526/detect-if-an-input-has-text-in-it-using-css
     **********************************************************************************************/
    $('input[value=""],textarea').addClass('empty');
    $('input,textarea').keyup(function () {
        if ($(this).val() == "") {
            $(this).addClass("empty");
        } else {
            $(this).removeClass("empty");
        }
    });

    /***********************************************************************************************
     * Mobile Navigation - MMenu
     **********************************************************************************************/
    $("#mobile-menu").mmenu({
        // Options
        extensions: ["effect-menu-slide","multiline","border-offset","theme-white"]
    },
    {
        // configuration
        offCanvas: {
            pageSelector: "#page-wrapper"
        }
    });

    var API = $("#mobile-menu").data( "mmenu" );

    $('#mobile-button').click(function() {
        API.open();
        API.close();
    });

    // put language switcher in mmenu
    if ( $( '.mod_changelanguage' ).length > 0) {
        $('.mod_changelanguage ul').clone().prependTo('#mm-0').addClass('lang-switch');
    }

    /***********************************************************************************************
     * Smooth Scrolling to links
     **********************************************************************************************/
    $('#wrapper a[href*="#"]').each(function () {
        $(this).click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            scrollFromLinkToTarget(this);
        });
    });
    /***********************************************************************************************
     * Search Widget - Header
     **********************************************************************************************/
    $('.popout-form .close, .search-form-icon').click(function () {
        searchBarToggle();
    });

    /***********************************************************************************************
     * Scroll to form error
     **********************************************************************************************/

    if ($('form .error').length > 0) {
        $(('html, body')).animate({
            scrollTop: $('form .error').first().offset().top - 80
        }, 1500);
        return false;
    }


    /***********************************************************************************************
    * Various bits
    **********************************************************************************************/
    cleverPaging();

});


$(window).load(function() {
    if (window.location.hash.length > 0) {
        $('a[href$="' + window.location.hash + '"]').trigger('click');
    }
});

$(window).scroll(function(e) {
    scrollTop = $(window).scrollTop();
    if (!mobileLayout()) {
        if (scrollTop > 80) {
            $('#header').addClass('scrolled');
            $('.main-nav .mod_navigation').addClass('scrolled');
        } else {
            $('#header').removeClass('scrolled');
            $('.main-nav .mod_navigation').removeClass('scrolled');
        }
    }
});

$(window).resize(function() {

    // update dimensions on resize
    sw = document.body.clientWidth;
    sh = document.body.clientHeight;

    //check for mobile and reset navigation
    if(!mobileLayout()){
        resetMobileNav();
        resetActiveNav();
    }

    if(mobileLayout()) {
        navi.find('li').removeClass('open');
        if($('#header').hasClass('scrolled')) {
            $('#header').removeClass('scrolled');
        }
    }
});


// ---------------------------------------------------------------------------------------------------------------------
// Utilities
// ---------------------------------------------------------------------------------------------------------------------


// detect mobile devices (phones, tablets and things from apple)
var isMobileDevice = function(){
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) || false;
};

// check screen width - elements like navigation change in mobile layout
function mobileLayout() {
    var sw = document.body.clientWidth,
    //sh = document.body.clientHeight, //not needed just now.
        breakpoint = 980,
        mobile = (sw > breakpoint) ? false : true;
    return mobile;
}

var resetMobileNav = function() {
    if(navi.hasClass( 'active' )){
        navi.removeClass( 'active' );
        hotdog.removeClass( 'cross' );
        menuButton.removeClass( 'cross' );
    }
};

var searchBarToggle = function() {
    if (!$('.search-form-icon').hasClass('open') ){
        $('.search-form-icon').addClass('open');
    }
    else {
        $('.search-form-icon').removeClass('open');
    }
};

var resetActiveNav = function() {
    var openMenu = navi.find( 'li.open' );

    openMenu.removeClass('open');
    navi.find('ul').attr( "style", "" );
};

var cleverPaging = function()
{
    var pager = '.pagination';
    var withColorbox = (typeof $(this).colorbox === 'function')? true : false;
    var baseHref = $('base').attr('href');

    var runPager = function()
    {
        $(pager).each(function()
        {
            var pagination = $(this);
            var parent = pagination.parent();

            pagination.find('a').unbind('click').click(function(e)
            {
                e.preventDefault();
                var linkTag = $(this);
                var href = linkTag.attr('href');
                href = href.replace(baseHref, "");

                $.get(baseHref + href, null, function(data, textStatus)
                {
                    if (textStatus === 'success')
                    {
                        data = $(data).find(pager).parent().find('> *');

                        parent.find('> *').remove();
                        parent.append(data);
                        parent.find('a[data-lightbox]').map(function()
                        {
                            if(withColorbox)
                            {
                                $(this).colorbox({
                                    current: "Bild {current} von {total}",
                                    loop: false,
                                    rel: $(this).attr('data-lightbox'),
                                    maxWidth: '95%',
                                    maxHeight: '95%'
                                });
                            }
                        });

                        runPager();
                    }
                }, 'html');
            });
        });
    };

    runPager();
};


//Smooth-scrolling to anchors effect - usefull for onepager layouts

var scrollFromLinkToTarget = function(sourceLink, target) {
    sourceLink = $(sourceLink);

    if (typeof target === 'undefined') {
        target = $(sourceLink.attr('href').substr(sourceLink.attr('href').lastIndexOf('#')));
    } else {
        target = $(target);
    }

    if (target.length > 0) {
        $("html,body").animate({
            scrollTop: target.offset().top - 80
        }, 500, 'swing', function() {
        });
    }
};

var smoothScrolling = function () {

    $('a[href^="#"]').each(function () {
        $(this).click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            scrollFromLinkToTarget(this);
        });
    });
};