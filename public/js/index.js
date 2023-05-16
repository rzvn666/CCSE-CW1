// Initialize and add the map
function initMap() {
    // The location of dealership
    const dealership = { lat: 52.40872917234603, lng: -1.5282778206820966 };
    // The map, centered at dealership
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 16,
      center: dealership,
    });
    // The marker, positioned at dealership
    const marker = new google.maps.Marker({
      position: dealership,
      map: map,
    });
  }
  
  window.initMap = initMap;