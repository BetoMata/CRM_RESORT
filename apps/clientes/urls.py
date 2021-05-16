from django.urls import path
from apps.productos import views as productos_views
from apps.clientes import views as clientes_views
from django.contrib.auth.decorators import login_required
from django.conf.urls import handler404

urlpatterns = [
    path('', login_required(clientes_views.clientesView, login_url='/login')),
    path('nuevoCliente', login_required(clientes_views.nuevoClienteView, login_url='/login')),
    path('editarCliente/<pk>', login_required(clientes_views.editarClienteView, login_url='/login')),
]

handler404 = 'apps.clientes.views.view_404'