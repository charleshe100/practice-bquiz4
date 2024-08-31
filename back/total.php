<?php
$row=$Total->find(1);
?>
<h2 class="ct">進站總人數管理</h2>
<form action="./api/edit_total.php" method="post">
    <table class="all ct">
        <tr>
            <td class="tt">進站總人數</td>
            <td class="pp">
                <input type="text" name="total" id="total" value="<?=$row['total'];?>">
            </td>
        </tr>
    </table>
</form>