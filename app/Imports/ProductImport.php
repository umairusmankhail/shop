<?php

namespace App\Imports;

use App\Models\product;
use App\Models\product_images;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Create product
            $product = new product([
                'p_name' => $row['p_name'],
                'description' => $row['description'],
                'price' => $row['price'],
                // Other fields...
            ]);
            $product->save();

            // Create product image
            $image = new product_images([
                'product_id' => $product->id,
                'filename' => $row['filename'],
                // Other fields...
            ]);
            $image->save();
        }
    }
}
