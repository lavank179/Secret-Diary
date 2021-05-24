$('#diary').bind('input propertychange', function () {

    $.ajax({
        method: "POST",
        url: "./controllers/updatedatabase.php",
        data: { content: $("#diary").val() }
    });

});

$(function () {
    // Multiple images preview with JavaScript
    var multiImgPreview = function (input, imgPreviewPlaceholder) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function (event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#chooseFile').on('change', function () {
        multiImgPreview(this, 'div.imgGallery');
    });
});

function Gbtn(e) {
    console.log(e);
    let bnfil = e.id;
    let bnid = e.parentElement.parentElement.parentElement.parentElement.id;
    
    
}