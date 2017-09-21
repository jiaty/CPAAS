$('.item').draggable({
    helper: 'clone',
    opacity: 0.8,
    revert: 'invalid',
    revertDuration: 200
});

var total = 0;

$('#cart').droppable({
    activeClass: 'active',
    drop: function(event, ui) {
        //複製被放開的元素
        $('.list', this).append(ui.draggable.clone());
        /*
		//補上總計金額
        total += ui.draggable.data('price');
        //插入金額逗號
        var sum = String(total).replace(/(\d)(\d{3})$/, '$1,$2');
        $('.total', this).html(sum + '元');
		*/
    }
});
function chk(){
  if(document.AAO.assetInto.value==''){
	alert('資本未填');
	document.AAO.assetInto.focus();
	return false;
  }
  if(document.AAO.reward.value==''){
	alert('預期報酬未填');
	document.AAO.reward.focus();
	return false;
  }
  if(document.AAO.reward.value<100){
	alert('預期報酬數值錯誤');
	document.AAO.reward.focus();
	return false;
  }
  return true;
}