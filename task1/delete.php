<?php
require_once 'connection.php';

if (isset($_GET['id'])) {
    try {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        header("Location: index.php?success=3");
    } catch(PDOException $e) {
        header("Location: index.php?error=" . urlencode($e->getMessage()));
    }
} else {
    header("Location: index.php");
}
exit();
?> 