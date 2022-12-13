

// registration/ edit pop-up form
var info = document.getElementById("pop_up_background");
// var info2 = document.getElementById("personal-info2");
var cancel = document.getElementById("cancel");
var edit = document.getElementById("edit");
var navigation = document.getElementById("navigation");
var container = document.getElementById("container");
	edit.onclick =  function(){
		info.style.display ="block";
		navigation.style ="user-select: none";
        navigation.style="pointer-events: none";
        container.style ="user-select: none";
        container.style="pointer-events: none";
	}
    cancel.onclick =  function(){
		info.style.display ="none";
        navigation.style ="user-select: all";
        navigation.style="pointer-events: all";
        container.style ="user-select: all";
        container.style="pointer-events: all";
		
	}



