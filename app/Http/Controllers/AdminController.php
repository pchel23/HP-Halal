<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Point;

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

    public function point()
    {
        $points = Point::all();
        return view('admin.points', compact('points'));
    }

    public function form_point()
    {
        return view('admin.form_add_point');
    }

    public function add_point(Request $request)
    {
        $validated = $request->validate([
            'point_address' => 'required|string|max:700|unique:points,address',
            'admin_phone'   => [
                'required',
                'string',
                'regex:/^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/',
                'unique:points,phone_admin',
            ],
        ], [
            'point_address.required' => 'Данное поле должно быть заполнено',
            'point_address.max'      => 'Максимальная длина адреса — 700 символов',
            'point_address.unique'   => 'Такой адрес точки уже занят',
            'admin_phone.required'   => 'Введите номер телефона администратора',
            'admin_phone.regex'      => 'Номер телефона должен быть в формате +7 (999) 123-45-67',
            'admin_phone.unique'     => 'Этот номер телефона уже привязан к другой точке',
        ]);

        Point::create([
            'address'     => $validated['point_address'],
            'phone_admin' => $validated['admin_phone'],
        ]);

        return redirect()->route('admin.points')->with('success', 'Точка успешно добавлена!');
    }

    public function delete_point($id)
    {
        $point = Point::findOrFail($id);
        $point->delete();
        return redirect()->route('admin.points')->with('success', 'Точка успешно удалена!');
    }

    public function edit_point($id)
    {
        $point = Point::findOrFail($id);
        return view('admin.form_edit_point', compact('point'));
    }

    public function update_point(Request $request, $id)
    {
        $point = Point::findOrFail($id);

        $validated = $request->validate([
            'point_address' => 'required|string|max:700|unique:points,address,' . $point->id,
            'admin_phone'   => [
                'required',
                'string',
                'regex:/^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/',
                'unique:points,phone_admin,' . $point->id,
            ],
        ], [
            'point_address.required' => 'Данное поле должно быть заполнено',
            'point_address.max'      => 'Максимальная длина адреса — 700 символов',
            'point_address.unique'   => 'Такой адрес точки уже занят',
            'admin_phone.required'   => 'Введите номер телефона администратора',
            'admin_phone.regex'      => 'Номер телефона должен быть в формате +7 (999) 123-45-67',
            'admin_phone.unique'     => 'Этот номер телефона уже привязан к другой точке',
        ]);

        $point->update([
            'address'     => $validated['point_address'],
            'phone_admin' => $validated['admin_phone'],
        ]);

        return redirect()->route('admin.points')->with('success', 'Точка успешно обновлена!');
    }
}
