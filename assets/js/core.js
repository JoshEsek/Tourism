/**
 * Core jQueries
 */
(function ()
{
    'use strict';
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    let forms = document.querySelectorAll('.needs-validation');
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach(function (form)
    {
        form.addEventListener('submit', function (event)
        {
            if (!form.checkValidity())
            {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();
(function ($)
{
    'use strict';
    // * Activate JavaScript
    document.documentElement.className = document.documentElement.className.replace('no-js', 'js');
    // * Core functionalities
    $(document).ready(function ()
    {
        $('form').submit(function (e)
        {
            /**
             * Try because we don't want to land at Ajax url if we are slammed like Putin
             */
            try
            {
                let _ = (this), __ = $(_), name = __.attr('name'), method = __.attr('method'), valid = false, success;
                // * The switching
                switch (name)
                {
                }
                // * Debugging logs
                console.log(__.attr('action') + ' < - action, name=' + this.name)
                /**
                 * Fire Ajax if valid
                 */
                if (valid)
                {
                    $.ajax({
                        type:        'POST', url: __.attr('action'), data: __.serialize(), success: success, error: function (response)
                        {
                            console.log('error: ');
                            console.log(response);
                        }, dataType: 'json'
                    });
                }
            }
            catch (_e)
            {
                console.log(_e)
            }
            // * prevent default we are using Ajax
            e.preventDefault();
            return false;
        });
        $('[data-tab-target]').click(function ()
        {
            let _ = this, __ = $(_), ___ = __.data('tab-target'), ____ = $('body');
            // $('.nav-tabs a[href="' + ____ + '"]').tab('show');
            ____.find(___).removeClass('d-none').addClass('d-block').siblings('.d-block').removeClass('d-block').addClass('d-none')
            // * Only login and signup
            console.log(___ + ' -> ' + ____.find(___).attr('class'))
            return false;
        });
    });
})(jQuery);