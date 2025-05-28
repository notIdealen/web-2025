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

function getPostsFormDB1(PDO $con, int $user, int $limit = 50) : ?array {
    $query = <<<SQL
        SELECT post.created_by, GROUP_CONCAT(image.image_path SEPARATOR ';') AS images
        FROM post
        INNER JOIN image ON image.post_id=post.id
        GROUP BY post.id;
        SQL;
    // $query = <<<SQL
    //     SELECT 
    //         post.created_by,
    //         image.image_path
    //         GROUP_CONCAT(image.post_id) AS images
    //     FROM 
    //         post
    //     JOIN 
    //         image 
    //     ON 
    //         post.id=image.post_id
    //     -- GROUP BY post.post_id
    //     SQL;

    $statement = $con->query($query);
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getPostsFormDB(PDO $con, int $user, int $limit = 50) : ?array {
    $query = <<<SQL
        SELECT 
            post.content, post.created_at, post.like_counter, post.created_by, 
            user.name, user.lastname, user.image_path AS ava_path,
            GROUP_CONCAT(image.image_path SEPARATOR ';') AS images
        FROM 
            post
        JOIN 
            user 
        ON 
            post.created_by=user.id
        JOIN 
            image 
        ON 
            post.id=image.post_id
        GROUP BY post.id
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
?>






