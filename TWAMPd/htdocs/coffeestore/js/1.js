$(function(){
	// �� #menu li �[�W hover �ƥ�
	$('#menu li').hover(function(){
		// ����� li �����l���
		var _this = $(this),
			_subnav = _this.children('ul');
 
		// �ܧ�ثe���ﶵ���I���C��
		// �P�ɲH�J�l���(�p�G������)
		_this.css('backgroundColor', '#06c');
		_subnav.stop(true, true).fadeIn(400);
	} , function(){
		// �ܧ�ثe���ﶵ���I���C��
		// �P�ɲH�X�l���(�p�G������)
		// �]�i�H���y��W�����g�k
		$(this).css('backgroundColor', '').children('ul').stop(true, true).fadeOut(400);
	});
 
	// �����W�s������u��
	$('a').focus(function(){
		this.blur();
	});
});