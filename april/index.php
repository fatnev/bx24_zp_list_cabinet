<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Персональная страница");

use Bitrix\Main\Application;
use Bitrix\Main\Loader;

// Подключение модулей "main" и "iblock"
Loader::includeModule("main");
Loader::includeModule("iblock");

// Проверка авторизации пользователя
global $USER;
if ($USER->IsAuthorized()) {

    // Получение логина текущего пользователя
    $userLogin = $USER->GetLogin();

    // Указание пути к папке с файлами
    $path = "/upload/month/april/";
    
    // Получение списка файлов в указанной папке
    $fileList = scandir($_SERVER["DOCUMENT_ROOT"] . $path);

    $fileFound = false;

    // Перебор файлов в папке
    foreach ($fileList as $file) {
        if ($file != '.' && $file != '..' && strpos($file, '.pdf') !== false) {

            // Извлечение имени пользователя из имени файла
            $username = substr($file, 0, strpos($file, '.pdf'));
            
            // Проверка соответствия имени файла логину пользователя
            if ($username == $userLogin) {
                $fileFound = true;

                // Вывод встроенного PDF-файла
                echo "<embed src='$path$file' type='application/pdf' width='100%' height='600px'>";
            }
        }
    }

    // Вывод сообщения, если файл не найден для текущего пользователя
    if (!$fileFound) {
        echo "<h3>Для вас файл не найден!</h3>";
    }
} else {
    echo "Пользователь не авторизован";
}


?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>