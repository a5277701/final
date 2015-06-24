$(function(){
		// 幫 #hmenu li a 加上 hover 事件
		$("#vmenu li a").hover(function(){
			// 滑鼠移進選項時..
			// 把背景圖片的位置往左移動
			var _this = $(this),
				_width = _this.width() * -1;
			_this.stop().animate({
				backgroundPosition: _width + "px 0"
			}, 200);
		}, function(){
			// 滑鼠移出選項時..
			// 把背景圖片的位置移回原位
			$(this).stop().animate({
				backgroundPosition: "0 0"
			}, 200);
		});
	});