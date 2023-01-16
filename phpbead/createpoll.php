<?php
require_once("utils/init.php");
require_once("partials/header.php");

if(count($_POST) != 0){
    if (array_all_keys_exist($_POST, "answeroption", "deadline", "question", "isMultiple")) {

        if($_POST['answeroption'] != "" && $_POST['deadline'] != "" && $_POST['question'] != "" && $_POST["isMultiple"]){

            $answerOptions = explode("\n", $_POST['answeroption']);
            if(count($answerOptions) < 2){
                $messages[] = ["type" => "danger", "text" => "Please provide at least 2 answer options"];
            }else{
                $answers = [];
                $options = [];
                foreach($answerOptions as $option){
                    
                    $newOption = str_replace('_', ' ', $option);
                    $newOption = str_replace("\r", '', $newOption);
                    $newOption = str_replace("\n", '', $newOption);
                    $options[]= $newOption;
                    $answers[$newOption] = 0;
                }

                $isMultiple = $_POST['isMultiple'] === "true" ? true : false;

                $pollId = uniqid("poll", true);
                $now = new DateTime('now');

                $newPoll = [
                    'id' => $pollId,
                    'question' => $_POST['question'],
                    'options' => $options,
                    'isMultiple' => $isMultiple,
                    'createdAt' => $now->format("Y-m-d H:i:s"),
                    'deadline' => $_POST['deadline'],
                    'answers' => $answers,
                    'voted' => [],
                ];

                $polls[$pollId]= $newPoll;
                save_to_file("data/polls.json", $polls);

                redirect("index.php");
            }
            
        }else{
            $messages[] = ["type" => "danger", "text" => "Please fill out every choice"];
        }
    }
}

?>

<h2 class="d-flex justify-content-center mt-5">Új poll létrehozása</h2>
<form method="post" action="createpoll.php" class="create_poll_form justify-content-center" novalidate>
    <div class="d-flex flex-column justify-content-center">
        <div class="align-self-flex-start mt-3">
            <label class="create_poll_label" for="deadline">Határidő</label></br>
            <input class="create_poll_elem" type="date" id="deadline" name="deadline" value="<?= $_POST["deadline"] ?? ''?>"> 
        </div>
        <div class="align-self-flex-start mt-3">
            <label class="create_poll_label">Több válaszlehetőség is megjelölhető</label><br>
            
            <input class="create_poll_elem" type="radio" id="isMultipleYes" name="isMultiple" value="true">
            <label for="isMultipleYes">Igen</label><br>
            
            <input class="create_poll_elem" type="radio" id="isMultipleNo" name="isMultiple" value="false">
            <labe for="isMultipleNo">Nem</labe>
        </div>
        <div class="align-self-flex-start mt-3">
            <label class="create_poll_label" for="question">Kérdés szövege:</label></br>
            <textarea type="textarea" id="question" name="question" value="<?= $_POST["question"] ?? ''?>"></textarea>
        </div>
        <div class="align-self-flex-start mt-3">
            <label class="create_poll_label" for="answeroption">Válaszlehetőségek, mindegyik új sorban:</label></br>
            <textarea type="" id="answeroption" name="answeroption" value="<?= $_POST["answeroption"] ?? ''?>"></textarea>
        </div>
        <div class="align-self-center mt-3 mb-3">
            <button type="submit" class="btn btn-primary">Létrehozás</button>
        </div>
    <div>  
</form>

<?php require("partials/messages.php"); ?>

<?php require("partials/footer.php"); ?>