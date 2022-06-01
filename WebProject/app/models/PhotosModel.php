<?php

namespace app\models;

use app\core\Model;

class PhotosModel extends Model
{
    private array $photos = [
        [
            "path" => '../../public/img/photos/1.jpg',
            "title" => 'Лаванда',
            "alt" => "Альтернативный текст",
            "description" => "Красивая природа"
        ],
        [
            "path" => '../../public/img/photos/2.jpg',
            "title" => 'Под ракетой',
            "alt" => "Альтернативный текст",
            "description" => "Красивая природа"
        ],
        [
            "path" => '../../public/img/photos/3.jpg',
            "title" => 'Природа',
            "alt" => "Альтернативный текст",
            "description" => "Красивая природа"
        ],
        [
            "path" => '../../public/img/photos/4.jpg',
            "title" => 'Ночь',
            "alt" => "Альтернативный текст",
            "description" => "Красивая природа"
        ],
        [
            "path" => '../../public/img/photos/5.png',
            "title" => 'Дракон',
            "alt" => "Альтернативный текст",
            "description" => "Красивая природа"
        ],
        [
            "path" => '../../public/img/photos/6.jpg',
            "title" => 'Зелёная лошадь',
            "alt" => "Альтернативный текст",
            "description" => "Красивая природа"
        ],
        [
            "path" => '../../public/img/photos/7.jpg',
            "title" => 'Ещё один дракон',
            "alt" => "Альтернативный текст",
            "description" => "Красивая природа"
        ],
        [
            "path" => '../../public/img/photos/8.jpg',
            "title" => 'Лавовый дракон',
            "alt" => "Альтернативный текст",
            "description" => "Красивая природа"
        ],
        [
            "path" => '../../public/img/photos/9.jpg',
            "title" => 'Некрополь',
            "alt" => "Альтернативный текст",
            "description" => "Красивая природа"
        ],
        [
            "path" => '../../public/img/photos/10.jpg',
            "title" => 'Красивое дерево',
            "alt" => "Альтернативный текст",
            "description" => "Красивая природа"
        ],
        [
            "path" => '../../public/img/photos/11.jpg',
            "title" => 'Волна',
            "alt" => "Альтернативный текст",
            "description" => "Красивая природа"
        ],
        [
            "path" => '../../public/img/photos/12.jpg',
            "title" => 'Цветы',
            "alt" => "Альтернативный текст",
            "description" => "Красивая природа"
        ],
        [
            "path" => '../../public/img/photos/13.jpg',
            "title" => 'Зима',
            "alt" => "Альтернативный текст",
            "description" => "Красивая природа"
        ],
        [
            "path" => '../../public/img/photos/14.jpg',
            "title" => 'Город',
            "alt" => "Альтернативный текст",
            "description" => "Красивая природа"
        ],
        [
            "path" => '../../public/img/photos/15.jpg',
            "title" => 'Озеро',
            "alt" => "Альтернативный текст",
            "description" => "Красивая природа"
        ],
        [
            "path" => '../../public/img/photos/16.jpg',
            "title" => 'Приозёрное шоссе',
            "alt" => "Альтернативный текст",
            "description" => "Красивая природа"
        ]
    ];

    public function getPhoto(): array
    {
        return $this->photos;
    }
}