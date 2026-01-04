document.addEventListener("DOMContentLoaded", function () {

    const forms = document.querySelectorAll(".subscribe-form");

    forms.forEach(function (form) {
        form.addEventListener("submit", function (event) {

            const confirmSubscribe = confirm(
                "Are you sure you want to subscribe to this membership?"
            );

            if (!confirmSubscribe) {
                event.preventDefault(); // يوقف الإرسال
            }
        });
    });

});
