<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class MainController extends Controller
{
    //
    public function saveCalculation()
    {
        DB::beginTransaction();
        $bill = Bill::create([
            'note' => md5(date('Y-m-d H:i:s')),
            'min_price' => request('promo')['min_price'],
            'percentage_discount' => request('promo')['discount_percentage'],
            'amount_discount' => request('promo')['max_amount_discount'],
            'shipping_cost' => request('promo')['shipping_cost']
        ]);
        foreach (request('data') as $key => $value) {
            foreach ($value['order'] as $key1 => $value1) {
                BillDetail::create([
                    'bill_id' => $bill->id,
                    'person' => $value['person'],
                    'food' => $value1['food'],
                    'price' => $value1['price'],
                    'number' => $value1['number']
                ]);
            }
        }
        DB::commit();
        return response($bill->id, 200);
    }

    public function getCalculation()
    {
        $bills = Bill::with(['bill_detail' => function ($query) {
            return $query->select('id', 'bill_id', 'person', 'food', 'price', 'number')->groupBy(['id', 'bill_id', 'food', 'price', 'number', 'person']);
        }])
            ->where('id', request('id'))
            ->get();
        // dd($bills->toArray());
        $newBill = [];
        $object = new stdClass();
        $object->person = '';
        $object->orders = array();
        foreach ($bills->toArray() as $key => $bill) {
            foreach ($bill['bill_detail'] as $key => $value) {
                // dd($value);
                if ($object->person != $value['person'] && $object->person != '') {
                    array_push($newBill, $object);
                    $object = null;
                    $object = new stdClass();
                }

                $order = new stdClass();
                $order->food = $value['food'];
                $order->price = $value['price'];
                $order->number = $value['number'];

                $object->person = $value['person'];
                // dd($order);
                $object->orders[] = $order;
                // array_push($object->orders, $order);
                // dd($object);
            }
            array_push($newBill, $object);
        }
        // dd($bill['amount_discount'], $bill['min_price'], $bill['percentage_discount'], $bill['shipping_cost']);
        return response(['bill' => $newBill, 'promo' => [$bill['amount_discount'], $bill['min_price'], $bill['percentage_discount'], $bill['shipping_cost']]], 200);
    }
}