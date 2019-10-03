<?php

function create_options($vote_id) {
    //connect to DB
    $db = option('db_conn');
    //get Required fields
    $options[] = $_POST['voteOption1'];
    $options[] = $_POST['voteOption2'];
    //check for more options
    for ($i=3; $i <= 6; $i++) {
        if(isset($_POST['voteOption'.$i])) {
            $options[] = $_POST['voteOption'.$i];
        }
    }
    print_r($options);
    //insert options
    foreach ($options as $option) {
        $query = $db->prepare('insert into `options` (`option`, vote_id) values (:option, :id)');
        $query->bindParam(':option', $option, PDO::PARAM_STR);
        $query->bindParam(':id', $vote_id, PDO::PARAM_INT);
        if(!$query->execute()){
            print_r($query->errorInfo());
            echo $query->debugDumpParams();
            return false;
        }
    }
    return true;
}

function options_find($vote_id) {
    $db = option('db_conn');
    $query = $db->prepare('select * from `options` where vote_id = :id');
    $query->bindParam(':id', $vote_id);
    $query->execute();
    return $query->fetchAll();
}

function record_vote($option_id) {
    $db = option('db_conn');
    $query = $db->prepare('update `options` set votes = votes + 1 where id = :id');
    $query->bindParam(':id', $option_id);
    return $query->execute();
}
?>
