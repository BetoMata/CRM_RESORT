from django.db import models
from django.db.models.fields import BLANK_CHOICE_DASH
from apps.sucursales.models import Sucursal

# Create your models here.
class Producto(models.Model):
    STATUS_CHOICES = (
        ('1', 'Activo'),
        ('2', 'Inactivo'),
    )

    modelo = models.CharField(max_length=45, null=False, blank=False)
    precio_unitario = models.DecimalField(max_digits=8, decimal_places=2, null=False)
    descripcion = models.CharField(max_length=240, null=False, blank=False)
    existencias = models.IntegerField(null=False)
    status = models.CharField(max_length=40, null=False, blank=False, choices=STATUS_CHOICES)
    sucursal = models.ForeignKey(Sucursal, null=False, on_delete=models.CASCADE)

    def __str__(self):
        return f"{self.modelo}"