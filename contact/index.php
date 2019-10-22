<?php include_once('contact.php'); ?>

<html>
    <?php include_once('../header.php'); ?>
    <body>
    <?php include_once('../menu.php'); ?>

        <!--Section: Contact v.2-->
        <section class="mb-4">
            <?php include_once('../notification.php'); ?>
            <?php if ($formSent == false): ?>
            <!--Section heading-->
            <h2 class="h1-responsive font-weight-bold text-center my-4">Formular de contact</h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5">Aveti intrebari pentru noi ? Nu ezitati sa ne contactati. Cineva din echipa noastra ve reveni catre dvs !</p>

            <div class="row">

                <!--Grid column-->
                <div class="col-md-9 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" action="#" method="POST">

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" name="full_name" class="form-control" required minlength="4" maxlength="50" pattern="<?=NAME_REGEX_RULE?>" value="<?php echo (isLoggedIn() ? $_SESSION['full_name'] : ''); ?>">
                                    <label for="full_name" class="">Numele tau</label>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="email" name="email" class="form-control" required minlength="4" maxlength="50">
                                    <label for="email" class="">Email</label>
                                </div>
                            </div>
                            <!--Grid column-->


                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <select class="form-control" id="exampleFormControlSelect1" name="source">
                                        <option value="none">Alege o optiune</option>
                                        <?php foreach (SOURCES as $source): ?>
                                            <option value="<?=$source?>"> <?=$source?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="phone" class="">Sursa</label>
                                </div>
                            </div>

                        <!--Grid row-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="phone" name="phone" required minlength="9" maxlength="11" pattern="<?=PHONE_REGEX_RULE?>" class="form-control">
                                <label for="phone" class="">Telefon</label>
                            </div>
                        </div>
                        <!--Grid column-->
                        </div>

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-12">

                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                    <label for="message">Your message</label>
                                </div>

                            </div>
                        </div>
                        <!--Grid row-->

                    </form>

                    <div class="text-center text-md-left">
                        <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                    </div>
                    <div class="status"></div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-3 text-center">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-map-marker-alt fa-2x"></i>
                            <p>Rasnov, str pensiunii, nr 1</p>
                        </li>

                        <li><i class="fas fa-phone mt-4 fa-2x"></i>
                            <p>+0723556112</p>
                        </li>

                        <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                            <p>contact@pensiunea.ro</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

            </div>
            <?php else: ?>
                <h2 class="h1-responsive font-weight-bold text-center my-4">Formular inregistrat</h2>
                <!--Section description-->
                <p class="text-center w-responsive mx-auto mb-5">Va multumim pentru interes. Veti fi contactat in cel mai scurt timp de unul dintre consultantii nostri de vanzari!</p>
            <?php endif; ?>
        </section>
        <!--Section: Contact v.2-->

    <?php include_once('../footer.php'); ?>
    </body>
</html>