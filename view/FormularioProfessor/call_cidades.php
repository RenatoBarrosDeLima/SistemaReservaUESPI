<?php

if (isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] === "XMLHttpRequest") {
    include 'conn.php';
    $codC = filter_input(INPUT_POST, 'codCity', FILTER_SANITIZE_NUMBER_INT);
    if ($codC) {
        $query = $pdo->prepare('SELECT codCampus, nome FROM CAMPUS where codCity=? ORDER BY nome');
        $query->bindParam(1, $codC, PDO::PARAM_INT);
        $query->execute();
        echo json_encode($query->fetchAll());
        return;
    }
}
echo NULL;
