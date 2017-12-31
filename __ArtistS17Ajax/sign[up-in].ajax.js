$(document).ready(function() {
  $('#signup-btn').click(function (){
    $(this).prop('disabled', true);
    var data =
    {
      name: $('#signup-name').val(),
      email: $('#signup-email').val(),
      password: $('#signup-password').val(),
      api: $('#signup-api').val()
    };

    $.ajax({
      url: '__ArtistS17Ajax/signup.ajax.php',
      type: 'POST',
      data: data,
      dataType: 'json',
      success: function (data){
        $('#signup-btn').prop('disabled', false);
        //console.log(data);
        if(data[0][0] == 'error'){
          $('.help-block').html('');
  				$('.help-block').hide();
  				$('.form-group').removeClass("has-error");
          for(i = 1; i < data.length; i++){
            $("#" + data[i][0]).parent().addClass("has-error");
  					$("#" + data[i][0]).next().html(data[i][1]);
  					$("#" + data[i][0]).next().show(200);
          }
        }
        if(data[0][0] == 'success'){
          window.location = data[0][1];
        }
        if(data[0][0] == 'failed'){
            alert(data[0][1]);
        }
      },
      error: function (data){
        $('#signup-btn').prop('disabled', false);
        alert("ERROR! Please, Send email with screenahot to this email info@tst.890m.com\n We're sorry for that and we'll fix this soon");
        //console.log(data);
      }
    });

  });

  $('#signin-btn').click(function (){
    $(this).prop('disabled', true);
    var data =
    {
      email: $('#signin-email').val(),
      password: $('#signin-password').val(),
    };

    $.ajax({
      url: '__ArtistS17Ajax/signin.ajax.php',
      type: 'POST',
      data: data,
      dataType: 'json',
      success: function (data){
        $('#signin-btn').prop('disabled', false);
        //console.log(data);
        if(data[0][0] == 'error'){
          $('.help-block').html('');
  				$('.help-block').hide();
  				$('.form-group').removeClass("has-error");
          for(i = 1; i < data.length; i++){
            $("#" + data[i][0]).parent().addClass("has-error");
  					$("#" + data[i][0]).next().html(data[i][1]);
  					$("#" + data[i][0]).next().show(200);
          }
        }
        if(data[0][0] == 'success'){
          window.location = data[0][1];
        }
        if(data[0][0] == 'failed'){
            alert(data[0][1]);
        }
      },
      error: function (data){
        $('#signup-btn').prop('disabled', false);
        alert("ERROR! Please, Send email with screenahot to this email info@tst.890m.com\n We're sorry for that and we'll fix this soon");
        //console.log(data);
      }
    });

  });
});
