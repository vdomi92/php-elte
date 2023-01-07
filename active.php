<?php
//Tasks: 
//szavazás sorszáma
//létrehozás ideje
//leadási határideje
//szavazógomb

//kérdés
//válaszok
?>
<?php foreach($activePolls as $poll):?>

<div class="active">
    <div class="active-element">

        <div class="infobox">

            <div class="id">
                <?= $poll["id"] ?>
            </div>
             
            <div class="createdAt">
                <?= $poll["createdAt"] ?>
            </div>

            <div class="deadline">
                <?= $poll["deadline"] ?>
            </div>

        </div>

        <div class="questionbox">

            <div class="question">
                <?= $poll["question"] ?>
            </div>

            <div class="answers">
                <?php foreach($poll["answers"] as $answer): ?>
                    <div class="answerOption">
                        <?= $answer ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="voteButton">
            </div>

        </div>

    </div>
</div>

<?php endforeach; ?>