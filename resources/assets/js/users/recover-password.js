/**
 * Created by fcarrascosa on 28/01/17.
 */

jQuery(document).on('submit', '#modal-password-reset-form', function (e) {
    e.preventDefault();

    var $this = jQuery(this);

    var $id = $this.attr('id');
    var $url = $this.attr('action');
    var $method = $this.attr('method');

    ajaxForm($id, $url, $method);

});

