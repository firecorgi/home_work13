<?php
namespace Service;

use Entity\BaseEntity;
use Entity\Article;
use DataBase\DataBase;
use InterfaceManager\EntityManagerInterface;

class ArticleManager implements EntityManagerInterface
{

    /**
     * @param int $id
     * @return array|null
     */
    public function getById(int $id)
    {
        $database = new DataBase();
        return $database->getById($id);
    }

    /**
     * @param BaseEntity $object
     */
    public function save(BaseEntity $object)
    {
        $id = $object->getId();
        $data['id'] = $id;

        if ($object instanceof Article) {
            $data['title'] = $object->getTitle();
            $data['text'] = $object->getText();
        }

        print_r($object);

        $title = $data['title'];
        $text = $data['text'];

        $database = new DataBase();

        if (empty($this->getById($id))) {
            $database->insertNewArticle($id, $title, $text);
        } else {
            $database->addArticleById($id, $title, $text);
        }
    }
}