<?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/23/19
 * Time: 1:14 PM
 */

$id_user = Auth::id();
$userGroup = \App\global_user_group::where('id_user','=',$id_user)
    ->join('user_groups','global_user_group.id_userGroup','=','user_groups.id_userGroup')
    ->orderby('priorityLevel')
    ->first();
echo $userGroup->groupName;

?>