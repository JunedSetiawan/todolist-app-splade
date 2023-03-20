<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class TodoService
{
    public function index()
    {
        $data = DB::table('lists')->orderBy('created_at', 'desc')->paginate();

        return $data;
    }
    public function store($data)
    {
        $data = DB::table('lists')->insert([
            'name' => $data['name'],
        ]);

        return $data;
    }
    public function edit($id)
    {
        $data = DB::table('lists')->where('id', $id)->first();
        $arr = json_decode(json_encode($data), true);

        return $arr;
    }
    public function update($data)
    {
        $data = DB::table('lists')->where('id', $data['id'])->update([
            'name' => $data['name'],
        ]);

        return $data;
    }
    public function search($data)
    {
        $data = DB::table('lists')->where('name', 'like', '%' . $data['search'] . '%')->paginate();

        return $data;
    }
    public function delete($data)
    {
        $data = DB::table('lists')->where('id', $data['id'])->delete();

        return $data;
    }
}
