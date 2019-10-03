<?php

function voter_ip_lookup($ip, $id) {
    $db = option('db_conn');
    $query = $db->prepare('select * from submitted_votes where user_ip = :ip and votes_id = :id;');
    $query->bindParam(':ip', $ip);
    $query->bindParam(':id', $id);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (isset($result['id'])) {
        return true;
    }
    return false;
}

function record_voter_ip($ip, $id) {
    $db = option('db_conn');
    $query = $db->prepare('insert into submitted_votes (user_ip, votes_id) values (:ip, :id);');
    $query->bindParam(':ip', $ip);
    $query->bindParam(':id', $id);
    return $query->execute();
}
 ?>
