const indietro = document.querySelector('.indietro');
const container = document.querySelector('.container');
const div_map = document.querySelector('.mappa');

const div_img = document.querySelector('.img');
const data = document.querySelector('.data');
const data_title = document.querySelector('.title');
const data_prezzo = document.querySelector('.prezzo');
const data_ind = document.querySelector('.indirizzo');
const data_desc = document.querySelector('.descrizione');
const title_like = document.querySelector('.title_like');

let img = document.createElement('img'),id;

indietro.addEventListener('click',() =>{
    history.back();
})



caricaPagina();

function caricaPagina()   //gestione like
{
    cuore = document.querySelector('#cuore');
    id = data_title.getAttribute("name");
    if (cuore!=null)
      cuore.addEventListener('click', aggiungiPref);

}


function aggiungiPref()
{


  if(cuore.classList.contains("bx-heart")){
    cuore.classList.remove("bx-heart");
    cuore.classList.add("bxs-heart");

    fetch("like/addLike/"+id);

  }else{
    cuore.classList.remove("bxs-heart");
    cuore.classList.add("bx-heart");

    fetch("like/removeLike/"+id);

  }

}

const map_key = 'jknOd1EYAMx7IdoAB5J51TtW3EtGyceK';
const api = 'mappa';
let indirizzo = data_ind.innerText;

const full_address= indirizzo + " italia";	

fetch(api+"/"+full_address).then(onResponse).then(
          function(json){
            loadmap(div_map,json.lat,json.lng);													//quando arrivono crea la mappa
          }
);

function onResponse(response) {
	return response.json();
}


function loadmap(div_map,lat,lng){
  L.mapquest.key=map_key;
  const this_map=L.mapquest.map(
    div_map, {
      center: [lat, lng],																//la mappa viene centrata a queste coordinate
      layers: L.mapquest.tileLayer('map'),											//stile della mappa (map,satellite,ecc);
      zoom: 12															//zoom iniziale
    }
  );
      L.marker([lat, lng], {																	//crea un marker alle coordinate lat, lng
        icon: L.mapquest.icons.marker(),
        draggable: false
      }).bindPopup('Ci trovi qui').addTo(this_map);											//al click mostra il messaggio 'ci trovi qui'
}
