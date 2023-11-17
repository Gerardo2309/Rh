window.onload=function() {
    progresar();
}

function progresar(){
    var current = 1,current_step,next_step,steps;
    steps = $("fieldset").length;
    $(".next").click(function(){
        current_step = $(this).parent();
        next_step = $(this).parent().next();
        next_step.show();
        current_step.hide();
        setProgressBar(++current);
    });
    $(".previous").click(function(){
        current_step = $(this).parent();
        next_step = $(this).parent().prev();
        next_step.show();
        current_step.hide();
        setProgressBar(--current);
    });
    setProgressBar(current);
    // Change progress bar action
    function setProgressBar(curStep){
        var percent = parseFloat(100 / steps) * (curStep-1);
        percent = percent.toFixed();
        if(percent<=100 &&curStep>1){
            $(".progress-bar")
            .css("width",percent+"%")
            .html(percent+"%");
        }else if(curStep==1){
            $(".progress-bar")
            .css("width",(percent+5)+"%")
            .html(percent+"%");
        }
    }
}