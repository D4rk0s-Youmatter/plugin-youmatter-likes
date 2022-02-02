(function ($) {
    "use strict";

    $(function () {
        //console.log(js_vars);
        let likesToAdd = 1,
            counter,
            mouseDown = false;

        $(".ymli_container").mousedown(function (e) {
            mouseDown = true;
            let el = $(this),
                counterContainer = el.find(".ymli_counter_container");
            counterContainer.removeClass("hidden");
            counterContainer.html(likesToAdd);
            el.addClass("working");
            
            counter = setInterval(function () {
                ++likesToAdd;
                counterContainer.html(likesToAdd);
              }, 100);
        });

        $(".ymli_container").mouseup(function (e) {
            //console.log("click");
            mouseDown = false;
            let el = $(this);
            clearInterval(counter);
            sendLikesToAjax(el);
            //el.addClass("working");
        });

        $(".ymli_container").mouseout(function (e) {
            //console.log("click");
            if(mouseDown) {
                let el = $(this);
                clearInterval(counter);
                sendLikesToAjax(el);
                mouseDown = false;
                //el.addClass("working");
            }

        });

        function sendLikesToAjax($el) {
            //console.log($el);
            var post_id = $el.data("post_id");

            //console.log(post_id);
            var action = "like";
            /*
        if($el.hasClass("liked")) {
            action = "unlike";
        }
        */
            var data = {
                action: "set_post_likes",
                ymli_likes: action,
                ymli_post_id: post_id,
                ymli_likes_to_add: likesToAdd,
            };
            $.post(
                js_vars.ajax_url, // The AJAX URL
                data, // Send our PHP function
                function (response, data) {
                    $el.find("b").html(response);
                    if (action == "like") {
                        $el.removeClass("working notliked").addClass("liked");
                        $el.find(".ymli_counter_container").addClass("hidden");
                    } else {
                        $el.removeClass("working liked").addClass("notliked");
                        $el.find(".ymli_counter_container").addClass("hidden");
                    }
                }
            );
            likesToAdd = 1;
        }
    });
})(jQuery);
