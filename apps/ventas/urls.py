from django.urls import path
from apps.ventas import views as ventas_views
from django.contrib.auth.decorators import login_required

urlpatterns = [
    path('', login_required(ventas_views.ventasView, login_url='/login')),
    path('registrarVenta', login_required(ventas_views.nuevaVentaView, login_url='/login')),
]