            <div class="answers">
                <?php foreach($poll["answers"] as $answerText => $answer): ?>
                    <div class="answerOption">
                        
                        <?= $answerText . ": ". $answer;?>
                    </div>
                <?php endforeach; ?>
            </div>



        <div class="voteButton align-self-center">
                <?php if (!isUserVotedOnPoll($poll['voted'], $users)) :?>
                    <?php if(get_logged_in_user($users)) :?>
                        <button type="button" class="btn btn-primary"><a href="vote.php">Szavazás</a></button>
                    <?php else : ?>
                        <button type="button" class="btn btn-primary"><a href="login.php">Jelentkezzen be</a></button>
                        
                    <?php endif; ?>        
                <?php else:?>
                    <button type="button" class="btn btn-primary"><a>Szavazat módosítás</a></button>
                <?php endif; ?>       
        </div>


        <div class="voteButton align-self-center">
                <?php if(get_logged_in_user($users)) :?>
                        <button type="button" class="btn btn-primary"><a>Szavazás megtekintése</a></button>
                    <?php else : ?>
                        <button type="button" class="btn btn-primary"><a href="login.php">Jelentkezzen be</a></button>
                    <?php endif; ?>        
        </div>