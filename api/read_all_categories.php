<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//initializing api
include_once('../core/initialize.php');

//instantiate post
$post = new Category($db);

//blog post query
$result = $post->read();

//get the row count
$num = $result->rowCount();

if ($num > 0) {
  $cat_arr = array();
  $cat_arr['data'] = array();
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $cat_item = array(
      'id' => $id,
      'name' => $name,
      'created_at' => $created_at,

    );
    array_push($cat_arr['data'], $cat_item);
  }

  //convert to JSON and output
  echo json_encode($cat_arr);
} else {
  echo json_encode(array('message' => 'No categories found.'));
}
