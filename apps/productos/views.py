from django.shortcuts import redirect, render
from .models import Producto
from django.contrib.auth import get_user_model
from .forms import nuevoProductoForm

User = get_user_model()

# Create your views here.
def agendarView(request):
    return render(request, 'agendar.html')

def productosView(request):

    if request.method == "POST":
        pk = request.POST.get("pk")
        producto = Producto.objects.filter(pk=pk).first()
        if producto != None:
            producto.delete()

    productos = Producto.objects.all().order_by("pk")
    user = User.objects.filter(username=request.user).first()

    if user.tipo == 'MA':
        return render(request, 'productos.html', {"productos": productos, "User": user})
    else:
        return redirect('/menu')

def nuevoProductoView(request):
    user = User.objects.filter(username=request.user).first()

    if user.tipo == 'MA':
        if request.method == 'POST':
            form = nuevoProductoForm(request.POST)
            if form.is_valid():
                form.save()
                return redirect("/productos")
            else: 
                return render(request, 'nuevoProducto.html', {"User": user, 'form': form})
        else:
            form = nuevoProductoForm()

        return render(request, 'nuevoProducto.html', {"User": user, 'form': form})
    else:
        return redirect('/menu')

def editarProductoView(request, pk):
    user = User.objects.filter(username=request.user).first()

    producto = Producto.objects.filter(pk=pk).first()
    if user.tipo == 'MA':

        if request.method == "POST":
            form = nuevoProductoForm(request.POST, instance=producto)
            if form.is_valid():
                form.save()
                return redirect("/productos")
            else:
                return render(request, 'nuevoProducto.html', {"User": user, 'form': form})


        form = nuevoProductoForm(instance=producto)
        return render(request, 'nuevoProducto.html', {"User": user, 'form': form})
    else:
        return redirect('/menu')
