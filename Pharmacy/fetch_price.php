<?php
$mm = new PDO('mysql:host=localhost;dbname=pharmacy','root', '');
if(isset($_POST['item_name'])) {
    $item_name = $_POST['item_name'];
    $statement = $mm->prepare("SELECT price FROM stock WHERE item_name = :item_name");
    $statement->execute([':item_name' => $item_name]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result); // Return the price as JSON
}
?>
