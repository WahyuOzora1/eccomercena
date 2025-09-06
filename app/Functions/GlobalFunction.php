<?php

namespace App\Functions;

use App\Models\Order;
use App\Models\Product;
use App\Models\Material;
use App\Models\OrderItem;
use App\Models\MaterialOut;
use App\Models\ProductMaterial;
use Gloudemans\Shoppingcart\Facades\Cart;

class GlobalFunction {

    public function stockIn($id, $stockIn) {

        $material = Material::where('id', $id)->first();

        $oldStock = 0;
        $newStock = 0;

        $oldStock = $material->stock;
        $newStock = $stockIn;

        $material->stock = $oldStock + $newStock;
        $material->save();

    }

    public function stockReduction($id, $stockIn) {
        $material = Material::where('id', $id)->first();

        $oldStock = 0;

        $oldStock = $material->stock;
        $newStock = $oldStock - $stockIn;

        $material->stock = $newStock;
        $material->save();

    }

    public function checkStockMaterial($items, $orderId) {

        $productNotValid = array();
        $productValid = array();
        $notPreOrder = array();
        foreach($items as $item) {
            $product = Product::where('id', $item->id)->first();
            if ($product->is_preorder == 1) {
                $productMaterials = ProductMaterial::where('product_id', $product->id)->get();
                $out = false;

                if($productMaterials->isEmpty()) {
                    array_push($productNotValid, array(
                        'id' => $product->id
                    ));
                    Cart::remove($item->rowId);
                    continue;
                }

                foreach ($productMaterials as $productMaterial) {
                    $material = Material::where('id', $productMaterial->material_id)->first();

                    if ($material->stock < $productMaterial->qty) {
                        array_push($productNotValid, array(
                            'id' => $productMaterial->product_id
                        ));
                        Cart::remove($item->rowId);
                        $out = true;
                    } else {
                        array_push(
                            $productValid,
                            array(
                                'product_material_id' => $productMaterial->id,
                                'product_id' => $productMaterial->product_id,
                                'material_id' => $productMaterial->material_id,
                                'qty' => $productMaterial->qty * $item->qty, //dikali dengan qty cars / jml pesanan
                                'order_id' => $orderId
                            )
                        );
                    }

                    if ($out) {
                        break;
                    }
                }
            } else {
                array_push(
                    $notPreOrder, array(
                    'id' => $product->id
                )
                );
            }
        }

        $this->stockOutByProductMaterial($productValid);

        $data = (object)[
            'valid' => $productValid, //product pre order yang valid
            'validCount' => count($productValid),
            'notValid' => $productNotValid, //product pre order yang tidak valid / bahan tidal memenuhi qty
            'notValidCount' => count($productNotValid),
            'notPreorder' => $notPreOrder
        ];


        return $data;

        // dd($productValid, $productNotValid);
    }

    public function stockOutByProductMaterial($items) {

        if(count($items) == null || empty($items) || count($items) == 0) {
            return false;
        } else {

            foreach($items as $item) {

                $material = Material::where('id', $item['material_id'])->first();

                $oldStock = 0;
                $newStock = 0;

                $oldStock = $material['stock'];
                $newStock = $oldStock - $item['qty'];

                $material->stock = $newStock;
                $material->save();

                MaterialOut::insert([
                    'material_id' => $material->id,
                    'stock_out' => $item['qty'],
                    'order_id' => $item['order_id'],
                    'product_id' => $item['product_id'],
                    'product_material_id' => $item['product_material_id'],
                    'date_out' => date('Y-m-d')
                ]);

            }

            return true;

        }

    }

    public function updateOrderItemId($orderId) {

    }

    public function returnOrder($orderId) {


        $order = Order::where('id', $orderId)->first();

        if(!empty($order)) {

            //$oderItem = OrderItem::where('order_id', $order->id)->get();

            $materialOut = MaterialOut::where('order_id', $orderId)->get();

            if(!$materialOut->isEmpty()) {

                foreach($materialOut as $out) {

                        $material = Material::where('id', $out->material_id)->first();

                        $oldStock = 0;
                        $newStock = 0;

                        $oldStock = $material->stock;
                        $newStock = $oldStock + $out->stock_out;

                        $material->stock = $newStock;
                        $material->save();
                }

                MaterialOut::where('order_id', $orderId)->delete();

            }

        }

    }

}

?>
