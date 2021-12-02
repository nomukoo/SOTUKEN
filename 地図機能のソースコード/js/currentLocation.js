function initMap() {
    // google map へ表示するための設定
    latlng = new google.maps.LatLng(lat, lng);
    map = document.getElementById("map");
    opt = {
        zoom: 13,
        center: latlng,
    };
    // google map 表示
    mapObj = new google.maps.Map(map, opt);
    // マーカーを設定
    marker = new google.maps.Marker({
        position: latlng,
        map: mapObj,
        title: '現在地',
    });
}