<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SchoolGrade;
use App\Student;

class GradeController extends Controller
{
    public function topView()
    {
        return view('student/view');
    }
    //学生詳細表示
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    //成績登録処理
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'grade' => 'required|string|max:10',
            'term' => 'required|string|max:10',
            'japanese' => 'nullable|integer|min:0|max:100',
            'math' => 'nullable|integer|min:0|max:100',
            'science' => 'nullable|integer|min:0|max:100',
            'social_studies' => 'nullable|integer|min:0|max:100',
            'music' => 'nullable|integer|min:0|max:100',
            'home_economics' => 'nullable|integer|min:0|max:100',
            'english' => 'nullable|integer|min:0|max:100',
            'art' => 'nullable|integer|min:0|max:100',
            'health_and_physical_education' => 'nullable|integer|min:0|max:100',
        ]);

        SchoolGrade::create($validated);

        return redirect()->route('top5', ['id' => $request->student_id])
                         ->with('success', '成績を登録しました');
    }

    //成績更新処理
    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:school_grades,id',
            'grade' => 'required|string|max:10',
            'term' => 'required|string|max:10',
            'japanese' => 'nullable|integer|min:0|max:100',
            'math' => 'nullable|integer|min:0|max:100',
            'science' => 'nullable|integer|min:0|max:100',
            'social_studies' => 'nullable|integer|min:0|max:100',
            'music' => 'nullable|integer|min:0|max:100',
            'home_economics' => 'nullable|integer|min:0|max:100',
            'english' => 'nullable|integer|min:0|max:100',
            'art' => 'nullable|integer|min:0|max:100',
            'health_and_physical_education' => 'nullable|integer|min:0|max:100',
        ]);

        $school_grade = SchoolGrade::findOrFail($validated['id']);
        $school_grade->update($validated);

        return redirect()->route('top5', ['id' => $school_grade->student_id])
                         ->with('success', '成績情報を更新しました。');
    }

    //成績編集画面
    public function top8($id)
    {
        $school_grade = SchoolGrade::where('student_id', $id)->first();

        if (!$school_grade) {
            return redirect()->route('top5', ['id' => $id])
                             ->with('error', '成績データが見つかりません。');
        }

        return view('grades.edit', compact('school_grade'));
    }
}