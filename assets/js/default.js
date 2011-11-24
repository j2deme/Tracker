$(function () {
    /*$("a[rel=popover]")
    .popover({
        offset: 10
    })
    .click(function(e) {
        e.preventDefault()
    })*/;
    //$("#user-form").formToWizard({ submitButton: 'actions' });
    $("abbr.timeago").timeago();

    function newAlert (type, message) {
        $("#alert-area").append($("<div class='alert-message " + type + " fade in' data-alert><p> " + message + " </p></div>"));
        setTimeout(function () {
            $(".alert-message").fadeOut("slow", function () { this.parentNode.removeChild(this); });
        }, 2000);
    }
});
