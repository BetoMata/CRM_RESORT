from django.forms import ModelForm
from .models import Sucursal

class nuevaSucursalForm(ModelForm):
    class Meta:
        model = Sucursal
        fields = '__all__'