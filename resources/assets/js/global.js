/**
 * Created by fcarrascosa on 17/02/17.
 */
/**
 * Let's Get the Header's Height
 *
 * @returns {Number}
 */

function getHeaderHeight(){
    headerHeight = jQuery('#header').height();
    return headerHeight;
}

/**
 * Let's Get the Scroll Position
 *
 * @returns {Number}
 */

function getDocumentPosition() {

    scrollPosition = jQuery(document).scrollTop();
    return scrollPosition;
}

/**
 * Let's smooth-scroll to self-page items
 *
 * @param {Object} link
 * @param {Number} time
 *
 * @returns {Boolean}
 */

function smoothScroll (link, time) {

    target = link.attr('href');
    headerHeight = getHeaderHeight();

    jQuery('html, body').animate({
        scrollTop: jQuery(target).offset().top - headerHeight
    }, time);

    return true;
}


jQuery(document).on('click', 'a[href*="#"]:not([href="#"])', function(){
    link = jQuery(this);
    smoothScroll(link, 500);
});