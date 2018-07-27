<?php
include_once '../config_base.php';
require_once("Mail.php");


$db = config::getConnexion();
if(isset($_POST['validation'],$_POST['recupEmail'])) 
{
  if(!empty($_POST['recupEmail'])) 
  {
    $mail = htmlspecialchars($_POST['recupEmail']);
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) 
    {
      $mailexist = $db->prepare("SELECT UserId,UserName,UserPass FROM User WHERE  UserMail= '$mail'");
      $mailexist->execute(array ($mail));
      $mailexist_count =  $mailexist->rowCount();
      if ($mailexist_count == 1) 
      {
        $UserName = $mailexist->fetch();
        $UserName = $UserName['UserName'];
        $UserPass = $mailexist->fetch();
        $UserPass = $UserPass['UserPass'];
       
        //$encryptedPwd     = MD5($newPassword);
                //
        
        function random_password( $length = 8 ) 
        {
          $recup_code = "";
          $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
          $recup_code .= substr( str_shuffle( $chars ), 0, $length );
          return $recup_code;
        }
        for ($i=0; $i <= 8 ; $i++)
        { 
          $recup_code = random_password(8);
        }
        $from = "mohamedhedi.benrejeb@esprit.tn";
        $subject = "Recuperation du code";
        $to = $mail;
        $headers = array('From' => $from, 'To' => $mail, 'Subject' => $subject);
        $message = '
         <html>
         <head>
           <title>Recuperation de mot de passe</title>
           <meta charset="utf-8" />
         </head>
         <body>
           <font color="#303030";>
             <div align="center">
               <table width="600px">
                 <tr>
                   <td>
                     
                     <div align="center">Bonjour <b>'.$UserName.'</b>,</div>
                     Voici votre code de recuperation: <b>'.$recup_code.'</b>
                     A bientot !
                     
                   </td>
                 </tr>
                 <tr>
                   <td align="center">
                     <font size="2">
                       Ceci est un email automatique, merci de ne pas y repondre
                     </font>
                   </td>
                 </tr>
               </table>
             </div>
           </font>
         </body>
         </html>
         ';
          $host       =   "127.0.0.1";
          $port       =   1025;
          $username   =   "";
          $password   =   "";
          //$headers = array('From' => $from, 'To' => $to, 'Subject' => $subject);
                  $smtp = Mail::factory('smtp', array ('host' => $host,
                                                       'port' => $port,
                                                       'auth' => false
                                                       ));

                  $mail = $smtp->send($to, $headers, $message);
                  
                  if ( PEAR::isError($mail) ) {
                      echo("<p>Error sending mail:<br/>" . $mail->getMessage() . "</p>");   
                    } 
                    else {
                        $mail             =     $_POST['recupEmail'];
                        $update           =     "UPDATE User SET UserPass='$recup_code' WHERE UserMail='$mail'";
                        $req              =      $db -> prepare($update);
                        $req->execute();             
                      header("location: index.php");
                  }
      }
      else 
      {
        $error = "mail not registred click the link below to subscribe </br><a style='margin: 0 50px;' href='register.php'>Register<a>";
      }
    }
    else
    {
     $error = "Adresse mail invalid click the link below to subscribe </br><a href='register.php'>Register<a>";
    }
  }
  else
  {
    $error = "The field is empty click the link below to subscribe or check the field <a style='margin: 0 50px;' href='register.php'>Register<a>";
  }
}
    /*
      $recupEmail = htmlspecialchars($_POST['recupEmail']);
      if(filter_var($recupEmail,FILTER_VALIDATE_EMAIL)) {
         $mailexist = $db->prepare('SELECT UserId,UserName FROM User WHERE UserMail = ?');
         $mailexist->execute(array($recupEmail));
         $mailexist_count = $mailexist->rowCount();
         if($mailexist_count == 1) {
            $UserName = $mailexist->fetch();
            $UserName = $UserName['UserName'];
            $_SESSION['recupEmail'] = $recupEmail;
            $recup_code = "";
            for($i=0; $i < 8; $i++) { 
               $recup_code .= mt_rand(0,9);
            }
            $mail_recup_exist = $db->prepare('SELECT RecupId FROM recuperation WHERE UserMail = ?');
            $mail_recup_exist->execute(array($recupEmail));
            $mail_recup_exist = $mail_recup_exist->rowCount();
            if($mail_recup_exist == 1) {
               $recup_insert = $db->prepare('UPDATE recuperation SET code = ? WHERE UserMail = ?');
               $recup_insert->execute(array($recup_code,$recupEmail));
            } else {
               $recup_insert = $db->prepare('INSERT INTO recuperation(UserMail,code) VALUES (?, ?)');
               $recup_insert->execute(array($recupEmail,$recup_code));
            }
            $header="MIME-Version: 1.0\r\n";
         $header.='From:"mohameddhedi.benrejeb@esprit.tn'."\n";
         $header.='Content-Type:text/html; charset="utf-8"'."\n";
         $header.='Content-Transfer-Encoding: 8bit';
         $message = '
         <html>
         <head>
           <title>Récupération de mot de passe - PrimFX.com</title>
           <meta charset="utf-8" />
         </head>
         <body>
           <font color="#303030";>
             <div align="center">
               <table width="600px">
                 <tr>
                   <td>
                     
                     <div align="center">Bonjour <b>'.$UserName.'</b>,</div>
                     Voici votre code de récupération: <b>'.$recup_code.'</b>
                     A bientôt sur <a href="http://primfx.com/">PrimFX.com</a> !
                     
                   </td>
                 </tr>
                 <tr>
                   <td align="center">
                     <font size="2">
                       Ceci est un email automatique, merci de ne pas y répondre
                     </font>
                   </td>
                 </tr>
               </table>
             </div>
           </font>
         </body>
         </html>
         ';
      //   mail($recupEmail, "Récupération de mot de passe - PrimFX.com", $message, $header);
            header("Location: index.php");
         } else {
            $error = "Cette adresse mail n'est pas enregistrée";
         }
      } else {
         $error = "Adresse mail invalide";
      }
   } else {
      $error = "Veuillez entrer votre adresse mail";
   }
}
/*
if(isset($_POST['verif_submit'],$_POST['verif_code'])) {
   if(!empty($_POST['verif_code'])) {
      $verif_code = htmlspecialchars($_POST['verif_code']);
      $verif_req = $db->prepare('SELECT id FROM recuperation WHERE mail = ? AND code = ?');
      $verif_req->execute(array($_SESSION['recup_mail'],$verif_code));
      $verif_req = $verif_req->rowCount();
      if($verif_req == 1) {
         $up_req = $db->prepare('UPDATE recuperation SET confirme = 1 WHERE mail = ?');
         $up_req->execute(array($_SESSION['recup_mail']));
         header('Location:http://127.0.0.1/path/recuperation.php?section=changemdp');
      } else {
         $error = "Code invalide";
      }
   } else {
      $error = "Veuillez entrer votre code de confirmation";
   }
}
if(isset($_POST['change_submit'])) {
   if(isset($_POST['change_mdp'],$_POST['change_mdpc'])) {
      $verif_confirme = $db->prepare('SELECT confirme FROM recuperation WHERE mail = ?');
      $verif_confirme->execute(array($_SESSION['recup_mail']));
      $verif_confirme = $verif_confirme->fetch();
      $verif_confirme = $verif_confirme['confirme'];
      if($verif_confirme == 1) {
         $mdp = htmlspecialchars($_POST['change_mdp']);
         $mdpc = htmlspecialchars($_POST['change_mdpc']);
         if(!empty($mdp) AND !empty($mdpc)) {
            if($mdp == $mdpc) {
               $mdp = sha1($mdp);
               $ins_mdp = $db->prepare('UPDATE membres SET motdepasse = ? WHERE mail = ?');
               $ins_mdp->execute(array($mdp,$_SESSION['recup_mail']));
              $del_req = $db->prepare('DELETE FROM recuperation WHERE mail = ?');
              $del_req->execute(array($_SESSION['recup_mail']));
               header('Location:http://127.0.0.1/path/connexion/');
            } else {
               $error = "Vos mots de passes ne correspondent pas";
            }
         } else {
            $error = "Veuillez remplir tous les champs";
         }
      } else {
         $error = "Veuillez valider votre mail grâce au code de vérification qui vous a été envoyé par mail";
      }
   } else {
      $error = "Veuillez remplir tous les champs";
   }
}*/

?>