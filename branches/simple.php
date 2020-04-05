<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <!-- Bootstrap stuff -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
    <script src="dist/locationpicker.jquery.min.js"></script>
    <title>Simple example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="form-horizontal" style="width: 550px">
        <div class="form-group">
            <label class="col-sm-2 control-label">Location:</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="us3-address" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Radius:</label>

            <div class="col-sm-5">
                <input type="text" class="form-control" id="us3-radius" />
            </div>
        </div>
        <div id="us3" style="width: 550px; height: 400px;"></div>
        <div class="clearfix">&nbsp;</div>
        <div class="m-t-small">
            <label class="p-r-small col-sm-1 control-label">Lat.:</label>

            <div class="col-sm-3">
                <input type="text" class="form-control" style="width: 110px" id="us3-lat" />
            </div>
            <label class="p-r-small col-sm-2 control-label">Long.:</label>

            <div class="col-sm-3">
                <input type="text" class="form-control" style="width: 110px" id="us3-lon" />
            </div>
        </div>
        <div class="clearfix"></div>
        <script>
            $('#us3').locationpicker({
                location: {
                    latitude: 24.7136,
                    longitude: 46.6753
                },
                radius: 300,
                inputBinding: {
                    latitudeInput: $('#us3-lat'),
                    longitudeInput: $('#us3-lon'),
                    radiusInput: $('#us3-radius'),
                    locationNameInput: $('#us3-address')
                },
                enableAutocomplete: true,
                onchanged: function (currentLocation, radius, isMarkerDropped) {
                    // Uncomment line below to show alert on each Location Changed event
                    //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
                }
            });
        </script>
    </div>
</body>

</html>