<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username']);
        $message = trim($_POST['message']);

        if (empty($username) || empty($message)) {
            die("Ошибка: Логин или сообщение не могут быть пустыми!");
        }

        $prohibitedPatterns = [
            'badWords' => '/\b(блин|черт|фиг|дурак|идиот)\b/ui',
            'insults' => '/\b(тупой|дебил|урод|придурок)\b/ui',
            'violence' => '/\b(убить|взорвать|напасть|террор)\b/ui',
            'spam' => '/\b(скидка|покупай|http:\/\/|https:\/\/)\b/ui'
        ];

        $sentences = preg_split('/(?<=[.!?])\s+/', $message);

        $filteredSentences = [];
        foreach ($sentences as $sentence) {
            $isProhibited = false;

            foreach ($prohibitedPatterns as $pattern) {
                if (preg_match($pattern, $sentence)) {
                    $isProhibited = true;
                    break;
                }
            }

            if (!$isProhibited) {
                $filteredSentences[] = $sentence;
            }
        }

        $filteredContent = implode(' ', $filteredSentences);

        $fileName = $username . '_' . date('Y-m-d_H-i-s') . '.txt';

        file_put_contents($fileName, $filteredContent);

        echo "<h1>Результат модерации</h1>";
        echo "<p><b>Отфильтрованный текст:</b></p>";
        echo "<pre>$filteredContent</pre>";
        echo "<p>Текст сохранен в файл: <b>$fileName</b></p>";
        echo '<br><a href="index.php">Назад</a>';
    }
    else {
        die("Ошибка: Неверный метод запроса.");
    }
?>
