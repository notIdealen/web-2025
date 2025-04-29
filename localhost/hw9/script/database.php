<?php
require_once __DIR__ . '/../config/DB.php';

function connectDB() : PDO {
    $dns = DB . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
    return new PDO($dns, DB_USER, DB_PASSWORD); 
}

function pushPostToDB(PDO $con, string $content, int $user_id, string $imagePath) : bool {
    $query = <<<SQL
        INSERT INTO 
            post 
                (content, created_by, image_path)
        VALUES 
                (?, ?, ?)
        SQL;
    $statement = $con->prepare($query);
	$statement->execute([$content, $user_id, $imagePath]);
    return (int)$con->lastInsertId();
}

function getPostsFormDB(PDO $con, int $user, int $limit = 50) : ?array {
    $query = <<<SQL
        SELECT 
            content, created_at, created_by, like_counter, image_path 
        FROM 
            post
        SQL;
    $queryAdd = ($user)
        ? <<<SQL
            WHERE 
                created_by={$user}
            ORDER BY 
                post.created_at DESC 
            LIMIT 
                {$limit}
            SQL
        : <<<SQL
            ORDER BY 
                post.created_at DESC 
            LIMIT 
                {$limit}
            SQL;
    $statement = $con->query($query . ' ' . $queryAdd);
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getUserFromDB(PDO $con, int $user_id) : ?array {
    $query = <<<SQL
        SELECT 
            * 
        FROM 
            user 
        WHERE 
            user.id = {$user_id}
        SQL;
        $statement = $con->query($query);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $user;
}
/*
function getAllUserPosts(PDO $con, int $user_id) : ?array {
    $query = <<<SQL
        SELECT 
            content, created_at, created_by, like_counter, image_path 
        FROM 
            post
        WHERE 
        created_by={$user_id}
        ORDER BY 
            post.created_at DESC 
        SQL;
    $statement = $con->query($query);
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
*/
?>






