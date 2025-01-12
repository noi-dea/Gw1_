<?php
// Must-declare variable before including this file: $pagefile 
if (isset($_SERVER["admin"])) {
    $div = '<div class="container" style="display:grid; place-items:center;">';
} else {
    $div = '<div class="container pagination">';
}
$prev = $pagenr-1;
$next = $pagenr+1;
?>
 <?= $div; ?>
            <?php if ($firstpage == $lastpage){ ?>
                <!-- Empty result to not make the pagination display when there's only 1 page -->
            <?php } else { ?>
            <ul class="pagination">
                <?php if ($pagenr == $firstpage){ ?>
                    <li class="active"><a href="<?= $pagefile; ?>?page=<?= $firstpage; ?>"><?= $firstpage; ?></a></li>
                <?php }else{ ?>
                    <li><a href="<?= $pagefile; ?>?page=<?= $prev; ?>">PREVIOUS</a></li>
                    <li><a href="<?= $pagefile; ?>?page=<?= $firstpage; ?>"><?= $firstpage; ?></a></li>
                <?php } ?>

                <?php if ($pagenr-3>=$firstpage){ ?>
                        <?php if($pagenr-3>$firstpage): ?>
                        <li><a href="#">...</a></li>
                        <?php endif; ?>
                        <li><a href="<?= $pagefile; ?>?page=<?= $prev-1; ?>"><?= $prev-1; ?></a></li>
                    <li><a href="<?= $pagefile; ?>?page=<?= $prev; ?>"><?= $prev; ?></a></li>
                    <?php } else if ($prev>$firstpage){?>
                        <li><a href="<?= $pagefile; ?>?page=<?= $prev; ?>"><?= $prev; ?></a></li>
                    <?php } ?>
                
                <?php if ($pagenr == $firstpage || $pagenr == $lastpage){ ?>
                    
                <?php } else { ?>
                    <li class="active"><a href="#" disabled><?= $pagenr; ?></a></li>
                <?php } ?>

                <?php if ($pagenr+3<=$lastpage){ ?>
                    <li><a href="<?= $pagefile; ?>?page=<?= $next; ?>"><?= $next; ?></a></li>
                    <li><a href="<?= $pagefile; ?>?page=<?= $next+1; ?>"><?= $next+1; ?></a></li>
                        <?php if($pagenr+3 < $lastpage): ?>
                        <li><a href="#">...</a></li>
                        <?php endif; ?>
                <?php } else if ($next<$lastpage){?>
                    <li><a href="<?= $pagefile; ?>?page=<?= $next; ?>"><?= $next; ?></a></li>
                <?php }?>

                <?php if ($pagenr == $lastpage){ ?>
                    <li class="active"><a href="<?= $pagefile; ?>?page=<?= $lastpage; ?>"><?= $lastpage; ?></a></li>
                <?php }else{ ?>
                    <li><a href="<?= $pagefile; ?>?page=<?= $lastpage; ?>"><?= $lastpage; ?></a></li>
                    <li><a href="<?= $pagefile; ?>?page=<?= $next; ?>">NEXT</a></li>
                <?php } ?>
                </ul> 
            <?php } ?>
        </div>

<!-- include at bottom of the body right above the footer-->