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

<tr style="margin-bottom: 20px;">
    <td class="lf">Card UID</td>
    <td><b>:</b></td>
    <td>
        <span id="uidValue"><?= htmlspecialchars($UIDresult); ?></span>
    </td>
</tr>

<?php if (!empty($matchedData)): ?>
    <tr style="margin-bottom: 20px;">
        <td class="lf">Name</td>
        <td><b>:</b></td>
        <td>
            <span><?= htmlspecialchars($matchedData['nama'] ?? 'N/A'); ?></span>
        </td>
    </tr>
    <tr style="margin-bottom: 20px;">
        <td class="lf">Jabatan</td>
        <td><b>:</b></td>
        <td>
            <span><?= htmlspecialchars($matchedData['jabatan'] ?? 'N/A'); ?></span>
        </td>
    </tr>
    <tr style="margin-bottom: 20px;">
        <td class="lf">Alamat</td>
        <td><b>:</b></td>
        <td>
            <span><?= htmlspecialchars($matchedData['alamat'] ?? 'N/A'); ?></span>
        </td>
    </tr>
    <tr style="margin-bottom: 20px;">
        <td class="lf">No. Hp</td>
        <td><b>:</b></td>
        <td>
            <span><?= htmlspecialchars($matchedData['no_hp'] ?? 'N/A'); ?></span>
        </td>
    </tr>
<?php else: ?>
    <tr style="margin-bottom: 20px;">
        <td colspan="3" align="center">No matching data found in database.</td>
    </tr>
<?php endif; ?>
