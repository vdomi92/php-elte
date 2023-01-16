<?php 
require_once("utils/init.php");
require_once("partials/header.php");
require_once("utils/user.php");



if(isset($_GET['id'])){
    $current_poll = null;
    foreach($polls as $poll){
        if($poll['id'] === $_GET['id']){
            $current_poll = $poll;
        }
    }
}else{
    if(count($_POST) > 1){
        $answer_options_selected = array_filter(array_keys($_POST), function($elem){
            return $elem != "id";
        });
        
        $current_poll = null;
        foreach($polls as $poll){
            if($poll['id'] === $_POST['id']){
                $current_poll = $poll;
            }
        }
        if(isUserVotedOnPoll($current_poll['voted'], $users)){
            //összeszedni, hogy mire szavazott régebben
            $current_user_prev_votes = null;
            foreach($current_poll['voted'] as $voterId => $voteOptions){
                if($voterId === $current_user['id']){
                    $current_user_prev_votes = $voteOptions;
                }
            }
            //kivonni az összes szavazatból azokat és felülírni a régi szavazatát a usernek
            foreach($current_user_prev_votes as $prev_vote){
                $current_poll['answers'][$prev_vote]--;
            }
            //összeszedni az új szavazatokat, hozzáadni az összes szavazathoz azokat
            $current_poll['voted'][$current_user['id']] = [];
            foreach($answer_options_selected as $answer){
                $newAnswer = str_replace('_', ' ', $answer);
                $current_poll['voted'][$current_user['id']] []= $newAnswer;
                $current_poll['answers'][$newAnswer]++;
            }
            //menteni a poll-t
            $polls[$current_poll['id']] = $current_poll;
            $messages[] = ["type" => "success", "text" => "Thanks for voting!"];
            save_to_file('data/polls.json', $polls);
        }    
    }
    if(count($_POST) === 1){
        $messages[] = ["type" => "danger", "text" => "Must select at least one option"];
        $current_poll = null;
        foreach($polls as $poll){
            if($poll['id'] === $_POST['id']){
                $current_poll = $poll;
            }
        }
    }
}

?>

<div class="active d-flex flex-column align-self-center mt-5">

    <div class="infobox d-flex flex-column align-self-flex-start">

            <div class="id">
                Id: <?= $current_poll["id"] ?>
            </div>
             
            <div class="createdAt">
                Created at: <?= $current_poll["createdAt"] ?>
            </div>

            <div class="deadline">
                Deadline: <?= $current_poll["deadline"] ?>
            </div>

    </div>
    

    <div class="questionbox d-flex flex-column align-self-center">

        <div class="question align-self-flex-start">
                <?= $current_poll["question"] ?>
        </div>
        <div class="answers d-flex flex-column">
            <form class="d-flex flex-column" action="<?php echo 'poll.php'?>" method="post" novalidate>
                <?php $i = 0 ?>
                <?php foreach($current_poll["answers"] as $answerText => $answer): ?>
                    
                    <?php $inputType = $current_poll["isMultiple"] ? "checkbox" : "radio"?>

                    <div class="answerOption">
                        <input 
                            type="<?php echo $inputType ?>"
                            id="<?php echo $answerText ?>"
                            value="<?php echo $answerText ?>"
                            name="<?php echo $answerText ?>"
                        >
                        <label for="<?php echo $i ?>">
                            <?php echo $answerText ?>
                        </label>
                    </div>
                <?php $i++; ?>
                <?php endforeach; ?>

                <input class="hidden" type="text" value="<?php echo $current_poll['id'] ?>" name="id">
                <button type="submit" class="btn btn-primary align-self-center">Szavazás</button>
            </form>
        </div>
    </div>

</div>


<?php require("partials/messages.php"); ?>

<?php require("partials/footer.php"); ?>