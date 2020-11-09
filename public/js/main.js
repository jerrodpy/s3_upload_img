document.addEventListener('DOMContentLoaded', function () {
    js_form.addEventListener("submit", function (event) {

        event.preventDefault();

        let file = document.querySelector('#js_div_image').files[0];
        getBase64(file); // prints the base64 string

        console.log(document.querySelector('#js_image'));
        //

        return false;
    });



});

function getBase64(file) {
    let reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function () {

        document.querySelector('#js_image').value = reader.result.replace(/^data:.+;base64,/, '');
        js_form.submit();

    };
    reader.onerror = function (error) {
        console.log('Error: ', error);
    };
}


