<?php

#  HTTP Method |  Url path         |  Controller function
# -------------+-------------------+-------------------------------------------
#   GET        |  /votes           |  vote_recent_list
#   GET        |  /votes/:id       |  vote_show
#   POST       |  /votes/:id       |  vote_submit_vote
#   GET        | /votes/:id/results|  vote_show_results
#   GET        |  /votes/new       |  vote_new
#   POST       |  /votes/new       |  vote_new_create
#   GET        |  /about           |  about_votes
#   GET        |  /                |  vote_index (redirect to /votes)
# -------------+-------------------+-------------------------------------------
#

function vote_index() {
    redirect_to('votes');
}

function vote_recent_list() {
    $votes = votes_find_recent();
    set('active_page', 'votes');
    set('votes', $votes);
    return html('votes/index.html.php');
}

function vote_show($id) {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (voter_ip_lookup($ip, $id)) {
        redirect_to('votes', $id, 'results');
    }
    $votes = votes_find($id);
    if(!$votes)  {
        halt(NOT_FOUND, "This vote doesn't exists.");
    }
    $options = options_find($id);
    set('vote', $votes);
    set('options', $options);
    return html('votes/details.html.php');
}

function vote_submit_vote($id) {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (!voter_ip_lookup($ip, $id)) {
        record_voter_ip($ip, $id);
        record_vote($_POST['options']);
    }
    redirect_to('votes', $id, 'results');
}

function vote_show_results($id) {
    $votes = votes_find($id);
    if(!$votes)  {
        halt(NOT_FOUND, "This vote doesn't exists.");
    }
    $options = options_find($id);
    $totalvotes = 0;
    foreach ($options as $option) {
        $totalvotes += $option['votes'];
    }
    foreach ($options as &$option) {
        $option['width'] = $option['votes'] / $totalvotes * 100;
    }
    unset($option);
    set('vote', $votes);
    set('options', $options);
    return html('votes/results.html.php');
}

function vote_new() {
    set('active_page', 'votes_new');
    return html('votes/create.html.php');
}

function vote_new_create() {
    if ($id = create_vote()) {
        if (create_options($id)) {
            redirect_to('votes', $id);
        }
        else {
            echo 'Error creating options';
        }
    }
    else {
        echo 'Error creating vote';
    }
}

function hello_name() {
    $name = params('name');
    return "Hello $name!";
}


function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}
?>
