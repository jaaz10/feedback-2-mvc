
<?php
function dd($data)
{
    echo '<pre>';
    die(var_dump($data)); // at any moment we use this function, its going to stop everything and dump everything in $data. What ever function we was about to run, whatever piece of code block was going to run, next kill it and VAR_DUMP into $data.
    echo '</pre>';
}

function redirect($uri)
{
    header('Location: ' . $uri);
}
?>