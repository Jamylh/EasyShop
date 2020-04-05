<?php include_once("header.php");
 require_once ('mail/class.phpmailer.php');
 $mail = new PHPMailer;

 $shop_id =  $_SESSION['shop_id'];
?>
<!-- End Header -->
<!-- Container -->
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
    </style>
<div id="container">
  <div class="shell">
    <!-- Small Nav -->
    <div class="small-nav"> <a href="add_product.php">Dashboard</a> <span>&gt; Add Branches</span>  </div>
    <!-- End Small Nav -->
    <!-- Message OK -->
   <script>
  function validateForm(){
    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone").value;
    var mobile = document.getElementById("mobile").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var lat = document.getElementById("lat").value;
    var lng = document.getElementById("lng").value;
      
    if(name.length < 3){
        document.getElementById("error").style="display:block;"
        document.getElementById("error_id").innerHTML="Please enter Branch name";
        document.getElementById("name").focus();
        return false;
      }else{
        document.getElementById("error").style="display:none;"
        document.getElementById("error_id").innerHTML="";
      }

       if(phone.length != 10){
        document.getElementById("error").style="display:block;"
        document.getElementById("error_id").innerHTML="Please enter  Phone";
        document.getElementById("phone").focus();
        return false;
      }else{
        document.getElementById("error").style="display:none;"
        document.getElementById("error_id").innerHTML="";
      }
       if(mobile.length != 10){
        document.getElementById("error").style="display:block;"
        document.getElementById("error_id").innerHTML="Please enter  mobile";
        document.getElementById("mobile").focus();
        return false;
      }else{
        document.getElementById("error").style="display:none;"
        document.getElementById("error_id").innerHTML="";
      }
     
    if(!validateEmail(email)){
        document.getElementById("error").style="display:block;"
        document.getElementById("error_id").innerHTML="Please enter correct email";
        document.getElementById("email").focus();
        return false;
      }else{
        document.getElementById("error").style="display:none;"
        document.getElementById("error_id").innerHTML="";
      }

       if(password.length < 6){
        document.getElementById("error").style="display:block;"
        document.getElementById("error_id").innerHTML="Please enter  password";
        document.getElementById("password").focus();
        return false;
      }else{
        document.getElementById("error").style="display:none;"
        document.getElementById("error_id").innerHTML="";
      }
       if(lat.length ==0 || lat == ""){
        document.getElementById("error").style="display:block;width:67%;margin: 0 auto;display:table;"
        document.getElementById("error_id").innerHTML="Please select your location  ";
        return false;
      }else{
      document.getElementById("error").style="display:none;"
        document.getElementById("error_id").innerHTML="";
      }

  
    return true;
  }
  function validateEmail(emailID)
      {
         atpos = emailID.indexOf("@");
         dotpos = emailID.lastIndexOf(".");
         
         if (atpos < 1 || ( dotpos - atpos < 2 )) 
         {
           
            return false;
         }
         return( true );
      }
</script>

    <br />
    <!-- Main -->
    <div id="main" >
      <div class="cl">&nbsp;</div>
      <!-- Content -->
      <div id="content" >
         <?php

          if(isset($_POST['submitProduct'])){
            $city = $_POST['city'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $lat = $_POST['lat'];
            $lng = $_POST['lng'];
            $address = $_POST['address'];
            if(isset($_POST['uniqid']) AND $_POST['uniqid'] == @$_SESSION['uniqid']){

            }else{
              $_SESSION['uniqid'] = @$_POST['uniqid']; 
              

            $sql = "insert into shop_branches values('',$shop_id,'$city','$name','$phone','$mobile','$email','$password','$lat','$lng','$address')";
            $res = mysqli_query($conn,$sql)or die(mysqli_error($conn));
            if($res){
              ?>
              <div class="msg msg-ok">
                          <p><strong>Branch added successfully</strong></p>
                     </div> 
              <?php
            }
              




           
            }
          }

        ?>
        <div class="msg msg-error" id="error" style="display: none;">
                <p><strong id="error_id"></strong></p>
          </div>
        <!-- Box -->
<form action="branches.php" method="post" onsubmit="return validateForm()">
 <input type="hidden" name="uniqid" value="<?php echo uniqid();?>" />
  <div class="form-group">
    <label for="exampleFormControlSelect1">City<span>(*)</span> </label>
    <select class="form-control" name="city">
                  <option>Riyadh</option>
                  <option>Jeddah</option>
                  <option>Mecca</option>
                  <option>Medina</option>
                  <option>Dammam</option>
                  <option>Taif</option>
                  <option>Tabuk</option>
                  <option>Al kharj</option>
                  <option>Al Qassim</option>
    </select>
  </div>
      <div class="form-group">
    <label for="exampleFormControlInput1">Name <span>(*)</span></label>
    <input class="form-control" type="text" min="0" id="name" name="name"  placeholder="Branch Name" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Phone<span>(*)</span></label>
    <input  class="form-control" type="number" min="0" maxlength="12"  id="phone" name="phone" >
  </div>
      <div class="form-group">
    <label for="exampleFormControlInput1">Mobile  <span>(*)</span></label>
    <input  class="form-control" type="number" min="0" maxlength="10" class="field size1" id="mobile" name="mobile"  placeholder="05">
  </div>
          <div class="form-group">
    <label for="exampleFormControlInput1">Email   <span>(*)</span></label>
    <input type="email" class="form-control" id="email" name="email"  placeholder="Email">
  </div> 
    <div class="form-group">
    <label for="exampleFormControlInput1">Password<span>(*)</span></label>
    <input class="form-control" type="password" id="password" name="password"  placeholder="Password">
  </div>
    
                  <div class="pac-card" id="pac-card">
            <div>
              
            </div>
            <div id="pac-container">
              <input id="pac-input" type="text"
                  placeholder="Enter a location" style="padding: 20xp;margin-top: 20px;" >
            </div>
          </div>
          <div id="map" style="height: 400px; width: 76%;"></div>
          <div id="infowindow-content">
            <img src="" width="16" height="16" id="place-icon">
            <span id="place-name"  class="title"></span><br>
            <span id="place-address"></span>
          </div>
                <input type="hidden"  id="lat" name="lat"  />
               <input type="hidden" id="lng" name="lng"  />
                <input type="hidden" id="addres" name="address"  />
    
    <div class="buttons form-group ">
              <input type="reset" class="btn" value="reset" />
              <input type="submit" class="btn" name="submitProduct" value="ADD" />
            </div>
</form> 
        </div></div>


</div>
          <!-- End Box Head -->


       
 </div>
      <!-- End Content -->
      <!-- Sidebar -->
     
      <!-- End Sidebar -->


<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 26.3544482, lng: 49.7125055},
          zoom: 13
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }


          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          

          var item_lat = place.geometry.location.lat();
          var item_lng = place.geometry.location.lng();
          var item_location = place.geometry.location.address;
          document.getElementById("lat").value = item_lat;
          document.getElementById("lng").value = item_lng;
          document.getElementById("addres").value = item_location;
        

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
              console.log('Checkbox clicked! New state=' + this.checked);
              autocomplete.setOptions({strictBounds: this.checked});
            });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYTCKp50zROn9Zpbd_LHE9C_Hcu39jOog&libraries=places&callback=initMap"
        async defer></script>
<?php include_once("footer.php");?>