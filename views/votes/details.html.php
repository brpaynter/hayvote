<div class="container mx-auto col-sm-8 text-center">
    <h1 class="pb-3"><?= h($vote['title']);?></h1>
    <form method="post" action="<?=url_for('votes', $vote['id']);?>" id="create_form">
        <div class="list-group">
        <?php foreach ($options as $option) { ?>
            <div class="form-check p-0 list-group-item">
                <input class="form-check-input form-control-lg" style="transform:translate(0px, -3px);" type="radio" name="options" id="option<?=$option['id'];?>" value="<?=$option['id'];?>">
                <label class="form-check-label form-control-lg"  for="option<?=$option['id'];?>">
                    <?=h($option['option']);?>
                </label>
            </div>
        <?php } ?>
        </div>
        <button type="submit" id="submit_vote" class="btn btn-outline-dark mt-3"><span class="h3">Vote</span></button>
    </form>
    <hr class="invisible my-1" />
    <a href="<?=url_for('votes', $vote['id'], 'results');?>">Results</a>
</div>
