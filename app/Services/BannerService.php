<?php

namespace App\Services;

use App\Models\Banner;
use App\Traits\ApiResponser;

class BannerService
{
    use ApiResponser;

    private $model;

    public function __construct(Banner $model)
    {
        $this->model = $model;
    }

    public function collection($inputs = [])
    {
        $banners = $this->model;

        if (!empty($inputs['search'])) {
            $banners = $banners->search($inputs['search']);
        }

        if (!empty($inputs['filters'])) {
            $banners = $banners->filter($inputs['filters']);
        }

        $banners = $banners->paginate(config('site.pagination.limit'));
        return $banners;
    }

    public function resource($id, $inputs = [])
    {
        $banner = $this->model->findOrFail($id);
        return $banner;
    }
}
