<?php
require "../PHPMailer/PHPMailerAutoload.php";
function securite($donnee)
{
    $donnees = htmlspecialchars($donnee);
    $donnees = html_entity_decode($donnee);
    $donnees = trim($donnee);
    return $donnees;
}
if (isset($_POST['valide'])) {
    $sujet = securite($_POST['sujet']);
    $nom_complet = securite($_POST['nom_complet']);
    $email = $_POST['email'];
    $adresse = securite($_POST['adresse']);
    $telephone = $_POST['telephone'];
    $selectionne = $_POST['selectionne'];
    $message = securite($_POST['message']);

    $errors = [];

    if (empty($sujet) || !preg_match("/^[a-zA-Z0-9_éèêëàâäîïùç'\ ]+$/", $sujet)) {
        $errors['sujet'] = "Le champ sujet ne doit pas être, si c'est pas le cas, 
        veuillez vérifier que vous n'avez pas mis un caractère non accepté par le système";
    }
    if (empty($nom_complet)) {
        $errors['nom_complet'] = "Le champ nom ne doit pas être vide";
    }elseif (!preg_match("/^[a-zA-Z0-9_éèêëàâäîïùç'\ ]+$/", $nom_complet)) {
        $errors['nom_complet'] = "Le champ contient des caractères que le système n'accèpte pas";
    }
    if (empty($email)) {
        $errors['email'] = "Le champ email ne doit pas être vide ";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Adresse mail non valide ";
    }
    if (empty($telephone)) {
        $errors['telephone'] = "Le champ numéro de téléphone ne doit pas être vide ";
    }elseif (!preg_match("/^[0-9]+$/", $telephone)) {
        $errors['telephone'] = "Aucun caractère n'est accepté dans le numéro de téléphone";
    }
    if (empty($selectionne) || $selectionne == "Veuillez selectionner un besoin") {
        $errors['selectionne'] = "Le champ Vos besoins ne doit pas être vide, vous devez selectionner un besoin";
    }if (empty($message) || !preg_match("/^[a-zA-Z0-9_éèêëàâäîïùç'\ ]+$/", $message)) {
        $errors['message'] = "Le champ message ne doit pas être vide, 
        veuillez écrire quelque chose de compréhensible ";
    }
    //var_dump($errors);
    if (empty($errors)) {
        function smtpmailer($to, $from, $from_name, $subject, $body)
        {
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true; 
                        
            $mail->SMTPSecure = 'ssl'; 
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;  
            $mail->Username = $email;
            $mail->Password = '';   
                        
    //   $path = 'reseller.pdf';
    //   $mail->AddAttachment($path);
                        
            $mail->IsHTML(true);
            $mail->From=$email;
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
                            
        $to   = 'lirzahitro@vusra.com';
        $from = $email;
        $name = $nom_complet;
        $subj = $sujet;
        $msg = $message;
                            
        $error=smtpmailer($to,$from, $name ,$subj, $msg);
    }

}