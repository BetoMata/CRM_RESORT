from django.urls import path
from apps.sucursales import views as sucursales_views
from django.contrib.auth.decorators import login_required

urlpatterns = [
    path('', login_required(sucursales_views.sucursalesView, login_url='/login')),
    path('nuevaSucursal', login_required(sucursales_views.nuevaSucursalView, login_url='/login')),
    path('editarSucursal/<pk>', login_required(sucursales_views.editarSucursalView, login_url='/login')),
]