$(document).ready(function() {
  $('#logout-btn').click(function (e){
    e.preventDefault();
    $.ajax({
      url: '__ArtistS17Ajax/logout.ajax.php',
      type: 'POST',
      data: {logout: true},
      dataType: 'json',
      success: function (data) {
        if(data[0] == 'loggedout') window.location = "index.php";
        else alert("ERROR!");
      },
      error: function () {
        alert('ERROR');
      }
    });
  });
});
