import GoogleMapsLoader from 'google-maps';

export default {
  init() {
    // JavaScript to be fired on the about us page
    GoogleMapsLoader.KEY = 'AIzaSyCuD2J2grKa4cFLf9GzAHAx_qqizVN38fs';


    GoogleMapsLoader.load(function(google) {
        new google.maps.Map(document.querySelector('.thf-about-map__container'), {
          center: {lat: 33.5348737, lng: -101.9504538},
          zoom: 19,
        });
    });
  },
};
