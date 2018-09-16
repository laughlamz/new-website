<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/upgrade_database.css"/>
	<link rel="stylesheet" type="text/css" href="css/responsive_upgrade_database.css"/>
	<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css"/>
	<script type="text/javascript" src="js/jquery.datetimepicker.full.js"></script>

</head>
<body>
	<div id="layUpSQL">
		<div id="layNameSQL">Sensor MySQL</div>
		<div id="layTimeSQL">
			<form action="#" id="formTime2Time">
			    <div class="form-time"><div class="filtName">Start time</div><input class="filtInput" id="datetime1" name="staTime"></div>
			    <div class="form-time"><div class="filtName">End time</div><input class="filtInput" id="datetime2" name="endTime"></div>
			    <div class="form-time"><div class="filtName">Records/page</div><input class="filtInput" id="perPage" type="text" name="perPage"></div>
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

    if(staTime == ''){
        alert('Please fill the start Time');
        return false;
    }
    if(endTime == ''){
        alert('Please fill the end Time');
        return false;
    } 
    if(perPage == ''){
        alert('Please fill the number of Page');
        return false;
    } 

    $('#loadingSQL').show();
    $('#responeSQL').hide();
    $.ajax({
      url: 'blocks/update_database.php',
      type: 'POST',
      data: {
            staTimePHP: staTime,
            endTimePHP: endTime,
            perPagePHP: perPage,
            curPagePHP: curPage,
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
    var staTime = $("#datetime1").val(); //lấy giá trị input tài khoản
    var endTime = $("#datetime2").val(); //lấy giá trị input mật khẩu
    var perPage = $("#perPage").val(); //lấy giá trị input mật khẩu
    var curPage = $(this).attr('p');
    console.log(curPage);

    if(staTime == ''){
        alert('Please fill the start Time');
        return false;
    }
    if(endTime == ''){
        alert('Please fill the end Time');
        return false;
    } 
    if(perPage == ''){
        alert('Please fill the number of Page');
        return false;
    } 

    $.ajax({
      url: 'blocks/update_database.php',
      type: 'POST',
      data: {
            staTimePHP: staTime,
            endTimePHP: endTime,
            perPagePHP: perPage,
            curPagePHP: curPage,
      },
      success : function(data){
      	$('#responeSQL').html(data);
      }
    });
    return false;  
  });



</script>