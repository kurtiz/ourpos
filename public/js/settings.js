let taxesBtn = $("#taxesBtn"),
    editTaxesBtn = $("#editTaxes_btn"),
    editBtn = $("#editBtn"),
    inputText = $("#settings-form input"),
    inputTextTax = $(".tax-input"),
    inputTextArea = $("#settings-form textarea"),
    submitBtn = $("#submitBtn"),
    storeName = $("#store_name"),
    storeMobile = $("#store_mobile"),
    storeEmail = $("#store_email"),
    storeVat = $("#rc_prefix"),
    taxStatusSelect = $(".tax-status-select"),
    taxDelete = $(".tax-delete"),
    taxAdd = $("#addTax"),
    taxesForm = $("#taxes_form"),
    taxesFormRepeater = $("#taxes_form_repeater"),
    taxes = $("#taxesTxt"),
    taxTitles = [],
    taxValues = [],
    taxStatuses = [],

form = $("#settings-form")
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
    })

    $('#taxes').tagsinput('items');
    $('.tax-status-select').select2();

});

function updateTax(){
    let tTiles = $(".tax-title")
    let tValues = $(".tax-value")
    let tStatuses = $(".tax-status")
    let taxObject = {}
    for (let i = 1; i < tTiles.length; i++){
        taxObject[tTiles[i].value] = {
            value: tValues[i].value,
            status: tStatuses[i].value
        }
        taxes.val(JSON.stringify(taxObject))
    }
}

$('#vat').on("change",
    function () {
        //checking the value of the switch button
        let vat_percentage_element = $("#vat_percentage")
        if ($(this).prop("checked") === false) {
            vat_percentage_element.slideUp(
                function () {
                    vat_percentage_element.hide()
                }
            )

        } else if ($(this).prop("checked") === true) {
            let classes = vat_percentage_element.prop("class")
            vat_percentage_element.prop("class", classes.replace("hidden", ""))
            vat_percentage_element.slideDown()
        }
    }
)

$('#otherTaxes').on("change",
    function () {
        //checking the value of the switch button
        let taxes_element = $("#taxes_element")
        if ($(this).prop("checked") === false) {
            taxes_element.slideUp(
                function () {
                    taxes_element.hide()
                }
            )
        } else if ($(this).prop("checked") === true) {
            let classes = taxes_element.prop("class")
            taxes_element.prop("class", classes.replace("hidden", ""))
            taxes_element.slideDown()
        }
    }
)

editBtn.on("click", function () {
    if (editBtn.text() === "Edit") {
        editBtn.removeClass("btn-success");
        editBtn.addClass("btn-danger");
        editBtn.text("Cancel");
        submitBtn.show();

        inputText.prop("disabled", false)
        inputTextTax.prop("disabled", false)
        inputTextArea.prop("disabled", false)
        taxStatusSelect.prop("disabled", false)
        taxDelete.prop("disabled", false)
    } else {
        editBtn.removeClass("btn-danger");
        editBtn.addClass("btn-success");
        editBtn.text("Edit");
        taxesForm.slideUp(
            function () {
                taxesForm.hide()
            }
        )
        submitBtn.hide();

        inputText.prop("disabled", true)
        inputTextTax.prop("disabled", true)
        inputTextArea.prop("disabled", true)
        taxStatusSelect.prop("disabled", true)
        taxDelete.prop("disabled", true)
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
        updateTax()
        form.submit()
    }
})

taxesBtn.on("click", function () {
    if (taxesForm.prop("style").display !== "none") {
        taxesForm.slideUp(
            function () {
                taxesForm.hide()
            }
        )
    } else {
        taxesForm.slideDown(
            function () {
                taxesForm.show()
            }
        )
        taxesForm.slideDown()
    }
})

taxAdd.on("click", function () {
    taxesFormRepeater.append($(".data-repeater-item").eq(0).clone().show())
})

$(document).on("click","button.tax-delete", function() {
    let parent = $(this).parent().parent().parent()
    parent.slideUp(
        function () {
            parent.remove()
        }
    )
})

// TODO complete and fix form repeater bug
// taxesFormRepeater.repeater({
//     // (Optional)
//     // "defaultValues" sets the values of added items.  The keys of
//     // defaultValues refer to the value of the input's name attribute.
//     // If a default value is not specified for an input, then it will
//     // have its value cleared.
//     defaultValues: {
//         'text-input': 'foo'
//     },
//     // (Optional)
//     // "show" is called just after an item is added.  The item is hidden
//     // at this point.  If a show callback is not given the item will
//     // have $(this).show() called on it.
//     show: function() {
//         $(this).slideDown();
//     },
//     // (Optional)
//     // "hide" is called when a user clicks on a data-repeater-delete
//     // element.  The item is still visible.  "hide" is passed a function
//     // as its first argument which will properly remove the item.
//     // "hide" allows for a confirmation step, to send a delete request
//     // to the server, etc.  If a hide callback is not given the item
//     // will be deleted.
//     hide: function(deleteElement) {
//         if (confirm('Are you sure you want to delete this element?')) {
//             $(this).slideUp(deleteElement);
//         }
//     },
//     // (Optional)
//     // Removes the delete button from the first list item,
//     // defaults to false.
//     isFirstItemUndeletable: true
// });