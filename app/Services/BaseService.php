<?php

namespace App\Services;

use App\Enums\AtributeType;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;


class BaseService
{

    protected $_model;

    public function __construct()
    {
        $this->setModel();
    }


    public function getModel()
    {
    }


    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }


    public function show()
    {
        return $this->_model->get();
    }


    public function find($id)
    {
        $result = $this->_model->where('id', $id)->first();
        return $result;
    }


    public function store(array $attributes)
    {
        return $this->_model->create($attributes);
    }


    public function update($id, array $attributes)
    {   
        $result = $this->find($id);
        if ($result) {
            $this->_model->where('id', $id)->update($attributes);
            return $result;
        }
        return false;
    }


    public function destroy($id)
    {
        $result = $this->_model->where('id', $id)->get();
        if ($result) {
            $this->_model->where('id', $id)->delete();
            return true;
        }
        return false;
    }


    // HAND MAKE

    public function getData($request, $is_paginate = 0)
    {
        $objects = $this->_model::orderBy('id', 'desc');
        if ($request->search) {
            $search = $request->search;
            $objects = $objects->where(function ($alb) use ($search) {
                $alb->Where($this->_model::raw("CONCAT('#',id)"), 'like', "%$search%")
                    ->orwhere('name', 'like', "%$search%");
            });
        }
        if ($request->status) {
            if ($request->status !=  AtributeType::ACTIVE) {
                $objects = $objects->where('status',AtributeType::DEACTIVE);
            } else {
                $objects = $objects->where('status', AtributeType::ACTIVE);
            }
        }
      
        if ($request->joined_date) {
            $objects = $objects->whereDate('created_at', $request->joined_date);
        }
        if ($is_paginate) {
            $objects = $objects->paginate($is_paginate);
        } else {
            $objects = $objects->get();
        }
        return $objects;
    }


    public function getDataProduct($request, $paginate = 0)
    {
        $products = Product::join('product_sizes', 'product_sizes.product_id', 'products.id')
        ->where('products.status', AtributeType::ACTIVE)
        ->select('products.*', 'product_sizes.price');
        
        if ($request->sortBy) {
            switch ($request->sortBy) {
                case 'price-ascending':
                    $products = $products->orderBy('product_sizes.price','ASC');
                    break;
                case 'price-descending':
                    $products = $products->orderBy('product_sizes.price','DESC');
                    break;
                case 'title-ascending':
                    $products = $products->orderBy('products.name','ASC');
                    break;
                case 'title-descending':
                    $products = $products->orderBy('products.name','DESC');
                    break;
                case 'created-ascending':
                    $products = $products->orderBy('products.created_at','ASC');
                    break;
                case 'created-descending':
                    $products = $products->orderBy('products.created_at','DESC');
                    break;
                default:
                    break;
            }
        } else {
            $products->orderBy('products.created_at','DESC');
        }
        if($request->size){
            $sizes = [];
            $sizes = $request->size;
            $sizes = is_array($sizes) ? $sizes : [$sizes];
            $products = $products->where(function ($query) use ($sizes) {
                $query->whereIn('product_sizes.size', $sizes);
            });   
        }
        if($request->below500){
            $products = $products->where('product_sizes.price','<=',$request->below500);
        }
        if($request->below1000){
            $products = $products->where('product_sizes.price','>=',500000)
            ->where('product_sizes.price','<=',$request->below1000);
        }
        if($request->below1500){
            $products = $products->where('product_sizes.price','>=',1000000)
            ->where('product_sizes.price','<=',$request->below1500);
        }
        if($request->below5000){
            $products = $products->where('product_sizes.price','>=',2000000)
            ->where('product_sizes.price','<=',$request->below5000);
        }
        if($request->belowMax){
            $products = $products->where('product_sizes.price','>=',$request->belowMax);
        }
        if ($paginate) {
            $products = $products->paginate($paginate);
        } else {
            $products = $products->get();
        }
        return $products;
    }


    public function fillDaSearch(Request $request){
        if($request->get('query')){

            $query = $request->get('query');
            $datas = $this->_model->where('name', 'LIKE', "%{$query}%")->get();
            $output = '<ul class="fill_search" >';
           
            foreach($datas as $row){
                $thisModel = $this->_model->getTable();
                $output .= '
                <li class="nav-item "><a class="nav-link" href="'.$thisModel.'/'. $row->id .'/edit">'.$row->name.'</a></li>
                ';
            }
            $output .= '</ul>';

            echo $output;
       }
    }


    public function changeStatus($id)
    {
        $st = $this->_model->findOrFail($id);
        if ($st->status == AtributeType::DEACTIVE) {
            $st->status = AtributeType::ACTIVE;
        } else {
            $st->status = AtributeType::DEACTIVE;
        }
        $st->save();
        flash("Status Change Success")->success();
    }


   
    // share variable 
    public function shareVar()
    {
        $category = Category::get();
        $brand = Brand::get();

        return  \View::share([
            'category' => $category,
            'brand' => $brand,
        ]);
    }

    public function requestImg($requestImg){
        $image = NULL;
        if(!empty($requestImg)){
            $url = api_asset($requestImg);
            if(!empty($url)){
                $image = $url;
            }
        }
        return $image;
    }

}
