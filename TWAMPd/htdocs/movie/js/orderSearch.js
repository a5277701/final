$(document).ready(function(){
  ChangePage();//更新頁面
  ChangeTheater();//更新影城
  $('#select_theater').change(ChangeHall);//影城連動影廳
  $('#select_theater').change(ChangePage);//影城連動頁面
  $('#select_hall').change(ChangePage);//影廳連動頁面
  $('#select_name').keydown(function(event){
    //偵測Enter
    if( event.which == 13 ) {
      SearchMovie();//變更頁面
      ChangeTheater();//更新影城
    }
  });
});
function ChangeTheater(){//更新影城
  $.ajax({
    url: "html/process/process_orderSearch.php",
    type: "POST",
    data: {choose:"theater"},
    success: function(data){
      $('#select_theater').html(data);//增加影城
      $('#select_hall').html("<option value=''>請先選擇影城</option>");//增加影廳
    }
  });
};
function ChangeHall(){//影城連動影廳
  $.ajax({
    url: "html/process/process_orderSearch.php",
    type: "POST",
    async: false,//這裡有一個很重要的陷阱，就是關於 async 這個 非同步執行 的存在。Default value is true
    data: {select_theater: $('#select_theater').val(),
            choose:"hall"},
    success: function(data){
      $('#select_hall').html(data);//增加類型
    }
  });
};
function ChangePage(){//更新頁面
  $.ajax({
    url: "html/process/process_orderSearch.php",
    type: "POST",
    data: {select_theater: $('#select_theater').val(),
            select_hall: $('#select_hall').val(),
            choose:"page"},
    success: function(data){
      // alert('戲院'+$('#select_theater').val()+',影廳'+$('#select_hall').val());
      $('.show_order').html(data);
    }
  });
};

function SearchMovie() {//關鍵字查詢
  $.ajax({
    url: "html/process/process_orderSearch.php",
    type: "POST",
    data: {select_name: $('#select_name').val(),
            choose:"search"},
    success: function(data){
      $('.show_order').html(data);
    }
  });
};