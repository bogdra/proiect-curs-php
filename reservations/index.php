<?php include_once('reservations.php'); ?>

<html>
<?php include_once('../header.php'); ?>
<body>
<?php include_once('../menu.php'); ?>

<?php include_once('../notification.php'); ?>

<?php  if ($formSent == false): ?>
<form action="#" method="POST">
    <div class="form-group">
        <label for="room_type">Tip Camera</label>
        <select class="form-control" name="room_type" id="room_type">
            <option value="none">Selecteaza Camera</option>
            <?php foreach (ROOM_TYPES as $type): ?>
                <option value="<?=$type?>" ><?=$type?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group col-md-6">
        <label for="nights">Numar de nopti</label>
        <input type="number" class="form-control" name="nights" id="nights" aria-describedby="nightsHelp" min="<?=NUMBER_OF_NIGHTS_AVAILABLE['min']?>" max="<?=NUMBER_OF_NIGHTS_AVAILABLE['max']?>">
        <small id="nightsHelp" class="form-text text-muted">Selecteaza numarul de nopti dorite.</small>
    </div>

    <div class="form-group col-md-6">
        <label for="payment">Variante Plata</label>
        <select class="custom-select mr-sm-2" id="payment" name="payment" required>
            <option value="none">Selecteaza ..</option>
            <?php foreach (PAYMENT_OPTIONS as $paymentMethod): ?>
                <option value="<?=$paymentMethod?>" ><?=$paymentMethod?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="number_of_installments">Numar de rate</label>
        <input type="number" class="form-control" name="number_of_installments" id="number_of_installments" min="<?=NUMBER_OF_INSTALLMENTS['min']?>" max="<?=NUMBER_OF_INSTALLMENTS['max']?>">
    </div>

    <button type="submit" class="btn btn-primary">Trimite</button>
</form>
<?php else: ?>
    <h2 class="h1-responsive font-weight-bold text-center my-4">Formular Trimis</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Va multumim pentru interes. Veti fi contactat in cel mai scurt timp de unul dintre consultantii nostri de vanzari!</p>
<?php endif; ?>

<?php include_once('../footer.php'); ?>
</body>
</html>