@extends('layouts.main')

@section('content')
<div class="container">
    <!-- Top Section -->
    <div class="d-flex justify-content-between align-items-center my-4">
        <div>
            <h1>American Design and Printing</h1>
        </div>
        <div class="d-flex">
            <form class="d-flex me-3">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
            <div class="btn-group me-3">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    My Account
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">My Account Page</a></li>
                    <li><a class="dropdown-item" href="#">Order Status</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Sign Out</a></li>
                </ul>
            </div>
            <a href="#" class="btn btn-primary">My Cart</a>
        </div>
    </div>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">All Products</a>
                    </li>
                    <!-- Dropdown for Business Cards -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Business Cards
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Quick Ship Business Cards</a></li>
                            <li><a class="dropdown-item" href="#">14pt (Profit Maximizer)</a></li>
                            <li><a class="dropdown-item" href="#">14pt + Matte Finish</a></li>
                            <li><a class="dropdown-item" href="#">16pt + Matte Finish</a></li>
                            <li><a class="dropdown-item" href="#">14pt + UV (High Gloss)</a></li>
                            <!-- Add the rest of the menu items as needed -->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->

    <div class="row">

    <!-- Left Side: Product Image and Details -->

    <div class="col-md-8">
         <img src="{{ asset('images/business_cards/value_buisness_cards/quick-ship-bc.png') }}" class="img-fluid mb-4" alt="Main ultra soft business card" style="max-width: 100%; height: auto;">
    
    <h2>Ultra Smooth</h2>
    <h3>Business Cards</h3>
        <p>These ultra smooth business cards are perfect for high end cards that blend professionalism with simplicity.

            16pt Ultra Smooth Uncoated stock
            Completely uniform, blank surface free of texture
            Super smooth surface makes images more pronounced</p>

    <!-- Additional Tabs for Details, File Prep, and Reviews -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="true">Details</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="fileprep-tab" data-bs-toggle="tab" data-bs-target="#fileprep" type="button" role="tab" aria-controls="fileprep" aria-selected="false">File Prep</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
        </li>
    </ul>
    <div class="tab-content mt-3" id="myTabContent">
        <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
            <!-- Details Content -->
            <h2>Details</h2>
            <ul>
            <img src="{{ asset('images/business_cards/soft_touch_bc/ultra-soft-bc-one.png') }}" class="img-fluid mb-4" alt="Soft Touch buisness cards" style="max-width: 100%; height: auto;">

                <li><strong>Super Smooth Cards</strong></li>
                    <p>These ultra smooth business cards are so texture-less that touching them feels almost like running your hand over a polished countertop.</p>

            <img src="{{ asset('images/business_cards/soft_touch_bc/ultra-soft-bc-two.png') }}" class="img-fluid mb-4" alt="Ultra soft business card" style="max-width: 100%; height: auto;">
            
                <li><strong>Enhanced Images</strong></li>
                    <p>The smooth surface of this business card stock creates a bright white canvas that helps your artwork stand out crisp and clear.</p>

            <img src="{{ asset('images/business_cards/soft_touch_bc/softTouch-business-cards.png') }}" class="img-fluid mb-4" alt="Soft touch businrss cards" style="max-width: 100%; height: auto;">

                <li><strong>Simple and Professional</li>
                    <p>These premium business cards are classy and minimalistic. They are perfect for luxury brands, professional services, and high end businesses.</p>
             
                <li><strong>Quantities:</strong> Ranges from 25to 1000</li>
                <li><strong>Sizes:</strong> 3.5” x 2” (firm size)</li>
                <li><strong>Finishing:</strong> Cut to size and box.</li>
                <li><strong>File Type:</strong> Print Ready PDF file</li>
            </ul>
        </div>
        <div class="tab-pane fade" id="fileprep" role="tabpanel" aria-labelledby="fileprep-tab">
            <!-- File Prep Content -->
            <p>Guidelines for preparing your files for printing.</p>
        </div>
        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
            <!-- Reviews Content -->
            <p>Customer reviews and testimonials.</p>
        </div>
    </div>
</div>
       

        <!-- Right Side: Pricing and Options -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3>Order Your Business Cards</h3>

                    <!-- Stock -->
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <select id="stock" class="form-select">
                            <option>16pt Ultra Smooth Printed 1 side (4/0)</option>
                            <option>16pt Ultra Smooth Printed 2 sided (4/4)</option>
                        </select>
                    </div>

                    <!-- Size -->
                    <div class="mb-3">
                        <label for="size" class="form-label">Size</label>
                        <select id="size" class="form-select">
                            <option>3.5 x 2</option>
                        </select>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <select id="quantity" class="form-select">
                            <option>25</option>
                            <option>50</option>
                            <option>75</option>
                            <option>100</option>
                            <option>250</option>
                            <option>500</option>
                            <option>750</option>
                            <option>1000</option>
                        </select>
                    </div>

                    <!-- Coating -->
                    <div class="mb-3">
                        <label for="Paint Color" class="form-label">Coating</label>
                        <select id="Paint Color" class="form-select">
                            <option>No Coating</option>
                        </select>
                    </div>

                    <!-- Rounded Corners -->
                    <div class="mb-3">
                        <label for="rounded-corners" class="form-label">Rounded Corners</label>
                        <select id="rounded-corners" class="form-select">
                            <option>NO</option>
                            <option></option>
                        </select>
                    </div>

                    <!-- Turnaround -->
                    <div class="mb-3">
                        <label for="turnaround" class="form-label">Turnaround</label>
                        <select id="turnaround" class="form-select">
                            <option>4-5 Business Days</option>
                        </select>
                    </div>

                    <!-- Sets -->
                    <div class="mb-3">
                        <label for="sets" class="form-label">Sets</label>
                        <select id="sets" class="form-select">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                            <option>18</option>
                            <option>19</option>
                            <option>20</option>
                        </select>
                    </div>

                    <!-- Price (Dummy for now, replace with actual pricing logic) -->
                    <div class="mb-3">
                        <h4>Price: $XX.XX</h4>
                    </div>

                    <!-- Calculate Shipping Button -->
                    <button class="btn btn-primary mb-3">Calculate Shipping Cost</button>

                    <!-- Upload Artwork Button -->
                    <button class="btn btn-primary">Upload Your Artwork</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
