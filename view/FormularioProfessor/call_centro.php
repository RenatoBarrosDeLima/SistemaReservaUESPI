<?php

if (isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] === "XMLHttpRequest") {
    include 'conn.php';
    $codCent = filter_input(INPUT_POST, 'codCentro', FILTER_SANITIZE_NUMBER_INT);
    if ($codCent) {
        $query = $pdo->prepare('SELECT codCentro, nome FROM CENTRO where codCamp=? ORDER BY nome');
        $query->bindParam(1, $codCent, PDO::PARAM_INT);
        $query->execute();
        echo json_encode($query->fetchAll());
        return;
    }
}
echo NULL;
