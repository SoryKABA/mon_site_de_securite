<?php
require('connect.php');

if(isset($_POST['view'])){
    if($_POST["view"] != ''){
     $update_query = $bdd->prepare("UPDATE comment SET poste_statut = ? WHERE poste_statut = ?");
    $update_query->execute(array(1, 0));
    }
    $query = $bdd->prepare("SELECT *
     FROM comment
     ORDER BY id DESC
     LIMIT 5");
     $result = $query->execute;
     $output = '';
 
 
     if($result->RowCount() > 0){
        while($row = $result->fetch()){
         $output .= '
            <li>
                <a href="#">
                    <strong>'.$row["sujet"].'</strong><br />
                    <small><em>'.$row["poste"].'</em></small>
                </a>
            </li>
            ';
         }
         }else{
         $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
         }
 
 
         $status_query = $bdd->prepare("SELECT *
         FROM comment
         WHERE poste_statut = ?");
         $result_query = $status_query->executre(array(0));
        $count = $result_query->RowCount();
         $data = array(
         'notification' => $output,
         'unseen_notification' => $count
         );
         echo json_encode($data);
}