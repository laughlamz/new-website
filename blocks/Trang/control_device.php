<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
  <link rel="stylesheet" href="css/normalize.css"/> <!-- Reset CSS -->
  <link rel="stylesheet" type="text/css" href="css/Trang/control_device.css"/>
  <link rel="stylesheet" type="text/css" href="css/Trang/responsive_control.css"/>
</head>
<body> 
  <div id="contentD1">
    <div class="class_col_D1" id="col_D1_1">
      <div id="device1Name"><div id="NameD1">Living room</div></div>
      <div id="device1Sw">
        <div id="SwD1">
          <label class="switch">
            <?php
              $qrdv = "
                SELECT * FROM device_tableT
              ";
              $qrdv1 = mysqli_query($conn, $qrdv);
              $qrdv2 = mysqli_fetch_array($qrdv1);
              // echo $qrdv2['device1'];
              if($qrdv2['device1'] == 1)
                echo '<input type="checkbox" id="btnDevice1" checked>';
              else if($qrdv2['device1'] == 0)
                echo '<input type="checkbox" id="btnDevice1" unchecked>';
            ?>
            <!-- <input type="checkbox" unchecked> -->
            <span class="slider round"></span>  <!-- có 2 tên class là slider và round-->
          </label>
        </div>
      </div>
      <div id="device1Led">
        <div id="value_actDv1"></div>
        <div id="value_staDv1"></div>
      </div>
    </div>

    <div class="class_col_D1" id="col_D1_2">
      <div id="device1Name"><div id="NameD1">Bed room</div></div>
      <div id="device1Sw">
        <div id="SwD1">
          <label class="switch">
            <?php
              $qrdv = "
                SELECT * FROM device_tableT
              ";
              $qrdv1 = mysqli_query($conn, $qrdv);
              $qrdv2 = mysqli_fetch_array($qrdv1);
              // echo $qrdv2['device2'];
              if($qrdv2['device2'] == 1)
                echo '<input type="checkbox" id="btnDevice2" checked>';
              else if($qrdv2['device2'] == 0)
                echo '<input type="checkbox" id="btnDevice2" unchecked>';
            ?>
            <!-- <input type="checkbox" unchecked> -->
            <span class="slider round"></span>  <!-- có 2 tên class là slider và round-->
          </label>
        </div>
      </div>
      <div id="device1Led">
        <div id="value_actDv2"></div>
        <div id="value_staDv2"></div>
      </div>
    </div>
    <div class="class_col_D1" id="col_D1_3">
      <div id="device1Name"><div id="NameD1">Kitchen</div></div>
      <div id="device1Sw">
        <div id="SwD1">
          <label class="switch">
            <?php
              $qrdv = "
                SELECT * FROM device_tableT
              ";
              $qrdv1 = mysqli_query($conn, $qrdv);
              $qrdv2 = mysqli_fetch_array($qrdv1);
              // echo $qrdv2['device2'];
              if($qrdv2['device3'] == 1)
                echo '<input type="checkbox" id="btnDevice3" checked>';
              else if($qrdv2['device3'] == 0)
                echo '<input type="checkbox" id="btnDevice3" unchecked>';
            ?>
            <!-- <input type="checkbox" unchecked> -->
            <span class="slider round"></span>  <!-- có 2 tên class là slider và round-->
          </label>
        </div>
      </div>
      <div id="device1Led">
        <div id="value_actDv3"></div>
        <div id="value_staDv3"></div>
      </div>
    </div>
  </div>
  <div id="contentD2">
    <div class="class_col_D2" id="col_D2_1">
      <div id="device1Name"><div id="NameD1">Message</div></div>
      <div id="wrapper_myMessage"><div id="myMessage"></div></div>
      <div id="wrapper_upMessage">
          <input id="upMessage" type="text" name="upMessage" value=""/>
          <input id="btnUpMessage" type="submit" name="btnUpMessage" value="Send" />
      </div>
    </div>
  </div>
</body>
</html>





<script type="text/javascript">
  $("#btnDevice1").click(function() {                 //Update new act device 1
      if(this.checked) {
        console.log("current 0 -click- return 1");
        $.ajax({
          url: 'blocks/Trang/update_device1_to1.php',
          type: 'post'
        });
      }
      else{
        console.log("current 1 -click- return 0");
        $.ajax({
          url: 'blocks/Trang/update_device1_to0.php',
          type: 'post'
        });
      }
  });

  $("#btnDevice2").click(function() {                 //Update new act device 2
      if(this.checked) {
        console.log("current 0 -click- return 1");
        $.ajax({
          url: 'blocks/Trang/update_device2_to1.php',
          type: 'post'
        });
      }
      else{
        console.log("current 1 -click- return 0");
        $.ajax({
          url: 'blocks/Trang/update_device2_to0.php',
          type: 'post'
        });
      }
  });

  $("#btnDevice3").click(function() {                 //Update new act device 3
      if(this.checked) {
        console.log("current 0 -click- return 1");
        $.ajax({
          url: 'blocks/Trang/update_device3_to1.php',
          type: 'post'
        });
      }
      else{
        console.log("current 1 -click- return 0");
        $.ajax({
          url: 'blocks/Trang/update_device3_to0.php',
          type: 'post'
        });
      }
  });
</script>



<script type="text/javascript">
  setInterval(function(){ getActDv1(); }, 1000);       //Act Device 1
  function getActDv1()
  {
    $.ajax({
      url: 'blocks/Trang/act_device1ovt.php',
      type: 'post',
      success: function(data) {
        $('#value_actDv1').html(data);
        // console.log(data);
      }
    });
  }
  setInterval(function(){ getStaDv1(); }, 1000);       //Sta Device 1
  function getStaDv1()
  {
    $.ajax({
      url: 'blocks/Trang/sta_device1ovt.php',
      type: 'post',
      success: function(data) {
        $('#value_staDv1').html(data);
        // console.log(data);
      }
    });
  }

  setInterval(function(){ getActDv2(); }, 1000);       //Act Device 2
  function getActDv2()
  {
    $.ajax({
      url: 'blocks/Trang/act_device2ovt.php',
      type: 'post',
      success: function(data) {
        $('#value_actDv2').html(data);
        // console.log(data);
      }
    });
  }
  setInterval(function(){ getStaDv2(); }, 1000);       //Sta Device 2
  function getStaDv2()
  {
    $.ajax({
      url: 'blocks/Trang/sta_device2ovt.php',
      type: 'post',
      success: function(data) {
        $('#value_staDv2').html(data);
        // console.log(data);
      }
    });
  }

  setInterval(function(){ getActDv3(); }, 1000);       //Act Device 3
  function getActDv3()
  {
    $.ajax({
      url: 'blocks/Trang/act_device3ovt.php',
      type: 'post',
      success: function(data) {
        $('#value_actDv3').html(data);
        // console.log(data);
      }
    });
  }
  setInterval(function(){ getStaDv3(); }, 1000);       //Sta Device 3
  function getStaDv3()
  {
    $.ajax({
      url: 'blocks/Trang/sta_device3ovt.php',
      type: 'post',
      success: function(data) {
        $('#value_staDv3').html(data);
        // console.log(data);
      }
    });
  }
</script>



<script type="text/javascript">
setInterval(function(){ getActM(); }, 1000);           //Act Message
function getActM()
{
    $.ajax({
    url: 'blocks/act_message.php',
    type: 'post',
        success: function(data) {
            $('#myMessage').html(data);
            // console.log(data);
        }
    });
}
</script>





<script type="text/javascript">
  $("#btnUpMessage").click(function(){                //Update new message
    $message = $('#upMessage').val();
    console.log("press btnUpMessage");
    $('#upMessage').val('');

    $.ajax({
      url: 'blocks/update_message.php',
      type: 'POST',
      data: {
            messagePHP: $message,
      },
      success : function(respone){
      }
    });
    return false;
  });
</script>