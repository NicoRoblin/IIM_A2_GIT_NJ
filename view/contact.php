<body>
<?php include '_topbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="musicfeed">
                <h1><i class="fa fa-pencil"></i> Contactez nous !</h1>

                            <form id="form" class="topBefore" method="post" name="contactform" action="send_form_email.php">

                                <input name="name" class="input" id="name" type="text" placeholder="USERNAME">
                                <input name="email" class="input" id="email" type="text" placeholder="E-MAIL">
                                <textarea name="comments" id="message" placeholder="MESSAGE"></textarea>
                                <input class="input" id="submit" type="submit" value="GO!">

                            </form>

                </div>
            </div>
        </div>
</div>

<?php
include '_footer.php';
?>