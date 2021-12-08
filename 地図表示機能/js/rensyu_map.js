//マウスオーバーで情報ウィンドウを表示させる
function initMap() {
    //マーカーの情報
    var data = new Array();
    data.push({
        lat: '34.365791908938554', //緯度
        lng: '132.47033788640064', //経度
        content:'<form action="/defrost_list"  method="get"><input type="hidden" name="hospital" value="H0001"> <input type="submit" value="予約"></form> <br>かみつな内科医院' //情報ウィンドウの内容
    });
    data.push({
        lat: '34.36488857935497',
        lng: '132.46572448706985',
        content: '<form action="/defrost_list"  method="get"><input type="hidden" name="hospital" value="H0002"> <input type="submit" value="予約"></form> <br>井上内科</p>'
    });
    data.push({
        lat: '34.36479437721773',
        lng: ' 132.47072441397793',
        content: '<form action="/defrost_list"  method="get"><input type="hidden" name="hospital" value="H0003"> <input type="submit" value="予約"></form> <br>田島医院</p>'
    });
    data.push({
        lat: '34.36025617011675',
        lng: ' 132.46931196543233',
        content: '<form action="/defrost_list"  method="get"><input type="hidden" name="hospital" value="H0004"> <input type="submit" value="予約"></form> <br>しまもと医院</p>'
    });
    data.push({
        lat: '34.36360751206115',
        lng: ' 132.4651799629686',
        content: '<form action="/defrost_list"  method="get"><input type="hidden" name="hospital" value="H0005"> <input type="submit" value="予約"></form> <br>宏精クリニック</p>'
    });
    data.push({
        lat: '34.376765316501526',
        lng: '132.46509409515565',
        content: '<form action="/defrost_list"  method="get"><input type="hidden" name="hospital" value="H0006"> <input type="submit" value="予約"></form> <br>堂面小児科内科醫院</p>'
    });
    data.push({
        lat: '34.373214605882474',
        lng: '132.46424289581776',
        content: '<form action="/defrost_list"  method="get"><input type="hidden" name="hospital" value="H0007"> <input type="submit" value="予約"></form> <br>平賀内科クリニック</p>'
    });
    data.push({
        lat: '34.370557961755885',
        lng: '132.46572347513788',
        content: '<form action="/defrost_list"  method="get"><input type="hidden" name="hospital" value="H0008"> <input type="submit" value="予約"></form> <br>やまぐち内科クリニック</p>'
    });
    data.push({
        lat: '34.38034831992629',
        lng: ' 132.47135346219943',
        content: '<form action="/defrost_list"  method="get"><input type="hidden" name="hospital" value="H0009"> <input type="submit" value="予約"></form> <br>ヒロシマ平松病院</p>'
    });
    data.push({
        lat: '34.380472414621366',
        lng: ' 132.476179919435',
        content: '<form action="/defrost_list"  method="get"><input type="hidden" name="hospital" value="H0010"> <input type="submit" value="予約"></form> <br>新でしお病院</p>'
    });
    data.push({
        lat: '34.3775660581257',
        lng: '  132.49050001759176',
        content: '<form action="/defrost_list"  method="get"><input type="hidden" name="hospital" value="H0011"> <input type="submit" value="予約"></form> <br>広島厚生病院</p>'
    });
    //初期位置に、上記配列の最初の緯度経度を格納
    var latlng = new google.maps.LatLng(data[0].lat, data[0].lng);
    var opts = {
        zoom: 15,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map"), opts);
    
  
    var markers = new Array();
    //マーカーを配置するループ
    for (i = 0; i < data.length; i++) {
        markers[i] = new google.maps.Marker({
            position: new google.maps.LatLng(data[i].lat, data[i].lng),
            map: map
        });
        markerInfo(markers[i], data[i].content);
    }

}

/*function initMap() {
    var infowindow = new google.maps.InfoWindow();
    // google map へ表示するための設定
    latlng = new google.maps.LatLng(lat, lng);
    map = document.getElementById("map");
    opt = {
        zoom: 13,
        center: latlng,
    };
    // google map 表示
    mapObj = new google.maps.Map(map, opt);
    google.maps.event.addListener(map, "click", function() {infowindow.close();});

    // マーカーを設定
    marker = new google.maps.Marker({
       
        position: latlng,
        map: mapObj,
        title: '現在地',

        animation: google.maps.Animation.DROP,
	icon: {
		fillColor: "#FF0000",                //塗り潰し色
		fillOpacity: 0.8,                    //塗り潰し透過率
		path: google.maps.SymbolPath.CIRCLE, //円を指定
		scale: 16,                           //円のサイズ
		strokeColor: "#FF0000",              //枠の色
		strokeWeight: 1.0                    //枠の透過率
	},
	label: {
        
		text: '現',                           //ラベル文字
		color: '#FFFFFF',                    //文字の色
		fontSize: '20px'                     //文字のサイズ
	}
    
    });
}
*/
  
function markerInfo(marker, name) {
    google.maps.event.addListener(marker, 'click', function (event) {
        new google.maps.InfoWindow({
            content: name
        }).open(marker.getMap(), marker);
    });    
}
  
