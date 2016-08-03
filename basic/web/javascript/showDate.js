/**
 * Created by 聂廷宝 on 2016/7/30.
 */
//document.getElementsByClassName("disable").href=null;//在ie之外的浏览器把连接地址删除
$(document).ready(function(){
    var mydate = new Date();
    $(".date").each(function(){
        if($(this).text()<=mydate.getDate()){
            $(this).addClass("disable");
        }
    })
    $(".disable").each(function(){
        $(this).css({
                "background-color":"#CCC",
            }
        );
        $(this).children("a").css({
            "color":"white",
                "text-decoration":"none",
        }
        );
       $(this).on('click',function(even){
           even.preventDefault();
       })
    });

})

