<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function category()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function form_category()
    {
        return view('admin.form_add_cat');
    }
    public function add_category(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:100|unique:categories,category_name',
        ],
        [
            'required' => "Данное поле должно быть заполнено",
            'max' => "Максимальное количество для имени категории 100 символов",
            'unique' => "Такое имя категории уже существует"
        ]);
        Category::create([
            'category_name' => $request->category_name
        ]);
        return redirect()->route('admin.categories')->with('success', 'Категория успешно добавлена!');
    }
    public function delete_category($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Категория успешно удалена!');
    }
    public function edit_category($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.form_edit_cat', compact('category'));
    }

    public function update_category(Request $request, $id)
    {
        $request->validate([
            'category_name' => ['required','string','max:100','min:5', 'regex:/^[а-яёА-ЯЁ\s]+$/u', 'unique:categories,category_name,' . $id]
        ],
        [
            'required' => "Данное поле должно быть заполнено",
            'max' => "Максимальное количество для имени категории 100 символов",
            'unique' => "Такое имя категории уже существует",
            'regex' => "Имя категории не соотвествует шаблону. Доступно: кирилица, пробелы"
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'category_name' => $request->category_name
        ]);

        return redirect()->route('admin.categories')->with('success', 'Категория успешно обновлена!');
    }
}
