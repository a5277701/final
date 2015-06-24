$(document).ready(function(){
  ChangePage();//更新頁面
  ChangeStyle();//更新類型
  $('#select_style').change(ChangePage);//類型連動頁面
  $('#select_level').change(ChangePage);//分級連動電頁面
  $('#select_name').keydown(function(event){
    //偵測Enter
    if( event.which == 13 ) {
      SearchMovie();//查詢電影
    }
  });
});
function ChangeStyle(){//更新電影類型
  $.ajax({
    url: "html/process/process_movieSearch.php",
    type: "POST",
    data: {choose:"style"},
    success: function(data){
      $('#select_style').html(data);//增加類型
    }
  });
};
function SearchMovie() {//查詢電影
  $.ajax({
    url: "html/process/process_movieSearch.php",
    type: "POST",
    data: {select_name: $('#select_name').val(),
            choose:"search"},
    success: function(data){
      $('.show_cover').html(data);//增加電影
    }
  });
};
function ChangePage(){//更新頁面
  $.ajax({
    url: "html/process/process_movieSearch.php",
    type: "POST",
    data: {select_style: $('#select_style').val(),
            select_level: $('#select_level').val(),
            choose:"page"},
    success: function(data){
      $('.show_cover').html(data);//增加電影
    }
  });
};