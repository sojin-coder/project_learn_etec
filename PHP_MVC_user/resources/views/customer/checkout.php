<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Checkout</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px 20px;
            font-family: Arial, sans-serif;
            background: #f4f5f7;
            color: #1f2937;
        }

        .checkout-container {
            max-width: 1100px;
            margin: auto;
        }

        .page-title {
            margin-bottom: 25px;
        }

        .page-title h1 {
            margin: 0;
            font-size: 30px;
        }

        .page-title p {
            color: #6b7280;
            margin-top: 8px;
        }

        .checkout-grid {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 25px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,.05);
        }

        .card-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 22px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            outline: none;
            font-size: 14px;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #111827;
        }

        .form-group textarea {
            height: 90px;
            resize: vertical;
        }

        /* Product */

        .product {
            display: flex;
            gap: 15px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .product img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .product-info {
            flex: 1;
        }

        .product-name {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .product-price {
            color: #e63946;
            font-weight: 600;
        }

        /* Total */

        .total {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 20px;
            font-weight: 700;
        }

        /* QR */

        .payment-section {
            margin-top: 25px;
        }

        .payment-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .qr-box {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 18px;
            text-align: center;
            background: #fafafa;
        }

        .qr-box img {
            width: 210px;
            height: 210px;
            object-fit: contain;
        }

        .qr-text {
            margin-top: 10px;
            color: #6b7280;
            font-size: 13px;
        }

        /* Upload */

        .upload-box {
            margin-top: 18px;
        }

        .upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 120px;
            border: 2px dashed #d1d5db;
            border-radius: 10px;
            cursor: pointer;
            transition: .2s;
            text-align: center;
            padding: 15px;
        }

        .upload-label:hover {
            border-color: #111827;
            background: #fafafa;
        }

        .upload-content {
            color: #6b7280;
        }

        .upload-icon {
            font-size: 28px;
            margin-bottom: 7px;
        }

        #paymentSlip {
            display: none;
        }

        #fileName {
            margin-top: 8px;
            font-size: 13px;
            color: #6b7280;
            text-align: center;
        }

        /* Preview */

        #slipPreview {
            display: none;
            width: 100%;
            max-height: 250px;
            object-fit: contain;
            margin-top: 15px;
            border-radius: 8px;
            border: 1px solid #eee;
        }

        /* Button */

        .btn-order {
            width: 100%;
            margin-top: 25px;
            padding: 14px;
            border: none;
            border-radius: 7px;
            background: #111827;
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-order:hover {
            background: #374151;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: #4b5563;
            text-decoration: none;
            font-size: 14px;
        }

        @media (max-width: 800px) {

            .checkout-grid {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>

<div class="checkout-container">

    <a
        href="<?= BASE_URL ?>/customer/product?id=<?= $product['id'] ?>"
        class="back"
    >
        ← Back to Product
    </a>


    <div class="page-title">

        <h1>Checkout</h1>

        <p>
            Complete your information and payment.
        </p>

    </div>


    <form
        action="<?= BASE_URL ?>/customer/order"
        method="POST"
        enctype="multipart/form-data"
    >

        <input
            type="hidden"
            name="product_id"
            value="<?= $product['id'] ?>"
        >


        <div class="checkout-grid">


            <!-- LEFT -->

            <div class="card">

                <div class="card-title">
                    Customer Information
                </div>


                <div class="form-group">

                    <label>
                        Full Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        placeholder="Enter your full name"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>
                        Phone Number
                    </label>

                    <input
                        type="text"
                        name="phone"
                        placeholder="Enter your phone number"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>
                        Delivery Address
                    </label>

                    <textarea
                        name="address"
                        placeholder="Enter your delivery address"
                        required
                    ></textarea>

                </div>


                <div class="form-group">

                    <label>
                        Quantity
                    </label>

                    <input
                        type="number"
                        name="quantity"
                        id="quantity"
                        value="1"
                        min="1"
                        max="<?= $product['stock'] ?>"
                        required
                    >

                </div>


                <!-- Payment Slip -->

                <div class="payment-section">

                    <div class="payment-title">
                        Payment Slip
                    </div>


                    <div class="upload-box">

                        <label
                            for="paymentSlip"
                            class="upload-label"
                        >

                            <div class="upload-content">

                                <div class="upload-icon">
                                    📤
                                </div>

                                <strong>
                                    Click to upload payment slip
                                </strong>

                                <br>

                                <small>
                                    JPG, PNG or WEBP
                                </small>

                            </div>

                        </label>


                        <input
                            type="file"
                            name="payment_slip"
                            id="paymentSlip"
                            accept="image/*"
                            required
                        >


                        <div id="fileName">
                            No file selected
                        </div>


                        <img
                            id="slipPreview"
                            src=""
                            alt="Payment Slip Preview"
                        >

                    </div>

                </div>


                <button
                    type="submit"
                    class="btn-order"
                >
                    Place Order
                </button>

            </div>


            <!-- RIGHT -->

            <div>

                <!-- Order -->

                <div class="card">

                    <div class="card-title">
                        Order Summary
                    </div>


                    <div class="product">

                        <?php if (!empty($product['image'])): ?>

                            <img
                                src="<?= BASE_URL ?>/assets/uploads/<?= htmlspecialchars($product['image']) ?>"
                                alt="<?= htmlspecialchars($product['name']) ?>"
                            >

                        <?php endif; ?>


                        <div class="product-info">

                            <div class="product-name">

                                <?= htmlspecialchars($product['name']) ?>

                            </div>

                            <div class="product-price">

                                $<?= number_format($product['price'], 2) ?>

                            </div>

                        </div>

                    </div>


                    <div class="total">

                        <span>
                            Total
                        </span>

                        <span id="total">

                            $<?= number_format($product['price'], 2) ?>

                        </span>

                    </div>

                </div>


                <!-- QR -->

                <div class="card payment-section">

                    <div class="card-title">
                        Scan to Pay
                    </div>


                    <div class="qr-box">

                        <img
                            src="<?= BASE_URL ?>/assets/images/payment-qr.png"
                            alt="Payment QR Code"
                        >

                        <div class="qr-text">
                            Scan this QR code to make payment.
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>


<script>

    const quantityInput =
        document.getElementById('quantity');

    const total =
        document.getElementById('total');

    const paymentSlip =
        document.getElementById('paymentSlip');

    const fileName =
        document.getElementById('fileName');

    const slipPreview =
        document.getElementById('slipPreview');

    const price =
        <?= (float) $product['price'] ?>;


    // Calculate total

    quantityInput.addEventListener('input', function () {

        let quantity = parseInt(this.value) || 1;

        let result = price * quantity;

        total.textContent =
            '$' + result.toFixed(2);

    });


    // Payment slip preview

    paymentSlip.addEventListener('change', function () {

        const file = this.files[0];

        if (file) {

            fileName.textContent =
                file.name;

            slipPreview.src =
                URL.createObjectURL(file);

            slipPreview.style.display =
                'block';

        } else {

            fileName.textContent =
                'No file selected';

            slipPreview.style.display =
                'none';

        }

    });

</script>

</body>

</html>