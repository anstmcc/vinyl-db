<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Record</title>
</head>
<body>
    <?php
    //used to access database
    require_once("access.php");
    date_default_timezone_set('America/Los_Angeles');
    $record = $_POST['record-id'];
    $title = $_POST['title'];
    $artist_id = $_POST['artist-id'];
    $owner_id = $_POST['owner-id'];

    try{
        if(!isset($_POST['date-cleaned'])){
            
            $date_cleaned = date("Y-m-d H:i:s");
        }
        else{
            $date_cleaned = date("Y-m-d H:i:s", strtotime($_POST['date-cleaned']));
        }

        if(!isset($_POST['price'])){
            $price = null;
        }
        else{
            $price = floatval($_POST['price']);
        }

        $sql = "INSERT INTO Record (record_id, title, artist, owner, price, last_cleaned) VALUES (:id,:title,:artist,:owner,:price,:date)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam('id', $record);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':artist',$artist_id);
        $stmt->bindParam(':owner', $owner_id);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':date', $date_cleaned);
        $stmt->execute();
    } catch(PDOException $e){
        die("Record Add Error:" .$e->getMessage());
    }
    

    echo "Success!";
    $pdo = null;
    ?>
    <a href="submit.html">Submit Records</a>
</body>
</html>