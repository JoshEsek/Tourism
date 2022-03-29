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
            let success, _ = (this), __ = $(_), valid = false;
            // *
            console.log(__.attr('action') + ' < - action, name=' + this.name)
            switch (this.name)
            {
                case 'signup':
                {
                    let email = _.email.value, email_pattern = $(email).data('pattern');
                    // valid       = license.value.match(pattern);
                    success   = function (response)
                    {
                        console.log('success: ');
                        console.log(response);
                        __.find('.valid-feedback').append(response.valid);
                    };
                    console.log(__.attr('action') + ' < - action, name=' + this.name)
                }
                    break;
                case 'form-license':
                {
                    let license = _.licensed, pattern = license.pattern;
                    // valid       = license.value.match(pattern);
                    success     = function (response)
                    {
                        console.log('success: ');
                        console.log(response);
                        __.find('.valid-feedback').append(response.valid);
                    };
                    console.log(__.attr('action') + ' < - action, name=' + this.name)
                }
                    break;
                default:
                    break;
            }
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
            // * prevent default we are using Ajax
            e.preventDefault();
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
