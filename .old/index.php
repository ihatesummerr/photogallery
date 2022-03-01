<?php

require_once('./src/bundle.php');
session_start();

if(!isset($GLOBALS['router'])) {
    $GLOBALS['router'] = new Router('/');
}

$GLOBALS['router']->get('logout', AuthAction::$ACTION_LOGOUT);


?>


<!DOCTYPE html>
<html lang="en">
	<head>
        <link rel="stylesheet" href="./src/styles/main.css">
		<title>Photogallery</title>
	</head>
	<body>
        <header>
            <?php $GLOBALS['router']->get('/', PageAction::$ACTION_HEADER) ?>
        </header>
        <main>
            <?php $GLOBALS['router']->get('page', PageAction::$ACTION_HERO, PageAction::$ACTION_HERO); ?>
            <div class="page">
                <div class="page__content">
                    <?php $GLOBALS['router']->get('page', PageAction::$ACTION_SWITCHPAGE, PageAction::$ACTION_HOME); ?>
                    <?php $GLOBALS['router']->get('post', PostAction::$ACTION_POST); ?>
                    <?php $GLOBALS['router']->get('admin', AdminAction::$ACTION_POST); ?>
                </div>
            </div>
        </main>
        <footer>
            <?= include_component('footer') ?>
        </footer>
        <script src="./src/scripts/script.js"></script>
    </body>
</html>