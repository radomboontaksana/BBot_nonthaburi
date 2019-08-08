<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from tbl_sw_request ORDER BY id ASC";

?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Bootstrap edit inLine</title>
  
  <!-- สำคัญ 1 แทรก CSS ; Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
  
  <!-- สำคัญ 2 แทรก js ; (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>

  <!-- นำเข้า Javascript script -->
  <script type="text/javascript">
  $(document).ready(function() {
  // Setup - add a text input to each footer cell
  $('#mydata tfoot th').each( function () {
    var title = $(this).text();
    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
  } );
  // DataTable
  var table = $('#mydata').DataTable();
  
  // Apply the search
  table.columns().every( function () {
    var that = this;
  
    $( 'input', this.footer() ).on( 'keyup change', function () {
        if ( that.search() !== this.value ) {
            that
                .search( this.value )
                .draw();
            }
        } );
    } );
  } );
  </script>
  
  <script type="text/javascript">
  $('#mydata').dataTables();
  </script>
  
  <!-- ช่อง Search tfoot -->
  <style>
  tfoot input {
      width: 80%;
      padding: 3px;
      box-sizing: border-box;
      border: 1px solid red;
  }
  </style>

</head>
<body>
  <div class="container">	
  <h1>Nonthaburi Switching Order Management</h1>
  <p><br />

  <a href="add_switching.php" class="btn btn-md btn-danger"><span class="glyphicon glyphicon-plus"></span> Insert Request outage</a>

  </p>
   
  <table class="table table-striped table-bordered table-hover" id="mydata">
  
  <thead>
      <tr class="info">
        <th class="table-header">Request No.</th>
        <th class="table-header">สถานีไฟฟ้า</th>
        <th class="table-header">อุปกรณ์ที่ปลด</th>
        <th class="table-header">เวลา ปลด</th>
        <th class="table-header">เวลา จ่าย</th>
        <th class="table-header">รายละเอียด</th>
        <th class="table-header">ผู้บันทึกข้อมูล</th>
        <th class="table-header">เอกสาร</th>
      </tr>
  </thead>
  <tfoot>
      <tr>
          <th><span class="table-header">Request</span></th>
          <th>สฟ</th>
          <th>อุปกรณ์</th>
          <th>เวลาปลด</th>
          <th>เวลาจ่ายไฟ</th>
          <th>รายละเอียด</th>
          <th><span class="table-header">ผู้บันทึกข้อมูล</span></th>
          <th>เอกสาร</th>
      </tr>
  </tfoot>

  <tbody>
	<?php
      $result_set=mysql_query($sql);
      while($row=mysql_fetch_array($result_set))
      {
    ?>
      <tr>
        <td><?php echo $row['SwNumber'] ?></td>
        <td><?php echo $row['SubWorkplace'] ?></td>
        <td><?php echo $row['EquipmentOutage'] ?></td>
        <td><?php echo $row['TimeJobStart'] ?></td>
        <td><?php echo $row['TimeJobEnd'] ?></td>
        <td><?php echo $row['detail'] ?></td>
        <td><?php echo $row['WhoRecord'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view</a></td>
      </tr>
    <?php
      }
    ?>
  </tbody>

  </table>
  </div>
  
</body>
</html>
