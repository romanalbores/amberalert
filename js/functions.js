function actualizaProgress(tab, navigation, index){        
    var $total = navigation.find("li").length;
    var $current = index+1; 
    var $percent = ($current/$total) * 100;
    $("#wizard-bar > .bar").css({width:$percent+"%"});    
}