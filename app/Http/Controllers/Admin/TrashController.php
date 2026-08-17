<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Article;
use App\Models\Portfolio;
use App\Models\News;

class TrashController extends Controller
{
    public function index()
    {
        $items = collect();

        $models = [
            'service' => Service::class,
            'article' => Article::class,
            'portfolio' => Portfolio::class,
            'news' => News::class,
        ];


        foreach ($models as $type => $model) {

            $model::onlyTrashed()->get()->each(function ($item) use ($items, $type) {

                $items->push([
                    'id' => $item->id,
                    'type' => $type,
                    'title' => $item->title,
                    'deleted_at' => $item->deleted_at,
                ]);
            });
        }


        $items = $items->sortByDesc('deleted_at');


        return view('admin.trash.index', compact('items'));
    }



    public function restore(string $type, int $id)
    {
        $model = $this->getModel($type);

        $item = $model::onlyTrashed()->findOrFail($id);

        $item->restore();


        return back()->with('success', 'آیتم با موفقیت بازیابی شد.');
    }



    public function forceDelete(string $type, int $id)
    {
        $model = $this->getModel($type);

        $item = $model::onlyTrashed()->findOrFail($id);

        $item->forceDelete();


        return back()->with('success', 'آیتم به صورت کامل حذف شد.');
    }



    private function getModel(string $type)
    {
        return match ($type) {

            'service' => Service::class,

            'article' => Article::class,

            'portfolio' => Portfolio::class,

            'news' => News::class,

            default => abort(404),
        };
    }
}
