<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
require_once 'excel_reader2.php';
$xls = new Spreadsheet_Excel_Reader("example.xls");
?>
<html>
<head>

<style>
div { display:none; color:#aaa; }
</style>
<script>
function toggle(state) {
	var divs = document.getElementsByTagName('div');
	for (var i=0; i<divs.length; i++) {
		divs[i].style.display = (state)?'inline':'none';
	}
}
</script>
</head>
<body>

Display formatting information: <input type="checkbox" onclick="toggle(this.checked)">
<br><br>

<table border="1">
<? for ($row=1;$row<=$xls->rowcount();$row++) { ?>
	<tr>
	<? for ($col=1;$col<=$xls->colcount();$col++) {	?>
		<td><?= $xls->val($row,$col) ?>&nbsp;
		<div><br>Format=<?=$xls->format($row,$col)?><br>FormatIndex=<?=$xls->formatIndex($row,$col)?><br>Raw=<?=$xls->raw($row,$col)?></div></td>
	<? } ?>
	</tr>
<? } ?>
</table>

</body>
</html>
