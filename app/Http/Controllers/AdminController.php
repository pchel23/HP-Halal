<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\Addon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Point;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function addons()
    {
        $addons = DB::table('addons')
            ->join('categories', 'addons.category_id', '=', 'categories.id')
            ->select('addons.*', 'categories.category_name')
            ->get();
        return view('admin.addons', compact('addons'));
    }

    public function form_addon()
    {
        $categories = Category::all();
        return view('admin.form_add_addon', compact('categories'));
    }

    public function add_addon(Request $request)
    {
        $request->validate([
            'name_addon' => [
                'required',
                'string',
                'max:100',
                'min:3',
                'unique:addons,name_addon',
                'regex:/^[а-яёА-ЯЁ\s]+$/u'],
            'category_id' => [
                'required'
            ]
        ],
        [
            'required' => "Данное поле должно быть заполнено",
            'max' => "Максимальное количество символов для имени дополнения 100 символов",
            'min' => "Минимальное количество символов для имени дополнения 3 символов",
            'unique' => "Такое имя дополнения уже существует",
            'regex' => "Поле не соответсвует шаблону: кириллица и пробелы"
        ]);
        Addon::create([
            'name_addon' => $request->name_addon,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('admin.addons')->with('success', 'Дополнение успешно добавлено!');
    }

    public function delete_addon($id)
    {
        $addon = Addon::findOrFail($id);
        $addon->delete();
        return redirect()->route('admin.addons')->with('success', 'Дополнение успешно удалено!');
    }

    public function edit_addon($id)
    {
        $addon = Addon::findOrFail($id);
        $categories = Category::all();
        return view('admin.form_edit_addon', compact('addon', 'categories'));
    }

    public function update_addon(Request $request, $id)
    {
        $request->validate([
            'name_addon' => [
                'required',
                'string',
                'max:100',
                'min:3',
                'regex:/^[а-яёА-ЯЁ\s]+$/u',
                'unique:addons,name_addon,' . $id
            ],
            'category_id' => [
                'required'
            ]
        ],
        [
            'required' => "Данное поле должно быть заполнено",
            'max' => "Максимальное количество для имени категории 100 символов",
            'unique' => "Такое имя категории уже существует",
            'regex' => "Имя категории не соотвествует шаблону. Доступно: кирилица, пробелы"
        ]);

        $addon = Addon::findOrFail($id);
        $addon->update([
            'name_addon' => $request->name_addon,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('admin.addons')->with('success', 'Дополнение успешно обновлено!');
    }

    public function employee()
    {
        $users = DB::table('users')
            ->join('points', 'users.point_id', '=', 'points.id')
            ->where('users.role', '=', 'employee')
            ->select('users.*', 'points.address as point_address')
            ->get();
        return view('admin.employee', compact('users'));
    }

    public function form_employee()
    {
        $points = Point::all();
        return view('admin.form_add_employee', compact('points'));
    }

    public function add_employee(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:250',
                'min:5',
                'regex:/^[а-яёА-ЯЁ\s]+$/u'
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:60',
                'confirmed',
                'regex:/^[0-9a-zA-Z\.\,\?\!\~\@\&\*\;\:]+$/'
            ],
            'point_id' => [
                'required'
            ]
        ],
        [
            'required' => "Данное поле должно быть заполнено",
            'name.max' => "Максимальное количество символов для имени 250 символов",
            'name.min' => "Минимальное количество символов для имени 5 символов",
            'name.regex' => "Поле не соответсвует шаблону: кириллица и пробелы",
            'email.email' => "Поле должно хранить электронную почту",
            'email.unique' => "Такая электронная почта уже занята",
            'password.max' => "Максимальное количество символов для пароля 60 символов",
            'password.min' => "Минимальное количество символов для пароля 8 символов",
            'password.confirmed' => "Пароли не совпадают",
            'password.regex' => "Поле не соответсвует шаблону: латинские буквы, числа и символы (.,?!:;~@&*)"
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'point_id' => $request->point_id,
            'status_id' => 1,
            'role' => Role::EMPLOYEE->value
        ]);
        return redirect()->route('admin.employee')->with('success', 'Сотрудник успешно добавлен!');
    }

    public function edit_employee($id)
    {
        $employee = User::findOrFail($id);
        $points = Point::all();
        return view('admin.form_edit_employee', compact('employee', 'points'));
    }

    public function update_employee(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:250',
                'min:5',
                'regex:/^[а-яёА-ЯЁ\s]+$/u'
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email,' . $id
            ],
            'password' => [
                'nullable',
                'string',
                'min:8',
                'max:60',
                'confirmed',
                'regex:/^[0-9a-zA-Z\.\,\?\!\~\@\&\*\;\:]+$/'
            ],
            'point_id' => [
                'required'
            ]
        ],
        [
            'required' => "Данное поле должно быть заполнено",
            'name.max' => "Максимальное количество символов для имени 250 символов",
            'name.min' => "Минимальное количество символов для имени 5 символов",
            'name.regex' => "Поле не соответсвует шаблону: кириллица и пробелы",
            'email.email' => "Поле должно хранить электронную почту",
            'email.unique' => "Такая электронная почта уже занята",
            'password.max' => "Максимальное количество символов для пароля 60 символов",
            'password.min' => "Минимальное количество символов для пароля 8 символов",
            'password.confirmed' => "Пароли не совпадают",
            'password.regex' => "Поле не соответсвует шаблону: латинские буквы, числа и символы (.,?!:;~@&*)"
        ]);

        $employee = User::findOrFail($id);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'point_id' => $request->point_id,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $employee->update($data);

        return redirect()->route('admin.employee')->with('success', 'Сотрудник успешно обновлен!');
    }

    public function delete_employee($id)
    {
        $employee = User::findOrFail($id);
        $employee->delete();
        return redirect()->route('admin.employee')->with('success', 'Сотрудник успешно удален!');
    }

}
