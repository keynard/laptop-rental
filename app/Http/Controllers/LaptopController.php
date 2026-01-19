<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    public function index()
    {
        $laptops = Laptop::all();
        return view('laptops.index', compact('laptops'));
    }

    public function create()
    {
        return view('laptops.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'serial_number' => 'required|unique:laptops',
            'stock' => 'required|integer',
            'rental_price' => 'required|numeric',
            'description' => 'nullable'
        ]);

        Laptop::create($request->all());

        return redirect()->route('laptops.index')
                         ->with('success', 'Laptop added successfully!');
    }
    public function edit($id)
{
    $laptop = Laptop::findOrFail($id);
    return view('laptops.edit', compact('laptop'));
}

public function update(Request $request, $id)
{
    $laptop = Laptop::findOrFail($id);

    $request->validate([
        'brand' => 'required',
        'model' => 'required',
        'serial_number' => "required|unique:laptops,serial_number,$id",
        'stock' => 'required|integer',
        'rental_price' => 'required|numeric',
        'description' => 'nullable'
    ]);

    $laptop->update($request->all());

    return redirect()->route('laptops.index')
                     ->with('success', 'Laptop updated successfully!');
}

public function destroy($id)
{
    $laptop = Laptop::findOrFail($id);
    $laptop->delete();

    return redirect()->route('laptops.index')
                     ->with('success', 'Laptop deleted successfully!');
}
public function rent(Laptop $laptop)
{
    if ($laptop->stock > 0) {
        $laptop->stock -= 1;
        $laptop->save();

        return redirect()->route('laptops.index')
                         ->with('success', 'Laptop rented successfully!');
    } else {
        return redirect()->route('laptops.index')
                         ->with('error', 'Laptop is out of stock!');
    }
}
public function return(Laptop $laptop)
{
    // Optional: if you have a max stock limit
    if(isset($laptop->max_stock) && $laptop->stock >= $laptop->max_stock) {
        return redirect()->route('laptops.index')
                         ->with('error', 'Laptop stock is already full!');
    }

    $laptop->stock += 1; // increment stock
    $laptop->save();

    return redirect()->route('laptops.index')
                     ->with('success', 'Laptop returned successfully!');
}

}
