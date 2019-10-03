<?php

function votes_find_recent() {
    $db = option('db_conn');
    $query = $db->prepare('select * from votes order by id desc limit 15');
    $query->execute();
    return $query->fetchAll();
}

function votes_find($id) {
    $db = option('db_conn');
    $query = $db->prepare('select * from votes where id = :id');
    $query->bindParam(':id', $id);
    $query->execute();
    return $query->fetch();
}

function create_vote() {
    //connect to DB
    $db = option('db_conn');
    //get Required fields
    $title = $_POST['voteTitle'];
    //insert vote
    $query = $db->prepare('insert into votes (title) values (:title)');
    $query->bindParam(':title', $title);
    if(!$query->execute()){
        return false;
    }
    //return vote id
    return $voteId = $db->lastInsertId();
}
?>
