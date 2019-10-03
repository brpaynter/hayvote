<?php

# 0. Loading limonade framework
require_once 'vendors/limonade.php';

# 1. Setting global options of our application
function configure() {
    # A. Setting environment
    $localhost = preg_match('/^localhost(\:\d+)?/', $_SERVER['HTTP_HOST']);
    $env =  $localhost ? ENV_DEVELOPMENT : ENV_PRODUCTION;
    option('env', $env);

    # B. Initiate db connexion
	$dsn = $env == ENV_PRODUCTION ? 'mysql:dbname=hayvote;host=127.0.0.1' : 'mysql:dbname=hayvote;host=127.0.0.1';
    $user = 'hayvote';
    $password = 'hayvoteadmin';

	try
	{
        $db = new PDO($dsn, $user, $password);
	}
	catch(PDOException $e)
	{
        halt("Connexion failed: ".$e); # raises an error / renders the error page and exit.
	}
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	option('db_conn', $db);

    option('base_uri', '/');

}


# 2. Setting code that will be executed bfore each controller function
function before() {
    layout('layouts/default_layout.php');
}


# 3. Defining routes and controllers
# ----------------------------------------------------------------------------
# RESTFul map:
#
#  HTTP Method |  Url path         |  Controller function
# -------------+-------------------+-------------------------------------------
#   GET        |  /votes           |  vote_recent_list
#   GET        |  /votes/new       |  vote_new
#   POST       |  /votes/new       |  vote_new_create
#   GET        |  /votes/:id       |  vote_show
#   POST       |  /votes/:id       |  vote_submit_vote
#   GET        | /votes/:id/results|  vote_show_results
#   GET        |  /about           |  about_votes
#   GET        |  /                |  vote_index (redirect to /votes)
# -------------+-------------------+-------------------------------------------
#

dispatch('/', 'vote_index');

dispatch('/votes', 'vote_recent_list');

dispatch('votes/new', 'vote_new');

dispatch_post('/votes/new', 'vote_new_create');

dispatch('/votes/:id', 'vote_show');

dispatch_post('/votes/:id', 'vote_submit_vote');

dispatch('/votes/:id/results', 'vote_show_results');

dispatch('/:name', 'hello_name');

# 4. Running the limonade app
run();
