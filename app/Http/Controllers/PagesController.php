<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Product;

class PagesController extends Controller
{
    //Index page
    public function index()
    {
        return view('front.index');
    }

    // Show customer selection page
    public function selectCustomerPage()
    {
        // Replace with actual customer data from the database
        $customers = Customer::all();

        return view('front.select-customer', compact('customers'));
    }

    // Set selected customer in session
    public function setCustomer(Request $request)
    {
        // Validate the request input
        $request->validate([
            'customer_id' => 'required|integer|exists:customers,id',
        ]);

        // Find the customer by ID
        $customer = Customer::find($request->customer_id);

        if (!$customer) {
            return back()->withErrors(['error' => 'Invalid customer selected.']);
        }

        // Store the selected customer in the session
        $request->session()->put('selected_customer', [
            'id' => $customer->id,
            'name' => $customer->name,
        ]);

        // Redirect to the products page
        return redirect()->route('products');
    }

    // Show products page
    public function productsPage(Request $request)
{
    // Ensure a customer is selected
    if (!$request->session()->has('selected_customer')) {
        return redirect()->route('select.customer')->withErrors(['error' => 'Please select a customer first.']);
    }

    $selectedCustomer = $request->session()->get('selected_customer');

    // Fetch all categories
    $categories = Category::all();

    // Fetch products based on selected category or all products if none selected
    $selectedCategoryId = $request->query('category_id');
    if ($selectedCategoryId) {
        $products = Product::where('category_id', $selectedCategoryId)->get();
    } else {
        $products = Product::all();
    }

    return view('front.products', compact('selectedCustomer', 'categories', 'products', 'selectedCategoryId'));
}


    public function resetCustomer(Request $request)
    {
        // Remove the selected customer from the session
        $request->session()->forget('selected_customer');

        // Redirect to the customer selection page
        return redirect()->route('select.customer')->with('success', 'Select another customer.');
    }
}
