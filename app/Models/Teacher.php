<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'institute_name',
    ];

    public static function teacherUpdateOrCreate($request, $id = null){
        $teacher = Teacher::updateOrCreate(['id'=>$id], [
        'name' => $request->name,
        'title' => $request->title,
        'institute_name' => $request->institute_name,
        ]);
        return $teacher;
    }

    











}
