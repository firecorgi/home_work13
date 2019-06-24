<?php
namespace InterfaceManager;

use Entity\BaseEntity;

interface EntityManagerInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id);

    /**
     * @param BaseEntity $object
     * @return mixed
     */
    public function save(BaseEntity $object);
}