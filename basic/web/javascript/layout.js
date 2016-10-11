/**
 * Created by ÄôÐ¡±¦ on 2016/10/10.
 */
console.log("dasdsa");
$(function(){
    $(".nav > li").click(function(){
        var index = $(this).index();
        $(".nav > li").each(function(n,value){
            if(n==index){
                $(value).css("color","blue");
            }else{
                $(value).css("color","white");
            }
        })
    })
})