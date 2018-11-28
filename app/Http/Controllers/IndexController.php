<?php

namespace App\Http\Controllers;

use App\State;
use App\Warehouse;
use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    public function index () {
        $items = Item::all();
        return view('index')->with(['items' => $items]);
    }

    public function processForm () {
        $item = Input::get('item');
        return Redirect::to('item/'.$item) ;
    }

    public function show ($item) {
        $item = Item::find($item);
        if ($item != '') {
            $states = State::where('item_id', $item->id)->get();
            return view('item')->with(['item' => $item, 'states' => $states]);
        } else {
            abort(404);
        }
    }

    public function store (Request $request) {

        $this->validate($request, [
            'name' => 'required|unique:items',
            'price' => 'required'
        ]);

        $data = $request->all();

        $item = new Item();
        $item->fill($data);

        $item->save();

        return redirect('/');
    }

    public function update (Request $request) {

        $this->validate($request, [
            'name' => 'required|unique:items',
            'price' => 'required'
        ]);

        $data = $request->all();

        $item = new Item();
        $item->fill($data);

        $item->save();

        return redirect('/');
    }


    public function show_warehouse_a () {
        $warehouse = Warehouse::find(1);
        $states = $warehouse->states;
        $array_items = [];
        foreach ($states as $state) {
            if ($state->quantity != 0) {
                array_push($array_items, $state->item);
            }
        }
        return response()->json($array_items);
    }

    public function show_warehouse_b () {
        $warehouse = Warehouse::find(2);
        $states = $warehouse->states;
        $array_items = [];
        foreach ($states as $state) {
            if ($state->quantity == 0) {
                array_push($array_items, $state->item);
            }
        }
        return response()->json($array_items);
    }

    public function show_quantity_gr_five () {
        $states = State::where('quantity', '>', 5)->get();
        $array_items = [];
        foreach ($states as $state) {
            array_push($array_items, $state->item);
        }
        return response()->json($array_items);
    }

    public function show_price_gr_ten () {
        $items = Item::where('price', '>', 10.00)->get();
        return response()->json($items);
    }
}
