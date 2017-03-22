/**
 *  @fileOverview Manages the global functions for the web
 *  @author Fernando Carrascosa <fcarrascosa@fcarrascosa.es>
 *  @name Global
 *  @version 0.1
 *  @see Global
 */


/**
 * Gets the Header's Height
 * @returns {Number} The #header's height
 */

function getHeaderHeight(){
    var headerHeight = jQuery('#header').height();
    return headerHeight;
}

/**
 * Gets the document Scroll position
 * @returns {Number}
 */

function getDocumentPosition() {

    var scrollPosition = jQuery(document).scrollTop();
    return scrollPosition;
}

/**
 * Makes Scroll Smooth when click in 'current page target' links
 * @param {Object} link The clicked link
 * @param {Number} time The time in ms the scroll lasts
 *
 * @returns {Boolean} Always True
 */

function smoothScroll (link, time) {

    var target = link.attr('href');
    var headerHeight = getHeaderHeight();

    jQuery('html, body').animate({
        scrollTop: jQuery(target).offset().top - headerHeight
    }, time);

    return true;
}

/**
 * Sends a form via AJAX
 * @param {String} formId The form "id" attribute
 * @param {String} formAction The form "action" attribute
 * @param {String} formMethod The form "method" attribute
 *
 * @returns {Boolean} Always True.
 */

function ajaxForm (formId, formAction,formMethod) {
    var $this = jQuery('#' + formId);
    var $params = {};

    $this.find('input').each(function () {
        var $name = jQuery(this).attr('name');
        var $value = jQuery(this).val();

        $params[$name] = $value;
    });

    jQuery.ajax({
        url: formAction,
        method: formMethod,
        data: $params,
        error: function (response) {
            response = response.responseJSON;
            $this.find('.messages').empty().append('<div class="alert alert-danger">' + response.message + '</div>').slideDown().delay(5000).slideUp();
        },
        success: function (response) {
            $this.find('.messages').empty().append('<div class="alert alert-success">' + response.message + '</div>').slideDown().delay(5000).slideUp();
        }
    });

    return true;
}

jQuery(document).on('click', 'a[href*="#"]:not([href="#"])', function(){
    var link = jQuery(this);
    smoothScroll(link, 500);
});