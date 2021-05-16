from django.urls import path
from apps.productos import views as productos_views
from django.contrib.auth.decorators import login_required

urlpatterns = [
    path('', login_required(productos_views.productosView, login_url='/login')),
    path('nuevoProducto', login_required(productos_views.nuevoProductoView, login_url='/login')),
    path('editarProducto/<pk>', login_required(productos_views.editarProductoView, login_url='/login')),
]