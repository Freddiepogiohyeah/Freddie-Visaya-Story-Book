<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luna and the Starry Key</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-content">
        <div class="storybook-container">
<?php
$characters = ["Luna", "Owl", "Starry Key"];
$sounds = ["hoo!", "twinkle", "whoosh"];

$pages = [
    0 => [
        "title" => "✨ Luna's Adventure ✨",
        "content" => ucwords("luna's magical journey") . ". " . 
                     ($characters[0]) . " is adventurous, brave, and loves exploring. " .
                     "Click the arrow to begin her adventure."
    ],
    1 => [
        "title" => "The Moonlit Garden",
        "content" => "One night, " . $characters[0] . " wandered into the moonlit garden. " .
                     "She spotted a glowing flower whose first letter shines: " . ucfirst("l") . ". " .
                     "The garden was full of " . strtoupper("magic") . ". " .
                     "She counted the petals: " . strlen($characters[0]) . ", reminding her of her four-letter name, " . $characters[0] . ". " .
                     strtolower("HELLO EXPLORER!") . " she whispered softly, tiptoeing deeper."
    ],
    2 => [
        "title" => "The Whispering Owl",
        "content" => "Suddenly, the " . $characters[1] . " appeared, saying " . str_repeat($sounds[0] . " ", 3) . 
                     "as it landed gracefully. " .
                     "A mysterious word carved in the tree: '" . substr("mysterious", 2, 4) . "'. " .
                     "The secret phrase cleaned up reads: '" . trim("  hidden message  ") . "'. " .
                     "The letter 'o' appears first at position " . strpos("Luna noticed a mysterious owl", "o") . "."
    ],
    3 => [
        "title" => "The Tower and the Starry Key",
        "content" => "After exploring, " . $characters[0] . " climbed the old tower and discovered the " . strtoupper($characters[2]) . ". " .
                     "Behind a velvet curtain, she read: '" . strchr("Find the secret behind the tower", "secret") . "'. " .
                     "With a gentle wave, she transformed the ordinary lock into a " . str_replace("lock", "magic lock", "lock") . ", unlocking wonders."
    ]
];

$page = isset($_GET['page']) ? (int)$_GET['page'] : 0;

if(array_key_exists($page, $pages)){
    $highlight_words = $characters + ["magic", "secret", "flower"];
    $content = $pages[$page]["content"];

    foreach($highlight_words as $word){
        $content = str_replace($word, '<span class="highlight">'.$word.'</span>', $content);
    }

    if($page === 0){
        echo '<div class="front-page">';
        echo '<h1>' . ucwords($pages[$page]["title"]) . '</h1>';
        echo '<p>' . nl2br($content) . '</p>';
        echo '<a href="?page=1" class="nav-button">↓</a>';
        echo '</div>';
    } else {
        echo '<div class="content-box">';
        echo '<h1>' . ucwords($pages[$page]["title"]) . '</h1>';
        echo '<p>' . nl2br($content) . '</p>';

        echo '<div class="navigation">';
        echo '<div class="nav-row">';
        if($page > 0) echo '<a href="?page='.($page-1).'" class="nav-button">←</a>'; else echo '<span></span>';
        if($page < count($pages)-1) echo '<a href="?page='.($page+1).'" class="nav-button">→</a>'; else echo '<span></span>';
        echo '</div>';
        echo '<a href="?page=0" class="nav-button">↓</a>';
        echo '</div>';
        echo '</div>';
    }
}
?>
        </div>
    </div>

    <footer>
        &copy; 2025 Story By Frdvsya. All rights reserved.
    </footer>
</body>
</html>