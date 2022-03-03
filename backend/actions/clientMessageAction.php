<?php
require('../actions/database.php');
require "../../PHPMailer/PHPMailerAutoload.php";
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $getId = $_GET['id'];
    $selectMessage = $bdd->prepare("SELECT * FROM notifications WHERE id_notif = ?");
    $selectMessage->execute(array($getId));
    if ($selectMessage->rowCount() > 0) {
        $verification = $selectMessage->fetch();
        $fullName = $verification['nom_client'];
        $email = $verification['email_client'];
        if (isset($_POST['button'])) {
            $errors = array();
            $message = $_POST['message'];
            $sujet = $_POST['sujet'];
            $file = $_FILES['fichier']['name'];
            $gmtTimezone =date('H') - 1;
            $date_message = date('d-m-Y, '.$gmtTimezone.':i:s');
            if (!empty($file)) {
                if ($_FILES['fichier']['size'] <= 3000000) {
                    $extensions = array('.jpg', '.png', '.gif', '.jpeg', '.pdf', '.txt', '.doc');
                    $extension = strrchr($_FILES['fichier']['name'], '.');
                    if (!in_array($extension, $extensions)) {
                        $errors['fichier'] = "L'extension du fichier refusé !";
                }else {
                    $errors['fichier'] = "La taille du fichier ne doit pas dépasser 3Mo";
                }
            }
            if (empty($message)) {
                $errors['message'] = "Le champ ne doit pas être vide !";
            }
            if (empty($sujet)) {
                $errors['sujet'] = "Veuillez préciser un sujet ou objet de votre message ";
            }
            if (empty($errors)) {
                // echo $date_message;
                $insertSend = $bdd->prepare("INSERT INTO messages_envoyes(photo_auteur, nom_auteur, email_auteur, sujet, contenu, nom_client, email_client, date_envoie) VALUES
                (?, ?, ?, ?, ?, ?, ?, ?)");
                
                $insertSend->execute(array($_SESSION['photo'],
                                        $_SESSION['nom'],
                                        $_SESSION['email'],
                                        $sujet,
                                        $message,
                                        $fullName,
                                        $email,
                                        $date_message));
                function smtpmailer($to, $from, $from_name, $subject, $body)
                {
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPAuth = true; 
                                    
                    $mail->SMTPSecure = 'ssl'; 
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 465;  
                    $mail->Username = 'skabaisidk@groupeisi.com';
                    $mail->Password = 'Sorykaba10';   
                                    
                    //   $path = 'reseller.pdf';
                    //   $mail->AddAttachment($path);
                                    
                    $mail->IsHTML(true);
                    $mail->From="skabaisidk@groupeisi.com";
                    $mail->FromName=$from_name;
                    $mail->Sender=$from;
                    $mail->AddReplyTo($from, $from_name);
                    $mail->Subject = $subject;
                    $mail->Body = $body;
                    $mail->AddAddress($to);
                    if(!$mail->Send())
                    {
                        $error ="Please try Later, Error Occured while Processing...";
                        return $error; 
                    }
                    else 
                    {
                        $error = "Thanks You !! Your email is sent.";  
                        return $error;
                    }
                }
                                        
                $to   = $email;
                $from = 'skabaisidk@groupeisi.com';
                $name = 'LOIRE SANOUSS SECURITE';
                $subj = 'Merci de l\'intérêt pour nos services'.$fullName;
                $msg = "Bonjour Mr/Mme ".$fullName."<br/>".$message;                                       
                $error=smtpmailer($to, $from, $name, $subj, $msg);
            }
        }
    }
  }
} 