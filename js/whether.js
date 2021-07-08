const API_KEY = "8cff5e0c68c0198face2d2e30d581d11";
const current_data = document.getElementById('current');
const daily_data = document.getElementById('daily');
let dailyData=''
setInterval(()=>{
var time = new Date();
var months =["January","February","March","April","May","June","July","August","September","October","November","December"];
var month=time.getMonth();
var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var day=time.getDay();
var year = time.getFullYear();
var date= time.getDate();
var hour = time.getHours();
var pm = "PM";
if(hour == 12){
    hour=12;
}
if(hour>12){
    hour=hour-12;
    pm="AM";
}
if(hour<10){
    hour="0" +hour;
}
var minute = time.getMinutes();
if(minute<10){
    minute = "0" + minute;
}
var second = time.getSeconds();
if(second<10){
    second = "0" +  second;
}

document.getElementById('time').innerHTML = hour+' : '+minute+' : '+second+'  '+pm;
document.getElementById('date').innerHTML = days[day]+'  '+date+'  '+months[month]+'  '+year;
// console.log(hour+':'+minute+':'+second+' '+pm);
// console.log(days[day]+' '+date+' '+months[month]+' '+year);
},1000);
function getWheterData(){
navigator.geolocation.getCurrentPosition((success) => {
    console.log(success);
    let {latitude,longitude}=success.coords;
    console.log(latitude);
    console.log(longitude);

    fetch(`https://api.openweathermap.org/data/2.5/onecall?lat=${latitude}&lon=${longitude}&exclude={path}&units=metric&appid=${API_KEY}`)
    .then(response =>{
        getData(response.json());
    })
    .catch(err => {
        console.error(err);
    });
});
}
getWheterData();

function getData(result){
Promise.resolve(result).then(value =>{
    console.log(value);
    getCurrentData(value.current);
    getDailyData(value.daily);
    document.getElementById('time_Zone').innerHTML = value.timezone;
    document.getElementById('lat').innerHTML=value.lat;
    document.getElementById('lon').innerHTML=value.lon;
})
}
function getCurrentData(current){
 let {dt,humidity,pressure,sunrise,sunset,temp,visibility,uvi,feels_like,dew_point,clouds,wind_speed,wind_gust,wind_deg}=current;
 let {description,icon,id,main,} = current.weather[0];
 current_data.innerHTML=`
    <div class="d-flex current_temprature">
        <img src="http://openweathermap.org/img/w/${icon}.png" alt="">
        <h1>${temp} &deg;c</h1>
    </div>
    <div class="current_info">
        <h2>${description}</h2>
        <p>Updateed On :<span> ${window.moment(dt*1000).format('hh : mm : ss a')} </span></p>
    </div>
    <div class="d-flex info_whether">
        <ul class="d-flex">
            <li>sunrise :<span>${window.moment(sunrise*1000).format('hh: mm : ss a')}</span></li>
            <li>sunset :<span>${window.moment(sunset*1000).format('hh: mm : ss a')}</span></li>
            <li>feels like :<span>${feels_like} &degc;</span></li>
            <li>pressure :<span>${pressure} hPa</span></li>
            <li>humidity :<span>${humidity} %</span></li>
            <li>dew point :<span>${dew_point} &degc;</span></li>
            <li>clouds :<span>${clouds} %</span></li>
            <li>UV index :<span>${uvi}</span></li>
            <li>Wind speed :<span>${wind_speed} metre/sec</span></li>
            <li>wind gust :<span>${wind_gust} metre/sec</span></li>
            <li>Wind direction :<span>${wind_deg} &deg;</span></li>
        </ul>
    </div>`;
}
//  {window.moment(sunrise*1000).format('hh : mm : ss a')}
function getDailyData(daily){
for(let i=0; i<daily.length; i++){
    // console.log(daily[i]);
    const {dt,sunrise,sunset} = daily[i];
    const {day,eve,morn,night,max,min} = daily[i].temp;
    const leg=daily[i].weather;
   for(let j = 0; j <leg.length; j++){
    //    console.log(leg[j]);
        var {description,icon} =leg[j];
   }
     dailyData += `
    <div class="daily_whether">
        <div class="daily_whether_body">
            <p>${window.moment(dt *1000).format('dddd DD')}</p>
            <img src="http://openweathermap.org/img/w/${icon}.png" alt="">
            <h2>${day} &deg;c</h2>
            <p>${description}</p>
            <ul>
                <li>sunrise<span>${window.moment(sunrise*1000).format('hh : mm : ss  a')}</span></li>
                <li>sunrise<span>${window.moment(sunset*1000).format('hh : mm : ss  a')}</span></li>
            </ul>
        </div>
    </div>`;

}
daily_data.innerHTML =dailyData;
}