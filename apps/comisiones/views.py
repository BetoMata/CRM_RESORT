from apps.comisiones.models import Comision
from django.shortcuts import render, redirect
from django.contrib.auth import get_user_model
import datetime
from dateutil.relativedelta import relativedelta
import json
from operator import itemgetter

User = get_user_model()

def comisionesView(request):
    user = User.objects.filter(username=request.user).first()

    if user.tipo == 'MA':
        now = datetime.date.today()
        comisiones = Comision.objects.filter(fecha__lte = now, fecha__gte = now + relativedelta(months=-1)).order_by("total")
        top = {}
        
        for i in comisiones:
            try:
                top[i.empleado.username]["total"] += i.total
            except KeyError:
                top[i.empleado.username] = {
                    "empleado": i.empleado.nombre + " " + i.empleado.apellido,
                    "sucursal": i.venta.sucursal,
                    "total": i.total
                }

        topValues = top.values()
        topValues = sorted(topValues, key=itemgetter("total"), reverse=True)
        topValues = list(topValues)

        data = []
        for i in topValues:
            data.append(float(i["total"]))
        
        data.sort(reverse=True)

        data = json.dumps(data)

        return render(request, 'comisiones.html', {"comisiones": comisiones, "top": topValues, "arrayData": data, "User": user})
    else:
        return redirect('/menu')