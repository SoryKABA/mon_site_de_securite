<?php
require('../actions/database.php');
require "../../PHPMailer/PHPMailerAutoload.php";
function securite($donnee)
{
    $donnees = htmlspecialchars($donnee);
    $donnees = html_entity_decode($donnee);
    $donnees = trim($donnee);
    return $donnees;
}
$errors = [];
if (isset($_POST['submit_ins'])) {
   $nom_complet = securite($_POST['nom_complet']);
   $email = securite($_POST['email']);
   $telephone = $_POST['telephone'];
   $image = $_FILES['image']['name'];
   $password = $_POST['password'];
   $confirmation = $_POST['confirmation'];
   $dossier = '../actions/profil_users/';
   if (!empty($image)) {
       if ($_FILES['image']['size'] <= 3000000) {
           $extensions = array('.jpg', '.png', '.gif', '.jpeg');
           $extension = strrchr($_FILES['image']['name'], '.');

           if (in_array($extension, $extensions)) {
               move_uploaded_file($_FILES['image']['tmp_name'], $dossier.basename($image));
           }else {
               $errors['image'] = "Extension non acceptée par le système ! <br/>
               Les extensions autorisées sont les suivantes : jpg, png, gif, jpeg";
           }
       }else {
           $errors['image'] = "La taille du fichier ne doit pas dépasser 3Mo";
       }
   }
   if (empty($nom_complet)) {
       $errors['nom_complet'] = "Le champ nom complet ne doit pas être vide ";
   }
   if (empty($email)) {
       $errors['email'] = "Le champ email ne doit pas être vide ";
   }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $errors['email'] = "Veuillez mettre une bonne adresse mail";
   }
   if (empty($telephone)) {
      $errors['telephone'] = "Le numéro de téléphone est requis ";
   }
   if (empty($password)) {
       $errors['password'] = "Le champ de mot de passe ne doit pas être vide ";
   }elseif (strlen($password) < 8) {
       $errors['password'] = "Le mot de passe ne doit pas être inférieur à 8 caractères";
   }
   if (empty($confirmation)) {
      $errors['confirmation'] = "Vous devez confirmer le mot de passe "; 
   }elseif ($confirmation !== $password) {
       $errors['confirmation'] = "Les deux mots de passe ne correspondent pas !";
   }

   if (empty($errors)) {
       $keys = rand(1000, 10000);

       $select = $bdd->prepare("SELECT email FROM users WHERE email = ?");
       $select->execute(array($email));
       if ($select->rowCount() == 0) {
          $insertUser = $bdd->prepare("INSERT INTO users(fullName, email, phone, picture_user, password, cles) VALUES(?, ?, ?, ?, ?, ?)"); 
          $verify = $insertUser->execute(array(
                                     $nom_complet, 
                                     $email,
                                     $telephone, 
                                     $image,
                                     password_hash($password, PASSWORD_DEFAULT),
                                     $keys));
          if ($verify) {
              $success = "Un message de confirmation d'inscription a été envoyé sur email rentré !";
          }
       $selectUser = $bdd->prepare("SELECT * FROM users WHERE email = ?");
       $selectUser->execute(array($email));
       if ($selectUser->rowCount() > 0) {
           $infoVerify = $selectUser->fetch();

           $_SESSION['id'] = $infoVerify['id_user'];
           $_SESSION['nom'] = $infoVerify['fullName'];
           $_SESSION['email'] = $infoVerify['email'];
           $_SESSION['phone'] = $infoVerify['phone'];
           $_SESSION['photo'] = $infoVerify['picture_user'];
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
       $name = 'Sory KABA';
       $subj = 'Email de validation de compte';
       $msg = "Veuillez cliquez sur ce <a href='http://localhost/site_securite/backend/actions/validation.php?id=".$_SESSION['id']."&cles=".$keys."'>lien de confirmation</a> pour valider votre inscription";
                            
       $error=smtpmailer($to, $from, $name, $subj, $msg);
      }
    }else {
        $echec = "Ce compte existe déjà !";
    }
   }
}