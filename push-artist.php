<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Artist</title>
</head>
<body>
<?php
    //used to access database
    require_once("access.php");
    $artist = $_POST['artist'];

    try{
        if(isset($_POST['group-members'])){
            $group = $_POST['group-members'];
            $sql = "INSERT INTO Artist (name, group_members) VALUES (:artist, :group);";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':artist', $artist);
            $stmt->bindParam(':group', $group);
            $stmt->execute();
        }
        else{
            $sql = "INSERT INTO Artist (name) VALUES (:artist);";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':artist', $artist);
            $stmt->execute();
        }
    } catch(PDOException $e){
        die("Artist Add Error:" .$e->getMessage());
    }
    

    echo "Success!";
    $pdo = null;
    ?>
    <a href="submit.html">Submit Records</a>
</body>
</html>