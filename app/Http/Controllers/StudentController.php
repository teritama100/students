<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student; // ← これがないとエラーになる！

class StudentController extends Controller //
{
    public function top2()
    {
        $students = Student::all();
        return view('view/Students/view', compact('students'));
    }
    public function top4()
    {
        $students = Student::all();
        return view('Student/create', compact('students'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'img_path' => 'nullable|image',
            'comment' => 'nullable|string|max:500',
        ]);
        $student = new Student();
        $student->name = $request->name;
        $student->grade = $request->grade;
        $student->address = $request->address;
        $student->comment = $request->comment;

        if ($request->hasFile('img_path')) {
            $path = $request->file('img_path')->store('photos', 'public');
            $student->img_path = $path;
        }

        $student->save();

        return redirect('/top2')->with('success', '学生登録が完了しました');
    

{
    $validated = $request->validate([
        'student_id' => 'required|exists:students,id',
        'school_year' => 'required|string|max:10',
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

    \App\SchoolGrade::create($validated);

    return redirect()->route('top5', ['id' => $request->student_id])
        ->with('success', '成績を登録しました');
}

        $data = $request->all();

        // 顔写真のアップロード処理
        if ($request->hasFile('img_path')) {
            $data['img_path'] = $request->file('img_path')->store('photos', 'public');
        }

        Student::create($data);

        return redirect('/top2')->with('success', '学生情報を登録しました。');
    }
    

    public function index(Request $request)
{
    $query = \App\Student::query();

    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->filled('grade')) {
        $query->where('grade', $request->grade);
    }

    $students = $query->get();

    return view('students.index', compact('students'));
}
public function top3(Request $request)
{
    $query = \App\Student::query();

    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->filled('grade')) {
        $query->where('grade', $request->grade);
    }

    $students = $query->get();

    return view('students.view', compact('students'));
}
public function show($id)
{
    $student = Student::findOrFail($id);
    return view('student.view', compact('student')); // ← 正しく変数名を揃える！
}
public function top5($id)
{
    $students = Student::findOrFail($id); // ← students に1人だけ入れる
    $school_grades = \App\SchoolGrade::where('student_id', $id)->get();

    return view('student.view', compact('students', 'school_grades')); // students のまま渡す
}
public function top6($id)
{
    $students = Student::findOrFail($id); // 変数名だけ合わせる
    $school_grades = \App\SchoolGrade::where('student_id', $id)->get();

    return view('student.update', compact('students', 'school_grades'));
}
public function top8($id)
{
    $student = \App\Student::findOrFail($id);
    $school_grades = \App\SchoolGrade::where('student_id', $id)->get();

    return view('grades.edit', compact('student', 'school_grades'));
}

public function topView(Request $request)
{
    $query = \App\Student::query();

    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->filled('grade')) {
        $query->where('grade', $request->grade);
    }

    $students = $query->get();
    return view('views.students.view', compact('students'));
}

    public function view(Request $request)
        // バリデーション
        {
        $validated = $request->validate([
            // 学生情報
            'grade' => 'nullable|string|max:10',
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'img_path' => 'nullable|image|max:2048',
            'comment' => 'nullable|string|max:500',
    
            // 成績情報
            'school_year' => 'required|string|max:10',
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
    
        // 顔写真アップロード処理
        if ($request->hasFile('img_path')) {
            $validated['img_path'] = $request->file('img_path')->store('photos', 'public');
        }
    
        // ① 学生情報を保存
        $student = \App\Student::create([
            'grade' => $validated['grade'] ?? null,
            'name' => $validated['name'],
            'address' => $validated['address'] ?? null,
            'img_path' => $validated['img_path'] ?? null,
            'comment' => $validated['comment'] ?? null,
        ]);
    
        // ② 成績情報を保存（student_idで関連付け）
        \App\SchoolGrade::create([
            'student_id' => $student->id,
            'grade' => $validated['grade'] ?? null,
            'term' => $validated['term'],
            'japanese' => $validated['japanese'] ?? null,
            'math' => $validated['math'] ?? null,
            'science' => $validated['science'] ?? null,
            'social_studies' => $validated['social_studies'] ?? null,
            'music' => $validated['music'] ?? null,
            'home_economics' => $validated['home_economics'] ?? null,
            'english' => $validated['english'] ?? null,
            'art' => $validated['art'] ?? null,
            'health_and_physical_education' => $validated['health_and_physical_education'] ?? null,
        ]);
    
        return redirect('/top3')->with('success', '学生情報と成績を登録しました');
    }
    public function createWithGrade($grade)
{
    return view('students.create', compact('grade'));
    return view('students.view', compact('student'));
}
public function createGrade($id)
{
    $student = \App\Student::findOrFail($id);
    $school_grade = new \App\SchoolGrade(); // 空の成績データ

    return view('grades.create', compact('student', 'school_grade'));
}
public function update(Request $request)
{
    $student = Student::findOrFail($request->id);

    $student->grade = $request->grade;
    $student->name = $request->name;
    $student->address = $request->address;
    $student->comment = $request->comment;

    if ($request->hasFile('img_path')) {
        $student->img_path = $request->file('img_path')->store('photos', 'public');
    }

    $student->save();

    return redirect()->route('top5', ['id' => $student->id])->with('success', '学生情報を更新しました。');
}
public function ajaxSearch(Request $request)
{
    $query = \App\Student::query();

    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->filled('grade')) {
        $query->where('grade', $request->grade);
    }

    $sortOrder = $request->get('sort', 'asc');
    $query->orderBy('grade', $sortOrder);

    $students = $query->get();

    // 一覧表示なのでJSONでデータだけ返す
    return response()->json($students);
}
public function ajaxSearchDetail(Request $request)
{
    $name = $request->input('name');

    $student = \App\Student::where('name', 'like', "%{$name}%")->first();

    if (!$student) {
        return response()->json(['html' => ['<p>該当する学生が見つかりません</p>']]);
    }

    $grades = \App\SchoolGrade::where('student_id', $student->id)->get();

$html = view('partials.student_detail', [
    'student' => $student, // ← 正しく student をキーにする
    'school_grades' => $grades
])->render();

    return response()->json(['html' => [$html]]);
}
public function destroy($id)
{
    $student = Student::findOrFail($id);

    // 顔写真がある場合、削除
    if ($student->img_path && \Storage::exists('public/' . $student->img_path)) {
        \Storage::delete('public/' . $student->img_path);
    }

    // 関連する成績も削除（リレーションある場合）
    $student->grades()->delete(); // ← リレーション名に合わせて変更

    $student->delete();

    return redirect('/top3')->with('success', '学生を削除しました');
}

// StudentController.php に追加
public function updateGrade(Request $request)
{
    // 学年を一括で更新する処理（例: grade が数値のときに +1）
    $students = \App\Student::all();

    foreach ($students as $student) {
        if (is_numeric($student->grade)) {
            $student->grade = (int)$student->grade + 1;
            $student->save();
        }
    }

    return redirect('/top2')->with('success', '全学生の学年を更新しました。');
}
}