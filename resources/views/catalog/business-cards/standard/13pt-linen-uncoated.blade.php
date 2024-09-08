@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">13pt Linen Uncoated</h1>
    
    <!-- Description Section -->
    <div class="row">
        <div class="col-md-6">
            <img src="/public/images/business_cards/bc-linen-business-cards.png" alt="13pt Linen Uncoated Business Cards" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Description</h2>
            <p>Business cards are widely used as a networking tool and a way to make a good first impression. Linen business cards offer a premium look and a distinctive feel that stand out.</p>
            <ul>
                <li>13pt </li>
                <li>no Coating</li>
                <li>Ranges from 25 to 25,000</li>
                <li>Full Color, Single or Double-sided Print</li>
                <li>Quantities range from 25 - 25,000</li>
                <li>Cut to size and box. Rounded corners are optional (1/4" radius).</li>
                    
            </ul>
        </div>
    </div>

    <!-- Specifications -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Specifications</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Feature</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Paper Type</td>
                        <td>13pt Linen Card Stock</td>
                    </tr>
                    <tr>
                        <td>Size</td>
                        <td>3.5" x 2"</td>
                    </tr>
                    <tr>
                        <td>Finishes</td>
                        <td>Uncoated</td>
                    </tr>
                    <tr>
                        <td>Shipping Time</td>
                        <td>4-5 Business Days</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Pricing</h2>
            <p></p>
            <a href="#" class="btn btn-primary">Order Now</a>
        </div>
    </div>

    <!-- Back Button -->
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <a href="{{ route('showProduct', ['category' => 'business-cards', 'productSlug' => '13pt-linen-uncoated']) }}" class="btn btn-primary">Order Now</a>

        </div>
    </div>
</div>
@endsection
