<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Acme\BlogCategoryAcme;
use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use Illuminate\Support\Str;

class CategoryController extends AdminBaseController
{
    private $blogCategoryAcme;

    public function __construct()
    {
        parent::__construct();

        $this->blogCategoryAcme = app(BlogCategoryAcme::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->blogCategoryAcme->getAllWithPaginate(5);
        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogCategory();
        $category_list = $this->blogCategoryAcme->getForComboBox();


        return view('blog.admin.categories.create', compact('item', 'category_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $data = $request->all();
        if (is_null($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }
        $item = new BlogCategory($data);
        $item->save();

        if ($item) {
            return redirect()->route('blog.admin.categories.create')->with('success', 'Успешно сохраненою');
        } else {
            return back()->withInput()->withErrors(['msg' => 'Ошибка сохранения']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->blogCategoryAcme->getEdit($id);
        if (empty($item)) {
            abort(404);
        }
        $category_list = $this->blogCategoryAcme->getForComboBox();

        return view('blog.admin.categories.edit', compact('item', 'category_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {

        $item = BlogCategory::find($id);

        if (empty($item)) {
            return back()->withErrors(['msg' => "Запись  id=$id не найдена"])->withInput();
        }

        $data = $request->all();

        if (is_null($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $result = $item->fill($data)->save();

        if ($result) {
            return redirect()->route('blog.admin.categories.edit', $item->id)->with('success', 'Категория успешно обновлена');
        } else {
            return back()->withErrors(['msg' => 'Ошибка обновления'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__);

    }
}
