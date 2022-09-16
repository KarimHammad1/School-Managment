<?php

namespace App\Repository;

interface StudentRepositoryInterface{

    public function Get_student();

    public function Edit_student($id);

    public function Update_Student($request);

    public function Show_Student($id);

    public function Create_Student();

    public function Delete_Student($request);

    public function Get_classrooms($id);

    public function Get_Sections($id);

    public function Store_Student($request);

    public function Upload_attachment($request);

    public function Download_attachment($studentsname,$filename);

    //Delete_attachment
    public function Delete_attachment($request);

}
