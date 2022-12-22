<?php
include ("includes/config.php");
session_start();
$_SESSION['alogin']=="";
session_unset();

?>
<script language="javascript">
document.location="alogin.php";
</script>
