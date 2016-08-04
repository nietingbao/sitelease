/**
 * Created by 聂廷宝 on 2016/7/30.
 */
//document.getElementsByClassName("disable").href=null;//在ie之外的浏览器把连接地址删除
$(document).ready(function(){
    var mydate = new Date();

    //设计已经预约的样式.a标签
    $(".reserved").css({
        "text-decoration":"none",
        "color":"white",

    });
    $(".reserved").parent().removeClass("date");
    $(".reserved").parent().css({
        "background-color":"gray",
    });
    $(".reserved").on('click',function(even){
        even.preventDefault();
    });

    $(".date").each(function(){//td标签
    //判断是否为今天以及过去的日期并赋予一个类
        if(!$(this).children("a").hasClass("reserved")){
            if($("#year option:selected").text()<mydate.getFullYear()||
            (($("#year option:selected").text()==mydate.getFullYear()&&$("#month option:selected").text()<(mydate.getMonth()+1)))||
            ($("#year option:selected").text()==mydate.getFullYear()&&$("#month option:selected").text()==(mydate.getMonth()+1)&&$(this).text()<=mydate.getDate()))
            {
                $(this).removeClass("date");
                $(this).addClass("disable");
        }}
        //判断是否为周末并赋予一个类
        var date = $("#year option:selected").text()+"-"+$("#month option:selected").text()+"-"+$(this).children("a").text().replace(/\s+/g,"");

        //document.write(date);
        var a = new Date(date);
        if(a.getDay()==6|| a.getDay()==0)
        $(this).addClass("weekend");

    });
    //设置过去时间的样式
    $(".disable").each(function(){
        $(this).css({
                "background-color":"white",
            }
        );
        $(this).children("a").css({
            "color":"gray",
                "text-decoration":"none",
        }
        );
       $(this).on('click',function(even){
           even.preventDefault();
       })
    });
    //设置周末的样式
    $(".weekend").css({
        "background-image":"url(/sitelease/basic/picture/sign.gif)",
        "background-position": "right bottom",
        "background-repeat": "no-repeat",
    })

})

