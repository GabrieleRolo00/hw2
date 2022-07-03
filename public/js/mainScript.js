//------- AGGIORNA INDEX


aggiorna('popular');
aggiorna('new');

function aggiorna(tipo){
  fetch("index/carica/"+tipo).then(onResponse).then(onJSON); 
}

function onResponse(response)
{
  return response.json();
 
}

function onJSON(json){
  

  for(casa of json){ 

    console.log(casa.prezzo);
    const article = document.createElement('article');
    const card_img = document.createElement('img');
    const link = document.createElement('a');
    const card_data = document.createElement('div');
    const card_like = document.createElement('div');
    const card_price = document.createElement('h3');
    const price = document.createElement('h3');
    const simbolo = document.createElement('span');
    const card_title = document.createElement('h3');
    const card_description = document.createElement('p');



    article.classList.add('popular_card');
    article.classList.add('swiper-slide');

    card_img.classList.add('card_img');
    card_data.classList.add('card_data');
    card_like.classList.add('card_like');
    card_price.classList.add('card_price');
    card_title.classList.add('card_title');
    card_description.classList.add('card_description');



    simbolo.textContent = "€";
    card_price.appendChild(simbolo);
    price.textContent = casa.prezzo;
    card_price.appendChild(price);

    if(casa.like !=null){
      const simbolo_cuore = document.createElement('i');
      if(casa.like){
        simbolo_cuore.classList.add("bx");
        simbolo_cuore.classList.add("bxs-heart");
      }else{
        simbolo_cuore.classList.add("bx");
        simbolo_cuore.classList.add("bx-heart");
      }
      simbolo_cuore.addEventListener('click', aggiungiPref);

      card_like.appendChild(card_price);
      card_like.appendChild(simbolo_cuore);
    }else{

      card_like.appendChild(card_price);
    }

    link.href = "post/"+casa.id_casa;

    card_title.textContent = casa.nome;
    card_description.textContent = ""+casa.descrizione;
    
    link.appendChild(card_title);
    link.appendChild(card_description);


    card_data.appendChild(card_like);
    card_data.appendChild(link);
    

    card_img.src = "./"+casa.img;

    article.appendChild(card_img);
    article.appendChild(card_data);


    if(casa.tipo=='popular'){
      div_swiper_popular.appendChild(article);
    }else{
      div_swiper_new.appendChild(article);
    }
    


    
  }

  //-------SWIPER------

  if(json[0].tipo=='popular')
  {
    const popular_container = document.querySelector('.popular_container');
    var swiperPopular = new Swiper(".popular_container", {
  
    spaceBetween: 32,
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    loop: true,
  
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  }else{
    
var swiperNews = new Swiper(".news_container", {

  spaceBetween: 32,
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: 'auto',
  loop: true,
  
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });  

  }
  

}

const div_swiper_popular = document.querySelector('.popular_container .swiper-wrapper');
const div_swiper_new = document.querySelector('.news_container .swiper-wrapper');
  

//-------- LIKES


function aggiungiPref(event)
{

  let url = event.path[2].childNodes[1].href;
  let id;

  let cuore = event.path[0];

  s0 = url.split("/");

  id = s0[4];

  if(cuore.classList.contains("bx-heart")){
    cuore.classList.remove("bx-heart");
    cuore.classList.add("bxs-heart");

    fetch("like/addLike/"+id);

  }else{
    cuore.classList.remove("bxs-heart");
    cuore.classList.add("bx-heart")

    fetch("like/removeLike/"+id);

  }

}

//mappa

const map_key = 'jknOd1EYAMx7IdoAB5J51TtW3EtGyceK';
const div_map = document.querySelector('.mappa');
const api = 'mappa';
const full_address="Viale Alcide De Gasperi, 29, 95127 Catania CT italia";	

fetch(api+"/"+full_address).then(onResponse).then(									//esegue la fetch delle coordinate
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






