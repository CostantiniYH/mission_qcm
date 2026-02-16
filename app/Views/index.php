
<div class="container ">
    <h1 class="text-center">Questionnaire</h1>
    <section class="p-5  text-black">
        <form class="" action="quize" method="post">
            <?php               

            $i = 1;
            foreach ($tableauQuestions as $idq => $item) :
            ?>
                <div class="bg-white m-3 p-3 rounded shadow-sm">

                    <label class="d-block" for="question_<?= $idq ?>">
                        <strong><?= $i++ . '. '. htmlspecialchars($item['libelleQ']) ?></strong>
                    </label>
                    <?php 
                    foreach ($item['reponses'] as $reponse):
                    ?>
                        <input class="" type="radio" name="question_<?= $idq ?>" id="r<?= $reponse['idr'] ?>">
                        <label for="r<?= $reponse['idr'] ?>">
                            <?= htmlspecialchars($reponse['libelleR']) ?>
                        </label><br>
                    <?php
                    endforeach;
                    ?>
                </div>
            <?php 
            endforeach;
            ?>
            <input class="shadow btn btn-primary w-25 d-block mx-auto" type="submit" value="Envoyer">
        </form>
    </section>
</div>