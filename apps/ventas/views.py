from apps.clientes.models import Cliente
from django.shortcuts import render, redirect
from .models import Venta
from apps.comisiones.models import Comision
from .forms import nuevaVentaForm
from django.contrib.auth import get_user_model
from dateutil.relativedelta import relativedelta
import datetime
import json

User = get_user_model()

# Create your views here.
def ventasView(request):
    user = User.objects.filter(username=request.user).first()
    now = datetime.date.today()

    if user.tipo == 'MA':
        ventas = Venta.objects.filter(fecha_venta__lte = now, fecha_venta__gte = now + relativedelta(months=-1)).order_by('fecha_venta')

        totales = {}
        empleados = []
        for i in ventas:
            if not i.empleado.username in empleados:
                empleados.append(i.empleado.username)
            try:
                totales[i.empleado.username]["total"] += i.producto.precio_unitario
            except KeyError:
                totales[i.empleado.username] = {
                    "total": i.producto.precio_unitario
                }

        data = []
        for i in totales.values():
            data.append(float(i["total"]))

        data = json.dumps(data)
        empleados = json.dumps(empleados)

        return render(request, 'ventas.html', {"ventas": ventas, "empleados": empleados, "totales": data, "User": user})
    else:
        return redirect("/menu")

def nuevaVentaView(request):
    user = User.objects.filter(username=request.user).first()

    if request.method == 'POST':
        form = nuevaVentaForm(request.POST)
        if form.is_valid():
            createdVenta = form.cleaned_data
            venta = form.save()
            prospecto = createdVenta['prospecto']
            producto = createdVenta['producto']
            empleado = createdVenta['empleado']
            valor_comision = producto.precio_unitario / 20

            comision = Comision.objects.create(total=valor_comision, empleado=empleado, venta=venta)
            cliente = Cliente.objects.create(nombre=prospecto.nombre, apellido=prospecto.apellido, email=prospecto.email, telefono=prospecto.telefono)
            producto.existencias = producto.existencias-1
            producto.save(update_fields=['existencias'])

            return redirect("/ventas")
        else: 
            return render(request, 'nuevaVenta.html', {"User": user, 'form': form})
    else:
        form = nuevaVentaForm()

    return render(request, 'nuevaVenta.html', {"User": user, 'form': form})