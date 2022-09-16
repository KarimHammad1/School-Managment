<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreGrades;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Grades = Grade::all();
        return view('pages.Grades.Grades',compact('Grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGrades $request)
    {


        try{

            $validated = $request->validated();
            Grade::create([
                'Name'=>[
                    'en'=>$request->Name_en,
                    'ar'=>$request->Name,
                ],
                'Notes'=>$request->Notes
            ]);
            toastr()->success('messages.success');
            return redirect()->route('grades.index.blade.php');

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(StoreGrades $request, $id)
    {
        try{
            $validated = $request->validated();
            $Grades = Grade::findOrFail($request->id);
            $Grades->update([
                'Name'=>[
                    'en'=>$request->Name_en,
                    'ar'=>$request->Name,
                ],
                'Notes'=>$request->Notes
            ]);
            toastr()->success('messages.Update');
            return redirect()->route('grades.index.blade.php');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        $MyClass_id = Classroom::where('Grade_id',$request->id)->pluck('Grade_id');

        if($MyClass_id->count() == 0){

            $Grades = Grade::findOrFail($request->id)->delete();
            toastr()->error(trans('messages.Delete'));
            return redirect()->route('grades.index.blade.php');
        }

        else{

            toastr()->error(trans('Grades_trans.delete_Grade_Error'));
            return redirect()->route('grades.index.blade.php');

        }
    }
}
