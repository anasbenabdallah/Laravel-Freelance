<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facture;
use App\Payment; // Import the Payment model

class PaymentController extends Controller
{
    public function session(Request $request, $facture_id)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        
        // Fetch the facture by its ID
        $facture = Facture::find($facture_id);
        if ($facture->Etat === 'Pending') {
            $facture->Etat = 'Paid';
            $facture->save();
        }
    
        $product_name = $facture->client;
        $total = $facture->Montant;
        
        $unit_amount = intval($total * 100); // Convert total to cents
    
        $productItems[] = [
            'price_data' => [
                'product_data' => [
                    'name' => $product_name,
                ],
                'currency'     => 'USD',
                'unit_amount'  => $unit_amount,
            ],
            'quantity' => 1  // assuming quantity is 1 for each facture
        ];
        
        $checkoutSession = \Stripe\Checkout\Session::create([
            'line_items' => [$productItems],
            'mode' => 'payment',
            'allow_promotion_codes' => true,
            'metadata' => [
                'facture_id' => $facture->id
            ],
            'customer_email' => "benabdallah.anas2000@gmail.com", // $user->email,
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);
    
        // Create a new payment record
        $payment = new Payment();
        $payment->facture_id = $facture->id;
        $payment->amount = $total; // Adjust this if the payment amount needs to be modified
        $payment->payment_date = now(); // Use the current date and time
        $payment->save();
    
        return redirect()->away($checkoutSession->url);
    }
    
    public function success()
    {
        return view('payment.success', [
            'message' => "Thank you for your payment! Your transaction was successful. We appreciate your trust in us and will process your order promptly. If you have any questions or need further assistance, please don't hesitate to reach out. Have a great day!"
        ]);
    }
    public function index()
{
    $payments = Payment::all();
    return view('admin.paying.index', compact('payments'));
}

public function edit($id)
{
    // Find the payment record by ID
    $payment = Payment::find($id);

    if (!$payment) {
        // Handle the case where the payment with the given ID doesn't exist
        // You can return a 404 response or redirect to an error page.
    }

    // Load the "edit" view and pass the payment data to it
    return view('admin.paying.edit', compact('payment'));
}
public function update(Request $request, $id)
{
    // Validate and update the payment record based on the form data
    // You can access the form data using $request
    $payment = Payment::find($id);

    if (!$payment) {
        // Handle the case where the payment with the given ID doesn't exist
        // You can return a 404 response or redirect to an error page.
    }

    // Define validation rules
    $rules = [
        'amount' => 'required|numeric', // Add more rules for other fields as needed
    ];

    // Define custom validation messages
    $messages = [
        'amount.required' => 'The amount field is required.',
        'amount.numeric' => 'The amount must be a number.',
        // Add more messages for other fields as needed
    ];

    // Validate the form data
    $this->validate($request, $rules, $messages);

    // Update the payment details based on the form data
    $payment->amount = $request->input('amount'); // Replace 'amount' with the actual field names

    // Save the updated payment
    $payment->save();

    // Redirect to a success page or the payments list page
    return redirect()->route('payment.index')->with('success', 'Payment updated successfully.');
}


public function view($id)
{
    $payment = Payment::find($id);

    if (!$payment) {
        // Handle the case where the payment with the given ID doesn't exist
        // You can return a 404 response or redirect to an error page.
    }

    // Load the view view and pass the payment data to it
    return view('admin.paying.view', compact('payment'));
}


public function delete($id)
{
    $payment = Payment::find($id);

    if (!$payment) {
        // Handle the case where the payment with the given ID doesn't exist
        // You can return a 404 response or redirect to an error page.
    }

    // Delete the payment record
    $payment->delete();

    // Redirect to a success page or the payments list page
    return redirect()->route('payment.index')->with('success', 'Payment deleted successfully.');
}

}
