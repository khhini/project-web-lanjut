<?php 
include 'header.php';
?>

<?php
$a = mysqli_query($con,"select * from barang_laku");
?>

<div class="col-md-10">

</div>
<!-- kalender -->
<div class="pull-right">
	<div id="kalender"></div>
</div>

<?php 
include 'footer.php';

?>