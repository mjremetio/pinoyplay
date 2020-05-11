<?php 

echo $account->getError(Constants::$firstNameCharacters).'<br>'; 
echo $account->getError(Constants::$lastNameCharacters).'<br>';
echo $account->getError(Constants::$emailsDoNotMatch).'<br>'; 
echo $account->getError(Constants::$emailInvalid).'<br>'; 
echo $account->getError(Constants::$emailTaken).'<br>'; 
echo $account->getError(Constants::$passwordsDoNoMatch).'<br>';
echo $account->getError(Constants::$passwordNotAlphanumeric).'<br>';
echo $account->getError(Constants::$passwordCharacters).'<br>'; 

?>