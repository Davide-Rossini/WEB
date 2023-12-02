let ricerca_citta = document.getElementById("ricerca-citta");
let cerca = document.getElementById("cerca");
let risultato = document.getElementById("risultato");
let loader = document.querySelector(".loader")
loader.style.display = "none";
risultato.style.display = "none";


let getMeteo = () => {
    loader.style.display = "block";
    let nome_citta = ricerca_citta.value.trim(); 
    let url = 'https://api.openweathermap.org/data/2.5/weather?q='+nome_citta+'&appid=7522c38e96cc33f1ee5bd0def3168748&lang=it';
    if(nome_citta === ""){
        alert("Inserisci il nome della città");
        loader.style.display = "none";
    }
    else{
        fetch(url)
        .then(response => response.json())
        .then((data)=>{
            if(data.cod === 200){
                loader.style.display = "none";
                risultato.style.display = "block";
                let tempo = data.weather[0].main;
                if (tempo.trim() == "Clouds") {
                    document.body.classList.add("smooth-background");
                    document.body.style.backgroundImage = "url('img/clouds.webp')";
                } 
                if(tempo.trim() == "Rain"){
                    document.body.classList.add("smooth-background");
                    document.body.style.backgroundImage = "url('img/rain.jpg')";
                }   
                if(tempo.trim() == "Snow"){
                    document.body.classList.add("smooth-background");
                    document.body.style.backgroundImage = "url('img/snow.webp')";
                }
                if(tempo.trim() == "Clear"){
                    document.body.classList.add("smooth-background");
                    document.body.style.backgroundImage = "url('img/clear.jpg')";
                }
                if(tempo.trim() == "Mist"){
                    document.body.classList.add("smooth-background");
                    document.body.style.backgroundImage = "url('img/mist.webp')";
                }
                risultato.innerHTML = `
                    <div class="informazioni">
                        <h2>Meteo: ${data.weather[0].main}🌤️</h2>
                        <h2>Descrizione: ${data.weather[0].description}🧾</h2>
                        <h2>Temperatura: ${data.main.temp}K🌡️</h2>
                        <h2>Pressione: ${data.main.pressure} hPa⚠️</h2>
                        <h2>Umidità: ${data.main.humidity}%💧</h2>
                        <h2>Temperatura minima: ${data.main.temp_min}K🌡️</h2>
                        <h2>Temperatura massima: ${data.main.temp_max}K🌡️</h2>
                        <h2>Visibilità: ${data.visibility}m📏</h2>
                    </div>
                `;
            }
            
            else{
                alert("Città non trovata");
                loader.style.display = "none";
            }
        })
        .catch(()=>{
            alert("Errore");
        });
    }
};
cerca.addEventListener("click", getMeteo);
