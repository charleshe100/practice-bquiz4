<?php include_once "db.php";
$types=$Type->all(['big_id'=>$_POST['big_id']]);
foreach ($tyeps as $type) {
    echo "<option value='{$type['id']}'>{$type['name']}</option>";
}
?>