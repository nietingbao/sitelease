/**
 * Created by 聂廷宝 on 2016/7/30.
 */
//document.getElementsByClassName("disable").href=null;//在ie之外的浏览器把连接地址删除
$(document).ready(function(){
    var mydate = new Date();
    //document.write($("#year option:selected").text());
    //document.write(mydate.getDate());
    $(".reserved").css({
        "text-decoration":"none",
        "color":"red",
    })
    $(".date").each(function(){
        if($("#year option:selected").text()<mydate.getFullYear()||
            (($("#year option:selected").text()==mydate.getFullYear()&&$("#month option:selected").text()<(mydate.getMonth()+1)))||
            ($("#year option:selected").text()==mydate.getFullYear()&&$("#month option:selected").text()==(mydate.getMonth()+1)&&$(this).text()<=mydate.getDate())){
            $(this).addClass("disable");
        }
    });
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

