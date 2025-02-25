<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Персональная страница");

use Bitrix\Main\UserTable;

$userData = UserTable::getList(array(
   'filter' => array('=ID' => $USER->GetID()),
   'select' => array('ID', 'LOGIN', 'NAME', 'LAST_NAME'),
))->fetch();


$fullName = $userData['NAME'].' '.$userData['LAST_NAME'];

?>

<div style="tex-align: center; margin-top: 30px;">
<h1>Добро пожаловать в личный кабинет, <? echo $fullName; ?></h1>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>