@extends('layouts.master')
@section('main-content')
<div class="breadcrumb">
    <h1>Qredit Data Server</h1>
</div>
<p class="text-small text-muted text-left">Text about QDS </p>

<div class="separator-breadcrumb border-top"></div>
<div class="card mb-4">
        <div class="card-body">
                <div class="card-title text-center m-0">Private Key</div>
                <p class="text-small text-muted text-center">Enter your passphrase or private key. This wallet will be used to send data to the blockchain. (est cost: 0.02 XQR per tx)</p>
    <section class="text-center header" style='margin-top:0px;'>
      <input type="text" name="privateKey" placeholder="" id="privateKey" value="0"> <button class="button-success" id="setKey">Set</button>
      <br />
      <span id='qreditAddress'></span>
</div>
</div>
    </section>


    <div class="row">
        <div class="col-md-4" style='text-align:left;'>
            <div class="card mb-4" style="min-height:550px;">
                    <div class="card-body">

                <div class="card-title m-0">Sending Data API</div>
                <p class="text-small text-muted">text</p>
		                <label for="apiUrl">Enter API URL</label>
		                <input class="u-full-width" type="text" name="apiUrl" placeholder="" id="apiUrl" value="https://api.altilly.com/api/public/ticker/ETHBTC">
		                 <button class="button-primary" id="parseUrl">Read API Datafields</button>

		                <div id='apidatafields'></div>
                    </div>
            </div>


         </div>

    	<div class="col-md-4" style='text-align:left; min-height: 600px;'>
                <div class="card mb-4" style="min-height:550px;">
                        <div class="card-body">


                    <div class="card-title m-0">Data Map JSON</div>
                    <p class="text-small text-muted">text</p>

		  <div id='datamapfields'></div>

		  Data Map Json:
		  <textarea id='datamapjson' readonly="" style="width:100%; height: 50px"></textarea>
		  <center>
		  <label for="apiUrl">Refresh Period (seconds)</label>
		  <input type="text" name="refreshPeriod" placeholder="" id="refreshPeriod" value="900">
		  <button class="button-primary" id="getData" style='display:none;'>Get API Data</button>
		  <span id='timeLeft' style='width:50;'></span>
		  <button class="button-danger" id="stopData" style='display:none;'>Stop</button>
		  </center>

		  <br />
		  Vendor Field: <span id="vendorfieldjsonlength" class=''></span>
		  <textarea id='vendorfieldjson' readonly="" style="width:100%; height: 50px"></textarea>

		  <br />
		  Log:<br />
		  <div style='width:100%; height:150px; overflow-y: scroll;' id='sendLog'></div>

        </div></div>
    	</div>
	<div class="col-md-4" style='text-align:left;'>
            <div class="card mb-4" style="min-height:550px;">
                    <div class="card-body">


                <div class="card-title m-0">Receiving Data API</div>
                <p class="text-small text-muted">text</p>

		<!--  <center>Session ID: { sessionId }}</center><br /> -->

		  Reverse Data Map Json:
		  <textarea id='revdatamapjson' readonly="" style="width:100%; height: 50px"></textarea>


			<div class="row">
			<div id="content-calendar1" class='col-md-6'><label for="calendar1">From Date</label><div class="dhx_input__wrapper"><div class="dhx_input__container"><div class="dhx_input__icon dxi dxi-calendar-today"></div><input type="text" placeholder="" name="" id="calendar1" autocomplete="off" readonly="" class="dhx_input dhx_input--icon-padding"></div></div></div>
			<div id="content-calendar2" class='col-md-6'><label for="calendar2">To Date</label><div class="dhx_input__wrapper"><div class="dhx_input__container"><div class="dhx_input__icon dxi dxi-calendar-today"></div><input type="text" placeholder="" name="" id="calendar2" autocomplete="off" readonly="" class="dhx_input dhx_input--icon-padding"></div></div></div>
			</div>

		  <center><button class="button-primary" id="buildDatabase" style='margin-top:10px; display:none;'>Build Temporary Database</button></center>

		  <div id='buildingDatabase' style='width:100%; text-align:center; font-size:26px; display:none; padding-top:10px;'><i class="fas fa-cog fa-spin"></i></div>
		  <div id='buildingDatabaseMessage' style='width:100%; text-align:center; font-size:16px; display:none;'></div>


		  <textarea id='queryDatabase' style="width:100%; height: 50px; display:none;">SELECT * FROM databuilder</textarea>
		  <center><button class="button-primary" id="queryDatabaseButton" style='display:none;'>Run Query</button></center>


        </div>	</div>
    	</div>

	</div>


	<div id='queryResults' style='display:none; font-size:12px; width:100%;'></div>






@endsection

@section('page-js')

<script>

    var letters = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    $(document).ready(function() {
      var calendar = new dhx.Calendar(null, {dateFormat: "%Y-%m-%d"});
      var popup = new dhx.Popup();
      popup.attach(calendar);

      var calendar2 = new dhx.Calendar(null, {dateFormat: "%Y-%m-%d"});
      var popup2 = new dhx.Popup();
      popup2.attach(calendar2);

      calendar.link(calendar2);

      var dateInput = document.getElementById("calendar1");
      dateInput.addEventListener("click", function() {
          popup.show(dateInput);
      });
      var dateInput2 = document.getElementById("calendar2");
      dateInput2.addEventListener("click", function() {
          popup2.show(dateInput2);
      });

      calendar.events.on("change", function (date) {
          $("#calendar1").val(calendar.getValue());
          popup.hide();
          checkDates();
      });
      calendar2.events.on("change", function (date) {
          $("#calendar2").val(calendar2.getValue());
          popup2.hide();
          checkDates();
      });
      var intervalCheck;

      var refreshPeriod;
      var socket = io();

        $('#setKey').click( function (e) {

            var privateKey = $('#privateKey').val();

            //$('#setKey').hide();

            socket.emit('setprivatekey', {privkey: privateKey});

        });

        $('#parseUrl').click( function (e) {

            var apiurl = $('#apiUrl').val();

            socket.emit('getapifields', {apiurl: apiurl});

        });

        $('#getData').click( function (e) {

            var datamapjson = $('#datamapjson').val();
            var apiurl = $('#apiUrl').val();

            socket.emit('getapidata', {apiurl: apiurl, datamapjson: datamapjson});

            $('#getData').hide();

            startProcessing();

        });
        $('#buildDatabase').click( function (e) {

            var datefrom = $('#calendar1').val();
            var dateto = $('#calendar2').val();
          //var sessionid = '{ sessionId }}';
          var jsonmap =  $('#datamapjson').val();
          var revjsonmap =  $('#revdatamapjson').val();
          var privkey = $('#privateKey').val();
            socket.emit('builddatabase', {datefrom: datefrom, dateto: dateto, sessionid: sessionid, jsonmap: jsonmap, revjsonmap: revjsonmap, privkey: privkey});

            $('#buildingDatabase').show();
            $('#buildDatabase').hide();

        });

        $('#queryDatabaseButton').click( function (e) {

            //var sessionid = '{ sessionId }}';
            var query = $('#queryDatabase').val();

            socket.emit('querydatabase', {sessionid: sessionid, query: query});

            $('#queryDatabaseButton').hide();

        });
      function startProcessing() {

          refreshPeriod = parseInt($('#refreshPeriod').val());

          if (refreshPeriod < 30)
          {

              refreshPeriod = 30;
              $('#refreshPeriod').val('30')

          }


          var currentTimer = parseInt(refreshPeriod);

          $('#stopData').show();

          intervalCheck = setInterval(function(){

              currentTimer--;

              $('#timeLeft').html(currentTimer);

              if (currentTimer <= 0)
              {
                  var datamapjson = $('#datamapjson').val();
                  var apiurl = $('#apiUrl').val();

                  socket.emit('getapidata', {apiurl: apiurl, datamapjson: datamapjson});


                  currentTimer = refreshPeriod;

              }

          }, 1000);

      }
        $('#stopData').click( function (e) {

            $('#getData').show();

            $('#stopData').hide();

            $('#timeLeft').html('');

            clearInterval(intervalCheck);

        });

        socket.on('getKeyDetails', function (data) {

            $('#qreditAddress').html(data.address + " (" + data.balance + " XQR)");

        });

        socket.on('buildingDatabaseMessage', function (data) {

              $('#buildingDatabaseMessage').show();
            $('#buildingDatabaseMessage').html(data);

        });

        socket.on('buildingDatabaseReset', function (data) {

              $('#buildingDatabase').hide();
              $('#buildDatabase').show();

        });

        socket.on('datasetCanQuery', function (data) {

              $('#queryDatabase').show();
              $('#queryDatabaseButton').show();

        });


        socket.on('queryResults', function (data) {

              $('#queryResults').show();
              $('#queryResults').html('');
          try {

              var jdata = JSON.parse(data);
              createTableFromJSON(jdata);

              } catch (e) {


              }

              $('#queryDatabaseButton').show();

        });

        socket.on('parsedApiFields', function (data) {

            $('#apidatafields').html('');

            data.forEach(function(item){

                var htmlitem = "<div class='dataitem greencolor' id='dataitem_" + item + "' style='cursor:pointer;'><i class='far fa-check-circle'></i>&nbsp;" + item + "</div>";
              $('#apidatafields').append(htmlitem);
          });

          buildDataMap();

          $('.dataitem').click(function (e) {

              //console.log(this);

              if ($(this).hasClass("greencolor"))
              {

                  $(this).removeClass("greencolor").addClass("redcolor");

                  $(this).find('i').removeClass("fa-check-circle").addClass("fa-circle");


              }
              else
              {

                  $(this).removeClass("redcolor").addClass("greencolor");

                  $(this).find('i').removeClass("fa-circle").addClass("fa-check-circle");



              }

              buildDataMap();

          });


        });

        socket.on('parsedApiData', function (data) {

            var stringdata = JSON.stringify(data);

          $('#vendorfieldjson').val(stringdata);

          $('#vendorfieldjsonlength').html(stringdata.length + ' characters');

          if (stringdata.length > 254)
          {

              $('#vendorfieldjsonlength').removeClass('greencolor').addClass('redcolor');

              var d = new Date();
              var n = d.toISOString();

              $('#sendLog').prepend( "<p>" + n + ":  Error - Can Not Send Data Too Long</p>" );

          }
          else
          {

              $('#vendorfieldjsonlength').removeClass('redcolor').addClass('greencolor');

              var privateKey = $('#privateKey').val();

              socket.emit('createtransaction', {vendorField: stringdata, privKey: privateKey});

          }

      });

        socket.on('transactionResult', function (data) {

              var d = new Date();
              var n = d.toISOString();

              $('#sendLog').prepend( "<p>" + n + ":  " + data + "</p>" );

                var privateKey = $('#privateKey').val();

                socket.emit('setprivatekey', {privkey: privateKey});

        });


    });

    function checkDates()
    {

            if ($('#calendar1').val() != '' && $('#calendar2').val() != '' && $('#revdatamapjson').val() != '')
            {

                $('#buildDatabase').show();

            }

    }
    function buildDataMap()
    {

        var datafields = $('#apidatafields').find('div');

        var counter = 0;
        var jsonarray = {};
        var revjsonarray = {};

        $('#datamapfields').html('');

        datafields.each(function(item){

          if ($(this).hasClass("greencolor"))
          {

              var dataid = $(this).attr('id').replace('dataitem_','');

              jsonarray[dataid] = letters[counter];
              revjsonarray[letters[counter]] = dataid;

                var htmlitem = "<div style='margin-left:10px;'>" + letters[counter] + " => " + dataid + "</div>";
              $('#datamapfields').append(htmlitem);

              counter++;

          }

        }).promise().done( function(){

            $('#datamapjson').val(JSON.stringify(jsonarray));

            $('#revdatamapjson').val(JSON.stringify(revjsonarray));

            $('#getData').show();

        });




    }

    function clipitems()
    {

      var clipboard = new ClipboardJS('.clipbutton');

      clipboard.on('success', function(e) {

          var bgcol = $('#' + e.trigger.id).css('backgroundColor');
          $('#' + e.trigger.id).animate({backgroundColor: "#ADD8E6"}, 1);
          $('#' + e.trigger.id).animate({backgroundColor: bgcol}, 1000);

          e.clearSelection();
      });

    }

    function createTableFromJSON(jsonData) {

      var col = [];
      for (var i = 0; i < jsonData.length; i++) {
          for (var key in jsonData[i]) {
              if (col.indexOf(key) === -1) {
                  col.push(key);
              }
          }
      }
      // CREATE DYNAMIC TABLE.
      var table = document.createElement("table");

      var att = document.createAttribute("align");
      att.value = "center";
      table.setAttributeNode(att);
      // CREATE HTML TABLE HEADER ROW USING THE EXTRACTED HEADERS ABOVE.
      var tr = table.insertRow(-1);                   // TABLE ROW.
      for (var i = 0; i < col.length; i++) {
          var th = document.createElement("th");      // TABLE HEADER.
          th.innerHTML = col[i];
          tr.appendChild(th);
      }
      // ADD JSON DATA TO THE TABLE AS ROWS.
      for (var i = 0; i < jsonData.length; i++) {
          tr = table.insertRow(-1);
          for (var j = 0; j < col.length; j++) {
              var tabCell = tr.insertCell(-1);
              tabCell.innerHTML = jsonData[i][col[j]];
          }
      }
      // FINALLY ADD THE NEWLY CREATED TABLE WITH JSON DATA TO A CONTAINER.
      var divContainer = document.getElementById("queryResults");
      divContainer.innerHTML = "";
      divContainer.appendChild(table);

      divContainer.scrollIntoView();

    }

  </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="/javascripts/socket.io.slim.js"></script>
    <script src="/javascripts/calendar.js"></script>
    <script src="https://code.jquery.com/color/jquery.color-2.1.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
    <script src='https://cdn.rawgit.com/admsev/jquery-play-sound/master/jquery.playSound.js'></script>
<script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
<script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
<script src="{{asset('assets/js/es5/dashboard.v1.script.js')}}"></script>

@endsection
