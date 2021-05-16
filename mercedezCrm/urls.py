"""mercedezCrm URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/3.1/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path, include
from apps.clientes import views as clientes_views
from django.contrib.auth.decorators import login_required

urlpatterns = [
    path('admin/', admin.site.urls),
    path('productos/', include('apps.productos.urls')),
    path('ventas/', include('apps.ventas.urls')),
    path('clientes/', include('apps.clientes.urls')),
    path('sucursales/', include('apps.sucursales.urls')),
    path('comisiones/', include('apps.comisiones.urls')),

    path('', clientes_views.index_view),
    path('registro', clientes_views.registroView),
    path('menu/', clientes_views.admin_view),
    path('login', clientes_views.login_view),
    path('logout', clientes_views.logout_method),
    path('vendedores', login_required(clientes_views.vendedoresView, login_url='/login')),
    path('vendedores/nuevoVendedor', login_required(clientes_views.nuevoVendedorView, login_url='/login')),
    path('vendedores/editarVendedor/<pk>', login_required(clientes_views.editarVendedorView, login_url='/login')),
    path('prospectos', clientes_views.prospectosView),
    path('prospectos/nuevoProspecto', clientes_views.nuevoProspectoView),
    path('prospectos/editarProspecto/<pk>', clientes_views.editarProspectoView),
]
