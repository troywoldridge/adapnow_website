@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="my-4">Our Wholesale Business Cards</h1>
    <p>Professional services for Custom Business Card Printing and Personalized Cards. We are your trusted printing services provider.</p>

    <div class="row">
        <!-- First Card: Best Value -->
        <div class="col-md-4 mb-4">
            <a href="{{ url('/business-cards/profit-maximizer') }}">
                <img src="{{ asset('images/business_cards/bc-best-value.png') }}" class="card-img-top" alt="Best Value Business Card">
            </a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Best Value Business Cards</h5>
                    <p class="card-text">These Wholesale Business Cards offer the best value for your money. If you are looking for the most cost-effective option or the quickest turnaround.</p>
                    <a href="{{ url('/business-cards/profit-maximizer') }}" class="btn btn-primary">Best Value</a>
                </div>
            </div>
        </div>

        <!-- Second Card: Matte 14pt -->
        <div class="col-md-4 mb-4">
            <a href="{{ url('/business-cards/matte-14pt') }}">
                <img src="{{ asset('images/business_cards/matte-business-cards.png') }}" class="card-img-top" alt="Matte 14pt Business Cards">
            </a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Matte Business Cards</h5>
                    <p class="card-text">Our Matte Business Cards are our standard and most popular finish. If you want your customers to receive a silky, elegant finish, then our Matte Wholesale Business Cards are the way to go!</p>
                    <a href="{{ url('/business-cards/matte-14pt') }}" class="btn btn-primary">14pt Matte Finish</a><br>
                    <a href="{{ url('/business-cards/matte-16pt') }}" class="btn btn-primary">16pt Matte Finish</a>
                </div>
            </div>
        </div>

        <!-- Third Card: UV Business Cards -->
        <div class="col-md-4 mb-4">
            <a href="{{ url('/business-cards/uv-quick-ship') }}">
                <img src="{{ asset('images/business_cards/bc-gloss-uv-business-cards.png') }}" class="card-img-top" alt="UV Business Card">
            </a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">UV Business Cards</h5>
                    <p class="card-text">Our UV Business Cards offer a glossy finish. Perfect for making your business cards stand out.</p>
                    <a href="{{ url('/business-cards/uv-quick-ship') }}" class="btn btn-primary">Quick Ship</a><br>
                    <a href="{{ url('/business-cards/uv-14pt') }}" class="btn btn-primary">14pt UV</a><br>
                    <a href="{{ url('/business-cards/uv-16pt') }}" class="btn btn-primary">16pt UV</a>
                </div>
            </div>
        </div>

        <!-- Fourth Card: Gloss Lamination 18pt -->
        <div class="col-md-4 mb-4">
            <a href="{{ url('/business-cards/gloss-lamination-18pt') }}">
                <img src="{{ asset('images/business_cards/gloss-laminated-business-cards.png') }}" class="card-img-top" alt="18pt Gloss Laminated Business Card">
            </a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gloss Lamination Business Cards</h5>
                    <p class="card-text">Our Laminated Business Cards offer a durable and glossy finish.</p>
                    <a href="{{ url('/business-cards/gloss-lamination-18pt') }}" class="btn btn-primary">18pt Gloss Lamination</a><br>
                    <a href="{{ url('/business-cards/matte-silk-lamination-18pt') }}" class="btn btn-primary">18pt Matte + Silk Lamination</a>
                </div>
            </div>
        </div>

        <!-- Fifth Card: AQ Business Cards -->
        <div class="col-md-4 mb-4">
            <a href="{{ url('/business-cards/aq-14pt') }}">
                <img src="{{ asset('images/business_cards/bc-aq.png') }}" class="card-img-top" alt="14pt AQ Semi Gloss Business Card">
            </a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">AQ Business Cards</h5>
                    <p class="card-text">Our laminated business cards offer a durable and glossy finish.</p>
                    <a href="{{ url('/business-cards/aq-14pt') }}" class="btn btn-primary">14pt AQ</a><br>
                    <a href="{{ url('/business-cards/aq-16pt') }}" class="btn btn-primary">16pt AQ</a>
                </div>
            </div>
        </div>

        <!-- Sixth Card: Writable Business Cards -->
        <div class="col-md-4 mb-4">
            <a href="{{ url('/business-cards/enviro-uncoated-13pt') }}">
                <img src="{{ asset('images/business_cards/enviro-business-cards.png') }}" class="card-img-top" alt="Writable Business Card">
            </a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Writable Business Cards</h5>
                    <p class="card-text">Our Die Cut Business Cards provide unique shapes and designs that stand out.</p>
                    <a href="{{ url('/business-cards/enviro-uncoated-13pt') }}" class="btn btn-primary">13pt Enviro Uncoated</a><br>
                    <a href="{{ url('/business-cards/linen-uncoated-13pt') }}" class="btn btn-primary">13pt Linen Uncoated</a><br>
                    <a href="{{ url('/business-cards/writable-aq-14pt') }}" class="btn btn-primary">14pt Writable + AQ</a><br>
                    <a href="{{ url('/business-cards/writable-uv-14pt') }}" class="btn btn-primary">14pt Writable + UV</a><br>
                    <a href="{{ url('/business-cards/writable-c1s-18pt') }}" class="btn btn-primary">18pt Writable (C1S)</a>
                </div>
            </div>
        </div>

       <!-- Seventh Card: Specialty Business Cards -->
<div class="col-md-4 mb-4">
    <a href="{{ url('/business-cards/metallic-foil') }}">
        <img src="{{ asset('images/business_cards/bc_foil-magnified.jpg') }}" class="card-img-top" alt="Metallic Foil Business Card">
    </a>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Specialty Business Cards</h5>
            <p class="card-text">Our Specialty Business Cards offer unique finishes and premium quality for standout designs.</p>
            
            <a href="{{ url('/business-cards/metallic-foil') }}" class="btn btn-primary">Metallic Foil</a><br>
            <a href="{{ url('/business-cards/kraft-paper') }}">
                <img src="{{ asset('images/business_cards/kraft-magnified.png') }}" class="card-img-top mt-3" alt="Kraft Paper Business Card">
            </a>
            <a href="{{ url('/business-cards/kraft-paper') }}" class="btn btn-primary">Kraft Paper</a><br>
            
            <a href="{{ url('/business-cards/durable') }}">
                <img src="{{ asset('images/business_cards/durable1.jpg') }}" class="card-img-top mt-3" alt="Durable Business Card">
            </a>
            <a href="{{ url('/business-cards/durable') }}" class="btn btn-primary">Durable</a><br>

            <a href="{{ url('/business-cards/spot-uv') }}">
                <img src="{{ asset('images/business_cards/spot-uv-business-cards.png') }}" class="card-img-top mt-3" alt="Spot UV Business Card">
            </a>
            <a href="{{ url('/business-cards/spot-uv') }}" class="btn btn-primary">Spot UV</a><br>

            <a href="{{ url('/business-cards/pearl-paper') }}">
                <img src="{{ asset('images/business_cards/pearl-magnified.png') }}" class="card-img-top mt-3" alt="Pearl Paper Business Card">
            </a>
            <a href="{{ url('/business-cards/pearl-paper') }}" class="btn btn-primary">Pearl Paper</a><br>

            <a href="{{ url('/business-cards/die-cut') }}">
                <img src="{{ asset('images/business_cards/Die-Cut-Cards.png') }}" class="card-img-top mt-3" alt="Die Cut Business Card">
            </a>
            <a href="{{ url('/business-cards/die-cut') }}" class="btn btn-primary">Die Cut</a><br>

            <a href="{{ url('/business-cards/soft-touch') }}">
                <img src="{{ asset('images/business_cards/bc-premium-feel.jpg') }}" class="card-img-top mt-3" alt="Soft Touch Business Card">
            </a>
            <a href="{{ url('/business-cards/soft-touch') }}" class="btn btn-primary">Soft Touch</a><br>

            <a href="{{ url('/business-cards/painted-edge-32pt') }}">
                <img src="{{ asset('images/business_cards/painted-bc-main.png') }}" class="card-img-top mt-3" alt="Painted Edge 32pt Business Card">
            </a>
            <a href="{{ url('/business-cards/painted-edge-32pt') }}" class="btn btn-primary">32pt Painted Edge</a><br>

            <a href="{{ url('/business-cards/ultra-smooth') }}">
                <img src="{{ asset('images/business_cards/bc-premium-feel.jpg') }}" class="card-img-top mt-3" alt="Ultra Smooth Business Card">
            </a>
            <a href="{{ url('/business-cards/ultra-smooth') }}" class="btn btn-primary">Ultra Smooth</a>
        </div>
    </div>
</div>
