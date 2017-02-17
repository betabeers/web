/**
 * Created by fcarrascosa on 17/02/17.
 */

/**
 * Let's Toggle active Class when Scroll
 *
 * @param {Object} link
 * @param {Number} scroll
 * @param {Number} headerHeight
 *
 * @returns {Boolean}
 */

function toggleActiveClass ( link, scroll, headerHeight ) {
    linkTarget = jQuery(link).attr('href');
    linkParent = jQuery(link).parent();

    section = jQuery(linkTarget);
    sectionTop = section.offset().top;
    sectionHeight = section.height();
    sectionBottom = sectionTop + sectionHeight;

    if ((sectionTop) <= (scroll + headerHeight) && sectionBottom > (scroll - headerHeight)) {
        linkParent.siblings().removeClass('active');
        linkParent.addClass('active');
    }else{
        return false;
    }

    return true;
}

/**
 * Let's Change Sidebar's position when Scroll
 *
 * @param {Number} scroll
 * @param {Number} headerHeight
 *
 * @returns {Boolean}
 */

function repositionSidebar ( scroll , headerHeight) {
    sidebar = jQuery('.edit-sidebar');
    sidebarParent = sidebar.parent();
    sidebarParentTop = sidebarParent.offset().top;

    if (sidebarParentTop < (scroll + headerHeight)) {
        sidebar.css({
           'top': scroll,
        });
    } else {
        sidebar.removeAttr('style');
        return false;
    }

    return true;
}

jQuery(window).on('scroll', function () {

    scroll = getDocumentPosition();
    links = jQuery('.navigation-item-link');
    headerHeight = getHeaderHeight();

    if (links.length > 0) {

        links.each(
            function () {
                toggleActiveClass(this, scroll, headerHeight);
            }
        );

        repositionSidebar(scroll, headerHeight);

    }
});