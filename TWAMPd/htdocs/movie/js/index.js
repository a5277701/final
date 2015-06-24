$(function() {
	//changeContent
	$.get("html/content.html",function(data){ //初始將content.php include div#iframe
		$("#iframe").html(data);
	});
	$('.changeContent li').click(function() {
			 // 找出 li 中的超連結 href(#id)
			var $this = $(this),
			// 找到連結a中的target標籤值
			_clickTab = $this.find('a').attr('target');
			$.get(_clickTab,function(data){
				$("#iframe").html(data);
			});
			$this.addClass('nav_change').siblings('.nav_change').removeClass('nav_change');
	})
	$('div .logo').click(function() {
			var $this = $(this),
			_clickTab = $this.attr('target');
			$.get(_clickTab,function(data){
				$("#iframe").html(data);
			});
			$('.changeContent li').siblings('.nav_change').removeClass('nav_change');
	})

	//fancybox
	$(".fancybox").fancybox({
		prevEffect	: 'none',
		nextEffect	: 'none',
	});

	//top
	$(document).scroll(function(){
		var _jumpOutHeight = 300;
		//取得目前捲動的高度
		var height = $(document).scrollTop();
		if (height > _jumpOutHeight && $(".top").css("display") == "none" ) {
			$(".top").fadeIn(500);
		}
		if (height < _jumpOutHeight && $(".top").css("display") == "block" ) {
			$(".top").fadeOut(500);
		}
	});
	$('.top').click(function(){
		var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
		$body.animate({ scrollTop: 0 }, 600);
		return false;
	});
});