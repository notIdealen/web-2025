<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE POST</title>
</head>
<body>
    <a href="home">Home</a>
    <a href="profile<?= "?user_id=" . $_GET['user_id']; ?>">Profile</a>
    <form action="./api.php" enctype="multipart/form-data" method="post"> 
        <p>
            <input type="text" name="user_id" value="<?= $_GET['user_id']; ?>" required>
        </p>
        <p> 
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" />    -->
            <input type="file" name="img" accept="image/*" required>
        </p>
        <p>
            <textarea name="content"></textarea> 
        </p>
        <p>   
            <input type="submit"> 
        </p>     
    </form> 
</body>
</html>