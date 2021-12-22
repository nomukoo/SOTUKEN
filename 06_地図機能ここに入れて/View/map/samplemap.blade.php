<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Google maps API</title>
<style type="text/css">
html,body,#map {
height: 100%;
}
</style>
</head>
<body>
<div id="map"></div>
<script type="text/javascript" src="mapscript.js"></script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyDiALKw8a6mIJMEoEyuKoiCsJG8lHayCXM&callback=initMap"
>
</script>
<script src="{{ asset('/js/samplemap.js') }}"></script>
</body>
</html>