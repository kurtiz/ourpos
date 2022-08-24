let form = $("#settings-form")
form.on("submit", function () {
    loading_overlay(1)
})

//instantiating plugins {switchery: for the switch button}
$(document).ready(function () {
    //*** switchery instantiating ***//
    let elem = Array.prototype.slice.call(document.querySelectorAll('.js-success'));
    elem.forEach(function(html) {
        let switchery = new Switchery(html,{
            color: '#4099ff',
            jackColor: '#fff'
        });
    });
    // let x = Array("#vat", "#discount", "#bc_search", "#salesCount", "#logoDisplay");
    // for (let i = 0; i < x.length; i++) {
    //     var elemprimary = document.querySelector(x[i]);
    //     var switchery = new Switchery(elemprimary, {
    //         color: '#2ed8b6',
    //         jackColor: '#fff'
    //     });
    // }
    //*** End switchery instantiating ***//
});

$('#vat').on("change",
    function () {
        //checking the value of the switch button
        let vat_percentage_element = $("#vat_percentage")
        if ($(this).prop("checked") === false) {
            $("#vat_percentage").slideUp(
                function () {
                    $("#vat_percentage").hide()
                }
            )

        } else if ($(this).prop("checked") === true) {
            let classes = vat_percentage_element.prop("class")
            vat_percentage_element.prop("class", classes.replace("hidden", ""))
            vat_percentage_element.slideDown()
        }
    }
)


let editBtn = $("#editBtn")
let inputText = $("#settings-form input")
let inputTextArea = $("#settings-form textarea")
let submitBtn = $("#submitBtn")
let storeName = $("#store_name")
let storeMobile = $("#store_mobile")
let storeEmail = $("#store_email")
let storeVat = $("#rc_prefix")

editBtn.on("click", function () {
    if (editBtn.text() === "Edit") {
        editBtn.removeClass("btn-success");
        editBtn.addClass("btn-danger");
        editBtn.text("Cancel");
        submitBtn.show();

        inputText.prop("disabled", false)
        inputTextArea.prop("disabled", false)
    } else {
        editBtn.removeClass("btn-danger");
        editBtn.addClass("btn-success");
        editBtn.text("Edit");
        submitBtn.hide();

        inputText.prop("disabled", true)
        inputTextArea.prop("disabled", true)
    }

})

submitBtn.on("click", function () {
    if (storeName.val() === "") {
        $.toast({
            text: 'Store name must not be empty!',
            showHideTransition: 'fade',
            icon: 'error',
            position: "top-right",
            bgColor: '#f5365c',
            textColor: 'white'
        })

        if (storeName.hasClass("form-control-success")) {
            storeName.removeClass("form-control-success")
            storeName.addClass("form-control-danger")
        }

        storeName.addClass("form-control-danger")
        storeName.focus()

    } else if (storeName.hasClass('form-control-danger')) {

        storeName.removeClass("form-control-danger")
        storeName.addClass("form-control-success")

    }

    if (storeMobile.val() === "") {
        $.toast({
            text: 'Phone must not be empty!',
            showHideTransition: 'fade',
            icon: 'error',
            position: "top-right",
            bgColor: '#f5365c',
            textColor: 'white'
        })

        if (storeMobile.hasClass("form-control-success")) {
            storeMobile.removeClass("form-control-success")
            storeMobile.addClass("form-control-danger")
        }

        storeMobile.addClass("form-control-danger")

        if (!storeName.hasClass('form-control-danger')) {
            storeMobile.focus()
        }
    } else if (storeMobile.hasClass('form-control-danger')) {

        storeMobile.removeClass("form-control-danger")
        storeMobile.addClass("form-control-success")

    }

    if (storeEmail.val() === "") {
        $.toast({
            text: 'Email must not be empty!',
            showHideTransition: 'fade',
            icon: 'error',
            position: "top-right",
            bgColor: '#f5365c',
            textColor: 'white'
        })

        if (storeEmail.hasClass("form-control-success")) {
            storeEmail.removeClass("form-control-success")
            storeEmail.addClass("form-control-danger")
        }

        storeEmail.addClass("form-control-danger")

        if (!storeMobile.hasClass('form-control-danger')) {
            storeEmail.focus()
        }

    } else if (storeEmail.hasClass('form-control-danger')) {

        storeEmail.removeClass("form-control-danger")
        storeEmail.addClass("form-control-success")

    }

    if (storeName !== "" && storeMobile !== "" && storeEmail !== "") {
        loading_overlay(1)
        form.submit()
    }

})