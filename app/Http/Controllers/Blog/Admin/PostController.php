<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Acme\BlogCategoryAcme;
use App\Acme\BlogPostAcme;
use App\Http\Requests\BlogPostUpdateRequest;
use Illuminate\Http\Request;

class PostController extends AdminBaseController
{
    private $blogPostAcme;
    private $blogCategoryAcme;

    public function __construct()
    {
        parent::__construct();
        $this->blogPostAcme = app(BlogPostAcme::class);
        $this->blogCategoryAcme = app(BlogCategoryAcme::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->blogPostAcme->getAllWithPaginate(25);

        return view('blog.admin.posts.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(__METHOD__);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd(__METHOD__);
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
        $item = $this->blogPostAcme->getEdit($id);
        if (empty($item)) {
            abort(404);
        }
        $category_list = $this->blogCategoryAcme->getForComboBox();
        return view('blog.admin.posts.edit', compact('item', 'category_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {
        $item = $this->blogPostAcme->getEdit($id);

        if (is_null($item)) {
            return back()->withErrors(['msg' => "Запись {$id} не найдена"])
                ->withInput();
        }
        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()->route('blog.admin.posts.edit', $item->id)
                ->with('success', 'Успешно сохранено');
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
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
