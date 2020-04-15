<html>
<head>
    <?php
    foreach ($this->css as $item) {
        ?>
            <link type="text/css" rel="stylesheet" href="<?=$item?>"/>
        <?php
    }
    ?>
</head>
<body>
    <header>
        This is Header
        <hr>
    </header>
