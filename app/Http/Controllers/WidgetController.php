<?php

namespace App\Http\Controllers;

use App\Http\Widgets\Button;
use App\Http\Widgets\Table;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WidgetController extends Controller
{
    public function table()
    {
        $data = User::all();

        $table = new Table();
        $table->data = $data;
        $table->column('name', 'Name');
        $table->column('email', 'Email');
        $table->column('created_at', 'Created at');
        $table->column('updated_at', 'Updated at');
        $table->column('_actions', 'Actions', function ($value) {
            return (new Button())->url('/edit', ['id' => $value->id])->label('EDIT');
        });

        return view('table_demo', ['table' => $table]);
    }
}
