from django.db import models
from apps.productos.models import Producto
from django.contrib.auth.models import AbstractUser
from django.utils.translation import ugettext_lazy as _
from .managers import EmpleadoManager

# Create your models here.
class Cliente(models.Model):
    nombre = models.CharField(max_length=80, null=False, blank=False)
    apellido = models.CharField(max_length=80, null=False, blank=False)
    email = models.CharField(max_length=40, null=False, blank=False)
    telefono = models.CharField(max_length=20, null=False, blank=False)

    def __str__(self):
        return f"{self.nombre} {self.apellido}"

class Prospecto(models.Model):
    nombre = models.CharField(max_length=80, null=False, blank=False)
    apellido = models.CharField(max_length=80, null=False, blank=False)
    email = models.CharField(max_length=40, null=False, blank=False)
    telefono = models.CharField(max_length=20, null=False, blank=False)
    auto = models.ForeignKey(Producto, null=True, on_delete=models.CASCADE)

    def __str__(self):
        return f"{self.nombre} {self.apellido}"

class Empleado(AbstractUser):
    STATUS_FIELD = (
        ("A", "Activo"),
        ("I", "Inactivo"),
    )

    TIPO_CHOICES = (
        ("SE", "Vendedor"),
        ("MA", "Manager"),
    )

    nombre = models.CharField(max_length=80, null=False, blank=False)
    apellido = models.CharField(max_length=80, null=False, blank=False)
    status = models.CharField(max_length=20, null=False, blank=False, choices=STATUS_FIELD, default=STATUS_FIELD[0][0])
    tipo = models.CharField(max_length=80, null=False, blank=False, choices=TIPO_CHOICES, default=TIPO_CHOICES[0][0])
    telefono = models.CharField(max_length=20)
    
    first_name = None
    last_name = None

    REQUIRED_FIELDS = []

    objects = EmpleadoManager()

    def __str__(self):
        return self.username