<?php

namespace App\Repository;

interface TeacherRepositoryInterface{

    public function getAllTeachers();

    public function Getspecialization();

    public function GetGender();

    public function StoreTeachers($request);

    public function EditTeachers($id);

    public function UpdateTeachers($request);

    public function DeleteTeachers($request);
}
