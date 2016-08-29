<?php
/*
 * Project: newsletter
 * Purpose: abstract class from which models extend.
 * Author: ThinkPad
 */

interface Crud
{
    public static function getAll();
    public static function findById($id);
    public static function insert($data);
    public static function update($data);
    public static function delete($id);
}
