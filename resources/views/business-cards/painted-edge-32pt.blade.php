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
            <div class="d-flex">
                <!-- Main Product Image -->
                <img src="{{ asset('images/business_cards/Painted_edge_bc/painted-bc-main.png') }}" class="img-fluid mb-4" alt="Painted Edge Business Cards" style="max-width: 50%; height: auto;">
                <!-- Text to the right of the image -->
                <div class="ms-4">
                    <h2>Painted Edge</h2>
                    <h3>Business Cards</h3>
                    <h4>32pt Uncoated</h4>
                    <p><strong>Print business cards with painted edges that help your clients stand out with color.</strong></p>
                    <ul>
                        <li>Thick 32pt premium stock</li>
                        <li>Choose from 7 edge colors</li>
                        <li>Uncoated surface</li>
                        <li>Makes a powerful first impression</li>
                    </ul>
                </div>
            </div>

            <!-- Additional Tabs for Details, File Prep, and Reviews -->
            <div class="card mt-4 shadow-sm p-3">
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
                        <div class="card mb-4 shadow-sm p-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ asset('images/business_cards/Painted_edge_bc/painted-bc-one.png') }}" class="img-fluid" alt="Painted Edge Cards">
                                </div>
                                <div class="col-md-6">
                                    <h5>Colored Edges</h5>
                                    <p>Business cards with colored edges draw attention with their uniqueness. Choose from a variety of popular colors for the painted edges.</p>
                                    <p>*PMS values are based on close approximations. Gold/silver edges use acrylic-based metallic paints.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 shadow-sm p-3">
                            <div class="row">
                                <div class="col-md-6 order-md-2">
                                    <img src="{{ asset('images/business_cards/Painted_edge_bc/painted-bc-two.png') }}" class="img-fluid" alt="Extra Thick Business Cards">
                                </div>
                                <div class="col-md-6 order-md-1">
                                    <h5>Extra Thick Business Cards</h5>
                                    <p>Print 32pt business cards to help clients make a big impact. They are less likely to bend, fray, or rip, and they feel truly like a premium grade product.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 shadow-sm p-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ asset('images/business_cards/Painted_edge_bc/painted-bc-three.png') }}" class="img-fluid" alt="Uncoated Stock">
                                </div>
                                <div class="col-md-6">
                                    <h5>Uncoated Stock</h5>
                                    <p>These professional business cards have a clean, uncoated surface, so your clients can write on them if they so choose.</p>
                                    <ul>
                                        <li><strong>Quantities:</strong> Ranges from 250 to 25,000</li>
                                        <li><strong>Sizes:</strong> 3.5” x 2” (firm size)</li>
                                        <li><strong>Coating:</strong>No Coating</li>
                                        <li><strong>Finishing:</strong> Cut to size and box.</li>
                                        <li><strong>File Type:</strong> Print Ready PDF file</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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
                            <option>32pt Printed 1 side (4/0)</option>
                            <option>32pt Printed 2 sided (4/4)</option>
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
                            <option>250</option>
                            <option>500</option>
                            <option>1000</option>
                        </select>
                    </div>

                    <!-- Coating -->
                    <div class="mb-3">
                        <label for="Paint Color" class="form-label">Coating</label>
                        <select id="Paint Color" class="form-select">
                            <option>White (No Paint)</option>
                            <option>Red</option>
                            <option>Black</option>
                            <option>Light Blue</option>
                            <option>Yellow</option>
                            <option>Gold</option>
                            <option>Silver</option>
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
                            <option>5-7 Business Days</option>
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
