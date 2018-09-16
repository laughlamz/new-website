
<!-- Dang xai ke css -->

<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/Trang/upgrade_database.css"/>
	<link rel="stylesheet" type="text/css" href="css/Trang/responsive_upgrade_database.css"/>
	<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css"/>
	<script type="text/javascript" src="js/jquery.datetimepicker.full.js"></script>

</head>
<body>
  <div id="layUpSQL">
    <div id="layNameSQL">Timming SensorSQL</div>
    <div id="layTimeSQL">
      <form action="#" id="formTime2Time">
          <div class="form-time"><div class="filtName">Start time</div><input class="filtInput" id="datetime1" name="staTime"></div>
          <div class="form-time"><div class="filtName">End time</div><input class="filtInput" id="datetime2" name="endTime"></div>
          <div class="form-time"><div class="filtName">Records/page</div>
            <select class="Select" id="perPage">
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="75">75</option>
              <option value="100">100</option>
            </select>
          </div>
          <div class="form-time"><div class="filtName">Records/time</div>
            <select class="Select" id="perTime">
              <option value="0">Full rec.</option>
              <option value="1">1 min</option>
              <option value="5">5 min</option>
              <option value="15">15 min</option>
              <option value="30">30 min</option>
              <option value="60">60 min</option>
            </select>
          </div>
          <div class="form-sub">
              <div id="filtBtnShow"></div><a id="btnShow" role="button">Show</a>
          </div>
      </form>
    </div>
    <div id="layDataSQL">
      <div style="width:100%;height:30px;"><div id="loadingSQL">Data is loading now <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></div></div>
      <div id="responeSQL"></div>
    </div>
  </div>
  <div id="layUpSQL">
    <div id="layNameSQL">Data SensorSQL</div>
    <div id="layTimeSQL">
      <form action="#" id="formTime2Time">
          <div class="form-time1">
            <div class="filtName1">Sensor</div>
            <select class="Select" id="SelectSen">
              <option value="sensor2">Humi</option>
              <option value="sensor4">Pres</option>
              <option value="sensor5">Gas</option>
              <option value="sensor1">TempH</option>
              <option value="sensor3">TempP</option>
            </select>
          </div>
          <div class="form-time1">
            <div class="filtName1">From</div><input class="filtInput1" id="FrDataSen" type="text">
          </div>
          <div class="form-time1">
            <div class="filtName1">To</div><input class="filtInput1" id="ToDataSen" type="text">
          </div>
          <div class="form-time1">
            <div class="filtName1">Records/page</div>
            <select class="Select" id="SelectPerPage">
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="75">75</option>
              <option value="100">100</option>
            </select>
          </div>
          <div class="form-sub">
              <div id="filtBtnShow"></div><a id="btnShow1" role="button">Show</a>
          </div>
      </form>
    </div>
    <div id="layDataSQL1">
      <div style="width:100%;height:30px;"><div id="loadingSQL1">Data is loading now <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></div></div>
      <div id="responeSQL1"></div>
    </div>
  </div>
</body>
</html>





<script type="text/javascript">
	$("#datetime1").datetimepicker();
	$("#datetime2").datetimepicker();
</script>





<script type="text/javascript">
  $("#btnShow").click(function(){                //Update new message
  	console.log("press btnShow");
    var staTime = $("#datetime1").val(); //lấy giá trị input tài khoản
    var endTime = $("#datetime2").val(); //lấy giá trị input mật khẩu
    var perPage = $("#perPage").val(); //lấy giá trị input mật khẩu
    var curPage = 1;
    var perTime = $("#perTime").val();

    if(staTime == ''){
        alert('Please fill the start Time');
        return false;
    }
    if(endTime == ''){
        alert('Please fill the end Time');
        return false;
    } 

    $('#loadingSQL').show();
    $('#responeSQL').hide();
    $.ajax({
      url: 'blocks/Trang/update_database.php',
      type: 'POST',
      data: {
            staTimePHP: staTime,
            endTimePHP: endTime,
            perPagePHP: perPage,
            curPagePHP: curPage,
            perTimePHP: perTime,
      },
      success : function(data){
        $('#loadingSQL').hide();
      	$('#responeSQL').html(data).fadeIn();
      }
    });
    return false;  
  });



   $('#responeSQL').on('click','li.active', function () {                
   //Use the container of respone that does change when ajax call
  	console.log("press li active");
    var staTime = $("#datetime1").val(); 
    var endTime = $("#datetime2").val(); 
    var perPage = $("#perPage").val(); 
    var curPage = $(this).attr('p');
    var perTime = $("#perTime").val();
    console.log(curPage);

    if(staTime == ''){
        alert('Please fill the start Time');
        return false;
    }
    if(endTime == ''){
        alert('Please fill the end Time');
        return false;
    } 

    $.ajax({
      url: 'blocks/Trang/update_database.php',
      type: 'POST',
      data: {
            staTimePHP: staTime,
            endTimePHP: endTime,
            perPagePHP: perPage,
            curPagePHP: curPage,
            perTimePHP: perTime,
      },
      success : function(data){
      	$('#responeSQL').html(data);
      }
    });
    return false;  
  });

</script>











<script type="text/javascript">
  $("#btnShow1").click(function(){                //Update new message
    console.log("press btnShow1");
    var selectSen = $("#SelectSen").val(); //lấy giá trị input tài khoản
    var frDataSen = $("#FrDataSen").val(); //lấy giá trị input mật khẩu
    var toDataSen = $("#ToDataSen").val(); //lấy giá trị input mật khẩu
    var perPage2nd = $("#SelectPerPage").val();
    var curPage2nd = 1;

    if(frDataSen == ''){
        alert('Please fill the Start data');
        return false;
    } 
    if(toDataSen == ''){
        alert('Please fill the End data');
        return false;
    } 

    $('#loadingSQL1').show();
    $('#responeSQL1').hide();
    $.ajax({
      url: 'blocks/Trang/update_database_2nd.php',
      type: 'POST',
      data: {
            selectSenPHP: selectSen,
            frDataSenPHP: frDataSen,
            toDataSenPHP: toDataSen,
            perPage2ndPHP: perPage2nd,
            curPage2ndPHP: curPage2nd,
      },
      success : function(data){
        $('#loadingSQL1').hide();
        $('#responeSQL1').html(data).fadeIn();
      }
    });
    return false;  
  });



   $('#responeSQL1').on('click','li.active', function () {                
   //Use the container of respone that does change when ajax call
    console.log("press li active");
    var selectSen = $("#SelectSen").val(); //lấy giá trị input tài khoản
    var frDataSen = $("#FrDataSen").val(); //lấy giá trị input mật khẩu
    var toDataSen = $("#ToDataSen").val(); //lấy giá trị input mật khẩu
    var perPage2nd = $("#SelectPerPage").val();
    var curPage2nd = $(this).attr('p');

    if(frDataSen == ''){
        alert('Please fill the Start data');
        return false;
    } 
    if(toDataSen == ''){
        alert('Please fill the End data');
        return false;
    } 

    $.ajax({
      url: 'blocks/Trang/update_database_2nd.php',
      type: 'POST',
      data: {
            selectSenPHP: selectSen,
            frDataSenPHP: frDataSen,
            toDataSenPHP: toDataSen,
            perPage2ndPHP: perPage2nd,
            curPage2ndPHP: curPage2nd,
      },
      success : function(data){
        $('#responeSQL1').html(data);
      }
    });
    return false;  
  });



</script>