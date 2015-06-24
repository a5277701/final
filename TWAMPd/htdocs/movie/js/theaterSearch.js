$(document).ready(function(){
  ChangeTheater();//更新頁面
  $('#select_theater').change(ChangePage);//類型連動頁面
});
function ChangeTheater(){//更新影城
  $.ajax({
    url: "html/process/process_theaterSearch.php",
    type: "POST",
    data: {choose:"theater"},
    success: function(data){
      $('#select_theater').empty();//清空影城
      $('#select_theater').append(data);//增加影城
    }
  });
};
function ChangePage(){//更新頁面
  $.ajax({
    url: "html/process/process_theaterSearch.php",
    type: "POST",
    data: {select_theater: $('#select_theater').val(),
            choose:"page"},
    success: function(data){
      $('.show_theater').empty();
      $('.show_theater').append(data);
    }
  });
};