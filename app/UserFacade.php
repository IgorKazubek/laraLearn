<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 11.02.2018
 * Time: 20:41
 */
namespace App;
use Illuminate\Support\Facades\Facade;

class UserFacade extends Facade {

    protected static function getFacadeAccessor() { return '\App\User'; }

}