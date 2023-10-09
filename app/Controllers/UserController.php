<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    private $crud;
    public function __construct()
    {
       $this->crud = new \App\Models\UserModel();
    }

    public function index()
    {
        //nah
    }

    public function insert()
    {
        $ID = $_POST['ID'];
        $data = [
            'ProductName' => $this->request->getVar('ProdName'),
            'ProductDescription'=> $this->request->getVar('ProdDesc'),
            'ProductCategory'=> $this->request->getVar('ProdCat'),
            'ProductQuantity'=> $this->request->getVar('ProdQuan'),
            'ProductPrice'=> $this->request->getVar('ProdPr'),
        ];
        if ($ID!= null) {
            $this->crud->set($data)->where('ID', $ID)->update();
        } else {
               $this->crud->save($data);
        }
    
        return redirect()->to('/crud');
    }

    public function edit($ID)
        {
            $data = [
                'crud' => $this->crud->findAll(),
                'user' => $this->crud->where('ID', $ID)->first(),
            ];
            return view('homepage', $data);
        }

    public function getCategories()
    {
        // Fetch distinct ProductCategory values from your database
        $query = $this->distinct()
                      ->select('ProductCategory') // Select the ProductCategory column
                      ->get($this->table);

        return $query->getResultArray();
    }


    public function delete($ID)
    {
        $this->crud->delete($ID);
        return redirect()->to('/crud');
    }

    public function crud($crud)
    {
        echo $crud;
    }

    public function homepage()
    {
       $data['crud'] = $this->crud->findAll();
       return view('homepage', $data);
    }
}
