<?php if(hasNotifications()):  ?>
    <div id="notifications">
        <?php foreach (popNotifications() as $notification): ?>
            <div class="alert alert-danger" role="alert">
                <?=$notification?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>