<?php
//Tasks: 
//szavazás sorszáma
//létrehozás ideje
//leadási határideje
//szavazógomb

//kérdés
//válaszok
require_once("utils/user.php");
?>
<h2 class="d-flex justify-content-center mt-5">Currently active polls:</h2>

<?php foreach($activePolls as $poll):?>
<div class="active d-flex flex-column align-self-center mt-5">     
    <div class="infobox d-flex flex-column align-self-flex-start">

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

    <div class="questionbox d-flex flex-column align-self-center">

        <div class="question align-self-flex-start">
                <?= $poll["question"] ?>
        </div>

        <div class="voteButton align-self-center">
                <?php if (!isUserVotedOnPoll($poll['voted'], $users)) :?>
                    <?php if(is_user_logged_in()) :?>
                        <button type="button" class="btn btn-primary"><a href="<?php echo 'poll.php?id='.$poll['id']; ?>">Szavazás</a><button>
                    <?php else : ?>
                        <button type="button" class="btn btn-primary"><a href="login.php">Jelentkezzen be</a></button>  
                    <?php endif; ?>        
                <?php else:?>
                    <button type="button" class="btn btn-primary"><a href="<?php echo 'poll.php?id='.$poll['id'];?>">Szavazat módosítás</a></button>
                <?php endif; ?>  
        </div>
    </div>
</div>

<?php endforeach; ?>