<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    中略
    
    </head>
    <body>
        
        <div id="map" style="height:850px">
	</div>
	

	{!! Form::open(['route' => 'result.currentLocation','method' => 'get']) !!}
    　　 {{--隠しフォームでresult.currentLocationに位置情報を渡す--}}
    　　 {{--lat用--}}
    　　 {!! Form::hidden('lat','lat',['class'=>'lat_input']) !!}
    　　 {{--lng用--}}
    　　 {!! Form::hidden('lng','lng',['class'=>'lng_input']) !!}
    　　 {{--setlocation.jsを読み込んで、位置情報取得するまで押せないようにdisabledを付与し、非アクティブにする。--}}
    　　 {{--その後、disableはfalseになるようにsetlocation.js内に記述した--}}
    　　 {!! Form::submit("周辺を表示", ['class' => "btn btn-success btn-block",'disabled']) !!}
    　　 {!! Form::close() !!}

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	    <script src="{{ asset('/js/setLocation.js') }}"></script>
        <script src="{{ asset('/js/result.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyDiALKw8a6mIJMEoEyuKoiCsJG8lHayCXM&callback=initMap" async defer>
            
        </script>
    </body>
</html>