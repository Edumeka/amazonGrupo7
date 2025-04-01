<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon Grupo 7</title>
    <link rel="icon" href="logo-amazon.png" type="image/png">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('/img/logo_amazon.png')}}" alt="Amazon" width="40" height="40"> Amazon
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Pedidos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Prime</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Carrito</a></li>
                </ul>
            </div>
        </div>
        <nav class="ms-auto">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-outline-light me-2">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-warning">Register</a>
                    @endif
                @endauth
            @endif
        </nav>
    </nav>

    <!-- Sección Hero -->
    <div class="container mt-4">
        <div class="p-5 text-center bg-warning rounded">
            <h1>Bienvenido a Amazon Grupo 7</h1>
            <p>Compra millones de productos con envíos rápidos y seguros.</p>
            <a href="#" class="btn btn-dark">Comprar ahora</a>
        </div>
    </div>

    <!-- Sección de productos -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Productos Destacados</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/200" class="card-img-top" alt="Producto">
                    <div class="card-body">
                        <h5 class="card-title">Producto 1</h5>
                        <p class="text-warning fw-bold">$99.99</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/200" class="card-img-top" alt="Producto">
                    <div class="card-body">
                        <h5 class="card-title">Producto 2</h5>
                        <p class="text-warning fw-bold">$149.99</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/200" class="card-img-top" alt="Producto">
                    <div class="card-body">
                        <h5 class="card-title">Producto 3</h5>
                        <p class="text-warning fw-bold">$79.99</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/200" class="card-img-top" alt="Producto">
                    <div class="card-body">
                        <h5 class="card-title">Producto 4</h5>
                        <p class="text-warning fw-bold">$199.99</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 Amazon Grupo 7. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
