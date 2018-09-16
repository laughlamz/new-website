<?php
  require "dbCon.php";
  
  $qrD11 = "
    SELECT * FROM device_tableT
    ";
    $qrD12 = mysqli_query($conn, $qrD11);
    $qrD13 = mysqli_fetch_array($qrD12);

    $qrDD = $qrD13['device1'].$qrD13['device2'].$qrD13['device3'];
    echo $qrDD;

  $check_sen_data = 0;
  if( isset($_POST['sensor1']) && isset($_POST['sensor2']) && isset($_POST['sensor3']) && isset($_POST['sensor4']) && isset($_POST['sensor5']) )
  {
    $check_sen_data = 1;
    $scan_sen1 = $_POST['sensor1'];
    $scan_sen2 = $_POST['sensor2'];
    $scan_sen3 = $_POST['sensor3'];
    $scan_sen4 = $_POST['sensor4'];
    $scan_sen5 = $_POST['sensor5'];


    $qrSen1 = "
      INSERT INTO sensor_tableT (sensor1, sensor2, sensor3, sensor4, sensor5) VALUES ('$scan_sen1','$scan_sen2','$scan_sen3','$scan_sen4','$scan_sen5')
    ";
    mysqli_query($conn, $qrSen1);
  }


  if( isset($_GET['statusD1']) && isset($_GET['statusD2']) && isset($_GET['statusD3']) )
  {  
    $scan_staD1 = $_GET['statusD1'];  //Normal - Just when relative with MySQL & link
    $scan_staD2 = $_GET['statusD2'];
    $scan_staD3 = $_GET['statusD3'];

    $qrStaD1 = "
      UPDATE device_tableT SET staDevice1 = '$scan_staD1', staDevice2 = '$scan_staD2', staDevice3 = '$scan_staD3'
    ";
    mysqli_query($conn, $qrStaD1);
  }
?>
</html>

