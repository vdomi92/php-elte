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
<h2 class="d-flex justify-content-center mt-5">Expired polls:</h2>

<?php foreach($expiredPolls as $poll):?>

<div class="expired d-flex flex-column align-self-center mt-5">        
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
        <ul>
            <?php foreach($poll["answers"] as $answerText => $answer): ?>
                <li><?php echo $answerText . ": " . $answer; ?> </li>
            <?php endforeach; ?>
        </ul>
        <div class="voteButton align-self-center">
                <?php if(get_logged_in_user($users)) :?>
                        <button type="button" class="btn btn-primary"><a  href="<?php echo 'poll.php?id='.$poll['id']; ?>">Szavazás megtekintése</a></button>
                    <?php else : ?>
                        <button type="button" class="btn btn-primary"><a href="login.php">Jelentkezzen be</a></button>
                    <?php endif; ?>        
        </div>

    </div>

    
</div>

<?php endforeach; ?>