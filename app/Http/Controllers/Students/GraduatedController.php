<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\StudentGraduatedRepositoryInterface;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{
    protected $Graduated;
    public function __construct(StudentGraduatedRepositoryInterface $Graduated)
    {
        $this->Graduated = $Graduated;
    }
    public function index()
    {
        return $this->Graduated->index();
    }

    public function create()
    {
        return $this->Graduated->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->Graduated->SoftDelete($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        return $this->Graduated->ReturnData($request);
    }


    public function destroy($id)
    {
        //
    }
}
