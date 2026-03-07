<div class="container mt-4 rounded mx-auto bg-marine text-white p-4 shadow">
    <h4 class="">Vous avez obtenu : <?= $note ?> / 20
    </h4>
    <button type="button" class="btn btn-retry float-end"><a href="<?= BASE_URL ?>">Réessayer</a></button>
    <p>
        <?php 
        if ($note > 10) {
            echo "Bravo, vous avez réussi !";
        } else {
            echo "Vous avez échoué";
        }
                
        ?>
    </p>
</div>