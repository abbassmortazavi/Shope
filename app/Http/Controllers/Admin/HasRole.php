<?php
/**
 * Created by PhpStorm.
 * User: Seyed
 * Date: 30/09/2018
 * Time: 05:49 PM
 */

namespace App\Http\Controllers\Admin;


use App\Role;

trait HasRole
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        if (is_string($role))
        {
            return $this->roles->contains('name' , $role);
        }

        /*foreach ($role as $r)
        {
            if ($this->hasRole($r->name))
            {
                return true;
            }
            return false;
        }*/

        return !! $role->intersect($this->roles)->count();

    }


}