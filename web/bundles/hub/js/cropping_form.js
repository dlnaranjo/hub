$(function () {

// The variable jcrop_api will hold a reference to the
// Jcrop API once Jcrop is instantiated.
    var jcrop_api;
    $('#cropbox').Jcrop({
        aspectRatio: 1,
        boxWidth: 500,
        boxHeight: 340,
        onSelect: updateCoords
    }, function () {
        jcrop_api = this;
        jcrop_api.animateTo([100, 100, 400, 300]);
    });
    $('#cropandsave').click(function () {

        $('#cropform').form('submit', {
           
            onSubmit: function () {
                var isValid = checkCoords();
                return isValid;
            },
            success: function (data) {
                $('#cropped_photo').val(data);
                $('#photoPerfil')[0].src = BaseUrl + '../bundles/hub/perfil/' + data;
            }

        });
    });
    $('#inputPhoto').on('change', function () {
        var reader = new FileReader();
        reader.readAsDataURL(document.getElementById('inputPhoto').files[0]);
        reader.onload = function (e) {
            jcrop_api.setImage(e.target.result);
            jcrop_api.setOptions({bgOpacity: .6});
        };
    });
});
function updateCoords(c)
{
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
}


function checkCoords()
{
    if (parseInt($('#w').val()))
        return true;
    alert('Please select a crop region then press submit.');
    return false;
}
