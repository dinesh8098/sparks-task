
const h = new Date();

const hour=h.getHours();
const min=h.getMinutes();
const sec=h.getSeconds();
const year=h.getFullYear();
const month=h.getMonth();
const date=h.getDate();

const time=hour+':'+min+':'+sec;
const day=year+'/'+month+'/'+date;
document.getElementById("timee").innerHTML =time;
document.getElementById("datei").innerHTML =day;

