console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

import Places from 'places.js'

import Map from './modules/map.js'

Map.init()

let inputAddress = document.querySelector('#registration_entreprise_address')
if (inputAddress !== null) {
  let place = Places({
    container: inputAddress
  })
  place.on('change', e => {
    document.querySelector('#registration_entreprise_city').value = e.suggestion.city
    document.querySelector('#registration_entreprise_postalCode').value = e.suggestion.postcode
    document.querySelector('#registration_entreprise_lat').value = e.suggestion.latlng.lat
    document.querySelector('#registration_entreprise_lng').value = e.suggestion.latlng.lng
  })
}
