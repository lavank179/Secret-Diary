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
    let bnfil = e.id;
    let bnid = e.parentElement.parentElement.parentElement.parentElement.id;


}

selectInputs();
// switch button toggle - LEDs
function selectInputs() {
    document.querySelectorAll("#photos h5, #videos h5, #documents h5, #others h5").forEach((item) => {
      item.addEventListener("click", (event) => {
        let fil = item.innerHTML;
        let cate = item.parentElement.parentElement.parentElement.parentElement.id;

        if(cate == 'photos'){
            if(fil == 'A - Z' || fil == 'Z - A') {
                if(fil == 'A - Z'){
                    getFiles("a-z", "imgs", cate);
                    $("#photos #btnAZ").text("Z - A");
                } else{
                    getFiles("z-a", "imgs", cate);
                    $("#photos #btnAZ").text("A - Z");
                }
                
            } else if(fil == '1 - 10' || fil == '10 - 1'){
                if(fil == '1 - 10'){
                    getFiles("1-10", "imgs", cate);
                    $("#photos #btn1-10").text("10 - 1");
                } else{
                    getFiles("10-1", "imgs", cate);
                    $("#photos #btn1-10").text("1 - 10");
                }
            }
        } else if(cate == 'videos'){
            if(fil == 'A - Z' || fil == 'Z - A') {
                if(fil == 'A - Z'){
                    getFiles("a-z", "vids", cate);
                    $("#videos #btnAZ").text("Z - A");
                } else{
                    getFiles("z-a", "vids", cate);
                    $("#videos #btnAZ").text("A - Z");
                }
                
            } else if(fil == '1 - 10' || fil == '10 - 1'){
                if(fil == '1 - 10'){
                    getFiles("1-10", "vids", cate);
                    item.innerHTML = "1 - 10";
                } else{
                    getFiles("10-1", "vids", cate);
                    item.innerHTML = "10 - 1";
                }
            }
        }  else if(cate == 'documents'){
            if(fil == 'A - Z' || fil == 'Z - A') {
                if(fil == 'A - Z'){
                    getFiles("a-z", "docs", cate);
                    $("#documents #btnAZ").text("Z - A");
                } else{
                    getFiles("a-z", "docs", cate);
                    $("#documents #btnAZ").text("A - Z");
                }
                
            } else if(fil == '1 - 10' || fil == '10 - 1'){
                if(fil == '1 - 10'){
                    getFiles("1-10", "docs", cate);
                    item.innerHTML = "1 - 10";
                } else{
                    getFiles("10-1", "docs", cate);
                    item.innerHTML = "10 - 1";
                }
            }
        } else if(cate == 'others'){
            if(fil == 'A - Z' || fil == 'Z - A') {
                if(fil == 'A - Z'){
                    getFiles("a-z", "other", cate);
                    item.innerHTML = "A - Z";
                } else{
                    getFiles("z-a", "other", cate);
                    item.innerHTML = "Z - A";
                }
                
            } else if(fil == '1 - 10' || fil == '10 - 1'){
                if(fil == '1 - 10'){
                    getFiles("1-10", "other", cate);
                    item.innerHTML = "1 - 10";
                } else{
                    getFiles("10-1", "other", cate);
                    item.innerHTML = "10 - 1";
                }
            }
        }
      });
    });
  }

getFiles();
function getFiles(v1, v2, v3) {
    $.ajax({
        async: false,
        url: "./controllers/files/" + v2 + ".php",
        method: "POST",
        data: {
            fils: v1
        },
        success: function (data, status) {
            $("#" + v3 + " .container1").html(data);
        },
    });
}



// var img = $('<img id="image_id">');
// fetch('http://lavanram.000webhostapp.com/marvel_iot/assets/images/logo.png')
//   .then(response => {
//     if (!response.ok) {
//       throw new Error('Network response was not ok');
//     }
//     return response.blob();
//   })
//   .then(myBlob => {
//     img.attr('src', URL.createObjectURL(myBlob));
//     img.appendTo('#sim');
//     console.log("ok");
//   })
//   .catch(error => {
//     console.error('There has been a problem with your fetch operation:', error);
//   });