from apps.clientes.models import Empleado
from django.db import models
from datetime import date
from apps.ventas.models import Venta
from django.contrib.auth import get_user_model

Empleado = get_user_model()

# Create your models here.
class Comision(models.Model):
    fecha = models.DateField(default=date.today)
    total = models.DecimalField(max_digits=8, decimal_places=2, null=False)
    venta = models.ForeignKey(Venta, on_delete=models.CASCADE)
    empleado = models.ForeignKey(Empleado, on_delete=models.CASCADE)