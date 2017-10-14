<?php
namespace Charis\Repositories\Album;


/**
 * Interface AlbumRepository
 * @package Charis\Repositories\Album
 */
interface IAlbumRepository
{
    public function findById($id);
    public function all();
}