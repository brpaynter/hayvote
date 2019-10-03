<div class="container mx-auto col-sm-8 text-center">
    <h1 class="pb-3">New Vote</h1>
    <form method="post" action="<?=url_for('votes', 'new');?>" id="create_form">
        <span id="errors" class="text-danger"></span>
        <div class="form-group row">
            <label for="voteTitle" class="text-sm-right h4 d-block col-sm-2">Title</label>
            <div class="col-sm-10">
                <input class="form-control" id="voteTitle" name="voteTitle" type="text">
            </div>
        </div>
        <div class="form-group row">
            <label for="voteOption1" class="col-form-label col-sm-2 text-sm-right">Option</label>
            <div class="col-sm-10">
                <input class="form-control" id="voteOption1" name="voteOption1" type="text">
            </div>
        </div>
        <div id="option_code" class="form-group row">
            <label for="voteOption2" class="col-form-label col-sm-2 text-sm-right">Option</label>
            <div class="col-sm-10">
                <input class="form-control" id="voteOption2" name="voteOption2" type="text">
            </div>
        </div>
    </form>
    <button type="button" id="new_option"class="btn btn-outline-light text-center mb-3"> <img style="width:30px;height:30px;" src="<?= public_url_for('/img/plus-solid.svg');?>"></button>
    <br>
    <button type="button" id="submit_vote" class="btn btn-outline-dark"><span class="h3">Create</span></button>
</div>
<script src="<?= public_url_for('js/create_vote.js');?>" charset="utf-8"></script>
