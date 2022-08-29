<?php

//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../../config/Database.php';
require_once '../../models/Post.php';

$database = new Database();
$db = $database->connect();

$post = new Post($db);
$result = $post->read();
$rowCount = $result->rowCount();


if($rowCount > 0)
{
    $post_arr = array();
    $post_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        extract($row);

        $post_item = array(
            'id' => $id,
            'title' => $title,
            'body' => html_entity_decode($body),
            'author' => $author,
            'category_id' => $category_id,
            'category_name' => $category_name,
        );

        array_push($post_arr['data'], $post_item);
    }

    echo json_encode($post_arr);
}
else
{
    echo json_encode(array('messsage' => 'No posts found'));
}