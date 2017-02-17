/**
 *  @fileOverview Manages the functions for the Users section
 *  @author Fernando Carrascosa <fcarrascosa@fcarrascosa.es>
 *  @name Users
 *  @version 0.1
 *  @see module:Users
 */

/** @module Users */

/**
 * Toggles active Class when Scroll
 *
 * @param {Object} link The current nav link
 * @param {Number} scroll The current scroll position
 * @param {Number} headerHeight The current #header height
 * @memberOf module:Users
 *
 * @returns {Boolean} True if toggled active class of an element, otherwise, False
 */

function toggleActiveClass ( link, scroll, headerHeight ) {
    var linkTarget = jQuery(link).attr('href');
    var linkParent = jQuery(link).parent();

    var section = jQuery(linkTarget);
    var sectionTop = section.offset().top;
    var sectionHeight = section.height();
    var sectionBottom = sectionTop + sectionHeight;

    if ((sectionTop) <= (scroll + headerHeight) && sectionBottom > (scroll - headerHeight)) {
        linkParent.siblings().removeClass('active');
        linkParent.addClass('active');
    }else{
        return false;
    }

    return true;
}

/**
 * Changes Sidebar's position when Scroll
 *
 * @param {Number} scroll The current scroll position
 * @param {Number} headerHeight The current #header height
 * @memberOf module:Users
 *
 * @returns {Boolean} True if it changed position of sidebar, False if resets it
 */

function repositionSidebar ( scroll , headerHeight) {
    var sidebar = jQuery('.edit-sidebar');
    var sidebarParent = sidebar.parent();
    var sidebarParentTop = sidebarParent.offset().top;

    if (sidebarParentTop < (scroll + headerHeight)) {
        sidebar.css({
           'top': scroll
        });
    } else {
        sidebar.removeAttr('style');
        return false;
    }

    return true;
}

jQuery(window).on('scroll', function () {

    var scroll = getDocumentPosition();
    var links = jQuery('.navigation-item-link');
    var headerHeight = getHeaderHeight();

    if (links.length > 0) {

        links.each(
            function () {
                toggleActiveClass(this, scroll, headerHeight);
            }
        );

        repositionSidebar(scroll, headerHeight);

    }
});