<?php
if (isset($_SESSION['flash']['erreur']) && !empty($_SESSION['flash']['erreur'])) {
    $e = htmlspecialchars($_SESSION['flash']['erreur']);
}

if (isset($_SESSION['flash']['success']) && !empty($_SESSION['flash']['success'])) {
    $s = htmlspecialchars($_SESSION['flash']['success']);
}

if (isset($e) && !empty($e)):?>

    <div class="alert alert-success bi bi-check-circle-fill alert-dismissible fade show" role="alert">
        <?= $e ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>

<?php
    unset($e);
endif;

if (isset($s) && !empty($s)):?>

    <div class="alert alert-success bi bi-check-circle-fill alert-dismissible fade show" role="alert">
        <?= $s ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>

    
<?php 
    unset($s);
endif; ?>