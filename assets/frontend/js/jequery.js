$(document).ready(function(){
	$(".chitiet-header ul li").click(function(){
		var _type = $(this).attr("type");
		$(".mota-danhgia > div").each(function(){
			if($(this).hasClass(_type)){
				$(this).removeAttr("style","display:none");
				$(this).attr("style","display:block;border: 1px solid #D8D5D5; border-radius: 5px;margin-left: -17px;");
			}
			else{
				$(this).hide();
			}

		})
	})
})   
