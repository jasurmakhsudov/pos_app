<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\SaleItem;

class SalesController extends Controller
{
    public function index()
    {
        return Sales::all();
    }

    public function show(Request $request)
    {
        return SaleItem::where('sales_id',$request->sale_id)->get(['qty','total','item_id']);
    }

    public function store(Request $request)
    {
        if(!isset($request->items))
            return ["No item to store"];
        $total_sum=0;
        $sales = Sales::create();
        foreach($request->items as $item){
            SaleItem::create([
                'sales_id' => $sales->id,
                'item_id' => $item['item_id'],
                'qty' => $item['qty'],
                'total' => $item['total'],
            ]);
            $sales->total+=$item['total'];
            $sales->num_items++;
        }
        $sales->save();

        return ["Sales are successfully stored"];
    }

    // "items\": [\r\n        {\r\n            \"item_id\": 59,\r\n            \"qty\": 2,\r\n            \"total\": 20000\r\n        },\r\n        {\r\n            \"item_id\": 3262,\r\n            \"qty\": 1,\r\n            \"total\": 10000\r\n        }\r\n    ]\r\n}",



}
