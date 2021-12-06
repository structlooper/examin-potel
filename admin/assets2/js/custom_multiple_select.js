$(function(){

	$(document).on("click", ".DropDownData", function(res){
        var DivHead = res.target.parentNode;
        $(DivHead).find(".DropDownList").toggleClass("DropDownToggleList");
        $(DivHead).find(".DropDownChevron").toggleClass("DropDownChevronToggle");
    })

	$(document).on("click", ".ItemsCheckBox", function(res){
	    var DivHead = res.target.parentNode.parentNode.parentNode;
	    var data = [];
	    var datas = [];
	    var id=[];
	    var ids=[];
	    $.each($(DivHead).find(".ItemsCheckBox:checked"), function(){
	        data.push($(this).val());
	        id.push($(this).attr("DropDownId"));
	    })
	    for(var i=0; i<data.length; i++){
	        datas[i] = data[i]+"";
	        ids[i] = id[i]+"";
	    }
	    FinalItem = data.toString();

	    $(".DropDownId").val(datas);
	    $(".showData").val(ids);
	}) // Select CheckBox Close		

})  // Open CheckBox List Close