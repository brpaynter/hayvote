<div class="container px-5 text-center">
    <h1 class="pb-3">Recent votes</h1>
    <div class="list-group col-sm-8 mx-auto">
        <?php foreach ($votes as $vote) { ?>
            <a class="list-group-item list-group-item-action" href="<?= url_for('votes', $vote['id']); ?>"><?= $vote['title'] ?></a>
        <?php } ?>
    </div>
</div>
