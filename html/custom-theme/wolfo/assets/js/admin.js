(function ($, window, document) {
    "use strict";

    let WOLFO = window.WOLFO || {};

    var $body		= $('body'),
        $window		= $(window);

    WOLFO.DisableNotice = function() {
        $('.wolfo-note .notice-dismiss').bind('click', function () {
            let data = {
                'action': 'wolfo_admin_disable_notice',
            }

            $.ajax({
                method: 'POST',
                url: wolfo_script.ajax_url,
                data: data,
                dataType: 'json',
                beforeSend: function() {
                },
                success: function(response) {
                }
            });
        });
    };

    $(document).ready(function () {
        WOLFO.DisableNotice();
    });

})(jQuery, window, document);
