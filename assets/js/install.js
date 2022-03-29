/**
 * The JavaScript/jQuery for Roli Plugins Queue Management System
 *
 * @package    roli
 * @subpackage Queue_Management_System
 * @since      Queue Management System 1.1
 *
 * Core jQueries
 */
(function ($)
{
    "use strict";
    // * Activate JavaScript
    document.documentElement.className = document.documentElement.className.replace("no-js", "js");
    // * Core functionalities
    $(document).ready(function ()
    {
        $("form").submit(function (event)
        {
            let success, _ = (this), __ = $(_), valid = false;

            if ($("input").first().val() === "correct")
            {
                //                $(".valid-feedback").text("Validated...").show();
                //                return false;
            }
            switch (this.name)
            {
                case "form-license":
                    let license = _.licensed, pattern = license.pattern;

                    valid   = license.value.match(pattern);
                    success = function (response)
                    {
                        console.log("success: ");
                        console.log(response);
                        __.find(".valid-feedback").append(response.valid);
                    };
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
                    type:        "POST", url: __.attr("action"), data: __.serialize(), success: success, error: function (response)
                    {
                        console.log("error: ");
                        console.log(response);
                    }, dataType: "json"
                });
            }
            else
            {
                $.post(__.attr("action"), {         //POST request
                    nonce:   _.nonce.value,     //nonce
                    action:  _.action.value,            //action
                    license: _.license.value                  //data
                } /*__.serialize()*/, function (data)
                {                    //callback
                    console.log(data);              //insert server response
                });
            }

            //            $(".invalid-feedback").text("Not valid!").show().fadeOut(1000);
            event.preventDefault();
        });
        $("a[data-wizard-step]").click(function (e)
        {
            $(".nav-tabs a[href=\"#" + hash + "\"]").tab("show");
            alert("Hello World");
            return false;
        });
        $("button[data-bs-target]").click(function ()
        {
            let _ = $(this), __ = _.data("bs-target");

            alert(__);
            $("#setup-wizard a[href=\"#" + __ + "\"]").tab("show");
        });
    });
})(jQuery);
