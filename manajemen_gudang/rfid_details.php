<?php
require_once 'db_connect.php'; 
require_once 'UIDContainer.php'; 

$pdo = Database::connect();
$UIDresult = $_POST['UID'] ?? $UIDresult ?? '';

if (!empty($UIDresult)) {
    $query = "SELECT * FROM biodata WHERE card_uid = :card_uid";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':card_uid', $UIDresult, PDO::PARAM_STR);
    $stmt->execute();
    $matchedData = $stmt->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}
?>

<tr>
    <td class="lf">Card UID</td>
    <td><b>:</b></td>
    <td><?= htmlspecialchars($UIDresult); ?></td>
</tr>
<?php if (!empty($matchedData)): ?>
<tr>
    <td class="lf">Name</td>
    <td><b>:</b></td>
    <td><?= htmlspecialchars($matchedData['nama'] ?? 'N/A'); ?></td>
</tr>
<tr>
    <td class="lf">Jabatan</td>
    <td><b>:</b></td>
    <td><?= htmlspecialchars($matchedData['jabatan'] ?? 'N/A'); ?></td>
</tr>
<tr>
    <td class="lf">Alamat</td>
    <td><b>:</b></td>
    <td><?= htmlspecialchars($matchedData['alamat'] ?? 'N/A'); ?></td>
</tr>
<tr>
    <td class="lf">No. Hp</td>
    <td><b>:</b></td>
    <td><?= htmlspecialchars($matchedData['no_hp'] ?? 'N/A'); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="3" align="center">No matching data found in database.</td>
</tr>
<?php endif; ?>
