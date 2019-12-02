@extends('layouts.maps')

@section('title')
    ReTrack
@endsection

@section('name')
    Maps
@endsection

@section('content')
    <div class="maps" id="maps"> 
    </div> 
        <form class="wrap-map">
            <input class="input-assign-lokasi" type="text" name="lokasi" placeholder="Lokasi Tujuan">
        <br>
        <select class="select-assign" name="kategori">
            <option value="kategori">Kategori</option>
            <option value="kebakaran">Kebakaran</option>
            <option value="pembunuhan">Pembunuhan</option>
            <option value="kecelakaan">Kecelakan</option>
            <option value="pemerkosaan">Pemerkosaan</option>
        </select>
        <br>
        <input class="input-assign" type="text" name="mobil" placeholder="Jumlah Mobil">
        <br>
        <textarea class="input-deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
        <br>
        <input class="input-assign-upload" type="text" onfocus="(this.type='file')" name="upload-foto" placeholder="Upload Foto">
        <br>
        <button class="assign-btn">Assign Tugas</button>
    </form>

    <script>
        var map;
        var markerList = [];
        var pointList = [[]];

        setInterval(function () {
            reloadMarkerAndPolyline();
        }, 60000);

        function isMarkerExist(id){
            var found = false;

            for (i in markerList){
                var idx = markerList[i];
                if (idx == id){
                    found = true;
                    break;
                }
            }

            if (!found){
                markerList.push(id);
            }

            return found;
        }

        function addPolyline(data) {
            pointList[0][0] = data[0];
            for(var i = 0 ; i < data.length ; i++) {
                var oldUserAndTeam = false;
                var idxPointList = 0;
                for(var j = 0 ; j < pointList.length ; j++) {
                    if(pointList[j][0].user_id == data[i].user_id 
                        && pointList[j][0].team_id == data[i].team_id) {
                        var found = false;
                        for(var k = 0 ; k < pointList[j].length ; k++) {
                            if(pointList[j][k].history_id == data[i].history_id) {
                                found = true;
                                break;
                            }
                        }

                        if(!found) {
                            var patrolPath = new google.maps.Polyline({
                                path: [
                                    {
                                        lat: parseFloat(pointList[j][pointList[j].length - 1].history_latitude),
                                        lng: parseFloat(pointList[j][pointList[j].length - 1].history_longitude)
                                    }, {
                                        lat: parseFloat(data[i].history_latitude),
                                        lng: parseFloat(data[i].history_longitude)
                                    }
                                ],
                                geodesic: true,
                                strokeColor: '#FF0000',
                                strokeOpacity: 1.0,
                                strokeWeight: 2
                            });
                            patrolPath.setMap(map);
                            pointList[j].push(data[i]);
                            oldUserAndTeam = true;
                        }
                        idxPointList = j;
                    } 
                }
                if(!oldUserAndTeam) {
                    pointList[idxPointList + 1] = [];
                    pointList[idxPointList + 1][0] = (data[i]);
                }
            }
        }
        
        function addMarker(data){
            var exist = isMarkerExist(data.history_id);
            
            if (!exist){
                var contentString = 
                    '<div id="content">'+
                        '<div id="siteNotice">'+'</div>'+
                        '<div id="bodyContent">'+
                            '<p> User :' + data.user.user_employee_id +'</p>'+
                            '<p> Team :' + data.team_id +'</p>'+
                            '<p> Long :' + data.history_longitude +'</p>'+
                            '<p> Lat :' + data.history_latitude +'</p>'+
                            '<p> Time :' + data.history_datetime +'</p>'+
                        '</div>'+
                    '</div>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                var marker = new google.maps.Marker({
                    // draggable: true,
                    map : map,
                    position:
                    {
                        lat: parseFloat(data.history_latitude),
                        lng: parseFloat(data.history_longitude)
                    },
                    //label: location.user.user_employee_id,
                    icon: 'assets/img/circle.png'
                })
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });
            }

        }

        function attachMapEvent(map){
            google.maps.event.addListener(map, 'click', function(){
                //alert("A");
            });
        }

        function reloadMarkerAndPolyline(){
            $.ajax({
                url: 'https://api.retrack-app.site/history/today',
                crossDomain: true,
                async: false,
                type: 'GET',
                contentType: 'json',
                headers: {
                    'Authorization': 'Bearer <?php echo Session::get('token');?>'
                },
                success: function (result) {
                    for (let i = 0; i < result.length; i++) {
                        addMarker(result[i]);
                    }
                    addPolyline(result);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function initMap(){
            var el = document.getElementById('maps');

            map = new google.maps.Map(el, getMapOption());

            attachMapEvent(map)
        }

        function getMapOption(){    
            var loc = {lat: -7.27674670, lng: 112.79474210};
            var opt =  {
                zoom: 18, 
                center: loc,
                scaleControl: true
            };
            
            return opt;
        }
    </script>
@endsection