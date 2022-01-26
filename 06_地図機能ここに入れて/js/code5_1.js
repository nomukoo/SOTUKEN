var map;

function initMap() {
  var opts = {
    zoom: 15,
    center: new google.maps.LatLng(34.38078237549215, 132.46816771220054)
  };

  map = new google.maps.Map(document.getElementById("map"), opts);

  map.addListener('idle', get_LatLng);
  map.addListener('drag', get_LatLng);
}

function get_LatLng(){

  var latlngBounds = map.getBounds();
  /*左下座標*/
  var swLatlng = latlngBounds.getSouthWest();

  /*右上座標*/
  var neLatlng = latlngBounds.getNorthEast();


  let latLangs = {};
  latLangs['sw'] = swLatlng;
  latLangs["ne"] = neLatlng;
  sendJsonData = JSON.stringify(latLangs);
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[id="csrf-token"]').attr('content')
    }
});
$.ajax({
    url: "/map_ajax",
    type: "POST",
    data: sendJsonData,
    dataType: "json",
    timeout: 500
}).done(function(data){
  console.log(data);
  let hospital_list = data;
  let markers = new Array();
  let content = new Array();
    //マーカーを配置するループ
  for(i = 0;i < hospital_list.length;i++){
      let rec = hospital_list[0];
      var obj = '<form action="/reserve_hospital"  method="get"><input type="hidden" name="hospital" value="'+rec['hospital_ID']+'"> <input type="submit" value="予約"></form> <br><p>'+rec['hospital_name']+'';
      content.push(obj);
      console.log(rec['hospital_ido']);
      console.log(rec['hospital_keido']);

      markers[i] = new google.maps.Marker({
        position: new google.maps.LatLng(rec['hospital_ido'], rec['hospital_keido']),
        map: map,
        label: String(rec['quantity']),
        icon: {
          fillColor: "#00bfff",                //塗り潰し色
		      fillOpacity: 0.8,                    //塗り潰し透過率
		      path:  google.maps.SymbolPath.CIRCLE, //円を指定
		      scale: 14,                           //円のサイズ
		      strokeColor: "#00bfff",              //枠の色
		      strokeWeight: 1.0        
        },
    });
    markerInfo(markers[i], content[i]);
  }
}).fail(function(XMLHttpRequest, status, e){
  if(status != 'timeout'){
    console.log(status);
  }
})
}



function markerInfo(marker, name) {
    google.maps.event.addListener(marker, 'click', function (event) {
        new google.maps.InfoWindow({
            content: name
        }).open(marker.getMap(), marker);
    });
}
