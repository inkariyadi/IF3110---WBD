let show = 1;

function ambildata(year,month){
    console.log(year);
    console.log(month);
    let date1 = year + "/"+ month + "/"+ "01";
    ;let year1 = parseInt(year)+1;
    let date2 = year1.toString() + "/" + month + "/" + "01";
    console.log(date1);
    console.log(date2);
    let content = getDatesBetween(date1,date2);
    document.getElementById("calendar").innerHTML = content;    
}

function showdate(){
    let content="<div class='container'>";
    let now = new Date();
    content+="<p> " + now +"</p>";
    content+="<p> Year: " + now.getFullYear();
    content+=". Date: " + now.getDate();
    content+=". Hour: " + now.getHours();
    content+=". Minute: " + now.getMinutes();
    content+=". Second: " + now.getSeconds();
    content+=". Milisecond: " + now.getMilliseconds() + "</p>";
    console.log(content);
    // content+= "<p>" + now + "</p>";
    document.getElementById("info").innerHTML = content;    

}
function settingDate(date, day){
    date = new Date(date);
    date.setDate(day);
    date.setHours(23);

    return date;
}
function getDatesBetween(date1,date2){
    let range1 = new Date(date1);
    let range2 = new Date(date2);
    date1 = settingDate(date1,31);
    date2 = settingDate(date2, 31);

    let temp;
    let dates = [];
    while(date1<=date2){
        if(date1.getDate()!=31){
            temp = settingDate(date1,0);
            if(temp>=range1 && temp<=range2){
                dates.push(temp);
            }
            date1 = settingDate(date1, 31);
        }
        else{
            temp = new Date(date1);
            if(temp>=range1&&temp<=range2){
                dates.push(temp);
            }
            date1.setMonth(date1.getMonth() + 1);
        }

    }

    console.log(dates);
    let content = "<div class='calendarButton'><button id='calendarPrev' onclick='Prev()' disabled>Prev</button> | <button id='calendarNext' onclick='Next()'>Next</button></div>";
    // let content = "";
    let weekdays = [{shortDay:"Mon",fullDay: "Monday"},
                    {shortDay:"Tue", fullDay : "Tuesday"},
                    {shortDay:"Wed", fullDay : "Wednesday"},
                    {shortDay:"Thu", fullDay : "Thursday"},
                    {shortDay:"Fri", fullDay : "Friday"},
                    {shortDay:"Sat",fullDay: "Saturday"},
                    {shortDay:"Sun",fullDay: "Sunday"}];
    
    let firstDate;
    let lastDate;
    for (let i=0;i<dates.length;i++){
        lastDate = dates[i];
        firstDate = new Date(dates[i].getFullYear(),dates[i].getMonth(),1);
        content += "<div id='calendar" + (i+1)+"' class='calendarDiv'>";
        content += "<h2>" + firstDate.toString().split(" ")[1] + firstDate.getFullYear() + "</h2>";
        content += "<table class='calendarTable'>";
        content += "<thead>";
        weekdays.map(item=>{
            content+="<th>" + item.fullDay + "</th>" });
        content+="</thead>";

        let j=1;
        let displayNum, idMonth;
        while (j<=lastDate.getDate()){
            content+= "<tr>";
            
            for (let k=0;k<7;k++){
                displayNum = j<10 ? "0" + j:j;
                if(j==1){
                    if(firstDate.toString().split(" ")[0]==weekdays[k].shortDay){
                         content+="<td>" + displayNum + "</td>";
                         j++;
                    }
                    else{
                        content+="<td></td>";
                    }
                }
                else if(j>lastDate.getDate()){
                    content+="<td></td>";
                }
                else{
                    content+="<td>" + displayNum + "</td>";
                    j++;
                }
            
            }

            content +="</tr>";
        }
        content+="</table>";
       
        content+="</div>";
        ;

    }
    return content;
}

function Prev(){
    let t = document.getElementsByClassName('calendarDiv');
    document.getElementById('calendarNext').disabled = false;
    show--;
    if(show<=t.length){
        for (let i=0; i<t.length;i++){
            t[i].style.display="none";
    
        }

        if(show==1){
            document.getElementById('calendarPrev').disabled = true;
        }
    }
    
    document.getElementById("calendar" + show).style.display="block";
}

function Next(){
    let t = document.getElementsByClassName('calendarDiv');
    document.getElementById('calendarPrev').disabled = false;
    show++;
    if(show<=t.length){
        for (let i=0; i<t.length;i++){
            t[i].style.display="none";
    
        }

        if(show==t.length){
            document.getElementById('calendarNext').disabled = true;
        }
    }
   
    document.getElementById("calendar" + show).style.display="block";
}
    
    



// let content = getDatesBetween("2020/01/01",ambildata);
// document.getElementById("calendar").innerHTML = content;