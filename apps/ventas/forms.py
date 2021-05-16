from django.forms import ModelForm
from django.forms.widgets import SelectDateWidget
from .models import Venta
from apps.productos.models import Producto
from apps.clientes.models import Empleado

class nuevaVentaForm(ModelForm):

    def __init__(self, *args, **kwargs):
        super (nuevaVentaForm,self ).__init__(*args,**kwargs)
        self.fields['producto'].queryset = Producto.objects.filter(existencias__gt=0)
        self.fields['empleado'].queryset = Empleado.objects.filter(tipo="SE")

    class Meta:
        model = Venta
        fields = [
            'fecha_venta',
            'tipo_venta',
            'producto',
            'sucursal',
            'empleado',
            'prospecto'
        ]

        widgets = {
            'fecha_venta': SelectDateWidget(),
        }