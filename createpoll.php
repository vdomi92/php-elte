<?php
require_once("utils/init.php");
require_once("partials/header.php");
require_once("utils/user.php");

if(array_all_keys_exist($_POST, 'answeroption', "deadline", "question")){
    //TODO: eff this shiet
    $newList = nl2br($_POST['answeroption']);
    var_dump($newList);
};

?>

<h2 class="d-flex justify-content-center mt-5">Új poll létrehozása</h2>
<form method="post" action="createpoll.php" class="create_poll_form justify-content-center" novalidate>
    <div class="d-flex flex-column justify-content-center">
        <div class="align-self-flex-start mt-3">
            <label class="create_poll_label" for="deadline">Határidő</label></br>
            <input class="create_poll_elem" type="date" id="deadline" name="deadline"> 
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
            <textarea type="textarea" id="question" name="question"></textarea>
        </div>
        <div class="align-self-flex-start mt-3">
            <label class="create_poll_label" for="answeroption">Válaszlehetőségek, mindegyik új sorban:</label></br>
            <textarea type="" id="answeroption" name="answeroption"></textarea>
        </div>
        <div class="align-self-center mt-3 mb-3">
            <button type="submit" class="btn btn-primary">Létrehozás</button>
        </div>
    <div>  
</form>