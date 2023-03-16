<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class TodoService
{
    public function index()
    {
        $lists = DB::table('lists')->orderBy('created_at', 'desc')->paginate(10);

        return $lists;
    }

    public function search($data)
    {
        $list = DB::table('lists')->where('name', 'like', '%' . $data['search'] . '%')->paginate(10);

        return $list;
    }

    public function store($data): bool
    {
        $list = DB::table('lists')->insert([
            'name' => $data['name'],
        ]);

        return $list;
    }

    public function edit($id): array
    {
        $list = DB::table('lists')->where('id', $id)->first();
        $data = json_decode(json_encode($list), true);

        return $data;
    }

    public function update($data)
    {
        $data = DB::table('lists')->where('id', $data['id'])->update([
            'name' => $data['name'],
        ]);

        return $data;
    }

    public function delete($data)
    {
        $data = DB::table('lists')->where('id', $data['id'])->delete();

        return $data;
    }
}
