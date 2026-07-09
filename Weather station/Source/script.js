function Vcitaj() {
    fetch("read.php")
    .then(response => response.json())
    .then(data =>{
        console.log(data);
        document.getElementById("temp").innerHTML = data.temperatura;
        document.getElementById("hum").innerHTML = data.vlaga;
        document.getElementById("time").innerHTML = data.vreme;
    })
    .catch(error=>console.log("Грешка!", error));
}

setInterval(Vcitaj, 5000);
Vcitaj();
