<?php

class telegraphText {
    public $title;
    public $text;
    public $author;
    public $published;
    public $slug;

    public function  __construct($authorName, $fileName, $fileTime) {
        $this->author = $authorName;
        $this->slug = $fileName;
        $this->published = $fileTime;
    }

    public function storeText() {
        $recordText = [
            'text' => $this->text,
            'title' => $this->title,
            'author' => $this->author,
            'published' => $this->published
        ];
        if (file_exists($this->slug)) {
            echo 'Файл существует' . PHP_EOL;
            file_put_contents($this->slug, serialize($recordText));
        } else {
            echo 'Файл не найден' . PHP_EOL;
        }
    }

    public function loadText() {
        if (file_exists($this->slug)) {
            echo 'Файл существует' . PHP_EOL;
            $this->text = serialize(file_get_contents($this->slug));
        } else {
            echo 'Файл не найден' . PHP_EOL;
        }
    }

    public function editText(string $title, string $text) {
        $this->title = $title;
        $this->text = $text;
    }
}

$textResult = new telegraphText('Вася', 'C:\Users\wtb24\OneDrive\Рабочий стол\projects/readme.txt', '14:22');
$textResult->editText('Название', 'Поэма');
$textResult->storeText();
$textResult->loadText();
echo $textResult->text . PHP_EOL;


