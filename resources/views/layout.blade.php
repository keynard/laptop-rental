<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptop Rental</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    
</head>
<style>
/* Button hover scale and shadow */
.btn-hover {
    transition: transform 0.3s, box-shadow 0.3s;
}
.btn-hover:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
}

/* Table row hover effect */
.table-hover tbody tr {
    transition: background-color 0.3s, transform 0.2s;
}
.table-hover tbody tr:hover {
    background-color: rgba(255,255,255,0.1);
    transform: translateY(-2px);
}

/* Smooth fade-in for table on page load */
.table-fade {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.6s forwards;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Optional: Form inputs focus glow */
.form-control:focus {
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.6);
    border-color: #007bff;
}
</style>

<body style="background-image: url('{{ asset('images/1.jpg') }}'); background-size: cover; background-position: center;">

    <div class="container py-5">
        <div class="bg-dark bg-opacity-50 text-white p-4 rounded">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS CDN (optional for dropdowns, modals, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
