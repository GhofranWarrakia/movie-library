<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    // عرض قائمة الأفلام مع ميزات التصفية، الترتيب، والتقسيم إلى صفحات
    public function index(Request $request)
    {
        $query = Movie::query();

        if ($request->has('genre')) {
            $query->where('genre', $request->get('genre'));
        }

        if ($request->has('director')) {
            $query->where('director', $request->get('director'));
        }

        if ($request->has('sort_by')) {
            $query->orderBy('release_year', $request->get('sort_by') == 'desc' ? 'desc' : 'asc');
        }

        if ($request->has('release_year')) {
            $query->where('release_year', $request->get('release_year'));
        }

        $movies = $query->paginate($request->get('per_page', 15));

        return response()->json($movies);
    }

    // إنشاء فيلم جديد
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_year' => 'required|integer|min:1888|max:' . date('Y'),
            'description' => 'nullable|string',
        ]);

        // إنشاء الفيلم
        $movie = Movie::create($validatedData);

        // إرجاع الفيلم المنشأ
        return response()->json($movie, 201);
    }

    // عرض تفاصيل فيلم معين
    public function show($id)
    {
        // إيجاد الفيلم بواسطة ID
        $movie = Movie::findOrFail($id);

        // إرجاع تفاصيل الفيلم
        return response()->json($movie);
    }

    // تحديث فيلم معين
    public function update(Request $request, $id)
    {
        // إيجاد الفيلم بواسطة ID
        $movie = Movie::findOrFail($id);

        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'director' => 'sometimes|required|string|max:255',
            'genre' => 'sometimes|required|string|max:255',
            'release_year' => 'sometimes|required|integer|min:1888|max:' . date('Y'),
            'description' => 'nullable|string',
        ]);

        // تحديث بيانات الفيلم
        $movie->update($validatedData);

        // إرجاع البيانات المحدثة
        return response()->json($movie);
    }

    // حذف فيلم معين
    public function destroy($id)
    {
        // إيجاد الفيلم بواسطة ID
        $movie = Movie::findOrFail($id);

        // حذف الفيلم
        $movie->delete();

        // إرجاع استجابة نجاح
        return response()->json(null, 204);
    }
}
