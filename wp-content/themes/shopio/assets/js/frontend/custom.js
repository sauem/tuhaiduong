(function ($) {
    'use strict';
    $("body").on("keyup", function(e){
        if (e.which === 27){
            return false;
        }
    });
    window.onload = function () {
        const popup = document.getElementById('modal-age');
        const oke18 = localStorage.getItem('age');
        if (oke18 === 'yes') {
            return;
        }
        $.magnificPopup.open({
            items: {
                src: popup,
                type: 'inline',
                //fixedContentPos: true,
                modal: false,
            },
            removalDelay: 300,
            mainClass: 'mfp-fade'
        });
    };
    $.extend(true, $.magnificPopup.defaults, {
        closeOnBgClick: false,
    });

    $('body').on('change', '.checkbox-custom', (e) => {
        const value = e.target.value;
        if (value === 'yes') {
            $.magnificPopup.close();
            localStorage.setItem('age', 'yes');
        } else {
            localStorage.setItem('age', 'no');
            $('#modal-age').find('.content').html('<p>Xin lỗi vì sự bất tiện này,<br/>Vui lòng quay lại khi bạn đã đủ 18 tuổi</p>')
        }
    })
})(jQuery);

