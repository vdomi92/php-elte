<?php
//Tasks: 
//szavazás sorszáma
//létrehozás ideje
//leadási határideje
//szavazógomb

//kérdés
//válaszok
?>
<h2>Currently active polls:</h2>

<?php foreach($activePolls as $poll):?>

<div class="active">
    <div class="active-element">

        <div class="infobox">

            <div class="id">
                Id: <?= $poll["id"] ?>
            </div>
             
            <div class="createdAt">
                Created at: <?= $poll["createdAt"] ?>
            </div>

            <div class="deadline">
                Deadline: <?= $poll["deadline"] ?>
            </div>

        </div>

        <div class="questionbox">

            <div class="question">
                <?= $poll["question"] ?>
            </div>

            <div class="answers">
                <?php foreach($poll["answers"] as $answerText => $answer): ?>
                    <div class="answerOption">
                        <?= `$answerText: $answer` ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="voteButton">
            </div>

        </div>

    </div>
</div>

<?php endforeach; ?>