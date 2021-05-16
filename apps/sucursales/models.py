from django.db import models

# Create your models here.
class Sucursal(models.Model):
    nombre = models.CharField(max_length=80, null=False, blank=False)
    direccion = models.CharField(max_length=120, null=False, blank=False)
    telefono = models.CharField(max_length=20, null=False, blank=False)

    def __str__(self):
        return f"{self.nombre}"