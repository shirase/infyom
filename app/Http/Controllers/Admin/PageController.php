<?php

namespace App\Http\Controllers\Admin;

use App\Builders\PageBuilder;
use App\Http\Requests\Admin\CreatePageRequest;
use App\Http\Requests\Admin\UpdatePageRequest;
use App\Models\Page;
use App\Repositories\PageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Kalnoy\Nestedset\NestedSet;
use Response;

class PageController extends AppBaseController
{
    /** @var  PageRepository */
    private $pageRepository;

    public function __construct(PageRepository $pageRepo)
    {
        $this->pageRepository = $pageRepo;
    }

    /**
     * Display a listing of the Page.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pages = $this->pageRepository->allQuery()->where(function($query) use ($request) {
            /** @var PageBuilder $query */
            if ($q = $request->query('q')) {
                $query
                    ->where('title', 'like', '%' . trim($q) . '%')
                    ->orWhere('slug', 'like', '%' . trim($q) . '%')
                ;
            }
        })->orderBy(NestedSet::LFT)->get();

        return view('admin.pages.index')
            ->with('pages', $pages);
    }

    /**
     * Show the form for creating a new Page.
     *
     * @return Response
     */
    public function create()
    {
        /** @var Page $page */
        $page = $this->pageRepository->makeModel();

        $page->status = Page::STATUS_PUBLISH;

        return view('admin.pages.create')->with('page', $page);
    }

    /**
     * Store a newly created Page in storage.
     *
     * @param CreatePageRequest $request
     *
     * @return Response
     */
    public function store(CreatePageRequest $request)
    {
        $input = $request->all();

        $page = $this->pageRepository->create($input);

        Flash::success(__('Успешно сохранено'));

        return redirect(route('admin.pages.index'));
    }

    /**
     * Display the specified Page.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $page = $this->pageRepository->find($id);

        if (empty($page)) {
            Flash::error(__('Не найдено'));

            return redirect(route('admin.pages.index'));
        }

        return view('admin.pages.show')->with('page', $page);
    }

    /**
     * Show the form for editing the specified Page.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $page = $this->pageRepository->find($id);

        if (empty($page)) {
            Flash::error(__('Не найдено'));

            return redirect(route('admin.pages.index'));
        }

        return view('admin.pages.edit')->with('page', $page);
    }

    /**
     * Update the specified Page in storage.
     *
     * @param int $id
     * @param UpdatePageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePageRequest $request)
    {
        $page = $this->pageRepository->find($id);

        if (empty($page)) {
            Flash::error(__('Не найдено'));

            return redirect(route('admin.pages.index'));
        }

        $page = $this->pageRepository->update($request->all(), $id);

        Flash::success(__('Успешно обновлено'));

        return redirect(route('admin.pages.index'));
    }

    /**
     * Remove the specified Page from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $page = $this->pageRepository->find($id);

        if (empty($page)) {
            Flash::error(__('Не найдено'));

            return redirect(route('admin.pages.index'));
        }

        $this->pageRepository->delete($id);

        Flash::success(__('Успешно удалено'));

        return redirect(route('admin.pages.index'));
    }

    public function tree(Request $request)
    {
        $id = $request->get('id');

        if ($request->ajax()) {
            $data = [];
            $data[] = [
                'id' => '0',
                'parent' => '#',
                'text' => '#',
                'type' => 'root',
                'state' => [
                    'opened' => true,
                ],
            ];

            $query = $this->pageRepository->allQuery()->orderBy(NestedSet::LFT);
            if ($id != '#') {
                $query->descendantsOf($id);
            }
            $pages = $query->get();
            foreach ($pages as $page) {
                $data[] = [
                    'id' => $page->id,
                    'parent' => $page->parent_id ?: '0',
                    'text' => $page->title,
                    'type' => 'page',
                    'a_attr' => $page->status == Page::STATUS_PUBLISH ? [] : ['style' => 'opacity:0.5'],
                ];
            }
            return $data;
        }

        return view('admin.pages.tree');
    }

    public function treeCreate(Request $request)
    {
        $model = $this->pageRepository->create([
            'title' => $request->get('name'),
            'parent_id' => $request->get('parent'),
            'status' => Page::STATUS_HIDE,
        ]);

        return ['id' => $model->id];
    }

    public function treeRename(Request $request)
    {
        $model = $this->pageRepository->find($request->get('id'));
        $model->title = $request->get('name');
        $model->save();

        return ['id' => $model->id];
    }

    public function treeDelete(Request $request)
    {
        $model = $this->pageRepository->find($request->get('id'));
        $model->delete();

        return ['id' => $model->id];
    }

    public function treeMove(Request $request)
    {
        $parent = $request->get('parent');
        $position = $request->get('position');

        $model = $this->pageRepository->find($request->get('id'));

        if ($position > 0) {
            if($node = Page::query()->orderBy(NestedSet::LFT)->where('parent_id', $parent)->where('id', '!=', $model->id)->limit(1)->offset($position-1)->first()) {
                $model->insertAfterNode($node);
            }
        } else {
            if($node = Page::query()->orderBy(NestedSet::LFT)->where('parent_id', $parent)->first()) {
                $model->insertBeforeNode($node);
            } elseif($node = Page::query()->where(['id'=>$parent])->first()) {
                $model->appendToNode($node)->save();
            }
        }

        return ['id' => $model->id];
    }

    public function treeShow(Request $request)
    {
        $model = $this->pageRepository->find($request->get('id'));
        $model->status = Page::STATUS_PUBLISH;
        $model->save();

        return ['id' => $model->id];
    }

    public function treeHide(Request $request)
    {
        $model = $this->pageRepository->find($request->get('id'));
        $model->status = Page::STATUS_HIDE;
        $model->save();

        return ['id' => $model->id];
    }
}
