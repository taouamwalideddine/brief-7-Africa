<?php include 'DbCon.php'; ?>
<?php
$id = $_GET['id'];

$query = "DELETE FROM Countries WHERE ID = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);

header("Location: viewer.php");
?>
