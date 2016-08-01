/**
 * Created by 聂廷宝 on 2016/7/30.
 */
var year;
var month;
function getDays(){
    var days;
    year = parseInt(document.getElementById("year").value);
    month = parseInt(document.getElementById("month").value);
    if(month == 2){
        if(((year%4==0)&&(year%100!=0))||(year%400==0))
        {
            days=29;
        }
        else
            days=28;
    }
    else if(month == 1||month==3||month==5||month==7||month==8||month==10||month
        ==12){
        days = 31;
    }
    else days = 30;
    return days;
}
function showDays(){
    var days = getDays();

    for(var i= 1;i<=days;i++)
    {
        document.getElementById("date").innerHTML="<td><a href='/sitelease/basic/web/?r=reserve-with-gii/create&id=1&d=1&date='+i>"+i+"</a></td> "
    }
}