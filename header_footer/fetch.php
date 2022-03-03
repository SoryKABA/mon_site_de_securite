<?php
require "../backend/actions/database.php";

if(isset($_POST['view'])){
    if($_POST["view"] != ''){
     $update_query = $bdd->prepare("UPDATE notifications SET message_status = ? WHERE message_status = ?");
     $update_query->execute(array(1, 0));
    }
    $query = $bdd->prepare("SELECT 
     FROM notifications
     ORDER BY id_messages DESC
     LIMIT 5");
     $result = $query->execute;
     $output = '';
 
 
     if($result->RowCount() > 0){
        while($row = $result->fetch()){
         $output .= '
            <li>
                <a href="#">
                    <strong>'.$row["sujet"].'</strong><br />
                    <p>'.$row["nom_client"].'</p><br/>
                    <p>'.$row["email_client"].'</p><br/>
                    <p>'.$row["adresse_client"].'</p><br/>
                    <p>'.$row["telephone"].'</p><br/>
                    <p>'.$row["choix_client"].'</p><br/>
                    <small><em>'.$row["message"].'</em></small><br>
                    <p>'.$row["date_message"].'</p>
                </a>
            </li>
            ';
         }
         }else{
         $output .= '<li><a href="#" class="text-bold text-italic">Notification non trouvée</a></li>';
         }
 
 
         $status_query = $bdd->prepare("SELECT *
         FROM notifications
         WHERE message_status = ?");
         $result_query = $status_query->executre(array(0));
        $count = $result_query->RowCount();
         $data = array(
         'notification' => $output,
         'unseen_notification' => $count
         );
         echo json_encode($data);
}