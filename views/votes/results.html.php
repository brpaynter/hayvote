<div class="container mx-auto col-sm-8 text-center">

    <h1 class="pb-3"><?= h($vote['title']);?></h1>

    <canvas id="myChart" style="max-height: 300px;max-width: 300px;" class="mx-auto pb-3" width="200" height="200"></canvas>

    <div class="border border-dark rounded bg-light">
    <?php
    $chartdata = array();;
    foreach ($options as $option) {
        $chartdata['labels'][] = $option['option'];
        $chartdata['datasets'][0]['data'][] = (int)$option['votes'];
        $chartdata['datasets'][0]['backgroundColor'][] = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        ?>
        <div class="progress text-dark" style="height: 50px;">
            <div class="progress-bar" role="progressbar" style="width: <?=$option['width'];?>%;" aria-valuenow="<?=$option['width'];?>" aria-valuemin="0" aria-valuemax="100">
            </div>
            <span class="text-dark w-100 text-center h5 mt-3" style="position: absolute;"><b><?=h($option['option']);?></b></span>
            <span class="text-dark w-100 text-right mt-3 pr-5" style="position: absolute;"><?=h($option['votes']);?> vote<?= $option['votes'] > 1 ? 's' : '';?></span>
        </div>
    <?php }

    ?>
    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" charset="utf-8"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: <?=json_encode($chartdata);?>,
    options: {
        legend: {
            position: 'bottom',
            labels: {
                fontSize: 18,
                fontStyle: 'bold'
            }
        }
    }
});
</script>
