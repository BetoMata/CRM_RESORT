from django.urls import path
from apps.comisiones import views as comisiones_views
from django.contrib.auth.decorators import login_required

urlpatterns = [
    path('', login_required(comisiones_views.comisionesView, login_url='/login')),
]