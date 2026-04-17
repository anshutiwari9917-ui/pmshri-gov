<?php
    $sql = "SELECT filename FROM slider_image";
    $result = $conn->query($sql);

    $sql = "SELECT * FROM achievement_db";
    $achieve = $conn->query($sql);

    $sql = "SELECT * FROM announcement_db";
    $announce = $conn->query($sql);

    $sql = "SELECT * FROM event_db";
    $event = $conn->query($sql);

    $sql = "SELECT * FROM fixed_db LIMIT 9";
    $fixed = $conn->query($sql);

    $sql = "SELECT * FROM news_db LIMIT 3";
    $news = $conn->query($sql);
    
    $sql = "SELECT * FROM gallery_db";
    $gallery = $conn->query($sql);
?>