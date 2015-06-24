$(document).ready(function(){
	$.get("html/content.html",function(data){ //初始將content.php include div#iframe
		$("#iframe").html(data);
	});
	$(function(){
		$('.changeContent li').click(function() {
 			 // 找出 li 中的超連結 href(#id)
 			var $this = $(this),
 			_clickTab = $this.find('a').attr('target'); // 找到連結a中的target標籤值
 			$.get(_clickTab,function(data){
 				$("#iframe").html(data);
 			});
		})
		$('div .logo').click(function() {
 			var $this = $(this),
 			_clickTab = $this.attr('target');
 			$.get(_clickTab,function(data){
 				$("#iframe").html(data);
 			});
		})
	})
});