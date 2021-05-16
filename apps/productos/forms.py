from django.forms import ModelForm
from .models import Producto

class nuevoProductoForm(ModelForm):
    class Meta:
        model = Producto
        fields = '__all__'