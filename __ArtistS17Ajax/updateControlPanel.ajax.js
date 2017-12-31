$(document).ready(function() {
  function refreshRooms(){
    $.ajax({
      url: '__ArtistS17Ajax/updateControlPanel.ajax.php',
      type: 'POST',
      data: {rooms: 'update'},
      dataType: 'json',
      success: function (data){
        //console.log(data);
        $('#settings').html(data[1]);
      },
      error: function (data){
        //console.log(data);
      }
    });
  }
  
  refreshRooms();
  setInterval(function(){ refreshRooms(); }, 60000);

  $('body').on('click', '#new-room-btn', function (){
    $('#new-room-btn').prop('disabled', true);
    var data =
    {
      roomName: $('#new-room-name').val()
    };
    $.ajax({
      url: '__ArtistS17Ajax/addRoom.ajax.php',
      type: 'POST',
      data: data,
      dataType: 'json',
      success: function (data){
        $('#new-room-btn').prop('disabled', false);
        console.log(data);
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
          $('#new-room-name').val('');
          refreshRooms();
          alert(data[0][1]);
        }
        if(data[0][0] == 'failed'){
          alert(data[0][1]);
        }
      },
      error: function (data){
        console.log(data);
        $('#new-room-btn').prop('disabled', false);
        refreshRooms();
        //alert("ERROR! Please, Send email with screenahot to this email info@tst.890m.com\n We're sorry for that and we'll fix this soon");
      }
    });
  });

  $('body').on('click', '#new-pin-btn', function (){
    var btn = $(this);
    btn.prop('disabled', true);
    var btnVal = btn.val();
    var data =
    {
      pinName: $("input[id=new-pin-name-" + btnVal + "]").val(),
      pinNum: $("input[id=new-pin-num-" + btnVal + "]").val(),
      roomId: btnVal
    };
    $.ajax({
      url: '__ArtistS17Ajax/addPin.ajax.php',
      type: 'POST',
      data: data,
      dataType: 'json',
      success: function (data){
        btn.prop('disabled', false);
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
          refreshRooms();
          alert(data[0][1]);
        }
        if(data[0][0] == 'failed'){
          alert(data[0][1]);
        }
      },
      error: function (data){
        //console.log(data);
        btn.prop('disabled', false);
        refreshRooms();
        //alert("ERROR! Please, Send email with screenahot to this email info@tst.890m.com\n We're sorry for that and we'll fix this soon");
      }
    });
  });

  $('body').on('click', '#pin-change-mode', function (){
    var btn = $(this);
    btn.prop('disabled', true);
    var btnVal = btn.val();
    var data =
    {
      pinData: btnVal
    };
    $.ajax({
      url: '__ArtistS17Ajax/changePin.ajax.php',
      type: 'POST',
      data: data,
      dataType: 'json',
      success: function (data){
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
          refreshRooms();
          //alert(data[0][1]);
        }
        if(data[0][0] == 'failed'){
          alert(data[0][1]);
        }
      },
      error: function (data){
        //console.log(data);
        refreshRooms();
        //alert("ERROR! Please, Send email with screenahot to this email info@tst.890m.com\n We're sorry for that and we'll fix this soon");
      }
    });
  });

});
