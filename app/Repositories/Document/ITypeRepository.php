<?php
namespace Charis\Repositories\Document;

/**
 * Interface IDocumentTypeRepository
 * @package Charis\Repositories\Document
 */
interface IDocumentTypeRepository
{
    public function findTypes();
    public function add($name);
    public function findById($id);
    public function removeTypeById($id);
}