$(function(){
		// �� #hmenu li a �[�W hover �ƥ�
		$("#vmenu li a").hover(function(){
			// �ƹ����i�ﶵ��..
			// ��I���Ϥ�����m��������
			var _this = $(this),
				_width = _this.width() * -1;
			_this.stop().animate({
				backgroundPosition: _width + "px 0"
			}, 200);
		}, function(){
			// �ƹ����X�ﶵ��..
			// ��I���Ϥ�����m���^���
			$(this).stop().animate({
				backgroundPosition: "0 0"
			}, 200);
		});
	});