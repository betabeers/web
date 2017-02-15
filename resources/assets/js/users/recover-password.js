/**
 * Created by fcarrascosa on 28/01/17.
 */

jQuery(document).on('submit', '#modal-password-reset-form', function (e) {
    e.preventDefault();

    $this = jQuery(this);

    $url = jQuery(this).attr('action');
    $method = jQuery(this).attr('method');

    $params = {};

    jQuery(this).find('input').each(function () {
        $name = jQuery(this).attr('name');
        $value = jQuery(this).val();

        $params[$name] = $value;

    });
    console.log($url);

    jQuery.ajax({
        url: $url,
        method: $method,
        data: $params,
        error: function (response) {
            $this.find('.messages').empty().append('<div class="alert alert-danger">' + response.responseJSON.message + '</div>').slideDown().delay(1500).slideUp();
        },
        success: function (response) {
            $this.find('.messages').empty().append('<div class="alert alert-success">Te hemos enviado un email</div>').slideDown().delay(1500).slideUp();
        }
    })

});
