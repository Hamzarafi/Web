<?php
    $search=""
    $category=""
    $result = $db -> prepare("select * from products where title like '%?' or category like '%?'");
    $stmt->execute($search,$category);
    
?>