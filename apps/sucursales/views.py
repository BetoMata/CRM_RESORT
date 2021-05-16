from django.shortcuts import render,redirect
from django.contrib.auth import get_user_model
from .models import Sucursal
from .forms import nuevaSucursalForm

User = get_user_model()


def sucursalesView(request):
    if request.method == "POST":
        pk = request.POST.get("pk")
        sucursal = Sucursal.objects.filter(pk=pk).first()
        if sucursal != None:
            sucursal.delete()

    sucursales = Sucursal.objects.all().order_by("pk")
    user = User.objects.filter(username=request.user).first()

    if user.tipo == 'MA':
        return render(request, 'sucursales.html', {"sucursales": sucursales, "User": user})
    else:
        return redirect('/menu')

def nuevaSucursalView(request):
    user = User.objects.filter(username=request.user).first()

    if user.tipo == 'MA':
        if request.method == 'POST':
            form = nuevaSucursalForm(request.POST)
            if form.is_valid():
                form.save()
                return redirect("/sucursales")
            else: 
                return render(request, 'nuevaSucursal.html', {"User": user, 'form': form})
        else:
            form = nuevaSucursalForm()

        return render(request, 'nuevaSucursal.html', {"User": user, 'form': form})
    else:
        return redirect('/menu')

def editarSucursalView(request, pk):
    user = User.objects.filter(username=request.user).first()

    sucursal = Sucursal.objects.filter(pk=pk).first()
    if user.tipo == 'MA':

        if request.method == "POST":
            form = nuevaSucursalForm(request.POST, instance=sucursal)
            if form.is_valid():
                form.save()
                return redirect("/sucursales")
            else:
                return render(request, 'nuevaSucursal.html', {"User": user, 'form': form})


        form = nuevaSucursalForm(instance=sucursal)
        return render(request, 'nuevaSucursal.html', {"User": user, 'form': form})
    else:
        return redirect('/menu')