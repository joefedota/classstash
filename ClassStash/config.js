
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#confprof').attr('src', e.target.result);
      $('#cprofdiv').css('background-image', 'none');
    };
    reader.readAsDataURL(input.files[0]);
  }
}